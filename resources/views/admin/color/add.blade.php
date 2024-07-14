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
              <h1>Ajouter une nouvelle couleur</h1>
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
                            <label>Nom de la nouvelle couleur <span style="color: red"> *</span></label>
                            <input type="text" class="form-control" required value="{{old('name')}}" name="name" placeholder="Nom de la couleur">
                        </div>

                        <div class="form-group">
                            <label>Code de la couleur <span style="code: red"> *</span></label>
                            <input type="color" class="form-control"required value="{{old('code')}}" name="code" placeholder="Saisir le code de la couleur EXP:#FFFAG">
                            <div style="color:red">{{$errors->first('code de la couleur')}}</div>
                        </div>



                    
                        <div class="form-groupe">
                            <label >Status</label>
                            <select class="form-control" name="status">
                                <option {{ (old('status') == 0) ? 'selected' : ''}} value="0">Actif</option>
                                <option {{ (old('status') == 1) ? 'selected' : ''}} value="1">Inactif</option>
                            </select>
                        </div>

                    </div>
                    
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
        </div>
          </div>
        </section>
</div>
@endsection
@section('script')
@endsection