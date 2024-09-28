@extends('layouts.app')
@section('style')
    <link rel="stylesheet" href="{{ url('assets/css/plugins/nouislider/nouislider.css')}}"> 
    <style type="text/css">
     .active-color{
        border: 3px solid #0c335c !important;
     }
    </style>
@endsection
@section('content')
<main class="main">
    <nav aria-label="breadcrumb" class="breadcrumb-nav border-0 mb-0">
        <div class="container d-flex align-items-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('') }}">Accueil</a></li>
                <li class="breadcrumb-item"><a href="{{ url($getProduct->getCategory->slug)}}">{{ $getProduct->getCategory->name}} </a></li>
                <li class="breadcrumb-item"><a href="{{ url($getProduct->getCategory->slug.'/'.$getProduct->getSubCategory->slug)}}">{{ $getProduct->getSubCategory->name}} </a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $getProduct->title}} </li>
            </ol>
        </div>
    </nav>

    <div class="page-content">
        <div class="container">
            <div class="product-details-top mb-2">
                <div class="row">
                    <div class="col-md-6">
                        <div class="product-gallery">
                            <figure class="product-main-image">
                                @php
                                   $getProductImage = $getProduct->getImageSingle($getProduct->id); 
                                @endphp

                                @if(!empty($getProductImage) &&!empty($getProductImage->getLogo()))
                                    <img id="product-zoom" src="{{ $getProductImage->getLogo() }}" data-zoom-image="{{ $getProductImage->getLogo() }}" alt="product image">

                                    <a href="#" id="btn-product-gallery" class="btn-product-gallery">
                                        <i class="icon-arrows"></i>
                                    </a>
                                @endif
                            </figure>

                            <div id="product-zoom-gallery" class="product-image-gallery" >
                                @foreach($getProduct->getImage as $image)
                                    <a class="product-gallery-item" href="#" data-image="{{ $image->getLogo()}} ">
                                        <img src="{{ $image->getLogo() }}" alt="product side"  style="border-color: rgb(233, 23, 23)">
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="product-details">
                            <h1 class="product-title">{{ $getProduct->title}}</h1>

                            <div class="ratings-container">
                                <div class="ratings">
                                    <div class="ratings-val" style="width: 80%;"></div>
                                </div>
                                <a class="ratings-text" href="#product-review-link" id="review-link">( 2 Reviews )</a>
                            </div>

                            <div class="product-price">
                                <span id="getTotalPrice">{{ number_format($getProduct->price, 2) }} FCFA</span>
                            </div>

                            <div class="product-content">
                                <p>{{ $getProduct->short_description}} </p>
                            </div>


















                            @if(!empty($getProduct->getColor->count()))
                                <div class="details-filter-row details-row-size">
                                    <label for="color">Couleur :</label>
                                    <div class="select-custom">
                                        <select name="color" id="color" class="form-control">
                                            <option value="#" selected="selected">Selectionez la Couleur</option>
                                            @foreach($getProduct->getColor as $color)
                                                <option value="{{ $color->getColor->id }}">{{ $color->getColor->name }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @endif




















                            @if(!empty($getProduct->getSize->count()))
                                <div class="details-filter-row details-row-size">
                                    <label for="size">Taille :</label>
                                    <div class="select-custom">
                                        <select name="size" id="size" class="form-control getSizePrice">
                                            <option data-price="0" value="#" selected="selected">Selectionez la taille</option>
                                            @foreach($getProduct->getSize as $size)
                                                <option data-price="{{ !empty($size->price) ? $size->price : 0}} " value="{{ $size->id }}">{{ $size->name }} @if(!empty( $size->price)) ({{ number_format($size->price, 2)}} FCFA) @endif</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            @endif

                            <div class="details-filter-row details-row-size">
                                <label for="qty">Qty:</label>
                                <div class="product-details-quantity">
                                    <input type="number" id="qty" class="form-control" value="1" min="1" max="1000" step="1" data-decimals="0" required>
                                </div>
                            </div>

                            <div class="product-details-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>

                                <div class="details-action-wrapper">
                                    <a href="#" class="btn-product btn-wishlist" title="Wishlist"><span>Add to Wishlist</span></a>
                                    {{-- <a href="#" class="btn-product btn-compare" title="Compare"><span>Add to Compare</span></a> --}}
                                </div>
                            </div>

                            <div class="product-details-footer">
                                <div class="product-cat">
                                    <span>Categories :</span>
                                    <a href="{{ url($getProduct->getCategory->slug)}}">{{ $getProduct->getCategory->name}} </a>
                                    <a href="{{ url($getProduct->getCategory->slug.'/'.$getProduct->getSubCategory->slug)}}">{{ $getProduct->getSubCategory->name}} </a>
                                </div>

                                {{-- <div class="social-icons social-icons-sm">
                                    <span class="social-label">Share:</span>
                                    <a href="#" class="social-icon" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                                    <a href="#" class="social-icon" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                                    <a href="#" class="social-icon" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                                    <a href="#" class="social-icon" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="product-details-tab product-details-extended">
            <div class="container">
                <ul class="nav nav-pills justify-content-center" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="product-desc-link" data-toggle="tab" href="#product-desc-tab" role="tab" aria-controls="product-desc-tab" aria-selected="true">Description</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="product-info-link" data-toggle="tab" href="#product-info-tab" role="tab" aria-controls="product-info-tab" aria-selected="false">Informations Complémentaires</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="product-shipping-link" data-toggle="tab" href="#product-shipping-tab" role="tab" aria-controls="product-shipping-tab" aria-selected="false">Expéditions et retours</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="product-review-link" data-toggle="tab" href="#product-review-tab" role="tab" aria-controls="product-review-tab" aria-selected="false">Avis (2)</a>
                    </li>
                </ul>
            </div>
        
            <div class="tab-content">
                <div class="tab-pane fade show active" id="product-desc-tab" role="tabpanel" aria-labelledby="product-desc-link">
                    <div class="product-desc-content">
                        <div class="container" style="margin-top: 20px;">
                            <div class="row justify-content-start">
                                <div class="col-sm-6 col-lg-4">
                                    {!! $getProduct->description !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="product-info-tab" role="tabpanel" aria-labelledby="product-info-link">
                    <div class="product-desc-content">
                        <div class="container" style="margin-top: 20px;">
                            <div class="row justify-content-start">
                                <div class="col-sm-6 col-lg-4">
                                    {!! $getProduct->additional_information !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        
                <div class="tab-pane fade" id="product-shipping-tab" role="tabpanel" aria-labelledby="product-shipping-link">
                    <div class="product-desc-content">
                        <div class="container" style="margin-top: 20px;">
                            <div class="row justify-content-start">
                                <div class="col-sm-6 col-lg-4">
                                    {!! $getProduct->shipping_returns !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        
                <div class="tab-pane fade" id="product-review-tab" role="tabpanel" aria-labelledby="product-review-link">
                    <div class="reviews">
                        <div class="container" style="margin-top: 20px;">
                            <h3>Reviews (2)</h3>
                            <div class="review">
                                <div class="row no-gutters">
                                    <div class="col-auto">
                                        <h4><a href="#">Samanta J.</a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 80%;"></div>
                                            </div>
                                        </div>
                                        <span class="review-date">6 days ago</span>
                                    </div>
                                    <div class="col">
                                        <h4>Good, perfect size</h4>
                                        <div class="review-content">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                                        </div>
                                        <div class="review-action">
                                            <a href="#"><i class="icon-thumbs-up"></i>Helpful (2)</a>
                                            <a href="#"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
        
                            <div class="review">
                                <div class="row no-gutters">
                                    <div class="col-auto">
                                        <h4><a href="#">John Doe</a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings">
                                                <div class="ratings-val" style="width: 100%;"></div>
                                            </div>
                                        </div>
                                        <span class="review-date">5 days ago</span>
                                    </div>
                                    <div class="col">
                                        <h4>Very good</h4>
                                        <div class="review-content">
                                            <p>Sed, molestias, tempore? Ex dolor esse iure hic veniam...</p>
                                        </div>
                                        <div class="review-action">
                                            <a href="#"><i class="icon-thumbs-up"></i>Helpful (0)</a>
                                            <a href="#"><i class="icon-thumbs-down"></i>Unhelpful (0)</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <h2 class="title text-center mb-4">You May Also Like</h2><!-- End .title text-center -->
            {{-- début Ajout des éléments de produit --}}
            <div class="owl-carousel owl-simple carousel-equal-height carousel-with-shadow" data-toggle="owl" 
                data-owl-options='{
                    "nav": false, 
                    "dots": true,
                    "margin": 20,
                    "loop": false,
                    "responsive": {
                        "0": {
                            "items":1
                        },
                        "480": {
                            "items":2
                        },
                        "768": {
                            "items":3
                        },
                        "992": {
                            "items":4
                        },
                        "1200": {
                            "items":4,
                            "nav": true,
                            "dots": false
                        }
                    }
                }'>
        
                @foreach($getRelatedProduct as $value)
                    {{-- hello hord --}}
                    @php
                        $getProductImage = $value->getImageSingle($value->id);
                    @endphp
                      
                    <div class="product product-7 text-center">
                        <figure class="product-media">
                            <span class="product-label label-new">New</span>
                            <a href="{{ url($value->slug)}}">
                                @if(!empty($getProductImage) && !empty($getProductImage->getLogo()))
                                    <img style="height: 280px; width: 100%; objectif-fit: cover;" src="{{ $getProductImage->getLogo()}}" alt="{{ $value->title}}" class="product-image">
                                    {{-- <img src="assets/images/products/product-1.jpg" alt="Product image" class="product-image"> --}}
                                @endif
                            </a>
        
                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>        
                            </div>
                            {{-- <div class="product-action">
                                <a href="#" class="btn-product btn-cart"><span>add to cart</span></a>
                            </div> --}}
                        </figure>
        
                        <div class="product-body">
                            <div class="product-cat">
                                <a href="{{url($value->category_slug.'/'.$value->sub_category_slug)}}">{{ $value->sub_category_name}} </a>
                            </div>
                            <h3 class="product-title"><a href="{{ url($value->slug)}}">{{ $value->title}} </a></h3><!-- End .product-title -->
                            <div class="product-price">
                                {{-- {{ number_format($value->price, 2)}} FCFA // le ,2 permet d'ajouter les chiffres après la virgule. --}}
                                {{ number_format($value->price)}} FCFA 
                            </div>
                            <div class="ratings-container">
                                <div class="ratings">
                                    <div class="ratings-val" style="width: 15%;"></div><!-- End .ratings-val -->
                                </div>
                                <span class="ratings-text">( 2 Reviews )</span>
                            </div> 
                        </div>
                    </div>
                @endforeach
        
        
        
            </div>
        </div>
    </div>
</main>
@endsection 
@section('script')
<script src="{{ url('assets/js/bootstrap-input-spinner.js')}}"></script>
<script src="{{ url('assets/js/jquery.elevateZoom.min.js')}}"></script>
<script src="{{ url('assets/js/bootstra-input-spinner.js')}}"></script>
<script src="{{ url('assets/js/owl.carousel.min.js')}}"></script>
<script src="{{ url('assets/js/owl.jquery   .min.js')}}"></script>
<script>
    $(document).ready(function(){
        $('.owl-carousel').owlCarousel({
            nav: false,
            dots: true,
            margin: 20,
            loop: false,
            responsive: {
                0: { items: 1 },
                480: { items: 2 },
                768: { items: 3 },
                992: { items: 4 },
                1200: { items: 4, nav: true, dots: false }
            }
        });
        
        $('.getSizePrice').change(function(){
            var product_price = '{{ $getProduct->price }}';
            var price = $('option:selected', this).attr('data-price');
            var total = parseFloat(product_price) + parseFloat(price);
            $('#getTotalPrice').html((total) + '  FCFA');
                        
        })

        
    //     $('.getSizePrice').change(function() {
    //     // Récupérer le prix du produit initial
    //     var product_price = parseFloat('{{ $getProduct->price }}') || 0;
        
    //     // Récupérer la taille sélectionnée et son prix
    //     var selectedOption = $('option:selected', this);
    //     var size_price = parseFloat(selectedOption.attr('data-price')) || 0;

    //     // console.log('Product Price:', product_price);
    //     // console.log('Selected Size Price:', size_price);

    //     // Si une taille est sélectionnée avec un prix, on prend ce prix, sinon on prend le prix de base du produit
    //     var total = size_price > 0 ? size_price : product_price;

    //     // Formater le prix total avec 2 décimales et l'afficher
    //     $('#getTotalPrice').html(total.toFixed(2) + ' FCFA');
    // });

});
</script>

@endsection

