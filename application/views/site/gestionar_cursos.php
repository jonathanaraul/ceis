<div class="box">
    <div class="box-header">

        <!--CONTROL TABS START-->
        <ul class="nav nav-tabs nav-tabs-left">
            <li class="active">
                <a href="#notas" data-toggle="tab"><i class="icon-align-justify"></i>
                    <?php echo get_phrase('gestionar_notas'); ?>
                </a></li>
            <li>
                <a href="#asistencias" data-toggle="tab"><i class="icon-align-justify"></i>
                    <?php echo get_phrase('gestionar_asistencias'); ?>
                </a></li>        
        </ul>
        <!--CONTROL TABS END-->

    </div>
    <div class="box-content padded">
        <div class="tab-content">
            <!--NOTAS-->
            <div class="tab-pane box  active" id="notas" style="padding: 5px">
                <center>
                    <?php echo form_open('site/marks'); ?>
                    <table border="0" cellspacing="0" cellpadding="0" class="table table-normal box">
                        <tr>
                            <td><?= 'Seleccionar curso'; ?></td>
                            <td><?= 'Seleccionar materia'; ?></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>
                                <select name="cursos" id="cursos" onchange="ajaxMateriasNotas(this.value);">
                                    <option value="0"><?= 'Seleccionar curso' ?></option>
                                    <?php
                                    $classes = $this->db->get('hs_cursos')->result_array();
                                    foreach ($classes as $row) {
                                        echo '<option value="' . $row['id'] . '">' . $this->crud_model->get_class_name($row['curso']).' Seccion: '.$row['seccion'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </td>
                            <td>
                                <select name="materias" id="materias">
                                    <option value="0"><?= 'Seleccionar materia' ?></option>
                                </select>
                            </td>
                            <td>
                                <input type="button" class="btn btn-normal btn-gray" value="Gestionar Notas"
                                       onclick="consultarNotas(this.value)">
                            </td>
                        </tr>
                    </table>
                    </form>
                </center>


                <br/><br/>
                <div id="loader" style="display: none">
                    <p style="text-align: center">
                        <img src="<?php echo base_url();?>template/images/loader.gif">
                    </p>
                </div>
                <div id="lista_de_notas" style="background-color:  #eaebef;padding: 7px 11px;display: none">

                </div>
            </div>
            <!--Fin de notas-->
            <!--TABLE ASISTENCIAS STARTS-->
            <div
                class="tab-pane box" id="asistencias" style="padding: 5px">
                <center>
                    <?php echo form_open('site/asistencias'); ?>
                    <table border="0" cellspacing="0" cellpadding="0" class="table table-normal box">
                        <tr>
                            <td><?= 'Seleccionar curso'; ?></td>
                            <td><?= 'Seleccionar materia'; ?></td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>
                                <select name="cursos" id="cursos2" onchange="ajaxMateriasAsistencias(this.value);">
                                    <option value="0"><?= 'Seleccionar curso' ?></option>
                                    <?php
                                    $classes = $this->db->get('hs_cursos')->result_array();
                                    foreach ($classes as $row) {
                                        echo '<option value="' . $row['id'] . '">' . $this->crud_model->get_class_name($row['curso']).' Seccion: '.$row['seccion']  . '</option>';
                                    }
                                    ?>
                                </select>
                            </td>
                            <td>
                                <select name="materias" id="materias2">
                                    <option value="0"><?= 'Seleccionar materia' ?></option>
                                </select>
                            </td>
                            <td>
                                <input type="button" class="btn btn-normal btn-gray" value="Asistencia"
                                       onclick="consultarAsistencias(this.value)">
                            </td>
                        </tr>
                    </table>
                    </form>
                </center>


                <br/><br/>
                <div id="loader2" style="display: none">
                    <p style="text-align: center">
                        <img src="<?php echo base_url();?>template/images/loader.gif">
                    </p>
                </div>
                <div id="lista_de_asistencia" style="background-color:  #eaebef;padding: 7px 11px;display: none">

                </div>
            </div>
            <!--TABLE ASISTENCIAS ENDS-->
        </div>
    </div>
</div>
<script type="text/javascript">

    function validateForm() {
    var materia = document.forms["crear_evaluacion"]["materia"].value;
        if (materia == 0) {
            alert("Debe seleccionar una materia");
            return false;
        }
    }

    function consultarNotas(valor) {

        var curso = $('#cursos').val();
        var materia = $('#materias').val();

        if (curso <= 0 || materia <= 0) {
            alert('Debe llenar los dos campos');
            return false;
        }

        $('#lista_de_notas').empty();

        $('#loader').css('display','block');
        var data = 'curso=' + curso + '&materia=' + materia;

        $.post('<?php echo site_url()?>ajax/listarEstudiantesNotas',
            data,
            function (data) {

                $('#lista_de_notas').html(data);
                $('#loader').css('display','none');
                $('#lista_de_notas').css('display','block');
            });
    }

    function ajaxMateriasNotas(valor) {
        $('#materias').empty();
        $('#materias').prev().html('');

        if (valor == 0) {
            $('#evaluaciones').empty();
            $('#evaluaciones').prev().html('');
            $('#evaluaciones').html('<option value="0">Seleccionar evaluacion</option>');
        }

        $.post('<?php echo site_url()?>ajax/obtenMaterias',
            {'curso': valor },
            function (data) {
                $('#materias').html(data);
            });
    }
    function ajaxProfesoresNotas(valor) {
        $('#profesores').empty();
        $('#profesores').prev().html('');

        $.post('<?php echo site_url()?>ajax/obtenProfesores',
            {'materia': valor },
            function (data) {
                $('#profesores').html(data);
            });
    }
    function actualizarNotas(){

        var curso = $('#cursos').val();
        var materia = $('#materias').val();
        var evaluacion = $('#evaluaciones').val();

        var data = 'evaluacion='+evaluacion+'&curso='+curso+'&materia='+materia;
        $.each($(".recopila"), function (index, value) {
            var helper = $(value).val();
            var id = $(value).attr('name');
            data += '&' + id + '=' + helper;
        });

        $.post('<?php echo site_url()?>ajax/guardarNotas',
            {'data': data },
            function (data) {
                location.reload();
            });


    }

    function consultarAsistencias(valor) {

        var curso = $('#cursos2').val();
        var materia = $('#materias2').val();

        if (curso <= 0 || materia <= 0 ) {
            alert('Debe llenar los tres campos');
            return false;
        }

        $('#lista_de_asistencia').empty();

        $('#loader2').css('display','block');
        var data = 'curso=' + curso + '&materia=' + materia;

        $.post('<?php echo site_url()?>ajax/listarAsistencias',
            data,
            function (data) {

                $('#lista_de_asistencia').html(data);
                $('#loader2').css('display','none');
                $('#lista_de_asistencia').css('display','block');
            });
    }

    function ajaxMateriasAsistencias(valor) {
        $('#materias2').empty();
        $('#materias2').prev().html('');

        $.post('<?php echo site_url()?>ajax/obtenMaterias',
            {'curso': valor },
            function (data) {
                $('#materias2').html(data);
            });
    }

    function actualizarAsistencias(){
        var fecha = $('#fecha').val();
        var curso = $('#cursos2').val();
        var materia = $('#materias2').val();

        var data = 'fecha='+fecha+'&curso='+curso+'&materia='+materia;
        $.each($(".recopila"), function (index, value) {
            var helper = $(value).is(':checked');
            var id = $(value).attr('name');
            data += '&' + id + '=' + helper;
        });

        console.log(data);

        $.post('<?php echo site_url()?>ajax/guardarAsistencias',
            {'data': data },
            function (data) {
                location.reload();
            });


    }

</script>