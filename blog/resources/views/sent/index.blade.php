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
    }else{
        $url_sent_department= URL('/sent_item'); 
        $url_sent_department_control_code= URL('/sentitemcontrolcode'); 
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
                                <span id="message_save"></span>
                    
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
<div class="table-responsive-lg table-hover container " style="margin-top: 70px">


 
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
                                <input id="DETAIL" type="text" class="form-control" name="DETAIL"  required autofocus>
         
                            </div>
                        <?php } ?>
                        
<input type="hidden" id="hidden_document_item_id" name="hidden_document_item_id" value="">
<label for="title" class="col-md-4 control-label"></label>
<div class="col-md-6">
   <button type="submit" class="btn btn-primary btn-sm" id="btn_search">ส่งต่อ</button>
   <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">ส่งต่อ(control code)</button>
</div>
                    </form>
    <table class="table" id="table" style="width:100%">

    
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
            <th>ac</th>
          </tr>
        </thead>
        <tbody>

            <?php 
            $i=1;
            ?>
            	@foreach($Document as $key => $value)
					<tr>   
                                            <td><input type="checkbox" class="select_document" name="select_document[]" value="{{$value->DOCUMENT_ITEM_ID}}_{{$value->DOCUMENT_ID}}"></td>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $value->FACULTY_ID }}</td>
						 <td>{{ $value->DOCUMENT_ST_NUMBER }}</td>
                                                 <td>{{ $value->DOCUMENT_NAME }}</td>
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
                
//               alert(data); // show response from the php script.
window.location.replace("{{ URL('/sent') }}");
           }
         });
           }else{
            alert ('กรุณาเลือก รายการที่ต้องการส่ง');
            e.preventDefault();  // avoid to execute the actual submit of the form.
        }
//             e.preventDefault();  // avoid to execute the actual submit of the form.
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
           data: form.serialize(), // serializes the form's elements.
           success: function(response, status, xhr)
           {
                var mes = response.error_text;
                  if (response.error) {
                $("#message_save").text("เอกสารนี้นำส่งแล้ว") ;
                $("#message_save").attr('class', 'label warning');

                } else {
                    $("#message_save").text("บันทึกสำเร็จ");
                     $("#message_save").attr('class', "label success");
                }
           }
         });
           
}
 e.preventDefault();  // avoid to execute the actual submit of the form.       

});

  </script>




@endsection