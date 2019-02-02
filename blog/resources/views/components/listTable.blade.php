
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
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

                            <div class="form-group{{ $errors->has('DOCUMENT_NUMBER') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">เลข Barcode* : </label>

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
</div>

<div class="table-responsive-lg table-hover container " style="margin-top: 70px">

    <table class="table table-borderless">

        <caption>List of document</caption>
        <div>
          <div class="row">
            <div class="col-sm-2">
                <h4>รายการเอกสาร</h4>
            </div>
            <div class="col-sm-10">
                <form class="form-inline my-2 my-lg-0">
                  <input class="form-control mr-sm-2" type="search" placeholder="ค้นหาเอกสาร" aria-label="Search">
                </form>
            </div>
            <div class="col-sm-1"></div>
          </div>
        </div>

        <hr>
   <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
เพิ่มรายการ
</button>
        <thead>
          <tr >
            <th class="col-md-1 th-grid">#</th>
            <th class="col-md-1 th-grid">เลขที่ ศธ.</th>
            <th class="col-md-3 th-grid long" class="text-nowrap">เรื่อง</th>
            <th class="col-md-3 th-grid">เลขที่รับส่ง</th>
            <th class="col-md-4 th-grid"></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="td-grid">doc_id</td>
            <td class="td-grid">doc_priority</td>
            <td class="td-grid sub_str">ขอส่งคำสั่งคณะเทคโนโลยีสารสนเทศและการสื่อสาร ที่ ๐๕๐/๒๕๖๐ เรื่องแต่งตั้งอาจารย์ที่ปรึกษานิสิต ประจำปี ๒๕๖๐ เพื่อบัน</td>
            <td class="td-grid">doc_number</td>
            <td><button type="button" class="btn btn-warning" style="color:white;">เพิ่มเติม</button></td>
          </tr>
        </tbody>
      </table>
  </div>

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

  <script>

  </script>

