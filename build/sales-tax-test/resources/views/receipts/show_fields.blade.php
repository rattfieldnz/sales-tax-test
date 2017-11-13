<!-- Id Field -->
<!--<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $receipt->id !!}</p>
</div>-->

<!-- Final Product Cost Total Field -->
<!--<div class="form-group">
    {!! Form::label('final_product_cost_total', 'Final Product Cost Total:') !!}
    <p>{!! money_format('%i',$receipt->final_product_cost_total) !!}</p>
</div>-->

<!-- Sales Tax Total Field -->
<!--<div class="form-group">
    {!! Form::label('sales_tax_total', 'Sales Tax Total:') !!}
    <p>{!! money_format('%i',$receipt->sales_tax_total) !!}</p>
</div>-->

<!-- Import Tax Total Field -->
<!--<div class="form-group">
    {!! Form::label('import_tax_total', 'Import Tax Total:') !!}
    <p>{!! money_format('%i',$receipt->import_tax_total) !!}</p>
</div>-->

<!-- Final Taxes Total Field -->
<!--<div class="form-group">
    {!! Form::label('final_taxes_total', 'Final Taxes Total:') !!}
    <p>{!! money_format('%i',$receipt->final_taxes_total) !!}</p>
</div>-->

<!-- Final Receipt Total Field -->
<!--<div class="form-group">
    {!! Form::label('final_receipt_total', 'Final Receipt Total:') !!}
    <p>{!! money_format('%i',$receipt->final_receipt_total) !!}</p>
</div>-->

<!-- Receipt Content Field -->
<!--<div class="form-group">
    {!! Form::label('receipt_content', 'Receipt Content:') !!}
    <p>{!! $receipt->receipt_content !!}</p>
</div>-->

<!-- Created At Field -->
<!--<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $receipt->created_at !!}</p>
</div>-->

<!-- Updated At Field -->
<!--<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $receipt->updated_at !!}</p>
</div>-->

<!-- Deleted At Field -->
<!--<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $receipt->deleted_at !!}</p>
</div>-->

<div class="form-group">

    <div class="row">
        <div class="col-sm-3 input-test">
            <p><strong>Input {{ $receipt->id }}:</strong></p>
            @foreach($receipt->products()->get() as $p)
                <p>
                    {!! $basketFunctions->getProductCount($p) !!}
                    {!! $p->description !!} at
                    {!! money_format('%i',(new \App\Functions\ProductFunctions($p))->getPrice()) !!}
                </p>
            @endforeach
        </div>
        <div class="col-sm-3 output-test">
            <p><strong>Output {{ $receipt->id }}:</strong></p>
            @foreach($receipt->products()->get() as $p)
                <p>
                    {!! $basketFunctions->getProductCount($p) !!}
                    {!! $p->description !!}:
                    {!! money_format('%i',(new \App\Functions\ProductFunctions($p))->finalCost()) !!}
                </p>
            @endforeach
            <p>Sales Taxes: {!! $totalTaxes !!}</p>
            <p>Total: {!! $finalReceiptTotal !!}</p>
        </div>
    </div>

</div>
