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
		 <div class="container">
 <div class="row page-header">
	 <div class="col-xs-12 col-md-6 col-lg-6">
		 <h1>Edit user id : {{ $user->USER_ID }}</h1>
	 </div>
	 <div class="col-xs-12 col-md-6 col-lg-6">
		 <div class="btn-group pull-right" role="group" aria-label="..." >
			  <a href="{{ URL('/user') }}" class="btn btn-default "> Back</a>
		 </div>
	 </div>
</div>
 <!-- /.row -->

    <div class="row">
        <div class="col-md-8">
				
                    <form class="form-horizontal" method="POST" action="{{ route('user.update', $user->USER_ID) }}">
					<!-- if there are creation errors, they will show here -->
					@if($errors->all())
					<ul class="has-error">
					@foreach ($errors->all() as $message)
						<li>{{ $message }}</li>
					@endforeach
					</ul>
					@endif
					
                        {{ csrf_field() }}
			{{ method_field('PUT') }}
												
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title" class="col-md-4 control-label">USERNAME *</label>

                            <div class="col-md-6">
                                <input id="USERNAME" type="text" class="form-control" name="USERNAME" value="{{ $user->USERNAME }}" required autofocus>

                                @if ($errors->has('USERNAME'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('USERNAME') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('DISPLAY_NAME') ? ' has-error' : '' }}">
                            <label for="content" class="col-md-4 control-label">DISPLAY_NAME *</label>

                            <div class="col-md-6">
                                <textarea name="DISPLAY_NAME" id="DISPLAY_NAME" class="form-control" >{{ $user->DISPLAY_NAME }}</textarea>

                                @if ($errors->has('DISPLAY_NAME'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('DISPLAY_NAME') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
			
        </div>
    </div>
</div>
</body>
</html>