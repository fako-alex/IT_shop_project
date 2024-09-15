<div class="products mb-3">
    <div class="row justify-content-center">
        @if($getProduct->isEmpty())
            <p>Pas de produits affectés dans cette catégorie</p>
        @else
            @foreach($getProduct as $value)
                @php
                    $getproductImage = $value->getImageSingle($value->id);
                @endphp

                <div class="col-6 col-md-4 col-lg-4">
                    <div class="product product-7 text-center">
                        <figure class="product-media">
                            <a href="{{ url($value->slug)}}">
                                @if(!empty($getproductImage) && !empty($getproductImage->getLogo()))
                                    <img style="height: 280px; width: 100%; objectif-fit: cover;" src="{{ $getproductImage->getLogo()}}" alt="{{ $value->title}}" class="product-image">
                                @endif
                            </a>

                            <div class="product-action-vertical">
                                <a href="#" class="btn-product-icon btn-wishlist btn-expandable"><span>add to wishlist</span></a>
                                {{-- <a href="popup/quickView.html" class="btn-product-icon btn-quickview" title="Quick view"><span>Quick view</span></a>
                                <a href="#" class="btn-product-icon btn-compare" title="Compare"><span>Compare</span></a> --}}
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
                                    <div class="ratings-val" style="width: 50%;"></div><!-- End .ratings-val -->
                                </div>
                                <span class="ratings-text">( 2 Reviews )</span>
                            </div>        
                        </div>
                    </div>
                </div>
            @endforeach
        @endif

    </div>
</div>

{{-- <div class="justify-content-center">
    {!! $getProduct->appends(request()->except('page'))->links() !!}
</div> --}}