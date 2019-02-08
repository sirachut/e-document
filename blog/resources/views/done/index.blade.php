@extends('template')

@section('content')



<div class="table-responsive-lg table-hover container " style="margin-top: 70px">
    <div><?php 
//    dd(Session::get('gid'));
    $gid= Session::get('gid');
    $gid = $gid['gid'];
//    echo ($get_gid);
    if($gid == 10 || $get_gid == 10 ){
        $url_sent_department= URL('/director');        
    }else{
        $url_sent_department= URL('/done'); 
    }
    
    ?></div>

 
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
  </script>




@endsection