@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Sliders</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('sliders.create') !!}">Add New</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
              {!! Form::open(['route' => 'sliders.store', 'files' => true]) !!}

              <!-- Image Field -->
              <div class="form-group col-sm-6">
                  {!! Form::label('image1', 'Image1:') !!}
                  {!! Form::file('image1', null, ['class' => 'form-control']) !!}
              </div>

              <div class="form-group col-sm-6">
                  {!! Form::label('image2', 'Image2:') !!}
                  {!! Form::file('image2', null, ['class' => 'form-control']) !!}
              </div>

              <div class="form-group col-sm-6">
                  {!! Form::label('image3', 'Image3:') !!}
                  {!! Form::file('image3', null, ['class' => 'form-control']) !!}
              </div>

              <!-- Submit Field -->
              <div class="form-group col-sm-12">
                  {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                  <a href="{!! route('sliders.index') !!}" class="btn btn-default">Cancel</a>
              </div>

              {!! Form::close() !!}

            </div>
        </div>
        <div class="text-center">

        </div>
    </div>
@endsection
