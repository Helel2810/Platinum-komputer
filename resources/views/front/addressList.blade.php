@extends('front.layouts.app')

@section('content')
  <!-- MAIN -->
  <main class="site-main checkout">

          <div class="container">

              <ol class="breadcrumb-page">

                  <li><a href="#">Home </a></li>

                  <li><a href="#">profile </a></li>

                  <li class="active"><a href="#">Address</a></li>

              </ol>

          </div>

          <div class="container">

            <div class="row">
              @include('front.layouts.profileSideBar')

              <div class="col-sm-9 border-before">
                <div class="row">
                  @if(count(Auth::user()->addresses)>0)
                    @foreach(Auth::user()->addresses as $address)
                    <div class="card">
                      <div class="card-header">
                        {{$address->recipient_name}}
                      </div>
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item">{{$address->address}}</li>
                        <li class="list-group-item">{{$address->district->name}}, {{$address->district->city->name}}, {{$address->district->city->province->name}}</li>
                        <li class="list-group-item">tel: {{$address->phone}}</li>
                        <li class="list-group-item">
                          <form action="{{route('frontDeleteAddress', $address->id)}}" method="post">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger">Delete</button>
                          </form>
                        </li>

                      </ul>
                    </div>
                    @endforeach
                  @endif
                  <a href="{{route('frontAddressForm')}}" class="button">Add new address</a>
                </div>
              </div>

            </div>



          </div>

  </main>
  <!-- end MAIN -->
@endsection
