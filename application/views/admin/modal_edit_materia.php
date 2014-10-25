<div class="tab-pane box active" id="edit" style="padding: 5px">
    <div class="box-content">
        <?php foreach ($edit_data as $row): ?>
            <?php echo form_open('admin/materias/do_update/' . $row['id'], array('class' => 'form-horizontal validatable', 'target' => '_top')); ?>
            <div class="padded">
                <div class="control-group">
                    <label class="control-label"><?php echo get_phrase('name'); ?></label>

                    <div class="controls">
                        <input type="text" class="validate[required]" name="nombre" value="<?php echo $row['nombre']; ?>"/>
                    </div>
                </div>
                <div class="control-group">
                    <div class="control-group">
                        <label class="control-label"><?php echo get_phrase('curso'); ?></label>

                        <div class="controls">
                            <select name="curso" class="uniform" style="width:100%;">
                                <?php
                                $cursos = $this->db->get('class')->result_array();
                                foreach ($cursos as $row):
                                    ?>
                                    <option
                                        value="<?php echo $row['class_id']; ?>"><?php echo $row['name']; ?></option>
                                <?php
                                endforeach;
                                ?>
                            </select>
                        </div>
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