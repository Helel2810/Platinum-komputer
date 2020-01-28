@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Product Comment
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($productComment, ['route' => ['productComments.update', $productComment->id], 'method' => 'patch']) !!}

                        @include('product_comments.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection