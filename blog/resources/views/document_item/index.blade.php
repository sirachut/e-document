@extends('documents.app')

@section('title', 'Table of Document')

@section('content')




<div class="table-responsive-lg table-hover container " style="margin-top: 70px">   </div>

 
    <table class="table table-bordered" id="table" style="width:100%">
  
        <tbody>
            @foreach($Document as $key => $value)
    <tr>
      <th scope="row">เลขคุมเอกสาร</th>  <td>{{ $value->DOCUMENT_NUMBER }}</td>  <th scope="row">สถานะ</th>  <td>....</td>
    </tr>
        <tr>
      <th scope="row">วันที่รับเข้าระบบ</th>  <td>{{ $value->DATE_IN }}</td>  <th scope="row">เลข ศธ.</th>  <td>{{ $value->DOCUMENT_ST_NUMBER }}</td>
    </tr>
    
        <tr>
      <th scope="row">เรื่อง</th>  <td>{{ $value->DOCUMENT_NAME }}</td>  <th scope="row">หน่วยงาน</th>  <td>{{ $value->FACULTY_NAME_TH }}</td>
    </tr>
    
     <tr>
      <th scope="row">เรียน</th>  <td>{{ $value->DOCUMENT_TO }}</td>  
    </tr>
            <?php 
            $i=1;
            ?>
         
        </tbody>
        @endforeach
      </table>
<div class="table-responsive-lg table-hover container " style="margin-top: 70px">   </div>

<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">เส้นทางบันทึกข้อความ</th>
      <th scope="col">วันที่รับ</th>
      <th scope="col">วันที่ส่ง/ดำเนินการ</th>
      <th scope="col">สถานะ</th>
      <th scope="col">ผู้ทำรายการ</th>
       <th scope="col">รายละเอียด</th>
    </tr>
  </thead>
  <tbody>
      @foreach($Document_item as $key => $value)
    <tr>
      <td>{{ $value->DEPARTMENT_NAME }}</td>
      <td>{{ $value->ITEM_DATE_IN }}</td>
      <td>{{ $value->ITEM_DATE_OUT }}</td>
      <td><?php
      if($value->CKT == 'T'){
          echo '<img src="'. url('/images/true.png').  '"' . ' ">';
      }
     ?></td>
      <td>{{ $value->ITEM_LAST_USER }}</td>
      <td>{{ $value->DETAIL }}</td>
    </tr>
    @endforeach
  </tbody>
</table>


  <script>

  </script>




@endsection