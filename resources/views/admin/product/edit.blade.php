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
                        

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Nom du produit <span style="color: red"> *</span></label>
                              <input type="text" required class="form-control" required name="title"
                                      {{-- value="{{ old('title', $product->title ?? 'je ne vois rien') }}" --}}
                                      value="{{ old('title', $product->title) }}"
                                      placeholder="Saisir le nom du produit EXP:Ordinateur">
                              <div style="color:red">{{ $errors->first('title') }}</div>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>SKU<span style="color: red"> *</span></label>
                              <input type="text" class="form-control" required name="sku"
                                      {{-- value="{{ old('title', $product->title ?? 'je ne vois rien') }}" --}}
                                      value="{{ old('sku', $product->sku) }}"
                                      placeholder="SKU">
                              <div style="color:red">{{ $errors->first('sku') }}</div>
                            </div>
                          </div> 

                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="category">Catégorie<span style="color: red"> *</span></label>
                              <select class="form-control" required  name="category_id">
                                <option value="">Sélectionner</option>
                                  @foreach($getCategory as $category)
                                    <option {{($product->category_id == $category->id) ? 'selected' : ''}} value="{{ $category->id }}">{{ $category->name }}</option>
                                  @endforeach   
                              </select>
                            </div>
                          </div>
                          {{--  encore EN COURS DE  travailler --}}
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="subcategory">Sous Catégorie<span style="color: red"> *</span></label>
                              <select class="form-control" required  name="sub_category_id">
                                <option value="">Sélectionner</option>
                                @foreach($getSubCategory as $SubCategory)
                                <option value="{{ $SubCategory->id }}">{{ $SubCategory->name }}</option>
                                @endforeach 
                              </select>
                            </div>
                          </div>
                          {{-- Pas encore travailler --}}

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Marque du produit<span style="color: red"> *</span></label>
                              <select class="form-control" name="brand_id">
                                <option value="">Selectionner</option>
                                  @foreach($getBrand as $brand)
                                  <option {{($product->brand_id == $brand->id) ? 'selected' : ''}} value="{{ $brand->id }}">{{ $brand->name }}</option>
                                  @endforeach   
                              </select>
                            </div>
                          </div>

                        </div>

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Couleur du produit<span style="color: red"> *</span></label>
                                @foreach($getColor as $color)
                                  @php
                                    $checked = '';
                                  @endphp
                                  @foreach($product->getColor as $pcolor)
                                    @if($pcolor->color_id == $color->id)
                                      @php
                                        $checked = 'checked';
                                      @endphp
                                    @endif
                                  @endforeach 
                                  <div class="form-group" >
                                    <label style="align-items: flex-start">
                                      <input {{$checked}} type="checkbox"  name="color_id[]" value="{{$color->id}}">{{$color->name}}
                                    </label>
                                  </div>
                                @endforeach   
                            </div>
                          </div>
                        </div>

                        <hr>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Prix du produit (FCFA) <span style="color: red"> *</span></label>
                              <input type="text" class="form-control" required name="price" placeholder="Prix du produit" value="{{!empty ($product->price) ? $product->price : ''}}">
                              <div style="color:red">{{ $errors->first('price') }}</div>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Ancien Prix du produit (FCFA)<span style="color: red"> *</span></label>
                              <input type="text" class="form-control" required name="old_price" placeholder="Ancien Prix du produit" value="{{!empty ($product->old_price) ? $product->old_price : ''}}">
                              <div style="color:red">{{ $errors->first('old_price') }}</div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label>Taille du Produit<span style="color: red"> *</span></label>
                                  <table class="table table-striped">
                                      <thead>
                                          <tr>
                                              <th>Name</th>
                                              <th>Prix (FCFA)</th>
                                              <th>Action</th>
                                          </tr>
                                      </thead>
                                      <tbody id="AppendSize">
                                          @php
                                          $i_s = 1;
                                          @endphp
                                          @foreach($product->getSize as $size)
                                          <tr id="DeleteSize{{$i_s}}">
                                              <td>
                                                  <input type="text" value="{{$size->name}}" name="size[{{$i_s}}][name]" class="form-control">
                                              </td>
                                              <td>
                                                  <input type="text" value="{{$size->price}}" name="size[{{$i_s}}][price]" class="form-control">
                                              </td>
                                              <td>
                                                  <button type="button" id="{{$i_s}}" class="btn btn-danger DeleteSize">Supprimer</button>
                                              </td>
                                          </tr>
                                          @php
                                          $i_s++;
                                          @endphp
                                          @endforeach
                                      </tbody>
                                      <tfoot>
                                          <tr>
                                              <td>
                                                  <input type="text" name="size[{{$i_s}}][name]" class="form-control">
                                              </td>
                                              <td>
                                                  <input type="text" name="size[{{$i_s}}][price]" class="form-control">
                                              </td>
                                              <td>
                                                  <button type="button" class="btn btn-primary AddSize">Ajouter</button>
                                              </td>
                                          </tr>
                                      </tfoot>
                                  </table>
                              </div>
                          </div>
                      </div>
                      
                      
                      

                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                  <label>Description<span style="color: red"> *</span></label>
                                  <textarea id="compose-textarea1" name="description" placeholder="Saisir la description du produit"  class="form-control" cols="30" rows="10">
                                    {{$product->description}}
                                  </textarea>
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                  <label>Brève description<span style="color: red"> *</span></label>
                                  <textarea id="compose-textarea4" name="short_description" placeholder="Saisir une brève description du produit"  class="form-control" cols="30" rows="10">
                                    {{$product->short_description}}
                                  </textarea>
                              </div>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-12">
                              <div class="form-group">
                                  <label>informations suplémentaire<span style="color: red"> *</span></label>
                                  <textarea id="compose-textarea2" name="additional_information" placeholder="Saisir les informations supplémentaires"  class="form-control" cols="30" rows="10">
                                    {{$product->additional_information}}
                                  </textarea>
                              </div>
                            </div>
                          </div>

                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Expédition & retours<span style="color: red"> *</span></label>
                              <textarea id="compose-textarea" name="shipping_returns" placeholder="Saisir les informations supplémentaires pour l'expédition du produit" class="form-control" cols="30" rows="10">
                                {{$product->shipping_returns}}
                              </textarea>
                            </div>
                          </div>
                        
                      <hr />    
                      
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-groupe">
                              <label >Status <span style="color: red">*</span></label>
                              <select class="form-control" name="status">
                                  <option {{ ($product->status == 0) ? 'selected' : ''}} value="0">Actif</option>
                                  <option {{ ($product->status == 1) ? 'selected' : ''}} value="1">Inactif</option>
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                     
                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Modifier </button>
                    </div>
                  </form>
                </div>
          </div>
            </div>
          </section> 

  </div>

@endsection
@section('script')
{{-- Inclure jQuery si nécessaire --}}
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
{{-- <script type="text/javascript">
  $(document).ready(function() {
    $('body').on('change', '#ChangeCategory', function(e) {
      alerte
    
      var id = $(this).val();
      $.ajax({
        type: "POST",
        url: "{{ url('admin/get_sub_category') }}",
        dataType: "json",
        data: {
          id: id,
          _token: "{{ csrf_token() }}"
        },
        success: function(data) {
          $('#getSubCategory').html(data.html);
        },
        error: function(xhr, status, error) {
          console.error('Error:', error);
        }
      });
    });
  });
</script> --}}

<script src="https://cdn.jsdelivr.net/npm/@tinymce/tinymce-jquery@1/dist/tinymce-jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    var i = {{$i_s}}; // Initialiser avec la valeur actuelle du compteur

    // Fonction pour supprimer une ligne
    $('body').on('click', '.DeleteSize', function() {
        var id = $(this).attr('id');
        $('#DeleteSize' + id).remove();
    });

    // Fonction pour ajouter une nouvelle ligne
    $('body').on('click', '.AddSize', function() {
        i++; // Incrémenter le compteur

        // Copier les valeurs saisies dans une nouvelle ligne
        var nameValue = $(this).closest('tr').find('input[name$="[name]"]').val();
        var priceValue = $(this).closest('tr').find('input[name$="[price]"]').val();

        if (nameValue !== '' && priceValue !== '') {
            var html = `
                <tr id="DeleteSize${i}">
                    <td>
                        <input type="text" value="${nameValue}" name="size[${i}][name]" class="form-control">
                    </td>
                    <td>
                        <input type="text" value="${priceValue}" name="size[${i}][price]" class="form-control">
                    </td>
                    <td>
                        <button type="button" id="${i}" class="btn btn-danger DeleteSize">Supprimer</button>
                    </td>
                </tr>`;

            // Ajouter la nouvelle ligne au tableau
            $('#AppendSize').append(html);

            // Vider les champs de saisie pour la nouvelle entrée
            $(this).closest('tr').find('input').val('');
        }
    });
  });
    
  $(function () {
    //Add text editor
    $('#compose-textarea').summernote()
  })
  $(function () {
    //Add text editor 1
    $('#compose-textarea1').summernote()
  })
  $(function () {
    //Add text editor 2
    $('#compose-textarea2').summernote()
  })
  $(function () {
    //Add text editor 4
    $('#compose-textarea4').summernote()
  })

</script>