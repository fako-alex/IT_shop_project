@extends('layouts.app')
@section('style')

@endsection
@section('content')
    
<main class="main">
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Checkout<span>Shop</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Shop</a></li>
                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
            </ol>
        </div><!-- End .container -->
    </nav><!-- End .breadcrumb-nav -->

    <div class="page-content">
        <div class="checkout">
            <div class="container">
                {{-- <div class="checkout-discount">
                    <form action="#">
                        <input type="text" class="form-control" required id="checkout-discount-input">
                        <label for="checkout-discount-input" class="text-truncate">Have a coupon? <span>Click here to enter your code</span></label>
                    </form>
                </div><!-- End .checkout-discount --> --}}
                <form action="#">
                    <div class="row">
                        <div class="col-lg-9">
                            <h2 class="checkout-title">Billing Details</h2><!-- End .checkout-title -->
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>First Name *</label>
                                        <input type="text" class="form-control" required>
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-6">
                                        <label>Last Name *</label>
                                        <input type="text" class="form-control" required>
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->

                                <label>Company Name (Optional)</label>
                                <input type="text" class="form-control">

                                <label>Country *</label>
                                <input type="text" class="form-control" required>

                                <label>Street address *</label>
                                <input type="text" class="form-control" placeholder="House number and Street name" required>
                                <input type="text" class="form-control" placeholder="Appartments, suite, unit etc ..." required>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Town / City *</label>
                                        <input type="text" class="form-control" required>
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-6">
                                        <label>State / County *</label>
                                        <input type="text" class="form-control" required>
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->

                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Postcode / ZIP *</label>
                                        <input type="text" class="form-control" required>
                                    </div><!-- End .col-sm-6 -->

                                    <div class="col-sm-6">
                                        <label>Phone *</label>
                                        <input type="tel" class="form-control" required>
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->

                                <label>Email address *</label>
                                <input type="email" class="form-control" required>

                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="checkout-create-acc">
                                    <label class="custom-control-label" for="checkout-create-acc">Create an account?</label>
                                </div><!-- End .custom-checkbox -->

                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="checkout-diff-address">
                                    <label class="custom-control-label" for="checkout-diff-address">Ship to a different address?</label>
                                </div><!-- End .custom-checkbox -->

                                <label>Order notes (optional)</label>
                                <textarea class="form-control" cols="30" rows="4" placeholder="Notes about your order, e.g. special notes for delivery"></textarea>
                        </div><!-- End .col-lg-9 -->
                        <aside class="col-lg-3">
                            <div class="summary">
                                <h3 class="summary-title">Your Order</h3><!-- End .summary-title -->

                                <table class="table table-summary">
                                    <thead>
                                        <tr>
                                            <th>Produit(s)</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach(Cart::getContent() as $key => $cart)
                                            @php
                                                $getCartProduct = App\Models\ProductModel::getSingle($cart->id);
                                            @endphp
                                            <tr>
                                                <td><a href="{{ url($getCartProduct->slug)}}">{{ $getCartProduct->title}} </a></td>
                                                <td>{{ number_format($cart->price * $cart->quantity, 2)}} FCFA</td>
                                            </tr>
                                        @endforeach

                                        <tr class="summary-subtotal">
                                            <td>Subtotal:</td>
                                            <td>{{number_format(Cart::getSubTotal(), 2)}} FCFA</td>
                                        </tr><!-- End .summary-subtotal -->





                                        {{-- <tr>
                                            <td colspan="2">
                                                <div class="cart-discount">
                                                    <div class="input-group">
                                                        <input type="text" id="getDiscountCode" class="form-control" placeholder="Code de réduction">
                                                        <div class="input-group-append">
                                                            <button id="ApplyDiscount" style="height: 38px;" type="button" class="btn btn-outline-primary-2">
                                                                <i class="icon-long-arrow-right"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr> --}}
                                        
                                        <tr>
                                            <td colspan="2">
                                                <div class="cart-discount">
                                                    <div class="input-group">
                                                        <input type="text" id="getDiscountCode" class="form-control" placeholder="Code de réduction">
                                                        <div class="input-group-append">
                                                            <button id="ApplyDiscount" style="height: 38px;" type="button" class="btn btn-outline-primary-2">
                                                                <i class="icon-long-arrow-right"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <!-- Conteneur pour afficher les messages -->
                                                    <div id="discount-message" style="margin-top: 10px; color: red;"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        

                                        <tr>
                                            <td>Rabais:</td>
                                            <td><span id="getDiscountAmount">0.00</span> FCFA</td>
                                        </tr><!-- End .summary-subtotal -->

                                        <tr>
                                            <td>Expédition :</td>
                                            <td>Livraison gratuite</td>
                                        </tr>
                                        <tr class="summary-total">
                                            <td>Total:</td>
                                            <td> <span id="getPayableTotal">{{number_format(Cart::getSubTotal(), 2)}}</span> FCFA</td>
                                        </tr><!-- End .summary-total -->
                                    </tbody>
                                </table><!-- End .table table-summary -->

                                <div class="accordion-summary" id="accordion-payment">

                                    <div class="card">
                                        <div class="card-header" id="heading-3">
                                            <h2 class="card-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-3" aria-expanded="false" aria-controls="collapse-3">
                                                    Paiement à la livraison
                                                </a>
                                            </h2>
                                        </div><!-- End .card-header -->
                                        <div id="collapse-3" class="collapse" aria-labelledby="heading-3" data-parent="#accordion-payment">
                                            <div class="card-body">Quisque volutpat mattis eros. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. 
                                            </div><!-- End .card-body -->
                                        </div><!-- End .collapse -->
                                    </div><!-- End .card -->

                                    <div class="card">
                                        <div class="card-header" id="heading-4">
                                            <h2 class="card-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-4" aria-expanded="false" aria-controls="collapse-4">
                                                    PayPal <small class="float-right paypal-link">What is PayPal?</small>
                                                </a>
                                            </h2>
                                        </div><!-- End .card-header -->
                                        <div id="collapse-4" class="collapse" aria-labelledby="heading-4" data-parent="#accordion-payment">
                                            <div class="card-body">
                                                Nullam malesuada erat ut turpis. Suspendisse urna nibh, viverra non, semper suscipit, posuere a, pede. Donec nec justo eget felis facilisis fermentum.
                                            </div><!-- End .card-body -->
                                        </div><!-- End .collapse -->
                                    </div><!-- End .card -->

                                    <div class="card">
                                        <div class="card-header" id="heading-5">
                                            <h2 class="card-title">
                                                <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-5" aria-expanded="false" aria-controls="collapse-5">
                                                    Credit Card (Stripe)
                                                    <img src="assets/images/payments-summary.png" alt="payments cards">
                                                </a>
                                            </h2>
                                        </div><!-- End .card-header -->
                                        <div id="collapse-5" class="collapse" aria-labelledby="heading-5" data-parent="#accordion-payment">
                                            <div class="card-body"> Donec nec justo eget felis facilisis fermentum.Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Donec odio. Quisque volutpat mattis eros. Lorem ipsum dolor sit ame.
                                            </div><!-- End .card-body -->
                                        </div><!-- End .collapse -->
                                    </div><!-- End .card -->
                                </div><!-- End .accordion -->

                                <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
                                    <span class="btn-text">Place Order</span>
                                    <span class="btn-hover-text">Proceed to Checkout</span>
                                </button>
                            </div><!-- End .summary -->
                        </aside><!-- End .col-lg-3 -->
                    </div><!-- End .row -->
                </form>
            </div><!-- End .container -->
        </div><!-- End .checkout -->
    </div><!-- End .page-content -->
</main>
    
@endsection 
@section('script')

{{-- <script type="text/javascript">
    $(document).ready(function() {
        // Assurez-vous que jQuery est chargé et prêt
        $('body').on('click', '#ApplyDiscount', function() {
            var discount_code = $('#getDiscountCode').val();

            // Vérifiez que le code de réduction n'est pas vide
            if (discount_code.trim() === "") {
                alert("Veuillez entrer un code de réduction.");
                return;
            }

            $.ajax({
                type: "POST",
                url: "{{ url('checkout/apply_discount_code') }}",
                data: {
                    discount_code: discount_code,
                    "_token": "{{ csrf_token() }}",
                },
                success: function(data) {
                    // Assurez-vous que data.status est correctement vérifié
                    if (data.status === true) {
                        // Mettre à jour l'affichage avec le nouveau total
                        alert(data.message);
                    } else {
                        // Afficher le message d'erreur renvoyé par le backend
                        alert(data.message);
                    }
                },
                error: function(xhr, status, error) {
                    // Gérer l'erreur lors de la requête
                    console.error('Error:', error);
                    alert('Une erreur est survenue lors de l\'application du code de réduction.');
                }
            });
        });
    });
</script> --}}

<script type="text/javascript">
    $(document).ready(function() {
        // Assurez-vous que jQuery est chargé et prêt
        $('body').on('click', '#ApplyDiscount', function() {
            var discount_code = $('#getDiscountCode').val();

            // Vérifiez que le code de réduction n'est pas vide
            if (discount_code.trim() === "") {
                $('#discount-message').text("Veuillez entrer un code de réduction.");
                return;
            }

            // Afficher un message de validation en cours
            $('#discount-message').css('color', 'orange').text("Code de réduction en cours de validation...");

            $.ajax({
                type: "POST",
                url: "{{ url('checkout/apply_discount_code') }}",
                data: {
                    discount_code: discount_code,
                    "_token": "{{ csrf_token() }}",
                },
                success: function(data) {

                    $('#getDiscountAmount').html(data.discount_amount);
                    $('#getPayableTotal').html(data.payable_total);

                    if (data.status === true) {
                        // Mettre à jour l'affichage avec le nouveau total et message de succès
                        $('#discount-message').css('color', 'green').text(data.message);
                        $('.summary-total td:last-child').text(data.new_total);
                    } else {
                        $('#discount-message').css('color', 'red').text(data.message);
                    }
                },
                error: function(xhr, status, error) {
                    // Gérer l'erreur lors de la requête
                    // console.error('Error:', error);
                    // $('#discount-message').css('color', 'red').text('Une erreur est survenue lors de l\'application du code de réduction.');
                }
            });
        });
    });
</script>



@endsection

