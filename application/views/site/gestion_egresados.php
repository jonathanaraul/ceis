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
                            <td><?= 'Seleccionar Curso'; ?></td>
                            <td><?= 'Seleccionar Estudiante'; ?></td>
                            <td>&nbsp;</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
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
                                    <option value="0"><?= 'Seleccione un Estudiante' ?></option>
                                </select>
                            </td>
                            <td>
                                <input type="button" class="btn btn-normal btn-gray" value="Gestionar Egresados"
                                       onclick="gestionar_egresados(this.value)">
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
                    <div id="gestionar" style="background-color:  #eaebef;padding: 7px 11px;display: none; margin: auto; width: 1057px;">
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    function ajaxEstudiantes(valor) {
        $('#estudiantes').empty();
        $('#estudiantes').prev().html('');

        $.post('<?php echo site_url()?>ajax/obtenEstudiantesE',
            {'curso': valor },
            function (data) {
                $('#estudiante').html(data);
            });
    }

    function gestionar_egresados(valor) {

        var curso = $('#cursos').val();
        var estudiante = $('#estudiante').val();


        if (curso <= 0 || estudiante <= 0) {
            alert('Debe llenar todos los campos');
            return false;
        }

        $('#gestionar').empty();

        $('#loader').css('display','block');
        var data = 'curso=' + curso + '&estudiante=' + estudiante;


        $.post('<?php echo site_url()?>ajax/egresados',
            data,
            function (data) {

                $('#gestionar').html(data);
                $('#loader').css('display','none');
                $('#gestionar').css('display','block');
            });
    }

</script>