<?php
/**
 * Created by PhpStorm.
 * User: galat
 * Date: 26/02/2019
 * Time: 00:03
 */

namespace common\fixtures;


use yii\test\ActiveFixture;

class ProductFixture extends ActiveFixture
{
    public $modelClass = 'common\models\db\Product';
    public $depends = [
        'common\fixtures\CategoryFixture',
        'common\fixtures\MerchantFixture',
        'common\fixtures\ManufacturerFixture',
    ];
}