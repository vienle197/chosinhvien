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
    public $variations;
    public $variation_child;
    public $product_child;
    public function run()
    {
        return $this->render('detailproduct',
            [
                'product_child' => $this->product_child,
                'variation_child' => $this->variation_child,
                'variations' => $this->variations
            ]);
    }
}