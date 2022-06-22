@extends('backend.main')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between">
            <h3 class="m-0 font-weight-bold text-primary float-left">
                DATA COURSES
            </h3>
            <a href="{{ route('courses.index') }}" class="btn btn-primary float-end">LIST DATA</a>
        </div>
        <div class="card-body">
            {{-- detail data --}}
            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ asset('images/' . $course->image) }}" class="img-fluid rounded-start">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{ $course->course_name }}</h5>
                            <p class="card-text">{{ $course->description }}</p>
                            <p class="card-text"><small class="text-muted">{{ $course->price }}</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
