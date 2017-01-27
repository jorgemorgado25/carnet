@extends('layouts.main')
@section('content')
<div class="col-md-6 col-md-offset-3">
	<h3>Administración del Sistema</h3>
	<br>
	@include('partials.error-message')
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">Ingrese sus datos personales</h4>
		</div>
		
			<div class="panel-body">
				{!!Form::open(['route'=>'login.admin', 'method'=>'POST'])!!}
        			<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="form-group">
						<label for="exampleInputEmail1">Login</label>
						<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Login" name="login">
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Password</label>
						<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password">
					</div>
					<button type="submit" class="btn btn-primary">Ingresar</button>
				</form>
				
			</div>
		
	</div>
</div>
@endsection