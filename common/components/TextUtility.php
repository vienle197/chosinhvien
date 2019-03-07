<?php

namespace common\components;

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
	
	
}