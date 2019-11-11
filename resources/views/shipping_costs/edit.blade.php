@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Shipping Cost
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($shippingCost, ['route' => ['shippingCosts.update', $shippingCost->id], 'method' => 'patch']) !!}

                        @include('shipping_costs.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection