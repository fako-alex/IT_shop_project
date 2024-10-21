@extends('layouts.app')
@section('style')

@endsection
@section('content')
    
<main class="main">
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Commander<span>Boutique</span></h1>
        </div>
    </div>
    <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Accueil</a></li>
                <li class="breadcrumb-item"><a href="#">Boutique</a></li>
                <li class="breadcrumb-item active" aria-current="page">Vérifier</li>
            </ol>
        </div>
    </nav>

    <div class="page-content">
        <div class="checkout">
            <div class="container">
                
                <form action="" id="SubmitForm" method="POST">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-lg-9">
                            <h2 class="checkout-title">Détails de facturation</h2><!-- End .checkout-title -->
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Prénom <span style="color: red">*</span></label>
                                    <input type="text" name="first_name" class="form-control" required>
                                </div><!-- End .col-sm-6 -->
                        
                                <div class="col-sm-6">
                                    <label>Nom de famille <span style="color: red">*</span></label>
                                    <input type="text" name="last_name" class="form-control" required>
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->
                        
                            <label>Nom de l'entreprise (facultatif)</label>
                            <input type="text" name="company_name" class="form-control">
                        
                            <label>Pays <span style="color: red">*</span></label>
                            <input type="text" name="county" class="form-control" required>
                        
                            <label>Adresse 1<span style="color: red">*</span></label>
                            <input type="text" name="address_one" class="form-control" required>
                            <label>Adresse 2</label>
                            <input type="text" name="address_two" class="form-control">
                        
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Ville <span style="color: red">*</span></label>
                                    <input type="text" name="city" class="form-control" required>
                                </div><!-- End .col-sm-6 -->
                        
                                <div class="col-sm-6">
                                    <label>Province <span style="color: red">*</span></label>
                                    <input type="text" name="state" class="form-control" required>
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->
                        
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Code postal <span style="color: red">*</span></label>
                                    <input type="text" name="postcode" class="form-control" required>
                                </div><!-- End .col-sm-6 -->
                        
                                <div class="col-sm-6">
                                    <label>Téléphone <span style="color: red">*</span></label>
                                    <input type="tel" name="phone" class="form-control" required>
                                </div><!-- End .col-sm-6 -->
                            </div><!-- End .row -->
                        
                            <label>Adresse e-mail <span style="color: red">*</span></label>
                            <input type="email" name="email" class="form-control" required>
                        











                            @if(empty(Auth::check()))

                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="is_create" class="custom-control-input createAccount" id="checkout-create-acc">
                                    <label class="custom-control-label" for="checkout-create-acc">Créer un compte ?</label>
                                </div><!-- End .custom-checkbox -->
                                
                                <div id="showPassword" style="display: none">
                                    <label>Mot de passe<span style="color: red">*</span></label>
                                    <input type="text" name="password" id="inputPassword" class="form-control">
                                </div>
                            @endif

                            <label>Notes de commande (facultatif)</label>
                            <textarea class="form-control" name="notes" cols="30" rows="4" placeholder="Notes concernant votre commande, par exemple, des instructions spéciales pour la livraison"></textarea>
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
                                        </tr>
                                        
                                        <tr>
                                            <td colspan="2">
                                                <div class="cart-discount">
                                                    <div class="input-group">
                                                        <input type="text" name="discount_code" id="getDiscountCode" class="form-control" placeholder="Code de réduction">
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
                                        </tr>

                                        <tr class="summary-shipping">
                                            <td>Expédition :</td>
                                            <td>&nbsp;</td>
                                        </tr>

                                        @foreach($getShipping as $shipping)
                                            <tr class="summary-shipping-row">
                                                <td>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" value="{{ $shipping->id}}" id="free-shipping {{ $shipping->id}}" name="shipping" data-price="{{ !empty($shipping->price) ? $shipping->price : 0}}" class="custom-control-input getShippingCharge">
                                                        <label class="custom-control-label" for="free-shipping {{ $shipping->id}}">{{ $shipping->name}}</label>
                                                    </div>
                                                </td>
                                                <td>
                                                    @if(!empty($shipping->price))
                                                        {{ number_format($shipping->price,2)}}FCFA
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach

                                        <tr class="summary-total">
                                            <td>Total:</td>
                                            <td> <span id="getPayableTotal">{{number_format(Cart::getSubTotal(), 2)}}</span> FCFA</td>
                                        </tr><!-- End .summary-total -->
                                    </tbody>
                                </table><!-- End .table table-summary -->

                                <input type="hidden" id="getShippingChargeTotal" value="0">
                                <input type="hidden" id="PayableTotal" value="{{Cart::getSubTotal()}}">

                                <div class="accordion-summary" id="accordion-payment">

                                    <div class="custom-control custom-radio">
                                        <input type="radio" value="cash" id="Cashondelivery" name="payment_method" required class="custom-control-input">
                                        <label class="custom-control-label" for="Cashondelivery">Paiement à la livraison</label>
                                    </div>

                                    <div class="custom-control custom-radio" style="margin-top: 0px;">
                                        <input type="radio" value="paypal" id="paypal" name="payment_method" required class="custom-control-input">
                                        <label class="custom-control-label" for="paypal">PayPal</label>
                                    </div>

                                    <div class="custom-control custom-radio" style="margin-top: 0px;">
                                        <input type="radio" value="stripe" id="CreditCard" name="payment_method" required class="custom-control-input">
                                        <label class="custom-control-label" for="CreditCard">Credit Card (Stripe)</label>
                                    </div>

                                </div>

                                <button type="submit" class="btn btn-outline-primary-2 btn-order btn-block">
                                    <span class="btn-text">Place Order</span>
                                    <span class="btn-hover-text">Proceed to Checkout</span>
                                </button>
                                <br><br/>
                                <img src="{{ url('assets/images/payments-summary.png')}}">
                            </div>
                        </aside>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
    
@endsection 
@section('script')

<script type="text/javascript">
    $(document).ready(function() {

        $('#SubmitForm').on('submit', function(e) {
            e.preventDefault();
            //console.log("Submitting form...");

            $.ajax({
                type: "POST",
                url: "{{ url('checkout/place_order') }}",
                data: new FormData(this),
                processData: false,
                contentType: false,
                dataType: 'json',
                success: function(data) {
                    if (data.status == false) {
                        alert(data.message);
                    }else{
                        window.location.href = data.redirect;
                    }
                },
                error: function(data) {
                    // console.error(data); // Affichez les erreurs dans la console
                    // alert("Une erreur s'est produite. Veuillez réessayer.");
                }
            });
        });


        // Gestion de la création du compte
        $('body').on('change', '.createAccount', function() {
            if(this.checked){
                $('#showPassword').show();
                $("inputPassword").prop('required', true);
            }else{
                $('#showPassword').hide();
                $("inputPassword").prop('required', false);
            }
        });

        // Gestion de la sélection du frais d'expédition
        $('body').on('change', '.getShippingCharge', function() {
            var price = parseFloat($(this).attr('data-price')) || 0; // Récupère le prix ou 0 s'il est vide
            var total = parseFloat($('#PayableTotal').val()) || 0; // Récupère le total ou 0 s'il est vide
            
            // Met à jour les champs cachés
            $('#getShippingChargeTotal').val(price);
            
            // Calcul du total payable (prix expédition + total actuel)
            var final_total = price + total;
            $('#getPayableTotal').html(final_total.toFixed(2)); // Met à jour l'affichage du total
        });

        // Gestion de l'application du code de réduction
        $('body').on('click', '#ApplyDiscount', function() {
            var discount_code = $('#getDiscountCode').val().trim();

            // Vérification que le code de réduction n'est pas vide
            if (discount_code === "") {
                $('#discount-message').text("Veuillez entrer un code de réduction.").css('color', 'red');
                return;
            }

            // Afficher un message de validation en cours
            $('#discount-message').css('color', 'orange').text("Code de réduction en cours de validation...");

            // Requête Ajax pour appliquer le code de réduction
            $.ajax({
                type: "POST",
                url: "{{ url('checkout/apply_discount_code') }}",
                data: {
                    discount_code: discount_code,
                    "_token": "{{ csrf_token() }}",
                },
                success: function(data) {
                    if (data.status === true) {
                        // Si la réduction est appliquée avec succès
                        $('#discount-message').css('color', 'green').text(data.message);
                        $('#getDiscountAmount').html(data.discount_amount);
                        
                        // Recalculer le total payable
                        var shipping = parseFloat($('#getShippingChargeTotal').val()) || 0;
                        var final_total = parseFloat(data.payable_total) + shipping;
                        
                        $('#getPayableTotal').html(final_total.toFixed(2));
                        $('#PayableTotal').val(data.payable_total.toFixed(2));
                    } else {
                        // Si le code de réduction est invalide
                        $('#discount-message').css('color', 'red').text(data.message);
                    }
                },
                error: function(xhr, status, error) {
                    // Gérer l'erreur lors de la requête
                    // $('#discount-message').css('color', 'red').text('Une erreur est survenue lors de l\'application du code de réduction.');
                }
            });
        });
    });
</script>



@endsection

