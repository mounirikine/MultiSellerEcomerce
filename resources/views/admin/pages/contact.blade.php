@extends('admin.layouts.main')

@section('content')
<div class="col-md mb-4 mb-md-0">
    <small class="text-light fw-semibold">Contacts Message</small>
    <div class="accordion mt-3" id="accordionExample">
        @foreach ($contacts as $key => $contact)
        <div class="card accordion-item">
            <h2 class="accordion-header" id="heading{{ $key }}">
                <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#collapse{{ $key }}" aria-expanded="false" aria-controls="collapse{{ $key }}">
                  <a href="{{route('delete.contact',$contact->id)}}" class="btn btn-danger me-4"><i class='bx bx-trash'></i></a>  {{ $contact->user->name }} / <b class="text-warning">SUBJECT </b>: {{ $contact->subject }}
                </button>
            </h2>

            <div id="collapse{{ $key }}" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                <div class="accordion-body"> 

                    <span>Message : </span> <br> <br>
                    {{ $contact->message }}
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
