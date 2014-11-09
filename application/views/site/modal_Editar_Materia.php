<div class="tab-pane box active" id="edit" style="padding: 5px">
    <div class="box-content">
        <?php foreach ($edit_data as $row): ?>
            <?php echo form_open('site/materias/do_update/' . $row['id'], array('class' => 'form-horizontal validatable', 'target' => '_top')); ?>
            <div class="padded">
                <div class="control-group">
                    <label class="control-label"><?php echo get_phrase('curso'); ?></label>

                    <div class="controls">
                        <select name="curso" class="uniform" style="width:100%;" onchange="ajaxMaterias(this.value);">
                            <option value="0"><?= 'Seleccionar Curso' ?></option>
                            <?php
                            $cursos = $this->db->get('hs_cursos')->result_array();
                            foreach ($cursos as $row):
                                ?>
                                <option
                                    value="<?php echo $row['id']; ?>"><?php echo $this->crud_model->get_class_name($row['curso']).' - Sección '. $row['seccion']; ?></option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?= 'Materia'?></label>
                    <div class="controls">
                        <select name="materias" id="materias" class="uniform">
                            <option value="0"><?= 'Seleccionar materia' ?></option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?= 'Profesor(a)'?></label>
                    <div class="controls">
                        <select name="profesor" class="uniform" style="width:100%;">
                            <?php
                            $profesores = $this->db->get_where('hs_users', array('rol' => 3))->result_array();
                            foreach ($profesores as $profesor){
                                echo '<option value="'.$profesor['user_id'].'">'.$profesor['name'].' '.$profesor['papellido'].'</option>';
                            }
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

<script type="text/javascript">

    function ajaxEstudiantes(valor) {

        $.post('<?php echo site_url()?>ajax/obtenCursos',
            {'estudiante': valor },
            function (data) {
                $('#cursos').html(data);
            });
    }

    function ajaxMaterias(valor) {
        $('#materias').empty();

        $.post('<?php echo site_url()?>ajax/obtenCursosMaterias',
            {'curso': valor },
            function (data) {
                $('#materias').html(data);
            });
    }

$('select[name=nombre]').val('<?php echo $element['materia']; ?>');
$('select[name=curso]').val('<?php echo $row['curso']; ?>');
$('select[name=profesor]').val('<?php echo $row['profesor']; ?>');
</script>
