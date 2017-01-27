@extends('layouts.main')
@section('content')
<div class="col-md-6 col-md-offset-3">
	<h3>Administración del Sistema</h3>
	<br>
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4 class="panel-title">Ingrese sus datos personales</h4>
		</div>
		
			<div class="panel-body">

				<form>
					<div class="form-group">
						<label for="exampleInputEmail1">Login</label>
						<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Login">
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1">Password</label>
						<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
					</div>
					<button type="submit" class="btn btn-primary">Ingresar</button>
				</form>
				
			</div>
		
	</div>
</div>
@endsection