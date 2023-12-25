@extends('user.layouts.main')

@section('content')
    <!-- Shopping Cart Area Start -->
    <div class="container-fluid">
        <h2>YOUR CARD SHOPPING</h2>
        <div class="row">
            <div class="col-12">

                @php
                $totalPrice = 0; // Initialize total price variable
            @endphp
            @foreach ($card_elements as $item) <!-- Fix typo here, change $card_elements to $item -->
                @php
                    $totalPrice += $item->price; // Update total price
                @endphp
            @endforeach
                <form action="{{ route('update_cart') }}" method="POST">
                    @csrf
                    <div class="table-content table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="li-product-remove">remove</th>
                                    <th class="li-product-thumbnail">images</th>
                                    <th class="cart-product-name">Product</th>
                                    <th class="li-product-price">Unit Price</th>
                                    <th class="li-product-quantity">Quantity</th>
                                    <th class="li-product-subtotal">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($card_elements as $card_element)
                                    <tr>
                                        <td class="li-product-remove"><a href="{{ route('delete.card', $card_element->id) }}"><i class="fa fa-times"></i></a></td>
                                        <td class="li-product-thumbnail"><img style="width: 25%" src="{{ asset('storage/images/products/' . $card_element->image) }}" alt="Li's Product Image"></td>
                                        <td class="li-product-name"><a href="{{ route('details', $card_element->product_id) }}">{{ $card_element->product_name }}</a></td>
                                        <td class="li-product-price"><span class="amount">${{ $card_element->price_one }}</span></td>
                                        <td class="quantity">
                                            <label>Quantity</label>
                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box" value="{{ $card_element->quantity }}" name="quantity[{{ $card_element->id }}]" type="text">
                                                <input type="hidden" name="price[{{ $card_element->id }}]" value="{{$card_element->price_one }}">
                                                <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                            </div>
                                        </td>
                                        <td class="product-subtotal"><span class="amount">${{ $card_element->price }}</span></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="coupon-all">
                                <div class="coupon">
                                    <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Coupon code" type="text">
                                    <input class="button" name="apply_coupon" value="Apply coupon" type="submit">
                                </div>
                                <div class="coupon2">
                                    <input class="button" name="update_cart" value="Update cart" type="submit">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                      
                        <div class="col-md-5 ml-auto">
                            <div class="cart-page-total">
                                <h2>Cart totals</h2>
                                <ul>
                                    <li>Total <span>${{ $totalPrice }}</span></li>
                                </ul>
                                <a href="{{route('checkout')}}" class="mb-4">Proceed to checkout</a>
                            </div>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
    <!-- Shopping Cart Area End -->
@endsection
