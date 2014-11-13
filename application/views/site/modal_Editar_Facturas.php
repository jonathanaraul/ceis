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
                                            $cursos = $this->db->get('hs_cursos')->result_array();
                                            foreach ($cursos as $curso) {
                                                echo '<option value="' . $curso['id']. '">' .$this->crud_model->get_hs_cursos_nombre($curso['curso']).' - Sección: '.$curso['seccion']. '</option>';
                                            }
                                        ?>
                                    </select>
                                </td>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?= get_phrase('description'); ?></label>

                            <div class="controls">
                                <input type="text" class="uniform" name="descripcion" required value="<?=$row['descripcion']?>" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?= get_phrase('monto'); ?></label>

                            <div class="controls">
                                <input type="text" class="uniform" name="monto" required value="<?=$row['monto']?>"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?= get_phrase('metodo_de_pago'); ?></label>

                            <div class="controls">
                                <select name="metodo_pago" class="uniform" style="width:100%;">
                                    <option value="Efectivo"><?= get_phrase('efectivo'); ?></option>
                                    <option value="Deposito"><?= get_phrase('deposito'); ?></option>
                                    <option value="Transferencia"><?= get_phrase('transferencia'); ?></option>
                                </select>
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
                            <label class="control-label"><?= get_phrase('date'); ?></label>

                            <div class="controls">
                            <?php $f= strtotime($row['fecha']);
                              $date= date('m/d/Y',$f);
                            ?>
                                <input type="text" class="datepicker fill-up" name="fecha" required value="<?=$date?>"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-gray"><?= get_phrase('add_invoice'); ?></button>
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

$('select[name=estado]').val('<?php echo $row['estado']; ?>');
$('select[name=metodo_pago]').val('<?php echo $row['metodo_pago']; ?>');
</script>
