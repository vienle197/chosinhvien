<?php
/**
 * Created by PhpStorm.
 * User: galat
 * Date: 27/02/2019
 * Time: 21:50
 */

namespace frontend\views\widgets;


use common\models\db\Category;
use yii\base\Widget;

class Header extends Widget
{
    public function run()
    {
        $cateSearch = Category::find()->where([
            'parent_id' => null,
            'active' => 1
        ])->all();
        return $this->render('header',[
            'cateSearch' => $cateSearch
        ]);
    }
}