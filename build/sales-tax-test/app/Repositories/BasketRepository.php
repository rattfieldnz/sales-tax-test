<?php

namespace App\Repositories;

use App\Models\Basket;
use Illuminate\Container\Container as Application;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class BasketRepository
 * @package App\Repositories
 * @version November 11, 2017, 1:44 pm NZDT
 * @author  Rob Attfield <emailme@robertattfield.com> <http://www.robertattfield.com>
 *
 * @method Basket findWithoutFail($id, $columns = ['*'])
 * @method Basket find($id, $columns = ['*'])
 * @method Basket first($columns = ['*'])
*/
class BasketRepository extends BaseRepository
{
    /**
     * BasketRepository constructor.
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
        'receipt_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Basket::class;
    }
}
