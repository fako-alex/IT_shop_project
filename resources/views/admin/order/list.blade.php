@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

    @include('admin.layouts._message')
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Liste des Commandes</h1>
            </div>
          </div>
        </div>
      </section>
  
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">  
                <div class="card">
                  <div class="card-body p-0" style="overflow: auto;">
                    <table class="table table-sm">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Nom </th>
                          <th>Nom Entreprise</th>
                          <th>Pays</th>
                          <th>Addresse</th>
                          <th>Ville</th>
                          <th>Province </th>
                          <th>Code Postal</th>
                          <th>Téléphone</th>
                          <th>Adresse E-mail</th>
                          <th>Code Réduction</th>
                          <th>Montant Remise (FCFA)</th>
                          <th>Montant Expédition (FCFA)</th>
                          <th>Montant Total (FCFA) </th>
                          <th>Methode Payement</th>
                          <th>Status</th>
                          {{-- <th>Note Commande</th> --}}
                          <th>Date Création</th>
                          <th>Actions</th>
                        
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($getRecord as $value)
                        <tr>
                          {{-- <td>{{$value->id}}</td> --}}
                          <td>{{ $loop->index + 1 }}</td>
                          <td>{{$value->first_name}} {{$value->last_name}}</td>
                          <td>{{$value->company_name}}</td>
                          <td>{{$value->county}}</td>
                          <td>{{$value->address_one}} </br> {{$value->address_two}}</td>           
                          <td>{{$value->city}}</td>
                          <td>{{$value->state}}</td>
                          <td>{{$value->postcode}}</td>
                          <td>{{$value->phone}}</td>
                          <td>{{$value->email}}</td>
                          <td>{{$value->discount_code}}</td>
                          <td>{{number_format($value->discount_amount, 2)}}</td>
                          <td>{{number_format($value->shipping_amount, 2)}}</td>
                          <td>{{number_format($value->total_amount, 2)}}</td>
                          <td style="text-transform: capitalize;">{{$value->payment_method}}</td>
                          <td>{{($value->status == 0) ? 'Actif' : 'Inactif'}}</td>
                          <td>{{date('d-m-y h:i A', strtotime($value->created_at))}}</td>
                          <td>
                            <a href="{{url('admin/orders/detail/'.$value->id)}}" class="btn btn-primary">Détaail</a>
                          </td>                          
                        </tr>
                        
                        @endforeach
                      </tbody>
                    </table>
                    {{-- <div style="padding: 10px; float:right;">
                      {{ $getRecord->appends(request()->except('page'))->links() }}
                  </div> --}}
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
            <!-- /.col -->
          </div>
      </section>


</div>
@endsection
@section('script')
<script src="{{ url('public/assets//dist/js/pages/dashboard.js')}} "></script>
@endsection