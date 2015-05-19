<div class="tab-pane box active" id="edit" style="padding: 5px">
    <div class="box-content">
        <?php foreach ($edit_data as $row): ?>
            <?= form_open('site/facturacion/do_update1/' . $row['id'], array('onsubmit' => 'return validateFormEstudiante()','name' => 'editar_factura','class' => 'form-horizontal validatable', 'target' => '_top')); ?>
                    <div class="padded">
                        <div class="control-group">
                            <label class="control-label"><?= get_phrase('estudiante'); ?></label>

                            <div class="controls">
                                <td>
                                    <select name="estudiante" id="estudiantes" class="uniform" onchange="ajaxEstudiantes(this.value);">
                                        <?php

                                            $estudiantes = $this->db->get_where('hs_estudiantes' , array( 'id' => $row['estudiante'] ) )->result_array();
                                            foreach ($estudiantes as $estudiante) {
                                                echo '<option value="' . $estudiante['id']. '">' .$this->crud_model->get_hs_student_nombre_by_id($estudiante['id'])." ".$this->crud_model->get_hs_student_apellido_by_id($estudiante['id']) . '</option>';
                                            }
                                        ?>
                                    </select>
                                </td>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label"><?= get_phrase('curso'); ?></label>
                            <div class="controls">
                                <td>
                                    <select name="curso" id="cursos" class="uniform">
                                        <?php 
                                                $curso = $this->db->get_where('hs_cursos' , array( 'id' => $row['curso'] ) )->result_array();
                                                
                                                         echo '<option value="' . $curso[0]['id']. '">' .$this->crud_model->get_hs_cursos_nombre($curso[0]['curso']). '</option>';
                                                
                                        ?>
                                    </select>
                                </td>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('fecha_de_inicio_del_curso'); ?></label>

                            <div class="controls">
                                <?php
                                    $fecha_ini= date_create($curso[0]['fecha_ini']);
                                    $fecha_ini = date_format($fecha_ini, 'd/m/Y');
                                    $fecha_cul= date_create($curso[0]['fecha_cul']);
                                    $fecha_cul = date_format($fecha_cul, 'd/m/Y');
                                ?>
                                <input type="text" class="uniform" readonly   required name="fecha_inicio_curso" id="fecha_inicio_curso" value="<?= $fecha_ini; ?>" />
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('fecha_del_fin_del_curso'); ?></label>

                            <div class="controls">
                                <input type="text" class="uniform" readonly required  name="fecha_fin_curso" id="fecha_fin_curso" value="<?= $fecha_cul; ?>" />
                            </div>
                        </div>



                        <div class="control-group">
                            <label class="control-label"><?= get_phrase('description'); ?></label>

                            <div class="controls">
                                <input type="text" class="uniform" name="descripcion" required value="<?=$row['descripcion']?>" />
                            </div>
                        </div>

                        
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('número_de_factura'); ?></label>

                            <div class="controls">
                                <input type="text" class="uniform" readonly required name="numero_factura" value="<?=$row['numero_factura']?>" />
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('número_de_recibo_de caja'); ?></label>

                            <div class="controls">
                                <input type="text" class="uniform" required name="numero_recibo_caja" value="<?=$row['numero_recibo_caja']?>" />
                            </div>
                        </div>


                        <div class="control-group">
                            <label class="control-label"><?= get_phrase('monto'); ?></label>

                            <div class="controls">
                                <input type="text" class="uniform" name="monto" required value="<?=$row['monto']?>"/>
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

                        <?php  if (  is_null($row['numero_cheque']) ) { ?>
                                
                                    <div class="control-group" id="div_num_cheque" style="display:none;">
                                        <label class="control-label"><?php echo get_phrase('número_de_cheque'); ?></label>

                                        <div class="controls">

                                             <input type="text" class="uniform" disabled required name="numero_cheque" id="numero_cheque" />
                                        </div>
                                    </div>

                        <?php    } else { ?>
                                    <div class="control-group" id="div_num_cheque" >
                                        <label class="control-label"><?php echo get_phrase('número_de_cheque'); ?></label>

                                        <div class="controls">

                                             <input type="text" class="uniform"  required name="numero_cheque" id="numero_cheque"  value="<?=$row['numero_cheque'];?>" />
                                        </div>
                                    </div>
                         <?php  } ?>

                                                
                        <div class="control-group">
                            <label class="control-label"><?= get_phrase('status'); ?></label>

                            <div class="controls">
                                <select name="estado" class="uniform" style="width:100%;">
                                    <option value="1"><?= get_phrase('cancelado'); ?></option>
                                    <option value="0"><?= get_phrase('no_cancelado'); ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?= get_phrase('fecha_de_pago'); ?></label>

                            <div class="controls">
                            <?php $f= strtotime($row['fecha_pago']);
                              $date= date('d/m/Y',$f);
                            ?>
                                <input type="text" class="datepicker fill-up" name="fecha_pago" required value="<?=$date?>"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-gray"><?= get_phrase('edit_invoice'); ?></button>
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

    function validateFormEstudiante() {
    var curso = document.forms["editar_factura"]["curso"].value;
    var estudiante = document.forms["editar_factura"]["estudiante"].value;
        if (estudiante == 0) {
            alert("Debe seleccionar un estudiante");
            return false;
        }
        if (curso == 0) {
            alert("Debe seleccionar un curso");
            return false;
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

    
$('select[name=estado]').val('<?php echo $row['estado']; ?>');
$('select[name=metodo_pago]').val('<?php echo $row['metodo_pago']; ?>');
</script>