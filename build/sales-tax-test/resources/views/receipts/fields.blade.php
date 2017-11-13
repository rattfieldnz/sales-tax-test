<!-- Final Product Cost Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('final_product_cost_total', 'Final Product Cost Total:') !!}
    {!! Form::number('final_product_cost_total', null, ['class' => 'form-control']) !!}
</div>

<!-- Sales Tax Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sales_tax_total', 'Sales Tax Total:') !!}
    {!! Form::number('sales_tax_total', null, ['class' => 'form-control']) !!}
</div>

<!-- Import Tax Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('import_tax_total', 'Import Tax Total:') !!}
    {!! Form::number('import_tax_total', null, ['class' => 'form-control']) !!}
</div>

<!-- Final Taxes Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('final_taxes_total', 'Final Taxes Total:') !!}
    {!! Form::number('final_taxes_total', null, ['class' => 'form-control']) !!}
</div>

<!-- Final Receipt Total Field -->
<div class="form-group col-sm-6">
    {!! Form::label('final_receipt_total', 'Final Receipt Total:') !!}
    {!! Form::number('final_receipt_total', null, ['class' => 'form-control']) !!}
</div>

<!-- Receipt Content Field -->
<div class="form-group col-sm-12 col-lg-12">
    {!! Form::label('receipt_content', 'Receipt Content:') !!}
    {!! Form::textarea('receipt_content', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('receipts.index') !!}" class="btn btn-default">Cancel</a>
</div>
