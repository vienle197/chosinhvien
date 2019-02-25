<?php
/**
 * Created by PhpStorm.
 * User: galat
 * Date: 25/02/2019
 * Time: 23:51
 */
/**
 * @var $faker \Faker\Generator
 * @var $index integer
 */

$id = $index + 1;
return [
    'id' => $id,
    'key' => $id <10 ? "color" : "other",
    'value' => $id <10 ? $faker->colorName : $faker->word,
    'active' => 1,
];