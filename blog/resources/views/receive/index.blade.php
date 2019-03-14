@extends('template')

@section('title', 'Table of Document')

@section('content')

    <div><?php 
//    dd(Session::get('gid'));
    $gid= Session::get('gid');
    $gid = $gid['gid'];
        $url_sent_department= URL('/receive_item'); 
        $url_sent_department_control_code= URL('/receiveitemcontrolcode'); 
        $url_get_data=URL('/receivelist');

    
    ?></div>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Control Code รับเอกสารหน่วยงาน กบศ.</h5>
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
 <form autocomplete="off" id="sent_control_code" action="{{ $url_sent_department_control_code }}" class="form-horizontal" >

                @csrf
                     <div class="form-row">
                            <div>
                                <a id="message_save"></a>

                            </div>
                     
                        </div>
               
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>control code</label>
                                <input type="number" class="form-control" name="DOCUMENT_NUMBER" id="DOCUMENT_NUMBER">
                            </div>
                      
                        </div>
                
                <input type="submit" hidden="true"></button>
                      </form>
                         
        </div>
      
      </div>
    </div>
  </div>
    <!-- Modal -->
  <div class="modal fade" id="sentlistModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">รับเอกสาร</h5>
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
    <form autocomplete="off" id="sent_department" action="{{ $url_sent_department }}" class="form-horizontal" >
                        {{ csrf_field() }}
                        <h4>รับรายการเอกสารที่เลือก</h4>
<input type="hidden" id="hidden_document_item_id" name="hidden_document_item_id" value="">
<label for="title" class="col-md-4 control-label"></label>
<div class="col-md-6">
    <button type="submit" class="btn btn-primary" id="btn_search">รับ</button>
    <button type="button" class="btn btn-warning" data-dismiss="modal" aria-label="Close">ยกเลิก</button>
</div>
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
                                <div class="card-header py-3"> <h6 class="m-0 font-weight-bold text-primary">รายการรับ</h6></div>
     <div class="card-header py-3" id="toolbar">
<button  id="btnsent" type="button" class="btn btn-primary" data-toggle="modal" data-target="#sentlistModal">รับ(รายการที่เลือก)</button>
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">รับ(control code)</button>
</div>
    <table class="table table-bordered" id="table" width="100%" cellspacing="0">

    
        <thead>
          <tr >
            <th><input type="checkbox" id="select_all" class="select_all"></th>
            <th>ลำดับ</th>
            <th>คณะ/หน่วยงาน</th>
            <th>เลขที่ ศธ.</th>
            <th>ประเภทเอกสาร</th>
            <th>เรื่อง</th>
             
            <th>เรียน</th>
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
    {"targets": 1, "width": "2.5%",   "className": "text-center", },
    {"targets": 2, "width": "15%",   "className": "text-center", },
    {"targets": 3, "width": "10%",   "className": "text-center", },
    {"targets": 4, "width": "5%",   "className": "text-center", },
    {"targets": 5, "width": "40%",   "className": "text-center", },
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




$("#sent_department").submit(function(e) {
    var form = $(this);
    var url = form.attr('action');
    var document_id=[];
   var i=0;
    $('.select_document').each(function( index ) {
      if($(this).is(':checked'))  {
          document_id[i]=$( this ).val();
          i++;
      }
});
//alert(document_id);
        if(document_id != ''){
            
            $('#hidden_document_item_id').val(document_id);
           var department_id = $("#sent_department select[id=department_id]").val();
       
            if(department_id != 0){
                
                      $.ajax({
           type: "POST",
           url: url,
           data: form.serialize(), // serializes the form's elements.
           success: function(data)
           {
//               alert(data.error); // show response from the php script.
            window.location.replace("{{ URL('/receive') }}");
                       }
                     });
            }else{
                alert ('กรุณาเลือก หน่วยงานที่จะส่งต่อ');
            }
            
       
           }else{
            alert ('กรุณาเลือก รายการที่ต้องการรับ');
            e.preventDefault();  // avoid to execute the actual submit of the form.
        }
             e.preventDefault();  // avoid to execute the actual submit of the form.
});


$("#sent_control_code select[id=department_id]").change(function(){

       var department_id = $("#sent_control_code select[id=department_id]").val();
       
       if(department_id == 0){
           $("#sent_control_code input[id=DOCUMENT_NUMBER]").blur();
       }else{
        $("#sent_control_code input[id=DOCUMENT_NUMBER]").focus();
    }

});

$("#select_all").change(function(){
if ($('#select_all').is(':checked')) {
    $("#btnsent").prop('disabled', false);
    $(".select_document").prop('checked', true);
    ck_select();
    
}else{
     $("#btnsent").prop('disabled', true);
    $(".select_document").prop('checked', false);
}

});

$("#btnsent").prop('disabled', true);
function ck_select(){
     var document_id=[];
     var i=0;
$('.select_document').each(function( index ) {
      if($(this).is(':checked'))  {
          document_id[i]=$( this ).val();
          i++;
      }
});
if (document_id != '') {
    $("#btnsent").prop('disabled', false);
    
}else{
   $("#btnsent").prop('disabled', true);
}

}

$("#sent_control_code").submit(function(e) {
    var form = $(this);
    var url = form.attr('action');

              $.ajax({
           type: "POST",
           url: url,
          dataType: "json",
           data: form.serialize(), // serializes the form's elements.
           success: function(response, status, xhr)
           { 
               var html= "<span class='icon text-white-50'><i class='fas fa-exclamation-triangle'></i></span><span class='text'>.....</span>";
                $("#message_save").html(html) ;
                     $("#message_save").attr('class', "btn btn-info btn-icon-split");
              
                  if (response.error == true) {
//                      alert("เอกสารนี้นำส่งแล้ว");
                var html= "<span class='icon text-white-50'><i class='fas fa-exclamation-triangle'></i></span><span class='text'>ผิดพลาด เอกสารนี้นำส่งแล้ว</span>";
                $("#message_save").html(html) ;
                     $("#message_save").attr('class', "btn btn-warning btn-icon-split");

                } else {
                   var html= "<span class='icon text-white-50'><i class='fas fa-check'></i></span><span class='text'>บันทึกสำเร็จ</span>";
                $("#message_save").html(html) ;
                     $("#message_save").attr('class', "btn btn-success btn-icon-split");
                }
             
           }
         });
$("#sent_control_code input[id=DOCUMENT_NUMBER]").val("");
  $('#table').DataTable().destroy();
  fill_datatable();
 e.preventDefault();  // avoid to execute the actual submit of the form. 


});

$('#exampleModal').on('hidden.bs.modal', function () {
  // do something…
$('#table').DataTable().destroy();
  fill_datatable();
});

    $('#exampleModal').on('shown.bs.modal', function() {
       $("#sent_control_code input[id=DOCUMENT_NUMBER]").focus();
    });
  </script>




@endsection