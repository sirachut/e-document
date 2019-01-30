@extends('layouts.app')

@section('title', 'Table of Document')

@section('content')

{{-- @include('mdb.modalRight') --}}

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
               <form class="form-horizontal" method="POST" action="{{ URL('/document') }}">
					<!-- if there are creation errors, they will show here -->
					@if($errors->all())
					<ul class="has-error">
					@foreach ($errors->all() as $message)
						<li>{{ $message }}</li>
					@endforeach
					</ul>
					@endif

                        {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('DOCUMENT_NUMBER') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">เลข Barcode* : </label>

                            <div class="col-md-6">
                                <input id="DOCUMENT_NUMBER" type="text" class="form-control" name="DOCUMENT_NUMBER" value="{{ old('DOCUMENT_NUMBER') }}" required autofocus>

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('DOCUMENT_NUMBER') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('DOCUMENT_PRIORITY') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">ประเภทเอกสาร* : </label>

                            <div class="col-md-6">
                                <input id="DOCUMENT_PRIORITY" type="text" class="form-control" name="DOCUMENT_PRIORITY" value="{{ old('DOCUMENT_PRIORITY') }}" required autofocus>

                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('DOCUMENT_PRIORITY') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('DOCUMENT_ST_NUMBER') ? ' has-error' : '' }}">
                            <label for="content" class="col-md-4 control-label">เลขที่ ศธ.  *</label>

                            <div class="col-md-6">
                                <input id="DOCUMENT_ST_NUMBER" type="text" class="form-control" name="DOCUMENT_ST_NUMBER" value="{{ old('DOCUMENT_PRIORITY') }}" required autofocus>
                                @if ($errors->has('DOCUMENT_ST_NUMBER'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('DOCUMENT_ST_NUMBER') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    สร้าง
                                </button>
                            </div>
                        </div>
                    </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<div class="table-responsive-lg table-hover container " style="margin-top: 70px">
    <div><?php $userdata = Session::get('userdata');
    echo $userdata['username'];
    ?></div>
  <form>


   <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
เพิ่มรายการ
</button>
</form>

    <table class="table" id="table" style="width:100%">


        <thead>
          <tr >
            <th>#</th>
            <th>คณะ/หน่วยงาน</th>
            <th>เลขที่ ศธ.</th>
            <th>เรื่อง</th>
            <th>เลขที่รับส่ง</th>
            <th>เรียน</th>
            <th>ac</th>
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
            	@foreach($Document as $key => $value)
					<tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $value->FACULTY_ID }}</td>
						 <td>{{ $value->DOCUMENT_ST_NUMBER }}</td>
                                                    <td>{{ $value->DOCUMENT_NOTATION }}</td>
                                                    <td>{{ $value->DOCUMENT_NUMBER }}</td>
                                                    <td>{{ $value->DOCUMENT_TO }}</td>
                                                    <!--<td><button type="button" class="btn btn-warning" style="color:white;">เพิ่มเติม</button></td>-->
						<td>

							<!-- delete the nerd (uses the destroy method DESTROY /blogs/{id} -->
							<!-- we will add this later since its a little more complicated than the other two buttons -->
							<form id="form_action_del" class="form-horizontal" method="POST" action="{{ URL('document/'.$value->DOCUMENT_ID) }}">
							{{ csrf_field() }}
							{{ method_field('DELETE') }}

							<!-- show the nerd (uses the show method found at GET /users/{id} -->
							<a class="btn btn-xs btn-success" href="{{ URL::to('document/' . $value->DOCUMENT_ID) }}">Show</a>

							<!-- edit this nerd (uses the edit method found at GET /users/{id}/edit -->
							<a class="btn btn-xs btn-info" href="{{ URL::to('document/' . $value->DOCUMENT_ID . '/edit') }}">Edit</a>

							<button type="submit" class="btn btn-xs btn-danger">Delete</button>
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
