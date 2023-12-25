@extends('admin.layouts.main')

@section('content')
    <div class="row mt-5">
      
        <div class="card">
            <h5 class="card-header">All Sellers</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead class="table-light w-100">
                        <tr>
                            <th class="text-center">#ID</th>
                            <th class="text-center">Image</th>
                            <th class="text-center">Brand</th>
                            <th class="text-center">Full Name</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Phone Number</th>
                            <th class="text-center">Address</th>
                            <th class="text-center">State</th>
                            <th class="text-center">Country</th>
                            <th class="text-center">Code ZIP</th>
                            <th class="text-center">Role</th>
                            <th class="text-center">Actions</th>
                            <th class="text-center">Change As Seller</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($sellers as $seller)
                            <tr>
                                <td class="text-center">{{ $seller->id }}</td>
                                <td class="text-center">
                                    <img src="{{ asset('storage/images/products/' . ($seller->image ?? 'https://www.unamur.be/sciences/chimie/rco/membres-images/inconnu/imagehttps://www.unamur.be/sciences/chimie/rco/membres-images/inconnu/image_preview')) }}" class="h-auto rounded-circle" width="60" height="60" />
                                </td>
                                <td class="text-center">
                                    <img src="{{ asset('storage/images/brands/' . ($seller->brand ?? 'https://www.unamur.be/sciences/chimie/rco/membres-images/inconnu/imagehttps://www.unamur.be/sciences/chimie/rco/membres-images/inconnu/image_preview')) }}" class="h-auto rounded-circle" width="60" height="60" />
                                </td>
                                <td class="text-center">{{ $seller->name }}</td>
                                <td class="text-center">{{ $seller->email }}</td>
                                <td class="text-center">{{ $seller->phone ?? 'N/A' }} </td>
                                <td class="text-center">{{ $seller->address ?? 'N/A' }}</td>
                                <td class="text-center">{{ $seller->state ?? 'N/A' }}</td>
                                <td class="text-center">{{ $seller->country ?? 'N/A' }}</td>
                                <td class="text-center">{{ $seller->zip_code ?? 'N/A' }}</td>
                                <td class="text-center text-danger">{{ $user->role ?? 'N/A' }}</td>
                                <td class="text-center">
                                    <a href="{{route('delete.seller',$seller->id)}}" class="btn btn-danger"><i class='bx bx-trash'></i></a>
                                </td>
                                <td class="">
                                    <form action="{{ route('change_to_user', $seller->id) }}" method="POST">
                                        @csrf
                                        <button type="button" class="btn btn-success send-as-user"><i class='bx bx-send'></i></button>
                                    </form>
    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Add a JavaScript click event listener for send-as-seller buttons
    document.querySelectorAll('.send-as-user').forEach(function (button) {
        button.addEventListener('click', (e) => {
            e.preventDefault();

            Swal.fire({
                title: 'Are you sure?',
                text: "Do You Want To Add This Ass user!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Send it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Submit the associated form
                    e.target.closest('form').submit();
                }
            });
        });
    });
</script>
@endsection
