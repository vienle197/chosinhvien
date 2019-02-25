<?php
/**
 * Created by PhpStorm.
 * User: galat
 * Date: 25/02/2019
 * Time: 23:56
 */

/**
 * @var $faker \Faker\Generator
 * @var $index integer
 */
$prod = $faker->numberBetween(1,500);
$product = \common\fixtures\components\FixtureUtility::getDataWithColumn('.\common\fixtures\data\product.php',null,['id'=>$prod])[0];
$id = $index + 1;
return [
    'id' => $id,
    'parent_sku' => $product['parent_sku'] ? $product['parent_sku'] : $product['sku'],
    'variation_id' => $product['id'],
    'product_id' => $faker->numberBetween(1,500),
    'active' => 1,
];