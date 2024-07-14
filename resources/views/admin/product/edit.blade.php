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
              <h1>Modifier un nouveau produit</h1>
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
                            <label>Nom du produit <span style="color: red"> *</span></label>
                            <input type="text" class="form-control" required name="title"
                                   {{-- value="{{ old('title', $product->title ?? 'je ne vois rien') }}" --}}
                                   value="{{ old('title', $product->title) }}"
                                   placeholder="Saisir le nom du produit EXP:Ordinateur">
                            <div style="color:red">{{ $errors->first('title') }}</div>
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