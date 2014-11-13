<div class="tab-pane box active" id="edit" style="padding: 5px">
    <div class="box-content">
        <?php foreach ($edit_data as $row): ?>
            <?php echo form_open('site/materias/do_update/' . $row['id'], array('onsubmit' => 'return validateForm()','name' => 'editar_materias','class' => 'form-horizontal validatable', 'target' => '_top')); ?>
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
                            <option value="0"><?= 'Seleccionar Materia' ?></option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?= 'Profesor(a)'?></label>
                    <div class="controls">
                        <select name="profesor" class="uniform" style="width:100%;">
                            <option value="0"><?= 'Seleccionar Profesor' ?></option>
                            <?php
                            $profesores = $this->db->get_where('hs_users', array('rol' => 2))->result_array();
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

    function ajaxMaterias(valor) {
        $('#materias').empty();

        $.post('<?php echo site_url()?>ajax/obtenCursosMaterias',
            {'curso': valor },
            function (data) {
                $('#materias').html(data);
            });
    }

    function validateForm() {
    var curso = document.forms["editar_materias"]["curso"].value;
    var materias = document.forms["editar_materias"]["materias"].value;
    var profesor = document.forms["editar_materias"]["profesor"].value;
        if (curso == 0) {
            alert("Debe seleccionar un curso");
            return false;
        }
        if (materias == 0) {
            alert("Debe seleccionar una materia");
            return false;
        }
        if (profesor == 0) {
            alert("Debe seleccionar un profesor");
            return false;
        }
    }
</script>
