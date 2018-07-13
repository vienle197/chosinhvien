<?php
/**
 * Created by PhpStorm.
 * User: galat
 * Date: 13/07/2018
 * Time: 10:12 AM
 */

namespace console\controllers;


use common\models\db\Cities;
use common\models\db\Disctricts;
use common\models\db\Districts;
use common\models\db\Wards;
use yii\base\Controller;

class ImportController extends Controller
{
    public function actionCities(){
        $content = file_get_contents('http://ops-admin.chosinhvien.beta/data/tinh_tp.json');
        $content = json_decode($content);
        foreach ($content as $val){

            $city = new Cities();
            $city->id = $val->code;
            $city->CityName = $val->name;
            $city->Note = $val->name;
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
            $district->DistrictName = $val->name;
            $district->CityId = $val->parent_code;
            $district->Note = $val->path;
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
            $ward = new Wards();
            $ward->id = $val->code;
            $ward->WardName = $val->name;
            $ward->DistrictId = $val->parent_code;
            $ward->Note = "." .$val->path;
            $ward->Note = str_replace("." .$val->name,$val->name_with_type,$ward->Note);
            $ward->save();
            $i++;
            echo $i." / -- ". $ward->Note . PHP_EOL;
        }
        echo (time() - $stard)." s \n";
        print_r("done!");
        die;
    }
}