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
                <div>Nombre</div>
            </th>

            <th>
                <div>Secci&oacute;n</div>
            </th>

            <th>
                <div>Período</div>
            </th>

            <th>
                <div>Cupo</div>
            </th>
            <th>
                <div><?php echo get_phrase('opciones'); ?></div>
            </th>

        </tr>

        </thead>

        <tbody>

        <?php $count = 1;
        foreach ($cursos as $row): ?>

            <tr>

                <td><?= $count++; ?></td>

                <td><?= $row['nombre']; ?></td>

                <td><?= $row['seccion']; ?></td>

                <td><?php echo  $this->crud_model->get_hs_periodo_nombre_periodo($row['periodo']); ?></td>

                <td><?= $row['cupo']; ?></td>


                <td align="center">

                    <a data-toggle="modal" href="#modal-form"
                       onclick="modal('edit_curso',<?php echo $row['id']; ?>)" class="btn btn-gray btn-small">

                        <i class="icon-wrench"></i> <?php echo get_phrase('edit'); ?>

                    </a>

                    <a data-toggle="modal" href="#modal-delete"
                       onclick="modal_delete('<?php echo base_url(); ?>index.php?admin/cursos/delete/<?php echo $row['id']; ?>')"
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

        <?php echo form_open('admin/cursos/create', array('class' => 'form-horizontal validatable', 'target' => '_top')); ?>

        <div class="padded">

            <div class="control-group">
                <label class="control-label"><?= 'Nombre'?></label>
                <div class="controls">
                    <select name="nombre" class="uniform" style="width:100%;">
                        <?php
                        $elements = $this->db->get('class_name')->result_array();
                        foreach ($elements as $element){
                            echo '<option value="'.$element['nombre'].'">'.$element['nombre'].'</option>';
                        }
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
            <div class="control-group">
                <label class="control-label"><?= 'Periodo' ?></label>
                <div class="controls">
                    <select name="periodo" class="uniform" style="width:100%;">
                        <?php
                        $elements = $this->db->get('hs_periodo')->result_array();
                        foreach ($elements as $element){
                            echo '<option value="'.$element['id'].'">'.$element['nombre_periodo'].'</option>';
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><?= 'Cupo Disponible' ?></label>
                <div class="controls">
                    <input type="text" class="validate[required]" name="cupo"/>
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

<script type="text/javascript">

    function gestionarNotas(valor) {

        var curso = $('#cursos').val();
        var materia = $('#materias').val();
        var evaluacion = $('#evaluaciones').val();

        if (curso <= 0 || materia <= 0 || evaluacion <= 0) {
            alert('Debe llenar los tres campos');
            return false;
        }

        $('#asistencias').empty();

        $('#loader').css('display','block');
        var data = 'curso=' + curso + '&materia=' + materia + '&evaluacion=' + evaluacion;

        $.post('<?php echo site_url()?>ajax/obtenAsistencias',
            data,
            function (data) {

                $('#asistencias').html(data);
                $('#loader').css('display','none');
                $('#asistencias').css('display','block');
            });
    }




</script>