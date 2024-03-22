<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token()}}" >
    {{-- <title>Forum | {{$title}}</title> --}}
    <link rel="stylesheet" href="{{ asset('css/style_admin.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    @if(auth()->check())
         @if(auth()->user()->role === 'Admin')
            {{-- Contenu de la page d'administration --}}
            <main>
                @include('admin.nav')
                <section class="content section_admin">
                    <div class="container" style="">
                    <div class="mb-6"> @include('partials.flashbag')</div>
                        {{$slot}}
                    </div>
                </section>
            </main>
            @endif
    @else
        {{-- redirection a la page de conexion --}}
        <div class="container w-50 mx-auto text-center">
            <h2>You are not an administrator,click on login to redirect you to the authentication page.</h2>
            <div class="row">
                <button class="btn btn-warning mx-auto w-25"><a class="nav-link text-light fw-bold" href="{{route('login.show')}}"><i class="bi bi-arrow-left"></i> Login</a></button>
            </div>
        </div>

    @endif


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>