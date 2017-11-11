<?php
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * Class Basket
 *
 * @package App\Models
 * @version November 11, 2017, 1:44 pm NZDT
 * @property \App\Models\Receipt receipt
 * @property \Illuminate\Database\Eloquent\Collection productsBaskets
 * @property integer receipt_id
 * @property int $id
 * @property int $receipt_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property \Carbon\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Product[] $products
 * @property-read \App\Models\Receipt $receipt
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Basket onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Basket whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Basket whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Basket whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Basket whereReceiptId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Basket whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Basket withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Basket withoutTrashed()
 */
	class Basket extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Product
 *
 * @package App\Models
 * @version November 11, 2017, 1:43 pm NZDT
 * @property \Illuminate\Database\Eloquent\Collection productsBaskets
 * @property string description
 * @property decimal price
 * @property integer sales_tax_percent
 * @property integer import_tax_percent
 * @property int $id
 * @property string $description
 * @property float $price
 * @property int $sales_tax_percent
 * @property int $import_tax_percent
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property \Carbon\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Basket[] $baskets
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Product onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereImportTaxPercent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereSalesTaxPercent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Product withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Product withoutTrashed()
 */
	class Product extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Receipt
 *
 * @package App\Models
 * @version November 11, 2017, 2:59 pm NZDT
 * @property \Illuminate\Database\Eloquent\Collection Basket
 * @property \Illuminate\Database\Eloquent\Collection productsBaskets
 * @property decimal final_product_cost_total
 * @property decimal sales_tax_total
 * @property decimal import_tax_total
 * @property decimal final_taxes_total
 * @property decimal final_receipt_total
 * @property string receipt_content_total
 * @property int $id
 * @property float $final_product_cost_total
 * @property float $sales_tax_total
 * @property float $import_tax_total
 * @property float $final_taxes_total
 * @property float $final_receipt_total
 * @property string $receipt_content_total
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property \Carbon\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Basket[] $baskets
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Receipt onlyTrashed()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Receipt whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Receipt whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Receipt whereFinalProductCostTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Receipt whereFinalReceiptTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Receipt whereFinalTaxesTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Receipt whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Receipt whereImportTaxTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Receipt whereReceiptContentTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Receipt whereSalesTaxTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Models\Receipt whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Receipt withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Receipt withoutTrashed()
 */
	class Receipt extends \Eloquent {}
}

