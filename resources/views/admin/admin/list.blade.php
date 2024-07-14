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
              <h1>Liste des utilisateurs</h1>
            </div>
            <div class="col-sm-6" style="text-align: right;">
                <a href="{{url('admin/admin/add')}}" class="btn btn-primary">Ajouter un utilisateur</a>
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
                          <th>Nom </th>
                          <th>Adresse Email</th>
                          <th>Status</th>
                          <th>Actions</th>
                        
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($getRecord as $value)
                        <tr>
                          <td>{{$value->id}}</td>
                          <td>{{$value->name}}</td>
                          <td>{{$value->email}}</td>
                          <td>{{($value->status ==0) ? 'Actif' : 'Inactif'}}</td>
                          <td>
                            <a href="{{url('admin/admin/edit/'.$value->id)}}" class="btn btn-primary">Modifier</a>
                            <a href="{{url('admin/admin/delete/'.$value->id)}}" class="btn btn-danger">Supprimer</a>
                          </td>
                          
                        </tr>
                        
                        @endforeach
                      </tbody>
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