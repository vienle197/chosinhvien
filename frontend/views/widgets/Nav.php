<?php
/**
 * Created by PhpStorm.
 * User: galat
 * Date: 02/03/2019
 * Time: 11:12
 */

namespace frontend\views\widgets;


use common\models\db\Category;
use yii\base\Widget;

class Nav extends Widget
{
    public function run()
    {
        $cates = Category::find()->where([
            'active' => 1
        ])->limit(8)->orderBy("parent_id")->all();
        return $this->render('nav',[
            'cates' => $cates
        ]);
    }
}