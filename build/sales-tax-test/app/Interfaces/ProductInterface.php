<?php

namespace App\Interfaces;

/**
 * Interface ProductInterface

 * @author  Rob Attfield <emailme@robertattfield.com> <http://www.robertattfield.com>
 * @package App\Interfaces
 */
interface ProductInterface
{
    public function getDescription();

    public function getPrice();

    public function getSalesTaxPercentage();

    public function getImportTaxPercentage();
}
