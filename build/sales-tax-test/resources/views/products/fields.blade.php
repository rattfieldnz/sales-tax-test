<!-- Description Field -->
<div class="form-group col-sm-6">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::text('description', null, ['class' => 'form-control']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Price:') !!}
    {!! Form::number('price', null, ['class' => 'form-control']) !!}
</div>

<!-- Sales Tax Percent Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sales_tax_percent', 'Sales Tax Percent:') !!}
    {!! Form::number('sales_tax_percent', null, ['class' => 'form-control']) !!}
</div>

<!-- Import Tax Percent Field -->
<div class="form-group col-sm-6">
    {!! Form::label('import_tax_percent', 'Import Tax Percent:') !!}
    {!! Form::number('import_tax_percent', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('products.index') !!}" class="btn btn-default">Cancel</a>
</div>
