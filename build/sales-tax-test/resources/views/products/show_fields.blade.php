<!-- Id Field -->
@auth
<div class="form-group">
    <p>{!! Form::label('id', 'Id:') !!} {!! $product->id !!}</p>
</div>
@endauth

<!-- Description Field -->
<div class="form-group">
    <p>{!! Form::label('description', 'Description:') !!} {!! $product->description !!}</p>
</div>

<!-- Price Field -->
<div class="form-group">
    <p>{!! Form::label('price', 'Price:') !!} {!! money_format('%i',$product->price) !!}</p>
</div>

<!-- Sales Tax Percent Field -->
<div class="form-group">
    <p>{!! Form::label('sales_tax_percent', 'Sales Tax Percent:') !!} {!! $product->sales_tax_percent !!}</p>
</div>

<!-- Import Tax Percent Field -->
<div class="form-group">
    <p>{!! Form::label('import_tax_percent', 'Import Tax Percent:') !!} {!! $product->import_tax_percent !!}</p>
</div>

<div class="form-group">
    <p>{!! Form::label('final_product_cost', 'Price Incl. Taxes:') !!} {!! money_format('%i',$priceIncludingTaxes) !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    <p>{!! Form::label('created_at', 'Created At:') !!} {!! $product->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    <p>{!! Form::label('updated_at', 'Updated At:') !!} {!! $product->updated_at !!}</p>
</div>

@if(!empty($product->deleted_at))
<!-- Deleted At Field -->
<div class="form-group">
    <p>{!! Form::label('deleted_at', 'Deleted At:') !!} {!! $product->deleted_at !!}</p>
</div>
@endif

