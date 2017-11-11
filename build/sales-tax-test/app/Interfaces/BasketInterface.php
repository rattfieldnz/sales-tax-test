<?php
/**
 * Created by PhpStorm.
 * User: robattfield
 * Date: 11/11/2017
 * Time: 20:25
 */

namespace App\Interfaces;

/**
 * Interface BasketInterface

 * @author  Rob Attfield <emailme@robertattfield.com> <http://www.robertattfield.com>
 * @package App\Interfaces
 */
interface BasketInterface
{
    public function getReceipt();
    public function getProducts();
}
