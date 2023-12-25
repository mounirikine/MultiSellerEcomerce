@extends('admin.layouts.main')
@section('content')
    <div class="row">
        <div class="">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">EDIT ABOUT PAGE</h5>
                    <small class="text-muted float-end">Default label</small>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('store.about', $About_content->id)}}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Image</label>
                            <input type="file" class="form-control" name="image" id="basic-default-fullname"
                                placeholder=""  onchange="displayImage(this)" />
                                <img id="selectedImage" class="mt-2"
                                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSYZ5RLzBYeFV4hN1_t1N53PN7UIk4Xpn71QA&usqp=CAU"
                                width="70" height="70" alt="">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-company">Small Title</label>
                            <input type="text" class="form-control" value="{{ $About_content->small_title }}"
                                name="small_title" id="basic-default-company" placeholder="ACME Inc." />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-company">Big Title</label>
                            <input type="text" class="form-control" name="big_title"
                                value="{{ $About_content->big_title }}" id="basic-default-company"
                                placeholder="ACME Inc." />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-company">Description</label>
                            <textarea name="description" class="form-control" cols="30" rows="10">{{ $About_content->description }} </textarea>
                        </div>

                </div>
                <button type="submit" class="btn btn-primary">Send</button>
                </form>
            </div>
        </div>
    </div>

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
@endsection
