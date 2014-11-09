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
                            <div><?php echo get_phrase('curso'); ?></div>
                        </th>
                        <th>
                            <div><?php echo get_phrase('materia'); ?></div>
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
                    foreach ($configurar_cursos as $row): ?>
                        <?php 
                            if($this->session->userdata('rol') == 1){
                        ?>                        
                        <tr>
                            <td><?= $count++; ?></td>
                            <td><?php echo $this->crud_model->get_hs_cursos_nombre($row['curso']); ?></td>
                            <td><?php echo $this->crud_model->get_nombre_materia_by_id($row['materia']); ?></td>
                            <td align="center">
                                <a data-toggle="modal" href="#modal-form"
                                   onclick="modal('Editar_Registro',<?php echo $row['id']; ?>)"
                                   class="btn btn-gray btn-small">
                                    <i class="icon-wrench"></i> <?php echo get_phrase('edit'); ?>
                                </a>
                                <a data-toggle="modal" href="#modal-delete"
                                   onclick="modal_delete('<?php echo base_url(); ?>index.php?site/configurar_cursos/delete/<?php echo $row['id']; ?>')"
                                   class="btn btn-red btn-small">
                                    <i class="icon-trash"></i> <?php echo get_phrase('delete'); ?>
                                </a>
                            </td>
                        </tr>
                        <?php }?>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!----TABLE LISTING ENDS--->


<!----CREATION FORM STARTS---->

<div class="tab-pane box" id="add" style="padding: 5px">

    <div class="box-content">

        <?php echo form_open('site/configurar_cursos/create', array('class' => 'form-horizontal validatable', 'target' => '_top')); ?>

        <div class="padded">

            <div class="control-group">
                <label class="control-label"><?= 'Curso'?></label>
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
                <label class="control-label"><?php echo get_phrase('materia'); ?></label>
                <div class="controls">
                    <select name="materias[]" id="materias" style="width:660px;" multiple="multiple" >
                        <?php
                        $elements = $this->db->get('nombre_materias')->result_array();
                        foreach ($elements as $element):
                            ?>
                            <option
                                value="<?php echo $element['id']; ?>"> <?php echo $element['materia']; ?> </option>
                        <?php
                        endforeach;
                        ?>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn btn-gray"><?php echo get_phrase('add_class'); ?></button>
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


</script>