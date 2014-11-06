<div class="tab-pane box active" id="edit" style="padding: 5px">

    <div class="box-content">
        <?php foreach ($edit_data as $row): ?>
            <?php echo form_open('site/periodo/do_update/' . $row['id'], array('class' => 'form-horizontal validatable', 'target' => '_top')); ?>

            <div class="padded">

                <div class="control-group">

                    <label class="control-label"><?php echo get_phrase('name'); ?></label>

                    <div class="controls">

                        <input type="text" class="validate[required]" name="nombre_periodo" value="<?php echo $row['nombre_periodo']; ?>"/>

                    </div>

                </div>

                <div class="control-group">

                    <label class="control-label"><?php echo get_phrase('fecha_de_inicio'); ?></label>

                    <div class="controls">

                        <?php $f_ini= strtotime($row['fecha_inicio']);
                              $date_ini= date('m/d/Y',$f_ini);
                        ?>

                        <input type="text" class="datepicker fill-up" name="fecha_inicio"
                               value="<?php echo $date_ini; ?>"/>

                    </div>

                </div>
                <div class="control-group">

                    <label class="control-label"><?php echo get_phrase('fecha_de_fin'); ?></label>

                    <div class="controls">

                        <?php $f_fin= strtotime($row['fecha_fin']);
                              $date_fin= date('m/d/Y',$f_fin);
                        ?>

                        <input type="text" class="datepicker fill-up" name="fecha_fin"
                               value="<?php echo $date_fin; ?>"/>

                    </div>

                </div>
                <div class="control-group">

                    <label class="control-label"><?php echo get_phrase('Duración'); ?></label>

                    <div class="controls">

                        <input type="text" class="validate[required]" name="duracion" value="<?php echo $row['duracion']; ?>"/>

                    </div>

                </div>


            </div>

            <div class="form-actions">

                <button type="submit" class="btn btn-gray"><?php echo get_phrase('editar_período'); ?></button>

            </div>

            </form>

        <?php endforeach; ?>

    </div>

</div>
