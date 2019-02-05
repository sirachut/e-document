@extends('documents.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Documents</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('documents.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>DOCUMENT_PRIORITY:</strong>
                {{ $document->DOCUMENT_PRIORITY }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>DOCUMENT_ST_NUMBER:</strong>
                {{ $document->DOCUMENT_ST_NUMBER }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>DOCUMENT_NAME:</strong>
                {{ $document->DOCUMENT_NAME }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>FACULTY_ID:</strong>
                {{ $document->FACULTY_ID }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>FACULTY_DEPRATMENT:</strong>
                {{ $document->FACULTY_DEPRATMENT }}
            </div>
        </div><div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>FACULTY_TEL:</strong>
                {{ $document->FACULTY_TEL }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>DOCUMENT_NUMBER:</strong>
                {{ $document->DOCUMENT_NUMBER }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>DOCUMENT_TO:</strong>
                {{ $document->DOCUMENT_TO }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>DOCUMENT_NOTATION:</strong>
                {{ $document->DOCUMENT_NOTATION }}
            </div>
        </div>

    </div>
@endsection
