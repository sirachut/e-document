<html>
    <head>
    <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> <title>Task Reminder</title>
        <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">--><link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Sarabun" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"><link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
        
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script> 
         <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
         <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
       
    </head>
    <style>
        body{
            font-family: 'Sarabun', sans-serif;
        }
    </style>
<body>
    
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-custom fixed-top" >
                <a class="navbar-icon" href="{{ URL('') }}"><img src="{{url('/images/UPLogo.png')}}" alt="" style="width: auto ; height: 35px;"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                      <a class="nav-link" href="{{ URL('') }}">ระบบสารบัญเอกสาร <span class="sr-only">(current)</span></a>
                    </li>   
                    <li class="nav-item">
                      <a class="nav-link" href="{{ URL('/document') }}"><i class="fas fa-align-left"></i> &nbsp; ดูรายการเอกสาร</a> 
                    </li>  <li class="nav-item">
                      <a class="nav-link" href="{{ URL('/barcode') }}"><i class="fas fa-align-left"></i> &nbsp; Barcode</a> 
                    </li>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-address-card"></i> &nbsp; เกี่ยวกับเรา
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#"><img src="{{url('/images/morpor.png')}}" style="width: 30px ; height: 15px;"> &nbsp; ติดต่อกองบริการการศึกษา</a> 
                        <a class="dropdown-item" href="#"> &nbsp;<i class="fas fa-question-circle"></i> &nbsp;&nbsp; คำถามที่พบเจอบ่อย ๆ</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">โครงสร้างหน่วยงาน</a>
                      </div>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true"><i class="fas fa-tools"></i> &nbsp; ติดต่อ admin</a>
                    </li>
                  </ul>
                  <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                  </form>
                </div>
              </nav>

              

    <div class="container">
        @yield('content')
    </div>

    {{-- <img src="{{url('/images/Capture.JPG')}}" alt="Image"/> --}}



</body>

</html>