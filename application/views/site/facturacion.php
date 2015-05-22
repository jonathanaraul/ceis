<div class="box">
    <div class="box-header"> 

        <!------CONTROL TABS START----- -->
        <ul class="nav nav-tabs nav-tabs-left" style="width:1000%;">
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
        <!------CONTROL TABS END----- -->

    </div>
    <div class="box-content padded">
        <div class="tab-content">
            <!----TABLE LISTING STARTS- -->
            <div class="tab-pane box active" id="list">
                <label class="control-label"><h3><?php echo get_phrase('listado_facturas_de_estudiantes'); ?></h3></label>
                <table cellpadding="0" cellspacing="0" border="0"  class="dTable responsive">
                    <thead>
                    <tr>
                        <th>
                            <div>#</div>
                        </th>
                        <th width="11%">
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
                                <?php $f= date_create($row['fecha_pago']);
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


            <!----CREATION FORM STARTS STUDENT ---->
            <div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box-content">
                    <?= form_open('site/facturacion/create_estudiante', array('onsubmit' => 'return validateFormEstudiante()','name' => 'crear_factura','class' => 'form-horizontal validatable', 'target' => '_top')); ?>
                    <div class="padded">

                        <div class="control-group">
                            <label class="control-label"><?= get_phrase('estudiante'); ?></label>

                            <div class="controls">
                                <td> 
                                    <select name="estudiante" id="estudiantes" class="uniform" onchange="ajaxEstudiantes(this.value);">
                                        <option value="0"><?= 'Seleccionar Estudiante' ?></option>
                                        <?php
                                        $estudiantes = $this->db->get_where('hs_estudiantes', array('activo' => 1))->result_array();
                                        foreach ($estudiantes as $row) {
                                            echo '<option value="' . $row['id']. '">' .$this->crud_model->get_hs_student_nombre_by_id($row['id'])." ".$this->crud_model->get_hs_student_apellido_by_id($row['id']) . '</option>';
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
                                    <select name="curso" id="cursos" class="uniform" onchange="ajaxCurso(this.value,this.id);">
                                        <option value="0"><?= 'Seleccionar Curso' ?></option>
                                    </select>
                                </td>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('fecha_de_inicio_del_curso'); ?></label>

                            <div class="controls">
                                <input type="text" class="uniform" readonly  required name="fecha_inicio_curso" id="fecha_inicio_curso" />
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('fecha_del_fin_del_curso'); ?></label>

                            <div class="controls">
                                <input type="text" class="uniform" readonly required  name="fecha_fin_curso" id="fecha_fin_curso" />
                            </div>
                        </div>

                         <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('description'); ?></label>

                            <div class="controls">
                                <input type="text" class="uniform" required name="descripcion"/>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('número_de_factura'); ?></label>

                            <div class="controls">
                                <input type="text" class="uniform" required name="numero_factura"/>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('número_de_recibo_de caja'); ?></label>

                            <div class="controls">
                                <input type="text" class="uniform" required name="numero_recibo_caja"/>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('monto'); ?></label>

                            <div class="controls">
                                <input type="text" class="uniform" required name="monto" placeholder="Introduzca el monto de la factura"/>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('metodo_de_pago'); ?></label>

                            <div class="controls">
                                <select name="metodo_pago" class="uniform" onchange="cheque(this.value);" style="width:100%;">
                                    <option value=""><?php echo get_phrase('seleccionar_metodo_de_pago'); ?></option>
                                    <option value="Cheque"><?php echo get_phrase('cheque'); ?></option>
                                    <option value="Deposito"><?php echo get_phrase('deposito'); ?></option>
                                    <option value="Efectivo"><?php echo get_phrase('efectivo'); ?></option>                                    
                                    <option value="Transferencia"><?php echo get_phrase('transferencia'); ?></option>

                                </select>
                            </div>
                        </div>

                        <div class="control-group" id="div_num_cheque" style="display:none;">
                            <label class="control-label"><?php echo get_phrase('número_de_cheque'); ?></label>

                            <div class="controls">
                                <input type="text" class="uniform" disabled required name="numero_cheque" id="numero_cheque" />
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('status'); ?></label>

                            <div class="controls">
                                <select name="estado" class="uniform" style="width:100%;">
                                    <option value=""><?php echo get_phrase('seleccionar_estado'); ?></option>
                                    <option value="1"><?php echo get_phrase('cancelado'); ?></option>
                                    <option value="0"><?php echo get_phrase('no_cancelado'); ?></option>
                                </select>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('fecha_de_pago'); ?></label>

                            <div class="controls">
                                <input type="text" class="datepicker fill-up" required name="fecha_pago"/>
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

            <!----CREATION FORM STARTS EMPRESA ---->
            <div class="tab-pane box" id="add_empresa" style="padding: 5px">
                <div class="box-content">
                    <?= form_open('site/facturacion/create_empresa', array('onsubmit' => 'return validateFormEmpresa()','name' => 'crear_factura_empresa','class' => 'form-horizontal validatable', 'target' => '_top')); ?>
                    <div class="padded">
                        <div class="control-group">
                            <label class="control-label"><?= get_phrase('empresa'); ?></label>

                            <div class="controls">
                                
                                    <select name="empresa" id="empresa"  class="uniform" onchange="ajaxCursosEmpresas(this.value);">
                                        <option value="0"><?= 'Seleccionar Empresa' ?></option>
                                        <?php
                                        $this->db->not_like('nombre', 'Particular');
                                        $empresas = $this->db->get('hs_empresas')->result_array();
                                        foreach ($empresas as $empresa) {
                                            echo '<option value="' . $empresa['id']. '">' .$empresa['nombre']. '</option>';
                                        }
                                        ?>
                                    </select>
                               
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('curso'); ?></label>
                            <div class="controls">
                                   <select name="curso" id="cursose" class="uniform" onchange="ajaxCurso(this.value,this.id);ajaxDatosEstudianres();">

                                           <option value="0"><?= 'Seleccionar Curso' ?></option>
                                    </select>
                            </div>
                        </div>


                        <div class="control-group">
                                <label class="control-label"><?php echo get_phrase('listado_de_estudiantes'); ?></label>
                                <table cellpadding="0" cellspacing="0" border="0" style="width: 50%;" class="table" id="listEstudiante">
                                    <thead>
                                    <tr>
                                        <th>
                                            <div>#</div>
                                        </th>
                                        <th>
                                            <div><?php echo get_phrase('student'); ?></div>
                                        </th>
                                        <th width="30%">
                                            <div><?php echo get_phrase('cedula'); ?></div>
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                            
                                    </tbody>
                                </table>
                         </div>


                        
                         <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('fecha_de_inicio_del_curso'); ?></label>

                            <div class="controls">
                                <input type="text" class="uniform" readonly  required name="fecha_inicio_curso" id="fecha_inicio_cursoe" />
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('fecha_del_fin_del_curso'); ?></label>

                            <div class="controls">
                                <input type="text" class="uniform" readonly required  name="fecha_fin_curso" id="fecha_fin_cursoe" />
                            </div>
                        </div>


                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('description'); ?></label>

                            <div class="controls">
                                <input type="text" class="uniform" name="descripcion"/>
                            </div>
                        </div>

                        
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('número_de_factura'); ?></label>

                            <div class="controls">
                                <input type="text" class="uniform" required name="numero_factura"/>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('número_de_recibo_de caja'); ?></label>

                            <div class="controls">
                                <input type="text" class="uniform" required name="numero_recibo_caja"/>
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
            <!----CREATION FORM ENDS- -->

        </div>
    </div>
</div>

<script type="text/javascript">

    function ajaxEstudiantes(valor) {

        if (valor > 0)
         {
            $.post('<?php echo site_url()?>ajax/obtenCursosFacturaEstudiantes',
                {'estudiante': valor },
                function (data) {
                    $('#cursos').html(data);
                });
         }
         else
         {
            $('#cursos').html(' <option value="0">Seleccionar Curso</option>');
         }

        
    }

    
    function validateFormEstudiante() {
    var curso = document.forms["crear_factura"]["curso"].value;
    var estudiante = document.forms["crear_factura"]["estudiante"].value;
        if (estudiante == 0) {
            alert("Debe seleccionar un estudiante");
            return false;
        }
        if (curso == 0) {
            alert("Debe seleccionar un curso");
            return false;
        }
    }

    function validateFormEmpresa() {
    var cursos = document.forms["crear_factura_empresa"]["curso"].value;
    var empresa = document.forms["crear_factura_empresa"]["empresa"].value;
        if (empresa == 0) {
            alert("Debe seleccionar una empresa");
            return false;
        }
        if (cursos == 0) {
            alert("Debe seleccionar un curso");
            return false;
        }
    }


    function ajaxCurso(valor,id) {


        if ( valor > 0 )
            {

                $.getJSON('<?php echo site_url()?>ajax/get_curso/' + valor,                                                             
                    function(data) {    
                        
                        if (id =="cursos")
                         {
                            $("#fecha_inicio_curso").val(data.fecha_ini);
                            $("#fecha_fin_curso").val(data.fecha_cul);
                         } 

                         if (id =="cursose")
                         {
                            $("#fecha_inicio_cursoe").val(data.fecha_ini);
                            $("#fecha_fin_cursoe").val(data.fecha_cul);
                         }                 
                        
                     
                });
            }
            else
                {
                    
                    if (id =="cursos")
                         {
                            $("#fecha_inicio_curso").val('');
                            $("#fecha_fin_curso").val('');
                         } 

                         if (id =="cursose")
                         {
                            $("#fecha_inicio_cursoe").val('');
                            $("#fecha_fin_cursoe").val('');
                         } 
                }
    }

    function cheque(valor) {
    
            if (valor === "Cheque") 
                {
                    $("#div_num_cheque").css( { 'display' : 'block' });
                    $("#numero_cheque").removeAttr('disabled');
                     $("#numero_cheque").focus();
                }
            else
                {
                    $("#div_num_cheque").css( { 'display' : 'none' });
                    $("#numero_cheque").attr('disabled', 'disabled');
                } 

    }


    function ajaxCursosEmpresas(valor) {

        if (valor > 0)
         {
            $.post('<?php echo site_url()?>ajax/obtenCursosFacturaEmpresas',
                {'id_empresa': valor },
                function (data) {
                    $('#cursose').html(data);
                });
         }
         else
         {

            $('#cursose').html(' <option value="0">Seleccionar Curso</option>');
            $('#listEstudiante tbody').html('');
            $("#fecha_inicio_cursoe").val('');
            $("#fecha_fin_cursoe").val('');
            $("#cursose").focus();
         }

        
    }

  
  function ajaxDatosEstudianres() {

        var id_empresa = $("#empresa").val();
        var id_curso = $("#cursose").val();

         if (id_empresa > 0 && id_curso > 0)
         { 

              $('#listEstudiante tbody').html('');
            $.post('<?php echo site_url()?>ajax/obtenListaEstudiantes',
                {'id_empresa': id_empresa, 'id_curso' : id_curso },
                function (data) {
                    console.log(data);
                    $('#listEstudiante tbody ').append(data);
                });
         }
         else
         {
            $('#listEstudiante tbody').html('');
         }
        
    }

</script>

<?php
            $this->db->select('cl.nombre as nombre_curso, em.id ');  
            $this->db->from('hs_empresas as em');  

            $this->db->join('hs_estudiantes as es',  'em.id = es.empresa', 'INNER');

            $this->db->join('hs_inscripcion as i', 'i.estudiante = es.id', 'INNER');  

            $this->db->join('hs_cursos as c', 'c.id = i.curso', 'INNER');

            $this->db->join('class_name as cl', 'cl.id = c.curso', 'INNER');

            $this->db->where('em.id','3');

            $result = $this->db->get();

            var_dump($result->result_array());


?>
