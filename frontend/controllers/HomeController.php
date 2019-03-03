<?php
/**
 * Created by PhpStorm.
 * User: galat
 * Date: 25/06/2018
 * Time: 10:51 PM
 */

namespace frontend\controllers;


use common\models\db\Cart;
use common\models\db\Category;
use common\models\db\Product;
use yii\db\ActiveQuery;
use yii\web\Controller;

class HomeController extends Controller
{
    public function actionIndex()
    {
        $cates = Category::find()->where([
            'active' => 1
        ])->orderBy("parent_id")->all();
        $product_hot_sale = Product::find()->where('stock_quantity > 0 and disable_buy_now = 0 ')->orderBy("sale_percent desc ,expired_time_sale_price desc")->limit(20)->all();
        $product_hot = Product::find()->where('stock_quantity > 0 and disable_buy_now = 0 ')->orderBy("sold_quantity desc")->limit(20)->all();
        return $this->render('index',[
            "cates" => $cates,
            "product_hot" => $product_hot,
            "product_hot_sale" => $product_hot_sale,
        ]);
    }
    public function actionCart(){
        $user = \Yii::$app->user->getIdentity();
        $type = \Yii::$app->request->get('type','cart');
        if(!$user){
            $carts = [];
        }else{
            $carts = Cart::find()->with([
                'product' => function ($q){
                    /** @var ActiveQuery $q */
                    $q->with(['merchant','manufacturer']);
                }
            ])->where(['customer_id' => $user->getId(),'active'=>1])
                ->all();
        }
        return $this->render('cart',[
            "carts" => $carts,
            "type" => $type
        ]);
    }
}