<div class="box">
    <div class="box-header">

        <!---CONTROL TABS START-->
        <ul class="nav nav-tabs nav-tabs-left">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="icon-align-justify"></i>
                    <?php echo get_phrase('lista_de_Inscripciones'); ?>
                </a></li>
            <li>
                <a href="#add" data-toggle="tab"><i class="icon-plus"></i>
                    <?php echo get_phrase('agregar_inscripcion'); ?>
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
                            <div><?php echo get_phrase('estudiante'); ?></div>
                        </th>
                        <th>
                            <div><?php echo get_phrase('curso'); ?></div>
                        </th>
                        <th>
                            <div><?php echo get_phrase('status'); ?></div>
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
                    foreach ($hs_inscripcion as $row): ?>
                        <tr>
                            <td><?php echo $count++; ?></td>
                            <td>

                                <?php
                                $this->db->select('name, papellido,ndocumento');
                                $query = $this->db->get_where('student', array('student_id' => $row['estudiante']))->result_array();
                                echo $query[0]['name'] . ' ' . $query[0]['papellido'] . ' - ' . $query[0]['ndocumento'];
                                ?>
                            </td>
                            <td>

                                <?php
                                $this->db->select('nombre, seccion');
                                $query = $this->db->get_where('hs_cursos', array('id' => $row['curso']))->result_array();
                                echo $query[0]['nombre'] . ' ' . $query[0]['seccion'];
                                ?>
                            </td>
                            <td><?php if ($row['status'] == 0) echo 'Preinscrito'; else echo 'Inscrito' ?></td>

                            <td><?php echo $row['create_at'] ?></td>
                            <td align="center">
                                <a data-toggle="modal" href="#modal-form"
                                   onclick="modal('Editar_Inscripcion',<?php echo $row['id']; ?>)"
                                   class="btn btn-gray btn-small">
                                    <i class="icon-wrench"></i> <?php echo get_phrase('edit'); ?>
                                </a>
                                <a data-toggle="modal" href="#modal-delete"
                                   onclick="modal_delete('<?php echo base_url(); ?>index.php?site/inscripcion/delete/<?php echo $row['id']; ?>')"
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
                <div class="box-content padded">
                    <div class="tab-content">
                        <div class="tab-pane active" id="list">
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-normal box">
                                <thead>
                                    <tr>
                                        <td><?= 'Seleccionar Tipo de Inscripción'; ?></td>
                                        <td><?= 'Seleccionar Curso'; ?></td>
                                        <td></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <select name="inscripcion" id="inscripcion" >
                                                <option value="0"><?= 'Tipo de Inscripción' ?></option>
                                                <option value="1"><?= 'Individual' ?></option>
                                                <option value="2"><?= 'Por Lotes' ?></option>
                                            </select>
                                        </td>
                                        <td>
                                            <select name="cursos" id="cursos">
                                                <option value="0"><?= 'Seleccionar Curso' ?></option>
                                                <?php
                                                $classes = $this->db->get('hs_cursos')->result_array();
                                                foreach ($classes as $row) {
                                                    echo '<option value="' . $row['id'] . '">' . $row['nombre'].' - Sección '. $row['seccion'] . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </td>
                                        <td colspan="2" style="text-align: center;">
                                            <input type="button" class="btn btn-normal btn-gray" value="Gestionar Inscripción"
                                                   onclick="gestionarInscripcion(this.value)">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <br/><br/>
                            <div id="loader" style="display: none">
                                <p style="text-align: center">
                                    <img src="<?php echo base_url();?>template/images/loader.gif">
                                </p>
                            </div>
                                <div id="area_inscripcion" style="background-color:  #eaebef;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--CREATION FORM ENDS-->
        </div>
    </div>
</div>

<script type="text/javascript">

    function gestionarInscripcion(valor) {

        var inscripcion = $('#inscripcion').val();
        var curso = $('#cursos').val();

        if (inscripcion <= 0 || curso <= 0) {
            alert('Debe llenar ambos campos');
            return false;
        }

        $('#area_inscripcion').empty();

        $('#loader').css('display','block');
        var data = 'inscripcion=' + inscripcion + '&curso=' + curso;

        $.post('<?php echo site_url()?>ajax/inscribir',
            data,
            function (data) {

                $('#area_inscripcion').html(data);
                $('#loader').css('display','none');
                $('#area_inscripcion').css('display','block');
            });
    }

    function inscribirEstudiante(){

        var curso = $('#cursos').val();
        var estudiante = $('#estudiante').val();
        var status = $('#status').val();

        var data = 'curso=' + curso + '&estudiante=' + estudiante + '&status=' + status;

        $.post('<?php echo site_url()?>ajax/guardarInscripcion',
            data,
            function (data) {
                location.reload();
            });


    }

    function inscribirEstudiantes(){

        var curso = $('#cursos').val();
        
        var data = 'curso='+curso;
        $.each($(".recopila"), function (index, value) {
            var helper = $(value).val();
            var id = $(value).attr('name');
            data += '&' + id + '=' + helper;
        });

        $.post('<?php echo site_url()?>ajax/guardarInscripciones',
            {'data': data },
            function (data) {
                location.reload();
            });


    }

</script>