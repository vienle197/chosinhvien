<?php
/**
 * Created by PhpStorm.
 * User: galat
 * Date: 28/02/2019
 * Time: 22:22
 */

namespace frontend\controllers\service;


use common\models\db\Address;
use common\models\db\Cart;
use common\models\db\Order;
use common\models\db\OrderItem;
use common\models\db\Product;
use common\models\db\VariationProduct;
use frontend\views\widgets\DetailProduct;
use yii\db\ActiveQuery;

class ItemController extends ServiceController
{
    public function actionGetDetail(){
        $idProduct = \Yii::$app->request->post("id",null);
        $parent = \Yii::$app->request->post("parent_sku",null);

        if(!$idProduct){
            return $this->response(false,"can see id!");
        }

        /** @var Product $product_child */
        $product_child = Product::find()->where(['id'=>$idProduct,'active'=>1])
            ->with(['merchant','orderItems','category','manufacturer',
                'variationProducts' => function ($q){
                    /** @var ActiveQuery $q */
                    $q->with('variation');
                }
            ])->limit(1)->one();
        $variations = [];
        if($parent){
            /** @var VariationProduct[] $variations */
            $variations = VariationProduct::find()->where(['parent_sku'=>$parent,'active'=>1])
                ->with(['variation'])->all();
        }
        $variation = [];
        foreach ($variations as $v) {
            $variation[$v->variation->key][] = [
                'value' => $v->variation->value,
                'id' => $v->variation->id
            ];
        }
        $variation_child = [];
        foreach ($product_child->variationProducts as $variationProduct) {
            $variation_child[] = $variationProduct->variation->id;
        }
        return $this->response(true,"get done!",[
           'content' =>  DetailProduct::widget([
                'product_child' => $product_child,
                'variations' => $variation,
                'variation_child' => $variation_child,
            ])
        ]);
    }

    public function actionAddToCart(){
        $user = \Yii::$app->user->getIdentity();
        if(!$user){
            return $this->response(false,"Pls login!");
        }
        $id = \Yii::$app->request->post("product_id",null);
        $quantity = \Yii::$app->request->post("quantity",null);
        $type = \Yii::$app->request->post("type",null);
        if(!$id || !$quantity){
            return $this->response(false,"Add cart fail!");
        }
        $product = Product::findOne($id);
        if(!$product){
            return $this->response(false,"Product not found!");
        }
        $cart = Cart::find()->where(['customer_id' => $user->getId(), 'product_id' => $id,'active'=>1])
            ->limit(1)->one();
        if(!$cart){
            $cart = new Cart();
            $cart->product_id = $id;
            $cart->customer_id = $user->getId();
            $cart->quantity = 0;
        }
        $cart->price_amount = $product->sale_price && $product->expired_time_sale_price>time() ? $product->sale_price : $product->price;
        $cart->quantity = $type && $type == 'edit' ? $quantity : $cart->quantity + $quantity;
        $cart->final_price_amount = $cart->quantity * $cart->price_amount;
        $cart->active = 1;
        $cart->created_at = $cart->created_at ? $cart->created_at : time();
        $cart->updated_at = time();
        $cart->save(0);
        return $this->response(true,'add to cart success!',$cart->toArray());
    }
    public function actionRemoveToCart(){
        $id = \Yii::$app->request->post("product_id");
        $cart = Cart::find()->where(['product_id' => $id,"active" => 1])->limit(1)->one();
        if($cart){
            $cart->active = 0;
            $cart->save();
            return $this->response(true,"Xóa sản phẩm thành công!");
        }
        return $this->response(false,"Xóa sản phẩm thất bại!");
    }
    public function actionCheckout(){
        $ids = \Yii::$app->request->post("list_id");
        \Yii::$app->session->set("checkout_list",$ids);
        return $this->response(true,"success");
    }
    public function actionCreateOrder(){
        $address_id = \Yii::$app->request->post('address_id');
        $address = Address::findOne($address_id);
        if(!$address){
            return $this->response(false,"Vui lòng chọn địa chỉ!");
        }
        $product_ids = \Yii::$app->session->get('checkout_list');
        /** @var Cart[] $list_cart */
        $list_cart = $carts = Cart::find()->with([
            'product' => function ($q){
                /** @var ActiveQuery $q */
                $q->with(['merchant','manufacturer']);
            }
        ])->where(['customer_id' => $this->user->getId(),'product_id' => $product_ids,'active'=>1])
            ->orderBy('updated_at desc')
            ->all();
        if(!$list_cart){
            return $this->response(false,"Danh sách sản phẩm trống!");
        }
        $order = new Order();
        $order->setAttributes($address->toArray());
        $order->status = "NEW";
        $order->payment_method = "COD";
        $order->active = 1;
        $order->created_at = date('Y-m-d H:i:s');
        $order->updated_at = date('Y-m-d H:i:s');
        $order->save(0);
        foreach ($list_cart as $value){
            $order_item = new OrderItem();
            $order_item->order_id= $order->id;
            $order_item->product_id= $value->product_id;
            $order_item->quantity= $value->quantity;
            $order_item->price_amount= $value->price_amount;
            $order_item->final_price_amount= $value->final_price_amount;
            $order_item->active= 1;
            $order_item->created_at = date('Y-m-d H:i:s');
            $order_item->updated_at = date('Y-m-d H:i:s');
            $order_item->save(0);
            $order->total_amount = $order->total_amount ? $order->total_amount + $value->final_price_amount : $value->final_price_amount;
            $order->final_total_amount = $order->final_total_amount ? $order->final_total_amount + $value->final_price_amount : $value->final_price_amount;
            $order->total_price_amount = $order->total_price_amount ? $order->total_price_amount + $value->price_amount : $value->price_amount;
        }
        $order->total_fee_amount = $order->city_id == 1 ? 0 : 20000;
        $order->total_amount = $order->total_amount + $order->total_fee_amount;
        $order->final_total_amount = $order->final_total_amount + $order->total_fee_amount;
        $order->save(0);
        Cart::updateAll(['active'=>0],['customer_id' => $this->user->getId(),'product_id' => $product_ids,'active'=>1]);
        \Yii::$app->session->remove('checkout_list');
        return $this->response(true,"Đặt hàng thành công!<br>Vui lòng chờ nhân viên giao hàng gọi điện và thanh toán cho nhân viên giao hàng");
    }
}