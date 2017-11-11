<li class="{{ Request::is('products*') ? 'active' : '' }}">
    <a href="{!! route('products.index') !!}"><i class="fa fa-edit"></i><span>Products</span></a>
</li>
<li class="{{ Request::is('baskets*') ? 'active' : '' }}">
    <a href="{!! route('baskets.index') !!}"><i class="fa fa-edit"></i><span>Baskets</span></a>

<li class="{{ Request::is('receipts*') ? 'active' : '' }}">
    <a href="{!! route('receipts.index') !!}"><i class="fa fa-edit"></i><span>Receipts</span></a>
</li>

