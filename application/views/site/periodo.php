<div class="box">
    <div class="box-header">

        <!--CONTROL TABS START-->
        <ul class="nav nav-tabs nav-tabs-left">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="icon-align-justify"></i>
                    <?php echo get_phrase('Lista de Períodos'); ?>
                </a></li>
            <li>
                <a href="#add" data-toggle="tab"><i class="icon-plus"></i>
                    <?php echo get_phrase('Agregar Período'); ?>
                </a></li>
        </ul>
        <!--CONTROL TABS END-->

    </div>
    <div class="box-content padded">
        <div class="tab-content">
            <!--TABLE LISTING STARTS-->
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
                            <div><?php echo get_phrase('fecha_de_inicio'); ?></div>
                        </th>
                        <th>
                            <div><?php echo get_phrase('fecha_de_fin'); ?></div>
                        </th>
                        <th>
                            <div><?php echo get_phrase('duration'); ?></div>
                        </th>
                        <th>
                            <div><?php echo get_phrase('options'); ?></div>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $count = 1;
                    foreach ($periodo as $row): ?>
                        <tr>
                            <td><?php echo $count++; ?></td>
                            <td><?php echo $row['nombre_periodo']; ?></td>
                            <td>
                                <?php $f_ini= date_create($row['fecha_inicio']);
                                      $date_ini= date_format($f_ini, 'd/m/Y');
                                      echo $date_ini; 
                                ?>
                            </td>

                            <td>
                                <?php $f_fin= date_create($row['fecha_fin']);
                                      $date_fin= date_format($f_fin, 'd/m/Y');
                                      echo $date_fin; 
                                ?>                                
                            </td>
                            <td><?php echo $row['duracion']; ?></td>
                            <td align="center">
                                <a data-toggle="modal" href="#modal-form"
                                   onclick="modal('Editar_Periodo',<?php echo $row['id']; ?>)"
                                   class="btn btn-gray btn-small">
                                    <i class="icon-wrench"></i> <?php echo get_phrase('edit'); ?>
                                </a>
                                <a data-toggle="modal" href="#modal-delete"
                                   onclick="modal_delete('<?php echo base_url(); ?>index.php?admin/periodo/delete/<?php echo $row['id']; ?>')"
                                   class="btn btn-red btn-small">
                                    <i class="icon-trash"></i> <?php echo get_phrase('delete'); ?>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!--TABLE LISTING ENDS-->


            <!--CREATION FORM STARTS-->
            <div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box-content">
                    <?php echo form_open('admin/periodo/create', array('class' => 'form-horizontal validatable', 'target' => '_top')); ?>
                    <div class="padded">
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('name'); ?></label>
                            <div class="controls">
                                <input type="text" class="validate[required]" name="nombre_periodo"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('fecha_de_inicio'); ?></label>
                            <div class="controls">
                                <input type="text" class="datepicker fill-up" name="fecha_inicio"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('fecha_de_fin'); ?></label>
                            <div class="controls">
                                <input type="text" class="datepicker fill-up" name="fecha_fin"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('Duración'); ?></label>
                            <div class="controls">
                                <input type="text" class="validate[required]" name="duracion"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-gray"><?php echo get_phrase('Agregar Período'); ?></button>
                    </div>
                    </form>
                </div>
            </div>
            <!----CREATION FORM ENDS--->
        </div>
    </div>
</div>