@extends('documents.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Documents</h2>
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

    <form action="{{ route('documents.update',$document->DOCUMENT_ID) }}" method="POST">
        @csrf
        @method('PUT')

         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>DOCUMENT_PRIORITY:</strong>
                    <input type="text" name="DOCUMENT_PRIORITY" value="{{ $document->DOCUMENT_PRIORITY }}" class="form-control" placeholder="DOCUMENT_PRIORITY">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>DOCUMENT_ST_NUMBER:</strong>
                    <input type="text" name="DOCUMENT_ST_NUMBER" value="{{ $document->DOCUMENT_ST_NUMBER }}" class="form-control" placeholder="DOCUMENT_ST_NUMBER">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>DOCUMENT_NAME:</strong>
                    <input type="text" name="DOCUMENT_NAME" value="{{ $document->DOCUMENT_NAME }}" class="form-control" placeholder="DOCUMENT_NAME">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>FACULTY_ID:</strong>
                    <input type="int" name="FACULTY_ID" value="{{ $document->FACULTY_ID }}" class="form-control" placeholder="FACULTY_ID">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>FACULTY_DEPRATMENT:</strong>
                    <input type="text" name="FACULTY_DEPRATMENT" value="{{ $document->FACULTY_DEPRATMENT }}" class="form-control" placeholder="FACULTY_DEPRATMENT">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>FACULTY_TEL:</strong>
                    <input type="text" name="FACULTY_TEL" value="{{ $document->FACULTY_TEL }}" class="form-control" placeholder="FACULTY_TEL">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>DOCUMENT_NUMBER:</strong>
                    <input type="text" name="DOCUMENT_NUMBER" value="{{ $document->DOCUMENT_NUMBER }}" class="form-control" placeholder="DOCUMENT_NUMBER">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>DOCUMENT_TO:</strong>
                    <input type="text" name="DOCUMENT_TO" value="{{ $document->DOCUMENT_TO }}" class="form-control" placeholder="DOCUMENT_TO">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>DOCUMENT_NOTATION:</strong>
                    <input type="text" name="DOCUMENT_NOTATION" value="{{ $document->DOCUMENT_NOTATION }}" class="form-control" placeholder="DOCUMENT_NOTATION">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection
