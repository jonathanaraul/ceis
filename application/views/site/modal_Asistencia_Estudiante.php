<div class="tab-pane box active" id="evaluar" style="padding: 5px">

    <div class="box-content">

        <?php foreach ($edit_data as $row): ?>

            <?php echo form_open('site/asistencias/anotar/'.$curso.'/'.$materia.'/'.$id_estudiante, array('class' => 'form-horizontal validatable', 'target' => '_top')); ?>

            <div class="padded">
                <div class="control-group">
                    <label class="control-label" style="font-weight:bold"><?= 'Cedula' ?></label>
                    <div class="controls">
                        <input type="text" class="uniform" disabled name="cedula" value="<?php echo $row['cedula']?>" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" style="font-weight:bold"><?= 'Nombre' ?></label>
                    <div class="controls">
                        <input type="text" class="uniform" disabled name="nombre" value="<?php echo $row['nombre'].' '.$row['snombre']?>" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" style="font-weight:bold"><?= 'Apellidos' ?></label>
                    <div class="controls">
                        <input type="text" class="uniform" disabled name="apellidos" value="<?php echo $row['papellido'].' '.$row['sapellido']?>" />
                    </div>
                </div>
                <center><h3><label style="font-weight:bold"><?= 'ASISTENCIA' ?></label></h3></center>

                <div class="control-group">
                    <label class="control-label" style="font-weight:bold"><?= 'Fecha' ?></label>
                    <div class="controls">
                        <input type="text" class="datepicker fill-up" required name="fecha" id="fecha" data-date-format="dd/mm/yyyy"/>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" style="font-weight:bold"><?= 'Presente' ?></label>
                    <div class="controls">
                        Si <input type="radio" name="presente" value="1">
                        No <input type="radio" name="presente" value="0" checked>
                    </div>
                </div>
            </div>
            <div class="form-actions">

                <button type="submit" class="btn btn-gray"><?php echo get_phrase('Guardar Notas'); ?></button>

            </div>

            </form>

        <?php endforeach; ?>

    </div>

</div>