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
                                    <select name="sortby" id="sortby" class="form-control ChangeSortBy">
                                        <option value="">Select</option>
                                        <option value="popularity">Most Popular</option>
                                        <option value="rating">Most Rated</option>
                                        <option value="date">Date</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="getProductAjax">
                        @include('product._list');
                    </div>
                
                </div>
                <aside class="col-lg-3 order-lg-first">
                    <form id="FilterForm" method="post" action="">
                        {{ csrf_field() }}
                        <input type="hidden" name="old_sub_category_id" value="{{ !empty($getSubCategory) ? $getSubCategory->id : ''}}" >
                        <input type="hidden" name="old_category_id" value="{{ !empty($getCategory) ? $getCategory->id : ''}}">

                        <input type="hidden" name="sub_category_id" id="get_sub_category_id" readonly>
                        <input type="hidden" name="brand_id" id="get_brand_id" readonly>
                        <input type="hidden" name="color_id" id="get_color_id" readonly>
                        <input type="hidden" name="sort_by_id" id="get_sort_by_id" readonly>
                        <input type="hidden" name="start_price" id="get_start_price" readonly>
                        <input type="hidden" name="end_price" id="get_end_price" readonly>

                    </form>
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
                                                <input type="checkbox" class="custom-control-input ChangeCategory" value="{{ $filtre_category->id}}" id="cat-{{ $filtre_category->id}}">
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
                                        <a href="javascript:;" id="{{ $filter_color->id}}" class="ChangeColor" data-val="0" style="background: {{ $filter_color->code}}"><span class="sr-only">{{$filter_color->name}}</span></a>
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
                                                    <input type="checkbox" class="custom-control-input ChangeBrand" value="{{ $filter_brand->id}}"  id="brand-{{ $filter_brand->id}}">
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
                                            Prix compris entre : <br>
                                            <span id="filter-price-range"> </span>
                                        </div>
                                        <div id="price-slider"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</main>
    
@endsection 
@section('script')
    <script src="{{ url('assets/js/wNumb.js')}}"></script>
    <script src="{{ url('assets/js/bootstrap-input-spinner.js')}}"></script>
    <script src="{{ url('assets/js/nouislider.min.js')}}"></script> 
    {{-- <script type="text/javascript">

        $(document).ready(function() {

            $('.ChangeSortBy').change(function() {
                var id = $(this).val();
                $('#get_sort_by_id').val(id);  
                FiterForm();
            });

            $('.ChangeCategory').change(function() {
                var ids = '';
                $('.ChangeCategory').each(function() {
                    if (this.checked) {
                        var id = $(this).val();
                        ids += id + ',';
                    }
                });
                $('#get_sub_category_id').val(ids);
                FiterForm();
            });

            $('.ChangeBrand').change(function() {
                var ids = '';
                $('.ChangeBrand').each(function() {
                    if (this.checked) {
                        var id = $(this).val();
                        ids += id + ',';
                    }
                });
                $('#get_brand_id').val(ids);
                FiterForm();
            });

            $('.ChangeColor').click(function() {
                var $this = $(this);
                var status = $this.attr('data-val');
                if (status == 0) {
                    $this.attr('data-val', 1);
                    $this.addClass('active-color');
                } else {
                    $this.attr('data-val', 0);
                    $this.removeClass('active-color');
                }

                var ids = '';
                $('.ChangeColor').each(function() {
                    var $el = $(this);
                    var status = $el.attr('data-val');
                    if (status == 1) {
                        var id = $el.attr('id');
                        ids += id + ',';
                    }
                });
                $('#get_color_id').val(ids);
                FiterForm();
            });

            var xhr =;
            function FiterForm() {
                if(xhr && xhr.readyState != 4){
                    xhr.abort();
                }

               xhr = $.ajax({
                    type: 'POST',
                    url: "{{ url('get_filter_product_ajax') }}",
                    data: $('#FilterForm').serialize(),  // Remplacé le point-virgule par une virgule
                    dataType: "json",
                    success: function(data) {
                        $('#getProductAjax').html(data.success);
                    },

                    error: function(xhr, status, error) {
                        // Gérer les erreurs ici
                        console.error('Erreur AJAX :', status, error);
                    }
                });
            }

            var i = 0;

            if (typeof noUiSlider === 'object') {
            var priceSlider = document.getElementById('price-slider');

            noUiSlider.create(priceSlider, {
                start: [0, 1000000000],
                connect: true,
                step: 1000,
                margin: 2000,
                range: {
                    'min': 0,
                    'max': 1000000000
                },
                tooltips: true,
                format: wNumb({
                    decimals: 0,
                    prefix: 'FCFA'
                })
            });

            priceSlider.noUiSlider.on('update', function(values, handle) {
                var start_price = values[0];
                var end_price = values[1];
                $('#get_start_price').val(start_price);
                $('#get_end_price').val(end_price);
                $('#filter-price-range').text(values.join(' - '));
                
                if(i == 0 || i == 1){
                    i++;
                    
                }ele{

                    FiterForm();
                }

            });
        }

        });   
    </script> --}}
    <script type="text/javascript">
        $(document).ready(function() {
            // Fonction pour filtrer les produits
            function FiterForm() {
                if(xhr && xhr.readyState != 4){
                    xhr.abort();
                }
    
                xhr = $.ajax({
                    type: 'POST',
                    url: "{{ url('get_filter_product_ajax') }}",
                    data: $('#FilterForm').serialize(),  // Remplacé le point-virgule par une virgule
                    dataType: "json",
                    success: function(data) {
                        $('#getProductAjax').html(data.success);
                    },
                    error: function(xhr, status, error) {
                        // Gérer les erreurs ici
                        console.error('Erreur AJAX :', status, error);
                    }
                });
            }
    
            // Gestion du changement de tri
            $('.ChangeSortBy').change(function() {
                var id = $(this).val();
                $('#get_sort_by_id').val(id);  
                FiterForm();
            });
    
            // Gestion du changement de catégorie
            $('.ChangeCategory').change(function() {
                var ids = '';
                $('.ChangeCategory').each(function() {
                    if (this.checked) {
                        var id = $(this).val();
                        ids += id + ',';
                    }
                });
                $('#get_sub_category_id').val(ids);
                FiterForm();
            });
    
            // Gestion du changement de marque
            $('.ChangeBrand').change(function() {
                var ids = '';
                $('.ChangeBrand').each(function() {
                    if (this.checked) {
                        var id = $(this).val();
                        ids += id + ',';
                    }
                });
                $('#get_brand_id').val(ids);
                FiterForm();
            });
    
            // Gestion du changement de couleur
            $('.ChangeColor').click(function() {
                var $this = $(this);
                var status = $this.attr('data-val');
                if (status == 0) {
                    $this.attr('data-val', 1);
                    $this.addClass('active-color');
                } else {
                    $this.attr('data-val', 0);
                    $this.removeClass('active-color');
                }
    
                var ids = '';
                $('.ChangeColor').each(function() {
                    var $el = $(this);
                    var status = $el.attr('data-val');
                    if (status == 1) {
                        var id = $el.attr('id');
                        ids += id + ',';
                    }
                });
                $('#get_color_id').val(ids);
                FiterForm();
            });
    
            var xhr;
            // Initialisation du slider de prix
            if (typeof noUiSlider === 'object') {
                var priceSlider = document.getElementById('price-slider');
    
                noUiSlider.create(priceSlider, {
                    start: [0, 1000000000],
                    connect: true,
                    step: 1000,
                    margin: 2000,
                    range: {
                        'min': 0,
                        'max': 1000000000
                    },
                    tooltips: true,
                    format: wNumb({
                        decimals: 0,
                        prefix: 'FCFA'
                    })
                });
    
                var i = 0;  // Initialisation de l'indice pour contrôler le déclenchement de la fonction
                priceSlider.noUiSlider.on('update', function(values, handle) {
                    var start_price = values[0];
                    var end_price = values[1];
                    $('#get_start_price').val(start_price);
                    $('#get_end_price').val(end_price);
                    $('#filter-price-range').text(values.join(' - '));
    
                    if (i == 0 || i == 1) {
                        i++;
                    } else {
                        FiterForm();
                    }
                });
            }
        });
    </script>
    
@endsection

