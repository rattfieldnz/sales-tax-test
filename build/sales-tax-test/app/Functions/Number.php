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
     * @param           $num
     * @param float|int $nearest
     *
     * @return float
     */
    public static function roundNumber($num, $nearest = 5)
    {
        return floatval(self::roundUpToX($num, $nearest));
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


    /**
     * @param $number
     * @param int      $nearest
     * @see https://github.com/ikr/money-math-php/blob/master/src/MoneyMath/Decimal2.php#L336
     *
     * @return \MoneyMath\Decimal2
     */
    public static function roundUpToX($number, int $nearest = 0) {
        $dc2Number = new Decimal2(strval($number));
        $lastDigit = intval(substr(strval($dc2Number), -1));
        $addition = 0;

        if($nearest == 0){
            return $number;
        }

        if (gmp_mod($lastDigit, $nearest) != 0) {
            $addition = '0.0' . strval($nearest - ($lastDigit % 5));
        }

        return floatval(strval(Decimal2::plus($dc2Number, new Decimal2($addition))));
    }
}
