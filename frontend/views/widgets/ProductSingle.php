<?php
/**
 * Created by PhpStorm.
 * User: galat
 * Date: 28/02/2019
 * Time: 21:42
 */

namespace frontend\views\widgets;


use common\models\db\Product;
use yii\base\Widget;

class ProductSingle extends Widget
{
    /** @var Product $product */
    public $product;
    public $countDown;
    public function run()
    {
        return $this->render('productsingle',[
            'product' => $this->product,
            'countDown' => $this->countDown,
        ]);
    }
}