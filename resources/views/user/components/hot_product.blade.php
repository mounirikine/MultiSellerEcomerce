<section class="product-area li-laptop-product li-tv-audio-product pb-45">
    <div class="container">
        <div class="row">
            <!-- Begin Li's Section Area -->
            <div class="col-lg-12 mt-3">
                <div class="li-section-title">
                    <h2>
                        <span>Hot Deals Products</span>
                    </h2>
                    
                </div>
                <div class="row">
                    <div class="product-active owl-carousel">
                        @foreach ($products as $product)
                            <div class="col-lg-12">
                                <!-- single-product-wrap start -->
                                
                                    <div class="single-product-wrap">
                                        <div class="product-image">
                                            <a href="single-product.html">
                                                <img src="{{ asset('storage/images/products/' . $product->image) }}"
                                                    alt="Li's Product Image" style="height:220px">
                                            </a>
                                            <span class="sticker">New</span>
                                        </div>
                                        <div class="product_desc">
                                            <div class="product_desc_info">
                                                <div class="product-review">
                                                    <h5 class="manufacturer">
                                                        <a href="shop-left-sidebar.html">{{ $product->category->name }} / <br> {{ $product->subcategory->name }}</a> 
                                                    </h5>
                                                    <div class="rating-box">
                                                        <ul class="rating">
                                                            @for ($i = 1; $i <= 5; $i++)
                                                                @if ($i <= $product->rating)
                                                                    <li><i class="fa fa-star"></i></li>
                                                                @else
                                                                    <li><i class="fa fa-star-o"></i></li>
                                                                @endif
                                                            @endfor
                                                        </ul>

                                                    </div>
                                                </div>
                                                <h4><a class="product_name"
                                                        href="single-product.html">{{ Str::limit($product->product_name, 45, '...') }}</a></h4>
                                                
                                                        <form action="{{ route('addToCard') }}" method="post">
                                                                    <div
                                                    class="price-box d-flex justify-content-between align-items-center">
                                                    <span class="new-price">${{ $product->price }}</span>
                                                    <span class="new-price"><input type="number" name="quantity"
                                                            placeholder="Qte" min="1" value="1"
                                                            style="width:60px"></span>
                                                </div>
                                            </div>

                                            <div class="add-actions">
                                                <ul class="add-actions-link">
                                                    
                                                    <li class="add-cart active">

                                                       
                                                        <input type="hidden" name="price_one"
                                                            value="{{ $product->price }}">
                                                        <input type="hidden" name="product_name"
                                                            value="{{ $product->product_name }}">
                                                        <input type="hidden" name="image"
                                                            value="{{ $product->image }}">
                                                        <input type="hidden" name="product_id"
                                                            value="{{ $product->id }}">
                                                        @csrf
                                                        <button type="submit" 
                                                            style="background: transparent;border:none;cursor: pointer;">Add to cart</button>

                                                    </li>
                                                    </form>
                                                    <li>
                                                   

                                                        <form action="{{ route('add.to.wishlist') }}" method="post">
                                                            @csrf
                                                            <input type="hidden" value="{{$product->product_name }}" name="product_name" />
                                                            <input type="hidden" value="{{$product->image}}" name="image" />
                                                            <input type="hidden" value="{{$product->price }}" name="price_one" />
                                                            <input type="hidden" value="{{$product->status }}" name="status" />
                                                            <input type="hidden" value="{{$product->id }}" name="product_id" />
                                                           
                                                            <button type="submit" style="background: transparent;border:none;cursor: pointer;" class="links-details">
                                                                <i class="fa fa-heart-o"></i>
                                                            </button>
                                                        </form>

                                                    </li>
                                                    <li><a class="quick-view"  href="{{route('details',$product->id)}}">
                                                        <i class="fa fa-eye"></i></a>
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
            </div>
            <!-- Li's Section Area End Here -->
        </div>
    </div>
</section>

<!-- Owl Carousel CSS CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

<!-- Owl Carousel JS CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
    // Add this script to initialize Owl Carousel with autoplay and loop options
    $(document).ready(function () {
        $(".product-active").owlCarousel({
            items: 1, // Number of items to display in the slider
            loop: true, // Enable infinite loop
            autoplay: true, // Enable automatic sliding
            autoplayTimeout: 5000, // Autoplay interval in milliseconds (adjust as needed)
            autoplayHoverPause: true, // Pause autoplay on hover
            nav: true, // Display navigation buttons (optional)
            dots: true // Display navigation dots (optional)
            // Add other options as needed
        });
    });
</script>