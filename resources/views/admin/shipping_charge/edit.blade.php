@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')

<div class="content-wrapper">


    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-12">
              <h1>Modifier frais d'expédition</h1>
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
                            <label>Nom des frais d'expédition <span style="color: red"> *</span></label>
                            <input type="text" class="form-control" required value="{{old('name', $getRecord->name)}}" name="name" placeholder="Nom de la couleur">
                        </div>

                      <div class="form-group">
                        <label>Prix<span style="color: red"> *</span></label>
                        <input type="text" class="form-control" required value="{{old('price', $getRecord->price)}}" name="price" placeholder="Prix">
                      </div>

                      <div class="form-groupe">
                          <label >Status</label>
                          <select class="form-control" name="status">
                              <option {{ (old('status', $getRecord->status) == 0) ? 'selected' : ''}} value="0">Actif</option>
                              <option {{ (old('status', $getRecord->status) == 1) ? 'selected' : ''}} value="1">Inactif</option>
                          </select>
                      </div>

                    </div>
                    
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Modifier</button>
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