@extends('layouts.main')
@section('content')

<div class="div-line"></div>
<div class="container col-md-8 col-md-offset-2">
	<img src="img/logo-lti-400.png" alt="" class="pull-right" width="70px" style="margin-left:20px">
	<h4>Liceo Horario Integral "Juan Germán Roscio"</h4>
	<h4 style="margin-bottom: 40px">Sistema Automatizado Emisión de Carnet</h4>
	@if(Session::has('session-carnet'))		
		<p class="alert alert-danger text-center">
			Por favor, ingrese sus datos personales
		</p>
	@endif
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Ingrese sus datos personales</h3>
		</div>
		<div class="row">
			<div class="panel-body">

				<div class="col-md-6">
					<div class="form-group">
						<label for="">Cédula de Identidad</label>
						<input type="text" class="form-control" placeholder="Escribe tu cédula de identidad" id="txt-cedula" maxlength=10 v-model="estudiante.cedula">
					</div>	
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="">Género</label>
						<select name="" id="" class="form-control" v-model="estudiante.genero">
							<option value="M">Masculino</option>
							<option value="F">Femenino</option>
						</select>
					</div>
				</div>

				<div class="col-md-4">
					<div class="form-group">
						<label for="">Día de Nacimiento</label>
						{!! Form::select('dias', $dias, NULL, [
							'class' => 'form-control', 
							'v-model' => 'estudiante.dia'])
						!!}
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="">Mes de Nacimiento</label>
						{!! Form::select('meses', $meses, NULL, [
							'class' => 'form-control', 
							'v-model' => 'estudiante.mes'])
						!!}
					</div>
				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="">Año de Nacimiento</label>
						<input type="text" class="form-control" maxlength=4 v-model="estudiante.ano_nac" id="txt-ano-nac">
					</div>
				</div>

				<div class="col-md-6">
					<div class="form-group">
						<label for="">Año en Curso</label>
						<select name="" id="" class="form-control" v-model="estudiante.ano_curso">
							<option value="1ro">1er año</option>
							<option value="2do">2do año</option>
							<option value="3ro">3er año</option>
							<option value="4to">4to año</option>
							<option value="5to">5to año</option>
						</select>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="">Sección</label>
						<select name="" id="" class="form-control" v-model="estudiante.seccion">
							<option>A</option>
							<option>B</option>
							<option>C</option>
							<option>D</option>
							<option>E</option>
							<option>F</option>
							<option>G</option>
							<option>H</option>
						</select>
					</div>
				</div>
				
				<div class="col-md-12">
					<hr>
					<p class="text-center" v-show="buscando" v-cloak>
						<i class=" text-center fa fa-spinner fa-spin fa-4x"></i>
					</p>
					<div class="alert alert-danger" v-show="error.error" v-cloak>
						<p class="text-center"> @{{ error.message }} </p>
					</div>
					<div class="alert alert-success" v-show="rs" v-cloak>
						<p class="text-center">
							<a href="/pdf_carnet" target="_blank">@{{ rs }}</a>
						</p>
					</div>

					<div class="form-group">
						<button class="btn btn-primary" @click="enviar()" :disabled="buscando">Consultar</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection