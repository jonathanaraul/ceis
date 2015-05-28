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
                            <td id="input_1">
                              <div id="1">
                                <select class="uniform"  name="cursos" id="cursos" onchange="ajaxEstudiantes(this.value);">
                                    <option value="0"><?= 'Seleccionar Curso' ?></option>

                                </select>
                              </div>
                              <div id="2" style="display:none;" >
                                <input type="text" disabled  class="uniform" required name="cedula" id="cedula"/>
                              </div>


                            </td>
                            <td>
                                <select class="uniform" name="estudiantes" id="estudiante" >
                                    <option value="0"><?= 'Visualizar Todos' ?></option>
                                </select>
                            </td>
                            <td>
                                <input type="button" class="btn btn-normal btn-gray" value="Visualizar Documento"
                                       onclick="verDiplomas(this.value)">
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
                <div id="documento" style="background-color:  #eaebef;padding: 7px 11px;display: none; margin: auto; width: 1057px;">

                </div>
            </div>
            <!-- aqui va el div de la otra pestaña -->
            <div class="tab-pane" id="gestionar_egresados">
              ROLO DE PAJUDO
            </div>
        </div>

    </div>
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

    function verDiplomas(valor) {

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

      //$('#documento').print();
    }

    $("#documentos").change(function(){

        if ( $(this).val() == '1' ){

          $("thead > tr > td[id=title_1]").text('Seleccionar Curso');
          //$.post('<?php echo site_url()?>ajax/cursos',
          //    function (data) {
          //      $("tbody > tr > td[id=input_1]").html('<select class="uniform" name="documentos" id="documentos" onchange="clear_dom();">' + data + '</select>');
          //    });


        }

        if ( $(this).val() == '2' ){
            $("#1").css( { 'display' : 'none' } );
            $("#cursos").attr('disabled' , 'disabled');
            $("thead > tr > td[id=title_1]").text('Ingresar No. De Cédula');
            $("#2").css( { 'display' : 'block' } );
            $("#cedula").removeAttr('disabled');


        }

        if ( $(this).val() == '3' ){

        }


    });

    $(document).ready(function() {
      $.post('<?php echo site_url()?>ajax/cursos',
          function (data) {
            $("#cursos").append(data);
          });


    });


</script>
