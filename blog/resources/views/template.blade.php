<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Edocument</title>

    @include('layouts2.style')

    </head>

    <style>
        body{
            font-family: 'Sarabun', sans-serif;
        }
    </style>

<body id="page-top">
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
