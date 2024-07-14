@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">


    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-12">
              <h1>Modifier l'utilisateur</h1>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
  
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                  {{-- <h3 class="card-title">Quick Example</h3> --}}
                  @include('admin.layouts._message')
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                
                <form action="" method="post">
                    {{@csrf_field() }}

                  <div class="card-body">
                    <div class="form-group">
                      <label>Nom et Prénom</label>
                      <input type="text" class="form-control" name="name" value="{{old('name', $getRecord->name)}}">
                    </div>
                    <div class="form-group">
                      <label>Adresse Email</label>
                      <input type="email" class="form-control" name="email" value="{{old('email', $getRecord->email)}}">
                      <div style="color:red">{{$errors->first('email')}}</div>
                    </div>
                    <div class="form-group">
                      <label >Mot de passe</label>
                      <input type="password" class="form-control" name="password">
                      <p> Changer le mot de passe maintenant.</p>
                    </div>
                    <div class="form-groupe">
                      <label >Status</label>
                      <select class="form-control" name="status" value="{{$getRecord->status }}">
                        <option {{($getRecord->status == 0) ? 'selected' : '' }} value="0" >Actif</option>
                        <option {{($getRecord->status == 1) ? 'selected' : '' }} value="1">Inactif</option>
                      </select>
                    </div>
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Modifier</button>
                  </div>
                </form>
              </div>
        </div>
            <!-- /.col -->
          </div>
      </section>


</div>
@endsection
@section('script')
@endsection