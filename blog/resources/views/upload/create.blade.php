@extends('template')

@section('title', 'Table of Document')
@section('content')
<form id="modalUploadForm"  method="POST" enctype="multipart/form-data">
  {{ csrf_field() }}
  {{ method_field('POST') }}
  <input type="file" name="image" id="image" >
  <button type="submit">Submit</button>  
</form>

<script>
$("#modalUploadForm").submit(function(e) {
    alert ('กรุณาเลือก หน่วยงานที่จะส่งต่อ');
    var formData = new FormData(this);

    $.ajax({
        url: '{{ url('/example') }}',
        type: 'POST',
        data: formData,
        success: function (data) {
            alert(data)
        },
        cache: false,
        contentType: false,
        processData: false
    });

});
    </script>
    
    
@endsection