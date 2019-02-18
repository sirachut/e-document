@extends('template')

@section('title', 'Table of Document')

@section('content')

    <div><?php 
//    dd(Session::get('gid'));
    $gid= Session::get('gid');
    $gid = $gid['gid'];
//    echo ($get_gid);
    
    if($gid == 10 || $get_gid == 10 ){
        $url_sent_department= URL('/director');     
        $url_sent_department_control_code= URL('/directorcontrolcode'); 
        if($get_gid){
            $gid=$get_gid;
        }else{
            $gid=$gid;
        }
        $url_get_data= URL('/sentlist/'.$gid);
    }else{
        $url_sent_department= URL('/sent_item'); 
        $url_sent_department_control_code= URL('/sentitemcontrolcode'); 
        $url_get_data=URL('/sentlist');
    }
    
    ?></div>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Control Code ส่งเอกสารหน่วยงาน กบศ.</h5>
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
 <form id="sent_control_code" action="{{ $url_sent_department_control_code }}" class="form-horizontal" >

                @csrf
                     <div class="form-row">
                            <div>
                                <a id="message_save">
            
                  </a>
<!--                                <span id="message_save"></span>-->
                    
                            </div>
                     
                        </div>
               
                        <div class="form-row">
                            <div class="form-group col-md-7">
                                    <label>หน่วยงาน กบศ.</label>
                            {{ form_select_department()}}
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
                                <input type="text" class="form-control" name="DOCUMENT_NUMBER" id="DOCUMENT_NUMBER">
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
          <h5 class="modal-title" id="exampleModalLabel">Control Code ส่งเอกสารหน่วยงาน กบศ.</h5>
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
    <form id="sent_department" action="{{ $url_sent_department }}" class="form-horizontal" >
        
               
					<!-- if there are creation errors, they will show here -->
				
                        {{ csrf_field() }}
                        <?php if($gid != 10 && $get_gid != 10){ ?>
                                  
    
                            <label for="title" class="col-md-4 control-label">หน่วยงาน ที่รับ* : </label>
                            <div class="col-md-6">
                              {{ form_select_department()}}
                          
                            </div>
                       
						
                     
                            <label for="title" class="col-md-4 control-label">รายละเอียด : </label>

                            <div class="col-md-6">
                                <input id="DETAIL" type="text" class="form-control" name="DETAIL">
         
                            </div>
                        <?php } ?>
                        
<input type="hidden" id="hidden_document_item_id" name="hidden_document_item_id" value="">
<label for="title" class="col-md-4 control-label"></label>
<div class="col-md-6">
    <button type="submit" class="btn btn-primary" id="btn_search">ส่ง</button>
    <button type="button" class="btn btn-warning" data-dismiss="modal" aria-label="Close">ยกเลิก</button>
</div>
                    </form>
                         
        </div>
      
      </div>
    </div>
  </div>
<div class="table-responsive-lg table-hover container " style="margin-top: 70px">


 

    <div id="toolbar">
          เลือกรายการ </br>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#sentlistModal">ส่งต่อ(รายการที่เลือก)</button>
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">ส่งต่อ(control code)</button>

</div>
    <table class="table" id="table" data-toolbar="#toolbar" style="width:100%">

    
        <thead>
          <tr >
              <th>เลือก</th>
            <th>ลำดับ</th>
            <th>คณะ/หน่วยงาน</th>
            <th>เลขที่ ศธ.</th>
            <th>เรื่อง</th>
             <th>notation</th>
            <th>เลขที่รับส่ง</th>
            <th>เรียน</th>
            <th>รายละเอียด</th>
          </tr>
        </thead>

      </table>
  </div>
<script>
    
  $(document).ready(function() {
   var table = $('#table').DataTable({searching: false,
       info: false,
      "dom": '<"top"i>rt<"bottom"lp><"clear">',
    "processing": true,
    "serverSide":true,
                "ajax":{
                    url:"{{$url_get_data}}",
                    type:"get"
                }
   });

    
} );

    </script>


  <script type="text/javascript">


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
                $.ajax({
           type: "POST",
           url: url,
           data: form.serialize(), // serializes the form's elements.
           success: function(data)
           {
//               alert(data.error); // show response from the php script.
window.location.replace("{{ URL('/sent') }}");
           }
         });
           }else{
            alert ('กรุณาเลือก รายการที่ต้องการส่ง');
            e.preventDefault();  // avoid to execute the actual submit of the form.
        }
             e.preventDefault();  // avoid to execute the actual submit of the form.
});

$("#sent_control_code select[id=department_id]").change(function(){
       var department_id = $("#sent_control_code select[id=department_id]").val();
       
       if(department_id == 0){
           $("#DOCUMENT_NUMBER").blur();
       }else{
        $("#DOCUMENT_NUMBER").focus();
    }

});

$("#sent_control_code").submit(function(e) {
    var form = $(this);
    var url = form.attr('action');
   var department_id = $("#sent_control_code select[id=department_id]").val();
   var i=0;
if(department_id == 0){
 alert ('กรุณาเลือก หน่วยงานที่จะส่งต่อ');
 e.preventDefault();  // avoid to execute the actual submit of the form.       
}else{
              $.ajax({
           type: "POST",
           url: url,
          dataType: "json",
           data: form.serialize(), // serializes the form's elements.
           success: function(response, status, xhr)
           { 
                  if (response.error == true) {
//                      alert("เอกสารนี้นำส่งแล้ว");
                var html= "<span class='icon text-white-50'><i class='fas fa-exclamation-triangle'></i></span><span class='text'>เอกสารนี้นำส่งแล้ว</span>";
                $("#message_save").html(html) ;
                     $("#message_save").attr('class', "btn btn-warning btn-icon-split");

                } else {
                   var html= "<span class='icon text-white-50'><i class='fas fa-check'></i></span><span class='text'>บันทึกสำเร็จ</span>";
                $("#message_save").html(html) ;
                     $("#message_save").attr('class', "btn btn-success btn-icon-split");
                }
           }
         });
           
}
 e.preventDefault();  // avoid to execute the actual submit of the form.       

});

  </script>




@endsection