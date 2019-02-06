<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Launch demo modal
  </button>

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
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Create Documents</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('documents.index') }}"> Back</a>
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

                 <div class="row">
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
