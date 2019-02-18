@extends('documents.app')

@section('title', 'Table of Document')

@section('content')




<div class="table-responsive-lg table-hover container " style="margin-top: 70px">
    <div><?php 
    ?></div>

 
    <form id="receive_item" action="{{ URL('/receive_item') }}" class="form-horizontal" >
        
               
			
				
                        {{ csrf_field() }}

<input type="hidden" id="hidden_document_item_id" name="hidden_document_item_id" value="">

   <button type="submit" class="btn btn-primary btn-sm" id="btn_search">
รับเอกสาร
</button>
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
  

  <script type="text/javascript">


$("#receive_item").submit(function(e) {


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
        if(document_id != ''){
            $('#hidden_document_item_id').val(document_id);
                $.ajax({
           type: "POST",
           url: url,
           data: form.serialize(), // serializes the form's elements.
           success: function(data)
           {
//               alert(data); // show response from the php script.
//window.location.replace("{{ URL('/receive') }}");
           }
         });
           }else{
            alert ('กรุณาเลือก รายการที่ต้องการรับ');
            e.preventDefault();  // avoid to execute the actual submit of the form.
        }
            
});
  </script>




@endsection