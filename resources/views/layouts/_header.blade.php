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
                            <a href="javascript:;" class="sf-with-ul">Boutique</a>

                            <div class="megamenu megamenu-md">
                                <div class="row no-gutters">
                                    <div class="col-md-12">
                                        <div class="menu-col">
                                            <div class="row">
                                                @php
                                                    $getCategoryHeader = App\Models\CategoryModel::getRecordMenu();
                                                @endphp
                            
                                                @foreach($getCategoryHeader as $value_header_category)
                                                    @if(!empty($value_header_category->getSubCategory->Count()))
                                                        <div class="col-md-4" style="margin-bottom: 20px">
                                                            <a href="{{ url($value_header_category->slug) }}" class="menu-title">{{ $value_header_category->name }}</a>
                                                            
                                                            <ul>
                                                                @foreach($value_header_category->getSubCategory as $value_header_subcategory)
                                                                    <li>
                                                                        <a href="{{ url($value_header_category->slug.'/'.$value_header_subcategory->slug) }}">
                                                                            {{ $value_header_subcategory->name }}
                                                                        </a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </nav>
            </div>

            <div class="header-right">
                <div class="header-search">
                    <a href="#" class="search-toggle" role="button" title="Search"><i class="icon-search"></i></a>
                    <form action="{{ url('search')}}" method="get">
                        <div class="header-search-wrapper">
                            <label for="q" class="sr-only">Rechercher</label>
                            <input type="search" class="form-control" name="q" id="q" placeholder="Search in..." value="{{ !empty($getSubCategory) ? $getSubCategory->id : ''}}" required>
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
