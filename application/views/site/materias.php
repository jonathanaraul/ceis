<div class="box">
    <div class="box-header">

        <!------CONTROL TABS START------->
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
        <!------CONTROL TABS END------->

    </div>
    <div class="box-content padded">
        <div class="tab-content">
            <!----TABLE LISTING STARTS--->
            <div class="tab-pane box active" id="list">

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
                            <div><?php echo get_phrase('class'); ?></div>
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
                        <tr>
                            <td><?= $count++; ?></td>
                            <td><?php echo $row['nombre']; ?></td>
                            <td><?php echo $this->crud_model->get_hs_cursos_nombre($row['curso']).' - Sección '.$this->crud_model->get_hs_cursos_seccion($row['curso']); ?></td>
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
                            <?php } ?>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!----TABLE LISTING ENDS--->


            <!----CREATION FORM STARTS---->
            <div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box-content">
                    <?php echo form_open('site/materias/create', array('class' => 'form-horizontal validatable', 'target' => '_top')); ?>
                    <div class="padded">
                        <div class="control-group">
                            <label class="control-label"><?= 'Nombre'?></label>
                            <div class="controls">
                                <select name="nombre" class="uniform" style="width:100%;">
                                    <?php
                                    $elements = $this->db->get('nombre_materias')->result_array();
                                    foreach ($elements as $element){
                                        echo '<option value="'.$element['materia'].'">'.$element['materia'].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('curso'); ?></label>

                            <div class="controls">
                                <select name="curso" class="uniform" style="width:100%;">
                                    <?php
                                    $cursos = $this->db->get('hs_cursos')->result_array();
                                    foreach ($cursos as $row):
                                        ?>
                                        <option
                                            value="<?php echo $row['id']; ?>"><?php echo $row['nombre'].' - Sección '. $row['seccion']; ?></option>
                                    <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?= 'Profesor(a)'?></label>
                            <div class="controls">
                                <select name="profesor" class="uniform" style="width:100%;">
                                    <?php
                                    $profesores = $this->db->get('teacher')->result_array();
                                    foreach ($profesores as $profesor){
                                        echo '<option value="'.$profesor['teacher_id'].'">'.$profesor['name'].' '.$profesor['papellido'].'</option>';
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
