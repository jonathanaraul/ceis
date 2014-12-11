<div class="box">
    <div class="box-header">
        <ul class="nav nav-tabs nav-tabs-left">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="icon-align-justify"></i>
                    <?php echo get_phrase('gestionar_documentos'); ?>
                </a></li>
        </ul>
    </div>
    <div class="box-content padded">
        <div class="tab-content">
            <div class="tab-pane active" id="list">
                <table cellpadding="0" cellspacing="0" border="0" class="table table-normal box">
                    <thead>
                        <tr>
                            <td><?= 'Seleccionar informacion que desea consultar:'; ?></td>
                            <td>&nbsp;</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                            Alumnos Inscritos: <input type="checkbox" name="alum_insc" id="alum_insc" value="1">
                            <br><br>
                            Alumnos Inscritos por Empresa: <input type="checkbox" name="alum_insc_empresa" id="alum_insc_empresa" value="1">
                            <br><br>
                            Alumnos Inscritos por Curso: <input type="checkbox" name="alum_por_curso" id="alum_por_curso" value="1">
                            </td>
                            <td>
                                <input type="button" class="btn btn-normal btn-gray" value="Visualizar Reporte"
                                       onclick="verReporte(this.value)">
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
                    <div id="documento" style="background-color:  #eaebef;padding: 7px 11px;display: none; margin: auto; width: 1057px;">
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    function verReporte(valor) {

        if( $('#alum_insc').is(':checked') ) {
            var alum_insc = 'true';
        }else{
            var alum_insc = 'false';
        }

        if( $('#alum_insc_empresa').is(':checked') ) {
            var alum_insc_empresa = 'true';
        }else{
            var alum_insc_empresa = 'false';
        }

        if( $('#alum_por_curso').is(':checked') ) {
            var alum_por_curso = 'true';
        }else{
            var alum_por_curso = 'false';
        }        

        if (alum_insc == 'false' && alum_insc_empresa == 'false' && alum_por_curso == 'false') {
            alert('Debe seleccionar al menos una opcion');
            
            return false;
        }

        $('#documento').empty();

        $('#loader').css('display','block');
        var data = 'alum_insc=' + alum_insc + '&alum_insc_empresa=' + alum_insc_empresa + '&alum_por_curso=' + alum_por_curso;

        $.post('<?php echo site_url()?>ajax/recuperarReporte',
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

</script>