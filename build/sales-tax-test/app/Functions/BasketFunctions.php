<?php

namespace App\Functions;

use App\Interfaces\BasketInterface;
use App\Models\Basket;
use App\Models\Product;
use App\Models\Receipt;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class BasketFunctions
 *
 * @author  Rob Attfield <emailme@robertattfield.com> <http://www.robertattfield.com>
 * @package App\Functions
 */
class BasketFunctions implements BasketInterface
{
    private $basket;

    public function __construct(Basket $basket)
    {
        $this->basket = $basket;
    }

    /**
     * Get the receipt associated with the basket.
     *
     * @return \Illuminate\Database\Eloquent\Model|static
     */
    public function getReceipt()
    {
        return $this->basket->receipt()->firstOrFail();
    }

    /**
     * Get the products that are in the basket.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getProducts()
    {
        return $this->basket->products()->get();
    }

    /**
     * Add a collection of products to a basket.
     *
     * @param \Illuminate\Database\Eloquent\Collection $products
     * @param \App\Models\Basket                       $basket
     */
    public static function addProducts(Collection $products, Basket $basket){
        if(!empty($basket)){
            foreach($products as $p){
                if($p instanceof Product)
                {
                    $basket->products()->attach($p->id);
                }
            }
        }
    }

    /**
     * Get the total cost of products in the basket,
     * excluding all taxes.
     *
     * @return mixed
     */
    public function getProductsCostTotal()
    {
        return $this->getProducts()->sum('price');
    }

    /**
     * Get the total sales tax of products in the basket.
     *
     * @return float|int
     */
    public function getProductsSalesTaxTotal()
    {
        $salesTaxTotal = 0.0;

        foreach($this->getProducts() as $product){
            $salesTaxTotal += (new ProductFunctions($product))->getSalesTaxCost();
        }

        return $salesTaxTotal;
    }

    /**
     * Get the total import tax of products in the basket.
     *
     * @return float|int
     */
    public function getProductsImportTaxTotal()
    {
        $importTaxTotal = 0.0;

        foreach($this->getProducts() as $product){
            $importTaxTotal += (new ProductFunctions($product))->getImportTaxCost();
        }

        return $importTaxTotal;
    }

    /**
     * Get the final tax total of products in the basket.
     *
     * @return float|int
     */
    public function getFinalTaxesTotal()
    {
        return $this->getProductsSalesTaxTotal() +
            $this->getProductsImportTaxTotal();
    }

    /**
     * Get the final costs, taxes included,
     * of products in the basket.
     *
     * @return float|int|mixed
     */
    public function getFinalTotalCosts()
    {
        return $this->getProductsCostTotal() +
            $this->getFinalTaxesTotal();
    }

    /**
     * Create and return a receipt for the current basket.
     *
     * @return \App\Models\Receipt
     */
    public function createReceipt()
    {
        $contentBody = "";
        $finalProductsCost = 0.0;
        $salesTaxTotal = 0.0;
        $importTaxTotal = 0.0;

        $count = 1;
        foreach($this->getProducts() as $product){
            $productCount = count($this->getProducts()->where('id', '=', $product->id)->all());

            $productDescription = (new ProductFunctions($product))->getDescription();
            $costsTaxInclusive = (new ProductFunctions($product))->finalCost();
            $finalProductsCost += ($costsTaxInclusive * $productCount);
            $salesTaxTotal += ((new ProductFunctions($product))->getSalesTaxCost() * $productCount);
            $importTaxTotal += ((new ProductFunctions($product))->getImportTaxCost() * $productCount);

            $contentBody .= $productCount . ' ' . $productDescription . ': ' . $costsTaxInclusive;
            $count != count($this->getProducts()) ? $contentBody . "\n" : $contentBody . "";
            $count++;
        }

        $receipt = new Receipt(
            [
            'final_product_cost_total' => $finalProductsCost,
            'sales_tax_total' => $salesTaxTotal,
            'import_tax_total' => $importTaxTotal,
            'final_taxes_total' => $salesTaxTotal + $importTaxTotal,
            'final_receipt_total' => $finalProductsCost + $salesTaxTotal + $importTaxTotal,
            'receipt_content' => $contentBody
            ]
        );

        $receipt->save();

        if(!empty($receipt)) {
            $this->basket->receipt_id = $receipt->id;
            $this->basket->save();
        }

        return $receipt;

    }
}
