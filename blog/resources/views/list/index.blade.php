@extends('layouts.app')

@section('title', 'Table of Document')

@section('content')

<style>
    table{

    }
</style>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                    {{ csrf_field() }}

                    <!-- Material input -->


                    <form>
                            <div class="form-row">
                                <div class="form-group col-md-7">
                                    <label for="FACULTY_NAME_TH">หน่วยงาน</label>

                    <select class="form-control">
                            <option selected>กรุณาเลือกหน่วยงาน...</option>

                            @foreach($Faculty as $key => $value)

                                        {{-- <option>คณะเทคโนโลยีสารสนเทศและการสื่อสาร</option> --}}
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
                          </form>


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
                    </div> --}}

                </form>
            </div>
{{--
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> --}}

        </div>
    </div>
</div>

<div class="table-responsive-lg table-hover container " style="margin-top: 70px">
    <div>
        <?php
            $userdata = Session::get('userdata');
            echo $userdata['username'];
        ?>
    </div>

    <form>

        <table class="table" id="table" style="width:100%">


                <div>
                            <div class="row">

                            <div class="col-sm-7">
                                <h1 style="line-height: 0.7;">ตารางแสดงรายการบันทึกข้อความ</h1>
                            </div>

                            <div class="col-sm-5">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"> <i class="fas fa-plus-square"></i> &nbsp; เพิ่มรายการ</button>
                            </div>

                        </div>
                    </div>
            <thead>
                <tr >
                    <th>#</th>
                    {{-- <th>คณะ/หน่วยงาน</th> --}}
                    <th>เลขที่ ศธ.</th>
                    <th>หัวรื่อง</th>
                    <th>วันที่รับเข้า</th>
                    {{-- <th>เรียน</th> --}}
                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
            <!--          <tr>
                <td class="td-grid">doc_id</td>
                <td class="td-grid">doc_priority</td>
                <td class="td-grid sub_str">ขอส่งคำสั่งคณะเทคโนโลยีสารสนเทศและการสื่อสาร ที่ ๐๕๐/๒๕๖๐ เรื่องแต่งตั้งอาจารย์ที่ปรึกษานิสิต ประจำปี ๒๕๖๐ เพื่อบัน</td>
                <td class="td-grid">doc_number</td>
                <td><button type="button" class="btn btn-warning" style="color:white;">เพิ่มเติม</button></td>
                </tr>-->

                <?php
                    $i=1;
                ?>

                @foreach($Document as $key => $value)
                    <tr>
                        <td>{{ $i++ }}</td>
                        {{-- <td>{{ $value->FACULTY_ID }}</td> --}}
                        <td>{{ $value->DOCUMENT_ST_NUMBER }}</td>
                        <td style="width: 40%">{{ $value->DOCUMENT_NAME }}</td>
                        {{-- <td>{{  strftime("%d %b %Y",strtotime($value->DATE_IN)) }}</td> --}}
                        <td>
                                @php
                                    echo App\Http\Controllers\DocumentController::DateThai($value->DATE_IN);
                                @endphp
                        </td>
                        {{-- <td>{{ $value->DOCUMENT_TO }}</td> --}}
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
    </form>
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
