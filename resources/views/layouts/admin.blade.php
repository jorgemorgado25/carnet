<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta id="_token" value="{{ csrf_token() }}">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Administración</title>
	<link href="{{asset('bootstrap/dist/css/bootstrap.css')}}" rel="stylesheet" type="text/css">	
	<link href="{{asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">	
	<link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ route('dashboard') }}">Dashboard</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        
        <li><a href="{{ route('students.index') }}">Estudiantes</a></li>
        <li><a href="{{ route('matricula.index') }}">Matrícula</a></li>
        <li><a href="{{ route('students.index') }}">Escolaridades</a></li>
       
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Cambiar Contraseña</a></li>
            
            <li role="separator" class="divider"></li>
            <li><a href="#">Salir</a></li>
          </ul>
      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<body>
	<div class="col-md-8 col-md-offset-2">
		@yield("content")
	</div>	
</body>
</html>

<script src="{{ asset('js/jquery/dist/jquery.js')}}"></script>
<script src="{{ asset('bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery-alphanum/jquery.alphanum.js') }}"></script>
<script src="{{ asset('js/vue/dist/vue.js') }}"></script>

<script src="{{ asset('js/vue-resource/dist/vue-resource.js') }}"></script>

@yield("scripts")


