<div class="box">
    <div class="box-header">

        <!------CONTROL TABS START------->
        <ul class="nav nav-tabs nav-tabs-left">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="icon-align-justify"></i>
                    <?php echo get_phrase('manage_marks'); ?>
                </a></li>
        </ul>
        <!------CONTROL TABS END------->

    </div>
    <div class="box-content padded">
        <!----TABLE LISTING STARTS--->
        <div
            class="tab-pane  <?php if (!isset($edit_data) && !isset($personal_profile) && !isset($academic_result)) echo 'active'; ?>"
            id="list">
            <center>
                <?php echo form_open('admin/marks'); ?>
                <table border="0" cellspacing="0" cellpadding="0" class="table table-normal box">
                    <tr>
                        <td><?= 'Seleccionar curso'; ?></td>
                        <td><?= 'Seleccionar materia'; ?></td>
                        <td><?= 'Seleccionar evaluacion'; ?></td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            <select name="cursos" id="cursos" onchange="ajaxMaterias(this.value);">
                                <option value="0"><?= 'Seleccionar curso' ?></option>
                                <?php
                                $classes = $this->db->get('hs_cursos')->result_array();
                                foreach ($classes as $row){
                                    echo '<option value="'.$row['id'].'">'.$row['nombre'].'</option>';
                                 }
                                ?>
                            </select>
                        </td>
                        <td>
                            <select name="materias" id="materias" onchange="ajaxEvaluaciones(this.value);">
                                <option value="0"><?= 'Seleccionar materia' ?></option>
                            </select>
                        </td>
                        <td>
                            <select name="evaluaciones" id="evaluaciones">
                                <option value="0"><?= 'Seleccionar evaluacion' ?></option>
                                ?>
                            </select>
                        </td>
                        <td>
                            <input type="hidden" name="operation" value="selection"/>
                            <input type="submit" value="<?php echo get_phrase('manage_marks'); ?>"
                                   class="btn btn-normal btn-gray"/>
                        </td>
                    </tr>
                </table>
                </form>
            </center>


            <br/><br/>


            <?php if ($exam_id > 0 && $class_id > 0 && $subject_id > 0): ?>
                <?php
                ////CREATE THE MARK ENTRY ONLY IF NOT EXISTS////
                $students = $this->crud_model->get_students($class_id);
                foreach ($students as $row):
                    $verify_data = array('exam_id' => $exam_id,
                        'class_id' => $class_id,
                        'subject_id' => $subject_id,
                        'student_id' => $row['student_id']);
                    $query = $this->db->get_where('mark', $verify_data);

                    if ($query->num_rows() < 1)
                        $this->db->insert('mark', $verify_data);
                endforeach;
                ?>
                <table class="table table-normal box">
                    <thead>
                    <tr>
                        <td><?php echo get_phrase('student'); ?></td>
                        <td><?php echo get_phrase('mark_obtained'); ?>(out of 100)</td>
                        <td><?php echo get_phrase('attendance'); ?></td>
                        <td><?php echo get_phrase('comment'); ?></td>
                        <td></td>
                    </tr>
                    </thead>
                    <tbody>

                    <?php
                    $students = $this->crud_model->get_students($class_id);
                    foreach ($students as $row):

                        $verify_data = array('exam_id' => $exam_id,
                            'class_id' => $class_id,
                            'subject_id' => $subject_id,
                            'student_id' => $row['student_id']);

                        $query = $this->db->get_where('mark', $verify_data);
                        $marks = $query->result_array();
                        foreach ($marks as $row2):
                            ?>
                            <?php echo form_open('admin/marks'); ?>
                            <tr>
                                <td>
                                    <?php echo $row['name']; ?>
                                </td>
                                <td>
                                    <input type="number" value="<?php echo $row2['mark_obtained']; ?>"
                                           name="mark_obtained"/>

                                </td>
                                <td>
                                    <input type="number" value="<?php echo $row2['attendance']; ?>" name="attendance"/>
                                </td>
                                <td>
                                    <textarea name="comment"><?php echo $row2['comment']; ?></textarea>
                                </td>
                                <td>
                                    <input type="hidden" name="mark_id" value="<?php echo $row2['mark_id']; ?>"/>

                                    <input type="hidden" name="exam_id" value="<?php echo $exam_id; ?>"/>
                                    <input type="hidden" name="class_id" value="<?php echo $class_id; ?>"/>
                                    <input type="hidden" name="subject_id" value="<?php echo $subject_id; ?>"/>

                                    <input type="hidden" name="operation" value="update"/>
                                    <button type="submit" class="btn btn-normal btn-gray"> Update</button>
                                </td>
                            </tr>
                            </form>
                        <?php
                        endforeach;
                    endforeach;
                    ?>
                    </tbody>
                </table>

            <?php endif; ?>
        </div>
        <!----TABLE LISTING ENDS--->

    </div>
</div>
</div>

<script type="text/javascript">
    function ajaxMaterias(valor) {
        $('#materias').empty();
        $('#materias').prev().html('');

        if(valor==0){
            $('#evaluaciones').empty();
            $('#evaluaciones').prev().html('');
            $('#evaluaciones').html('<option value="0">Seleccionar evaluacion</option>');
        }

        $.post('<?php echo site_url()?>ajax/obtenMaterias',
            {'curso': valor },
            function (data) {
                $('#materias').html(data);
            });
    }
    function ajaxEvaluaciones(valor) {
        $('#evaluaciones').empty();
        $('#evaluaciones').prev().html('');

        $.post('<?php echo site_url()?>ajax/obtenEvaluaciones',
            {'materia': valor },
            function (data) {
                $('#evaluaciones').html(data);
            });
    }
    function show_subjects(class_id) {
        for (i = 0; i <= 100; i++) {

            try {
                document.getElementById('subject_id_' + i).style.display = 'none';
                document.getElementById('subject_id_' + i).setAttribute("name", "temp");
            }
            catch (err) {
            }
        }
        document.getElementById('subject_id_' + class_id).style.display = 'block';
        document.getElementById('subject_id_' + class_id).setAttribute("name", "subject_id");
    }

</script>