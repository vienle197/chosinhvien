<?php
/**
 * Created by PhpStorm.
 * User: galat
 * Date: 25/06/2018
 * Time: 11:03 PM
 */

namespace frontend\views\widgets;


class Breadcrumbs extends \yii\widgets\Breadcrumbs
{
    public function run()
    {
        return $this->render('breadcrumbs');
    }
}