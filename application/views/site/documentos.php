<div class="box">
    <div class="box-header">
        <ul class="nav nav-tabs nav-tabs-left">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="icon-align-justify"></i>
                    <?php echo get_phrase('gestionar_documentos'); ?>
                </a>
            </li>
            <li>
                <a href="#gestionar_egresados" data-toggle="tab"><i class="icon-align-justify"></i>
                    <?php echo get_phrase('gestionar_egresados'); ?>
                </a>
            </li>
        </ul>
    </div>
    <div class="box-content padded">
        <div class="tab-content">
            <div class="tab-pane active" id="list">
                <table cellpadding="0" cellspacing="0" border="0" class="table table-normal box">
                    <thead>
                        <tr>
                            <td><?= 'Seleccionar Documento'; ?></td>
                            <td id="title_1"><?= 'Seleccionar Curso'; ?></td>
                            <td id="title_2"><?= 'Seleccionar Estudiante'; ?></td>
                            <td>&nbsp;</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td >
                                <select class="uniform" name="documentos" id="documentos" onchange="clear_dom();">
                                    <option value="0"><?= 'Seleccionar Documento' ?></option>
                                    <option value="1"><?= 'Diplomas' ?></option>
                                    <option value="2"><?= 'Certificado de Estudio' ?></option>
                                    <option value="3"><?= 'Actas' ?></option>
                                </select>
                            </td>
                            <td>
                              <div id="div_cursos">
                                <select class="uniform"  name="cursos" id="cursos" onchange="ajaxEstudiantes(this.value);">
                                    <option value="0"><?= 'Seleccionar Curso' ?></option>

                                </select>
                              </div>
                              <div id="div_cedula" style="display:none;" >
                                <input type="text" disabled  class="uniform" required name="cedula" id="cedula"/>
                              </div>


                            </td>
                            <td>
                                  <div id="div_estudiante">
                                        <select class="uniform" name="estudiantes" id="estudiante" >
                                            <option value="0"><?= 'Visualizar Todos' ?></option>
                                        </select>
                                  </div>

                            </td>
                            <td>
                                <input type="button" id="ver_docemento" class="btn btn-normal btn-gray" value="Visualizar Documento" onclick="verDiplomas()">
                            </td>
                        </tr>
                    </tbody>
                </table>
                <br/><br/>
                <div id="loader" style="display: none">
                    <p style="text-align: center">
                        <img src="<?php echo base_url();?>template/images/loader.gif">
                    </p>
                </div>
                <?php if($input){

                			echo $input;
                }  ?>
                <div id="lista">

                </div>
                <div id="documento" style="background-color:  #eaebef;padding: 7px 11px;display: none; margin: auto; width: 1057px;">

                </div>
            </div>
            <!-- aqui va el div de la otra pestaña -->
            <div class="tab-pane" id="gestionar_egresados">

            </div>
        </div>

    </div>
</div>

<div id="allDocumentos" style="display: none; margin: auto; width: 1057px;">

</div>

<script type="text/javascript">

    function ajaxEstudiantes(valor) {
        $('#estudiantes').empty();
        $('#estudiantes').prev().html('');

        $.post('<?php echo site_url()?>ajax/obtenEstudiantes',
            {'curso': valor },
            function (data) {
                $('#estudiante').html(data);
            });
    }

    function verDiplomas() {

        var curso = $('#cursos').val();
        var estudiante = $('#estudiante').val();
        var documento = $('#documentos').val();


        if (curso <= 0 || estudiante < 0 || documento <= 0) {
            alert('Debe llenar todos los campos');
            return false;
        }

        $('#documento').empty();

        $('#loader').css('display','block');
        var data = 'curso=' + curso + '&estudiante=' + estudiante + '&documento=' + documento;


        $.post('<?php echo site_url()?>ajax/recuperarDocumentos',
            data,
            function (data) {

                $('#documento').html(data);
                $('#loader').css('display','none');
                $('#documento').css('display','block');
            });
    }

    function imprimirDocumento(div){
    var div_id= "#"+div;
    $(div_id).print();
    return (false);

    }

    function clear_dom()
    {
      $('#documento').empty();
      $('#documento').css({
        'background-color' :  '#eaebef',
        'padding'          : '7px 11px',
        'display'          : 'none',
        'margin'           : 'auto',
        'width'            : '1057px'
      });
    }


    function print_all(){
      var clon=$("#borrar").clone();
      $("#borrar").empty();

      $('#documento').print();
      $("#borrar").html(clon);

    }

    $("#documentos").change(function(){


        if ( $(this).val() == '0' ){

            $('#documento').empty();
            $('#lista').empty();
            $("#cedula").val('');
            $("#div_cedula").css( { 'display' : 'none' } );
            $("thead > tr > td[id=title_1]").text('Seleccionar Curso');
            $("#cedula").attr('disabled' , 'disabled');
            $("#cursos").removeAttr('disabled');
            $("#div_cursos").css( { 'display' : 'block' } );
            $("#div_estudiante").css( { 'display' : 'block' } );
            $("#estudiante").removeAttr('disabled');
            $("thead > tr > td[id=title_2]").text('Seleccionar Estudiante');
            $("#ver_docemento").attr('onclick','verDiplomas()');
            $("#ver_docemento").val('Visualizar Documento');

        }

        if ( $(this).val() == '1' ){
          $('#documento').empty();
          $('#lista').empty();
          $("thead > tr > td[id=title_1]").text('Seleccionar Curso');
          $("#div_cedula").css( { 'display' : 'none' } );
          $("#cedula").val('');
          $("#cedula").attr('disabled' , 'disabled');
          $("#div_cursos").css( { 'display' : 'block' } );
          $("#cursos").removeAttr('disabled');
          $("#div_estudiante").css( { 'display' : 'block' } );
          $("#estudiante").removeAttr('disabled');
          $("thead > tr > td[id=title_2]").text('Seleccionar Estudiante');
          $("#ver_docemento").attr('onclick','verDiplomas()');
          $("#ver_docemento").val('Visualizar Documento');

        }

        if ( $(this).val() == '2' ){
            $('#documento').empty();
            $('#lista').empty();
            $("#div_cursos").css( { 'display' : 'none' } );
            $("#cursos").attr('disabled' , 'disabled');
            $("#div_estudiante").css( { 'display' : 'none' } );
            $("#estudiante").attr('disabled' , 'disabled');
            $("thead > tr > td[id=title_2]").text('');
            $("thead > tr > td[id=title_1]").text('Ingresar No. De Cédula');
            $("#div_cedula").css( { 'display' : 'block' } );
            $("#cedula").removeAttr('disabled');
            $("#cedula").val('');
            $("#ver_docemento").attr('onclick','verCertificados(2)');
            $("#ver_docemento").val('Buscar');


        }

        if ( $(this).val() == '3' ){

            $('#documento').empty();
            $('#lista').empty();
            $("#div_cursos").css( { 'display' : 'none' } );
            $("#cursos").attr('disabled' , 'disabled');
            $("#div_estudiante").css( { 'display' : 'none' } );
            $("#estudiante").attr('disabled' , 'disabled');
            $("thead > tr > td[id=title_2]").text('');
            $("thead > tr > td[id=title_1]").text('Ingresar No. De Cédula');
            $("#div_cedula").css( { 'display' : 'block' } );
            $("#cedula").removeAttr('disabled');
            $("#cedula").val('');
            $("#ver_docemento").attr('onclick','verCertificados(3)');
            $("#ver_docemento").val('Buscar');

        }


    });

    $(document).ready(function() {
      $.post('<?php echo site_url()?>ajax/cursos',
          function (data) {
            $("#cursos").append(data);
          });


    });

    function verCertificados(varlor){

        var cedula = $("#cedula").val();
        if( cedula == ''){

              alert('Debe Ingresar la Cedula');
              return false;
        }else{

                  $.post('<?php echo site_url()?>ajax/listCertificadoEstudio',
                        { 'cedula' : cedula, 'documento' : varlor },
                      function (data) {
                        $('#lista').html(data);
                        $('#loader').css('display','none');
                        $('#lista').css('display','block');
                        $('#documento').css('display','none');
                        $('#documento').empty();
                      });

        }


    }

    function certificado(inscripcion_id,documento){
    
      $.post('<?php echo site_url()?>ajax/generarCertificadoEstudio',
              { 'inscripcion_id' : inscripcion_id, 'documento' : documento },
          function (data) {
            $('#documento').html(data);
            $('#loader').css('display','none');
            $('#documento').css('display','block');
          });
    }

    function verActas(){
      alert( $("#cedula").val()  + " Cedula para buscar Actas" );
    }


</script>
