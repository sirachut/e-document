@extends('template')

@section('title', 'Table of Document')

@section('content')

    <div><?php 
//    dd(Session::get('gid'));
    $gid= Session::get('gid');
    $gid = $gid['gid'];
        $url_get_data=URL('/documentslist');
 
    ?></div>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Control Code เสร็จสิ้นรายการ</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
      

            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
 <form autocomplete="off" id="sent_control_code" action="#" class="form-horizontal" enctype="multipart/form-data" >

                @csrf
                     <div class="form-row">
                            <div>
                                <a id="message_save">
            
                  </a>
<!--                                <span id="message_save"></span>-->
                    
                            </div>
                     
                        </div>
              
                
                
                
                     <div class="form-row">
      
                            <div class="form-group col-md-6">
                                <label>อัพโหลดไฟล์</label>
                              <input type="file" name="image" class="form-control">
                            </div>
                      
                        </div>
                   
                     <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>หมายเหตุ</label>
                                <input type="text" class="form-control" name="DETAIL" id="DOCUMENT_NUMBER">
                            </div>
                      
                        </div>
              
                
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>control code</label>
                                <input type="number" class="form-control" name="DOCUMENT_NUMBER" id="DOCUMENT_NUMBER">
                            </div>
                      
                        </div>
                <input type="hidden" id="gid" name="gid" value="{{$gid}}">
                
                <input type="submit" hidden="true"></button>
                      </form>
                         
        </div>
      
      </div>
    </div>
  </div>


     
<div class="container-fluid">
@include('search.search')
    
 <div class="card shadow mb-4">
    <div class="card-body">

                       <div class="table-responsive">
                                <div class="card-header py-3"> <h6 class="m-0 font-weight-bold text-primary">เสร็จสิ้นรายการ</h6></div>
     <div class="card-header py-3" id="toolbar">
<button  id="btnsent" type="button" class="btn btn-primary" data-toggle="modal" data-target="#sentlistModal">เสร็จสิ้น(รายการที่เลือก)</button>
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">เสร็จสิ้น(control code)</button>
</div>
    <table class="table table-bordered" id="table" width="100%" cellspacing="0">

    
        <thead>
          <tr >
            <th>ลำดับ</th>
            <th>คณะ/หน่วยงาน</th>
            <th>เลขที่ ศธ.</th>
            <th>ลงวันที่</th>
             <th>เรื่อง</th>
              <th>เรียน</th>
            <th>ประเภทเอกสาร</th>
            <th>control code</th>
            <th>รายละเอียด</th>
          </tr>
        </thead>

      </table>
                
              </div>
            </div>

     
 
    </div>
  </div>
<script>
    var url_get_data = "{{$url_get_data}}";
   fill_datatable();



      function fill_datatable(data = '')
  {
  var table = $('#table').DataTable({searching: false,
       "columnDefs": [
    {"targets": 0, "width": "2.5%",   "className": "text-center", },
    {"targets": 1, "width": "10%",   "className": "text-center", },
    {"targets": 2, "width": "10%",   "className": "text-center", },
    {"targets": 3, "width": "10%",   "className": "text-center", },
    {"targets": 4, "width": "40%",   "className": "text-center", },
    {"targets": 5, "width": "15%",   "className": "text-center", },
    {"targets": 6, "width": "10%",   "className": "text-center", },
    {"targets": 7, "width": "10%",   "className": "text-center", },
    {"targets": 8, "width": "5%",   "className": "text-center", },
  ],
       "ordering": false,
       info: true,
      "dom": '<"top">rt<"bottom"lip><"clear">',
    "processing": true,
    "serverSide":true,
                "ajax":{
                    url: url_get_data,
                    type:"get",
                     data:{
                       data_search:data
                    }
                }
   });
  }


        $("#form_search").submit(function (e) {
//  var data = $('#form_search').serialize();

var data = 'FACULTY_ID=' + $('#form_search select[id=FACULTY_ID]').val() + '&' + 'DOCUMENT_TO=' + $('#form_search select[id=DOCUMENT_TO]').val() + '&' + 'DOCUMENT_NOTATION=' + $('#form_search select[id=DOCUMENT_NOTATION]').val() + '&'
        + 'DOCUMENT_NAME=' + $('#form_search input[id=DOCUMENT_NAME]').val() + '&' + 'DOCUMENT_ST_NUMBER=' + $('#form_search input[id=DOCUMENT_ST_NUMBER]').val() + '&' + 'DOCUMENT_NUMBER=' + $('#form_search input[id=DOCUMENT_NUMBER]').val()
//alert(data);
   if(data != '')
   {
    $('#table').DataTable().destroy();
    fill_datatable(data);
   }
   else
   {
    alert('Select Both filter option');
    $('#table').DataTable().destroy();
    fill_datatable();
   }     
        });


  </script>




@endsection