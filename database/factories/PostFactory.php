<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$users = App\User::pluck('id')->toArray();

$factory->define(Post::class, function (Faker $faker) {
    return [
        'user_id' => $faker->randomElement($users),
        'category_id' => $faker->numberBetween(4, App\Category::count()),
        'deal_type' => $faker->randomElement(['sale', 'rent']),
        'manufacturer' => $faker->randomElement(['bmw', 'ford', 'audi', 'mercedes-benz']),
        'model' => $faker->randomElement(['650', '550', 'RS6', '525', '320']),
        'prod_date' => $faker->numberBetween(2000, 2020),
        'mileage' => $faker->numberBetween(0, 500000),
        'model' => $faker->randomElement(['manual', 'typtronic', 'automatic', 'variator']),
        'engine_volume' => $faker->randomElement([1.0, 2.0, 5.5, 3.2]),
        'doors' => $faker->randomElement(['4/5', '2/3']),
        'turbo' => $faker->numberBetween(0, 1),
        'cylinders' => $faker->numberBetween(1, 8),
        'fuel_type' => $faker->randomElement(['petrol', 'diesel', 'gas']),
        'drive_wheels' => $faker->randomElement(['front', 'back', '4x4']),
        'color' => $faker->randomElement(['red', 'black', 'blue']),
        'wheel' => $faker->randomElement(['L', 'R']),
        'hydraulics' => $faker->numberBetween(0, 1),
        'rims' => $faker->numberBetween(0, 1),
        'el_window' => $faker->numberBetween(0, 1),
        'climate_control' => $faker->numberBetween(0, 1),
        'seat_heater' => $faker->numberBetween(0, 1),
        'central_lock' => $faker->numberBetween(0, 1),
        'alarm' => $faker->numberBetween(0, 1),
        'bord_computer' => $faker->numberBetween(0, 1),
        'navigation' => $faker->numberBetween(0, 1),
        'description' => $faker->realText(),
        'name' => $faker->randomElement(['giorgi', 'nika', 'vaxo', 'gela']),
        'phone' => $faker->randomElement(['574221393', '55522193']),
        'location' => $faker->randomElement(['tbilisi', 'batumi', 'gori', 'mtskheta']),
        'customs' => $faker->numberBetween(0, 1),
        'price' => $faker->numberBetween(1, 200000),
        'post_type' => $faker->randomElement(['V+', 'V', 'N']),
        'image1' => $faker->image('public/storage/uploads',1000,1000, null, false),
        'image2' => $faker->image('public/storage/uploads',1000,1000, null, false),
        'image3' => $faker->image('public/storage/uploads',1000,1000, null, false),
        'image4' => $faker->image('public/storage/uploads',1000,1000, null, false),
        'image5' => $faker->image('public/storage/uploads',1000,1000, null, false),
        'image6' => $faker->image('public/storage/uploads',1000,1000, null, false),
    ];
});
