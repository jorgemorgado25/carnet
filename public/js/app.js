$(document).ready(function()
{
	$('#txt-cedula, #txt-ano-nac').numeric({
    	allowMinus   : false,
    	allowThouSep : false,
    	allowDecSep: false
    });
});

Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#_token').getAttribute('value');

var vue = new Vue({
	el: 'body',
	data: {
		error: {error: false, message: ''},
		estudiante: {
			cedula: '',
			genero: '',
			dia: '',
			mes: '',
			ano_nac: '',
			ano_curso: '', 
			seccion: '',
		},
		buscando: false,
		rs: ''
	},
	methods: {
		enviar: function()
		{
			this.error.error = false;
			this.error.message = '';
			this.rs = false;

			if (!this.estudiante.cedula)
			{
				this.error.error = true,
				this.error.message = 'Ingrese la cédula de identidad'
				return false;
			}
			if (!this.estudiante.genero)
			{
				this.error.error = true,
				this.error.message = 'Seleccione el género'
				return false;
			}
			if (!this.estudiante.dia)
			{
				this.error.error = true,
				this.error.message = 'Seleccione el día de nacimiento'
				return false;
			}
			if (!this.estudiante.mes)
			{
				this.error.error = true,
				this.error.message = 'Seleccione el mes de nacimiento'
				return false;
			}
			if (!this.estudiante.ano_nac)
			{
				this.error.error = true,
				this.error.message = 'Escriba el año de nacimiento'
				return false;
			}
			if (!this.estudiante.ano_curso)
			{
				this.error.error = true,
				this.error.message = 'Seleccione el año en curso'
				return false;
			}
			if (!this.estudiante.seccion)
			{
				this.error.error = true,
				this.error.message = 'Seleccione la sección'
				return false;
			}
			this.buscando = true;
			this.$http.post('/api/front/postBuscarEstudiante', this.estudiante)
			.then(function(response)
			{
				this.buscando = false;
				if (response.data.error)
				{
					this.error.error = true,
					this.error.message = response.data.message
				}else{
					this.rs = "Descargar Carnet Estudiantil";
					this.estudiante.cedula = '';
					this.estudiante.genero = '';
					this.estudiante.dia = '';
					this.estudiante.mes = '';
					this.estudiante.ano_curso = '';
					this.estudiante.ano_nac = '';
					this.estudiante.seccion = '';
				}
			});
		}
	}

});
