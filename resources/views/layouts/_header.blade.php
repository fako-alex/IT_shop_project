<header class="header">
    <div class="header-top">
        <div class="container">
            <div class="header-left">
                <div class="header-dropdown">
                    <a href="#">FCFA</a>
                    <div class="header-menu">
                        <ul>
                            <li><a href="#">Eur</a></li>
                            <li><a href="#">Usd</a></li>
                        </ul>
                    </div>
                </div>

                <div class="header-dropdown">
                    <a href="#">Français</a>
                    <div class="header-menu">
                        <ul>
                            <li><a href="#">English</a></li>
                            <li><a href="#">Spanish</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="header-right">
                <ul class="top-menu">
                    <li>
                        <a href="#">Liens</a>
                        <ul>
                            <li><a href="tel:#"><i class="icon-phone"></i>Tel: +241 77 22 71 07</a></li>
                            <li><a href="{{ url('wishlist')}}"><i class="icon-heart-o"></i>Mes favoris <span>(3)</span></a></li>
                            <li><a href="{{ url('about')}}">Apropos de nous</a></li>
                            <li><a href="{{ url('contact')}}">Contactez-Nous</a></li>
                            <li><a href="#signin-modal" data-toggle="modal"><i class="icon-user"></i>Connexion</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="header-middle sticky-header">
        <div class="container">
            <div class="header-left">
                <button class="mobile-menu-toggler">
                    <span class="sr-only">Toggle mobile menu</span>
                    <i class="icon-bars"></i>
                </button>

                <a href="{{ url('')}}" class="logo">
                    <img src="{{ url('assets/images/logo.png')}}" alt="" width="105" height="25">
                </a>

                <nav class="main-nav">
                    <ul class="menu sf-arrows">
                        <li class=" active">
                            <a href="{{ url('')}}">Accueil</a> 
                        </li>

                        <li>
                            <a href="category.html" class="sf-with-ul">Boutique</a>

                            <div class="megamenu megamenu-md">
                                <div class="row no-gutters">
                                    <div class="col-md-12">
                                        <div class="menu-col">
                                            <div class="row">

                                                @for($i = 0; $i <=5; $i++)   
                                                    <div class="col-md-4">
                                                        <div class="menu-title">Shop with sidebar</div>
                                                        <ul>
                                                            <li><a href="category-list.html">Shop List</a></li>
                                                            <li><a href="category-2cols.html">Shop Grid 2 Columns</a></li>
                                                            <li><a href="category.html">Shop Grid 3 Columns</a></li>
                                                            <li><a href="category-4cols.html">Shop Grid 4 Columns</a></li>
                                                            <li><a href="category-market.html"><span>Shop Market<span class="tip tip-new">New</span></span></a></li>
                                                        </ul>
                                                    </div>

                                                @endfor
                                                {{-- <div class="col-md-4">
                                                    <div class="menu-title">Product Category</div>
                                                    <ul>
                                                        <li><a href="product-category-boxed.html">Product Category Boxed</a></li>
                                                        <li><a href="product-category-fullwidth.html"><span>Product Category Fullwidth<span class="tip tip-new">New</span></span></a></li>
                                                    </ul>
                                                    <div class="menu-title">Shop Pages</div>
                                                    <ul>
                                                        <li><a href="cart.html">Cart</a></li>
                                                        <li><a href="checkout.html">Checkout</a></li>
                                                        <li><a href="wishlist.html">Wishlist</a></li>
                                                        <li><a href="dashboard.html">My Account</a></li>
                                                        <li><a href="#">Lookbook</a></li>
                                                    </ul>
                                                </div> --}}

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        {{-- <li>
                            <a href="product.html" class="sf-with-ul">Produits</a>

                            <div class="megamenu megamenu-sm">
                                <div class="row no-gutters">
                                    <div class="col-md-6">
                                        <div class="menu-col">
                                            <div class="menu-title">Product Details</div>
                                            <ul>
                                                <li><a href="product.html">Default</a></li>
                                                <li><a href="product-centered.html">Centered</a></li>
                                                <li><a href="product-extended.html"><span>Extended Info<span class="tip tip-new">New</span></span></a></li>
                                                <li><a href="product-gallery.html">Gallery</a></li>
                                                <li><a href="product-sticky.html">Sticky Info</a></li>
                                                <li><a href="product-sidebar.html">Boxed With Sidebar</a></li>
                                                <li><a href="product-fullwidth.html">Full Width</a></li>
                                                <li><a href="product-masonry.html">Masonry Sticky Info</a></li>
                                            </ul>
                                        </div><!-- End .menu-col -->
                                    </div><!-- End .col-md-6 -->

                                    <div class="col-md-6">
                                        <div class="banner banner-overlay">
                                            <a href="category.html">
                                                <img src="assets/images/menu/banner-2.jpg" alt="Banner">

                                                <div class="banner-content banner-content-bottom">
                                                    <div class="banner-title text-white">New Trends<br><span><strong>spring 2019</strong></span></div><!-- End .banner-title -->
                                                </div><!-- End .banner-content -->
                                            </a>
                                        </div><!-- End .banner -->
                                    </div><!-- End .col-md-6 -->
                                </div><!-- End .row -->
                            </div><!-- End .megamenu megamenu-sm -->
                        </li> --}}
                        

                    </ul>
                </nav>
            </div>

            <div class="header-right">
                <div class="header-search">
                    <a href="#" class="search-toggle" role="button" title="Search"><i class="icon-search"></i></a>
                    <form action="{{ url('search')}}" method="get">
                        <div class="header-search-wrapper">
                            <label for="q" class="sr-only">Rechercher</label>
                            <input type="search" class="form-control" name="q" id="q" placeholder="Search in..." required>
                        </div>
                    </form>
                </div>

                <div class="dropdown cart-dropdown">
                    <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                        <i class="icon-shopping-cart"></i>
                        <span class="cart-count">2</span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right">
                        <div class="dropdown-cart-products">
                            <div class="product">
                                <div class="product-cart-details">
                                    <h4 class="product-title">
                                        <a href="product.html">Beige knitted elastic runner shoes</a>
                                    </h4>

                                    <span class="cart-product-info">
                                        <span class="cart-product-qty">1</span>
                                        x $84.00
                                    </span>
                                </div>

                                <figure class="product-image-container">
                                    <a href="product.html" class="product-image">
                                        <img src="assets/images/products/cart/product-1.jpg" alt="product">
                                    </a>
                                </figure>
                                <a href="#" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                            </div>

                            <div class="product">
                                <div class="product-cart-details">
                                    <h4 class="product-title">
                                        <a href="product.html">Blue utility pinafore denim dress</a>
                                    </h4>

                                    <span class="cart-product-info">
                                        <span class="cart-product-qty">1</span>
                                        x $76.00
                                    </span>
                                </div>

                                <figure class="product-image-container">
                                    <a href="product.html" class="product-image">
                                        <img src="assets/images/products/cart/product-2.jpg" alt="product">
                                    </a>
                                </figure>
                                <a href="#" class="btn-remove" title="Remove Product"><i class="icon-close"></i></a>
                            </div>
                        </div>

                        <div class="dropdown-cart-total">
                            <span>Total</span>

                            <span class="cart-total-price">$160.00</span>
                        </div>

                        <div class="dropdown-cart-action">
                            <a href="cart.html" class="btn btn-primary">View Cart</a>
                            <a href="checkout.html" class="btn btn-outline-primary-2"><span>Checkout</span><i class="icon-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
