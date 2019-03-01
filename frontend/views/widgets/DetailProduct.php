<?php
/**
 * Created by PhpStorm.
 * User: galat
 * Date: 01/03/2019
 * Time: 10:25
 */

namespace frontend\views\widgets;


use yii\base\Widget;

class DetailProduct extends Widget
{
    public $product;
    public $variations;
    public $product_child;
    public function run()
    {
        return $this->render('detailproduct',
            [
                'product' => $this->product,
                'product_child' => $this->product_child,
                'variations' => $this->variations
            ]);
    }
}