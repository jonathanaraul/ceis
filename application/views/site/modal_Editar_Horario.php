<div class="tab-pane box active" id="edit" style="padding: 5px">
    <div class="box-content">
        <?php foreach ($edit_data as $row): ?>
            <?php echo form_open('site/horarios_materias/do_update/' . $row['id'], array('onsubmit' => 'return validateForm()','name' => 'editar_horarios','class' => 'form-horizontal validatable', 'target' => '_top')); ?>
            <div class="padded">
                <div class="control-group">
                    <label class="control-label"><?php echo get_phrase('Curso Actual'); ?></label><span style="font-weight: bold;"><?= $this->crud_model->get_hs_cursos_nombre($row['curso']); ?></span>
                </div>
                <div class="control-group">
                    <label class="control-label"><?php echo get_phrase('nuevo_curso'); ?></label>

                    <div class="controls">
                        <select name="cursos" class="uniform" onchange="ajaxMaterias(this.value)" style="width:100%;">
                            <?php
                            $cursos = $this->db->get('hs_cursos')->result_array();
                            ?>
                                <option value="0">Seleccione un Curso</option>
                            <?php
                            foreach ($cursos as $row2):
                                ?>
                                <option value="<?php echo $row2['id']; ?>"><?php echo $this->crud_model->get_hs_cursos_nombre($row2['curso']); ?></option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?php echo get_phrase('Materia Actual'); ?></label><span style="font-weight: bold;"><?= $this->crud_model->get_subject_name_by_id2($row['materia']); ?></span>
                </div>
                <div class="control-group">
                    <label class="control-label"><?php echo get_phrase('Nueva Materia'); ?></label>

                    <div class="controls">
                        <select name="materias" id="materias" class="uniform" style="width:100%;">
                            <option value="0">Seleccione una Materia</option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?php echo get_phrase('day'); ?></label>

                    <div class="controls">
                        <select name="dia" class="uniform" style="width:100%;">
                            <option
                                value="0"    <?php if ($row['dia'] == '0') echo 'selected="selected"'; ?>>
                                Domingo
                            </option>
                            <option
                                value="1"        <?php if ($row['dia'] == '1') echo 'selected="selected"'; ?>>
                                Lunes
                            </option>
                            <option
                                value="2"        <?php if ($row['dia'] == '2') echo 'selected="selected"'; ?>>
                                Martes
                            </option>
                            <option
                                value="3"    <?php if ($row['dia'] == '3') echo 'selected="selected"'; ?>>
                                Miercoles
                            </option>
                            <option
                                value="4"    <?php if ($row['dia'] == '4') echo 'selected="selected"'; ?>>
                                Jueves
                            </option>
                            <option
                                value="5"    <?php if ($row['dia'] == '5') echo 'selected="selected"'; ?>>
                                Viernes
                            </option>
                            <option
                                value="6"        <?php if ($row['dia'] == '6') echo 'selected="selected"'; ?>>
                                Sabado
                            </option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?php echo get_phrase('starting_time'); ?></label>

                    <div class="controls">
                        <?php
                        if ($row['hora_inicio'] < 13) {
                            $hora_inicio = $row['hora_inicio'];
                            $starting_ampm = 1;
                        } else if ($row['hora_inicio'] > 12) {
                            $hora_inicio = $row['hora_inicio'] - 12;
                            $starting_ampm = 2;
                        }

                        ?>
                        <select name="time_start" class="uniform" style="width:100%;">
                            <?php for ($i = 0; $i <= 12; $i++): ?>
                                <option
                                    value="<?php echo $i; ?>" <?php if ($i == $hora_inicio) echo 'selected="selected"'; ?>>
                                    <?php echo $i; ?></option>
                            <?php endfor; ?>
                        </select>
                        Minutos: <select name="minutos_hora_inicio" class="uniform" style="width:100%;">
                                    <?php for($i=0;$i<=5;$i++)
                                                {
                                                     for($ii=0;$ii<=9;$ii++)
                                                            {
                                                                $iii=$i.$ii;
                                                                if ($iii == $row['minutos_hora_inicio']) {
                                                                    echo "<option value='".$i,$ii."' selected='selected'>".$i,$ii."</option>";
                                                                }
                                                                  echo "<option value='".$i,$ii."'>".$i,$ii."</option>";
                                                             }
                                                }
                                    ?>
                                </select>
                        <select name="starting_ampm" class="uniform" style="width:100%">
                            <option value="1" <?php if ($starting_ampm == '1') echo 'selected="selected"'; ?>>am
                            </option>
                            <option value="2" <?php if ($starting_ampm == '2') echo 'selected="selected"'; ?>>pm
                            </option>
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?php echo get_phrase('ending_time'); ?></label>

                    <div class="controls">
                        <?php
                        if ($row['hora_fin'] < 13) {
                            $hora_fin = $row['hora_fin'];
                            $ending_ampm = 1;
                        } else if ($row['hora_fin'] > 12) {
                            $hora_fin = $row['hora_fin'] - 12;
                            $ending_ampm = 2;
                        }

                        ?>
                        <select name="time_end" class="uniform" style="width:100%;">
                            <?php for ($i = 0; $i <= 12; $i++): ?>
                                <option
                                    value="<?php echo $i; ?>" <?php if ($i == $hora_fin) echo 'selected="selected"'; ?>>
                                    <?php echo $i; ?></option>
                            <?php endfor; ?>
                        </select>
                        Minutos: <select name="minutos_hora_fin" class="uniform" style="width:100%;">
                                    <?php for($i=0;$i<=5;$i++)
                                                {
                                                     for($ii=0;$ii<=9;$ii++)
                                                            {
                                                                 $iii=$i.$ii;
                                                                 if ($iii == $row['minutos_hora_fin']) {
                                                                            echo "<option value='".$i,$ii."' selected='selected'>".$i,$ii."</option>";
                                                                 }
                                                                 echo "<option value='".$i,$ii."'>".$i,$ii."</option>";
                                                             }
                                                }
                                    ?>
                                </select>
                        <select name="ending_ampm" class="uniform" style="width:100%">
                            <option value="1" <?php if ($ending_ampm == '1') echo 'selected="selected"'; ?>>am</option>
                            <option value="2" <?php if ($ending_ampm == '2') echo 'selected="selected"'; ?>>pm</option>
                        </select>
                    </div>
                </div>

            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-gray"><?php echo get_phrase('edit_class_routine'); ?></button>
            </div>
            </form>
        <?php endforeach; ?>
    </div>
</div>

<script type="text/javascript">

    function ajaxMaterias(valor) {

            $('#materias').empty();

            $.post('<?php echo site_url()?>ajax/obtenMaterias',
                {'curso': valor },
                function (data) {
                    $('#materias').html(data);
                });
    }

    function validateForm() {
    var curso = document.forms["editar_horarios"]["cursos"].value;
    var materias = document.forms["editar_horarios"]["materias"].value;
        if (curso == 0) {
            alert("Debe seleccionar un curso");
            return false;
        }
        if (materias == 0) {
            alert("Debe seleccionar una materia");
            return false;
        }
    }

</script>