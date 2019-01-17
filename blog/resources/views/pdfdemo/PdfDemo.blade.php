<!DOCTYPE html>
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
<style type="text/css">
	h3.center-text {
	    text-align: center;
	}
</style>
<div class="container">
	<h3 class="center-text">Generate a PDF using TCPDF in laravel - Learn Infinity</h3>
 
	<div class="row">
		<div class="col-md-offset-2 col-md-8">
			<br/> <br/> <br/> <br/>
			<table cellspacing="3" cellpadding="5" width="100%">
				<tr>
					<td width="25%">
						<div class="form-group">
							<a href="{{ route('SamplePDF') }}" class="btn btn-primary">Generate Sample PDF</a>
						</div>
					</td>
 
					<td width="25%">
						<div class="form-group">
							<a href="{{ route('SavePDF') }}" class="btn btn-primary">Save Sample PDF</a>
						</div>
					</td>
 
					<td width="25%">
						<div class="form-group">
							<a href="{{ route('DownloadPDF') }}" class="btn btn-primary">Download Sample PDF</a>
						</div>
					</td>
 
					<td width="25%">
						<div class="form-group">
							<a href="{{ route('HtmlToPDF') }}" class="btn btn-primary">Html To PDF</a>
						</div>
					</td>
 
				</tr>
			</table>
			
 
		</div>
 
	</div>
 
</div>
 
</body>
</html>