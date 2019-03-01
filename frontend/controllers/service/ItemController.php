<?php
/**
 * Created by PhpStorm.
 * User: galat
 * Date: 28/02/2019
 * Time: 22:22
 */

namespace frontend\controllers\service;


use common\models\db\Product;
use yii\db\ActiveQuery;

class ItemController extends ServiceController
{
    public function actionGetDetail(){
        $idProduct = \Yii::$app->request->post("id",null);
        $parent = \Yii::$app->request->post("parent_sku",null);

        if(!$idProduct){
            return $this->response(false,"can see id!");
        }

        $product_child =  $product = Product::find()->where(['id'=>$idProduct,'active'=>1])
            ->with(['merchant','orderItems','category','manufacturer',
                'variationProducts' => function ($q){
                    /** @var ActiveQuery $q */
                    $q->with('variation');
                }
            ])->limit(1)->asArray()->one();
        if($parent){
            $product = Product::find()->where(['sku'=>$parent,'active'=>1])
                ->with(['merchant','orderItems','category','manufacturer',
                    'variationProducts' => function ($q){
                        /** @var ActiveQuery $q */
                        $q->with('variation');
                    }
                ])->limit(1)->asArray()->one();
        }
        return $this->response(true,"get done!",[
            'product' => $product,
            'product_child' => $product_child,
        ]);
    }
}