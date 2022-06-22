<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- ini untuk bootsrap --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}

    {{-- offline bootstrap cara 1 --}}
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    {{-- offline bootstrap cara 2 --}}

    {{-- style custom scc --}}
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    <title>Training Fullstack</title>
</head>

<body>
    {{-- navbar --}}
    @include('layouts.navbar')

    <div class="container">

        {{-- conent web --}}
        @yield('content')

    </div>
    {{-- js untuk bootstrap --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> --}}
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>

</html>
