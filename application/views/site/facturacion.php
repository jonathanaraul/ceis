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
            <li>
                <a href="#add_empresa" data-toggle="tab"><i class="icon-plus"></i>
                    <?php echo get_phrase('agregar_factura_empresas'); ?>
                </a></li>
        </ul>
        <!------CONTROL TABS END------->

    </div>
    <div class="box-content padded">
        <div class="tab-content">
            <!----TABLE LISTING STARTS--->
            <div class="tab-pane box active" id="list">
                <label class="control-label"><h3><?php echo get_phrase('listado_facturas_de_estudiantes'); ?></h3></label>
                <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
                    <thead>
                    <tr>
                        <th>
                            <div>#</div>
                        </th>
                        <th>
                            <div><?php echo get_phrase('student'); ?></div>
                        </th>
                        <th width="20%">
                            <div><?php echo get_phrase('curso'); ?></div>
                        </th>
                        <th>
                            <div><?php echo get_phrase('descripción'); ?></div>
                        </th>
                        <th>
                            <div><?php echo get_phrase('monto'); ?></div>
                        </th>
                       <th>
                            <div><?php echo get_phrase('metodo_de_pago'); ?></div>
                        </th>
                        <th>
                            <div><?php echo get_phrase('estado'); ?></div>
                        </th>
                        <th>
                            <div><?php echo get_phrase('fecha'); ?></div>
                        </th>
                        <th width="22%">
                            <div><?php echo get_phrase('options'); ?></div>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $count = 1;
                    foreach ($facturacion as $row): 
                        $cursos= $this->db->get_where('hs_cursos', array('id' => $row['curso']))->result_array();
                    ?>
                        <tr>
                            <td><?= $count++; ?></td>
                            <td><?= $this->crud_model->get_hs_student_nombre_by_id($row['estudiante'])." ".$this->crud_model->get_hs_student_apellido_by_id($row['estudiante']); ?></td>
                            <td><?= $this->crud_model->get_hs_cursos_nombre($cursos[0]['curso']).' - Sección '.$this->crud_model->get_hs_cursos_seccion($row['curso']); ?></td>
                            <td><?= $row['descripcion']; ?></td>
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
                                   onclick="modal('Ver_Factura',<?= $row['id']; ?>)"
                                   class="btn btn-default btn-small">
                                    <i class="icon-credit-card"></i> <?= get_phrase('ver'); ?>
                                </a>
                                <a data-toggle="modal" href="#modal-form"
                                   onclick="modal('Editar_Factura',<?= $row['id']; ?>)"
                                   class="btn btn-gray btn-small">
                                    <i class="icon-wrench"></i> <?= get_phrase('edit'); ?>
                                </a>
                                <a data-toggle="modal" href="#modal-delete"
                                   onclick="modal_delete('<?= base_url(); ?>index.php?site/facturacion/delete/<?php echo $row['id']; ?>')"
                                   class="btn btn-red btn-small">
                                    <i class="icon-trash"></i> <?= get_phrase('delete'); ?>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <label class="control-label"><h3><?php echo get_phrase('listado_facturas_de_empresas'); ?></h3></label>
                <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
                    <thead>
                    <tr>
                        <th>
                            <div>#</div>
                        </th>
                        <th>
                            <div><?php echo get_phrase('Empresa'); ?></div>
                        </th>
                        <th>
                            <div><?php echo get_phrase('NIT'); ?></div>
                        </th>
                        <th>
                            <div><?php echo get_phrase('curso'); ?></div>
                        </th>
                        <th>
                            <div><?php echo get_phrase('descripción'); ?></div>
                        </th>
                        <th>
                            <div><?php echo get_phrase('monto'); ?></div>
                        </th>
                       <th>
                            <div><?php echo get_phrase('metodo_de_pago'); ?></div>
                        </th>
                        <th>
                            <div><?php echo get_phrase('estado'); ?></div>
                        </th>
                        <th width="22%">
                            <div><?php echo get_phrase('options'); ?></div>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $count = 1;
                    $empresas= $this->db->get('hs_facturacion_empresas')->result_array();
                    foreach ($empresas as $empresa): 
                        $cursos_empresas= $this->db->get_where('hs_cursos', array('id' => $empresa['curso']))->result_array();
                    ?>
                        <tr>
                            <td><?= $count++; ?></td>
                            <td><?= $this->crud_model->get_empresas_name($empresa['empresa']); ?></td>
                            <td><?= $this->crud_model->get_empresas_nit($empresa['empresa']); ?></td>                            
                            <td><?= $this->crud_model->get_hs_cursos_nombre($cursos_empresas[0]['curso']).' - Sección: '.$this->crud_model->get_hs_cursos_seccion($empresa['curso']); ?></td>
                            <td><?= $empresa['descripcion']; ?></td>
                            <td><?= $empresa['monto']; ?></td>
                            <td><?= $empresa['metodo_pago']; ?></td>
                            <td>
                                <span
                                    class="label label-<?php if ($empresa['estado'] == '1') echo 'green'; else echo 'dark-red'; ?>"><?php if($empresa['estado']==1) echo 'Cancelado'; else echo 'No Cancelado' ?></span>
                            </td>
                            <td align="center">
                                <a data-toggle="modal" href="#modal-form"
                                   onclick="modal('Ver_Facturas',<?= $empresa['id']; ?>)"
                                   class="btn btn-default btn-small">
                                    <i class="icon-credit-card"></i> <?= get_phrase('ver'); ?>
                                </a>
                                <a data-toggle="modal" href="#modal-form"
                                   onclick="modal('Editar_Facturas',<?= $empresa['id']; ?>)"
                                   class="btn btn-gray btn-small">
                                    <i class="icon-wrench"></i> <?= get_phrase('edit'); ?>
                                </a>
                                <a data-toggle="modal" href="#modal-delete"
                                   onclick="modal_delete('<?= base_url(); ?>index.php?site/facturacion/delete_empresa/<?php echo $empresa['id']; ?>')"
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
                    <?= form_open('site/facturacion/create_estudiante', array('class' => 'form-horizontal validatable', 'target' => '_top')); ?>
                    <div class="padded">
                        <div class="control-group">
                            <label class="control-label"><?= get_phrase('estudiante'); ?></label>

                            <div class="controls">
                                <td>
                                    <select name="estudiante" id="estudiantes" class="uniform" onchange="ajaxEstudiantes(this.value);">
                                        <option value="0"><?= 'Seleccionar Estudiante' ?></option>
                                        <?php
                                        $estudiantes = $this->db->get_where('hs_users', array('rol' => 2))->result_array();
                                        foreach ($estudiantes as $row) {
                                            echo '<option value="' . $row['user_id']. '">' .$this->crud_model->get_hs_student_nombre_by_id($row['user_id'])." ".$this->crud_model->get_hs_student_apellido_by_id($row['user_id']) . '</option>';
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
            <!----CREATION FORM STARTS---->
            <div class="tab-pane box" id="add_empresa" style="padding: 5px">
                <div class="box-content">
                    <?= form_open('site/facturacion/create_empresa', array('class' => 'form-horizontal validatable', 'target' => '_top')); ?>
                    <div class="padded">
                        <div class="control-group">
                            <label class="control-label"><?= get_phrase('empresa'); ?></label>

                            <div class="controls">
                                <td>
                                    <select name="empresa"  class="uniform">
                                        <option value="0"><?= 'Seleccionar Empresa' ?></option>
                                        <?php
                                        $empresas = $this->db->get('hs_empresas')->result_array();
                                        foreach ($empresas as $empresa) {
                                            echo '<option value="' . $empresa['id']. '">' .$empresa['nombre']. '</option>';
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
                                        <?php
                                            $curso2 = $this->db->get('hs_cursos')->result_array();
                                            foreach ($curso2 as $curso2) {
                                                echo '<option value="' . $curso2['id']. '">' .$this->crud_model->get_hs_cursos_nombre($curso2['curso']).' - Sección '.$this->crud_model->get_hs_cursos_seccion($curso2['id']). '</option>';
                                            }
                                        ?>
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

        $.post('<?php echo site_url()?>ajax/obtenCursosFacturaEstudiantes',
            {'estudiante': valor },
            function (data) {
                $('#cursos').html(data);
            });
    }

</script>
