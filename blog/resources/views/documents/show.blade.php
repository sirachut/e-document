@extends('documents.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-sm-6">
       <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left"> <br>
                <h2 style="text-align:center">บันทึกข้อความ</h2>

            </div>

        </div>
    </div>
<br>
    <div class="row">
        <div class="col-sm-6 form-group">
                <strong>หน่วยงาน</strong>
                {{ $document->FACULTY_ID }}
        </div>
        <div class="col-sm-6 form-group">
                <strong>โทร.</strong>
                {{ $document->FACULTY_TEL }}
        </div>

        <div class="col-sm-6 form-group">
                <strong>ที่</strong>
                {{ $document->DOCUMENT_ST_NUMBER }}
        </div>
        <div class="col-sm-6 form-group">
                <strong>วันที่</strong>
                @php
                    echo App\Http\Controllers\DocumentController::DateThai($document->DATE_IN);
                @endphp
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>เรื่อง</strong>
                {{ $document->DOCUMENT_NAME }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>เรียน</strong>
                {{ $document->DOCUMENT_TO }}
            </div>
        </div>

    </div>
        </div>
        <div class="col-sm-6">
                <div class="mt-5 mb-5">
                        <div class="row">
                            <div>
                                <h4>Latest News</h4>
                                <ul class="timeline">
                                    <li>
                                        <a target="_blank" href="https://www.totoprayogo.com/#">New Web Design</a>
                                        <a href="#" class="float-right">21 March, 2014</a>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque scelerisque diam non nisi semper, et elementum lorem ornare. Maecenas placerat facilisis mollis. Duis sagittis ligula in sodales vehicula....</p>
                                    </li>
                                    <li>
                                        <a href="#">21 000 Job Seekers</a>
                                        <a href="#" class="float-right">4 March, 2014</a>
                                        <p>Curabitur purus sem, malesuada eu luctus eget, suscipit sed turpis. Nam pellentesque felis vitae justo accumsan, sed semper nisi sollicitudin...</p>
                                    </li>
                                    <li>
                                        <a href="#">Awesome Employers</a>
                                        <a href="#" class="float-right">1 April, 2014</a>
                                        <p>Fusce ullamcorper ligula sit amet quam accumsan aliquet. Sed nulla odio, tincidunt vitae nunc vitae, mollis pharetra velit. Sed nec tempor nibh...</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
        </div>
    </div>
</div>

<style>
    ul.timeline {
    list-style-type: none;
    position: relative;
}
ul.timeline:before {
    content: ' ';
    background: #d4d9df;
    display: inline-block;
    position: absolute;
    left: 29px;
    width: 2px;
    height: 100%;
    z-index: 400;
}
ul.timeline > li {
    margin: 20px 0;
    padding-left: 20px;
}
ul.timeline > li:before {
    content: ' ';
    background: white;
    display: inline-block;
    position: absolute;
    border-radius: 50%;
    border: 3px solid #22c0e8;
    left: 20px;
    width: 20px;
    height: 20px;
    z-index: 400;
}
</style>

@endsection
