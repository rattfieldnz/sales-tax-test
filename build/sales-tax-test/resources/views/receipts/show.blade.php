@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Receipt for Input {{ $receipt->id }} test
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>
        @include('partials._breadcrumbs')

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('receipts.show_fields')
                    <a href="{!! route('receipts.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
