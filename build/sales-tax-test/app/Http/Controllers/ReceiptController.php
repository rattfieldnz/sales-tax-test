<?php

namespace App\Http\Controllers;

use App\Functions\BasketFunctions;
use App\Http\Requests\CreateReceiptRequest;
use App\Http\Requests\UpdateReceiptRequest;
use App\Models\Basket;
use App\Repositories\ReceiptRepository;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ReceiptController
 *
 * @author  Rob Attfield <emailme@robertattfield.com> <http://www.robertattfield.com>
 * @package App\Http\Controllers
 */
class ReceiptController extends AppBaseController
{
    /**
     * @var  ReceiptRepository 
     */
    private $receiptRepository;

    public function __construct(ReceiptRepository $receiptRepo)
    {
        $this->receiptRepository = $receiptRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the Receipt.
     *
     * @param  Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->receiptRepository->pushCriteria(new RequestCriteria($request));
        $receipts = $this->receiptRepository->all();

        return view('receipts.index')
            ->with('receipts', $receipts);
    }

    /**
     * Show the form for creating a new Receipt.
     *
     * @return Response
     */
    public function create()
    {
        return view('receipts.create');
    }

    /**
     * Store a newly created Receipt in storage.
     *
     * @param CreateReceiptRequest $request
     *
     * @return Response
     */
    public function store(CreateReceiptRequest $request)
    {
        $input = $request->all();

        $receipt = $this->receiptRepository->create($input);

        Flash::success('Receipt saved successfully.');

        return redirect(route('receipts.index'));
    }

    /**
     * Display the specified Receipt.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $receipt = $this->receiptRepository->findWithoutFail($id);

        if (empty($receipt)) {
            Flash::error('Receipt not found');

            return redirect(route('receipts.index'));
        }
        $basket = $receipt->basket()->first();

        /**
 * @var Basket $basket 
*/
        $basketFunctions = new BasketFunctions($basket);
        $receiptProducts = $receipt->products()->get();
        $totalTaxes = money_format('%i', $basketFunctions->getFinalTaxesTotal());
        $finalReceiptTotal = money_format('%i', $basketFunctions->getFinalTotalCosts());

        return view('receipts.show')
            ->with('receipt', $receipt)
            ->with('basketFunctions', $basketFunctions)
            ->with('receiptProducts', $receiptProducts)
            ->with('totalTaxes', $totalTaxes)
            ->with('finalReceiptTotal', $finalReceiptTotal);
    }

    /**
     * Show the form for editing the specified Receipt.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $receipt = $this->receiptRepository->findWithoutFail($id);

        if (empty($receipt)) {
            Flash::error('Receipt not found');

            return redirect(route('receipts.index'));
        }

        return view('receipts.edit')->with('receipt', $receipt);
    }

    /**
     * Update the specified Receipt in storage.
     *
     * @param int                  $id
     * @param UpdateReceiptRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateReceiptRequest $request)
    {
        $receipt = $this->receiptRepository->findWithoutFail($id);

        if (empty($receipt)) {
            Flash::error('Receipt not found');

            return redirect(route('receipts.index'));
        }

        $receipt = $this->receiptRepository->update($request->all(), $id);

        Flash::success('Receipt updated successfully.');

        return redirect(route('receipts.index'));
    }

    /**
     * Remove the specified Receipt from storage.
     *
     * @param int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $receipt = $this->receiptRepository->findWithoutFail($id);

        if (empty($receipt)) {
            Flash::error('Receipt not found');

            return redirect(route('receipts.index'));
        }

        $this->receiptRepository->delete($id);

        Flash::success('Receipt deleted successfully.');

        return redirect(route('receipts.index'));
    }
}
