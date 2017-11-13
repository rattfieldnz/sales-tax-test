<?php

namespace App\Repositories;

use App\Models\Basket;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class BasketRepository
 *
 * @author  Rob Attfield <emailme@robertattfield.com> <http://www.robertattfield.com>
 * @package App\Repositories
 * @version November 13, 2017, 9:30 am NZDT
 *
 * @method Basket findWithoutFail($id, $columns = ['*'])
 * @method Basket find($id, $columns = ['*'])
 * @method Basket first($columns = ['*'])
 */
class BasketRepository extends BaseRepository
{
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
