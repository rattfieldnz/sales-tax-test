<!-- Receipt Id Field -->
<div class="form-group col-sm-6">
    @php
        $fieldAttributes = ['class' => 'form-control'];
        if(!empty($basket->receipt_id)){
            $fieldAttributes['disabled'] = 'disabled';
        }
    @endphp
    {!! Form::label('receipt_id', 'Receipt Id:') !!}
    {!! Form::number('receipt_id', null, $fieldAttributes) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('baskets.index') !!}" class="btn btn-default">Cancel</a>
</div>
