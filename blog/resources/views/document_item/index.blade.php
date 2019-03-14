@extends('template')

@section('title', 'Table of Document')

@section('content')


 <style>





 </style>

    <div class="card-header tab-card-header">
          <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link" id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="One" aria-selected="true">รายละเอียด</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="two-tab" data-toggle="tab" href="#two" role="tab" aria-controls="Two" aria-selected="false">ไฟล์แนบ</a>
            </li>
          
          </ul>
        </div>

        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active p-3" id="one" role="tabpanel" aria-labelledby="one-tab">              
      
            @foreach($Document as $key => $value)
   <div class="row">
        <div class="col-md-6">
         <div class="card border-success flex-md-row mb-4 shadow-sm h-md-250">
            <div class="card-body d-flex flex-column align-items-start" >
                <strong class="d-inline-block mb-2 text-success" style="font-size:1.5rem;">บันทึกข้อความ</strong>
               <h6 class="mb-0">
                <strong class="d-inline-block mb-2 text-success">หน่วยงาน: </strong> {{ get_faculty($value->FACULTY_ID) }} <strong class="d-inline-block mb-2 text-success">โทร: </strong> {{$value->FACULTY_TEL}} 
               </h6>
                <h6 class="mb-0">
                <strong class="d-inline-block mb-2 text-success">ที่: </strong>  {{ $value->DOCUMENT_ST_NUMBER }} <strong class="d-inline-block mb-2 text-success">วันที่: </strong> {{$value->DATE_IN}} 
               </h6>
                 <h6 class="mb-0">
                <strong class="d-inline-block mb-2 text-success">เรื่อง: </strong>  {{ $value->DOCUMENT_NAME }}
               </h6>
                 <h6 class="mb-0">
                <strong class="d-inline-block mb-2 text-success">เรียน: </strong>  {{ get_document_to($value->DOCUMENT_TO) }}
               </h6>
            </div>
           
         </div>
      </div>
      <div class="col-md-6">
         <div class="card border-primary flex-md-row mb-4 shadow-sm h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
                 <strong class="d-inline-block mb-2 text-primary" style="font-size:1.5rem;">สถานะบันทึกข้อความ</strong>
            <h6 class="mb-0">
                <strong class="d-inline-block mb-2 text-primary">Control Code: </strong> {{ $value->DOCUMENT_NUMBER }} <strong class="d-inline-block mb-2 text-primary">ประเภท: </strong> {{get_document_notation($value->DOCUMENT_NOTATION)}} 
               </h6>
                <h6 class="mb-0">
                <strong class="d-inline-block mb-2 text-primary">วันที่สร้าง: </strong>  {{ $value->CREATE_DATE }} <strong class="d-inline-block mb-2 text-primary">ผู้สร้างข้อมูล: </strong> {{$value->CREATE_USER}} 
               </h6>
                <h6 class="mb-0">
                <strong class="d-inline-block mb-2 text-primary">วันที่แก้ไขล่าสุด: </strong>  {{ $value->LAST_DATE }} <strong class="d-inline-block mb-2 text-primary">ผู้แก้ไขล่าสุด: </strong> {{$value->LAST_USER}} 
               </h6>
                 <h6 class="mb-0">
                <strong class="d-inline-block mb-2 text-primary">สถานะเอกสาร: </strong>  {{  get_document_status($value->DOCUMENT_STATUS) }}
               </h6>
            </div>
         
         </div>
      </div>
     
   </div>

        @endforeach

         
<div class="table-responsive-lg table-hover container " style="margin-top: 70px">   </div>

       <div class="container">
            <h4 class="text-primary">เส้นทางบันทึกข้อความ</h4>
            <div class="row">
                <div class="col-md-12">
                    
                    <div class="main-timeline11">
                        <?php $i=1; ?>
                        @foreach($Document_item as $key => $value)
  <div class="timeline">
     
        <a href="#" class="timeline-content cc-{{$value->DEPARTMENT_ID}}">
              <span class="year">{{$i++}}</span>
               <div class="inner-content">
                                    <h3 class="title text-{{$value->DEPARTMENT_ID}}">{{ $value->DEPARTMENT_NAME }} </h3>
                                    <p class="description">
                                       <table>
 <tbody>
    <tr>
        <td><div class="float-right ">วันที่รับ : </div></td> <td scope="col">{{ $value->ITEM_DATE_IN }}</td>
   </tr>
     <tr>
      <td><div class="float-right">วันที่ส่ง : </div></td> <td scope="col"> {{ $value->ITEM_DATE_OUT }}</td>
   </tr>
 <tr>
        <td><div class="float-right ">ผู้รับ : </div></td> <td scope="col">{{ $value->RECEIVE_USER }}</td>
   </tr>
     <tr>
      <td><div class="float-right">ผู้ส่ง : </div></td> <td scope="col"> {{ $value->SENT_USER }}</td>
   </tr>
  
       <tr>
      <td><div class="float-right">ทำรายการล่าสุด : </div></td> <td scope="col"> {{ $value->ITEM_LAST_DATE }}</td>
   </tr>
        <tr>
      <td><div class="float-right">ผู้ทำรายล่าสุด : </div></td> <td scope="col"> {{ $value->ITEM_LAST_USER }}</td>
   </tr>
   
        <tr>
      <td><div class="float-right">รายละเอียด : </div></td> <td scope="col"> {{ $value->DETAIL }}</td>
   </tr>
      <tr>
      <td><div class="float-right">สถานะ : </div></td> <td scope="col"> {{ $value->STATUS_NAME }} <?php  if($value->CKT == 'T'){ echo '<img src="'. url('/images/true.png').  '"' . ' ">';}?>  </td>
   </tr>

    
 </tbody>

</table>  
                                       
                                    </p>
                                </div>
   
         </a>
    </div>
    @endforeach
                        
                         
                    </div>
                          
                </div>
            </div>
        </div>       
          </div>
         
          <div class="tab-pane fade p-3" id="two" role="tabpanel" aria-labelledby="two-tab">
                       <div class="card-body">

                       <div class="table-responsive">
                                <div class="card-header py-3"> <h6 class="m-0 font-weight-bold text-primary">ไฟล์แนบ</h6></div>
   
    <table class="table table-bordered" id="table" width="100%" cellspacing="0">

    
        <thead>
          <tr >
           
            <th>ลำดับ</th>
            <th>ไฟล์</th>
            <th>เรียกดู</th>
          </tr>
        </thead>

      </table>
                
              </div>
            </div>      
          </div>
   

        </div>





<?php
$url_get_data= URL('/attachmentlist/'.$id);
?>
  <script>
      
 var url_get_data = "{{$url_get_data}}";
   fill_datatable();



      function fill_datatable(data = '')
  {
  var table = $('#table').DataTable({searching: false,
       "columnDefs": [
    {"targets": 0, "width": "2.5%",   "className": "text-center", },
    {"targets": 1, "width": "15%",   "className": "text-center", },
    {"targets": 2, "width": "15%",   "className": "text-center", },
    
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

  </script>




@endsection