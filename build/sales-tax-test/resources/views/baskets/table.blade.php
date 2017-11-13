<table class="table table-responsive" id="baskets-table">
    <thead>
        <tr>
            <th>Receipt</th>
            <th>Basket Contents</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($baskets as $basket)
        @php
            $basketFunctions = new \App\Functions\BasketFunctions($basket);
        @endphp
        <tr>
            <td>
                @if(!empty($basket->receipt_id))
                {!! link_to(route('receipts.show', $basket->receipt_id), "Receipt #" . $basket->receipt_id) !!}
                @endif
            </td>
            <td>
                <ul>
                @foreach($basketFunctions->getProducts() as $p)
                    <li>
                        {!! count($basketFunctions->getProducts()->where('id', '=', $p->id)->all()) !!} x
                        {!! $p->description !!} @ {!! money_format('%i',$p->price) !!}
                        ({!! money_format('%i',(new \App\Functions\ProductFunctions($p))->finalCost()) !!} incl. taxes)
                    </li>
                @endforeach
                </ul>
            </td>
            <td>
                {!! Form::open(['route' => ['baskets.destroy', $basket->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('baskets.show', [$basket->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('baskets.edit', [$basket->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>