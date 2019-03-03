<?php
/**
 * Created by PhpStorm.
 * User: galat
 * Date: 28/02/2019
 * Time: 22:22
 */

namespace frontend\controllers\service;


use common\models\db\Cart;
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
        $cart->quantity = $cart->quantity + $quantity;
        $cart->final_price_amount = $cart->quantity * $cart->price_amount;
        $cart->active = 1;
        $cart->created_at = time();
        $cart->updated_at = time();
        $cart->save(0);
        return $this->response(true,'add to cart success!');
    }
}