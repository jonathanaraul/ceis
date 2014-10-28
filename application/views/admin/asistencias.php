<div class="box">
    <div class="box-header">

        <!--CONTROL TABS START-->
        <ul class="nav nav-tabs nav-tabs-left">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="icon-align-justify"></i>
                    <?php echo get_phrase('lista_de_asistencias'); ?>
                </a></li>
        </ul>
        <!--CONTROL TABS END-->

    </div>
    <div class="box-content padded">
        <!--TABLE LISTING STARTS-->
        <div
            class="tab-pane  <?php if (!isset($edit_data) && !isset($personal_profile) && !isset($academic_result)) echo 'active'; ?>"
            id="list">
            <center>
                <?php echo form_open('admin/asistencias'); ?>
                <table border="0" cellspacing="0" cellpadding="0" class="table table-normal box">
                    <tr>
                        <td><?= 'Seleccionar curso'; ?></td>
                        <td><?= 'Seleccionar materia'; ?></td>
                        <td><?= 'Seleccionar Fecha'; ?></td>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            <select name="cursos" id="cursos" onchange="ajaxMaterias(this.value);">
                                <option value="0"><?= 'Seleccionar curso' ?></option>
                                <?php
                                $classes = $this->db->get('hs_cursos')->result_array();
                                foreach ($classes as $row) {
                                    echo '<option value="' . $row['id'] . '">' . $row['nombre'] . '</option>';
                                }
                                ?>
                            </select>
                        </td>
                        <td>
                            <select name="materias" id="materias">
                                <option value="0"><?= 'Seleccionar materia' ?></option>
                            </select>
                        </td>
                        <td>
                             <input type="text" class="datepicker fill-up" name="fecha" id="fecha"/>
                        </td>
                        <td>
                            <input type="button" class="btn btn-normal btn-gray" value="Consultar"
                                   onclick="consultarAsistencias(this.value)">
                        </td>
                    </tr>
                </table>
                </form>
            </center>


            <br/><br/>
            <div id="loader" style="display: none">
                <p style="text-align: center">
                    <img src="<?php echo base_url();?>template/images/loader.gif">
                </p>
            </div>
            <div id="lista_de_asistencia" style="background-color:  #eaebef;padding: 7px 11px;display: none">

            </div>
    
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
        <!--TABLE LISTING ENDS-->

    </div>
</div>
</div>

<script type="text/javascript">

    function consultarAsistencias(valor) {

        var curso = $('#cursos').val();
        var materia = $('#materias').val();
        var fecha = $('#fecha').val();

        if (curso <= 0 || materia <= 0 ) {
            alert('Debe llenar los tres campos');
            return false;
        }
        if(fecha==''){
            alert('Debe llenar los tres campos');
            return false; 
        }

        $('#lista_de_asistencia').empty();

        $('#loader').css('display','block');
        var data = 'curso=' + curso + '&materia=' + materia + '&fecha=' + fecha;

        $.post('<?php echo site_url()?>ajax/listarAsistencias',
            data,
            function (data) {

                $('#lista_de_asistencia').html(data);
                $('#loader').css('display','none');
                $('#lista_de_asistencia').css('display','block');
            });
    }

    function ajaxMaterias(valor) {
        $('#materias').empty();
        $('#materias').prev().html('');

        $.post('<?php echo site_url()?>ajax/obtenMaterias',
            {'curso': valor },
            function (data) {
                $('#materias').html(data);
            });
    }

    function actualizarAsistencias(){
        var data = '';
        $.each($(".recopila"), function (index, value) {
            var helper = $.trim($(value).val());
            var id = $(value).attr('name');
            data += '&' + id + '=' + helper;
        });
        console.log(data);
        return false;
        $.post('new-element', data, function (response) {
            if (response.eval == true) {
                location.reload();
            }
        })
    }
   
</script>