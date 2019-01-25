
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
        <!--<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css" rel="stylesheet">-->
        <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
        
         <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
         <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
         <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
        

	</head>
	<body>
		 <div class="container">
			<div class="row page-header">
				<div class="col-xs-12 col-md-6 col-lg-6">
					 <h1>ผู้ใช้</h1>
				 </div>
				 <div class="col-xs-12 col-md-6 col-lg-6">
						 <a href="{{ URL('/user/create') }}" class="btn btn-default pull-right"><i class="fa fa-plus"></i> เพิ่มรายการ</a>
				 </div>
			</div>
			 <!-- /.row -->
			 
			 <!-- will be used to show any messages -->
			@if (Session::has('message'))
				<div class="alert alert-success">{{ Session::get('message') }}</div>
			@endif
			<div class="table-responsive">
		<table id="example" class="table table-striped table-bordered" style="width:100%">
				<thead>
					<tr>
						<td>USERNAME</td>
						<td>DISPLAY_NAME</td>
						<td>TELEPHONE</td>
						<td>action</td>
					</tr>
				</thead>
				<tbody>
				@foreach($user as $key => $value)
					<tr>
						<td>{{ $value->USERNAME }}</td>
						<td>{{ $value->DISPLAY_NAME }}</td>
						<td>{{ $value->TELEPHONE }}</td>
			
						<!-- we will also add show, edit, and delete buttons -->
						<td>
							<form class="form-horizontal" method="POST" action="{{ URL('user/'.$value->USER_ID) }}">
							{{ csrf_field() }}
							{{ method_field('DELETE') }}
						
							<a class="btn btn-xs btn-success" href="{{ URL::to('user/' . $value->USER_ID) }}">Show</a>
			
							<a class="btn btn-xs btn-info" href="{{ URL::to('user/' . $value->USER_ID . '/edit') }}">Edit</a>
							
							<button type="submit" class="btn btn-xs btn-danger">Delete</button>
							</form>
			
			
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
			</div>
	</div>
            <script>
            $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
</body>
</html>
