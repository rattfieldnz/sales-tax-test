<?php

namespace App\Functions;

use App\Interfaces\ProductInterface;
use App\Models\Product;

/**
 * Class ProductFunctions
 *
 * @author  Rob Attfield <emailme@robertattfield.com> <http://www.robertattfield.com>
 * @package App\Functions
 */
class ProductFunctions implements ProductInterface
{
    private $product;

    /**
     * ProductFunctions constructor.
     *
     * @param \App\Models\Product $product
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Get the description of a product.
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->product->description;
    }

    /**
     * Get the sales tax percentage for a product.
     *
     * @return int
     */
    public function getSalesTaxPercentage(): int
    {
        return intval($this->product->sales_tax_percent);
    }

    /**
     * Get the import tax percentage for a product.
     *
     * @return int
     */
    public function getImportTaxPercentage(): int
    {
        return intval($this->product->import_tax_percent);
    }

    /**
     * Get the price of a product.
     *
     * @return float
     */
    public function getPrice()
    {
        return floatval($this->product->price);
    }

    /**
     * Get the basic sales tax cost for a product.
     *
     * @return float|int
     */
    public function getSalesTaxCost()
    {
        $productPrice = $this->getPrice();
        $taxPercent = $this->getSalesTaxPercentage();

        return Number::calculateTax($productPrice, $taxPercent);
    }

    /**
     * Get the import tax cost for a product.
     *
     * @return float|int
     */
    public function getImportTaxCost()
    {
        $productPrice = $this->getPrice();
        $taxPercent = $this->getImportTaxPercentage();

        return Number::calculateTax($productPrice, $taxPercent);
    }

    /**
     * Get the products cost, only inclusive of it's sales tax.
     *
     * @return float|int
     */
    public function getSalesTaxPrice()
    {
        return $this->getPrice() + $this->getSalesTaxCost();
    }

    /**
     * Get the products cost, only inclusive of it's import tax.
     *
     * @return float|int
     */
    public function getImportTaxPrice()
    {
        return $this->getPrice() + $this->getImportTaxCost();
    }

    /**
     * Get the final cost of a product.
     *
     * @return float|int
     */
    public function finalCost()
    {
        return $this->getPrice() + $this->getSalesTaxCost() + $this->getImportTaxCost();
    }
}
