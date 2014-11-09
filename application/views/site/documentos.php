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
                            <td><?= 'Seleccionar Documento'; ?></td>
                            <td><?= 'Seleccionar Curso'; ?></td>
                            <td><?= 'Seleccionar Estudiante'; ?></td>
                            <td>&nbsp;</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <select name="documentos" id="documentos" >
                                    <option value="0"><?= 'Seleccionar Documento' ?></option>
                                    <option value="1"><?= 'Diplomas' ?></option>
                                    <option value="2"><?= 'Certificado de Estudio' ?></option>
                                    <option value="3"><?= 'Actas' ?></option>
                                </select>
                            </td>
                            <td>
                                <select name="cursos" id="cursos" onchange="ajaxEstudiantes(this.value);">
                                    <option value="0"><?= 'Seleccionar Curso' ?></option>
                                    <?php
                                    $classes = $this->db->get('hs_cursos')->result_array();
                                    foreach ($classes as $row) {
                                        echo '<option value="' . $row['id'] . '">' . $this->crud_model->get_hs_cursos_nombre($row['curso']).' - Sección: '. $row['seccion'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </td>
                            <td>
                                <select name="estudiantes" id="estudiante" >
                                    <option value="0"><?= 'Visualizar Todos' ?></option>
                                </select>
                            </td>
                            <td>
                                <input type="button" class="btn btn-normal btn-gray" value="Visualizar Diplomas"
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
                    <div id="documento" style="background-color:  #eaebef;padding: 7px 11px;display: none; margin: auto; width: 1057px;">
                </div>
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

</script>