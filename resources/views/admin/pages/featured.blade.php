@extends('admin.layouts.main')
@section('content')
<div class="row mt-5">
  <div class="pl-4">
    <a href="{{route('add.brand_pub_featured')}}" class="btn mb-3 float-end  btn-primary w-25">ADD Brand PUB</a>
  </div>
    <div class="card">
        <h5 class="card-header">Featured</h5>
        <div class="table-responsive text-nowrap">
          <table class="table">
            <thead class="table-light w-100">
              <tr>
                <th class="text-center">#ID</th>            
                <th class="text-center">image</th>
                <th class="text-center">action</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach ($brands as $brand)
                <tr>
                    <td class="text-center">{{$brand->id}}</td>
                    <td class="text-center"><img src="{{asset('storage/images/publication/' . $brand->image)}}"class=" h-auto rounded-circle" width="60" height="60" /></td>
                    
                    <td class="text-center">
                      <a href="{{route('delete.brand_pub',$brand->id)}}" class="btn btn-danger"><i class='bx bx-trash'></i></a>
                    </td>
                    </tr>
                @endforeach
            </tbody>
          </table> 
        </div>
      </div>    
</div>
@endsection