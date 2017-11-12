<?php

use App\Functions\BasketFunctions;
use App\Models\Basket;
use App\Models\Product;

/**
 * Class InputTwoSeeder
 *
 * A class to seed data for Input 2 test criteria.
 *
 * @author  Rob Attfield <emailme@robertattfield.com> <http://www.robertattfield.com>
 */
class InputTwoSeeder extends SeederFunctions
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Inserting products for 'Input 2'
        $this->command->info("=== Creating/Adding products, basket, receipt for Input 2 ===");
        $p1 = new Product([
            'description' => "imported box of chocolates",
            'price' => 10.00,
            'sales_tax_percent' => 0,
            'import_tax_percent' => 5
        ]);
        $p1->save();
        $this->productSeeded($p1);

        $p2 = new Product([
            'description' => "imported bottle of perfume",
            'price' => 47.50,
            'sales_tax_percent' => 10,
            'import_tax_percent' => 5
        ]);
        $p2->save();
        $this->productSeeded($p2);

        //Create Basket.
        $basket = new Basket();
        $basket->save();
        $basketFunctions = new BasketFunctions($basket);

        //Add products to basket.
        $products = collect([$p1, $p2]);
        $basketFunctions::addProducts($products, $basket);
        $this->basketSeededAndFilled($products);

        //Create receipt for basket.
        $receipt = $basketFunctions->createReceipt();
        $this->receiptCreated($receipt);

    }
}
