@extends('layouts.app')
@section('style')

@endsection
@section('content')
    
    <main class="main">
        <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
            <div class="container">
                <h1 class="page-title">Panier <span>Boutique</span></h1>
            </div>
        </div>
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <div class="container">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
                    <li class="breadcrumb-item"><a href="#">Boutique</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Panier</li>
                </ol>
            </div>
        </nav>

        <div class="page-content">
            <div class="cart">
                <div class="container">

                    @if(!empty(Cart::getContent()->count()))
                        <div class="row">
                            <div class="col-lg-9">
                                <form action="{{ url('update_cart')}}" method="post">
                                    {{ csrf_field() }}
                                    <table class="table table-cart table-mobile">
                                        <thead>
                                            <tr>
                                                <th>Produit</th>
                                                <th>Prix</th>
                                                <th>Quantité</th>
                                                <th>Total</th>
                                                <th></th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach(Cart::getContent() as $key => $cart)
                                                @php
                                                    $getCartProduct = App\Models\ProductModel::getSingle($cart->id);
                                                @endphp

                                                @if(!empty($getCartProduct))

                                                    @php
                                                        $getProductImage = $getCartProduct->getImageSingle($getCartProduct->id); 
                                                    @endphp
                                                    <tr>
                                                        <td class="product-col">
                                                            <div class="product">
                                                                <figure class="product-media">
                                                                    <a href="#">
                                                                        <img src="{{ $getProductImage->getLogo()}}" alt="Product image">
                                                                    </a>
                                                                </figure>

                                                                <h3 class="product-title">
                                                                    <a href="{{ url($getCartProduct->slug)}}">{{ $getCartProduct->title }}</a>
                                                                </h3>
                                                            </div>
                                                        </td>
                                                        <td class="price-col">{{ number_format($cart->price, 2)}} FCFA</td>
                                                        <td class="quantity-col">
                                                            <div class="cart-product-quantity">
                                                                <input type="number" class="form-control" value="{{ $cart->quantity}}" min="1" name="cart[{{ $key}}][qty]" max="100" step="1" data-decimals="0" required>
                                                            </div>
                                                            <input type="hidden" value="{{ $cart->id}}" name="cart[{{ $key }}][id]">
                                                        </td>
                                                        <td class="total-col">{{ number_format($cart->price * $cart->quantity, 2)}} FCFA</td>
                                                        <td class="remove-col"><a href="{{ url('cart/delete/'.$cart->id)}}" class="btn-remove"><i class="icon-close"></i></a></td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table><!-- End .table table-wishlist -->
                                    <div class="cart-bottom">
                                        
                                        <button type="submit" class="btn btn-outline-dark-2"><span>METTRE À JOUR LE PANIER</span><i class="icon-refresh"></i></button>
                                    </div>
                                </form>
                            </div>
                            <aside class="col-lg-3">
                                <div class="summary summary-cart">
                                    <h3 class="summary-title">Total du panier</h3>
                                    <table class="table table-summary">
                                        <tbody>
                                            <tr class="summary-subtotal">
                                                <td>TOTAL :</td>
                                                <td>{{number_format(Cart::getSubTotal(), 2)}} FCFA</td>
                                            </tr>
                                            {{-- <tr class="summary-shipping">
                                                <td>Expédition :</td>
                                                <td>&nbsp;</td>
                                            </tr> --}}

                                            {{-- <tr class="summary-shipping-row">
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="free-shipping" name="shipping" class="custom-control-input">
                                                        <label class="custom-control-label" for="free-shipping">Livraison gratuite</label>
                                                    </div>
                                                </td>
                                                <td>0.00 FCFA</td>
                                            </tr>

                                            <tr class="summary-shipping-row">
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="standart-shipping" name="shipping" class="custom-control-input">
                                                        <label class="custom-control-label" for="standart-shipping">Standart:</label>
                                                    </div>
                                                </td>
                                                <td>0.00 FCFA</td>
                                            </tr>

                                            <tr class="summary-shipping-row">
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="express-shipping" name="shipping" class="custom-control-input">
                                                        <label class="custom-control-label" for="express-shipping">Express:</label>
                                                    </div>
                                                </td>
                                                <td>0.00 FCFA</td>
                                            </tr> --}}

                                            <tr class="summary-total">
                                                <td>Total:</td>
                                                <td>{{number_format(Cart::getSubTotal(), 2)}} FCFA</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <a href="{{ url('checkout')}}" class="btn btn-outline-primary-2 btn-order btn-block">PASSER À LA CAISSE</a>
                                </div>

                                <a href="{{ url('')}} " class="btn btn-outline-dark-2 btn-block mb-3"><span>CONTINUER SES ACHATS</span><i class="icon-refresh"></i></a>
                            </aside><!-- End .col-lg-3 -->
                        </div><!-- End .row -->
                    @else
                        <h6 style="text-align: center"><span>Le panier est vide!</span></h6>
                    @endif
                </div><!-- End .container -->
            </div><!-- End .cart -->
        </div><!-- End .page-content -->
    </main><!-- End .main -->
    
@endsection 
@section('script')
@endsection

