<div class="tab-pane box active" id="evaluar" style="padding: 5px">

    <div class="box-content">

        <?php foreach ($edit_data as $row): ?>

            <?php echo form_open('site/notas/evaluar/'.$curso.'/'.$materia.'/'.$evaluacion.'/'.$id_estudiante, array('class' => 'form-horizontal validatable', 'target' => '_top')); ?>

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
                <center><h3><label style="font-weight:bold"><?= 'NOTAS' ?></label></h3></center>

                <div class="control-group">
                    <label class="control-label" style="font-weight:bold"><?= 'Nota 1' ?></label>
                    <div class="controls">
                        <input type="number" step="0.01" name="nota1" min="0" max="10">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" style="font-weight:bold"><?= 'Nota 2' ?></label>
                    <div class="controls">
                        <input type="number" step="0.01" name="nota2" min="0" max="10">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" style="font-weight:bold"><?= 'Nota 3' ?></label>
                    <div class="controls">
                        <input type="number" step="0.01" name="nota3" min="0" max="10">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" style="font-weight:bold"><?= 'Definitiva' ?></label>
                    <div class="controls">
                        <input type="number" step="0.01" name="def" min="0" max="10">
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
<?php
    $result = $this->db->get_where('hs_notas', array('estudiante' => $id_estudiante, 'curso' => $curso, 'materia' => $materia, 'evaluacion' => $evaluacion))->num_rows();
    if ($result > 0) {
    $notas = $this->db->get_where('hs_notas', array('estudiante' => $id_estudiante, 'curso' => $curso, 'materia' => $materia, 'evaluacion' => $evaluacion))->result_array();
?>
<script type="text/javascript">
$("[name='nota1']").val('<?php echo $notas[0]['nota1']; ?>');
$("[name='nota2']").val('<?php echo $notas[0]['nota2']; ?>');
$("[name='nota3']").val('<?php echo $notas[0]['nota3']; ?>');
$("[name='def']").val('<?php echo $notas[0]['def']; ?>');
</script>
<?php 
    }
?>
