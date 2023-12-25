@extends('admin.layouts.main')

@section('content')
    <div class="row">
        <!-- First Column -->
        <div class="col-md-6">
            <div class="card mb-4">
                <h5 class="card-header">Add Categories</h5>
                <div class="card-body">
                    <form action="{{ route('add.category') }}" method="POST">
                        <!-- Name Input -->
                        @csrf
                        <div class="mb-3">
                            <label for="defaultFormControlInput" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <!-- Add Categories Button -->
                        <button type="submit" class="btn btn-primary">Add Categories</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Second Column -->
        <div class="col-md-6">
            <div class="card mb-4">
                <h5 class="card-header">Add SubCategories</h5>
                <div class="card-body">
                    <form action="{{ route('add.subcategory') }}" method="POST">
                        <!-- Name Input -->
                        @csrf
                        <div class="mb-3">
                            <label for="defaultFormControlInput" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <!-- Category Select -->
                        <div class="mb-3">
                            <label class="form-label" for="categorySelect">Category</label>
                            <div class="input-group input-group-merge">
                                <select name="category_id" class="form-control" id="categorySelect">
                                    <option value="">--select--</option>
                                    <!-- Loop through categories -->
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- Add SubCategories Button -->
                        <button type="submit" class="btn btn-primary">Add SubCategories</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row d-flex gap-2 justify-content-center">
        <div class="col-lg-4">
            <div class="row mt-5">
                <div class="card">
                    <h5 class="card-header">All Categories</h5>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead class="table-light w-100">
                                <tr>
                                    <th class="text-center">#ID</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($categories as $category)
                                    <tr>
                                        <td class="text-center">{{ $category->id }}</td>
                                        <td class="text-center">{{ $category->name ?? 'N/A' }}</td>
                                        <td class="text-center">
                                            <a href="" class="btn btn-danger"><i class='bx bx-trash'></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="row mt-5">
                <div class="card">
                    <h5 class="card-header">All Subcategories</h5>
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead class="table-light w-100">
                                <tr>
                                    <th class="text-center">#ID</th>
                                    <th class="text-center">Category Name</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($subCategories as $subCategory)
                                    <tr>
                                        <td class="text-center">{{ $subCategory->id }}</td>
                                        <td class="text-center">{{ $subCategory->category->name ?? 'N/A' }}</td>
                                        <td class="text-center">{{ $subCategory->name ?? 'N/A' }}</td>
                                        <td class="text-center">
                                            <a href="" class="btn btn-danger"><i class='bx bx-trash'></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
