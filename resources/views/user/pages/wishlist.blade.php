@extends('user.layouts.main')
@section('content')
<div class="container-fluid mb-4">
    <h2>YOUR WISHLIST
        <i class="fa fa-heart-o " style="color: red"></i>

    </h2>
    <div class="row">
        <div class="col-12">
            
                <div class="table-content table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="li-product-remove">remove</th>
                                <th class="li-product-thumbnail">images</th>
                                <th class="cart-product-name">Product</th>
                                <th class="li-product-price">Unit Price</th>
                                <th class="li-product-stock-status">Stock Status</th>
                                <th class="li-product-add-cart">add to cart</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                                @foreach ($wishlist_elements as $wishlist_element)
                                    <tr>
                                        <form action="{{ route('addToCard') }}" method="post">
                                            @csrf
                                        <td class="li-product-remove"><a href="{{ route('delete.wishlist', $wishlist_element->id) }}"><i class="fa fa-times"></i></a></td>
                                        <td class="li-product-thumbnail"><a href="{{ route('details', $wishlist_element->product_id) }}"><img style="width: 25%" src="{{ asset('storage/images/products/' . $wishlist_element->image) }}" alt=""></a></td>
                                        <td class="li-product-name"><a href="{{ route('details', $wishlist_element->product_id) }}">{{ $wishlist_element->product_name }}</a></td>
                                        <td class="li-product-price"><span class="amount">${{ $wishlist_element->price_one }}</span></td>
                                        <td class="li-product-stock-status"><span class="in-stock text-success">{{ $wishlist_element->status }}</span></td>
                                        <td class="li-product-add-cart">
                                            <input type="hidden" name="price_one" value="{{ $wishlist_element->price_one }}">
                                            <input type="hidden" name="product_id" value="{{ $wishlist_element->product_id }}">
                                            <input type="hidden" name="product_name" value="{{ $wishlist_element->product_name }}">
                                            <input type="hidden" name="image" value="{{ $wishlist_element->image }}">
                                            <input type="hidden" name="quantity" value="1">
                                            <button type="submit" class="btn bg-dark text-light" style="background: transparent">add to cart</button>
                                        </td>
                                    </form>
                                    </tr>
                                @endforeach
                          
                            



                        </tbody>
                    </table>
                </div>
         
        </div>
    </div>
</div>
@endsection