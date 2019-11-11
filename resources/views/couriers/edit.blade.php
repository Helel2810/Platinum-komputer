@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Courier
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($courier, ['route' => ['couriers.update', $courier->id], 'method' => 'patch']) !!}

                        @include('couriers.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection