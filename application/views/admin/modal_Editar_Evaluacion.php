<div class="tab-pane box active" id="edit" style="padding: 5px">
    <div class="box-content">
        <?php foreach ($edit_data as $row): ?>
            <?php echo form_open('admin/evaluaciones/do_update/' . $row['id'], array('class' => 'form-horizontal validatable', 'target' => '_top')); ?>
            <div class="padded">

                <div class="control-group">

                    <label class="control-label"><?php echo get_phrase('name'); ?></label>

                    <div class="controls">

                        <input type="text" class="validate[required]" name="nombre" value="<?php echo $row['nombre']; ?>"/>

                    </div>

                </div>

                <div class="control-group">

                    <label class="control-label"><?php echo get_phrase('materia'); ?></label>

                    <div class="controls">

                        <select name="materia" class="uniform" style="width:100%;">
                            <?php
                            $elements = $this->db->get('hs_materias')->result_array();
                            foreach ($elements as $element):
                                ?>
                                <option
                                    value="<?php echo $element['id']; ?>"> <?php echo $element['nombre']; ?> </option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                    </div>

                </div>
                <div class="control-group">

                    <label class="control-label"><?php echo get_phrase('ponderación'); ?></label>

                    <div class="controls">

                        <input type="text" class="validate[required]" name="ponderacion" value="<?php echo $row['ponderacion']; ?>"/>

                    </div>

                </div>
                <div class="control-group">

                    <label class="control-label"><?php echo get_phrase('fecha'); ?></label>

                    <div class="controls">

                        <?php $fecha= strtotime($row['fecha']);
                              $date= date('m/d/Y',$fecha);
                        ?>

                        <input type="text" class="datepicker fill-up" name="fecha" value="<?php echo $date; ?>"/>

                    </div>

                </div>
                <div class="control-group">           
                    <label class="control-label"><?php echo get_phrase('hora'); ?></label>
                    <div class="controls">
                        <select name="hora" class="uniform" style="width:100%;">
                            <?php for ($i = 0; $i < 24; $i++){
                                $hora = ($i<10) ? '0'.$i : $i;
                                if(intval($hora)<12){
                                    if(intval($hora)==0)$hora = '12';
                                    $hora .= ' AM';
                                }
                                else{
                                    if(intval($hora)>12){
                                        $hora = intval($hora) -12;
                                        $hora = ($hora<10) ? '0'.$hora : $hora;
                                    };
                                    $hora .= ' PM';}
                                echo '<option value="'.$i.'">'.$hora.'</option>';
                                }
                            ?>
                        </select>
                    </div>                    
                </div>
                <div class="control-group">
                    <label class="control-label"><?php echo get_phrase('minuto'); ?></label>
                    <div class="controls">
                        <select name="minuto" class="uniform" style="width:100%;">
                            <?php for ($i = 0; $i < 60; $i++){
                                $minuto = ($i<10) ? '0'.$i : $i;
                                echo '<option value="'.$i.'">'.$minuto.'</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="form-actions">

                <button type="submit" class="btn btn-gray"><?php echo get_phrase('editar_evaluación'); ?></button>

            </div>

            </form>

        <?php endforeach; ?>

    </div>

</div>
<script type="text/javascript">
$('select[name=materia]').val('<?php echo $row['materia'];?>');
</script>