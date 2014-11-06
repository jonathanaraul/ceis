<div class="tab-pane box active" id="edit" style="padding: 5px">
    <div class="box-content">
        <?php foreach ($edit_data as $row): ?>
            <?php echo form_open('site/materias/do_update/' . $row['id'], array('class' => 'form-horizontal validatable', 'target' => '_top')); ?>
            <div class="padded">
                <div class="control-group">
                    <label class="control-label"><?= 'Nombre'?></label>
                    <div class="controls">
                        <select name="nombre" class="uniform" style="width:100%;">
                            <?php
                            $elements = $this->db->get('nombre_materias')->result_array();
                            foreach ($elements as $element){
                                echo '<option value="'.$element['materia'].'">'.$element['materia'].'</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <div class="control-group">
                        <label class="control-label"><?php echo get_phrase('curso'); ?></label>

                        <div class="controls">
                            <select name="curso" class="uniform" style="width:100%;">
                                <?php
                                $cursos = $this->db->get('hs_cursos')->result_array();
                                foreach ($cursos as $curso):
                                    ?>
                                    <option
                                        value="<?php echo $curso['id']; ?>"><?php echo $curso['nombre']; ?></option>
                                <?php
                                endforeach;
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label"><?= 'Profesor(a)'?></label>
                        <div class="controls">
                            <select name="profesor" class="uniform" style="width:100%;">
                                <?php
                                $profesores = $this->db->get('teacher')->result_array();
                                foreach ($profesores as $profesor){
                                    echo '<option value="'.$profesor['teacher_id'].'">'.$profesor['name'].' '.$profesor['papellido'].'</option>';
                                }
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

<script type="text/javascript">

    function ajaxEstudiantes(valor) {

        $.post('<?php echo site_url()?>ajax/obtenCursos',
            {'estudiante': valor },
            function (data) {
                $('#cursos').html(data);
            });
    }

$('select[name=nombre]').val('<?php echo $element['materia']; ?>');
$('select[name=curso]').val('<?php echo $row['curso']; ?>');
$('select[name=profesor]').val('<?php echo $row['profesor']; ?>');
</script>
