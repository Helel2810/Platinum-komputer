@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Admin Role
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($adminRole, ['route' => ['adminRoles.update', $adminRole->id], 'method' => 'patch']) !!}

                        @include('admin_roles.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection