var Funciones = Vue.extend({
	methods: {
		saludar: function() {
			console.log('hola');
		},
		buscarAnos: function(mencion_id)
		{
			return this.$http.get('/buscar_anos/' + mencion_id)
			.then(function(response){
				return Promise.resolve(response);
			});
		},
		buscarSecciones: function(ano_id)
		{
			return this.$http.get('/buscar_secciones/' + ano_id)
			.then(function(response){
				return Promise.resolve(response);
			});
		},
		buscarEstudianteCedula: function (cedula)
		{
			return this.$http.get('/buscar_estudiante_ci/' + cedula)
			.then(function(response)
			{
				return Promise.resolve(response);
			});
		},
		buscarPersonaId: function (id)
		{
			return this.$http.get('/buscar_persona_id/' + id)
			.then(function(response)
			{
				return Promise.resolve(response);
			});
		},
		buscarInscripcionesSeccion: function (mencion_id, seccion_id)
		{
			return this.$http.get('/buscar_inscripciones_seccion/' + mencion_id + '/' + seccion_id)
			.then(function(response)
			{
				return Promise.resolve(response);
			});
		},
		

		//Registers - Matriculas
		getBuscarMatriculaSeccion: function(escolaridad, seccion)
		{
			return this.$http.get('/matricula/getMatriculaSeccion/' + escolaridad +'/'+ seccion)
			.then(function(response)
			{
				return Promise.resolve(response);
			});
		},
		sendExcel: function()
		{
			
		},

		getItem: function(id, items)
		{
			for (i in items)
			{
				if (items[i]['id'] == id)
				{
					return items[i];
				}
			}
		}
	}
});