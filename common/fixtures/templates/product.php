<?php
/**
 * Created by PhpStorm.
 * User: galat
 * Date: 25/02/2019
 * Time: 23:06
 */

/**
 * @var $faker \Faker\Generator
 * @var $index integer
 */
$id = $index + 1;
$idprod = $id > 150 ? $faker->numberBetween(1,150) : $id;
$product = \common\fixtures\components\FixtureUtility::getDataWithColumn('.\common\fixtures\data\product_parent.php',null,['id'=>$idprod])[0];

return [
    'id' => $id,
    'name' => $faker->name,
    'sku' => $id > 150 ? $faker->randomNumber() : $product['sku'],
    'category_id' => $faker->numberBetween(1,50),
    'parent_sku' => $id > 150 ? $product['sku'] : null,
    'manufacturer_id' => $product['manufacturer_id'],
    'merchant_id' => $product['merchant_id'],
    'stock_quantity' => $faker->numberBetween(10,1000),
    'sold_quantity' => $faker->numberBetween(1,100),
    'min_quantity' => 1,
    'max_quantity' => $faker->numberBetween(1,100),
    'disable_buy_now' => 0,
    'disable_add_to_card' => 0,
    'is_pre_order' => 0,
    'price' => $price = $faker->numberBetween(10000,10000000),
    'sale_price' => $faker->numberBetween(10000,$price),
    'expired_time_sale_price' => $faker->unixTime,
    'active' => 1,
    'meta_keywords' => $faker->text(10),
    'meta_description' => $faker->text(10),
    'meta_title' => $faker->text(10),
];