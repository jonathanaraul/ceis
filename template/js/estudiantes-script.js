	function ajaxDocumento() {
		
		var documento = document.getElementById("documento").value;
		document.getElementById("nlibmilitar").innerHTML = "<input type='text' readonly name='nlibmilitar' value='"+documento+"'>";
		
    }
      
	
	function mostrarTmilitar(value) {
		
		var documento = document.getElementById("documento").value;
		
        if (value != '1')
            $('#divtMilitar').css('display', 'none');
        else if(documento != ''){
			$('#divtMilitar').css('display', 'block');
		}
    }
    
    function mostrarTipoingreso(value) {
        if (value== '4') {
            $('#divHelpertipodeingreso').css('display', 'block');
            $('#divTipoingreso').css('display', 'none');
        }
        else if (value == '3') {
            $('#divHelpertipodeingreso').css('display', 'none');
            $('#divTipoingreso').css('display', 'block');
        }
        else {
            $('#divHelpertipodeingreso').css('display', 'none');
            $('#divTipoingreso').css('display', 'none');
        }
    }
    function mostrarTieneHijos(valor) {
        if (valor != 'si')
            $('#divTienehijos').css('display', 'none');
        else
            $('#divTienehijos').css('display', 'block');
    }
    function mostrarTipoingresoSena(valor) {
        if (valor != '1')
            $('.divconvenio_sena').css('display', 'none');
        else
            $('.divconvenio_sena').css('display', 'block');
    }
    
    $(document).ready(function(){
		if($('#convenio_value').val() == 1){
			$('.divconvenio_sena').css('display', 'block');	
		}
	});
    
    function mostrarCodRegional(valor) {
        if (valor == 'Atlantico') {
            $('#cod_regional').val(8);
            $('#cod_regional').attr('readonly');
            $('#label-codigo-regional-sena').html('Codigo Regional');
        }
        else if (valor == 'Bolivar') {
            $('#cod_regional').val(13);
            $('#cod_regional').attr('readonly');
            $('#label-codigo-regional-sena').html('Codigo Regional');
        }
        else if (valor == 'Magdalena') {
            $('#cod_regional').val(47);
            $('#cod_regional').attr('readonly');
            $('#label-codigo-regional-sena').html('Codigo Regional');
        }
        else if (valor == 'Cesar') {
            $('#cod_regional').val(20);
            $('#cod_regional').attr('readonly');
            $('#label-codigo-regional-sena').html('Codigo Regional');
        }
        else if (valor == 'otro') {
            $('#cod_regional').val('');
            $('#cod_regional').attr('readonly', false);
            $('#label-codigo-regional-sena').html('Codigo Regional ¿Cual?');
        }else if(valor == $('#nom_regional_value').val() ){
			var cod_value= $('#cod_regional_value').val();
			$('#cod_regional').val(cod_value);
            $('#cod_regional').attr('readonly');
            $('#label-codigo-regional-sena').html('Codigo Regional');
		}
    }
    function mostrarCodDepartamento(valor) {
        if (valor == 'Atlantico') {
            $('#cod_departamento').val(8);
            $('#cod_departamento').attr('readonly');
            $('#label-codigo-departamento-sena').html('Codigo Departamento');
        }
        else if (valor == 'Bolivar') {
            $('#cod_departamento').val(13);
            $('#cod_departamento').attr('readonly');
            $('#label-codigo-departamento-sena').html('Codigo Departamento');
        }
        else if (valor == 'Magdalena') {
            $('#cod_departamento').val(47);
            $('#cod_departamento').attr('readonly');
            $('#label-codigo-departamento-sena').html('Codigo Departamento');
        }
        else if (valor == 'Cesar') {
            $('#cod_departamento').val(20);
            $('#cod_departamento').attr('readonly');
            $('#label-codigo-departamento-sena').html('Codigo Departamento');
        }
        else if (valor == 'otro') {
            $('#cod_departamento').val('');
            $('#cod_departamento').attr('readonly', false);
            $('#label-codigo-departamento-sena').html('Codigo Departamento ¿Cual?');
        }else if(valor == $('#nom_departamento_value').val() ){
			var cod_value= $('#cod_departamento_value').val();
			$('#cod_departamento').val(cod_value);
            $('#cod_departamento').attr('readonly');
            $('#label-codigo-departamento-sena').html('Codigo Departamento');
		}
    }
    function mostrarCodMunicipio(valor) {
        if (valor == 'Barranquilla') {
            $('#cod_municipio').val(1);
            $('#cod_municipio').attr('readonly');
            $('#label-codigo-municipio-sena').html('Codigo Municipio');
        }
        else if (valor == 'Cartagena') {
            $('#cod_municipio').val(1);
            $('#cod_municipio').attr('readonly');
            $('#label-codigo-municipio-sena').html('Codigo Municipio');
        }
        else if (valor == 'Santa Marta') {
            $('#cod_municipio').val(1);
            $('#cod_municipio').attr('readonly');
            $('#label-codigo-municipio-sena').html('Codigo Municipio');
        }
        else if (valor == 'Valledupar') {
            $('#cod_municipio').val(1);
            $('#cod_municipio').attr('readonly');
            $('#label-codigo-municipio-sena').html('Codigo Municipio');
        }
        else if (valor == 'otro') {
            $('#cod_municipio').val('');
            $('#cod_municipio').attr('readonly', false);
            $('#label-codigo-municipio-sena').html('Codigo Municipio ¿Cual?');
        }
        else if(valor == $('#nom_municipio_value').val() ){
			var cod_value= $('#cod_municipio_value').val();
			$('#cod_municipio').val(cod_value);
            $('#cod_municipio').attr('readonly');
            $('#label-codigo-municipio-sena').html('Codigo Municipio');
		}
    }
    

