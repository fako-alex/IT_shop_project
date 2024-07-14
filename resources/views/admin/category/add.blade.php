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
              <h1>Ajouter une nouvelle catégorie</h1>
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
                            <label>Nom de la catégories <span style="color: red"> *</span></label>
                            <input type="text" class="form-control" required value="{{old('name')}}" name="name" placeholder="Nom de la catégorie">
                        </div>

                        <div class="form-group">
                            <label>Slug <span style="color: red"> *</span></label>
                            <input type="text" class="form-control"required value="{{old('slug')}}" name="slug" placeholder="Saisir le slug EXP:URL de la catégorie">
                            <div style="color:red">{{$errors->first('slug')}}</div>
                        </div>
                    
                        <div class="form-groupe">
                            <label >Status</label>
                            <select class="form-control" name="status">
                                <option {{ (old('status') == 0) ? 'selected' : ''}} value="0">Actif</option>
                                <option {{ (old('status') == 1) ? 'selected' : ''}} value="1">Inactif</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Meta titre <span style="color: red"> *</span></label>
                            <input type="text" class="form-control" required value="{{old('meta_title')}}" name="meta_title" placeholder="Saisir les metas titres">
                        </div>
                        <div class="form-group">
                            <label>Meta description</label>
                            <textarea class="form-control" name="meta_description" aria-placeholder=" Meta description" >
                                {{old('meta_description')}}
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label>Meta keywords</label>
                            <input type="text" class="form-control" value="{{old('meta_keywords')}}" name="meta_keywords" placeholder="Saisir les metas keywords">
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