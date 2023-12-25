<section class="product-area li-trending-product pt-60 pb-45 pt-xs-50">
    <div class="container">
        <div class="row">
            <!-- Begin Li's Tab Menu Area -->
            <div class="col-lg-12">
                <div class="li-product-tab li-trending-product-tab">
                    <h2>
                        <span>Home and Furniture</span>

                    </h2>
                    <ul class="nav li-product-menu li-trending-product-menu">
                        @foreach ($Home_categories as $categoryName)
                            <li><a href="{{ url('/category', $categoryName->name) }}">{{ $categoryName->name }}</a></li>
                        @endforeach>
                    </ul>
                </div>
                <!-- Begin Li's Tab Menu Content Area -->
                <div class="tab-content li-tab-content li-trending-product-content">
                    <div id="home1" class="tab-pane show fade in active">
                        <div class="row">
                            <div class="product-active owl-carousel">
                                @foreach ($home as $home_item)
                                    <div class="col-lg-12">
                                        <!-- single-product-wrap start -->
                                        <div id="product-{{ $home_item->id }}" class="single-product-wrap">
                                            <div class="product-image">
                                                <a href="single-product.html">
                                                    <img src="{{ asset('storage/images/products/' . $home_item->image) }}"
                                                        alt="Li's Product Image" style="height:220px">
                                                </a>
                                            </div>
                                            <div class="product_desc">
                                                <div class="product_desc_info">
                                                    <div class="product-review">
                                                        <h5 class="manufacturer">
                                                            <a href="shop-left-sidebar.html">{{ $home_item->category->name }}
                                                                / <br> {{ $home_item->subcategory->name }}</a>
                                                        </h5>
                                                        <div class="rating-box">
                                                            <ul class="rating">
                                                                @for ($i = 1; $i <= 5; $i++)
                                                                    @if ($i <= $home_item->rating)
                                                                        <li><i class="fa fa-star"></i></li>
                                                                    @else
                                                                        <li><i class="fa fa-star-o"></i></li>
                                                                    @endif
                                                                @endfor
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <h4><a class="product_name"
                                                            href="single-product.html">{{ Str::limit($home_item->product_name, 45, '...') }}</a>
                                                    </h4>

                                                    <div class="d-flex gap-2 align-items-center">
                                                        <span class="new-price">${{ $home_item->price }}</span>
                                                        <span class="new-price"
                                                            style="color: gray">$<del>{{ $home_item->old_price }}</del></span>

                                                    </div>

                                                    <div class="add-actions" style="bottom:0">
                                                        <ul class="add-actions-link" style="transform:translateY(60px)">
                                                            <li class="add-cart active">

                                                                <form class="add-to-cart-form"
                                                                    data-product-id="{{ $home_item->id }}"
                                                                    data-route="{{ route('addToCard') }}"
                                                                    method="post">
                                                                    <input type="hidden" name="quantity"
                                                                        placeholder="Qte" min="1" value="1">
                                                                    <input type="hidden" name="price_one"
                                                                        value="{{ $home_item->price }}">
                                                                    <input type="hidden" name="product_name"
                                                                        value="{{ $home_item->product_name }}">
                                                                    <input type="hidden" name="image"
                                                                        value="{{ $home_item->image }}">
                                                                    <input type="hidden" name="product_id"
                                                                        value="{{ $home_item->id }}">

                                                                    @csrf
                                                                    <button type="button" class="add-to-cart-button"
                                                                        style="background: transparent; border:none; cursor: pointer;">Add
                                                                        to cart</button>
                                                                </form>
                                                            </li>
                                                            <li>
                                                                <form action="{{ route('add.to.wishlist') }}"
                                                                    method="post">
                                                                    @csrf
                                                                    <input type="hidden"
                                                                        value="{{ $home_item->product_name }}"
                                                                        name="product_name" />
                                                                    <input type="hidden"
                                                                        value="{{ $home_item->image }}"
                                                                        name="image" />
                                                                    <input type="hidden"
                                                                        value="{{ $home_item->price }}"
                                                                        name="price_one" />
                                                                    <input type="hidden"
                                                                        value="{{ $home_item->status }}"
                                                                        name="status" />
                                                                    <input type="hidden" value="{{ $home_item->id }}"
                                                                        name="product_id" />
                                                                    <button type="submit"
                                                                        style="background: transparent; border:none; cursor: pointer;"
                                                                        class="links-details">
                                                                        <i class="fa fa-heart-o"></i>
                                                                    </button>
                                                                </form>
                                                            </li>
                                                            <li>
                                                                <a class="quick-view"
                                                                    href="{{ route('details', $home_item->id) }}"><i
                                                                        class="fa fa-eye"></i></a>
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

                </div>
            </div>
            <!-- Tab Menu Content Area End Here -->
        </div>
        <!-- Tab Menu Area End Here -->
    </div>
    </div>
</section>
<section class="product-area li-trending-product pt-60 pb-45 pt-xs-50">
    <div class="container">
        <div class="row">
            <!-- Begin Li's Tab Menu Area -->
            <div class="col-lg-12">
                <div class="li-product-tab li-trending-product-tab">
                    <h2>
                        <span>Sports</span>

                    </h2>
                    <ul class="nav li-product-menu li-trending-product-menu">
                        @foreach ($categoryNames_sport as $categoryName)
                            <li><a href="{{ url('/category', $categoryName->name) }}">{{ $categoryName->name }}</a>
                            </li>
                        @endforeach>
                    </ul>
                </div>
                <!-- Begin Li's Tab Menu Content Area -->
                <div class="tab-content li-tab-content li-trending-product-content">
                    <div id="home1" class="tab-pane show fade in active">
                        <div class="row">
                            <div class="product-active owl-carousel">
                                @foreach ($sports as $sport)
                                    <div class="col-lg-12">
                                        <!-- single-product-wrap start -->
                                        <div id="product-{{ $sport->id }}" class="single-product-wrap">
                                            <div class="product-image">
                                                <a href="single-product.html">
                                                    <img src="{{ asset('storage/images/products/' . $sport->image) }}"
                                                        alt="Li's Product Image" style="height:220px">
                                                </a>
                                            </div>
                                            <div class="product_desc">
                                                <div class="product_desc_info">
                                                    <div class="product-review">
                                                        <h5 class="manufacturer">
                                                            <a href="shop-left-sidebar.html">{{ $sport->category->name }}
                                                                / <br> {{ $sport->subcategory->name }}</a>
                                                        </h5>
                                                        <div class="rating-box">
                                                            <ul class="rating">
                                                                @for ($i = 1; $i <= 5; $i++)
                                                                    @if ($i <= $sport->rating)
                                                                        <li><i class="fa fa-star"></i></li>
                                                                    @else
                                                                        <li><i class="fa fa-star-o"></i></li>
                                                                    @endif
                                                                @endfor
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <h4><a class="product_name"
                                                            href="single-product.html">{{ Str::limit($sport->product_name, 45, '...') }}</a>
                                                    </h4>

                                                    <div class="d-flex gap-2 align-items-center">
                                                        <span class="new-price">${{ $sport->price }}</span>
                                                        <span class="new-price"
                                                            style="color: gray">$<del>{{ $sport->old_price }}</del></span>

                                                    </div>

                                                    <div class="add-actions" style="bottom:0">
                                                        <ul class="add-actions-link"
                                                            style="transform:translateY(60px)">
                                                            <li class="add-cart active">

                                                                <form class="add-to-cart-form"
                                                                    data-product-id="{{ $sport->id }}"
                                                                    data-route="{{ route('addToCard') }}"
                                                                    method="post">
                                                                    <input type="hidden" name="quantity"
                                                                        placeholder="Qte" min="1"
                                                                        value="1">
                                                                    <input type="hidden" name="price_one"
                                                                        value="{{ $sport->price }}">
                                                                    <input type="hidden" name="product_name"
                                                                        value="{{ $sport->product_name }}">
                                                                    <input type="hidden" name="image"
                                                                        value="{{ $sport->image }}">
                                                                    <input type="hidden" name="product_id"
                                                                        value="{{ $sport->id }}">

                                                                    @csrf
                                                                    <button type="button" class="add-to-cart-button"
                                                                        style="background: transparent; border:none; cursor: pointer;">Add
                                                                        to cart</button>
                                                                </form>
                                                            </li>
                                                            <li>
                                                                <form action="{{ route('add.to.wishlist') }}"
                                                                    method="post">
                                                                    @csrf
                                                                    <input type="hidden"
                                                                        value="{{ $sport->product_name }}"
                                                                        name="product_name" />
                                                                    <input type="hidden" value="{{ $sport->image }}"
                                                                        name="image" />
                                                                    <input type="hidden" value="{{ $sport->price }}"
                                                                        name="price_one" />
                                                                    <input type="hidden"
                                                                        value="{{ $sport->status }}"
                                                                        name="status" />
                                                                    <input type="hidden" value="{{ $sport->id }}"
                                                                        name="product_id" />
                                                                    <button type="submit"
                                                                        style="background: transparent; border:none; cursor: pointer;"
                                                                        class="links-details">
                                                                        <i class="fa fa-heart-o"></i>
                                                                    </button>
                                                                </form>
                                                            </li>
                                                            <li>
                                                                <a class="quick-view"
                                                                    href="{{ route('details', $sport->id) }}"><i
                                                                        class="fa fa-eye"></i></a>
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
                    <div id="home2" class="tab-pane fade">
                        <div class="row">
                            <div class="product-active owl-carousel">
                                <div class="col-lg-12">
                                    <!-- single-product-wrap start -->
                                    <div class="single-product-wrap">
                                        <div class="product-image">
                                            <a href="single-product.html">
                                                <img src="{{ asset('user/images/product/large-size/11.jpg') }}"
                                                    alt="Li's Product Image">
                                            </a>
                                            <span class="sticker">New</span>
                                        </div>
                                        <div class="product_desc">
                                            <div class="product_desc_info">
                                                <div class="product-review">
                                                    <h5 class="manufacturer">
                                                        <a href="shop-left-sidebar.html">Graphic Corner</a>
                                                    </h5>
                                                    <div class="rating-box">
                                                        <ul class="rating">
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li class="no-star"><i class="fa fa-star-o"></i>
                                                            </li>
                                                            <li class="no-star"><i class="fa fa-star-o"></i>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <h4><a class="product_name" href="single-product.html">Accusantium
                                                        dolorem1</a>
                                                </h4>
                                                <div class="price-box">
                                                    <span class="new-price">$46.80</span>
                                                </div>
                                            </div>
                                            <div class="add-actions">
                                                <ul class="add-actions-link">
                                                    <li class="add-cart active"><a href="#">Add to
                                                            cart</a></li>
                                                    <li><a class="links-details" href="single-product.html"><i
                                                                class="fa fa-heart-o"></i></a></li>
                                                    <li><a class="quick-view" data-toggle="modal"
                                                            data-target="#exampleModalCenter" href="#"><i
                                                                class="fa fa-eye"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-wrap end -->
                                </div>
                                <div class="col-lg-12">
                                    <!-- single-product-wrap start -->
                                    <div class="single-product-wrap">
                                        <div class="product-image">
                                            <a href="single-product.html">
                                                <img src="{{ asset('user/images/product/large-size/7.jpg') }}"
                                                    alt="Li's Product Image">
                                            </a>
                                            <span class="sticker">New</span>
                                        </div>
                                        <div class="product_desc">
                                            <div class="product_desc_info">
                                                <div class="product-review">
                                                    <h5 class="manufacturer">
                                                        <a href="shop-left-sidebar.html">Studio Design</a>
                                                    </h5>
                                                    <div class="rating-box">
                                                        <ul class="rating">
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li class="no-star"><i class="fa fa-star-o"></i>
                                                            </li>
                                                            <li class="no-star"><i class="fa fa-star-o"></i>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <h4><a class="product_name" href="single-product.html">Mug
                                                        Today is a good day</a></h4>
                                                <div class="price-box">
                                                    <span class="new-price new-price-2">$71.80</span>
                                                    <span class="old-price">$77.22</span>
                                                    <span class="discount-percentage">-7%</span>
                                                </div>
                                            </div>
                                            <div class="add-actions">
                                                <ul class="add-actions-link">
                                                    <li class="add-cart active"><a href="#">Add to
                                                            cart</a></li>
                                                    <li><a class="links-details" href="single-product.html"><i
                                                                class="fa fa-heart-o"></i></a></li>
                                                    <li><a class="quick-view" data-toggle="modal"
                                                            data-target="#exampleModalCenter" href="#"><i
                                                                class="fa fa-eye"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-wrap end -->
                                </div>
                                <div class="col-lg-12">
                                    <!-- single-product-wrap start -->
                                    <div class="single-product-wrap">
                                        <div class="product-image">
                                            <a href="single-product.html">
                                                <img src="{{ asset('user/images/product/large-size/9.jpg') }}"
                                                    alt="Li's Product Image">
                                            </a>
                                            <span class="sticker">New</span>
                                        </div>
                                        <div class="product_desc">
                                            <div class="product_desc_info">
                                                <div class="product-review">
                                                    <h5 class="manufacturer">
                                                        <a href="shop-left-sidebar.html">Graphic Corner</a>
                                                    </h5>
                                                    <div class="rating-box">
                                                        <ul class="rating">
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li class="no-star"><i class="fa fa-star-o"></i>
                                                            </li>
                                                            <li class="no-star"><i class="fa fa-star-o"></i>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <h4><a class="product_name" href="single-product.html">Accusantium
                                                        dolorem1</a>
                                                </h4>
                                                <div class="price-box">
                                                    <span class="new-price">$46.80</span>
                                                </div>
                                            </div>
                                            <div class="add-actions">
                                                <ul class="add-actions-link">
                                                    <li class="add-cart active"><a href="#">Add to
                                                            cart</a></li>
                                                    <li><a class="links-details" href="single-product.html"><i
                                                                class="fa fa-heart-o"></i></a></li>
                                                    <li><a class="quick-view" data-toggle="modal"
                                                            data-target="#exampleModalCenter" href="#"><i
                                                                class="fa fa-eye"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-wrap end -->
                                </div>
                                <div class="col-lg-12">
                                    <!-- single-product-wrap start -->
                                    <div class="single-product-wrap">
                                        <div class="product-image">
                                            <a href="single-product.html">
                                                <img src="{{ asset('user/images/product/large-size/5.jpg') }}"
                                                    alt="Li's Product Image">
                                            </a>
                                            <span class="sticker">New</span>
                                        </div>
                                        <div class="product_desc">
                                            <div class="product_desc_info">
                                                <div class="product-review">
                                                    <h5 class="manufacturer">
                                                        <a href="shop-left-sidebar.html">Studio Design</a>
                                                    </h5>
                                                    <div class="rating-box">
                                                        <ul class="rating">
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li class="no-star"><i class="fa fa-star-o"></i>
                                                            </li>
                                                            <li class="no-star"><i class="fa fa-star-o"></i>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <h4><a class="product_name" href="single-product.html">Mug
                                                        Today is a good day</a></h4>
                                                <div class="price-box">
                                                    <span class="new-price new-price-2">$71.80</span>
                                                    <span class="old-price">$77.22</span>
                                                    <span class="discount-percentage">-7%</span>
                                                </div>
                                            </div>
                                            <div class="add-actions">
                                                <ul class="add-actions-link">
                                                    <li class="add-cart active"><a href="#">Add to
                                                            cart</a></li>
                                                    <li><a class="links-details" href="single-product.html"><i
                                                                class="fa fa-heart-o"></i></a></li>
                                                    <li><a class="quick-view" data-toggle="modal"
                                                            data-target="#exampleModalCenter" href="#"><i
                                                                class="fa fa-eye"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-wrap end -->
                                </div>
                                <div class="col-lg-12">
                                    <!-- single-product-wrap start -->
                                    <div class="single-product-wrap">
                                        <div class="product-image">
                                            <a href="single-product.html">
                                                <img src="{{ asset('user/images/product/large-size/7.jpg') }}"
                                                    alt="Li's Product Image">
                                            </a>
                                            <span class="sticker">New</span>
                                        </div>
                                        <div class="product_desc">
                                            <div class="product_desc_info">
                                                <div class="product-review">
                                                    <h5 class="manufacturer">
                                                        <a href="shop-left-sidebar.html">Graphic Corner</a>
                                                    </h5>
                                                    <div class="rating-box">
                                                        <ul class="rating">
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li class="no-star"><i class="fa fa-star-o"></i>
                                                            </li>
                                                            <li class="no-star"><i class="fa fa-star-o"></i>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <h4><a class="product_name" href="single-product.html">Accusantium
                                                        dolorem1</a>
                                                </h4>
                                                <div class="price-box">
                                                    <span class="new-price">$46.80</span>
                                                </div>
                                            </div>
                                            <div class="add-actions">
                                                <ul class="add-actions-link">
                                                    <li class="add-cart active"><a href="#">Add to
                                                            cart</a></li>
                                                    <li><a class="links-details" href="single-product.html"><i
                                                                class="fa fa-heart-o"></i></a></li>
                                                    <li><a class="quick-view" data-toggle="modal"
                                                            data-target="#exampleModalCenter" href="#"><i
                                                                class="fa fa-eye"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-wrap end -->
                                </div>
                                <div class="col-lg-12">
                                    <!-- single-product-wrap start -->
                                    <div class="single-product-wrap">
                                        <div class="product-image">
                                            <a href="single-product.html">
                                                <img src="{{ asset('user/images/product/large-size/5.jpg') }}"
                                                    alt="Li's Product Image">
                                            </a>
                                            <span class="sticker">New</span>
                                        </div>
                                        <div class="product_desc">
                                            <div class="product_desc_info">
                                                <div class="product-review">
                                                    <h5 class="manufacturer">
                                                        <a href="shop-left-sidebar.html">Studio Design</a>
                                                    </h5>
                                                    <div class="rating-box">
                                                        <ul class="rating">
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li class="no-star"><i class="fa fa-star-o"></i>
                                                            </li>
                                                            <li class="no-star"><i class="fa fa-star-o"></i>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <h4><a class="product_name" href="single-product.html">Mug
                                                        Today is a good day</a></h4>
                                                <div class="price-box">
                                                    <span class="new-price new-price-2">$71.80</span>
                                                    <span class="old-price">$77.22</span>
                                                    <span class="discount-percentage">-7%</span>
                                                </div>
                                            </div>
                                            <div class="add-actions">
                                                <ul class="add-actions-link">
                                                    <li class="add-cart active"><a href="#">Add to
                                                            cart</a></li>
                                                    <li><a class="links-details" href="single-product.html"><i
                                                                class="fa fa-heart-o"></i></a></li>
                                                    <li><a class="quick-view" data-toggle="modal"
                                                            data-target="#exampleModalCenter" href="#"><i
                                                                class="fa fa-eye"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-wrap end -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="home3" class="tab-pane fade">
                        <div class="row">
                            <div class="product-active owl-carousel">
                                <div class="col-lg-12">
                                    <!-- single-product-wrap start -->
                                    <div class="single-product-wrap">
                                        <div class="product-image">
                                            <a href="single-product.html">
                                                <img src="{{ asset('user/images/product/large-size/3.jpg') }}"
                                                    alt="Li's Product Image">
                                            </a>
                                            <span class="sticker">New</span>
                                        </div>
                                        <div class="product_desc">
                                            <div class="product_desc_info">
                                                <div class="product-review">
                                                    <h5 class="manufacturer">
                                                        <a href="shop-left-sidebar.html">Graphic Corner</a>
                                                    </h5>
                                                    <div class="rating-box">
                                                        <ul class="rating">
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li class="no-star"><i class="fa fa-star-o"></i>
                                                            </li>
                                                            <li class="no-star"><i class="fa fa-star-o"></i>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <h4><a class="product_name" href="single-product.html">Accusantium
                                                        dolorem1</a>
                                                </h4>
                                                <div class="price-box">
                                                    <span class="new-price">$46.80</span>
                                                </div>
                                            </div>
                                            <div class="add-actions">
                                                <ul class="add-actions-link">
                                                    <li class="add-cart active"><a href="#">Add to
                                                            cart</a></li>
                                                    <li><a class="links-details" href="single-product.html"><i
                                                                class="fa fa-heart-o"></i></a></li>
                                                    <li><a class="quick-view" data-toggle="modal"
                                                            data-target="#exampleModalCenter" href="#"><i
                                                                class="fa fa-eye"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-wrap end -->
                                </div>
                                <div class="col-lg-12">
                                    <!-- single-product-wrap start -->
                                    <div class="single-product-wrap">
                                        <div class="product-image">
                                            <a href="single-product.html">
                                                <img src="{{ asset('user/images/product/large-size/7.jpg') }}"
                                                    alt="Li's Product Image">
                                            </a>
                                            <span class="sticker">New</span>
                                        </div>
                                        <div class="product_desc">
                                            <div class="product_desc_info">
                                                <div class="product-review">
                                                    <h5 class="manufacturer">
                                                        <a href="shop-left-sidebar.html">Studio Design</a>
                                                    </h5>
                                                    <div class="rating-box">
                                                        <ul class="rating">
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li class="no-star"><i class="fa fa-star-o"></i>
                                                            </li>
                                                            <li class="no-star"><i class="fa fa-star-o"></i>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <h4><a class="product_name" href="single-product.html">Mug
                                                        Today is a good day</a></h4>
                                                <div class="price-box">
                                                    <span class="new-price new-price-2">$71.80</span>
                                                    <span class="old-price">$77.22</span>
                                                    <span class="discount-percentage">-7%</span>
                                                </div>
                                            </div>
                                            <div class="add-actions">
                                                <ul class="add-actions-link">
                                                    <li class="add-cart active"><a href="#">Add to
                                                            cart</a></li>
                                                    <li><a class="links-details" href="single-product.html"><i
                                                                class="fa fa-heart-o"></i></a></li>
                                                    <li><a class="quick-view" data-toggle="modal"
                                                            data-target="#exampleModalCenter" href="#"><i
                                                                class="fa fa-eye"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-wrap end -->
                                </div>
                                <div class="col-lg-12">
                                    <!-- single-product-wrap start -->
                                    <div class="single-product-wrap">
                                        <div class="product-image">
                                            <a href="single-product.html">
                                                <img src="{{ asset('user/images/product/large-size/9.jpg') }}"
                                                    alt="Li's Product Image">
                                            </a>
                                            <span class="sticker">New</span>
                                        </div>
                                        <div class="product_desc">
                                            <div class="product_desc_info">
                                                <div class="product-review">
                                                    <h5 class="manufacturer">
                                                        <a href="shop-left-sidebar.html">Graphic Corner</a>
                                                    </h5>
                                                    <div class="rating-box">
                                                        <ul class="rating">
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li class="no-star"><i class="fa fa-star-o"></i>
                                                            </li>
                                                            <li class="no-star"><i class="fa fa-star-o"></i>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <h4><a class="product_name" href="single-product.html">Accusantium
                                                        dolorem1</a>
                                                </h4>
                                                <div class="price-box">
                                                    <span class="new-price">$46.80</span>
                                                </div>
                                            </div>
                                            <div class="add-actions">
                                                <ul class="add-actions-link">
                                                    <li class="add-cart active"><a href="#">Add to
                                                            cart</a></li>
                                                    <li><a class="links-details" href="single-product.html"><i
                                                                class="fa fa-heart-o"></i></a></li>
                                                    <li><a class="quick-view" data-toggle="modal"
                                                            data-target="#exampleModalCenter" href="#"><i
                                                                class="fa fa-eye"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-wrap end -->
                                </div>
                                <div class="col-lg-12">
                                    <!-- single-product-wrap start -->
                                    <div class="single-product-wrap">
                                        <div class="product-image">
                                            <a href="single-product.html">
                                                <img src="{{ asset('user/images/product/large-size/1.jpg') }}"
                                                    alt="Li's Product Image">
                                            </a>
                                            <span class="sticker">New</span>
                                        </div>
                                        <div class="product_desc">
                                            <div class="product_desc_info">
                                                <div class="product-review">
                                                    <h5 class="manufacturer">
                                                        <a href="shop-left-sidebar.html">Studio Design</a>
                                                    </h5>
                                                    <div class="rating-box">
                                                        <ul class="rating">
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li class="no-star"><i class="fa fa-star-o"></i>
                                                            </li>
                                                            <li class="no-star"><i class="fa fa-star-o"></i>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <h4><a class="product_name" href="single-product.html">Mug
                                                        Today is a good day</a></h4>
                                                <div class="price-box">
                                                    <span class="new-price new-price-2">$71.80</span>
                                                    <span class="old-price">$77.22</span>
                                                    <span class="discount-percentage">-7%</span>
                                                </div>
                                            </div>
                                            <div class="add-actions">
                                                <ul class="add-actions-link">
                                                    <li class="add-cart active"><a href="#">Add to
                                                            cart</a></li>
                                                    <li><a class="links-details" href="single-product.html"><i
                                                                class="fa fa-heart-o"></i></a></li>
                                                    <li><a class="quick-view" data-toggle="modal"
                                                            data-target="#exampleModalCenter" href="#"><i
                                                                class="fa fa-eye"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-wrap end -->
                                </div>
                                <div class="col-lg-12">
                                    <!-- single-product-wrap start -->
                                    <div class="single-product-wrap">
                                        <div class="product-image">
                                            <a href="single-product.html">
                                                <img src="{{ asset('user/images/product/large-size/11.jpg') }}"
                                                    alt="Li's Product Image">
                                            </a>
                                            <span class="sticker">New</span>
                                        </div>
                                        <div class="product_desc">
                                            <div class="product_desc_info">
                                                <div class="product-review">
                                                    <h5 class="manufacturer">
                                                        <a href="shop-left-sidebar.html">Graphic Corner</a>
                                                    </h5>
                                                    <div class="rating-box">
                                                        <ul class="rating">
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li class="no-star"><i class="fa fa-star-o"></i>
                                                            </li>
                                                            <li class="no-star"><i class="fa fa-star-o"></i>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <h4><a class="product_name" href="single-product.html">Accusantium
                                                        dolorem1</a>
                                                </h4>
                                                <div class="price-box">
                                                    <span class="new-price">$46.80</span>
                                                </div>
                                            </div>
                                            <div class="add-actions">
                                                <ul class="add-actions-link">
                                                    <li class="add-cart active"><a href="#">Add to
                                                            cart</a></li>
                                                    <li><a class="links-details" href="single-product.html"><i
                                                                class="fa fa-heart-o"></i></a></li>
                                                    <li><a class="quick-view" data-toggle="modal"
                                                            data-target="#exampleModalCenter" href="#"><i
                                                                class="fa fa-eye"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-wrap end -->
                                </div>
                                <div class="col-lg-12">
                                    <!-- single-product-wrap start -->
                                    <div class="single-product-wrap">
                                        <div class="product-image">
                                            <a href="single-product.html">
                                                <img src="{{ asset('user/images/product/large-size/9.jpg') }}"
                                                    alt="Li's Product Image">
                                            </a>
                                            <span class="sticker">New</span>
                                        </div>
                                        <div class="product_desc">
                                            <div class="product_desc_info">
                                                <div class="product-review">
                                                    <h5 class="manufacturer">
                                                        <a href="shop-left-sidebar.html">Studio Design</a>
                                                    </h5>
                                                    <div class="rating-box">
                                                        <ul class="rating">
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li><i class="fa fa-star-o"></i></li>
                                                            <li class="no-star"><i class="fa fa-star-o"></i>
                                                            </li>
                                                            <li class="no-star"><i class="fa fa-star-o"></i>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <h4><a class="product_name" href="single-product.html">Mug
                                                        Today is a good day</a></h4>
                                                <div class="price-box">
                                                    <span class="new-price new-price-2">$71.80</span>
                                                    <span class="old-price">$77.22</span>
                                                    <span class="discount-percentage">-7%</span>
                                                </div>
                                            </div>
                                            <div class="add-actions">
                                                <ul class="add-actions-link">
                                                    <li class="add-cart active"><a href="#">Add to
                                                            cart</a></li>
                                                    <li><a class="links-details" href="single-product.html"><i
                                                                class="fa fa-heart-o"></i></a></li>
                                                    <li><a class="quick-view" data-toggle="modal"
                                                            data-target="#exampleModalCenter" href="#"><i
                                                                class="fa fa-eye"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-wrap end -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Tab Menu Content Area End Here -->
            </div>
            <!-- Tab Menu Area End Here -->
        </div>
    </div>
</section>
<section class="product-area li-trending-product pt-60 pb-45 pt-xs-50">
    <div class="container">
        <div class="row">
            <!-- Begin Li's Tab Menu Area -->
            <div class="col-lg-12">
                <div class="li-product-tab li-trending-product-tab">
                    <h2>
                        <span>Beauty and Personal Care</span>

                    </h2>
                    <ul class="nav li-product-menu li-trending-product-menu">
                        @foreach ($Beauty_category_names as $categoryName)
                            <li><a href="{{ url('/category', $categoryName->name) }}">{{ $categoryName->name }}</a>
                            </li>
                        @endforeach>
                    </ul>
                </div>
                <!-- Begin Li's Tab Menu Content Area -->
                <div class="tab-content li-tab-content li-trending-product-content">
                    <div id="home1" class="tab-pane show fade in active">
                        <div class="row">
                            <div class="product-active owl-carousel">
                                @foreach ($Beauty as $Beauty_items)
                                    <div class="col-lg-12">
                                        <!-- single-product-wrap start -->
                                        <div id="product-{{ $Beauty_items->id }}" class="single-product-wrap">
                                            <div class="product-image">
                                                <a href="single-product.html">
                                                    <img src="{{ asset('storage/images/products/' . $Beauty_items->image) }}"
                                                        alt="Li's Product Image" style="height:220px">
                                                </a>
                                            </div>
                                            <div class="product_desc">
                                                <div class="product_desc_info">
                                                    <div class="product-review">
                                                        <h5 class="manufacturer">
                                                            <a href="shop-left-sidebar.html">{{ $Beauty_items->category->name }}
                                                                / <br> {{ $Beauty_items->subcategory->name }}</a>
                                                        </h5>
                                                        <div class="rating-box">
                                                            <ul class="rating">
                                                                @for ($i = 1; $i <= 5; $i++)
                                                                    @if ($i <= $Beauty_items->rating)
                                                                        <li><i class="fa fa-star"></i></li>
                                                                    @else
                                                                        <li><i class="fa fa-star-o"></i></li>
                                                                    @endif
                                                                @endfor
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <h4><a class="product_name"
                                                            href="single-product.html">{{ Str::limit($Beauty_items->product_name, 45, '...') }}</a>
                                                    </h4>

                                                    <div class="d-flex gap-2 align-items-center">
                                                        <span class="new-price">${{ $sport->price }}</span>
                                                        <span class="new-price"
                                                            style="color: gray">$<del>{{ $Beauty_items->old_price }}</del></span>

                                                    </div>

                                                    <div class="add-actions" style="bottom:0">
                                                        <ul class="add-actions-link"
                                                            style="transform:translateY(60px)">
                                                            <li class="add-cart active">

                                                                <form class="add-to-cart-form"
                                                                    data-product-id="{{ $Beauty_items->id }}"
                                                                    data-route="{{ route('addToCard') }}"
                                                                    method="post">
                                                                    <input type="hidden" name="quantity"
                                                                        placeholder="Qte" min="1"
                                                                        value="1">
                                                                    <input type="hidden" name="price_one"
                                                                        value="{{ $Beauty_items->price }}">
                                                                    <input type="hidden" name="product_name"
                                                                        value="{{ $Beauty_items->product_name }}">
                                                                    <input type="hidden" name="image"
                                                                        value="{{ $Beauty_items->image }}">
                                                                    <input type="hidden" name="product_id"
                                                                        value="{{ $Beauty_items->id }}">

                                                                    @csrf
                                                                    <button type="button" class="add-to-cart-button"
                                                                        style="background: transparent; border:none; cursor: pointer;">Add
                                                                        to cart</button>
                                                                </form>
                                                            </li>
                                                            <li>
                                                                <form action="{{ route('add.to.wishlist') }}"
                                                                    method="post">
                                                                    @csrf
                                                                    <input type="hidden"
                                                                        value="{{ $Beauty_items->product_name }}"
                                                                        name="product_name" />
                                                                    <input type="hidden"
                                                                        value="{{ $Beauty_items->image }}"
                                                                        name="image" />
                                                                    <input type="hidden"
                                                                        value="{{ $Beauty_items->price }}"
                                                                        name="price_one" />
                                                                    <input type="hidden"
                                                                        value="{{ $Beauty_items->status }}"
                                                                        name="status" />
                                                                    <input type="hidden"
                                                                        value="{{ $Beauty_items->id }}"
                                                                        name="product_id" />
                                                                    <button type="submit"
                                                                        style="background: transparent; border:none; cursor: pointer;"
                                                                        class="links-details">
                                                                        <i class="fa fa-heart-o"></i>
                                                                    </button>
                                                                </form>
                                                            </li>
                                                            <li>
                                                                <a class="quick-view"
                                                                    href="{{ route('details', $Beauty_items->id) }}"><i
                                                                        class="fa fa-eye"></i></a>
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

                </div>
                <!-- Tab Menu Content Area End Here -->
            </div>
            <!-- Tab Menu Area End Here -->
        </div>
    </div>
</section>
