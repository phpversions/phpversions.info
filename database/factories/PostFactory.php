<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Post::class, function (Faker $faker) {
    $title = $faker->sentence(6);

    return [
        'user_id' => 1,
        'title' => $title,
        'headline' => $faker->sentence,
        'post' => $faker->text(2000),
        'slug' => seoUrl($title),
        'published_at' => new DateTime(),
    ];
});


function seoUrl($string)
{
    //Lower case everything
    $string = strtolower($string);
    //Make alphanumeric (removes all other characters)
    $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
    //Clean up multiple dashes or whitespaces
    $string = preg_replace("/[\s-]+/", " ", $string);
    //Convert whitespaces and underscore to dash
    $string = preg_replace("/[\s_]/", "-", $string);

    return $string;
}