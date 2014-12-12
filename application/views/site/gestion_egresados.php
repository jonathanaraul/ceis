<div class="box">
    <div class="box-header">
        <ul class="nav nav-tabs nav-tabs-left">
            <li class="active">
                <a href="#consultar" data-toggle="tab"><i class="icon-align-justify"></i>
                    <?php echo get_phrase('busqueda_de_egresados'); ?>
                </a></li>
            <li>
                <a href="#list" data-toggle="tab"><i class="icon-align-justify"></i>
                    <?php echo get_phrase('gestionar_egresados'); ?>
                </a></li>
            <li>
                <a href="#nro" data-toggle="tab"><i class="icon-align-justify"></i>
                    <?php echo get_phrase('Asignar_N.R.O'); ?>
                </a></li>            
        </ul>
    </div>
    <div class="box-content padded">
        <div class="tab-content">
            <div class="tab-pane active" id="consultar">
                <table cellpadding="0" cellspacing="0" border="0" class="table table-normal box">
                    <thead>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>&nbsp;</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <div class="control-group">
                                    <label class="control-label"><?= 'Cedula' ?></label>
                                    <div class="control-group">
                                        <div class="controls">
                                            <input type="text" class="uniform" id="busqueda" name="busqueda" />
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <input type="button" class="btn btn-normal btn-gray" value="Buscar Egresados"
                                       onclick="buscar_egresados(this.value)">
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
                    <div id="buscar" style="background-color:  #eaebef;padding: 7px 11px;display: none; margin: auto; width: 1057px;">
                </div>
            </div>

            <div class="tab-pane box" id="list">
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

            <!----CREATION FORM STARTS---->
            <div class="tab-pane box" id="nro" style="padding: 5px">
                <div class="box-content">
                    <?php echo form_open('site/gestion_egresados/nro', array('name' => 'crear_materias', 'class' => 'form-horizontal validatable', 'target' => '_top')); ?>
                    <div class="padded">
                        <div class="control-group">
                            <label class="control-label"><?= 'Cedula' ?></label>
                            <div class="controls">
                                <input type="text" class="uniform" name="cedula" id="cedula_estudiante" placeholder="Ingrese nro de cedula del estudiante"/>
                                <input type="button" class="btn btn-gray" value="Consultar cedula" onclick="consultar_estudiante(this.value)"/>
                            </div>
                        </div>
                        </div>
                            <div id="student_ced" style="background-color:  #eaebef;padding: 7px 11px;display: none; margin: auto; width: 500px;">
                        </div>
                        <br>
                        <div class="control-group">
                            <label class="control-label"><?= 'NRO' ?></label>
                            <div class="controls">
                                <input type="text" class="uniform" name="nro" placeholder="Número NRO a asignar"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <?php $ultimo_nro = $this->db->get_where('hs_nro', array('id' => 1))->result_array(); ?>
                            <label class="control-label">Ultimo NRO asignado: <?= $ultimo_nro[0]['ult_nro'] ?></label>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-gray"><?php echo get_phrase('Asignar N.R.O'); ?></button>
                    </div>
                    </form>
                </div>
            </div>
            <!--CREATION FORM ENDS-->
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

    function buscar_egresados(valor) {

        var cedula = $('#busqueda').val();


        if (cedula <= "") {
            alert('Debe llenar el campo');
            return false;
        }

        $('#buscar').empty();

        $('#loader').css('display','block');
        var data = 'cedula=' + cedula;


        $.post('<?php echo site_url()?>ajax/buscar',
            data,
            function (data) {

                $('#buscar').html(data);
                $('#loader').css('display','none');
                $('#buscar').css('display','block');
            });
    }

    function consultar_estudiante(valor) {

        var cedula = $('#cedula_estudiante').val();


        if (cedula <= "") {
            alert('Debe llenar el campo');
            return false;
        }

        $('#student_ced').empty();

        var data = 'cedula=' + cedula;


        $.post('<?php echo site_url()?>ajax/buscar_estudiante',
            data,
            function (data) {

                $('#student_ced').html(data);
                $('#student_ced').css('display','block');
            });
    }

</script>