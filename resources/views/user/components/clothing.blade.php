<section class="product-area li-laptop-product li-tv-audio-product pb-45">
    <div class="container">
        <div class="row">
            <!-- Begin Li's Section Area -->
            <div class="col-lg-12 mt-3">
                <div class="li-section-title">
                    <h2>
                        <span>Clothing / Beauty</span>
                    </h2>
                    <ul class="li-sub-category-list">
                        @foreach ($categoryNames_cothing as $categoryName)
                            <li><a href="{{ url('/', $categoryName->name) }}">{{ $categoryName->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="row">
                    <div class="mt-2"
                        style="display: grid; grid-template-columns: repeat(5, 1fr); justify-content:space-between; align-items: center;">
                        @foreach ($Clothing as $Electronic)
                            <div class="col-lg-12 mt-4 product-item">
                                <!-- single-product-wrap start -->

                                <div class="single-product-wrap">
                                    <div class="product-image">
                                        <a href="{{ route('details', $Electronic->id) }}">
                                            <img src="{{ asset('storage/images/products/' . $Electronic->image) }}"
                                                alt="Li's Product Image" style="height:220px">
                                        </a>

                                    </div>
                                    <div class="product_desc">
                                        <div class="product_desc_info">
                                            <div class="product-review">
                                                <h5 class="manufacturer">
                                                    <a href="{{ route('details', $Electronic->id) }}">{{ $Electronic->category->name }}
                                                        / <br> {{ $Electronic->subcategory->name }}</a>
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
                                                    href="{{ route('details', $Electronic->id) }}">{{ Str::limit($Electronic->product_name, 45, '...') }}</a>
                                            </h4>
                                            <form action="{{ route('addToCard') }}" method="post">
                                                <div
                                                    class="price-box d-flex justify-content-between align-items-center">
                                                    <span class="new-price">${{ $Electronic->price }}</span>
                                                    <span class="new-price"><input type="number" name="quantity"
                                                            placeholder="Qte" min="1" value="1"
                                                            style="width:60px"></span>
                                                </div>
                                        </div>

                                        <div class="add-actions">
                                            <ul class="add-actions-link">

                                                <li class="add-cart active">


                                                    <input type="hidden" name="price_one"
                                                        value="{{ $Electronic->price }}">
                                                    <input type="hidden" name="product_name"
                                                        value="{{ $Electronic->product_name }}">
                                                    <input type="hidden" name="image"
                                                        value="{{ $Electronic->image }}">
                                                    <input type="hidden" name="product_id"
                                                        value="{{ $Electronic->id }}">
                                                    @csrf
                                                    <button type="submit"
                                                        style="background: transparent;border:none;cursor: pointer;">Add
                                                        to cart</button>

                                                </li>
                                                </form>
                                                <li>


                                                    <form action="{{ route('add.to.wishlist') }}" method="post">
                                                        @csrf
                                                        <input type="hidden" value="{{ $Electronic->product_name }}"
                                                            name="product_name" />
                                                        <input type="hidden" value="{{ $Electronic->image }}"
                                                            name="image" />
                                                        <input type="hidden" value="{{ $Electronic->price }}"
                                                            name="price_one" />
                                                        <input type="hidden" value="{{ $Electronic->status }}"
                                                            name="status" />
                                                        <input type="hidden" value="{{ $Electronic->id }}"
                                                            name="product_id" />

                                                        <button type="submit"
                                                            style="background: transparent;border:none;cursor: pointer;"
                                                            class="links-details">
                                                            <i class="fa fa-heart-o"></i>
                                                        </button>
                                                    </form>

                                                </li>
                                                <li><a class="quick-view"
                                                        href="{{ route('details', $Electronic->id) }}"><i
                                                            class="fa fa-eye"></i></a></li>
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
<div class="p-4 mt-4 w-100">
    <button class="btn btn-warning w-25" id="show-more-btn" style="margin-inline:40%">Show More ...</button>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Select the product items and 'Show More' button
        const productItems = document.querySelectorAll('.product-item');
        const showMoreBtn = document.getElementById('show-more-btn');

        // Set the number of initially visible products
        const initialVisibleProducts = 10;
        let visibleProducts = initialVisibleProducts;

        // Hide additional products initially
        productItems.forEach(function(product, index) {
            if (index >= initialVisibleProducts) {
                product.style.display = 'none';
            }
        });

        // Add click event listener to 'Show More' button
        showMoreBtn.addEventListener('click', function() {
            // Show the next set of products
            for (let i = visibleProducts; i < visibleProducts + initialVisibleProducts; i++) {
                if (productItems[i]) {
                    productItems[i].style.display = 'grid';
                }
            }

            // Update the number of visible products
            visibleProducts += initialVisibleProducts;

            // Hide the 'Show More' button if all products are visible
            if (visibleProducts >= productItems.length) {
                showMoreBtn.style.display = 'none';
            }
        });
    });
</script>
