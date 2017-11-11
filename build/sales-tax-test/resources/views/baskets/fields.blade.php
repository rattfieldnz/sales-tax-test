<!-- Receipt Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('receipt_id', 'Receipt Id:') !!}
    {!! Form::number('receipt_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('baskets.index') !!}" class="btn btn-default">Cancel</a>
</div>
