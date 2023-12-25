<header class="li-header-4">
    <!-- Begin Header Top Area -->
    <div class="header-top  ">
        <div class="container">
            <div class="row">
                <!-- Begin Header Top Left Area -->
                <div class="col-lg-3 col-md-4">
                    <div class="header-top-left">
                        <ul class="phone-wrap ">
                            <li><span>Telephone Enquiry:</span><a href="#">(+123) 123 321 345</a></li>
                        
                        </ul>
                    </div>
                </div>

              <div>
               
              </div>
                <!-- Header Top Left Area End Here -->
                <!-- Begin Header Top Right Area -->
                <div class="col-lg-9 col-md-8">
                    <div class="header-top-right">
                        <ul class="ht-menu">
                            <!-- Begin Setting Area -->

                            @if (Auth::check())
                                <img src="{{ asset('storage/images/products/' . $user_info->image) }}" alt="image_profile"
                                    class="rounded" width="25px" />
                                <li>

                                    <div class="ht-setting-trigger"><span>{{ Auth::user()->name }}</span></div>
                                    <div class="setting ht-setting" style="z-index:9999999999999999999999">
                                        <ul class="ht-setting-list" >
                                            <li><a href="{{ route('account') }}">My Account</a></li>
                                            <li><a href="checkout.html">Checkout</a></li>
                                            @if(Auth::user()->role == 'seller')
                                            <li><a href="{{url('/seller/dashboard')}}">Dashboard</a></li>
                                            @endif
                                            <li>
                                                <form method="POST" action="{{ route('logout') }}">
                                                    @csrf

                                                    <x-dropdown-link :href="route('logout')"
                                                        onclick="event.preventDefault();
                                                                    this.closest('form').submit();">
                                                        {{ __('Log Out') }}
                                                    </x-dropdown-link>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>

                                </li>
                            @else
                                <li>
                                <li><a href="{{ url('/login') }}" class="text-white">Login / Register</a></li>
                                </li>
                            @endif


                            <!-- Setting Area End Here -->
                            <!-- Begin Currency Area -->
                            <li>
                                <span class="currency-selector-wrapper">Currency :</span>
                                <div class="ht-currency-trigger"><span>USD $</span></div>
                                <div class="currency ht-currency">
                                    <ul class="ht-setting-list">
                                        <li><a href="#">EUR €</a></li>
                                        <li class="active"><a href="#">USD $</a></li>
                                    </ul>
                                </div>
                            </li>
                            <!-- Currency Area End Here -->
                            <!-- Begin Language Area -->
                            <li>
                                <span class="language-selector-wrapper">Language :</span>
                                <div class="ht-language-trigger"><span>English</span></div>
                                <div class="language ht-language">
                                    <ul class="ht-setting-list">
                                        <li class="active"><a href="#"><img src="images/menu/flag-icon/1.jpg"
                                                    alt="">English</a>
                                        </li>
                                        <li><a href="#"><img src="images/menu/flag-icon/2.jpg"
                                                    alt="">Français</a></li>
                                    </ul>
                                </div>
                            </li>
                            <!-- Language Area End Here -->
                        </ul>
                    </div>
                </div>
                <!-- Header Top Right Area End Here -->
            </div>
        </div>
    </div>
    <!-- Header Top Area End Here -->
    <!-- Begin Header Middle Area -->
    <div class="header-middle pl-sm-0 pr-sm-0 pl-xs-0 pr-xs-0">
        <div class="container">
            <div class="row">
                <!-- Begin Header Logo Area -->
                <div class="col-lg-2">
                    <div class="logo pb-sm-30 pb-xs-30 d-flex">
                        <a href="{{ url('/') }}" style="text-decoration: none; color: #333; font-family: 'Arial', sans-serif; font-size: 24px; font-weight: bold;display:flex;color:#FFF">
                           <svg  xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" width="36" viewBox="0 0 652 570.12526" xmlns:xlink="http://www.w3.org/1999/xlink"><path d="M383.95544,670.80537c-21.41987,11.54992-30.61494,36.063-30.61494,36.063s25.53333,5.787,46.95319-5.763,30.61493-36.063,30.61493-36.063S405.3753,659.25547,383.95544,670.80537Z" transform="translate(-274 -164.93737)" fill="#f2f2f2"/><path d="M391.00243,678.74409c-12.54547,20.85238-37.4643,28.88326-37.4643,28.88326s-4.57855-25.77746,7.96693-46.62985,37.46424-28.88328,37.46424-28.88328S403.54791,657.8917,391.00243,678.74409Z" transform="translate(-274 -164.93737)" fill="#f2f2f2"/><rect x="437.44488" y="40.12526" width="76" height="45" fill="#2f2e41"/><path d="M636.15176,212.3186h-39.1842V198.65473a19.5921,19.5921,0,0,1,39.1842,0Zm-38.31666-.86755h37.44912V198.65473a18.72456,18.72456,0,0,0-37.44912,0Z" transform="translate(-274 -164.93737)" fill="#3f3d56"/><polygon points="381.527 45.502 381.527 40.162 281.877 42.832 278.723 178.092 293.471 196.31 381.527 45.502" fill="#3f3d56"/><polygon points="399.167 43.622 291.158 46.08 293.471 196.31 397.705 185.075 399.167 43.622" fill="#ffff22"/><polygon points="490.997 530.355 478.737 530.355 472.905 483.067 490.999 483.067 490.997 530.355" fill="#ffb6b6"/><path d="M768.12328,707.17645l-39.53076-.00147v-.5A15.3873,15.3873,0,0,1,743.979,691.28875h.001l24.144.001Z" transform="translate(-274 -164.93737)" fill="#2f2e41"/><polygon points="445.997 530.355 433.737 530.355 427.905 483.067 445.999 483.067 445.997 530.355" fill="#ffb6b6"/><path d="M723.12328,707.17645l-39.53076-.00147v-.5A15.3873,15.3873,0,0,1,698.979,691.28875h.001l24.144.001Z" transform="translate(-274 -164.93737)" fill="#2f2e41"/><path d="M683.99246,399.19649s-17.91244,38.5748-1.73,116.22047,16.31629,162.88821,16.31629,162.88821l24.74368.40336,13.9-183.52L744.5,676.11766h24.378l21.48451-178.0691s14.13754-79.51349-17.39-93.74971Z" transform="translate(-274 -164.93737)" fill="#2f2e41"/><path d="M769.73255,263.06263,715.555,258.0685l0,0c-16.98986,12.38353-26.52543,34.62507-24.56793,57.57354,2.65407,31.11463,1.75616,73.93415-19.54217,92.53644,0,0,58.0494,45.8157,109.61509,2.34991,0,0-17.63267-47.23775-5.52651-66.10177S792.00719,272.56263,769.73255,263.06263Z" transform="translate(-274 -164.93737)" fill="#e4e4e4"/><path d="M608.527,186.17919a10.7427,10.7427,0,0,0,11.43977,11.8524L691.5,264.78927l12.82084-19.52982-74.34632-59.47956a10.80091,10.80091,0,0,0-21.44756.3993Z" transform="translate(-274 -164.93737)" fill="#ffb6b6"/><path d="M678.14208,254.47645l16.96983-17.43179a4.81689,4.81689,0,0,1,7.28075.438l14.712,19.2826a13.37737,13.37737,0,0,1-18.71875,19.11593l-19.61051-14.13836a4.81689,4.81689,0,0,1-.63333-7.26636Z" transform="translate(-274 -164.93737)" fill="#e4e4e4"/><path d="M874.28441,348.7493a10.74268,10.74268,0,0,0-12.08059-11.19852l-75.13166-62.68039-11.716,20.21194,77.536,55.25723a10.80091,10.80091,0,0,0,21.39225-1.59026Z" transform="translate(-274 -164.93737)" fill="#ffb6b6"/><path d="M800.98244,284.42515l-15.97515,18.34766a4.81688,4.81688,0,0,1-7.29384-.0328l-15.76058-18.43546a13.37737,13.37737,0,0,1,17.62782-20.12637l20.3657,13.027a4.81688,4.81688,0,0,1,1.03605,7.21995Z" transform="translate(-274 -164.93737)" fill="#e4e4e4"/><path d="M881.9179,375.2531H852.237v-10.35a14.84048,14.84048,0,0,1,29.681,0Zm-29.02381-.65714h28.36666V364.9031a14.18333,14.18333,0,0,0-28.36666,0Z" transform="translate(-274 -164.93737)" fill="#3f3d56"/><polygon points="622.594 208.892 622.594 204.847 547.112 206.87 544.723 309.325 555.894 323.125 622.594 208.892" fill="#3f3d56"/><polygon points="635.956 207.468 554.142 209.33 555.894 323.125 634.849 314.615 635.956 207.468" fill="#ffff22"/><circle cx="472.44488" cy="52.12526" r="32" fill="#ffb6b6"/><path d="M731.71177,202.80076c11.07,10.84841,30.33409,11.88815,42.50746,2.29425a71.78407,71.78407,0,0,1-15.288,67.676c6.77173,2.44676,14.56709.83705,20.61973-3.06277s10.53515-9.85419,13.91774-16.21037c8.37356-15.73462,10.4701-34.94725,4.54608-51.758s-20.11671-30.75035-37.3597-35.26409-37.01356,1.06186-48.53371,14.66262c-12.04649,14.22215-13.99821,35.06129-8.71923,52.93641s16.85751,33.22578,29.579,46.84748A195.4652,195.4652,0,0,1,720.926,232.02061c-.64717-5.73728-1.02538-11.65123.59548-17.19271s5.6099-10.70314,11.16965-12.26017" transform="translate(-274 -164.93737)" fill="#2f2e41"/><path d="M925,709.06263H544a1,1,0,0,1,0-2H925a1,1,0,0,1,0,2Z" transform="translate(-274 -164.93737)" fill="#cacaca"/><path d="M437,709.06263H275a1,1,0,0,1,0-2H437a1,1,0,0,1,0,2Z" transform="translate(-274 -164.93737)" fill="#cacaca"/><path d="M865.9179,622.2531H836.237v-10.35a14.84048,14.84048,0,0,1,29.681,0Zm-29.02381-.65714h28.36666V611.9031a14.18333,14.18333,0,0,0-28.36666,0Z" transform="translate(-274 -164.93737)" fill="#cacaca"/><polygon points="606.594 455.892 606.594 451.847 531.112 453.87 528.723 556.325 539.894 570.125 606.594 455.892" fill="#cacaca"/><polygon points="619.956 454.468 538.142 456.33 539.894 570.125 618.849 561.615 619.956 454.468" fill="#e4e4e4"/></svg>
                            MarketOnline
                        </a>
                    </div>
                </div>
                
                <!-- Header Logo Area End Here -->
                <!-- Begin Header Middle Right Area -->
                <div class="col-lg-10" style="z-index: 100000000">
                    <!-- Begin Header Middle Searchbox Area -->
                    <form action="#" class="hm-searchbox">
                        <select aria-describedby="searchDropdownDescription" class="nice-select select-search-category"
                            title="Search in" >
                            <option  selected="selected"><a href="/">All</a></option>
                            @foreach ($subcategories as $subcategory)
                            <option ><a href="{{ url('/category', $subcategory->name) }}">{{$subcategory->name}}</a></option>
                            @endforeach
                           
                            {{-- <option value="10">Laptops</option>
                            <option value="17">Prime Video</option>
                            <option value="20">All Videos</option>
                            <option value="21">Blouses</option>
                            <option value="22">Evening Dresses</option>
                            <option value="23">Summer Dresses</option>
                            <option value="24">T-shirts</option>
                            <option value="25">Rent or Buy</option>
                            <option value="27">Watch Anywhere</option>
                            <option value="18">Computers</option>
                            <option value="29">More to Explore</option>
                            <option value="30">TV &amp; Video</option>
                            <option value="31">Audio &amp; Theater</option>
                            <option value="32">Camera, Photo </option>
                            <option value="33">Cell Phones</option>
                            <option value="34">Headphones</option>
                            <option value="35">Video Games</option>
                            <option value="36">Wireless Speakers</option>
                            <option value="19">Electronics</option>
                            <option value="38">Kitchen &amp; Dining</option>
                            <option value="39">Furniture</option>
                            <option value="40">Bed &amp; Bath</option>
                            <option value="41">Appliances</option>
                            <option value="11">TV &amp; Audio</option>
                            <option value="42">Chamcham</option>
                            <option value="45">Office</option>
                            <option value="47">Gaming</option>
                            <option value="48">Chromebook</option>
                            <option value="49">Refurbished</option>
                            <option value="50">Touchscreen</option>
                            <option value="51">Ultrabooks</option>
                            <option value="52">Blouses</option>
                            <option value="43">Sanai</option>
                            <option value="53">Hard Drives</option>
                            <option value="54">Graphic Cards</option>
                            <option value="56">Memory</option>
                            <option value="57">Motherboards</option>
                            <option value="58">Fans &amp; Cooling</option>
                            <option value="59">CD/DVD Drives</option>
                            <option value="44">Meito</option>
                            <option value="60">Sound Cards</option>
                            <option value="62">Casual Dresses</option>
                            <option value="63">Evening Dresses</option>
                            <option value="64">T-shirts</option>
                            <option value="65">Tops</option>
                            <option value="12">Smartphone</option>
                            <option value="66">Camera Accessories</option>
                            <option value="68">Octa Core</option>
                            <option value="69">Quad Core</option>
                            <option value="70">Dual Core</option>

                            <option value="73">Bags &amp; Cases</option>
                            <option value="74">Batteries</option>
                            <option value="75">Microphones</option>
                            <option value="76">Stabilizers</option>
                            <option value="77">Video Tapes</option>
                            <option value="78">Memory Card Readers</option>
                            <option value="79">Tripods</option>
                            <option value="13">Cameras</option>
                            <option value="14">headphone</option>
                            <option value="15">Smartwatch</option>
                            <option value="16">Accessories</option> --}}
                        </select>
                        <input type="text" placeholder="Enter your search key ...">
                        <button class="li-btn" type="submit"><i class="fa fa-search"></i></button>
                    </form>


                    @if (session('message'))
                        <div class="alert alert-success alert-dismissible fade show"
                            style="position: fixed; top: 8px; right: 5px; z-index: 11111111111" role="alert">
                            <strong>Success!</strong> {{ session('message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                        </div>

                        <script>
                            // Automatically close the alert after 5 seconds (5000 milliseconds)
                            setTimeout(function() {
                                $('.alert').alert('close');
                            }, 5000);
                        </script>
                    @endif
                    <!-- Header Middle Searchbox Area End Here -->
                    <!-- Begin Header Middle Right Area -->
                    <div class="header-middle-right d-flex">
                        <ul class="hm-menu ml-3 d-flex gap-3">
                            <!-- Begin Header Middle Wishlist Area -->
                            <li class="hm-wishlist">
                                <a href="{{ route('wishlist') }}">
                                    @if (isset($wishlist_elements))
                                        <span
                                            class="cart-item-count wishlist-item-count">{{ $wishlist_elements->count() ?? 0 }}</span>
                                    @endif
                                    <i class="fa fa-heart-o"></i>
                                </a>
                            </li>
                            <li class="hm-wishlist">
                                <a href="{{ route('wishlist') }}">
                                    
                                        <span
                                            class="cart-item-count wishlist-item-count">0</span>
                                  
                                            <i class="zmdi zmdi-comment-alt-text"></i>

                                </a>
                            </li>
                           
                            <!-- Header Middle Wishlist Area End Here -->

                            <!-- Begin Header Mini Cart Area -->
                      @include('user.components.card')
                    </ul>
                    </div>
                    <!-- Header Middle Right Area End Here -->
                </div>
                <!-- Header Middle Right Area End Here -->
            </div>
        </div>
    </div>
    <!-- Header Middle Area End Here -->
    <!-- Begin Header Bottom Area -->
    <div class="header-bottom header-sticky stick d-none d-lg-block d-xl-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Begin Header Bottom Menu Area -->
                    <div class="hb-menu hb-menu-2">
                        <nav>
                            <ul>
                                <li class=""><a href="{{ url('/') }}">Home</a>
                                    {{-- <ul class="hb-dropdown">
                                        <li><a href="index.html">Home One</a></li>
                                        <li><a href="index-2.html">Home Two</a></li>
                                        <li class="active"><a href="index-3.html">Home Three</a></li>
                                        <li><a href="index-4.html">Home Four</a></li>
                                    </ul> --}}
                                </li>
                                <li class="megamenu-holder"><a href="shop-left-sidebar.html">Shop</a>
                                    {{-- <ul class="megamenu hb-megamenu">
                                        <li><a href="shop-left-sidebar.html">Shop Page Layout</a>
                                            <ul>
                                                <li><a href="shop-3-column.html">Shop 3 Column</a></li>
                                                <li><a href="shop-4-column.html">Shop 4 Column</a></li>
                                                <li><a href="shop-left-sidebar.html">Shop Left Sidebar</a></li>
                                                <li><a href="shop-right-sidebar.html">Shop Right Sidebar</a>
                                                </li>
                                                <li><a href="shop-list.html">Shop List</a></li>
                                                <li><a href="shop-list-left-sidebar.html">Shop List Left
                                                        Sidebar</a></li>
                                                <li><a href="shop-list-right-sidebar.html">Shop List Right
                                                        Sidebar</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="single-product-gallery-left.html">Single Product Style</a>
                                            <ul>
                                                <li><a href="single-product-carousel.html">Single Product
                                                        Carousel</a></li>
                                                <li><a href="single-product-gallery-left.html">Single Product
                                                        Gallery Left</a></li>
                                                <li><a href="single-product-gallery-right.html">Single Product
                                                        Gallery Right</a></li>
                                                <li><a href="single-product-tab-style-top.html">Single Product
                                                        Tab Style Top</a></li>
                                                <li><a href="single-product-tab-style-left.html">Single Product
                                                        Tab Style Left</a></li>
                                                <li><a href="single-product-tab-style-right.html">Single
                                                        Product Tab Style Right</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="single-product.html">Single Products</a>
                                            <ul>
                                                <li><a href="single-product.html">Single Product</a></li>
                                                <li><a href="single-product-sale.html">Single Product Sale</a>
                                                </li>
                                                <li><a href="single-product-group.html">Single Product
                                                        Group</a></li>
                                                <li><a href="single-product-normal.html">Single Product
                                                        Normal</a></li>
                                                <li><a href="single-product-affiliate.html">Single Product
                                                        Affiliate</a></li>
                                            </ul>
                                        </li>
                                    </ul> --}}
                                </li>
                                <li class="dropdown-holder"><a href="blog-left-sidebar.html">Blog</a>
                                    {{-- <ul class="hb-dropdown">
                                        <li class="sub-dropdown-holder"><a href="blog-left-sidebar.html">Blog
                                                Grid View</a>
                                            <ul class="hb-dropdown hb-sub-dropdown">
                                                <li><a href="blog-2-column.html">Blog 2 Column</a></li>
                                                <li><a href="blog-3-column.html">Blog 3 Column</a></li>
                                                <li><a href="blog-left-sidebar.html">Grid Left Sidebar</a></li>
                                                <li><a href="blog-right-sidebar.html">Grid Right Sidebar</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="sub-dropdown-holder"><a href="blog-list-left-sidebar.html">Blog
                                                List View</a>
                                            <ul class="hb-dropdown hb-sub-dropdown">
                                                <li><a href="blog-list.html">Blog List</a></li>
                                                <li><a href="blog-list-left-sidebar.html">List Left Sidebar</a>
                                                </li>
                                                <li><a href="blog-list-right-sidebar.html">List Right
                                                        Sidebar</a></li>
                                            </ul>
                                        </li>
                                        <li class="sub-dropdown-holder"><a href="blog-details-left-sidebar.html">Blog
                                                Details</a>
                                            <ul class="hb-dropdown hb-sub-dropdown">
                                                <li><a href="blog-details-left-sidebar.html">Left Sidebar</a>
                                                </li>
                                                <li><a href="blog-details-right-sidebar.html">Right Sidebar</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="sub-dropdown-holder"><a href="blog-gallery-format.html">Blog
                                                Format</a>
                                            <ul class="hb-dropdown hb-sub-dropdown">
                                                <li><a href="blog-audio-format.html">Blog Audio Format</a></li>
                                                <li><a href="blog-video-format.html">Blog Video Format</a></li>
                                                <li><a href="blog-gallery-format.html">Blog Gallery Format</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul> --}}
                                </li>
                                <li class="megamenu-static-holder"><a href="index.html">Pages</a>
                                    {{-- <ul class="megamenu hb-megamenu">
                                        <li><a href="blog-left-sidebar.html">Blog Layouts</a>
                                            <ul>
                                                <li><a href="blog-2-column.html">Blog 2 Column</a></li>
                                                <li><a href="blog-3-column.html">Blog 3 Column</a></li>
                                                <li><a href="blog-left-sidebar.html">Grid Left Sidebar</a></li>
                                                <li><a href="blog-right-sidebar.html">Grid Right Sidebar</a>
                                                </li>
                                                <li><a href="blog-list.html">Blog List</a></li>
                                                <li><a href="blog-list-left-sidebar.html">List Left Sidebar</a>
                                                </li>
                                                <li><a href="blog-list-right-sidebar.html">List Right
                                                        Sidebar</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="blog-details-left-sidebar.html">Blog Details Pages</a>
                                            <ul>
                                                <li><a href="blog-details-left-sidebar.html">Left Sidebar</a>
                                                </li>
                                                <li><a href="blog-details-right-sidebar.html">Right Sidebar</a>
                                                </li>
                                                <li><a href="blog-audio-format.html">Blog Audio Format</a></li>
                                                <li><a href="blog-video-format.html">Blog Video Format</a></li>
                                                <li><a href="blog-gallery-format.html">Blog Gallery Format</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="index.html">Other Pages</a>
                                            <ul>
                                                <li><a href="login-register.html">My Account</a></li>
                                                <li><a href="checkout.html">Checkout</a></li>
                                                <li><a href="compare.html">Compare</a></li>
                                                <li><a href="wishlist.html">Wishlist</a></li>
                                                <li><a href="shopping-cart.html">Shopping Cart</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="index.html">Other Pages 2</a>
                                            <ul>
                                                <li><a href="contact.html">Contact</a></li>
                                                <li><a href="about-us.html">About Us</a></li>
                                                <li><a href="faq.html">FAQ</a></li>
                                                <li><a href="404.html">404 Error</a></li>
                                            </ul>
                                        </li>
                                    </ul> --}}
                                </li>
                                <li><a href="{{route('user.about')}}">About Us</a></li>
                                <li><a href="{{route('user.contact')}}">Contact</a></li>
                                <!-- Begin Header Bottom Menu Information Area -->
                                <li class="hb-info f-right p-0 d-sm-none d-lg-block">
                                    <span>6688 Agadir, Morroco   23JK, MR</span>
                                </li>
                                <!-- Header Bottom Menu Information Area End Here -->
                            </ul>
                        </nav>
                    </div>
                    <!-- Header Bottom Menu Area End Here -->
                </div>
            </div>
        </div>
    </div>
    <!-- Header Bottom Area End Here -->
    <!-- Begin Mobile Menu Area -->
    <div class="mobile-menu-area d-lg-none d-xl-none col-12">
        <div class="container">
            <div class="row">
                <div class="mobile-menu">
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu Area End Here -->
</header>
