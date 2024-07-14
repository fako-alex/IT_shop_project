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
              <h1>Liste des Marques</h1>
            </div>
            <div class="col-sm-6" style="text-align: right;">
                <a href="{{url('admin/brand/add')}}" class="btn btn-primary">Ajouter une nouvelle Marque</a>
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
                          <th>Nom de la catégories </th>
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
                        @foreach($getRecord as $value)
                        <tr>
                          <td>{{$value->id}}</td>
                          <td>{{$value->name}}</td>
                          <td>{{$value->slug}}</td>
                          <td>{{($value->status ==0) ? 'Actif' : 'Inactif'}}</td>
                          <td>{{$value->meta_title}}</td>
                          <td>{{$value->created_by_name}}</td>
                          <td>{{$value->meta_description}}</td>           
                          <td>{{$value->meta_keywords}}</td>
                          <td>{{date('d-m-y', strtotime($value->created_at))}}</td>
                          <td>{{date('H:i:s', strtotime($value->created_at))}}</td>
                          <td>
                            <a href="{{url('admin/brand/edit/'.$value->id)}}" class="btn btn-primary">Modifier</a>
                            <a href="{{url('admin/brand/delete/'.$value->id)}}" class="btn btn-danger">Supprimer</a>
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