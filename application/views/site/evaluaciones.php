<div class="box">
    <div class="box-header">

        <!------CONTROL TABS START------->
        <ul class="nav nav-tabs nav-tabs-left">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="icon-align-justify"></i>
                    <?php echo get_phrase('lista_de_evaluaciones'); ?>
                </a></li>
            <li>
                <a href="#add" data-toggle="tab"><i class="icon-plus"></i>
                    <?php echo get_phrase('agregar_evaluación'); ?>
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
                            <div><?php echo get_phrase('name'); ?></div>
                        </th>
                        <th>
                            <div><?php echo get_phrase('materia'); ?></div>
                        </th>
                        <th>
                            <div><?php echo get_phrase('ponderación'); ?></div>
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
                    foreach ($evaluaciones as $row): ?>
                        <tr>
                            <td><?php echo $count++; ?></td>
                            <td><?php echo $row['nombre']; ?></td>
                            <td><?php echo $this->crud_model->get_subject_name_by_id($row['materia']); ?></td>
                            <td><?php echo $row['ponderacion']; ?></td>
                            <td><?php echo $row['fecha'] ?></td>
                            <td align="center">
                                <a data-toggle="modal" href="#modal-form"
                                   onclick="modal('Editar_Evaluacion',<?php echo $row['id']; ?>)"
                                   class="btn btn-gray btn-small">
                                    <i class="icon-wrench"></i> <?php echo get_phrase('edit'); ?>
                                </a>
                                <a data-toggle="modal" href="#modal-delete"
                                   onclick="modal_delete('<?php echo base_url(); ?>index.php?admin/evaluaciones/delete/<?php echo $row['id']; ?>')"
                                   class="btn btn-red btn-small">
                                    <i class="icon-trash"></i> <?php echo get_phrase('delete'); ?>
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
                    <?php echo form_open('admin/evaluaciones/create', array('class' => 'form-horizontal validatable', 'target' => '_top')); ?>
                    <div class="padded">
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('name'); ?></label>
                            <div class="controls">
                                <input type="text" class="validate[required]" name="nombre"/>
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
                            <label class="control-label"><?php echo get_phrase('ponderacion'); ?></label>
                            <div class="controls">
                                <input type="text" class="validate[required]" name="ponderacion"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('fecha'); ?></label>
                            <div class="controls">
                                <input type="text" class="datepicker fill-up" name="fecha"/>
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
                        <button type="submit" class="btn btn-gray"><?php echo get_phrase('agregar_evaluación'); ?></button>
                    </div>
                    </form>
                </div>
            </div>
            <!----CREATION FORM ENDS--->
        </div>
    </div>
</div>