<?php

use App\Functions\BasketFunctions;
use App\Models\Basket;
use App\Models\Product;

/**
 * Class InputThreeSeeder
 *
 * A class to seed data for Input 3 test criteria.
 *
 * @author Rob Attfield <emailme@robertattfield.com> <http://www.robertattfield.com>
 */
class InputThreeSeeder extends SeederFunctions
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Inserting products for 'Input 3'
        $this->command->info("=== Creating/Adding products, basket, receipt for Input 3 ===");
        $p1 = new Product(
            [
            'description' => "imported bottle of perfume",
            'price' => 27.99,
            'sales_tax_percent' => 10,
            'import_tax_percent' => 5
            ]
        );
        $p1->save();
        $this->productSeeded($p1);

        $p2 = new Product(
            [
            'description' => "bottle of perfume",
            'price' => 18.99,
            'sales_tax_percent' => 10,
            'import_tax_percent' => 0
            ]
        );
        $p2->save();
        $this->productSeeded($p2);

        $p3 = new Product(
            [
            'description' => "packet of headache pills",
            'price' => 9.75,
            'sales_tax_percent' => 0,
            'import_tax_percent' => 0
            ]
        );
        $p3->save();
        $this->productSeeded($p3);

        $p4 = new Product(
            [
            'description' => "box of imported chocolates",
            'price' => 11.25,
            'sales_tax_percent' => 0,
            'import_tax_percent' => 5
            ]
        );
        $p4->save();
        $this->productSeeded($p4);

        //Create Basket.
        $basket = new Basket();
        $basket->save();
        $basketFunctions = new BasketFunctions($basket);

        //Add products to basket.
        $products = collect([$p1, $p2, $p3, $p4]);
        $basketFunctions::addProducts(collect([$p1, $p2, $p3, $p4]), $basket);
        $this->basketSeededAndFilled($products);

        //Create receipt for basket.
        $receipt = $basketFunctions->createReceipt();
        $this->receiptCreated($receipt);
    }
}
