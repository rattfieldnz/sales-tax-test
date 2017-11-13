<table class="table table-responsive" id="products-table">
    <thead>
        <tr>
            @auth<th>ID</th>@endauth
            <th>Description</th>
            <th>Price</th>
            <th>Sales Tax Percent</th>
            <th>Import Tax Percent</th>
            <th>Price Incl. Taxes</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($products as $product)
        <tr>
            @auth<td>{!! $product->id !!}</td>@endauth
            <td>{!! $product->description !!}</td>
            <td>{!! money_format('%i',$product->price) !!}</td>
            <td>{!! $product->sales_tax_percent !!}</td>
            <td>{!! $product->import_tax_percent !!}</td>
            <td>{!! money_format('%i',(new \App\Functions\ProductFunctions($product))->finalCost()) !!}</td>
            <td>
                @auth{!! Form::open(['route' => ['products.destroy', $product->id], 'method' => 'delete']) !!}@endauth
                <div class='btn-group'>
                    <a href="{!! route('products.show', [$product->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    @auth<a href="{!! route('products.edit', [$product->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>@endauth
                    @auth{!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}@endauth
                </div>
                @auth{!! Form::close() !!}@endauth
            </td>
        </tr>
    @endforeach
    </tbody>
</table>