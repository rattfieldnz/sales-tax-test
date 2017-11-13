<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $product->id !!}</p>
</div>

<!-- Description Field -->
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    <p>{!! $product->description !!}</p>
</div>

<!-- Price Field -->
<div class="form-group">
    {!! Form::label('price', 'Price:') !!}
    <p>{!! money_format('%i',$product->price) !!}</p>
</div>

<!-- Sales Tax Percent Field -->
<div class="form-group">
    {!! Form::label('sales_tax_percent', 'Sales Tax Percent:') !!}
    <p>{!! $product->sales_tax_percent !!}</p>
</div>

<!-- Import Tax Percent Field -->
<div class="form-group">
    {!! Form::label('import_tax_percent', 'Import Tax Percent:') !!}
    <p>{!! $product->import_tax_percent !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $product->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $product->updated_at !!}</p>
</div>

<!-- Deleted At Field -->
<div class="form-group">
    {!! Form::label('deleted_at', 'Deleted At:') !!}
    <p>{!! $product->deleted_at !!}</p>
</div>

