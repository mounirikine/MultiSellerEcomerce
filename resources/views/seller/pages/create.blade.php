@extends('layouts.main')
@section('content')
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">ADD PRODUCT</h5>
                    <small class="text-muted float-end">Default label</small>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-fullname">Product Name</label>
                            <input type="text" class="form-control" name="product_name" id="basic-default-fullname"
                                placeholder="" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-company">Price</label>
                            <input type="number" class="form-control" name="price" id="basic-default-company"
                                placeholder="ACME Inc." />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-company">Old Price</label>
                            <input type="number" class="form-control" name="old_price" id="basic-default-company"
                                placeholder="ACME Inc." />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-company">Ratting</label>
                            <input type="number" class="form-control" name="ratting" id="basic-default-company"
                                placeholder="ACME Inc." />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-email">Category</label>
                            <div class="input-group input-group-merge">
                                <input type="text" name="category" id="basic-default-email" class="form-control"
                                    placeholder="john.doe" aria-label="john.doe" />

                            </div>

                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-phone">Image</label>
                            <input type="file" name="image" id="basic-default-phone" class="form-control phone-mask"
                                placeholder="658 799 8941" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-message">Quantity</label>
                            <input type="number" name="quantity" class="form-control phone-mask" />

                        </div>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
