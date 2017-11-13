@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Basket
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>
        @include('partials._breadcrumbs')

        @include('flash::message')

        @include('adminlte-templates::common.errors')

        <div class="clearfix"></div>
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'baskets.store']) !!}

                        @include('baskets.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
