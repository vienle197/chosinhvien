<?php

namespace common\components;

use common\models\Order;
use Yii;

class TextUtility
{
	public static function isImage($fileName)
    {
        $extension = strrev(substr(strrev($fileName), 0, strpos(strrev($fileName), '.')));
        if (preg_match('/png|jpg|jpeg|gif/', $extension)) {
            return true;
        } else {
            return false;
        }
    }
	
	public static function randChar($num = 10)
    {
        return substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", $num)), 0, $num);
    }

    public static function getClassStatus($status){
	    switch (strtoupper($status)){
            case Order::STATUS_NEW:
                return "danger";
                break;
            case Order::STATUS_CANCEL:
                return "warning";
                break;
            case Order::STATUS_APPROVE:
                return "info";
                break;
            case Order::STATUS_SHIPPING:
                return "primary";
                break;
            case Order::STATUS_AT_CUSTOMER:
                return "success";
                break;
            default:
                return "danger";
                break;
        }
    }
	
}