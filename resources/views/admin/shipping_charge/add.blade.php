@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')
<div class="content-wrapper">


    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-12">
              <h1>Ajouter frais d'expédition</h1>
            </div>
          </div>
        </div>
      </section>
  

      <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                  @include('admin.layouts._message')
                </div>                
                <form action="" method="post">
                    {{@csrf_field() }}

                    <div class="card-body">

                        <div class="form-group">
                            <label>Nom du frais d'expédition <span style="color: red"> *</span></label>
                            <input type="text" class="form-control" required value="{{old('name')}}" name="name" placeholder="Nom du un frais d'expédition">
                        </div>

                        <div class="form-group">
                          <label>Price <span style="color: red"> *</span></label>
                          <input type="text" class="form-control" required value="{{old('price')}}" name="price" placeholder="Prix">
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