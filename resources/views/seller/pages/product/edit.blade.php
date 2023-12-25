@extends('seller.layouts.main')
@section('content')
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">

                <div class="card-header d-flex justify-content-between align-items-center">

                    <h5 class="mb-0">EDITE PRODUCT</h5>
                    <small class="text-muted float-end">Default label</small>
                </div>
                <div class="card-body">
                    <form action="{{ route('product.update',$product->id) }}" method="POST" enctype="multipart/form-data">
                      @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label" for="basic-default-fullname">Seller Name</label>
                                <input type="text" class="form-control" disabled name="seller_name"
                                    id="basic-default-fullname" value="{{ $Profile_info->name }}" placeholder="" />
                            </div>
                            <div class="col mb-3">
                                <label class="form-label" for="basic-default-fullname">Seller id</label>
                                <input type="text" class="form-control" disabled name="seller_id"
                                    id="basic-default-fullname" placeholder="" value="{{ $Profile_info->id }}" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Product Name</label>
                            <input type="text" class="form-control" value="{{$product->product_name}}" name="product_name" id="basic-default-fullname"
                                placeholder="" />
                        </div>
                        <div class="row">
                            <div class="col mb-3">
                                <label class="form-label" for="basic-default-company">Price</label>
                                <input type="text" class="form-control" value="{{$product->price}}" name="price" id="basic-default-company"
                                    placeholder="ACME Inc." />
                            </div>
                            <div class="col mb-3">
                                <label class="form-label" for="basic-default-company">Old Price</label>
                                <input type="text" class="form-control" value="{{$product->old_price}}" name="old_price" id="basic-default-company"
                                    placeholder="ACME Inc." />
                            </div>
                        </div>
                        <div class="row">
                          <div class="col mb-3">
                              <label class="form-label" for="basic-default-company">Ratting</label>
                              <input type="number" class="form-control" value="{{$product->rating}}" name="ratting" min="0" max="5" id="basic-default-company"
                                  placeholder="ACME Inc." />
                          </div>
                          <div class="col mb-3">
                              <label class="form-label" for="basic-default-email">Category</label>
                              <div class="input-group input-group-merge">
                                  <select name="category_id"  class="form-control" id="categorySelect">
                                    <option value="">--select--</option>
                                    @foreach ($categories as $category)
                                     
                                          <option value="{{ $category->id }}">{{ $category->name }}</option>
                                      @endforeach
                                  </select>
                              </div>
                          </div>
                          <div class="col mb-3">
                              <label class="form-label" for="basic-default-email">SubCategory</label>
                              <div class="input-group input-group-merge">
                                  <select name="subcategory_id"  class="form-control" id="subcategorySelect" disabled>
                                      <!-- Options de sous-catégorie seront ajoutées dynamiquement ici -->
                                      
                                  </select>
                              </div>
                          </div>
                      </div>

                      <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

                      <script>
                        // Écoutez les changements dans la sélection de la catégorie
                        $('#categorySelect').change(function () {
                            // Obtenez la valeur de la catégorie sélectionnée
                            var categoryId = $(this).val();
                    
                            // Désactivez la sous-catégorie pendant la mise à jour des options
                            $('#subcategorySelect').prop('disabled', true);
                    
                            // Effacez les options actuelles de la sous-catégorie
                            $('#subcategorySelect').html('');
                    
                            // Si une catégorie est sélectionnée, chargez les sous-catégories associées
                            if (categoryId) {
                                // Remplacez l'URL suivant votre structure de route Laravel
                                var url = '/api/subcategories/' + categoryId;
                    
                                // Chargez les sous-catégories via AJAX
                                $.get(url, function (data) {
                                    // Activez la sous-catégorie une fois les options chargées
                                    $('#subcategorySelect').prop('disabled', false);
                    
                                    // Ajoutez chaque sous-catégorie en tant qu'option
                                    $.each(data, function (key, value) {
                                        $('#subcategorySelect').append('<option value="' + value.id + '">' + value.name + '</option>');
                                    });
                                });
                            }
                        });
                    </script>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-phone">Image</label>
                            <input type="file" name="image" value="{{$product->image}}" id="basic-default-phone" class="form-control phone-mask"
                                onchange="displayImage(this)" />
                            <img id="selectedImage" class="mt-2"
                                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSYZ5RLzBYeFV4hN1_t1N53PN7UIk4Xpn71QA&usqp=CAU"
                                width="70" height="70" alt="">
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="basic-default-message">Quantity</label>
                            <input type="number" name="quantity" value="{{$product->quantity}}"  class="form-control phone-mask" />

                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-message">Status</label>
                            <select name="status" class="form-control" value="{{$product->status}}"  id="">
                                <option value="available">Available</option>
                                <option value="unavailable">Unavailable</option>
                            </select>

                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="basic-default-message">Discription</label>
                            <textarea id="basic-default-message"  name="description" class="form-control" placeholder="Product Description">{{$product->description}}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection

<script>
    function displayImage(input) {
        var imgElement = document.getElementById('selectedImage');
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                imgElement.src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        } else {
            imgElement.src = "";
        }
    }
</script>
