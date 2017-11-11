<?php

namespace App\Models;

use App\Models\Basket;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Receipt
 * @package App\Models
 * @version November 11, 2017, 2:59 pm NZDT
 * @author  Rob Attfield <emailme@robertattfield.com> <http://www.robertattfield.com>
 *
 * @property \Illuminate\Database\Eloquent\Collection Basket
 * @property \Illuminate\Database\Eloquent\Collection productsBaskets
 * @property decimal final_product_cost_total
 * @property decimal sales_tax_total
 * @property decimal import_tax_total
 * @property decimal final_taxes_total
 * @property decimal final_receipt_total
 * @property string receipt_content
 */
class Receipt extends Model
{
    use SoftDeletes;

    public $table = 'receipts';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'final_product_cost_total',
        'sales_tax_total',
        'import_tax_total',
        'final_taxes_total',
        'final_receipt_total',
        'receipt_content'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'receipt_content' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function basket()
    {
        return $this->belongsTo(Basket::class);
    }
}
