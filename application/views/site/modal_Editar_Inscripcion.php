<div class="tab-pane box active" id="edit" style="padding: 5px">
    <div class="box-content">
        <?php foreach ($edit_data as $row): ?>
            <?php echo form_open('site/inscripcion/do_update/' . $row['id'], array('class' => 'form-horizontal validatable', 'target' => '_top')); ?>
            <div class="padded">
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('estudiante'); ?></label>

                            <div class="controls">
                                <select name="estudiante" class="uniform" style="width:100%;">
                                    <?php
                                    $this->db->order_by("user_id", "desc");
                                    $objects = $this->db->get_where('hs_users', array('rol' => 2))->result_array();
                                    foreach ($objects as $object):
                                        ?>
                                        <option value="<?php echo $object['user_id']; ?>">
                                            <?php echo $object['name'] . ' ' . $object['papellido'] . ' ' . $object['sapellido']; ?> </option>
                                    <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="control-group" >
                            <label class="control-label"><?php echo get_phrase('curso'); ?></label>

                            <div class="controls" >
                                <select name="curso" class="uniform" style="width:100%;">
                                    <option value="0">Seleccione Curso</option>                                    
                                    <?php
                                    $objects = $this->db->get('hs_cursos')->result_array();
                                    foreach ($objects as $object):
                                    ?>
                                        <option value="<?php echo $object['id']; ?>">
                                            <?php echo $this->crud_model->get_class_name($object['curso']) . ' -- Seccion ' . $object['seccion']; ?> </option>
                                    <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('status'); ?></label>

                            <div class="controls">
                                <select name="status" class="uniform" style="width:100%;">
                                    <option value="0">Preinscrito</option>
                                    <option value="1">Inscrito</option>
                                </select>
                            </div>
                        </div>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-gray"><?php echo get_phrase('editar_curso'); ?></button>
            </div>
            </form>
        <?php endforeach; ?>
    </div>
</div>

<script type="text/javascript">
$('select[name=estudiante]').val('<?php echo $row['estudiante']; ?>');
$('select[name=curso]').val('<?php echo $row['curso']; ?>');
$('select[name=status]').val('<?php echo $row['status']; ?>');
</script>