@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Receipt
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
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