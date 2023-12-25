@extends('user.layouts.main')
@section('content')
    <style>
        .button-class:hover {
            color: rgb(251, 198, 101);
        }
    </style>
    <div class="modal-content mb-4">
        <div class="modal-body">
            {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button> --}}
            <div class="modal-inner-area row">
                <div class="col-lg-5 col-md-6 col-sm-6">
                    <!-- Product Details Left -->
                    <div class="product-details-left">
                        <div class="product-details-images slider-navigation-1">
                            <div class="lg-image">
                                <img src="{{ asset('storage/images/products/' . $product->image) }}" alt="product image">
                            </div>
                            {{-- <div class="lg-image">
                            <img src="{{asset('user/images/product/large-size/2.jpg')}}" alt="product image">
                        </div>
                        <div class="lg-image">
                            <img src="{{asset('user/images/product/large-size/3.jpg')}}" alt="product image">
                        </div>
                        <div class="lg-image">
                            <img src="{{asset('user/images/product/large-size/4.jpg')}}" alt="product image">
                        </div>
                        <div class="lg-image">
                            <img src="{{asset('user/images/product/large-size/5.jpg')}}" alt="product image">
                        </div>
                        <div class="lg-image">
                            <img src="{{asset('user/images/product/large-size/6.jpg')}}" alt="product image">
                        </div> --}}
                        </div>

                    </div>
                    <!--// Product Details Left -->
                </div>


                <div class="col-lg-7 col-md-6 col-sm-6">
                    <div class="product-details-view-content pt-60">
                        <div class="product-info">
                            <h2>{{ $product->product_name }}</h2>
                            {{-- <span class="product-details-ref">Reference:{{$product->seller_id}} </span> <br> --}}
                            <span class="product-details-ref">{{ $product->category->name }} /
                                {{ $product->subcategory->name }} </span> <br>
                            <span class="product-details-ref text-success">{{ $product->status }} </span> <br>
                            <div class="rating-box pt-20">
                                <ul class="rating rating-with-review-item">

                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $product->rating)
                                            <li><i class="fa fa-star"></i></li>
                                        @else
                                            <li><i class="fa fa-star-o"></i></li>
                                        @endif
                                    @endfor

                                </ul>
                            </div>
                            <div class="price-box pt-10">
                                <del class="text-gray">${{ $product->old_price }}</del> <br>
                                <span class="new-price new-price-2">${{ $product->price }}</span> <br>

                            </div>
                            <div class="product-desc">
                                <p>
                                    <span>
                                        {{ $product->description }}
                                    </span>
                                </p>
                            </div>
                            <div class="product-variants">
                                <div class="produt-variants-size ">
                                    <label>Dimension</label>
                                    <select class="nice-select">
                                        <option value="1" title="S" selected="selected">
                                            40x60cm</option>
                                        <option value="2" title="M">60x90cm</option>
                                        <option value="3" title="L">80x120cm</option>
                                    </select>
                                </div>
                            </div>
                            <div class="single-add-to-cart mt-3">
                                <form action="{{ route('addToCard') }}" method="post">

                                    <div class="quantity">
                                        <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box" min="1" value="1" type="text"
                                                name="quantity">
                                            <div class="dec qtybutton"><i class="fa fa-angle-down"></i>
                                            </div>
                                            <div class="inc qtybutton"><i class="fa fa-angle-up"></i>
                                            </div>
                                        </div>
                                    </div>

                                    <input type="hidden" name="price_one" value="{{ $product->price }}">
                                    <input type="hidden" name="product_name" value="{{ $product->product_name }}">
                                    <input type="hidden" name="image" value="{{ $product->image }}">
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    @csrf
                                    <button class="add-to-cart btn btn-warning w-25 mt-2" type="submit">Add to
                                        cart</button>
                                </form>
                                <!-- Bootstrap collapsible alert -->

                            </div>
                            <div class="product-additional-info pt-25">


                                <form action="{{ route('add.to.wishlist') }}" method="post">
                                    @csrf
                                    <input type="hidden" value="{{ $product->product_name }}" name="product_name" />
                                    <input type="hidden" value="{{ $product->image }}" name="image" />
                                    <input type="hidden" value="{{ $product->price }}" name="price_one" />
                                    <input type="hidden" value="{{ $product->status }}" name="status" />
                                    <input type="hidden" value="{{ $product->id }}" name="product_id" />

                                    <button type="submit" class="button-class"
                                        style="background: transparent; border: none; cursor: pointer;">
                                        <i class="fa fa-heart-o"></i>Add to wishlist
                                    </button>
                                </form>


                                <div class="product-social-sharing pt-25">
                                    <ul>
                                        <li class="facebook"><a href="#"><i class="fa fa-facebook"></i>Facebook</a>
                                        </li>
                                        <li class="twitter"><a href="#"><i class="fa fa-twitter"></i>Twitter</a></li>
                                        <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i>Google
                                                +</a></li>
                                        <li class="instagram"><a href="#"><i class="fa fa-instagram"></i>Instagram</a>
                                        </li>
                                    </ul>
                                </div>



                            </div>
                        </div>

                    </div>
                </div>


            </div>
        </div>
    </div>

    <div class="container mb-4">

        <h4 class="mb-4 ml-2">Related items</h4>
        <div class="row">
            <div class="product-active owl-carousel mb-4">
                @foreach ($recommended_products as $recommended_product)
                    <div class="col-lg-12 " style="z-index: 1000;margin-bottom:100px">
                        <!-- single-product-wrap start -->

                        <div class="single-product-wrap">
                            <div class="product-image">
                                <a href="single-product.html">
                                    <img src="{{ asset('storage/images/products/' . $recommended_product->image) }}"
                                        alt="Li's Product Image" style="height: 220px">
                                </a>
                            </div>
                            <div class="product_desc">
                                <div class="product_desc_info">
                                    <div class="product-review">
                                        <h5 class="manufacturer">
                                            <a href="shop-left-sidebar.html">{{ $recommended_product->category->name }}
                                                /{{ $recommended_product->subcategory->name }} </a>
                                        </h5>
                                        <div class="rating-box">
                                            <ul class="rating">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($i <= $recommended_product->rating)
                                                        <li><i class="fa fa-star"></i></li>
                                                    @else
                                                        <li><i class="fa fa-star-o"></i></li>
                                                    @endif
                                                @endfor
                                            </ul>

                                        </div>
                                    </div>
                                    <h4><a class="product_name"
                                            href="single-product.html">{{ Str::limit($recommended_product->product_name, 45, '...') }}</a>
                                    </h4>

                                    <form action="{{ route('addToCard') }}" method="post">
                                        <div class="price-box d-flex justify-content-between align-items-center">
                                            <span class="new-price">${{ $recommended_product->price }}</span>
                                            <span class="new-price"><input type="number" name="quantity"
                                                    placeholder="Qte" min="1" value="1"
                                                    style="width:60px"></span>
                                        </div>
                                </div>

                                <div class="add-actions">
                                    <ul class="add-actions-link">

                                        <li class="add-cart active">


                                            <input type="hidden" name="price_one" value="{{ $recommended_product->price }}">
                                            <input type="hidden" name="product_name"
                                                value="{{ $recommended_product->product_name }}">
                                            <input type="hidden" name="image" value="{{ $recommended_product->image }}">
                                            <input type="hidden" name="product_id" value="{{ $recommended_product->id }}">
                                            @csrf
                                            <button type="submit"
                                                style="background: transparent;border:none;cursor: pointer;">Add to
                                                cart</button>

                                        </li>
                                        </form>
                                        <li>


                                            <form action="{{ route('add.to.wishlist') }}" method="post">
                                                @csrf
                                                <input type="hidden" value="{{ $recommended_product->product_name }}"
                                                    name="product_name" />
                                                <input type="hidden" value="{{ $recommended_product->image }}" name="image" />
                                                <input type="hidden" value="{{ $recommended_product->price }}" name="price_one" />
                                                <input type="hidden" value="{{ $recommended_product->status }}" name="status" />
                                                <input type="hidden" value="{{ $recommended_product->id }}" name="product_id" />

                                                <button type="submit"
                                                    style="background: transparent;border:none;cursor: pointer;"
                                                    class="links-details">
                                                    <i class="fa fa-heart-o"></i>
                                                </button>
                                            </form>

                                        </li>
                                        <li><a class="quick-view" href="{{ route('details', $recommended_product->id) }}"><i
                                                    class="fa fa-eye"></i></a>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>

                        <!-- single-product-wrap end -->
                    </div>
                @endforeach

            </div>
        </div>

        <!-- Begin Footer Newsletter Area -->
        <div class="footer-newsletter">
            <h4>Add Comment for This Item </h4>
            <form action="{{ route('comment') }}" method="post" class="footer-subscribe-form validate">
                @csrf
                <div id="mc_embed_signup_scroll">
                    <div id="mc-form" class="mc-form subscribe-form form-group">
                        <input type="hidden" name="user_id" value="{{ $user_id }}">
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="text" placeholder="Enter your comment" name="content" />
                        <button class="btn" type="submit">Send</button>
                    </div>
                </div>
            </form>
            

            <div class="customer-reviews">
                <h4>Customer Reviews (122)</h4>
                <h1 style="font-size: 4rem">{{ $product->rating }},5</h1>
                <ul class="rating rating-with-review-item">
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= $product->rating)
                            <li><i class="fa fa-star"></i></li>
                        @else
                            <li><i class="fa fa-star-o"></i></li>
                        @endif
                    @endfor
                </ul>

                <span class="comments-label">All Comments ({{$comments->count()}})</span>
                <ul class="comments-list mt-4">
                  
                    @foreach ($comments as $comment)
                    <li class="comment-item d-flex justify-content-between mb-2" style="width:100%;padding:10px 5px ;border:0.1px solid rgba(0, 0, 0, 0.144)">
                        <div class="d-flex">
                            <div>
                                <img src="{{ asset('storage/images/products/' . $comment->user->image) }}" alt="image_profile"
                    class="rounded" width="40px" />
                               
                            </div>
                            <div class="comment-content">
                                <div>
                                    <span class="user-name"
                                        style="font-size: 13px;color:rgb(74, 74, 74);margin-left:10px">{{$comment->user->name}}</span>
                                    <div class="comment-text" style="margin-left: 20px">{{$comment->content}}</div>
                                </div>
                            </div>
                        </div>

                        <div class="comment-meta">
                            <span class="comment-date" style="font-size: 13px; color: rgb(74, 74, 74); margin-left: 10px">
                                {{ \Carbon\Carbon::parse($comment->created_at)->format('Y - M - d') }}
                            </span>
                            <span class="comment-likes">
                                ({{$comment->likes}}) <i class="fa fa-heart-o"></i>
                            </span>
                        </div>

                    </li>

                    

                    @endforeach
                  
                  
                </ul>

            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var likeButtons = document.querySelectorAll('.comment-likes');

            likeButtons.forEach(function(likeButton) {
                likeButton.addEventListener('click', function() {
                    // Toggle the 'liked' class on the heart icon
                    likeButton.querySelector('i').classList.toggle('fa-heart-o');
                    likeButton.querySelector('i').classList.toggle('fa-heart');
                });
            });
        });
    </script>
@endsection


