@extends('layouts.app')
@section('content')
<div class="table-responsive-lg table-hover container " style="margin-top: 70px">

    	<form id="form_action_add" class="form-horizontal" method="POST" action="{{ URL('barcode/create') }}">
							{{ csrf_field() }}
							{{ method_field('GET') }}
                                                <button  type="submit" class="btn btn-primary">สร้าง Barcode ใหม่</button>
							</form>
<table class="table" id="table" style="width:100%">


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
                                                     <td><a target="_blank" class="btn btn-xs btn-success" href="{{ URL::to('barcode/' . $value->BARCODE_ID) }}">Show</a></td>

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


@endsection
