<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Product
 *
 * @package App\Models
 * @version November 11, 2017, 1:43 pm NZDT
 * @author  Rob Attfield <emailme@robertattfield.com> <http://www.robertattfield.com>
 *
 * @property \Illuminate\Database\Eloquent\Collection productsBaskets
 * @property string description
 * @property float price
 * @property integer sales_tax_percent
 * @property integer import_tax_percent
 */
class Product extends Model
{
    use SoftDeletes;

    public $table = 'products';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'description',
        'price',
        'sales_tax_percent',
        'import_tax_percent'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'description' => 'string',
        'price' => 'float',
        'sales_tax_percent' => 'integer',
        'import_tax_percent' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'description' => 'required|string|min:2|max:255',
        'price' => 'required|float|min:0.0|max:9999.99',
        'sales_tax_percent' => 'required|integer|min:0',
        'import_tax_percent' => 'required|integer|min:0'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function baskets()
    {
        return $this->belongsToMany(Basket::class, 'products_baskets');
    }
}
