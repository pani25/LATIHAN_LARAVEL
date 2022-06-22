{{-- pertama panggil parrents layout --}}
@extends('layouts.frontend')

{{-- kedua kita masukan content ke parent layouts --}}
@section('content')
    {{-- <h1>Halaman Feature</h1> --}}
    <div class="row mt-5">
        <div class="col-md-6 pt-5 pt-lg-0 d-flex justify-content-center flex-column order-0 order-2">
            <h1>
                Continous Learning Keep Up to Date With
                {{-- <br> --}}
                <strong class="text-primary">INIXINDO BANDUNG</strong>
            </h1>
            <div class="my-3">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita est labore tempora maiores commodi
                provident, facere quibusdam ut, iure sequi cum! Quod magni tempora nisi quisquam ducimus reiciendis numquam
                architecto?
            </div>
            <div class="mt-4">
                <a href="" class="btn btn-outline-primary">
                    Get Started
                </a>
            </div>
        </div>
        {{-- kolom untuk menambahkan gambar --}}
        <div class="col-lg-6 order-1 order-lg-2">
            <img class="img-fluid animation" src="{{ asset('images/programing.svg') }}" alt="">
        </div>
    </div>
@endsection
