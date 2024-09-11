@extends('layouts.app')
@section('style')
    <link rel="stylesheet" href="{{ url('assets/css/plugins/nouislider/nouislider.css')}}"> 
@endsection
@section('content')
     
<main class="main">
    <div class="page-header text-center" style="background-image: url('{{ url('')}}/assets/images/page-header-bg.jpg')">
        <div class="container">
            @if(!empty($getSubCategory))
                <h1 class="page-title">{{ $getSubCategory->name }}</h1>
            @else
                <h1 class="page-title">{{ $getCategory->name }} </h1>
            @endif
        </div>
    </div>
    <nav aria-label="breadcrumb" class="breadcrumb-nav mb-2">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('')}}">Accueil</a></li>
                <li class="breadcrumb-item"><a href="javascript: ;">Boutique</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $getCategory->name }}</li>

                @if(!empty($getSubCategory))
                    <li class="breadcrumb-item" aria-current="page"><a href="{{ url($getCategory->slug)}}"> {{ $getCategory->name }} </a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $getSubCategory->name }} </li>
                @else
                    <li class="breadcrumb-item active" aria-current="page">{{ $getCategory->name }}</li>
                @endif
            </ol>
        </div>
    </nav>

    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="toolbox">
                        <div class="toolbox-left">
                            <div class="toolbox-info">
                                Showing <span>9 of 56</span> Products
                            </div>
                        </div>

                        <div class="toolbox-right">
                            <div class="toolbox-sort">
                                <label for="sortby">Sort by:</label>
                                <div class="select-custom">
                                    <select name="sortby" id="sortby" class="form-control">
                                        <option value="popularity" selected="selected">Most Popular</option>
                                        <option value="rating">Most Rated</option>
                                        <option value="date">Date</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

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
                                                    {{ number_format($value->price, 2)}} FCFA 
                                                </div>
                                                <div class="ratings-container">
                                                    <div class="ratings">
                                                        <div class="ratings-val" style="width: 20%;"></div><!-- End .ratings-val -->
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

                    <div class="justify-content-center">
                        {!! $getProduct->appends(request()->except('page'))->links() !!}
                    </div>
                </div>
                <aside class="col-lg-3 order-lg-first">
                    <div class="sidebar sidebar-shop">
                        <div class="widget widget-clean">
                            <label>Filtres:</label>
                            <a href="#" class="sidebar-filter-clear">Effacer tous</a>
                        </div>

                        <!-- Début affichage de la liste des sous catégories -->

                        <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-1" role="button" aria-expanded="true" aria-controls="widget-1">
                                    Categorie(s)
                                </a>
                            </h3>

                            <div class="collapse show" id="widget-1">
                                <div class="widget-body">
                                    <div class="filter-items filter-items-count">
                                       
                                        @foreach($getSubCategoryFilter as $filtre_category)
                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="cat-{{ $filtre_category->id}}">
                                                <label class="custom-control-label" for="cat-{{ $filtre_category->id}}">{{ $filtre_category->name}}</label>
                                            </div>
                                            <span class="item-count">{{ $filtre_category->TotalProduct()}} </span>
                                        </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Fin affichage de la liste des sous catégories -->

                        <!-- Début affichage de la taille des produits -->

                        {{-- <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-2" role="button" aria-expanded="true" aria-controls="widget-2">
                                    Taille(s)
                                </a>
                            </h3>

                            <div class="collapse show" id="widget-2">
                                <div class="widget-body">
                                    <div class="filter-items">
                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="size-1">
                                                <label class="custom-control-label" for="size-1">XS</label>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .filter-item -->

                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="size-2">
                                                <label class="custom-control-label" for="size-2">S</label>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .filter-item -->

                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" checked id="size-3">
                                                <label class="custom-control-label" for="size-3">M</label>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .filter-item -->

                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" checked id="size-4">
                                                <label class="custom-control-label" for="size-4">L</label>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .filter-item -->

                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="size-5">
                                                <label class="custom-control-label" for="size-5">XL</label>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .filter-item -->

                                        <div class="filter-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="size-6">
                                                <label class="custom-control-label" for="size-6">XXL</label>
                                            </div><!-- End .custom-checkbox -->
                                        </div><!-- End .filter-item -->
                                    </div><!-- End .filter-items -->
                                </div><!-- End .widget-body -->
                            </div><!-- End .collapse -->
                        </div> --}}

                        <!-- Fin affichage de la taille des produits -->
                         
                        <!-- Début affichage de la liste des couleurs -->

                        <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-3" role="button" aria-expanded="true" aria-controls="widget-3">
                                    Couleur(s)
                                </a>
                            </h3>

                            <div class="collapse show" id="widget-3">
                                <div class="widget-body">
                                    <div class="filter-colors">
                                        @foreach($getColor as $filter_color)
                                        <a href="javascript:;" style="background: {{ $filter_color->code}}"><span class="sr-only">{{$filter_color->name}}</span></a>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Fin affichage de la liste des couleurs -->
                        
                        <!-- Début affichage de la liste des marques -->

                        <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-4" role="button" aria-expanded="true" aria-controls="widget-4">
                                    Marque(s)
                                </a>
                            </h3>

                            <div class="collapse show" id="widget-4">
                                <div class="widget-body">
                                    <div class="filter-items">
                                        @foreach($getBrand as $filter_brand)
                                            <div class="filter-item">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="brand-{{ $filter_brand->id}}">
                                                    <label class="custom-control-label" for="brand-{{ $filter_brand->id}}">{{ $filter_brand->name}}</label>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Fin affichage de la liste des marques -->


                        <div class="widget widget-collapsible">
                            <h3 class="widget-title">
                                <a data-toggle="collapse" href="#widget-5" role="button" aria-expanded="true" aria-controls="widget-5">
                                    Prix du produit
                                </a>
                            </h3>

                            <div class="collapse show" id="widget-5">
                                <div class="widget-body">
                                    <div class="filter-price">
                                        <div class="filter-price-text">
                                            Prix compris entre :
                                            <span id="filter-price-range"></span>
                                        </div><!-- End .filter-price-text -->

                                        <div id="price-slider"></div><!-- End #price-slider -->
                                    </div><!-- End .filter-price -->
                                </div><!-- End .widget-body -->
                            </div><!-- End .collapse -->
                        </div><!-- End .widget -->
                    </div><!-- End .sidebar sidebar-shop -->
                </aside><!-- End .col-lg-3 -->
            </div><!-- End .row -->
        </div>
    </div>
</main>
    
@endsection 
@section('script')
    <script src="{{ url('assets/js/wNumb.js')}}"></script>
    <script src="{{ url('assets/js/bootstrap-input-spinner.js')}}"></script>
    <script src="{{ url('assets/js/nouislider.min.js')}}"></script> 
@endsection

