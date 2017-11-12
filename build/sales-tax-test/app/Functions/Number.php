<?php

namespace App\Functions;

use MoneyMath\Decimal2;

/**
 * Class Number
 *
 * @author  Rob Attfield <emailme@robertattfield.com> <http://www.robertattfield.com>
 * @package App\Functions
 */
class Number
{
    /**
     * Round a number to the nearest x value.
     *
     * @param $num
     * @param float $nearest
     *
     * @return float
     */
    public static function roundNumber($num, $nearest = 0.05)
    {
        return floatval(round($num / $nearest, 1, 1) * $nearest);
    }

    /**
     * Calculate tax value of given price.
     *
     * @param $price
     * @param int   $taxPercent
     *
     * @return float
     */
    public static function calculateTax($price, int $taxPercent)
    {
        $tax = ($taxPercent*$price)/100;
        return self::roundNumber(self::roundUpTo5Cents($tax));
    }

    /**
     * Round up passed in value to nearest 5 cents.
     *
     * @param $value
     *
     * @return float
     */
    public static function roundUpTo5Cents($value) 
    {

        $money = new Decimal2(strval($value));
        return floatval(strval(Decimal2::roundUpTo5Cents($money)));
    }

    public static function pad($number)
    {

    }
}
