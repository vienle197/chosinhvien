<?php
/**
 * Created by PhpStorm.
 * User: galat
 * Date: 26/02/2019
 * Time: 00:12
 */
/**
 * @var $faker \Faker\Generator
 * @var $index integer
 */

$id = $index + 1;
return [
    'id' => $id,
    'url' => $faker->imageUrl(),
    'product_id' => $faker->numberBetween(1,500),
    'category_id' => null,
    'customer_id' => null,
    'created_at' => $faker->unixTime(),
    'updated_at' => $faker->unixTime(),
    'active' => 1,
];