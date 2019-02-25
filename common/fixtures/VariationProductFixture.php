<?php
/**
 * Created by PhpStorm.
 * User: galat
 * Date: 26/02/2019
 * Time: 00:06
 */

namespace common\fixtures;


use yii\test\ActiveFixture;

class VariationProductFixture extends ActiveFixture
{
    public $modelClass = 'common\models\db\VariationProduct';
    public $depends = [
        'common\fixtures\ProductFixture',
        'common\fixtures\VariationFixture',
    ];
}