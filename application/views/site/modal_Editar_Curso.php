<div class="tab-pane box active" id="edit" style="padding: 5px">

    <div class="box-content">

        <?php foreach ($edit_data as $row): ?>

            <?php echo form_open('site/cursos/do_update/' . $row['id'], array('class' => 'form-horizontal validatable', 'target' => '_top')); ?>

            <div class="padded">

                <div class="control-group">
                    <label class="control-label"><?php echo get_phrase('Curso'); ?></label><span style="font-weight: bold;"><?= $this->crud_model->get_hs_cursos_nombre($row['curso']); ?></span>
                </div>
                <div class="control-group">
                    <label class="control-label">Sección</label>
                    <div class="controls">
                        <select name="seccion" class="uniform" style="width:100%;">
                            <option value="A"> A</option>
                            <option value="B"> B</option>
                            <option value="C"> C</option>
                            <option value="D"> D</option>
                            <option value="E"> E</option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?= 'Cupo Disponible' ?></label>
                    <div class="controls">
                        <input type="text" class="uniform" required name="cupo" value="<?php echo $row['cupo']?>" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?= 'Duración (horas)' ?></label>
                    <div class="controls">
                        <input type="text" class="uniform" required name="duracion" value="<?php echo $row['duracion']?>" />
                    </div>
                </div>
                <div class="control-group">
                <label class="control-label"><?= 'Fecha de Inicio' ?></label>
                    <div class="controls">
                    <input type="text" class="datepicker fill-up" required name="fecha_ini" value="<?php echo date("d/m/Y",strtotime($row['fecha_ini']));?>"/>
                    </div>
                </div>
                <div class="control-group">
                <label class="control-label"><?= 'Fecha de Culminación' ?></label>
                    <div class="controls">
                    <input type="text" class="datepicker fill-up" required name="fecha_cul" value="<?php echo date("d/m/Y",strtotime($row['fecha_cul']));?>"/>
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
$('select[name=curso]').val('<?php echo $row['curso']; ?>');
$('select[name=seccion]').val('<?php echo $row['seccion']; ?>');
</script>
