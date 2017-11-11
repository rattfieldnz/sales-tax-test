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
        return $this->product->sales_tax_percent;
    }

    /**
     * Get the import tax percentage for a product.
     *
     * @return int
     */
    public function getImportTaxPercentage(): int
    {
        return $this->product->import_tax_percent;
    }

    /**
     * Get the price of a product.
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->product->price;
    }

    /**
     * Get the basic sales tax cost for a product.
     *
     * @return float|int
     */
    public function getSalesTaxCost()
    {
        return $this->getPrice() * ($this->getSalesTaxPercentage()/100);
    }

    /**
     * Get the import tax cost for a product.
     *
     * @return float|int
     */
    public function getImportTaxCost()
    {
        return $this->getPrice() * ($this->getImportTaxPercentage()/100);
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