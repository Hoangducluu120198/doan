<?php

/** \@var \Illuminate\Database\Eloquent\Factory $factory */

use App\Admin;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Roles;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Admin::class, function (Faker $faker) {
    return [
        'admin_name' => $faker->name,
        'admin_email' => $faker->unique()->safeEmail,
        'admin_phone'=>'0333018811',
        'admin_password' => '202cb962ac59075b964b07152d234b70',
        
    ];

});
$factory->afterCreating(Admin::class,function ($admin ,$faker){
    $roles = Roles::where('name','user')->get();
    $admin ->Roles()->sync($roles->pluck('id_roles')->toArray());

});
