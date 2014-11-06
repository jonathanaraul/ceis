<div class="box">

<div class="box-header">


    <!------CONTROL TABS START------->

    <ul class="nav nav-tabs nav-tabs-left">

        <li class="active">

            <a href="#list" data-toggle="tab"><i class="icon-align-justify"></i>

                <?php echo get_phrase('class_list'); ?>

            </a></li>

        <li>

            <a href="#add" data-toggle="tab"><i class="icon-plus"></i>

                <?php echo get_phrase('add_class'); ?>

            </a></li>

    </ul>

    <!------CONTROL TABS END------->


</div>

<div class="box-content padded">

<div class="tab-content">

<!----TABLE LISTING STARTS--->

<div class="tab-pane box <?php if (!isset($edit_data)) echo 'active'; ?>" id="list">


    <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">

        <thead>

        <tr>

            <th>
                <div>#</div>
            </th>

            <th>
                <div><?php echo get_phrase('class_name'); ?></div>
            </th>

            <th>
                <div>Sección</div>
            </th>

            <th>
                <div><?php echo get_phrase('fecha_de_inicio'); ?></div>
            </th>

            <th>
                <div><?php echo get_phrase('fecha_de_fin'); ?></div>
            </th>
            <th>
                <div><?php echo get_phrase('hora_de_inicio'); ?></div>
            </th>

            <th>
                <div><?php echo get_phrase('hora_de_fin'); ?></div>
            </th>
            <th>
                <div><?php echo get_phrase('cupo'); ?></div>
            </th>
            <th>
                <div><?php echo get_phrase('opciones'); ?></div>
            </th>

        </tr>

        </thead>

        <tbody>

        <?php $count = 1;
        foreach ($classes as $row): ?>

            <tr>

                <td><?php echo $count++; ?></td>

                <td><?php echo $row['name']; ?></td>

                <td><?php echo $row['seccion']; ?></td>

                <td><?php echo $row['fcha_inicio']; ?></td>

                <td><?php echo $row['fcha_fin']; ?></td>

                <td><?php echo $row['hora_inicio']; ?></td>
                <td><?php echo $row['hora_fin']; ?></td>
                <td><?php echo $row['cupo']; ?></td>


                <td align="center">

                    <a data-toggle="modal" href="#modal-form"
                       onclick="modal('edit_class',<?php echo $row['class_id']; ?>)" class="btn btn-gray btn-small">

                        <i class="icon-wrench"></i> <?php echo get_phrase('edit'); ?>

                    </a>

                    <a data-toggle="modal" href="#modal-delete"
                       onclick="modal_delete('<?php echo base_url(); ?>index.php?site/classes/delete/<?php echo $row['class_id']; ?>')"
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

        <?php echo form_open('site/classes/create', array('class' => 'form-horizontal validatable', 'target' => '_top')); ?>

        <div class="padded">

            <div class="control-group">

                <label class="control-label"><?php echo get_phrase('name'); ?></label>

                <div class="controls">

                    <select name="name" class="uniform" style="width:100%;">
                        <?php
                        $elements = $this->db->get('class_name')->result_array();
                        foreach ($elements as $element):
                            ?>
                            <option
                                value="<?php echo $element['nombre']; ?>"> <?php echo $element['nombre']; ?> </option>
                        <?php
                        endforeach;
                        ?>
                    </select>
                </div>

            </div>
            <div class="control-group">

                <label class="control-label">Sección</label>

                <div class="controls">

                    <select name="seccion" class="uniform" style="width:100%;">
                        <option value="A"> A</option>
                        <option value="B"> B</option>
                        <option value="C"> C</option>
                        <option value="D"> D</option>
                        <option value="E"> E</option>
                    </select>
                </div>

            </div>
            <!--no guarda  -->
            <div class="control-group">

                <label class="control-label"><?php echo get_phrase('fecha_inicio'); ?></label>

                <div class="controls">

                    <input type="text" class="datepicker fill-up" name="fcha_inicio"/>

                </div>

            </div>

            <div class="control-group">

                <label class="control-label"><?php echo get_phrase('fecha_fin'); ?></label>

                <div class="controls">

                    <input type="text" class="datepicker fill-up" name="fcha_fin"/>

                </div>

            </div>


            <div class="control-group">

                <label class="control-label"><?php echo get_phrase('cupo_disponible'); ?></label>

                <div class="controls">

                    <input type="text" class="validate[required]" name="cupo"/>

                </div>

            </div>

            <div class="control-group">

                <label class="control-label"><?php echo get_phrase('starting_time'); ?></label>

                <div class="controls">

                    <select name="hora_inicio" class="uniform" style="width:100%;">

                        <?php for ($i = 0; $i <= 12; $i++): ?>

                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>

                        <?php endfor; ?>

                    </select>

                    <select name="starting_ampm" class="uniform" style="width:100%">

                        <option value="1">am</option>

                        <option value="2">pm</option>

                    </select>

                </div>

            </div>

            <div class="control-group">

                <label class="control-label"><?php echo get_phrase('ending_time'); ?></label>

                <div class="controls">

                    <select name="hora_fin" class="uniform" style="width:100%;">

                        <?php for ($i = 0; $i <= 12; $i++): ?>

                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>

                        <?php endfor; ?>

                    </select>

                    <select name="ending_ampm" class="uniform" style="width:100%">

                        <option value="1">am</option>

                        <option value="2">pm</option>

                    </select>

                </div>

            </div>

            <!--aqui no ha guardado nada -->


        </div>

        <div class="form-actions">

            <button type="submit" class="btn btn-gray"><?php echo get_phrase('add_class'); ?></button>

        </div>

        </form>

    </div>

</div>

<!----CREATION FORM ENDS--->


</div>

</div>

</div>
