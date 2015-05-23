<div class="box">

<div class="box-header">

    <!-- ----CONTROL TABS START----- -->

    <ul class="nav nav-tabs nav-tabs-left">

        <li class="active">

            <a href="#list" data-toggle="tab"><i class="icon-align-justify"></i>

                <?php echo get_phrase('class_list'); ?>

            </a>
        </li>

        <li>

            <a href="#add" data-toggle="tab"><i class="icon-plus"></i>

                <?php echo get_phrase('add_class'); ?>

            </a>
        </li>

        <li>
                <a href="#list_materia" data-toggle="tab"><i class="icon-plus"></i>
                    <?php echo get_phrase('subject_list'); ?>
                </a>
        </li>
            
            <?php 
                if($this->session->userdata('rol') == 1){
            ?>
                    <li>
                            <a href="#add_materia" data-toggle="tab"><i class="icon-plus"></i>
                                <?php echo get_phrase('add_subject'); ?>
                            </a>
                    </li>
           <?php } ?>

        <li>
            <a href="<?php echo site_url()?>site/horarios_materias" ><i class="icon-plus" ></i>
                <?php echo get_phrase('agregar_horario_de_materia'); ?>
            </a>
        </li>


    </ul>

    <!------CONTROL TABS END----- -->


</div>

<div class="box-content padded">

<div class="tab-content">

<!----TABLE LISTING STARTS (LISTA DE CURSOS)- -->

<div class="tab-pane box <?php if (!isset($edit_data)) echo 'active'; ?>" id="list">


    <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">

        <thead>

        <tr>

            <th>
                <div>#</div>
            </th>

            <th>
                <div>Nombre</div>
            </th>

            <th>
                <div>Secci&oacute;n</div>
            </th>

            <th>
                <div>Duración</div>
            </th>
			
			<th>
                <div>Matriculados</div>
            </th>
			
            <th>
                <div>Cupo</div>
            </th>

            <th>
                <div>Fecha de inicio</div>
            </th>

            <th>
                <div>Fecha de Culminacion</div>
            </th>

            <th>
                <div><?php echo get_phrase('opciones'); ?></div>
            </th>

        </tr>

        </thead>

        <tbody>

        <?php $count = 1;
        foreach ($cursos as $row): ?>

            <tr>

                <td><?= $count++; ?></td>

                <td><?= $this->crud_model->get_class_name($row['curso']); ?></td>

                <td><?= $row['seccion']; ?></td>

                <td><?= $row['duracion']; ?></td>                

				<td><?= $this->crud_model->get_count_inscripcion($row['id']); ?></td>
				
                <td><?= $row['cupo']; ?></td>

                <td>
                 <?php $f_ini= date_create($row['fecha_ini']);
                       $date_ini= date_format($f_ini, 'd/m/Y');
                       echo $date_ini; 
                 ?>
                </td>

                <td>
                <?php $f_cul= date_create($row['fecha_cul']);
                      $date_cul= date_format($f_cul, 'd/m/Y');
                      echo $date_cul; 
                ?> 
                </td>

                <td align="center">

                    <a data-toggle="modal" href="#modal-form"
                       onclick="modal('Editar_Curso',<?php echo $row['id']; ?>)" class="btn btn-gray btn-small">

                        <i class="icon-wrench"></i> Editar

                    </a>

                    <a data-toggle="modal" href="#modal-delete"
                       onclick="modal_delete('<?php echo base_url(); ?>index.php?site/cursos/delete/<?php echo $row['id']; ?>')"
                       class="btn btn-red btn-small">

                        <i class="icon-trash"></i> Borrar

                    </a>

                </td>

            </tr>

        <?php endforeach; ?>

        </tbody>

    </table>

</div>

<!-- --TABLE LISTING ENDS- -->


<!-- --CREATION FORM STARTS (FORM para crear un curso)-- -->

<div class="tab-pane box" id="add" style="padding: 5px">

    <div class="box-content">

        <?php echo form_open('site/cursos/create', array('class' => 'form-horizontal validatable', 'target' => '_top')); ?>

        <div class="padded">

            <div class="control-group">
                <label class="control-label"> Curso </label>
                <div class="controls">
                    <select name="curso" class="uniform" style="width:100%;">
                        <?php
                        $elements = $this->db->get('class_name')->result_array();
                        foreach ($elements as $element){
                            echo '<option value="'.$element['id'].'">'.$element['nombre'].'</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"> Sección </label>
                <div class="controls">
                    <select name="seccion" class="uniform" style="width:100%;">
                        <option value="A"> A</option>
                        <option value="B"> B</option>
                        <option value="C"> C</option>
                        <option value="D"> D</option>
                        <option value="E"> E</option>
                    </select>
                </div>
            </div>
            <div class="control-group">
            <label class="control-label"> Fecha de Inicio </label>
                <div class="controls">
                <input type="text" class="datepicker fill-up" required name="fecha_ini">
                </div>
            </div>
            <div class="control-group">
            <label class="control-label"> Fecha de Culminación </label>
                <div class="controls">
                <input type="text" class="datepicker fill-up" required name="fecha_cul">
                </div>
            </div>

            <div class="control-group">
                <label class="control-label"> Cupo Disponible </label>
                <div class="controls">
                    <input type="text" class="uniform" required name="cupo">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"> Duración (horas) </label>
                <div class="controls">
                    <input type="text" class="uniform" required name="duracion">
                </div>
            </div>
            <!--aqui no ha guardado nada -->
        </div>
        <div class="form-actions">
            <button type="submit" class="btn btn-gray">Agregar Cursos</button>
        </div>
        </form>
    </div>
</div>


            <!--TABLE LISTING STARTS (lista de materias)-->
            <div class="tab-pane box" id="list_materia">
            <?php if($this->session->userdata('rol')==1){ ?>
                <center>
                        <br>
                        <select name="rol" onchange="window.location='<?php echo base_url(); ?>index.php?site/materias/'+this.value">
                            <option value="">Seleccione Curso</option>
                            <?php
                                    $classes = $this->db->get('hs_cursos')->result_array();
                                    foreach ($classes as $row) {
                                            echo '<option value="' . $row['id'] . '">' . $this->crud_model->get_class_name($row['curso']).' Sección: '.$row['seccion'] . '</option>';
                                    } 
                            ?>
                        </select>
                        <br>
                        <br>
                </center>
            <?php } ?>
                <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
                    <thead>
                    <tr>
                        <th>
                            <div>#</div>
                        </th>
                        <th>
                            <div>Nombre de Materias</div>
                        </th>
                        <th>
                            <div>Profesor(a)</div>
                        </th>                        
                        <?php 
                            if($this->session->userdata('rol') == 1){
                        ?>
                        <th>
                            <div>Opciones</div>
                        </th>
                        <?php } ?>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $count = 1;
                    foreach ($materias as $row): ?>
                        <?php   
                                $profesor= $this->session->userdata('user_id');
                                if($row['profesor']==$profesor || $this->session->userdata('rol')==1){
                                $cursos= $this->db->get_where('hs_cursos', array('id' => $row['curso']))->result_array();
                        ?>                        
                        <tr>
                            <td><?= $count++; ?></td>
                            <td><?php echo $this->crud_model->get_nombre_materia_by_id($row['nombre']); ?></td>
                            <td><?php echo $this->crud_model->get_teacher_name($row['profesor']); ?></td>
                            <?php
                                if($this->session->userdata('rol') == 1){
                            ?>
                            <td align="center">
                                <a data-toggle="modal" href="#modal-form"
                                   onclick="modal('Editar_Materia',<?php echo $row['id']; ?>)"
                                   class="btn btn-gray btn-small">
                                    <i class="icon-wrench"></i> <?php echo get_phrase('edit'); ?>
                                </a>
                                <a data-toggle="modal" href="#modal-delete"
                                   onclick="modal_delete('<?php echo base_url(); ?>index.php?site/materias/delete/<?php echo $row['id']; ?>')"
                                   class="btn btn-red btn-small">
                                    <i class="icon-trash"></i> <?php echo get_phrase('delete'); ?>
                                </a>
                            </td>
                            <?php } }?>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!--TABLE LISTING ENDS-->


            <!--CREATION FORM STARTS Materias-->
			<div class="tab-pane box" id="add_materia" style="padding: 5px">
                <div class="box-content">
                    <?php echo form_open('site/materias/create', array('onsubmit' => 'return validateForm()','name' => 'crear_materias', 'class' => 'form-horizontal validatable', 'target' => '_top')); ?>
                    <div class="padded">
                        <div class="control-group">
                            <label class="control-label"> Curso </label>

                            <div class="controls">
                                <select name="curso" class="uniform" style="width:100%;" onchange="ajaxMaterias(this.value);">
                                    <option value="0"> Seleccionar Curso </option>
                                    <?php
                                    $cursos = $this->db->get('hs_cursos')->result_array();
                                    foreach ($cursos as $row):
                                        ?>
                                        <option
                                            value="<?php echo $row['id']; ?>"><?php echo $this->crud_model->get_class_name($row['curso']).' - Sección '. $row['seccion'].' - Fecha Inicio: '.date_format(date_create($row['fecha_ini']), 'd/m/Y'); ?></option>
                                    <?php                    
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"> Materia </label>
                            <div class="controls">
                                <select name="materias" id="materias_pestana" class="uniform">
								 <option value="0"> Seleccionar materia </option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?= 'Profesor(a)'?></label>
                            <div class="controls">
                                <select name="profesor" class="uniform" style="width:100%;">
                                    <option value="0"><?= 'Seleccionar Profesor' ?></option>
                                    <?php
                                    $profesores = $this->db->get_where('hs_users', array('rol' => 2))->result_array();
                                    foreach ($profesores as $profesor){
                                        echo '<option value="'.$profesor['user_id'].'">'.$profesor['name'].' '.$profesor['papellido'].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-gray"><?php echo get_phrase('agregar_materia'); ?></button>
                    </div>
                    </form>
                </div>
            </div>

<!----CREATION FORM ENDS--->
</div>
</div>
</div>

<script type="text/javascript">

 $(document).ready(function() { $("#materias").select2(); });

	function ajaxMaterias(valor) {
        $('#materias_pestana').empty();

        $.post('<?php echo site_url()?>ajax/obtenCursosMaterias',
            {'curso': valor },function (data) { $('#materias_pestana').html(data);
            });  	
	}

    function validateForm() {
    var curso = document.forms["crear_materias"]["curso"].value;
    var materias = document.forms["crear_materias"]["materias"].value;
    var profesor = document.forms["crear_materias"]["profesor"].value;
        if (curso == 0) {
            alert("Debe seleccionar un curso");
            return false;
        }
        if (materias == 0) {
            alert("Debe seleccionar una materia");
            return false;
        }
        if (profesor == 0) {
            alert("Debe seleccionar un profesor");
            return false;
        }
    }


</script>