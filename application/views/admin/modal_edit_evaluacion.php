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

                        <input type="text" class="datepicker fill-up" name="fecha"
                               value="<?php echo $date; ?>"/>

                    </div>

                </div>
                <div class="control-group">           
                    <label class="control-label"><?php echo get_phrase('hora'); ?></label>
                    <div class="controls">
                        <select name="hora" class="uniform" style="width:100%;">

                            <?php for ($i = 0; $i <= 12; $i++): 
                                if($i<10){?>
                                    <option value="0<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php }else{ ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php } ?>
                            <?php endfor; ?>

                        </select>
                        <select name="min" class="uniform" style="width:100%;">

                            <?php for ($i = 0; $i <= 60; $i++): ?>
                                <?php if ($i<10){?>
                                    <option value="0<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php }else{ ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php } ?>
                            <?php endfor; ?>

                        </select>
                       <select name="ampm" class="uniform" style="width:100%">

                            <option value="1">am</option>

                            <option value="2">pm</option>

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