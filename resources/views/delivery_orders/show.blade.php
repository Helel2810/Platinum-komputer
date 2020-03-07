@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Delivery Order
        </h1>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas "></i> Gravity.
                    <small class="float-right">Date: {{$deliveryOrder->order->created_at}}</small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong>Gravity, Inc.</strong><br>
                    795 Folsom Ave, Suite 600<br>
                    San Francisco, CA 94107<br>
                    Phone: (804) 123-5432<br>
                    Email: info@almasaeedstudio.com
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  To
                  <address>
                    <strong>{{$deliveryOrder->order->address->recipient_name}}</strong><br>
                    {{$deliveryOrder->order->address->address}}<br>
                    {{$deliveryOrder->order->address->district->name}}, {{$deliveryOrder->order->address->district->city->province->name}} {{$deliveryOrder->order->address->post_code}}<br>
                    Phone: {{$deliveryOrder->order->address->phone}}<br>
                    Email: {{$deliveryOrder->order->customer->email}}
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Order ID:</b> Grv{{$deliveryOrder->order->id}}<br>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <?php
                $subtotal = 0;
              ?>
              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>Product</th>
                      <th>Serial #</th>
                      <th>Category</th>
                      <th>Qty</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($deliveryOrder->order->products as $product)
                    <?php
                        $subtotal += $product->pivot->qty*$product->price;
                    ?>
                    <tr>
                      <td>{{$product->name}}</td>
                      <td>{{$product->id}}</td>
                      <td>{{$product->category->name}}</td>
                      <td>{{$product->pivot->qty}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
      <a href="{!! route('orders.index') !!}" class="btn btn-default no-print">Back</a>
      <button class="btn btn-default no-print" onclick="window.print()">Print</button>
    </section>
@endsection
