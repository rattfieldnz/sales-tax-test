<?php

namespace App\Functions;

use App\Interfaces\ReceiptInterface;
use App\Models\Receipt;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class ReceiptFunctions
 *
 * @author  Rob Attfield <emailme@robertattfield.com> <http://www.robertattfield.com>
 * @package App\Functions
 */
class ReceiptFunctions implements ReceiptInterface
{
    private $receipt;
    public function __construct(Receipt $receipt)
    {
        $this->receipt = $receipt;
    }

    /**
     * Get the associated basket for the receipt.
     *
     * @return \Illuminate\Database\Eloquent\Model|static
     */
    public function getBasket()
    {
        return $this->receipt->basket()->firstOrFail();
    }

    /**
     * Get products contained within the receipt.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getProducts(): Collection
    {
        return $this->receipt->products()->get();
    }

    /**
     * Get the receipt's final total for all products (excluding taxes).
     *
     * @return float
     */
    public function getFinalProductCostTotal(): float
    {
        return $this->receipt->final_product_cost_total;
    }

    /**
     * Get the sales tax total of all products.
     *
     * @return float
     */
    public function getSalesTaxTotal(): float
    {
        return $this->receipt->sales_tax_total;
    }

    /**
     * Get the import tax total of all products.
     *
     * @return float
     */
    public function getImportTaxTotal(): float
    {
        return $this->receipt->import_tax_total;
    }

    /**
     * Get the final taxes total of all products.
     *
     * @return float
     */
    public function getFinalTaxesTotal(): float
    {
        return $this->receipt->final_taxes_total;
    }

    /**
     * Get the final receipt total
     * (products total + final taxes total).
     *
     * @return float
     */
    public function getFinalReceiptTotal(): float
    {
        return $this->receipt->final_receipt_total;
    }

    /**
     * Get the receipt content body.
     *
     * @return string
     */
    public function getReceiptContent(): string
    {
        return $this->receipt->receipt_content;
    }
}
