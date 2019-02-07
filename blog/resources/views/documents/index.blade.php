@extends('documents.app')

@section('title', 'Table of Document')

@section('content')




<!-- Modal -->
{{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel"> <i class="fas fa-plus-square"></i> &nbsp; เพิ่มบันทึกข้อความ</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

            </div>

            <div class="modal-body">

                <form class="form-horizontal" method="POST" action="{{ URL('/document') }}">
                    <!-- if there are creation errors, they will show here -->
                    @if($errors->all())
                        <ul class="has-error">
                    @foreach ($errors->all() as $message)
                            <li>{{ $message }}</li>
                    @endforeach
                        </ul>
                    @endif

                    {{ csrf_field() }} --}}

                    <!-- Material input -->

{{--
                    <form>
                            <div class="form-row">
                                <div class="form-group col-md-7">
                                    <label for="FACULTY_NAME_TH">หน่วยงาน</label>

                    <select class="form-control">
                            <option selected>กรุณาเลือกหน่วยงาน...</option>

                                    @foreach($Faculty as $key => $value)
                                        <option>{{ $value->FACULTY_NAME_TH }}</option>
                                    @endforeach
                                    </select>

                                </div>
                                <div class="form-group col-md-3">
                                    <label for="faculty_department">ฝ่ายงาน</label>
                                    <input type="text" class="form-control" id="faculty_department" placeholder="ฝ่ายงานของหน่วยงาน">
                                </div>
                                <div class="form-group col-md-2">
                                    <label for="faculty_tel">โทร.</label>
                                    <input type="text" class="form-control" id="faculty_tel" placeholder="xxxx" maxlength="4">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="DOCUMENT_ST_NUMBER">ที่</label>
                                    <input type="text" class="form-control" id="DOCUMENT_ST_NUMBER" placeholder="เลขที่ ศธ.">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="DOCUMENT_DATEIN">วันที่</label>

                                    <input id="DOCUMENT_DATEIN" class="form-control">
                                    <script>
                                        $('#DOCUMENT_DATEIN').datepicker({
                                            uiLibrary: 'bootstrap4',
                                        });
                                    </script>

                                </div>
                            </div>
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="DOCUMENT_NAME">เรื่อง</label>
                                <input type="text" class="form-control" id="DOCUMENT_NAME">
                              </div>
                              <div class="form-group col-md-4">
                                <label for="inputState">State</label>
                                <select id="inputState" class="form-control">
                                  <option selected>Choose...</option>
                                  <option>...</option>
                                </select>
                              </div>
                            </div>
                            <div class="form-group">
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck">
                                <label class="form-check-label" for="gridCheck">
                                  Check me out
                                </label>
                              </div>
                            </div>
                            <button type="submit" class="btn btn-primary" style="float:right">Sign in</button>
                          </form> --}}


                    {{-- <div class="form-group{{ $errors->has('DOCUMENT_NUMBER') ? ' has-error' : '' }}">
                        <label for="title" class="col-md-4 control-label">เลข Barcode* : </label>
                        <!-- Material input -->

                        <div class="col-md-6">

                            <input id="DOCUMENT_NUMBER" type="text" class="form-control" name="DOCUMENT_NUMBER" value="{{ old('DOCUMENT_NUMBER') }}" required autofocus>

                            @if ($errors->has('title'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('DOCUMENT_NUMBER') }}</strong>
                                </span>
                            @endif

                        </div>

                    </div>

                    <div class="form-group{{ $errors->has('DOCUMENT_PRIORITY') ? ' has-error' : '' }}">
                        <label for="title" class="col-md-4 control-label">ประเภทเอกสาร* : </label>

                        <div class="col-md-6">
                            <input id="DOCUMENT_PRIORITY" type="text" class="form-control" name="DOCUMENT_PRIORITY" value="{{ old('DOCUMENT_PRIORITY') }}" required autofocus>

                            @if ($errors->has('title'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('DOCUMENT_PRIORITY') }}</strong>
                                </span>
                            @endif

                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('DOCUMENT_ST_NUMBER') ? ' has-error' : '' }}">
                        <label for="content" class="col-md-4 control-label">เลขที่ ศธ.  *</label>

                        <div class="col-md-6">
                            <input id="DOCUMENT_ST_NUMBER" type="text" class="form-control" name="DOCUMENT_ST_NUMBER" value="{{ old('DOCUMENT_PRIORITY') }}" required autofocus>
                            @if ($errors->has('DOCUMENT_ST_NUMBER'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('DOCUMENT_ST_NUMBER') }}</strong>
                                </span>
                            @endif
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                สร้าง
                            </button>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>

        </div>
    </div>
</div> --}}

{{-- <div>
    @php
        $userdata = Session::get('userdata');
        echo $userdata['username'];
    @endphp
</div> --}}

@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
@endif

<div class="table-responsive-lg table-hover container " style="margin-top: 70px">

    <div class="row">
        <div>
            <h1 style="line-height: 0.7;">ตารางแสดงรายการบันทึกข้อความ &nbsp;</h1>
        </div>

        <div>
            <a class="btn btn-success" href="{{ route('documents.create') }}"> Create New Product</a>

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

    } );
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
