<?php
/**
 * Created by PhpStorm.
 * User: galat
 * Date: 25/06/2018
 * Time: 10:51 PM
 */

namespace frontend\controllers;


use common\models\db\Address;
use common\models\db\Cart;
use common\models\db\Category;
use common\models\db\Customer;
use common\models\db\Product;
use common\models\db\SystemCity;
use common\models\db\SystemDistrict;
use common\models\db\SystemWards;
use yii\db\ActiveQuery;
use yii\web\Controller;

class HomeController extends Controller
{
    public function beforeAction($action)
    {
        $befor = parent::beforeAction($action);
        $user = \Yii::$app->user->getIdentity();
        if (!$user) {
            \Yii::$app->session->set('quantity_cart', 0);
            return $this->redirect("/");
        } else {
            $quantity = Cart::find()->where(['customer_id' => $user->getId(), 'active' => 1])
                ->count();
            \Yii::$app->session->set('quantity_cart', $quantity);
        }
        return $befor; // TODO: Change the autogenerated stub
    }

    public function actionIndex()
    {
        $cates = Category::find()->where([
            'active' => 1
        ])->orderBy("parent_id")->all();
        $product_hot_sale = Product::find()->where('stock_quantity > 0 and disable_buy_now = 0 ')->orderBy("sale_percent desc ,expired_time_sale_price desc")->limit(20)->all();
        $product_hot = Product::find()->where('stock_quantity > 0 and disable_buy_now = 0 ')->orderBy("sold_quantity desc")->limit(20)->all();
        return $this->render('index', [
            "cates" => $cates,
            "product_hot" => $product_hot,
            "product_hot_sale" => $product_hot_sale,
        ]);
    }

    public function actionCart()
    {
        $user = \Yii::$app->user->getIdentity();
        $type = \Yii::$app->request->get('type', 'cart');
        if (!$user) {
            $carts = [];
        } else {
            $carts = Cart::find()->with([
                'product' => function ($q) {
                    /** @var ActiveQuery $q */
                    $q->with(['merchant', 'manufacturer']);
                }
            ])->where(['customer_id' => $user->getId(), 'active' => 1])
                ->orderBy('updated_at desc')
                ->all();
        }
        return $this->render('cart', [
            "carts" => $carts,
            "type" => $type
        ]);
    }

    public function actionCheckout()
    {
        $listid = \Yii::$app->session->get('checkout_list');
        $user = \Yii::$app->user->getIdentity();
        if (!$user) {
            return $this->redirect("/");
        }
        $list_cart = $carts = Cart::find()->with([
            'product' => function ($q) {
                /** @var ActiveQuery $q */
                $q->with(['merchant', 'manufacturer']);
            }
        ])->where(['customer_id' => $user->getId(), 'product_id' => $listid, 'active' => 1])
            ->orderBy('updated_at desc')
            ->all();
        if (!$list_cart) {
            return $this->redirect("/");
        }
        $address = Address::find()->where(['status' => 1, 'customer_id' => $user->getId()])
            ->with(['city', 'district', 'ward'])
            ->all();
        $city = \Yii::$app->cache->get('city');
        if (!$city) {
            $city = SystemCity::find()->asArray()->all();
            \Yii::$app->cache->set('city', $city, 60 * 60 * 24 * 60);
        }
        $district = \Yii::$app->cache->get('district');
        if (!$district) {
            $district = SystemDistrict::find()->with(['city'])->orderBy('city_id')->asArray()->all();
            \Yii::$app->cache->set('district', $district, 60 * 60 * 24 * 60);
        }

        $ward = \Yii::$app->cache->get('ward');
        if (!$ward) {
            $ward = SystemWards::find()->with(['district'])->orderBy('district_id')->asArray()->all();
            \Yii::$app->cache->set('ward', $ward, 60 * 60 * 24 * 60);
        }
        return $this->render('checkout', [
            'carts' => $list_cart,
            'address' => $address,
            'city' => $city,
            'district' => $district,
            'ward' => $ward,
        ]);
    }

    public function actionSearch()
    {
        $page = \Yii::$app->request->get("page", 1);
        $limit = \Yii::$app->request->get("limit", 20);
        $keyword = \Yii::$app->request->get("keyword", "");
        $cateId = \Yii::$app->request->get("category_id");
        $products = Product::find()->where(['active' => 1]);
        if ($cateId) {
            /** @var Category $cate */
            $cate = Category::find()->where(['id' => $cateId])->limit(1)->one();
            $arr = $cate && $cate->parent_id ? [$cate->id,$cate->parent_id] : [$cateId];
            $products->andWhere(['category_id' => $arr]);
        }
        $products->andWhere(['like','name' , $keyword]);
        $count = clone $products;
        $total = $count->count();
        $products =     $products->limit($limit)->offset(($page - 1) * $limit)->all();
        return $this->render('search',['products'=>$products,'total' => $total]);
    }
    public function actionMyAccount(){
        /** @var Customer $user */
        $user = \Yii::$app->user->getIdentity();
        if(!$user){
            return $this->goHome();
        }
        $ListAddress = Address::find()
            ->with(['city','district','ward'])
            ->where(['customer_id' => $user->id,'status' => 1])->all();
        return $this->render('account',[
            'customer' => $user,
            'list_address' => $ListAddress,
        ]);
    }
}