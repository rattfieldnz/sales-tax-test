<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBasketRequest;
use App\Http\Requests\UpdateBasketRequest;
use App\Repositories\BasketRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class BasketController
 *
 * @author  Rob Attfield <emailme@robertattfield.com> <http://www.robertattfield.com>
 * @package App\Http\Controllers
 */
class BasketController extends AppBaseController
{
    /**
     * @var  BasketRepository 
     */
    private $basketRepository;

    public function __construct(BasketRepository $basketRepo)
    {
        $this->basketRepository = $basketRepo;
        $this->middleware('auth');

    }

    /**
     * Display a listing of the Basket.
     *
     * @param  Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->basketRepository->pushCriteria(new RequestCriteria($request));
        $baskets = $this->basketRepository->all();

        return view('baskets.index')
            ->with('baskets', $baskets);
    }

    /**
     * Show the form for creating a new Basket.
     *
     * @return Response
     */
    public function create()
    {
        return view('baskets.create');
    }

    /**
     * Store a newly created Basket in storage.
     *
     * @param CreateBasketRequest $request
     *
     * @return Response
     */
    public function store(CreateBasketRequest $request)
    {
        $input = $request->all();

        $basket = $this->basketRepository->create($input);

        Flash::success('Basket saved successfully.');

        return redirect(route('baskets.index'));
    }

    /**
     * Display the specified Basket.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $basket = $this->basketRepository->findWithoutFail($id);

        if (empty($basket)) {
            Flash::error('Basket not found');

            return redirect(route('baskets.index'));
        }

        return view('baskets.show')->with('basket', $basket);
    }

    /**
     * Show the form for editing the specified Basket.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $basket = $this->basketRepository->findWithoutFail($id);

        if (empty($basket)) {
            Flash::error('Basket not found');

            return redirect(route('baskets.index'));
        }

        return view('baskets.edit')->with('basket', $basket);
    }

    /**
     * Update the specified Basket in storage.
     *
     * @param int                 $id
     * @param UpdateBasketRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBasketRequest $request)
    {
        $basket = $this->basketRepository->findWithoutFail($id);

        if (empty($basket)) {
            Flash::error('Basket not found');

            return redirect(route('baskets.index'));
        }

        $basket = $this->basketRepository->update($request->all(), $id);

        Flash::success('Basket updated successfully.');

        return redirect(route('baskets.index'));
    }

    /**
     * Remove the specified Basket from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $basket = $this->basketRepository->findWithoutFail($id);

        if (empty($basket)) {
            Flash::error('Basket not found');

            return redirect(route('baskets.index'));
        }

        $this->basketRepository->delete($id);

        Flash::success('Basket deleted successfully.');

        return redirect(route('baskets.index'));
    }
}
