<?php
/**
 * Created by PhpStorm.
 * User: galat
 * Date: 27/02/2019
 * Time: 21:06
 */

namespace common\components;


use common\models\db\Language;

class LanguageHelpers
{
    public static function loadLanguage($key,$default="",$language="vi"){
        $key_cache = "languae-".$key."-".$language;
        $text = \Yii::$app->cache->get($key_cache);
        if(!$text){
            $lang = Language::find()->where(['language_code' => $language ,'resource' => $key])->limit(1)->one();
            if(!$lang){
                $lang = new Language();
                $lang->language_code = $language;
                $lang->resource = $key;
                $lang->value = $default;
                $lang->active = 1;
                $lang->save(0);
            }
            $text = $lang->value;
            \Yii::$app->cache->set($key_cache,$text,60*60*24*30);
        }
        return $text;
    }
    public static function showMoney($value,$lang="vi"){
        switch ($lang){
            case "vi":
                return '₫'.number_format($value, 0, '.', '.');
                break;
            case "en":
                return '₫'.number_format($value, 0, '.', '.');
                break;
        }
    }
}