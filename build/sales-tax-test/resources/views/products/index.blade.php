@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Products</h1>
        @auth
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('products.create') !!}">Add New</a>
        </h1>
        @endauth
    </section>
    <div class="content">
        <div class="clearfix"></div>
        @include('partials._breadcrumbs')

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('products.table')
            </div>
        </div>
    </div>
@endsection

