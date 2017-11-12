<?php

use App\Models\Product;
use App\Models\Receipt;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;

abstract class SeederFunctions extends Seeder
{
    /**
     * @param \App\Models\Product $product
     * @return void
     */
    public function productSeeded(Product $product)
    {
        if(!empty($product)) {
            $this->command->info("== Product Seeded ==");
            $this->command->info("ID: " . $product->id);
            $this->command->info("Description: " . $product->description);
            $this->command->info("Price: " . $product->price);
            $this->command->info("Sales Tax Percent: " . $product->sales_tax_percent);
            $this->command->info("Import Tax Percent: " . $product->import_tax_percent);
            $this->command->info("====================");
            $this->command->info("                    ");
        }
    }

    /**
     * @param \Illuminate\Support\Collection $products
     * @return void
     */
    public function basketSeededAndFilled(Collection $products)
    {

        $this->command->info("Created basket, added " . count($products) . " products.");
        $this->command->info("                                                        ");
    }

    public function receiptCreated(Receipt $receipt)
    {

        $this->command->info("Created receipt with ID => " . $receipt->id . ".");
        $this->command->info("                                                ");
    }
}
