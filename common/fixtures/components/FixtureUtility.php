<?php
/**
 * Created by PhpStorm.
 * User: galat
 * Date: 22/02/2019
 * Time: 13:28
 */

namespace common\fixtures\components;


use yii\helpers\ArrayHelper;

class FixtureUtility
{
    public static function getDataWithColumn($path,$column,$condition=null){
        $list = include $path;
        $res = [];
        foreach ($list as $data){
            if($condition){
                $check = true;
                foreach ($condition as $c => $v){
                    if(is_array($v) && !in_array($data[$c],$v)){
                        $check = false;
                        break;
                    }elseif(!is_array($v) && $data[$c] != $v){
                        $check = false;
                        break;
                    }
                }
                if($check){
                    if($column){
                        $res[] = $data[$column];
                    }else{
                        $res[] = $data;
                    }
                }
            }else{
                if($column){
                    $res[] = $data[$column];
                }else{
                    $res[] = $data;
                }
            }
        }
        return $res;
    }
    /**
     * @param $items
     * @param $field
     * @return float|int
     */
    public static function getSumArray($items, $field)
    {
        $array = ArrayHelper::getColumn($items, $field, false);
        if (count($array) === 0) {
            return 0;
        }
        return array_sum($array);
    }
}