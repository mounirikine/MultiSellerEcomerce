@extends('seller.layouts.main')
@section('content')
<div class="col-md-12">
  <div class="row">
    <div class="card-body">
      <a href="" class="btn btn-danger w-25">Download as PDF</a>
    </div>
  </div>
    <div class="card">
     <div class="row p-2">
      <div class="col-lg-6">
        @if($order_total)
          <span class="card-header">Client Name : <b> {{$order_total->user->name}}</b></span> <br>
          <span class="card-header">Client Phone : <b> {{$order_total->user->phone}}</b></span>
        @endif
      </div>
      <div class="col-lg-6">
        @if($order_total)
          <span class="card-header">Client Email : <b> {{$order_total->user->email}}</b></span> <br>
          <span class="card-header">Date Order : <b> {{$order_total->created_at}}</b></span>
        @endif
      </div>
     </div>

      <div class="card-body">
        <hr>
        @if($order_total)
          <span><span class="notificationRequest"><strong>TOTAL :  ${{$order_total->total}}</strong></span></span>  <br>
          <span><span class="notificationRequest"><strong>ORDER N : {{$order_total->id}}</strong></span></span> 
        @else
          <p>No order details available.</p>
        @endif
        <div class="error"></div>
        <hr>
      </div>
      <div class="table-responsive">
        <table class="table table-striped table-borderless border-bottom">
          <thead>
            <tr>
              <th class="text-nowrap text-center">Product Name</th>
              <th class="text-nowrap text-center">Price</th>
              <th class="text-nowrap text-center">Image</th>
              <th class="text-nowrap text-center">Quantity</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($order_products as $order_product)
            @if ($order_product->product->seller_id == Auth::user()->id)
            <tr>
                <td class="text-nowrap text-center">{{$order_product->product->product_name}}</td>
                <td class="text-nowrap text-center">{{$order_product->product->price}}</td>
                <td class="text-nowrap text-center">
                  <img src="{{asset('storage/images/products/' . $order_product->product->image)}}" class="h-auto rounded-circle" width="60" height="60" />
                </td>
                <td class="text-nowrap text-center">{{$order_product->quantity}}</td>
              </tr>
              @endif
            @empty
              <tr>
                <td colspan="4">No products in this order.</td>
              </tr>

             
            @endforelse
          </tbody>
        </table>
      </div>
      <div class="card-body">
        @if($order_total)
          <a href="" class="btn btn-success w-100">CONFIRM ORDER AS DONE</a>
        @endif
      </div>
      <!-- /Notifications -->
    </div>
  </div>
@endsection
