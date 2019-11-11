@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Purchase Invoice
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($purchaseInvoice, ['route' => ['purchaseInvoices.update', $purchaseInvoice->id], 'method' => 'patch']) !!}

                        @include('purchase_invoices.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection