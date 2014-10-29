<div class="box">
    <div class="box-header">

        <!------CONTROL TABS START------->
        <ul class="nav nav-tabs nav-tabs-left">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="icon-align-justify"></i>
                    <?php echo get_phrase('lista_de_facturas'); ?>
                </a></li>
            <li>
                <a href="#add" data-toggle="tab"><i class="icon-plus"></i>
                    <?php echo get_phrase('agregar_factura'); ?>
                </a></li>
        </ul>
        <!------CONTROL TABS END------->

    </div>
    <div class="box-content padded">
        <div class="tab-content">
            <!----TABLE LISTING STARTS--->
            <div class="tab-pane box active" id="list">

                <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
                    <thead>
                    <tr>
                        <th>
                            <div>#</div>
                        </th>
                        <th>
                            <div><?php echo get_phrase('student'); ?></div>
                        </th>
                        <th>
                            <div><?php echo get_phrase('curso'); ?></div>
                        </th>
                        <th>
                            <div><?php echo get_phrase('descripción'); ?></div>
                        </th>
                        <th width="7%">
                            <div><?php echo get_phrase('Cantidad'); ?></div>
                        </th>
                        <th width="7%">
                            <div><?php echo get_phrase('monto'); ?></div>
                        </th>
                        <th width="10%">
                            <div><?php echo get_phrase('metodo_de_pago'); ?></div>
                        </th>
                        <th width="10%">
                            <div><?php echo get_phrase('estado'); ?></div>
                        </th>
                        <th width="9%">
                            <div><?php echo get_phrase('fecha'); ?></div>
                        </th>
                        <th width="30%">
                            <div><?php echo get_phrase('options'); ?></div>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $count = 1;
                    foreach ($facturacion as $row): ?>
                        <tr>
                            <td><?= $count++; ?></td>
                            <td><?= $this->crud_model->get_hs_student_nombre_by_id($row['estudiante'])." ".$this->crud_model->get_hs_student_apellido_by_id($row['estudiante']); ?></td>
                            <td><?= $this->crud_model->get_hs_cursos_nombre($row['curso']) ?></td>
                            <td><?= $row['descripcion']; ?></td>
                            <td><?= $row['cantidad']; ?></td>
                            <td><?= $row['monto']; ?></td>
                            <td><?= $row['metodo_pago']; ?></td>
                            <td>
                                <span
                                    class="label label-<?php if ($row['estado'] == '1') echo 'green'; else echo 'dark-red'; ?>"><?php if($row['estado']==1) echo 'Cancelado'; else echo 'No Cancelado' ?></span>
                            </td>
                            <td>
                                <?php $f= date_create($row['fecha']);
                                      $date= date_format($f, 'd/m/Y');
                                      echo $date; 
                                ?>
                            </td>
                            <td align="center">
                                <a data-toggle="modal" href="#modal-form"
                                   onclick="modal('ver_factura',<?= $row['id']; ?>)"
                                   class="btn btn-default btn-small">
                                    <i class="icon-credit-card"></i> <?= get_phrase('view_invoice'); ?>
                                </a>
                                <a data-toggle="modal" href="#modal-form"
                                   onclick="modal('edit_factura',<?= $row['id']; ?>)"
                                   class="btn btn-gray btn-small">
                                    <i class="icon-wrench"></i> <?= get_phrase('edit'); ?>
                                </a>
                                <a data-toggle="modal" href="#modal-delete"
                                   onclick="modal_delete('<?= base_url(); ?>index.php?admin/facturacion/delete/<?php echo $row['id']; ?>')"
                                   class="btn btn-red btn-small">
                                    <i class="icon-trash"></i> <?= get_phrase('delete'); ?>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!----TABLE LISTING ENDS--->


            <!----CREATION FORM STARTS---->
            <div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box-content">
                    <?= form_open('admin/facturacion/create', array('class' => 'form-horizontal validatable', 'target' => '_top')); ?>
                    <div class="padded">
                        <div class="control-group">
                            <label class="control-label"><?= get_phrase('estudiante'); ?></label>

                            <div class="controls">
                                <td>
                                    <select name="estudiante" id="estudiantes" class="uniform" onchange="ajaxEstudiantes(this.value);">
                                        <option value="0"><?= 'Seleccionar Estudiante' ?></option>
                                        <?php
                                        $estudiantes = $this->db->get('hs_inscripcion')->result_array();
                                        foreach ($estudiantes as $row) {
                                            echo '<option value="' . $row['estudiante']. '">' .$this->crud_model->get_hs_student_nombre_by_id($row['estudiante'])." ".$this->crud_model->get_hs_student_apellido_by_id($row['estudiante']) . '</option>';
                                        }
                                        ?>
                                    </select>
                                </td>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('curso'); ?></label>
                            <div class="controls">
                                <td>
                                    <select name="curso" id="cursos" class="uniform">
                                        <option value="0"><?= 'Seleccionar Curso' ?></option>
                                    </select>
                                </td>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('description'); ?></label>

                            <div class="controls">
                                <input type="text" class="uniform" name="descripcion"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('cantidad'); ?></label>

                            <div class="controls">
                                <input type="text" class="uniform" name="cantidad"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('monto'); ?></label>

                            <div class="controls">
                                <input type="text" class="uniform" name="monto" placeholder="Introduzca el monto de la factura"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('metodo_de_pago'); ?></label>

                            <div class="controls">
                                <select name="metodo_pago" class="uniform" style="width:100%;">
                                    <option value="Efectivo"><?php echo get_phrase('efectivo'); ?></option>
                                    <option value="Deposito"><?php echo get_phrase('deposito'); ?></option>
                                    <option value="Transferencia"><?php echo get_phrase('transferencia'); ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('status'); ?></label>

                            <div class="controls">
                                <select name="estado" class="uniform" style="width:100%;">
                                    <option value="1"><?php echo get_phrase('cancelado'); ?></option>
                                    <option value="0"><?php echo get_phrase('no_cancelado'); ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('date'); ?></label>

                            <div class="controls">
                                <input type="text" class="datepicker fill-up" name="fecha"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-gray"><?php echo get_phrase('add_invoice'); ?></button>
                    </div>
                    </form>
                </div>
            </div>
            <!----CREATION FORM ENDS--->

        </div>
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

</script>