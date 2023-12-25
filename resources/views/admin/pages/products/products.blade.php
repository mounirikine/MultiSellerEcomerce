@extends('admin.layouts.main')

@section('content')
    <div class="row mt-5">
        <div class="card">
            <h5 class="card-header">All Products</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead class="table-light w-100">
                        <tr>
                            <th class="text-center">#ID</th>
                            <th class="text-center">Image</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Description</th>
                            <th class="text-center">Category</th>
                            <th class="text-center">Subcategory</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Old Price</th>
                            <th class="text-center">Rating</th>
                            <th class="text-center">QTE</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Seller</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($products as $product)
                            <tr>
                                <td class="text-center">{{ $product->id }}</td>
                                <td class="text-center">
                                    <img src="{{ asset('storage/images/products/' . ($product->image ?? 'https://www.unamur.be/sciences/chimie/rco/membres-images/inconnu/imagehttps://www.unamur.be/sciences/chimie/rco/membres-images/inconnu/image_preview')) }}" class="h-auto rounded-circle" width="60" height="60" />
                                </td>
                                <td class="text-center">{{ Str::limit($product->product_name, 30, '...') }}</td>
                                <td class="text-center">{{ Str::limit($product->description, 30, '...') }}</td>
                                <td class="text-center">{{ $product->category->name ?? 'N/A' }}</td>
                                <td class="text-center">{{ $product->subcategory->name ?? 'N/A' }}</td>
                                <td class="text-center">{{ $product->price ?? 'N/A' }}</td>
                                <td class="text-center">{{ $product->old_price ?? 'N/A' }}</td>
                                <td class="text-center">{{ $product->rating ?? 'N/A' }}</td>
                                <td class="text-center">
                                    {{ $product->quantity ?? 'N/A' }}
                                </td>
                                <td class="text-center {{ $product->status == 'available' ? 'text-success' : 'text-danger' }}">
                                    {{ $product->status ?? 'N/A' }}
                                </td>
                                <td class="text-center">{{ $product->seller->name ?? 'N/A' }}</td>
                                <td class="text-center">
                                    <a href="{{ route('admin.delete.products', $product->id) }}" class="btn btn-danger "><i class='bx bx-trash'></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Add a JavaScript click event listener for send-as-products buttons
        document.querySelectorAll('.delete').forEach(function (button) {
            button.addEventListener('click', (e) => {
                e.preventDefault();

                Swal.fire({
                    title: 'Are you sure?',
                    text: "Do You Want To Delete This Product!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Submit the associated form
                        e.target.closest('form').submit();
                    }
                });
            });
        });
    </script> --}}
@endsection
