<div class="tab-pane box active" id="edit" style="padding: 5px">
    <div class="box-content">
        <?php foreach ($edit_data as $row): ?>
            <?= form_open('site/facturacion/do_update2/' . $row['id'], array('onsubmit' => 'return validateFormEmpresa()','name' => 'editar_factura_empresa','class' => 'form-horizontal validatable', 'target' => '_top')); ?>
                    <div class="padded">
                        <div class="control-group">
                            <label class="control-label"><?= get_phrase('empresa'); ?></label>

                            <div class="controls">
                                <td>
                                    <select name="empresa"  class="uniform">

                                        <?php
                                        $empresas = $this->db->get_where('hs_empresas', [ 'id' => $edit_data[0]['empresa'] ])->result_array();
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
                                      <?php
                                            $cursos = $this->db->get_where('hs_cursos', ['id' => $edit_data[0]['curso'] ])->result_array();
                                            foreach ($cursos as $curso) {
                                                echo '<option value="' . $curso['id']. '">' .$this->crud_model->get_hs_cursos_nombre($curso['curso']).' - Sección: '.$curso['seccion']. '</option>';
                                            }
                                        ?>
                                    </select>
                                </td>
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
                                            <?php

                                                    $this->db->select('es.nombre,es.snombre,es.papellido,es.sapellido,es.cedula');
                                                    $this->db->from('hs_inscripcion as i');

                                                    $this->db->join('hs_estudiantes as es',  'es.id = i.estudiante', 'INNER');

                                                    $this->db->join('hs_empresas as em', 'i.empresa = em.id', 'INNER');

                                                    $this->db->join('hs_cursos as c', 'c.id = i.curso', 'INNER');

                                                    $this->db->where('i.empresa',$edit_data[0]['empresa']);
                                                    $this->db->where('i.curso',$edit_data[0]['curso']);

                                                    $result = $this->db->get();
                                                    $i=1;
                                                    foreach ($result->result_array() as $value){


                                                            echo"<tr><td>".$i++."</td><td>".$value["papellido"]." ".$value["sapellido"]." ".$value["nombre"]." ".$value["snombre"]."</td><td>".$value["cedula"]."</td></tr>";
                                                    }


                                            ?>
                                    </tbody>
                                </table>
                         </div>
                         <?php
                             $fecha_ini= date_create($cursos[0]['fecha_ini']);
                             $fecha_ini = date_format($fecha_ini, 'd/m/Y');
                             $fecha_cul= date_create($cursos[0]['fecha_cul']);
                             $fecha_cul = date_format($fecha_cul, 'd/m/Y');
                         ?>
                         <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('fecha_de_inicio_del_curso'); ?></label>

                            <div class="controls">
                                <input type="text" class="uniform" readonly  required name="fecha_inicio_curso_empresa" id="fecha_inicio_cursoe" value="<?=$fecha_ini?>" />
                            </div>
                        </div>



                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('fecha_del_fin_del_curso'); ?></label>

                            <div class="controls">
                                <input type="text" class="uniform" readonly required  name="fecha_fin_curso_empresa" id="fecha_fin_cursoe" value="<?=$fecha_cul?>" />
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label"><?= get_phrase('description'); ?></label>

                            <div class="controls">
                                <input type="text" class="uniform" name="descripcion" required value="<?=$row['descripcion']?>" />
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('ciudad'); ?></label>

                            <div class="controls">
                                <input type="text" class="uniform" name="ciudad" value="<?=$row['ciudad']?>"/>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('cantidad'); ?></label>

                            <div class="controls">
                                <input type="number" min="0" class="uniform" name="cantidad" value="<?=$row['cantidad']?>"/>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('número_de_factura'); ?></label>

                            <div class="controls">
                                <input type="text" class="uniform" required name="numero_factura_empresa" value="<?=$row['numero_factura']?>"/>
                            </div>
                        </div>

                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('número_de_recibo_de caja'); ?></label>

                            <div class="controls">
                                <input type="text" class="uniform" required name="numero_recibo_caja_empresa" value="<?=$row['numero_recibo_caja']?>"/>
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
                                <select name="metodo_pago_empresa" class="uniform" onchange="cheque_empresa(this.value);" style="width:100%;">
                                    <option value=""><?php echo get_phrase('seleccionar_metodo_de_pago'); ?></option>
                                    <option value="Cheque"><?php echo get_phrase('cheque'); ?></option>
                                    <option value="Deposito"><?php echo get_phrase('deposito'); ?></option>
                                    <option value="Efectivo"><?php echo get_phrase('efectivo'); ?></option>
                                    <option value="Transferencia"><?php echo get_phrase('transferencia'); ?></option>

                                </select>
                            </div>
                        </div>
                        <?php
                              if( is_null( $row['numero_cheque'] ) )
                              {
                        ?>
                                <div class="control-group" id="div_num_cheque_empresa">
                                    <label class="control-label"><?php echo get_phrase('número_de_cheque'); ?></label>

                                    <div class="controls">
                                        <input type="text" class="uniform" required name="numero_cheque_empresa" id="numero_cheque_empresa" value="<?=$row['numero_cheque']?>" />
                                    </div>
                                </div>

                        <?php
                              }
                              else{
                        ?>
                                  <div class="control-group" id="div_num_cheque_empresa" style="display:none;">
                                      <label class="control-label"><?php echo get_phrase('número_de_cheque'); ?></label>

                                      <div class="controls">
                                          <input type="text" class="uniform" disabled required name="numero_cheque_empresa" id="numero_cheque_empresa"/>
                                      </div>
                                  </div>

                        <?php
                              }

                        ?>

                        <div class="control-group" id="div_num_cheque_empresa" style="display:none;">
                            <label class="control-label"><?php echo get_phrase('número_de_cheque'); ?></label>

                            <div class="controls">
                                <input type="text" class="uniform" disabled required name="numero_cheque_empresa" id="numero_cheque_empresa" />
                            </div>
                        </div>


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
                            <?php $f= strtotime($row['fecha']);
                              $date= date('d/m/Y',$f);
                            ?>
                                <input type="text" class="datepicker fill-up" name="fecha" required value="<?=$date?>"/>
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

    function validateFormEmpresa() {
    var cursos = document.forms["editar_factura_empresa"]["curso"].value;
    var empresa = document.forms["editar_factura_empresa"]["empresa"].value;
        if (empresa == 0) {
            alert("Debe seleccionar una empresa");
            return false;
        }
        if (cursos == 0) {
            alert("Debe seleccionar un curso");
            return false;
        }
    }

$('select[name=estado_empresa]').val('<?php echo $row['estado']; ?>');
$('select[name=metodo_pago_empresa]').val('<?php echo $row['metodo_pago']; ?>');


function cheque_empresa(valor) {

        if (valor === "Cheque")
            {
                $("#div_num_cheque_empresa").css( { 'display' : 'block' });
                $("#numero_cheque_empresa").removeAttr('disabled');
                 $("#numero_cheque_empresa").focus();
            }
        else
            {
                $("#div_num_cheque_empresa").css( { 'display' : 'none' });
                $("#numero_cheque_empresa").attr('disabled', 'disabled');
            }

}
</script>
