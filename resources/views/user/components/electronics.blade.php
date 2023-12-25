<section class="product-area li-laptop-product li-tv-audio-product pb-45">
    <div class="container">
        <div class="row">
            <!-- Begin Li's Section Area -->
            <div class="col-lg-12 mt-3">
                <div class="li-section-title">
                    <h2>Electronics</h2>
                    <ul class="li-sub-category-list">
                        @foreach ($categoryElectronics as $categoryName)
                            <li><a href="{{ url('/category', $categoryName->name) }}">{{ $categoryName->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="row">
                    <div class="product-active owl-carousel">
                        @foreach ($Electronics as $Electronic) 
                            <div class="col-lg-12">
                                <!-- single-product-wrap start -->
                                <div id="product-{{ $Electronic->id }}" class="single-product-wrap">
                                    <div class="product-image">
                                        <a href="single-product.html">
                                            <img src="{{ asset('storage/images/products/' . $Electronic->image) }}"
                                                alt="Li's Product Image" style="height:220px">
                                        </a>
                                    </div>
                                    <div class="product_desc">
                                        <div class="product_desc_info">
                                            <div class="product-review">
                                                <h5 class="manufacturer">
                                                    <a href="shop-left-sidebar.html">{{ $Electronic->category->name }} / <br> {{ $Electronic->subcategory->name }}</a>
                                                </h5>
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
                                            </div>
                                            <h4><a class="product_name"
                                                    href="single-product.html">{{ Str::limit($Electronic->product_name, 45, '...') }}</a>
                                            </h4>
                                          
                                           <div class="d-flex gap-2 align-items-center">
                                            <span class="new-price">${{ $Electronic->price }}</span>
                                            <span class="new-price" style="color: gray">$<del>{{ $Electronic->old_price }}</del></span>
                                            
                                           </div>

                                            <div class="add-actions" style="bottom:0">
                                                <ul class="add-actions-link" style="transform:translateY(60px)">
                                                    <li class="add-cart active">
                                                        
                                                        <form class="add-to-cart-form" data-product-id="{{ $Electronic->id }}" data-route="{{ route('addToCard') }}" method="post">
                                                           <input type="hidden" name="quantity" placeholder="Qte" min="1" value="1" >
                                                            <input type="hidden" name="price_one" value="{{ $Electronic->price }}">
                                                            <input type="hidden" name="product_name" value="{{ $Electronic->product_name }}">
                                                            <input type="hidden" name="image" value="{{ $Electronic->image }}">
                                                            <input type="hidden" name="product_id" value="{{ $Electronic->id }}">
                                                            
                                                            @csrf
                                                            <button type="button" class="add-to-cart-button" style="background: transparent; border:none; cursor: pointer;">Add to cart</button>
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
                                                            <button type="submit" style="background: transparent; border:none; cursor: pointer;" class="links-details">
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

<ul id="cart-items"></ul>

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
