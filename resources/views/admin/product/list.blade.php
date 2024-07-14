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
              <h1>Liste des Produits</h1>
            </div>
            <div class="col-sm-6" style="text-align: right;">
                <a href="{{url('admin/product/add')}}" class="btn btn-primary">Ajouter un produit</a>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
  
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">  
                <div class="card">
                  <div class="card-body p-0">
                    <table class="table table-sm">
                      <thead>
                        <tr>
                          <th>#</th>
                          <th>Nom sous catégorie </th>
                          <th>Nom de la catégorie </th>
                          <th>Nom du Slug</th>
                          <th>Status catégoies</th>
                          <th>Meta titre</th>
                          <th>Créer par </th>
                          <th>Meta description</th>
                          <th>Meta keywords</th>
                          <th>Date de création</th>
                          <th>Heure de création</th>
                          <th>Actions</th>
                        
                        </tr>
                      </thead>
                      <tbody>
                        
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