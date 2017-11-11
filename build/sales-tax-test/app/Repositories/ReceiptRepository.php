<?php

namespace App\Repositories;

use App\Models\Receipt;
use Illuminate\Container\Container as Application;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ReceiptRepository
 *
 * @package App\Repositories
 * @version November 11, 2017, 2:59 pm NZDT
 * @author  Rob Attfield <emailme@robertattfield.com> <http://www.robertattfield.com>
 *
 * @method Receipt findWithoutFail($id, $columns = ['*'])
 * @method Receipt find($id, $columns = ['*'])
 * @method Receipt first($columns = ['*'])
 */
class ReceiptRepository extends BaseRepository
{
    /**
     * ReceiptRepository constructor.
     *
     * @param \Illuminate\Container\Container $app
     */
    public function __construct(Application $app)
    {
        parent::__construct($app);
    }

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
