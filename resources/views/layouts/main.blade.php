<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta id="_token" value="{{ csrf_token() }}">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Emisión de Carnet</title>
	<link href="bootstrap/dist/css/bootstrap.css" rel="stylesheet" type="text/css">	
	<link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">	
	<link rel="stylesheet" href="css/app.css">
</head>
<body>
	@yield("content")
</body>
</html>

<script src="js/jquery/dist/jquery.js"></script>
<script src="bootstrap/dist/js/bootstrap.min.js"></script>
<script src="js/jquery-alphanum/jquery.alphanum.js"></script>
<script src="js/vue/dist/vue.js"></script>
<script src="js/vue-resource/dist/vue-resource.js"></script>
<script src="js/app.js"></script>
@yield("scripts")
