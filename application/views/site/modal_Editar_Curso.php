<div class="tab-pane box active" id="edit" style="padding: 5px">

    <div class="box-content">

        <?php foreach ($edit_data as $row): ?>

            <?php echo form_open('site/cursos/do_update/' . $row['id'], array('class' => 'form-horizontal validatable', 'target' => '_top')); ?>

            <div class="padded">

                <div class="control-group">
                    <label class="control-label"><?= 'Nombre'?></label>
                    <div class="controls">
                        <select name="nombre" id="nombre_curso" class="uniform" style="width:100%;">
                            <?php
                            $elements = $this->db->get('class_name')->result_array();
                            foreach ($elements as $element){
                                echo '<option value="'.$element['nombre'].'">'.$element['nombre'].'</option>';
                            }
                            ?>
                        </select>
                    </div>
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
                        <input type="text" class="validate[required]" name="cupo" value="<?php echo $row['cupo']?>" />
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
$('select[name=nombre]').val('<?php echo $row['nombre']; ?>');
$('select[name=seccion]').val('<?php echo $row['seccion']; ?>');
$('select[name=periodo]').val('<?php echo $row['periodo']; ?>');
</script>
