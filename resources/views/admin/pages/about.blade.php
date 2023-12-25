@extends('admin.layouts.main')
@section('content')
    <div class="row mt-5">
        <div class="pl-4">
        </div>
        <div class="card">
            <h5 class="card-header">Featured</h5>
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead class="table-light w-100">
                        <tr>
                            <th class="text-center">#ID</th>
                            <th class="text-center">image</th>
                            <th class="text-center">Small Title</th>
                            <th class="text-center">Big Titla</th>
                            <th class="text-center">Description</th>
                            <th class="text-center">action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                @foreach ($About_content as $content)
                <tr>
                    <td class="text-center">{{$content->id}}</td>
                                        <td class="text-center"><img src="{{asset('storage/images/about/' . $content->image)}}" class=" h-auto rounded-circle" width="60" height="60" /></td>

                    <td class="text-center">{{$content->small_title}} </td>
                    <td class="text-center">{{$content->big_title}}</td>
                    <td class="text-center">{{ Str::limit($content->description, 40, '...') }}</td>

                    
                    <td class="text-center">
                      <a href="{{route('edit.about',$content->id)}}" class="btn btn-success"><i class='bx bx-edit-alt'></i></a>
                    </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
