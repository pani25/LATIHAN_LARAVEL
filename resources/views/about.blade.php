{{-- pertama panggil parrents layout --}}
@extends('layouts.frontend')

{{-- kedua kita masukan content ke parent layouts --}}
@section('content')
    <h1 class="text-center">About</h1>
    <hr>
    <div class="row d-flex justify-content-center">
        <div class="card" style="width: 18rem;">
            <img src="{{ asset('images/' . $image) }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $nama }}</h5>
                <p class="card-text">{{ $job }}</p>
                <small>{{ $city }}</small>
                <br>
                <a href="#" class="btn btn-primary d-flex mt-3">Go somewhere</a>
            </div>
        </div>
    </div>
@endsection
