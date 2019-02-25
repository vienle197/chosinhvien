<?php
/**
 * Created by PhpStorm.
 * User: galat
 * Date: 13/07/2018
 * Time: 10:12 AM
 */

namespace console\controllers;


use common\models\db\SystemCity as Cities;
use common\models\db\SystemDistrict as Districts;
use common\models\db\SystemWards as Wards;
use yii\base\Controller;

class ImportController extends Controller
{
    public function actionCities(){
        $content = file_get_contents('http://ops-admin.chosinhvien.beta/data/tinh_tp.json');
        $content = json_decode($content);
        foreach ($content as $val){

            $city = new Cities();
            $city->id = $val->code;
            $city->city_name = $val->name;
            $city->note = $val->name;
            $city->save();
            echo $city->id . PHP_EOL;
        }
        print_r("done!");
        die;
    }
    public function actionDistricts(){
        $content = file_get_contents('http://ops-admin.chosinhvien.beta/data/quan_huyen.json');
        $content = json_decode($content);
        foreach ($content as $val){
            $district = new Districts();
            $district->id = $val->code;
            $district->district_name = $val->name;
            $district->city_id = $val->parent_code;
            $district->note = $val->path;
            $district->save();
            echo $district->id . PHP_EOL;
        }
        print_r("done!");
        die;
    }
    public function actionWards(){
        $content = file_get_contents('http://ops-admin.chosinhvien.beta/data/xa_phuong.json');
        $content = json_decode($content);
        $i = 0;
        $stard = time();
        foreach ($content as $val){
            /** @var Districts $district */
            $district = Districts::find()->where(['id' => $val->parent_code])->one();
            $ward = new Wards();
            $ward->id = $val->code;
            $ward->wards_name = $val->name;
            $ward->district_id = $val->parent_code;
            $ward->city_id = $district ? $district->city_id : null;
            $ward->note = "." .$val->path;
            $ward->note = str_replace("." .$val->name,$val->name_with_type,$ward->note);
            $ward->save();
            $i++;
            echo $i." / -- ". $ward->note . PHP_EOL;
        }
        echo (time() - $stard)." s \n";
        print_r("done!");
        die;
    }
}