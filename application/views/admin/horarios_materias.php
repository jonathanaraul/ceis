<div class="box">
    <div class="box-header">

        <!------CONTROL TABS START------->
        <ul class="nav nav-tabs nav-tabs-left">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="icon-align-justify"></i>
                    <?php echo get_phrase('class_routine_list'); ?>
                </a></li>
            <li>
                <a href="#add" data-toggle="tab"><i class="icon-plus"></i>
                    <?php echo get_phrase('add_class_routine'); ?>
                </a></li>
        </ul>
        <!------CONTROL TABS END------->

    </div>
    <div class="box-content padded">
        <div class="tab-content">
            <!----TABLE LISTING STARTS--->
            <div class="tab-pane active" id="list">
                <div class="accordion" id="accordion2">
                    <?php
                    $toggle = true;
                    $classes = $this->db->get('hs_cursos')->result_array();
                    foreach ($classes as $row):
                        ?>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2"
                                   href="#collapse<?php echo $row['id']; ?>">
                                    <i class="icon-rss icon-1x"></i> Curso: <?php echo $row['nombre']; ?>
                                </a>
                            </div>
                            <div id="collapse<?php echo $row['id']; ?>"
                                 class="accordion-body collapse <?php if ($toggle) {
                                     echo 'in';
                                     $toggle = false;
                                 } ?>">
                                <div class="accordion-inner">
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-normal">
                                        <tbody>
                                        <?php
                                        for ($d = 1; $d <= 7; $d++):

                                            if ($d == 1) $day = 'sunday';
                                            else if ($d == 2) $day = 'monday';
                                            else if ($d == 3) $day = 'tuesday';
                                            else if ($d == 4) $day = 'wednesday';
                                            else if ($d == 5) $day = 'thursday';
                                            else if ($d == 6) $day = 'friday';
                                            else if ($d == 7) $day = 'saturday';
                                            ?>
                                            <tr class="gradeA">
                                                <td width="100"><?php echo strtoupper($day); ?></td>
                                                <td>
                                                    <?php
                                                    $this->db->order_by("hora_inicio", "asc");
                                                    $this->db->where('dia', $dia);
                                                    $this->db->where('curso', $row['curso']);
                                                    $routines = $this->db->get('hs_horarios_materias')->result_array();
                                                    foreach ($routines as $row2):
                                                        ?>
                                                        <div class="btn-group">
                                                            <button class="btn btn-gray btn-normal dropdown-toggle"
                                                                    data-toggle="dropdown">
                                                                <?php echo $this->crud_model->get_subject_name_by_id($row2['materia']); ?>
                                                                <?php echo '(' . $row2['hora_inicio'] . '-' . $row2['hora_fin'] . ')'; ?>
                                                                <span class="caret"></span>
                                                            </button>
                                                            <ul class="dropdown-menu">
                                                                <li><a data-toggle="modal" href="#modal-form"
                                                                       onclick="modal('edit_class_routine',<?php echo $row2['id']; ?>)"><i
                                                                            class="icon-cog"></i> edit</a></li>
                                                                <li><a data-toggle="modal" href="#modal-delete"
                                                                       onclick="modal_delete('<?php echo base_url(); ?>index.php?admin/class_routine/delete/<?php echo $row2['id']; ?>')">
                                                                        <i class="icon-trash"></i> delete</a></li>
                                                            </ul>
                                                        </div>
                                                    <?php endforeach; ?>

                                                </td>
                                            </tr>
                                        <?php endfor; ?>

                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    <?php
                    endforeach;
                    ?>
                </div>
            </div>
            <!----TABLE LISTING ENDS--->


            <!----CREATION FORM STARTS---->
            <div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box-content">
                    <?php echo form_open('admin/class_routine/create', array('class' => 'form-horizontal validatable', 'target' => '_top')); ?>
                    <div class="padded">
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('class'); ?></label>

                            <div class="controls">
                               <select name="cursos" id="cursos" onchange="ajaxMaterias(this.value)" style="width:100%;">
                                <option value="0"><?= 'Seleccionar curso' ?></option>
                                <?php
                                $classes = $this->db->get('hs_cursos')->result_array();
                                foreach ($classes as $row) {
                                    echo '<option value="' . $row['id'] . '">' . $row['nombre'] . '</option>';
                                }
                                ?>
                            </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('materias'); ?></label>

                            <div class="controls">
                                <select name="materias" id="materias" class="uniform" style="width:100%;">
                                   
                                    <option value="0"><?='Seleccionar materia'?></option>
                                   
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('day'); ?></label>

                            <div class="controls">
                                <select name="day" class="uniform" style="width:100%;">
                                    <option value="sunday">sunday</option>
                                    <option value="monday">monday</option>
                                    <option value="tuesday">tuesday</option>
                                    <option value="wednesday">wednesday</option>
                                    <option value="thursday">thursday</option>
                                    <option value="friday">friday</option>
                                    <option value="saturday">saturday</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('starting_time'); ?></label>

                            <div class="controls">
                                <select name="time_start" class="uniform" style="width:100%;">
                                    <?php for ($i = 0; $i <= 12; $i++): ?>
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                    <?php endfor; ?>
                                </select>
                                <select name="starting_ampm" class="uniform" style="width:100%">
                                    <option value="1">am</option>
                                    <option value="2">pm</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('ending_time'); ?></label>

                            <div class="controls">
                                <select name="time_end" class="uniform" style="width:100%;">
                                    <?php for ($i = 0; $i <= 12; $i++): ?>
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                    <?php endfor; ?>
                                </select>
                                <select name="ending_ampm" class="uniform" style="width:100%">
                                    <option value="1">am</option>
                                    <option value="2">pm</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit"
                                class="btn btn-gray"><?php echo get_phrase('add_class_routine'); ?></button>
                    </div>
                    </form>
                </div>
            </div>

            <script type="text/javascript">

 function ajaxMaterias(valor) {

        $('#materias').empty();
        $('#materias').prev().html('');

        $.post('<?php echo site_url()?>ajax/obtenMaterias',
            {'curso': valor },
            function (data) {
                $('#materias').html(data);
            });
    }

</script>
            <!----CREATION FORM ENDS--->

        </div>
    </div>
</div>
