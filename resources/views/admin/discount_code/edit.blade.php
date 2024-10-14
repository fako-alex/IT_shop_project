@extends('admin.layouts.app')
@section('style')
@endsection
@section('content')

<div class="content-wrapper">


    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-12">
              <h1>Modifier un Code de réduction</h1>
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
                            <label>Nom du Code de réduction <span style="color: red"> *</span></label>
                            <input type="text" class="form-control" required value="{{old('name', $getRecord->name)}}" name="name" placeholder="Nom de la couleur">
                        </div>
                        
                        <div class="form-groupe">
                          <label >Type :</label>
                          <select class="form-control" name="type">
                              <option {{ (old('type', $getRecord->type) == "Amount") ? 'selected' : ''}} value="Amount">Amount</option>
                              <option {{ (old('type', $getRecord->type) == "Percent") ? 'selected' : ''}} value="Percent">Percent</option>
                          </select>
                      </div>

                      <div class="form-group">
                        <label>Percent / Amount <span style="color: red"> *</span></label>
                        <input type="text" class="form-control" required value="{{old('percent_amount', $getRecord->percent_amount)}}" name="percent_amount" placeholder="Percent / Amount">
                      </div>

                      <div class="form-group">
                        <label>Expire Date <span style="color: red"> *</span></label>
                        <input type="date" class="form-control" required value="{{old('expire_date', $getRecord->expire_date)}}" name="expire_date">
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