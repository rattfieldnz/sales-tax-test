<?php

$factory->define(App\Models\Basket::class, function (Faker\Generator $faker) {
    return [
        'receipt_id' => function () {
            return factory(App\Models\Receipt::class)->create()->id;
        },
    ];
});

$factory->define(App\Models\Product::class, function (Faker\Generator $faker) {
    return [
        'description' => $faker->word,
        'price' => $faker->randomFloat(),
        'sales_tax_percent' => $faker->randomNumber(),
        'import_tax_percent' => $faker->randomNumber(),
    ];
});

$factory->define(App\Models\Receipt::class, function (Faker\Generator $faker) {
    return [
        'final_product_cost_total' => $faker->randomFloat(),
        'sales_tax_total' => $faker->randomFloat(),
        'import_tax_total' => $faker->randomFloat(),
        'final_taxes_total' => $faker->randomFloat(),
        'final_receipt_total' => $faker->randomFloat(),
        'receipt_content' => $faker->text
    ];
});

$factory->define(App\Models\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt($faker->password),
        'remember_token' => str_random(10),
    ];
});

