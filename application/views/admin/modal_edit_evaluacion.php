<div class="tab-pane box active" id="edit" style="padding: 5px">

    <div class="box-content">
        <?php foreach ($edit_data as $row): ?>
            <?php echo form_open('admin/evaluaciones/do_update/' . $row['id'], array('class' => 'form-horizontal validatable', 'target' => '_top')); ?>

            <div class="padded">

                <div class="control-group">

                    <label class="control-label"><?php echo get_phrase('name'); ?></label>

                    <div class="controls">

                        <input type="text" class="validate[required]" name="nombre" value="<?php echo $row['nombre']; ?>"/>

                    </div>

                </div>

                <div class="control-group">

                    <label class="control-label"><?php echo get_phrase('materia'); ?></label>

                    <div class="controls">

                        <select name="materia" class="uniform" style="width:100%;">
                            <?php
                            $elements = $this->db->get('hs_materias')->result_array();
                            foreach ($elements as $element):
                                ?>
                                <option
                                    value="<?php echo $element['id']; ?>"> <?php echo $element['nombre']; ?> </option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                    </div>

                </div>
                <div class="control-group">

                    <label class="control-label"><?php echo get_phrase('ponderación'); ?></label>

                    <div class="controls">

                        <input type="text" class="validate[required]" name="ponderacion" value="<?php echo $row['ponderacion']; ?>"/>

                    </div>

                </div>
                <div class="control-group">

                    <label class="control-label"><?php echo get_phrase('fecha'); ?></label>

                    <div class="controls">

                        <input type="text" class="validate[required]" name="fecha" value="<?php echo $row['fecha']; ?>"/>

                    </div>

                </div>


            </div>

            <div class="form-actions">

                <button type="submit" class="btn btn-gray"><?php echo get_phrase('editar_evaluación'); ?></button>

            </div>

            </form>

        <?php endforeach; ?>

    </div>

</div>