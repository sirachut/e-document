<!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
    เพิ่มรายการเอกสาร
</button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">เพิ่มรายการเอกสาร</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>บันทึกข้อความ</h2>
                    </div>
                </div>
            </div>

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

            <form action="{{ route('documents.store') }}" method="POST">
                @csrf

                <form>
                        <div class="form-row">
                            <div class="form-group col-md-7">
                                    <label for="FACULTY_ID">หน่วยงาน</label>
                                    <input type="number" name="FACULTY_ID" class="form-control" placeholder="ระบุหน่วยงาน">
                                    {{-- <label for="FACULTY_NAME_TH">หน่วยงาน</label> --}}

                            {{-- <select class="form-control">
                                <option selected>กรุณาเลือกหน่วยงาน...</option>
                                    @foreach($Faculty as $key => $value)
                                <option value="$value->FACULTY_ID">{{ $value->FACULTY_NAME_TH }}</option>
                                    @endforeach
                            </select> --}}

                            </div>
                            <div class="form-group col-md-3">
                                <label for="FACULTY_DEPARTMENT">ฝ่ายงาน</label>
                                <input type="text" name="FACULTY_DEPARTMENT" class="form-control" placeholder="ฝ่ายงานของหน่วยงาน">

                            </div>
                            <div class="form-group col-md-2">
                                <label for="FACULTY_TEL">โทร.</label>
                                <input type="text" name="FACULTY_TEL" class="form-control" placeholder="xxxx" maxlength="4">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="DOCUMENT_ST_NUMBER">เลขที่ ศธ.</label>
                                <input type="text" class="form-control" name="DOCUMENT_ST_NUMBER" placeholder="ตัวอย่าง 0590.15/0839">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="DATEIN">วันที่</label>
                                <input id="DATEIN" name="DATEIN" class="form-control" value="เพิ่มวันที่ เป็นวันนี้อัตโนมัติ">
                                <script>
                                    $('#DOCUMENT_DATEIN').datepicker({
                                        uiLibrary: 'bootstrap4',
                                    });
                                </script>

                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="DOCUMENT_NAME">เรื่อง</label>
                                {{-- <input type="textarea" class="form-control" name="DOCUMENT_NAME"> --}}
                                <textarea class="form-control" name="DOCUMENT_NAME" cols="" rows="5"></textarea>
                            </div>

                        </div>
                        <div class="form-group">
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="DOCUMENT_PRIORITY" name="DOCUMENT_PRIORITY" >
                            <label class="form-check-label" for="gridCheck">
                              เอกสารด่วน
                            </label>
                          </div>
                        </div>
                        <button type="submit" class="btn btn-primary" style="float:right">บันทึกข้อความ</button>
                      </form>

                 {{-- <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>DOCUMENT_PRIORITY:</strong>
                            <input type="text" name="DOCUMENT_PRIORITY" class="form-control" placeholder="DOCUMENT_PRIORITY">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>DOCUMENT_ST_NUMBER:</strong>
                            <input type="text" name="DOCUMENT_ST_NUMBER" class="form-control" placeholder="DOCUMENT_ST_NUMBER">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>DOCUMENT_NAME:</strong>
                            <input type="text" name="DOCUMENT_NAME" class="form-control" placeholder="DOCUMENT_NAME">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>FACULTY_ID:</strong>
                            <input type="number" name="FACULTY_ID" class="form-control" placeholder="FACULTY_ID">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>FACULTY_DEPRATMENT:</strong>
                            <input type="text" name="FACULTY_DEPRATMENT" class="form-control" placeholder="FACULTY_DEPRATMENT">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>FACULTY_TEL:</strong>
                            <input type="text" name="FACULTY_TEL" class="form-control" placeholder="FACULTY_TEL">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>DOCUMENT_NUMBER:</strong>
                            <input type="text" name="DOCUMENT_NUMBER" class="form-control" placeholder="DOCUMENT_NUMBER">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>DOCUMENT_TO:</strong>
                            <input type="text" name="DOCUMENT_TO" class="form-control" placeholder="DOCUMENT_TO">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>DOCUMENT_NOTATION:</strong>
                            <input type="text" name="DOCUMENT_NOTATION" class="form-control" placeholder="DOCUMENT_NOTATION">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div> --}}

            </form>
        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
          <button type="button" class="btn btn-primary">บันทึกข้อความ</button>
        </div> --}}
      </div>
    </div>
  </div>
