<?php
/**
 * Created by PhpStorm.
 * User: galat
 * Date: 02/03/2019
 * Time: 11:12
 */

namespace frontend\views\widgets;


use yii\base\Widget;

class Nav extends Widget
{
    public function run()
    {
        return $this->render('nav');
    }
}