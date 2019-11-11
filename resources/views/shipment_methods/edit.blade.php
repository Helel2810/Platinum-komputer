@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Shipment Method
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($shipmentMethod, ['route' => ['shipmentMethods.update', $shipmentMethod->id], 'method' => 'patch']) !!}

                        @include('shipment_methods.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection