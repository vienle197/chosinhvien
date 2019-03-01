<?php
/**
 * Created by PhpStorm.
 * User: galat
 * Date: 28/02/2019
 * Time: 22:22
 */

namespace frontend\controllers\service;


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
}