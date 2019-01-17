
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="description" content="">
    <meta name="author" content="">
 
    <title> {{ config('app.name', 'Laravel') }}</title>
	<!-- Bootstrap Core CSS -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	</head>
	<body>
		 <div class="container">
  <div class="row page-header">
	 <div class="col-xs-12 col-md-8 col-lg-8">
		 <h1>Show Record : {{ $user->USERNAME }}</h1>
	 </div>
	 <div class="col-xs-12 col-md-4 col-lg-4">
		 <div class="btn-group pull-right" role="group" aria-label="..." >
			  <a href="{{ url()->previous() }}" class="btn btn-default "> Back</a>
		 </div>
	 </div>
</div>

 
 
 <div class="row">
 	<label  class="col-sm-2">DISPLAY_NAME</label>
	<div class="col-sm-10">{{ $user->DISPLAY_NAME }}</div>
</div>
 <div class="row">
 	<label  class="col-sm-2">MOBILE</label>
	<div class="col-sm-10">{{ $user->MOBILE }}</div>
</div>

</div>
</body>
</html>