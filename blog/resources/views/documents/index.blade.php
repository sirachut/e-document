@extends('documents.app')

@section('title', 'Table of Document')

@section('content')

@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
@endif

<div class="table-responsive-lg table-hover container " style="margin-top: 70px;padding-bottom:100px">

    <div class="row">
        <div>
            <h1 style="line-height: 0.7;">ตารางแสดงรายการบันทึกข้อความ &nbsp;</h1>
        </div>

        <div>

            @include('documents.create')

        </div>
    </div>


        <table class="table" id="table">
            <thead>
                <tr >
                    <th>#</th>
                    <th>เลขที่ ศธ.</th>
                    <th>หัวรื่อง</th>
                    <th>วันที่รับเข้า</th>
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

                @php
                    $i=1;
                @endphp

                @foreach($documents as $key => $value)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $value->DOCUMENT_ST_NUMBER }}</td>
                        <td style="width: 40%">{{ $value->DOCUMENT_NAME }}</td>
                        <td>
                            @php
                                echo App\Http\Controllers\DocumentController::DateThai($value->DATE_IN);
                            @endphp
                        </td>
                        <td>

                            <form class="form-horizontal" method="POST" action="{{ route('documents.destroy',$value->DOCUMENT_ID) }}">

                                <a class="btn btn-xs btn-success" href="{{ route('documents.show',$value->DOCUMENT_ID) }}">Show</a>

                                <a class="btn btn-xs btn-success" href="{{ URL::to('documentitem/' . $value->DOCUMENT_ID) }}">Show 2</a>

                                <a class="btn btn-xs btn-info" href="{{ route('documents.edit',$value->DOCUMENT_ID) }}">Edit</a>

                                @csrf
                                @method('DELETE')

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
        $('#table').DataTable( {
            "bFilter" : false,
            "bLengthChange": false,
            "searching": true,

        });
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


@endsection
