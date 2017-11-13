@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Receipt #{{ $receipt->id }}
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
                   {!! Form::model($receipt, ['route' => ['receipts.update', $receipt->id], 'method' => 'patch']) !!}

                        @include('receipts.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection