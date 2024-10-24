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
                    <h1>Liste des Frais d'expédition</h1>
                </div>
                <div class="col-sm-6" style="text-align: right;">
                    <a href="{{ url('admin/shipping_charge/add') }}" class="btn btn-primary">Ajouter Frais d'expédition</a>
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
                                        <th>Nom du Frais d'expédition</th>
                                        <th>Prix</th>
                                        <th>Status</th>
                                        <th>Date de création</th>
                                        <th>Heure de création</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($getRecord as $value)
                                    <tr>
                                        {{-- <td>{{ $value->id }}</td> --}}
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $value->name }}</td>
                                        <td>{{ $value->price }}</td>
                                        <td>{{ ($value->status == 0) ? 'Active' : 'Inactive' }}</td>
                                        <td>{{ date('d-m-Y', strtotime($value->created_at)) }}</td>
                                        <td>{{ date('H:i:s', strtotime($value->created_at)) }}</td>
                                        <td>
                                            <a href="{{ url('admin/shipping_charge/edit/'.$value->id) }}" class="btn btn-primary">Modifier</a>
                                            <a href="{{ url('admin/shipping_charge/delete/'.$value->id) }}" class="btn btn-danger">Supprimer</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
<script src="{{ url('public/assets/dist/js/pages/dashboard.js') }}"></script>
@endsection
