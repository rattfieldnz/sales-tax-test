<?php

use App\Functions\BasketFunctions;
use App\Models\Basket;
use App\Models\Product;

/**
 * Class InputOneSeeder
 *
 * A class to seed data for Input 1 test criteria.
 *
 * @author  Rob Attfield <emailme@robertattfield.com> <http://www.robertattfield.com>
 */
class InputOneSeeder extends SeederFunctions
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Inserting products for 'Input 1'
        $this->command->info("=== Creating/Adding products, basket, receipt for Input 1 ===");
        $p1 = new Product([
            'description' => "book",
            'price' => 12.49,
            'sales_tax_percent' => 0,
            'import_tax_percent' => 0
        ]);
        $p1->save();
        $this->productSeeded($p1);

        $p2 = new Product([
            'description' => "music CD",
            'price' => 14.99,
            'sales_tax_percent' => 10,
            'import_tax_percent' => 0
        ]);
        $p2->save();
        $this->productSeeded($p2);

        $p3 = new Product([
            'description' => "chocolate bar",
            'price' => 0.85,
            'sales_tax_percent' => 0,
            'import_tax_percent' => 0
        ]);
        $p3->save();
        $this->productSeeded($p3);

        //Create Basket.
        $basket = new Basket();
        $basket->save();
        $basketFunctions = new BasketFunctions($basket);

        //Add products to basket.
        $products = collect([$p1, $p2, $p3]);
        $basketFunctions::addProducts($products, $basket);
        $this->basketSeededAndFilled($products);

        //Create receipt for basket.
        $receipt = $basketFunctions->createReceipt();
        $this->receiptCreated($receipt);

    }
}
