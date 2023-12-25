@extends('seller.layouts.main')
@section('content')
<div class="row mt-5">
  <div class="pl-4">
    <a href="{{route('add.product')}}" class="btn mb-3 float-end  btn-primary w-25">ADD PRODUCT</a>
  </div>
    <div class="card">
        <h5 class="card-header">ALL PRODUCTS</h5>
        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead class="table-light">
              <tr>
                <th>#ID</th>
                <th>seller id</th>
                <th>name</th>
                <th>description</th>
                <th>price</th>
                <th>old price</th>
                <th>ratting</th>
                <th>subcategories</th>
                <th>category</th>              
                <th>image</th>
                <th>quantity</th>
                <th>status</th>
                <th>action</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->seller_id}}</td>
                    <td>{{ Str::limit($product->product_name, 40, '...') }}</td>
                    <td>{{ Str::limit($product->description, 45, '...') }}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->old_price}}</td>
                    <td>{{$product->rating}}</td>
                    <td>{{$product->subcategory->name}}</td>
                    <td>{{$product->category->name}}</td>
                    <td><img src="{{asset('storage/images/products/' . $product->image)}}"class=" h-auto rounded-circle" width="60" height="60" /></td>
                    <td>{{$product->quantity}}</td>
                    <td>{{$product->status}}</td>
                    <td>
                      <a href="{{route('edit.product' ,$product->id )}}" class="btn btn-success"><i class='bx bxs-edit'></i></a>
                      <a href="{{route('delete.product' ,$product->id )}}" class="btn btn-danger"><i class='bx bx-trash'></i></a>
                    </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>    
</div>
@endsection