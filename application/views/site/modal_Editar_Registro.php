<div class="tab-pane box active" id="edit" style="padding: 5px">

    <div class="box-content">

        <?php foreach ($edit_data as $row): ?>

            <?php echo form_open('site/configurar_cursos/do_update/' . $row['id'], array('class' => 'form-horizontal validatable', 'target' => '_top')); ?>

            <div class="padded">

                <div class="control-group">
                    <label class="control-label"><?= 'Curso' ?></label>
                    <div class="controls">
                        <input type="text" disabled style="width:100%" value="<?php echo $this->crud_model->get_class_name($row['curso']);?>" />
                        <input type="hidden" name="curso" value="<?php echo $row['curso'];?>">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?php echo get_phrase('materia'); ?></label>
                    <div class="controls">
                        <select name="materias" style="width:100%;" >
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

                <button type="submit" class="btn btn-gray"><?php echo get_phrase('editar_curso'); ?></button>

            </div>

            </form>

        <?php endforeach; ?>

    </div>

</div>