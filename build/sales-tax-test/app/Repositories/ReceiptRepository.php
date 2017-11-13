<?php

namespace App\Repositories;

use App\Models\Receipt;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ReceiptRepository
 *
 * @author  Rob Attfield <emailme@robertattfield.com> <http://www.robertattfield.com>
 * @package App\Repositories
 * @version November 13, 2017, 9:27 am NZDT
 *
 * @method Receipt findWithoutFail($id, $columns = ['*'])
 * @method Receipt find($id, $columns = ['*'])
 * @method Receipt first($columns = ['*'])
 */
class ReceiptRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'final_product_cost_total',
        'sales_tax_total',
        'import_tax_total',
        'final_taxes_total',
        'final_receipt_total',
        'receipt_content'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Receipt::class;
    }
}
