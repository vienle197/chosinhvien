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
return [
    'id' => $id,
    'name' => $faker->name,
    'origin_name' => $faker->name,
    'parent_id' => $id > 10 ? $faker->numberBetween(1,10):null,
    'description' => "",
    'active' => 1,
    'meta_keywords' => $faker->text(20),
    'meta_description' => $faker->text(20),
    'meta_title' => $faker->text(20),
];