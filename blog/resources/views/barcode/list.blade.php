@extends('template')

@section('content')






<div class="table-responsive-lg table-hover container " style="margin-top: 70px">
 
    <table class="table table-borderless">

        <caption>List of Barcode</caption>
        <div>
          <div class="row">
            <div class="col-sm-2">
                <h4>รายการ Barcode</h4>
            </div>
            <div class="col-sm-10">
                <form class="form-inline my-2 my-lg-0">
                  <input class="form-control mr-sm-2" type="search" placeholder="ค้นหาเอกสาร" aria-label="Search">
                </form>
            </div>
            <div class="col-sm-1"></div>
          </div>
        </div>

        <hr>
        	<form id="form_action_add" class="form-horizontal" method="POST" action="{{ URL('barcode/create') }}">
							{{ csrf_field() }}
							{{ method_field('GET') }}
                                                <button  type="submit" class="btn btn-primary">สร้าง Barcode ใหม่</button>
							</form>


        <thead>
          <tr >
            <th class="col-md-1 th-grid">#</th>
            <th class="col-md-1 th-grid">เริ่ม</th>
            <th class="col-md-1 th-grid">ถึง</th>
            <th class="col-md-3 th-grid">วันที่สร้าง</th>
            <th class="col-md-4 th-grid">กดพิมพ์แล้ว</th>
            <th class="col-md-4 th-grid">พิมพ์</th>
            <th class="col-md-4 th-grid">ลบ</th>
          </tr>
        </thead>
        <tbody>
<!--          <tr>
            <td class="td-grid">doc_id</td>
            <td class="td-grid">doc_priority</td>
            <td class="td-grid sub_str">ขอส่งคำสั่งคณะเทคโนโลยีสารสนเทศและการสื่อสาร ที่ ๐๕๐/๒๕๖๐ เรื่องแต่งตั้งอาจารย์ที่ปรึกษานิสิต ประจำปี ๒๕๖๐ เพื่อบัน</td>
            <td class="td-grid">doc_number</td>
            <td><button type="button" class="btn btn-warning" style="color:white;">เพิ่มเติม</button></td>
          </tr>-->
            <?php 
            $i=1;
            ?>
            	@foreach($Data['Barcode'] as $key => $value)
					<tr>        
                                            <td class="td-grid">{{ $i++ }}</td>
                                            <td class="td-grid">{{ $value->NUM_FROM }}</td>
						 <td class="td-grid">{{ $value->NUM_TO }}</td>
                                                    <td class="td-grid">{{ $value->CREATE_DATE }}</td>
                                                    <td class="td-grid">{{ $value->PRINT_STATUS }}</td>
                                                     <td class="td-grid"><a target="_blank" class="btn btn-xs btn-success" href="{{ URL::to('barcode/' . $value->BARCODE_ID) }}">Show</a></td>
						<td class="td-grid">
							<form id="form_action_del"  class="form-horizontal" method="POST" action="{{ URL('barcode/'.$value->BARCODE_ID) }}">
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
<script>


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




@endsection