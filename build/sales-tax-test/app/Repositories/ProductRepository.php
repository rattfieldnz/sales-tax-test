<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Container\Container as Application;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProductRepository
 *
 * @package App\Repositories
 * @version November 11, 2017, 1:43 pm NZDT
 * @author  Rob Attfield <emailme@robertattfield.com> <http://www.robertattfield.com>
 *
 * @method Product findWithoutFail($id, $columns = ['*'])
 * @method Product find($id, $columns = ['*'])
 * @method Product first($columns = ['*'])
 */
class ProductRepository extends BaseRepository
{
    /**
     * ProductRepository constructor.
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
        'description',
        'price',
        'sales_tax_percent',
        'import_tax_percent'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Product::class;
    }
}
