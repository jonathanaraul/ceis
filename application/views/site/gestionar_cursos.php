<div class="box">
    <div class="box-header">

        <!--CONTROL TABS START-->
        <ul class="nav nav-tabs nav-tabs-left">
            <li class="active">
                <a href="#notas" data-toggle="tab"><i class="icon-align-justify"></i>
                    <?php echo get_phrase('gestionar_notas'); ?>
                </a></li>
            <li>
                <a href="#asistencias" data-toggle="tab"><i class="icon-align-justify"></i>
                    <?php echo get_phrase('gestionar_asistencias'); ?>
                </a></li>        
            <li>
                <a href="#list" data-toggle="tab"><i class="icon-align-justify"></i>
                    <?php echo get_phrase('lista_de_evaluaciones'); ?>
                </a></li>
            <?php 
                if($this->session->userdata('rol') == 1){
            ?>
            <li>
                <a href="#add" data-toggle="tab"><i class="icon-plus"></i>
                    <?php echo get_phrase('agregar_evaluación'); ?>
                </a></li>
            <?php } ?>
        </ul>
        <!--CONTROL TABS END-->

    </div>
    <div class="box-content padded">
        <div class="tab-content">
            <!--TABLE LISTING STARTS-->
            <div class="tab-pane box" id="list">
                <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
                    <thead>
                    <tr>
                        <th>
                            <div>#</div>
                        </th>
                        <th>
                            <div><?php echo get_phrase('name'); ?></div>
                        </th>
                        <th width="40%">
                            <div><?php echo get_phrase('materia'); ?></div>
                        </th>
                        <th>
                            <div><?php echo get_phrase('ponderación'); ?></div>
                        </th>
                        <th>
                            <div><?php echo get_phrase('fecha'); ?></div>
                        </th>
                        <?php 
                            if($this->session->userdata('rol') == 1){
                        ?>
                        <th>
                            <div><?php echo get_phrase('options'); ?></div>
                        </th>
                        <?php } ?>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $count = 1;
                    foreach ($evaluaciones as $row): 
                        $materias= $this->db->get_where('hs_materias', array('id' => $row['materia']))->result_array();
                        $cursos= $this->db->get_where('hs_cursos', array('id' => $materias[0]['curso']))->result_array();
                    ?>
                        <tr>
                            <td><?php echo $count++; ?></td>
                            <td><?php echo $row['nombre']; ?></td>
                            <td><?php echo $this->crud_model->get_nombre_materia_by_id($materias[0]['nombre']).' -- Curso: '.$this->crud_model->get_hs_cursos_nombre($cursos[0]['curso']). ' -- Seccion: ' . $cursos[0]['seccion']; ?></td>
                            <td><?php echo $row['ponderacion']; ?></td>
                            <td><?php echo $row['fecha'] ?></td>
                            <?php 
                                if($this->session->userdata('rol') == 1){
                            ?>
                            <td align="center">
                                <a data-toggle="modal" href="#modal-form"
                                   onclick="modal('Editar_Evaluacion',<?php echo $row['id']; ?>)"
                                   class="btn btn-gray btn-small">
                                    <i class="icon-wrench"></i> <?php echo get_phrase('edit'); ?>
                                </a>
                                <a data-toggle="modal" href="#modal-delete"
                                   onclick="modal_delete('<?php echo base_url(); ?>index.php?site/evaluaciones/delete/<?php echo $row['id']; ?>')"
                                   class="btn btn-red btn-small">
                                    <i class="icon-trash"></i> <?php echo get_phrase('delete'); ?>
                                </a>
                            </td>
                            <?php } ?>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!--TABLE LISTING ENDS-->


            <!--CREATION FORM STARTS-->
            <div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box-content">
                    <?php echo form_open('site/gestionar_cursos/create', array('onsubmit' => 'return validateForm()','name' => 'crear_evaluacion','class' => 'form-horizontal validatable', 'target' => '_top')); ?>
                    <div class="padded">
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('name'); ?></label>
                            <div class="controls">
                                <input type="text" class="uniform" required name="nombre"/>
                            </div>
                        </div>
                        <div class="control-group">

                            <label class="control-label"><?php echo get_phrase('materia'); ?></label>

                            <div class="controls">

                                <select name="materia" class="uniform" style="width:100%;">
                                   <option value="0"><?= 'Seleccionar Materia' ?></option>
                                    <?php
                                    $elements = $this->db->get('hs_materias')->result_array();
                                    foreach ($elements as $element):
                                        $cursos= $this->db->get_where('hs_cursos', array('id' => $element['curso']))->result_array();
                                        ?>
                                        <option
                                            value="<?php echo $element['id']; ?>"> <?php echo $this->crud_model->get_nombre_materia_by_id($element['nombre']).' -- Curso: '.$this->crud_model->get_hs_cursos_nombre($cursos[0]['curso']). ' -- Seccion: ' . $cursos[0]['seccion']; ?> </option>
                                    <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>

                        </div>
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('ponderacion'); ?></label>
                            <div class="controls">
                                <input type="text" class="uniform" required name="ponderacion"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('fecha'); ?></label>
                            <div class="controls">
                                <input type="text" class="datepicker fill-up" required name="fecha"/>
                            </div>
                        </div>
                        <div class="control-group">           
                            <label class="control-label"><?php echo get_phrase('hora'); ?></label>
                            <div class="controls">
                                <select name="hora" class="uniform" style="width:100%;">
                                    
                                    <?php for ($i = 0; $i < 24; $i++){
                                        $hora = ($i<10) ? '0'.$i : $i;
                                        if(intval($hora)<12){
                                            if(intval($hora)==0)$hora = '12';
                                            $hora .= ' AM';
                                        }
                                        else{
                                            if(intval($hora)>12){
                                                $hora = intval($hora) -12;
                                                $hora = ($hora<10) ? '0'.$hora : $hora;
                                            };
                                            $hora .= ' PM';}
                                        echo '<option value="'.$i.'">'.$hora.'</option>';
                                        }
                                    ?>
                                </select>
                            </div>                    
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('minuto'); ?></label>
                            <div class="controls">
                                <select name="minuto" class="uniform" style="width:100%;">
                                    <?php for ($i = 0; $i < 60; $i++){
                                        $minuto = ($i<10) ? '0'.$i : $i;
                                        echo '<option value="'.$i.'">'.$minuto.'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-gray"><?php echo get_phrase('agregar_evaluación'); ?></button>
                    </div>
                    </form>
                </div>
            </div>
            <!--CREATION FORM ENDS-->
        
            <!--NOTAS-->
            <div class="tab-pane box  active" id="notas" style="padding: 5px">
                <center>
                    <?php echo form_open('site/marks'); ?>
                    <table border="0" cellspacing="0" cellpadding="0" class="table table-normal box">
                        <tr>
                            <td><?= 'Seleccionar curso'; ?></td>
                            <td><?= 'Seleccionar materia'; ?></td>
                            <td><?= 'Seleccionar evaluacion'; ?></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>
                                <select name="cursos" id="cursos" onchange="ajaxMateriasNotas(this.value);">
                                    <option value="0"><?= 'Seleccionar curso' ?></option>
                                    <?php
                                    $classes = $this->db->get('hs_cursos')->result_array();
                                    foreach ($classes as $row) {
                                        echo '<option value="' . $row['id'] . '">' . $this->crud_model->get_class_name($row['curso']).' Seccion: '.$row['seccion'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </td>
                            <td>
                                <select name="materias" id="materias" onchange="ajaxEvaluacionesNotas(this.value);">
                                    <option value="0"><?= 'Seleccionar materia' ?></option>
                                </select>
                            </td>
                            <td>
                                <select name="evaluaciones" id="evaluaciones">
                                    <option value="0"><?= 'Seleccionar evaluacion' ?></option>
                                    ?>
                                </select>
                            </td>
                            <td>
                                <input type="button" class="btn btn-normal btn-gray" value="Gestionar Notas"
                                       onclick="consultarNotas(this.value)">
                            </td>
                        </tr>
                    </table>
                    </form>
                </center>


                <br/><br/>
                <div id="loader" style="display: none">
                    <p style="text-align: center">
                        <img src="<?php echo base_url();?>template/images/loader.gif">
                    </p>
                </div>
                <div id="lista_de_notas" style="background-color:  #eaebef;padding: 7px 11px;display: none">

                </div>
            </div>
            <!--Fin de notas-->
            <!--TABLE ASISTENCIAS STARTS-->
            <div
                class="tab-pane box" id="asistencias" style="padding: 5px">
                <center>
                    <?php echo form_open('site/asistencias'); ?>
                    <table border="0" cellspacing="0" cellpadding="0" class="table table-normal box">
                        <tr>
                            <td><?= 'Seleccionar curso'; ?></td>
                            <td><?= 'Seleccionar materia'; ?></td>
                            <td><?= 'Seleccionar Fecha'; ?></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>
                                <select name="cursos" id="cursos2" onchange="ajaxMateriasAsistencias(this.value);">
                                    <option value="0"><?= 'Seleccionar curso' ?></option>
                                    <?php
                                    $classes = $this->db->get('hs_cursos')->result_array();
                                    foreach ($classes as $row) {
                                        echo '<option value="' . $row['id'] . '">' . $this->crud_model->get_class_name($row['curso']).' Seccion: '.$row['seccion']  . '</option>';
                                    }
                                    ?>
                                </select>
                            </td>
                            <td>
                                <select name="materias" id="materias2">
                                    <option value="0"><?= 'Seleccionar materia' ?></option>
                                </select>
                            </td>
                            <td>
                                 <input type="text" class="datepicker fill-up" required name="fecha" id="fecha"/>
                            </td>
                            <td>
                                <input type="button" class="btn btn-normal btn-gray" value="Consultar"
                                       onclick="consultarAsistencias(this.value)">
                            </td>
                        </tr>
                    </table>
                    </form>
                </center>


                <br/><br/>
                <div id="loader" style="display: none">
                    <p style="text-align: center">
                        <img src="<?php echo base_url();?>template/images/loader.gif">
                    </p>
                </div>
                <div id="lista_de_asistencia" style="background-color:  #eaebef;padding: 7px 11px;display: none">

                </div>
            </div>
            <!--TABLE ASISTENCIAS ENDS-->
        </div>
    </div>
</div>
<script type="text/javascript">

    function validateForm() {
    var materia = document.forms["crear_evaluacion"]["materia"].value;
        if (materia == 0) {
            alert("Debe seleccionar una materia");
            return false;
        }
    }

    function consultarNotas(valor) {

        var curso = $('#cursos').val();
        var materia = $('#materias').val();
        var evaluacion = $('#evaluaciones').val();

        if (curso <= 0 || materia <= 0 || evaluacion <= 0) {
            alert('Debe llenar los tres campos');
            return false;
        }

        $('#lista_de_notas').empty();

        $('#loader').css('display','block');
        var data = 'curso=' + curso + '&materia=' + materia + '&evaluacion=' + evaluacion;

        $.post('<?php echo site_url()?>ajax/listarEstudiantesNotas',
            data,
            function (data) {

                $('#lista_de_notas').html(data);
                $('#loader').css('display','none');
                $('#lista_de_notas').css('display','block');
            });
    }

    function ajaxMateriasNotas(valor) {
        $('#materias').empty();
        $('#materias').prev().html('');

        if (valor == 0) {
            $('#evaluaciones').empty();
            $('#evaluaciones').prev().html('');
            $('#evaluaciones').html('<option value="0">Seleccionar evaluacion</option>');
        }

        $.post('<?php echo site_url()?>ajax/obtenMaterias',
            {'curso': valor },
            function (data) {
                $('#materias').html(data);
            });
    }
    function ajaxEvaluacionesNotas(valor) {
        $('#evaluaciones').empty();
        $('#evaluaciones').prev().html('');

        $.post('<?php echo site_url()?>ajax/obtenEvaluaciones',
            {'materia': valor },
            function (data) {
                $('#evaluaciones').html(data);
            });
    }
    function actualizarNotas(){

        var curso = $('#cursos').val();
        var materia = $('#materias').val();
        var evaluacion = $('#evaluaciones').val();

        var data = 'evaluacion='+evaluacion+'&curso='+curso+'&materia='+materia;
        $.each($(".recopila"), function (index, value) {
            var helper = $(value).val();
            var id = $(value).attr('name');
            data += '&' + id + '=' + helper;
        });

        $.post('<?php echo site_url()?>ajax/guardarNotas',
            {'data': data },
            function (data) {
                location.reload();
            });


    }

    function consultarAsistencias(valor) {

        var curso = $('#cursos2').val();
        var materia = $('#materias2').val();
        var fecha = $('#fecha').val();

        if (curso <= 0 || materia <= 0 ) {
            alert('Debe llenar los tres campos');
            return false;
        }
        if(fecha==''){
            alert('Debe llenar los tres campos');
            return false; 
        }

        $('#lista_de_asistencia').empty();

        $('#loader').css('display','block');
        var data = 'curso=' + curso + '&materia=' + materia + '&fecha=' + fecha;

        $.post('<?php echo site_url()?>ajax/listarAsistencias',
            data,
            function (data) {

                $('#lista_de_asistencia').html(data);
                $('#loader').css('display','none');
                $('#lista_de_asistencia').css('display','block');
            });
    }

    function ajaxMateriasAsistencias(valor) {
        $('#materias2').empty();
        $('#materias2').prev().html('');

        $.post('<?php echo site_url()?>ajax/obtenMaterias',
            {'curso': valor },
            function (data) {
                $('#materias2').html(data);
            });
    }

    function actualizarAsistencias(){
        var fecha = $('#fecha').val();
        var curso = $('#cursos2').val();
        var materia = $('#materias2').val();

        var data = 'fecha='+fecha+'&curso='+curso+'&materia='+materia;
        $.each($(".recopila"), function (index, value) {
            var helper = $(value).is(':checked');
            var id = $(value).attr('name');
            data += '&' + id + '=' + helper;
        });

        console.log(data);

        $.post('<?php echo site_url()?>ajax/guardarAsistencias',
            {'data': data },
            function (data) {
                location.reload();
            });


    }

</script>