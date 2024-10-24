@extends('admin.layouts.app')
@section('style')
<style type="text/css">
    .form-goup {
        margin-bottom: 2px;
    }
</style>
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-12">
              <h1>Détail de la commande.</h1>
            </div>
          </div>
        </div>
    </section>
  
      <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                  {{-- <h3 class="card-title">Quick Example</h3> --}}
                  @include('admin.layouts._message')
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>ID : <span style="font-weight: normal;">{{ $getRecord->id}}</span> </label>
                    </div>
                    <div class="form-group">
                        <label>ID de la Transaction : <span style="font-weight: normal;">{{ $getRecord->transaction_id}}</span></label>
                    </div>
                    <div class="form-group">
                        <label>Nom : <span style="font-weight: normal;">{{ $getRecord->first_name}} {{ $getRecord->last_name}}</span></label>
                    </div>
                    <div class="form-group">
                        <label>Nom de l'entreprise : <span style="font-weight: normal;">{{ $getRecord->company_name}}</span></label>
                    </div>
                    <div class="form-group">
                        <label>Pays : <span style="font-weight: normal;">{{ $getRecord->county}}</span></label>
                    </div>
                    <div class="form-group">
                        <label>Addresse : <span style="font-weight: normal;">{{ $getRecord->address_one}} {{ $getRecord->address_two}}</span></label>
                    </div>
                    <div class="form-group">
                        <label>Ville : <span style="font-weight: normal;">{{ $getRecord->city}}</span></label>
                    </div>
                    <div class="form-group">
                        <label>Province : <span style="font-weight: normal;">{{ $getRecord->state}}</span></label>
                    </div>
                    <div class="form-group">
                        <label>Code Postal : <span style="font-weight: normal;">{{ $getRecord->postcode}}</span></label>
                    </div>
                    <div class="form-group">
                        <label>N° de Téléphone : <span style="font-weight: normal;">{{ $getRecord->phone}}</span></label>
                    </div>
                    <div class="form-group">
                        <label>Adresse E-mail : <span style="font-weight: normal;">{{ $getRecord->email}}</span></label>
                    </div>
                    <div class="form-group">
                        <label>Code de Réduction : <span style="font-weight: normal;">{{ $getRecord->discount_code}}</span></label>
                    </div>
                    <div class="form-group">
                        <label>Montant de la Remise (FCFA) : <span style="font-weight: normal;">{{ number_format($getRecord->discount_amount, 2)}}</span></label>
                    </div>
                    <div class="form-group">
                        <label>Nom d'expédition : <span style="font-weight: normal;">{{ $getRecord->getShipping->name}}</span></label>
                    </div>
                    <div class="form-group">
                        <label>Montant Expédition (FCFA) : <span style="font-weight: normal;">{{ number_format($getRecord->shipping_amount, 2)}} </span></label>
                    </div>
                    <div class="form-group">
                        <label>Montant Total (FCFA) : <span style="font-weight: normal;">{{ number_format($getRecord->total_amount, 2)}}</span></label>
                    </div>
                    <div class="form-group">
                        <label>Methode Payement :<span style="font-weight: normal; text-transform:capitalize;"> {{ $getRecord->payment_method}}</span></label>
                    </div>
                    <div class="form-group">
                        <label>Status :</span></label>
                    </div>
                    <div class="form-group">
                        <label>Note :<span style="font-weight: normal;"> {{ $getRecord->notes}}</span></label>
                    </div>
                    <div class="form-group">
                        <label>Date Création :<span style="font-weight: normal;"> {{date('d-m-y h:i A', strtotime($getRecord->created_at))}}</span></label>
                    </div>
                </div>                  
            </div>
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        Détailles du produit
                    </h3>
                </div>
                <div class="card-body p-0" style="overflow: auto;">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Nom du produit</th>
                                <th>Quantité</th>
                                <th>Prix</th>
                                <th>Couleur</th>
                                <th>Nom de la Taille</th>
                                <th>Montant de la Taille</th>
                                <th>Montant Total</th>                          
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($getRecord->getItem as $item)
                                @php
                                    $getProductImage = $item->getProduct->getImageSingle($item->getProduct->id);
                                @endphp
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>
                                        <img style="width: 100px; height: 100px;" src="{{ $getProductImage->getLogo()}}">                                        
                                    </td>
                                    <td>
                                        @if ($item->getProduct)
                                            <a target="_blanc" href="{{ url($item->getProduct->slug)}}">{{ $item->getProduct->title }}</a>
                                        @else
                                            <span class="text-danger">Non trouvé</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->quantity)
                                            {{ $item->quantity }}
                                        @else
                                            <span class="text-danger">Non trouvé</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->price)
                                            {{ number_format($item->price, 2) }}
                                        @else
                                            <span class="text-danger">Non trouvé</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->color_name)
                                            {{ $item->color_name }}
                                        @else
                                            <span class="text-danger">Non trouvé</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->size_name)
                                            {{ $item->size_name }}
                                        @else
                                            <span class="text-danger">Non trouvé</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->size_amount)
                                            {{ number_format($item->size_amount, 2) }}
                                        @else
                                            <span class="text-danger">Non trouvé</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if ($item->total_price)
                                            {{ number_format($item->total_price, 2) }}
                                        @else
                                            <span class="text-danger">Non trouvé</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- <div style="padding: 10px; float:right;">
                        {{ $getRecord->appends(request()->except('page'))->links() }}
                    </div> --}}
                </div>                 
            </div>
        </div>
    </section>
</div>

@endsection
@section('script')
@endsection