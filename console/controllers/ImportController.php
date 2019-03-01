<?php
/**
 * Created by PhpStorm.
 * User: galat
 * Date: 13/07/2018
 * Time: 10:12 AM
 */

namespace console\controllers;


use common\models\db\Image;
use common\models\db\Product;
use common\models\db\SystemCity as Cities;
use common\models\db\SystemDistrict as Districts;
use common\models\db\SystemWards as Wards;
use common\models\db\VariationProduct;
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
    public function actionProduct(){
        /** @var Product[] $products */
        $products = Product::find()->where(['image' => null])->limit(500) -> all();
        foreach($products as $product){
            /** @var Image $image */
            $image = Image::find()->where(['product_id' => $product->id])->one();
            if(!$image){
                $image = Image::findOne(rand(1,100));
            }
            $product->image = $image->url;
            $product->sale_percent = round($product->sale_price / $product->price,4) * 100;
            $product->save(0);
            echo $product->sale_percent." - ".$product->image.PHP_EOL;
        }
    }
    public function actionProductLoad(){
        /** @var Product[] $products */
        $products = Product::find()->limit(500) -> all();
        foreach($products as $product){
            $product->image = str_replace("270/360/city/city/city/city/?","270/360/city/?",$product->image);
            $product->image = str_replace("270/360/?","270/360/city/?",$product->image);
            $product->price = round($product->price,-3);
            $product->sale_percent = rand(5,80);
            $product->expired_time_sale_price = rand(time() - (60*60*24*7),time() + (60*60*24*7));
            $product->sale_price = round($product->price * (100-$product->sale_percent)/100,-3);
            $product->save(0);
            echo $product->sale_percent." - ".$product->image.PHP_EOL;
        }
    }

    public function actionRandomVariation(){
        /** @var VariationProduct[] $variations */
        $variations = VariationProduct::find()->all();
        foreach ($variations as $variation){
            $variation->variation_id = rand(1,30);
            echo $variation->id ." - " .$variation->variation_id.PHP_EOL;
            $variation->save(0);
        }
    }
}