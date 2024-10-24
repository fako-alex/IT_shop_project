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
                          <th>Nom produit</th>
                          <th>Nom Slug</th>
                          <th>Créer par </th>
                          <th>Status catégoies</th>
                          <th>Date de création</th>
                          <th>Heure de création</th>
                          <th>Actions</th>
                        
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($getRecord as $key => $value)
                          <tr>
                              <td>{{ $getRecord->firstItem() + $key }}</td>
                              <td>{{ $value->title }}</td>
                              <td>{{ $value->slug }}</td>
                              <td>{{ $value->created_by_name }}</td>
                              <td>{{ ($value->status == 0) ? 'Actif' : 'Inactif' }}</td>
                              <td>{{ date('d-m-y', strtotime($value->created_at)) }}</td>
                              <td>{{ date('H:i:s', strtotime($value->created_at)) }}</td>
                              <td>
                                  <a href="{{ url('admin/product/edit/'.$value->id) }}" class="btn btn-primary">Modifier</a>
                                  <a href="{{ url('admin/product/delete/'.$value->id) }}" class="btn btn-danger">Supprimer</a>
                              </td>
                          </tr>
                        @endforeach
                    
                    
                      </tbody>
                    </table>

                    <div style="padding: 10px; float:right;">
                      {!! $getRecord->appends(request()->except('page'))->links() !!}
                    </div>
                      {{-- <div style="padding: 10px; float:right;">
                        {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page')->links()) !!}
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