@extends('backend.main')

@section('content')
    {{-- untuk session message --}}
    @if (session()->has('success'))
        <div class="alert alert-succes" role="alert">
            {{ session('success') }}
            {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
        </div>
    @endif
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h3 class="m-0 font-weight-bold text-primary float-left">
                DATA COURSES &nbsp;
                {{-- <a href="{{ route('restore/') }}" class="btn btn-primary float-end">Restore</a> --}}
            </h3>
            <a href="{{ route('courses.create') }}" class="btn btn-primary float-end">ADD</a>

        </div>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Gambar</th>
                <th scope="col">Nama Pelatihan </th>
                <th scope="col">Harga</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            {{-- untuk looping item --}}
            {{-- @foreach ($courses as $item) --}}
            @foreach ($courses as $key => $item)
                <tr>
                    <th scope="row">1</th>
                    {{-- <th scope="row">{{  $loop->literation }}</th> --}}
                    {{-- <th scope="row">{{ $courses }}</th> --}}
                    <td>
                        <img height="50" src="{{ asset('images/' . $item->image) }}"
                            alt="{{ asset('images/' . $item->image) }}">
                    </td>
                    {{-- <td>Mark</td> --}}
                    <td>{{ $item->course_name }}</td>
                    <td>$. {{ $item->price }}</td>
                    <td>
                        <form action="{{ route('courses.destroy', $item->id) }}" method="POST">
                            <a href="{{ route('courses.edit', $item->id) }}" class="btn text-primary"><i
                                    class="fas fa-edit"></i></a>
                            <a href="{{ route('courses.show', $item->id) }}" class="btn text-primary"><i
                                    class="fas fa-eye"></i></a>

                            @csrf
                            @method('DELETE')
                            <button class="btn text-danger">
                                <i class="fas fa-trash"></i>
                            </button>
                    </td>
                </tr>
            @endforeach
            {{-- <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr> --}}
        </tbody>
    </table>

    {{-- pagination --}}
    {{ $courses->links() }}
@endsection
