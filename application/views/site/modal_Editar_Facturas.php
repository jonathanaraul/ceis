<div class="tab-pane box active" id="edit" style="padding: 5px">
    <div class="box-content">
        <?php foreach ($edit_data as $row): ?>
            <?= form_open('site/facturacion/do_update_empresas/' . $row['id'], array('class' => 'form-horizontal validatable', 'target' => '_top')); ?>
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
                                                echo '<option value="' . $curso['id']. '">' .$curso['nombre']. '</option>';
                                            }
                                        ?>
                                    </select>
                                </td>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?= get_phrase('description'); ?></label>

                            <div class="controls">
                                <input type="text" class="uniform" name="descripcion" value="<?=$row['descripcion']?>" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?= get_phrase('monto'); ?></label>

                            <div class="controls">
                                <input type="text" class="uniform" name="monto" value="<?=$row['monto']?>"/>
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
                                <input type="text" class="datepicker fill-up" name="fecha" value="<?=$date?>"/>
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

$('select[name=estado]').val('<?php echo $row['estado']; ?>');
$('select[name=empresa]').val('<?php echo $row['empresa']; ?>');
$('select[name=curso]').val('<?php echo $row['curso']; ?>');
$('select[name=metodo_pago]').val('<?php echo $row['metodo_pago']; ?>');
</script>
