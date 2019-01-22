

<html>
    <head>
    <meta charset="utf-8"> <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Sarabun" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"><script src="//code.jquery.com/jquery-1.12.3.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<link rel="stylesheet"
    href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet"
    href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
        <title>Task Reminder</title>
    </head>
    <style>
        body{
            font-family: 'Sarabun', sans-serif;
        }
    </style>
<body>
    
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-custom fixed-top" >
                <a class="navbar-icon" href="http://127.0.0.1:8000/"><img src="{{url('/images/UPLogo.png')}}" alt="" style="width: auto ; height: 35px;"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
              
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                      <a class="nav-link" href="http://127.0.0.1:8000/">ระบบสารบัญเอกสาร <span class="sr-only">(current)</span></a>
                    </li>   
                    <li class="nav-item">
                      <a class="nav-link" href="http://127.0.0.1:8000/list"><i class="fas fa-align-left"></i> &nbsp; ดูรายการเอกสาร</a> 
                    </li>  <li class="nav-item">
                      <a class="nav-link" href="http://127.0.0.1:8000/barcode"><i class="fas fa-align-left"></i> &nbsp; พิมพ์ Barcode Sticker </a> 
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
<table class="table" id="table">
<!--
        	<form id="form_action_add" class="form-horizontal" method="POST" action="{{ URL('barcode/create') }}">
							{{ csrf_field() }}
							{{ method_field('GET') }}
                                                <button  type="submit" class="btn btn-primary">สร้าง Barcode ใหม่</button>
							</form>-->


        <thead>
          <tr >
            <th>#</th>
            <th>เริ่ม</th>
            <th>ถึง</th>
            <th>วันที่สร้าง</th>
            <th>กดพิมพ์แล้ว</th>
            <th>พิมพ์</th>
            <th>ลบ</th>
          </tr>
        </thead>
        <tbody>

            <?php 
            $i=1;
            ?>
            	@foreach($Data['Barcode'] as $key => $value)
					<tr>        
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $value->NUM_FROM }}</td>
						 <td>{{ $value->NUM_TO }}</td>
                                                    <td>{{ $value->CREATE_DATE }}</td>
                                                    <td>{{ $value->PRINT_STATUS }}</td>
                                                     <!--<td><a target="_blank" class="btn btn-xs btn-success" href="{{ URL::to('barcode/' . $value->BARCODE_ID) }}">Show</a></td>-->
                                                    <td>
                                                    <button class="edit-modal btn btn-info"
            data-info="{{$value->BARCODE_ID}}">
            <span class="glyphicon glyphicon-edit"></span> Edit
        </button>
                                                        </td>
						<td>
							<form id="form_action_del"   method="POST" action="{{ URL('barcode/'.$value->BARCODE_ID) }}">
							{{ csrf_field() }}
							{{ method_field('DELETE') }}
                                                <button  type="submit" class="btn btn-xs btn-danger">Delete</button>
							</form>
			
			
						</td>
					</tr>
                                        
				@endforeach
        </tbody>
      </table>
    </div>

    {{-- <img src="{{url('/images/Capture.JPG')}}" alt="Image"/> --}}



   
</body>

</html>




 
  
<script>

  $(document).ready(function() {
    $('#table').DataTable();
} );

$( "#form_action_del" ).submit(function( event ) {
  if(confirm("ต้องการลบข้อมูลหรือไม่!")){
      return;
  }else{
       event.preventDefault(); //คือ คำสั่งที่ใช้หยุดการเกิดเหตุการณ์ใดๆขึ้น
  }

});

$( "#form_action_add" ).submit(function( event ) {
  if(confirm("ต้องการเพิ่มข้อมูลหรือไม่!")){
      return;
  }else{
       event.preventDefault(); //คือ คำสั่งที่ใช้หยุดการเกิดเหตุการณ์ใดๆขึ้น
  }

});


    </script>
    
  <style>
      h3{
        font-weight: bold;
      }
      .th-grid {
        width: auto !important;
      }
      .long {
        width: 40% !important;
      }
      @media only screen and (max-width: 600px) {
        .long {
        width: auto !important;
        }
        .th-grid:nth-child(even) {
          display: none;
        }
        .td-grid:nth-child(even) {
          display: none;
        }
        .btn-warning {
          display: none;
        }
      }
  </style>

  <script>

  </script>



