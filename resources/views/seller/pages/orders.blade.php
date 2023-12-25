@extends('seller.layouts.main')
@section('content')
<div class="row mt-5">
  <div class="pl-4">
  </div>
    <div class="card">
        <h5 class="card-header">ALL Orders</h5>
        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead class="table-light">
              <tr>
                <th>#ID</th>
                <th>Client Name</th>
                <th>total</th>
        
                <th>action</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              @foreach ($order_just as $order)
                      <tr>
                          <td>{{$order->id}}</td>
                          <td>{{$order->user->name}}</td>
                          <td>{{$order->total}}</td>
                          <td>
                              <a href="#" class="btn btn-success"><i class='bx bxs-send'></i></a>
                              <a href="#" class="btn btn-danger"><i class='bx bx-trash'></i></a>
                              <a href="{{ route('seller_show_order_detals', $order->id) }}" class="btn btn-info"><i class='bx bxs-info-circle'></i></a>
                          </td>
                      </tr>
              @endforeach
          </tbody>
          
          </table>
        </div>
      </div>    
</div>
@endsection