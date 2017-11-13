<table class="table table-responsive" id="receipts-table">
    <thead>
        <tr>
            <th></th>
            <th>Final Product Cost Total</th>
            <th>Sales Tax Total</th>
            <th>Import Tax Total</th>
            <th>Final Taxes Total</th>
            <th>Final Receipt Total</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($receipts as $receipt)
        <tr>
            <td>
                <strong>
                    <a href="{!! route('receipts.show', $receipt->id) !!}">
                        Input {{ $receipt->id }} Receipt (Output {{ $receipt->id }})
                    </a>
                </strong>
            </td>
            <td>{!! money_format('%i',$receipt->final_product_cost_total) !!}</td>
            <td>{!! money_format('%i',$receipt->sales_tax_total) !!}</td>
            <td>{!! money_format('%i',$receipt->import_tax_total) !!}</td>
            <td>{!! money_format('%i',$receipt->final_taxes_total) !!}</td>
            <td>{!! money_format('%i',$receipt->final_receipt_total) !!}</td>
            <td>
                {!! Form::open(['route' => ['receipts.destroy', $receipt->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('receipts.show', [$receipt->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('receipts.edit', [$receipt->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>