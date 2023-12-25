

<!-- Owl Carousel CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

<div class="featured-pro-with-banner mt-sm-5 pb-sm-10 mt-xs-5 pb-xs-10">
    <div class="container">
        <div class="row">
            <!-- Begin Li's Featured Banner Area -->
            <div class="col-lg-3 text-center">
                <div class="single-banner featured-banner">
                    <div class="owl-carousel banner">
                        @foreach ($featured_publications as $index => $featured_publication)
                            <div class="item" style="animation-delay: {{$index * 3}}s;">
                                <a href="#" class="banner-link">
                                    <img src="{{ asset('storage/images/publication/' . $featured_publication->image) }}" alt="Li's Featured Banner" class="fade-in">
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
             
                
            </div>
            <!-- Li's Featured Banner Area End Here -->
            <!-- Begin Featured Product Area -->
            <div class="col-lg-9">
                <div class="featured-product pt-sm-30 pt-xs-30">
                    <div class="li-section-title">
                        <h2><span>Featured Products</span></h2>
                    </div>
                    <div class="row">

                        <div class="pro owl-carousel p-4 mb-2" >                    
                             @foreach ($featured_products as $Electronic)

                             <div class="row" style="height: 400px">
                                <div class="col-lg-12 mb-2">
                                    <div class="featured-pro-wrapper mb-30 mb-sm-25 mb-2" style="100%">
                                        <div class="product-img">
                                            <a href="product-details.html">
                                                <img src="{{ asset('storage/images/products/' . $Electronic->image) }}"
                                                    alt="Li's Product Image">
                                            </a>
                                        </div>
                                        <div class="featured-pro-content">
                                            <div class="product-review">
                                                <h5 class="manufacturer">
                                                    <a href="{{ route('details', $Electronic->id) }}">
                                                        {{ $Electronic->category->name }} / <br>
                                                        {{ $Electronic->subcategory->name }}
                                                    </a>
                                                </h5>
                                            </div>
                                            <div class="rating-box">
                                                <ul class="rating">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        @if ($i <= $Electronic->rating)
                                                            <li><i class="fa fa-star"></i></li>
                                                        @else
                                                            <li><i class="fa fa-star-o"></i></li>
                                                        @endif
                                                    @endfor
                                                </ul>
                                            </div>
                                            <h4>
                                                <a class="product_name" href="{{ route('details', $Electronic->id) }}">
                                                    {{ Str::limit($Electronic->product_name, 100, '...') }}
                                                </a>
                                            </h4>
                                            <div class=" " >
                                                <span class="old-price"><del>${{ $Electronic->old_price }}</del></span>  <br>
                                                <span class="new-price new-price-2 text-danger"><h4>$ {{ $Electronic->price }}</h4></span> <br>
                                              
                                                <span class="old-price"><span class="text-success">${{ $Electronic->status }}</span> ({{$Electronic->quantity}} in the stock)</span>  <br>
                                                {{-- <span class="discount-percentage">-7%</span> --}}

                                                
                                            </div>
                                            <div class="w-100" style="bottom:0">
                                                <ul class="add-actions-link">
                                                    <li class="add-cart active">
                                                        
                                                        <form class="add-to-cart-form" data-product-id="{{ $Electronic->id }}" data-route="{{ route('addToCard') }}" method="post">
                                                           <input type="hidden" name="quantity" placeholder="Qte" min="1" value="1" >
                                                            <input type="hidden" name="price_one" value="{{ $Electronic->price }}">
                                                            <input type="hidden" name="product_name" value="{{ $Electronic->product_name }}">
                                                            <input type="hidden" name="image" value="{{ $Electronic->image }}">
                                                            <input type="hidden" name="product_id" value="{{ $Electronic->id }}">
                                                            
                                                            @csrf
                                                            <button type="button" class="add-to-cart-button" style="background: transparent; border:none; cursor: pointer;width:100%">Add to cart</button>
                                                        </form>
                                                    </li>
                                                    <li>
                                                        <form action="{{ route('add.to.wishlist') }}" method="post">
                                                            @csrf
                                                            <input type="hidden" value="{{ $Electronic->product_name }}" name="product_name" />
                                                            <input type="hidden" value="{{ $Electronic->image }}" name="image" />
                                                            <input type="hidden" value="{{ $Electronic->price }}" name="price_one" />
                                                            <input type="hidden" value="{{ $Electronic->status }}" name="status" />
                                                            <input type="hidden" value="{{ $Electronic->id }}" name="product_id" />
                                                            <button type="submit" style="background: transparent; border:none; cursor: pointer;width:100%" class="links-details">
                                                                <i class="fa fa-heart-o"></i>
                                                            </button>
                                                        </form>
                                                    </li>
                                                    <li>
                                                        <a class="quick-view" href="{{ route('details', $Electronic->id) }}"><i class="fa fa-eye"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             </div>
                                
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- Featured Product Area End Here -->
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script>
    $(document).ready(function() {
        // Initialize Owl Carousel
        $(".pro").owlCarousel({
            items: 1,
            loop: true,
            margin: 5,
            dots: false,
            autoplay: true,
            autoplayTimeout: 3000, // 2.5 seconds
            autoplayHoverPause: true,
            animateIn: 'fadeIn', // Add animation classes
            animateOut: 'fadeOut', // Add animation classes
            responsive: {
                0: {
                    items: 1,
                }
            },
        });
    });
</script>
<script>
    $(document).ready(function() {
        // Initialize Owl Carousel
        $(".banner").owlCarousel({
            items: 1,
            loop: true,
            margin: 5,
            pagination: false,
            dots: false,
            autoplay: true,
            autoplayTimeout: 5000, // 2.5 seconds
            animateIn: 'fadeIn', // Add animation classes
            animateOut: 'fadeOut', // Add animation classes
            responsive: {
                0: {
                    items: 1,
                }
            },
        });
    });
</script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        // ... Your existing code ...

        $('.add-to-cart-button').on('click', function() {
            var form = $(this).closest('form');
            var productId = form.data('product-id');
            var route = form.data('route');
            var formData = form.serialize();

            $.ajax({
                type: 'POST',
                url: route,
                data: formData,
                success: function(data) {
                    if (data.message) {
                        // Display success message if available
                        var successAlert = $('<div class="alert alert-success alert-dismissible fade show" style="position: fixed; top: 8px; right: 5px; z-index: 11111111111" role="alert">' +
                            '<strong>Success!</strong> ' + data.message +
                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                            '<span aria-hidden="true">&times;</span>' +
                            '</button>' +
                            '</div>');

                        // Append the alert to the body
                        $('body').append(successAlert);

                        // Automatically close the alert after 5 seconds (5000 milliseconds)
                        setTimeout(function() {
                            successAlert.alert('close');
                        }, 5000);
                    }

                    // Update the cart summary dynamically
                    updateCartSummary();
                },
                error: function(error) {
                    alert('Error adding to cart');
                }
            });
        });

        // Function to update the cart summary dynamically
        function updateCartSummary() {
            // Fetch the cart items and update the cart summary
            $.ajax({
                type: 'GET',
                url: '{{ route("fetch.cart") }}',
                success: function(data) {
                    var cartItemsList = $('#cart-items');
                    cartItemsList.empty();

                    // Append each item to the cart summary
                    $.each(data, function(index, item) {
                        cartItemsList.append('<li>' + item.product_name + ' - $' + item.price + '</li>');
                    });

                    // Display session success message if available
                    if (data.session_message) {
                        alert(data.session_message);
                        // You may want to handle the session message in a more user-friendly way, such as displaying it in a specific area on your page.
                    }
                },
                error: function(error) {
                    console.log('Error fetching cart items');
                }
            });
        }
    });
</script>
   
