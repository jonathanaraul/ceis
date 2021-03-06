<div class="box">
    <div class="box-header">

        <!--CONTROL TABS START-->
        <ul class="nav nav-tabs nav-tabs-left">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="icon-align-justify"></i>
                    <?php echo get_phrase('subject_list'); ?>
                </a>
            </li>
			<?php 
				if($this->session->userdata('rol') == 1){
			?>
            <li>
                <a href="#add" data-toggle="tab"><i class="icon-plus"></i>
                    <?php echo get_phrase('add_subject'); ?>
                </a>
            </li>
            <?php } ?>
        </ul>
        <!--CONTROL TABS END-->

    </div>
    <div class="box-content padded">
        <div class="tab-content">
            <!--TABLE LISTING STARTS-->
            <div class="tab-pane box active" id="list">
            <?php if($this->session->userdata('rol')==1){ ?>
                <center>
                        <br>
                        <select name="rol" onchange="window.location='<?php echo base_url(); ?>index.php?site/materias/'+this.value">
                            <option value=""> Seleccione Curso </option>
                            <?php
                                    $classes = $this->db->get('hs_cursos')->result_array();
                                    foreach ($classes as $row) {
                                            echo '<option value="' . $row['id'] . '">' . $this->crud_model->get_class_name($row['curso']).' Sección: '.$row['seccion'] .' - Fecha Inicio: '.date_format(date_create($row['fecha_ini']), 'd/m/Y'). '</option>';
                                    } 
                            ?>
                        </select>											
                        <br>
						<br> 
				</center>
            <?php } ?>
			
					<?php 
					$curso_materia = $this->db->get_where('hs_cursos', array('id'=> $curso))->result_array();
					foreach ($curso_materia as $row) {	 
					echo 'CURSO: ' . $this->crud_model->get_class_name($row['curso']).' Sección: '.$row['seccion'] .' - Fecha Inicio: '.date_format(date_create($row['fecha_ini']), 'd/m/Y');
                    } 	 
					?>
					
				<br>
				
                <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
                    <thead>
                    <tr>
                        <th>
                            <div>#</div>
                        </th>
                        <th>
                            <div><?php echo get_phrase('subject_name'); ?></div>
                        </th>
                        <th>
                            <div><?php echo get_phrase('Profesor(a)'); ?></div>
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


            <!--CREATION FORM STARTS-->
            <div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box-content">
                    <?php echo form_open('site/materias/create', array('onsubmit' => 'return validateForm()','name' => 'crear_materias', 'class' => 'form-horizontal validatable', 'target' => '_top')); ?>
                    <div class="padded">
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('curso'); ?></label>

                            <div class="controls">
                                <select name="curso" class="uniform" style="width:100%;" onchange="ajaxMaterias(this.value);">
                                    <option value="0"><?= 'Seleccionar Curso' ?></option>
                                    <?php
                                    $cursos = $this->db->get('hs_cursos')->result_array();
                                    foreach ($cursos as $row):
                                        ?>
                                        <option
                                            value="<?php echo $row['id']; ?>"><?php echo $this->crud_model->get_class_name($row['curso']).' - Sección '. $row['seccion'] .'- Fecha Inicio: '.date_format(date_create($row['fecha_ini']), 'd/m/Y'); ?></option>
                                    <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?= 'Materia'?></label>
                            <div class="controls">
                                <select name="materias" id="materias" class="uniform">
                                    <option value="0"><?= 'Seleccionar Materia' ?></option>
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
                        <button type="submit" class="btn btn-gray"> Agregar_materia </button>
                    </div>
                    </form>
                </div>
            </div>
            <!--CREATION FORM ENDS-->

        </div>
    </div>
</div>

<script type="text/javascript">

    function ajaxMaterias(valor) {
        $('#materias').empty();

        $.post('<?php echo site_url()?>ajax/obtenCursosMaterias',
            {'curso': valor },
            function (data) {
                $('#materias').html(data);
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
