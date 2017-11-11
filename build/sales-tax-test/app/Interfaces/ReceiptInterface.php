<?php
/**
 * Created by PhpStorm.
 * User: robattfield
 * Date: 11/11/2017
 * Time: 20:26
 */

namespace App\Interfaces;

/**
 * Interface ReceiptInterface

 * @author  Rob Attfield <emailme@robertattfield.com> <http://www.robertattfield.com>
 * @package App\Interfaces
 */
interface ReceiptInterface
{
    public function getBasket();

    public function getProducts();

    public function getFinalProductCostTotal();

    public function getSalesTaxTotal();

    public function getImportTaxTotal();

    public function getFinalTaxesTotal();

    public function getFinalReceiptTotal();

    public function getReceiptContent();
}