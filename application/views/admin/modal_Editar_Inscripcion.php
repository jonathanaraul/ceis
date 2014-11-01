<div class="tab-pane box active" id="edit" style="padding: 5px">
    <div class="box-content">
        <?php foreach ($edit_data as $row): ?>
            <?php echo form_open('admin/inscripcion/do_update/' . $row['id'], array('class' => 'form-horizontal validatable', 'target' => '_top')); ?>
            <div class="padded">
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('estudiante'); ?></label>

                            <div class="controls">
                                <select name="estudiante" class="uniform" style="width:100%;">
                                    <?php
                                    $this->db->order_by("student_id", "desc");
                                    $objects = $this->db->get('student')->result_array();
                                    foreach ($objects as $object):
                                        ?>
                                        <option value="<?php echo $object['student_id']; ?>">
                                            <?php echo $object['name'] . ' ' . $object['papellido'] . ' - ' . $object['ndocumento']; ?> </option>
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
                                    <?php
                                    $objects = $this->db->get('hs_cursos')->result_array();
                                    foreach ($objects as $object):
                                        ?>
                                        <option value="<?php echo $object['id']; ?>">
                                            <?php echo $object['nombre'] . ' ' . $object['seccion']; ?> </option>
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
                                    <option value="0">Preinscripcion</option>
                                    <option value="1">Inscripcion</option>
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

