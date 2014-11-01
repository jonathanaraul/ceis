<div class="box">
    <div class="box-header">

        <!---CONTROL TABS START-->
        <ul class="nav nav-tabs nav-tabs-left">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="icon-align-justify"></i>
                    <?php echo get_phrase('lista_de_Inscripciones'); ?>
                </a></li>
            <li>
                <a href="#add" data-toggle="tab"><i class="icon-plus"></i>
                    <?php echo get_phrase('agregar_inscripcion'); ?>
                </a></li>
        </ul>
        <!--CONTROL TABS END-->

    </div>
    <div class="box-content padded">
        <div class="tab-content">
            <!--TABLE LISTING STARTS-->
            <div class="tab-pane box active" id="list">
                <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
                    <thead>
                    <tr>
                        <th>
                            <div>#</div>
                        </th>
                        <th>
                            <div><?php echo get_phrase('estudiante'); ?></div>
                        </th>
                        <th>
                            <div><?php echo get_phrase('curso'); ?></div>
                        </th>
                        <th>
                            <div><?php echo get_phrase('status'); ?></div>
                        </th>
                        <th>
                            <div><?php echo get_phrase('fecha'); ?></div>
                        </th>
                        <th>
                            <div><?php echo get_phrase('options'); ?></div>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $count = 1;
                    foreach ($hs_inscripcion as $row): ?>
                        <tr>
                            <td><?php echo $row['id'] ?></td>
                            <td>

                                <?php
                                $this->db->select('snombre, papellido,ndocumento');
                                $query = $this->db->get_where('student', array('student_id' => $row['estudiante']))->result_array();
                                echo $query[0]['snombre'] . ' ' . $query[0]['papellido'] . ' ' . $query[0]['ndocumento'];
                                ?>
                            </td>
                            <td>

                                <?php
                                $this->db->select('nombre, seccion');
                                $query = $this->db->get_where('hs_cursos', array('id' => $row['curso']))->result_array();
                                echo $query[0]['nombre'] . ' ' . $query[0]['seccion'];
                                ?>
                            </td>
                            <td><?php if ($row['status'] == 0) echo 'Preinscrito'; else echo 'Inscrito' ?></td>

                            <td><?php echo $row['create_at'] ?></td>
                            <td align="center">
                                <a data-toggle="modal" href="#modal-form"
                                   onclick="modal('Editar_Inscripcion',<?php echo $row['id']; ?>)"
                                   class="btn btn-gray btn-small">
                                    <i class="icon-wrench"></i> <?php echo get_phrase('edit'); ?>
                                </a>
                                <a data-toggle="modal" href="#modal-delete"
                                   onclick="modal_delete('<?php echo base_url(); ?>index.php?admin/inscripcion/delete/<?php echo $row['id']; ?>')"
                                   class="btn btn-red btn-small">
                                    <i class="icon-trash"></i> <?php echo get_phrase('delete'); ?>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!--TABLE LISTING ENDS-->


            <!--CREATION FORM STARTS-->
            <div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box-content">
                    <?php echo form_open('admin/inscripcion/create', array('class' => 'form-horizontal validatable', 'target' => '_top')); ?>
                    <div class="padded">
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('estudiante'); ?></label>

                            <div class="controls">
                                <select name="estudiante" class="uniform" style="width:100%;">
                                    <?php
                                    $this->db->order_by("student_id", "desc");
                                    $objects = $this->db->get('student')->result_array();
                                    foreach ($objects as $object):
                                        ?>
                                        <option value="<?php echo $object['student_id']; ?>">
                                            <?php echo $object['name'] . ' ' . $object['papellido'] . ' - ' . $object['ndocumento']; ?> </option>
                                    <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('curso'); ?></label>

                            <div class="controls">
                                <select name="curso" class="uniform" style="width:100%;">
                                    <?php
                                    $objects = $this->db->get('hs_cursos')->result_array();
                                    foreach ($objects as $object):
                                        ?>
                                        <option value="<?php echo $object['id']; ?>">
                                            <?php echo $object['nombre'] . ' ' . $object['seccion']; ?> </option>
                                    <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('status'); ?></label>

                            <div class="controls">
                                <select name="status" class="uniform" style="width:100%;">
                                    <option value="0">Preinscripcion</option>
                                    <option value="1">Inscripcion</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-blue"><?php echo get_phrase('add_inscripcion'); ?></button>
                    </div>
                    </form>
                </div>
            </div>
            <!--CREATION FORM ENDS-->
        </div>
    </div>
</div>