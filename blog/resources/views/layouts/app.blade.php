<html>
    <head>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Edocument - @yield('title')</title>

    @include('layouts.style')

    </head>

    <style>
        body{
            font-family: 'Sarabun', sans-serif;
        }
    </style>
<body>

    @include('layouts.navbar')

    <div>
        @yield('content')
    </div>

    {{-- <img src="{{url('/images/Capture.JPG')}}" alt="Image"/> --}}

</body>

</html>
