<html>
    <head>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Edocument</title>

    @include('layouts2.style')

    </head>

    <style>
        body{
            font-family: 'Sarabun', sans-serif;
        }
    </style>

<body>
 <div id="wrapper">
     
    @include('layouts2.navbar')
    <div id="content-wrapper" class="d-flex flex-column">
       <div id="content">
        @include('layouts2.topbar')
        @yield('content')
       </div>
        @include('layouts2.footer')
    </div>
</div>

    

</body>

</html>
