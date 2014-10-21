<?php if ($class_id != ""): ?>

    <div class="box">
    <div class="box-header">
        <!------CONTROL TABS START------->
        <ul class="nav nav-tabs nav-tabs-left">
            <li class="active"><a href="#list" data-toggle="tab"><i
                        class="icon-align-justify"></i> <?php echo get_phrase('student_list'); ?> </a></li>
            <li><a href="#add" data-toggle="tab"><i class="icon-plus"></i> <?php echo get_phrase('add_student'); ?> </a>
            </li>
        </ul>
        <!------CONTROL TABS END------->
    </div>
    <div class="box-content">
    <div class="tab-content">
    <!----TABLE LISTING STARTS--->
    <div class="tab-pane  active" id="list">
        <center>
            <br/>
            <select name="class_id"
                    onchange="window.location='<?php echo base_url(); ?>index.php?admin/student/'+this.value">
                <option value=""><?php echo get_phrase('select_a_class'); ?></option>
                <?php

                $classes = $this->db->get('class')->result_array();

                foreach ($classes as $row):

                    ?>
                    <option value="<?php echo $row['class_id']; ?>"

                        <?php if ($class_id == $row['class_id']) echo 'selected'; ?>>
                        Class <?php echo $row['name']; ?></option>
                <?php

                endforeach;

                ?>
            </select>
            <br/>
            <br/>
            <?php if ($class_id == ''): ?>
                <div id="ask_class" class="  alert alert-info  " style="width:300px;"><i class="icon-info-sign"></i>Por
                    Favor Seleccione un Curso
                </div>
                <script>
                    $(document).ready(function () {
                        function shake() {
                            $("#ask_class").effect("shake");
                        }

                        setTimeout(shake, 500);
                    });
                </script>
                <br/>
                <br/>
            <?php endif; ?>
            <?php if ($class_id != ''): ?>
            <div class="action-nav-normal">
                <div class=" action-nav-button" style="width:300px;"><a href="#" title="Users"> <img
                            src="<?php echo base_url(); ?>template/images/icons/user.png"/>
                        <span>Total <?php echo count($students); ?> estudiantes</span> </a></div>
            </div>
        </center>
        <div class="box">
            <div class="box-content">
                <div id="dataTables">
                    <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive ">
                        <thead>
                        <tr>
                            <th>
                                <div><?php echo get_phrase('id'); ?></div>
                            </th>
                            <th width="80">
                                <div><?php echo get_phrase('photo'); ?></div>
                            </th>
                            <th>
                                <div><?php echo get_phrase('student_name'); ?></div>
                            </th>
                            <th class="span3">
                                <div><?php echo get_phrase('address'); ?></div>
                            </th>
                            <th>
                                <div><?php echo get_phrase('email'); ?></div>
                            </th>
                            <th>
                                <div><?php echo get_phrase('tlf_contacto'); ?></div>
                            </th>
                            <th>
                                <div><?php echo get_phrase('options'); ?></div>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $count = 1;
                        foreach ($students as $row): ?>
                            <tr>
                                <td class="span1"><?php echo $row['student_id']; ?></td>
                                <td>
                                    <div class="avatar"><img
                                            src="<?php echo $this->crud_model->get_image_url('student', $row['student_id']); ?>"
                                            class="avatar-medium"/></div>
                                </td>
                                <td><?php echo $row['name']; ?> <?php echo $row['snombre']; ?> <?php echo $row['papellido']; ?> <?php echo $row['sapellido']; ?></td>
                                <td><?php echo $row['address']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo $row['phone']; ?></td>
                                <td align="center" class="span5">
                                    <a data-toggle="modal" href="#modal-form"
                                                                    onclick="modal('student_profile',<?php echo $row['student_id']; ?>)"
                                                                    class="btn btn-default btn-small"> <i
                                            class="icon-user"></i> <?php echo get_phrase('profile'); ?> </a> <a
                                        data-toggle="modal" href="#modal-form"
                                        onclick="modal('student_academic_result',<?php echo $row['student_id']; ?>)"
                                        class="btn btn-default btn-small"> <i
                                            class="icon-file-alt"></i> <?php echo get_phrase('marksheet'); ?> </a> <a
                                        data-toggle="modal" href="#modal-form"
                                        onclick="modal('student_id_card',<?php echo $row['student_id']; ?>)"
                                        class="btn btn-default btn-small"> <i
                                            class="icon-credit-card"></i> <?php echo get_phrase('id_card'); ?> </a> <a
                                        data-toggle="modal" href="#modal-form"
                                        onclick="modal('edit_student',<?php echo $row['student_id']; ?>,<?php echo $class_id; ?>)"
                                        class="btn btn-gray btn-small"> <i
                                            class="icon-wrench"></i> <?php echo get_phrase('edit'); ?> </a> <a
                                        data-toggle="modal" href="#modal-delete"
                                        onclick="modal_delete('<?php echo base_url(); ?>index.php?admin/student/<?php echo $class_id; ?>/delete/<?php echo $row['student_id']; ?>')"
                                        class="btn btn-red btn-small"> <i
                                            class="icon-trash"></i> <?php echo get_phrase('delete'); ?> </a>
                                    <!--<a href="<?php echo base_url(); ?>index.php?admin/student/<?php echo $class_id; ?>/personal_profile/<?php echo $row['student_id']; ?>"

                                             class="btn btn-gray">

                                                <i class="icon-wrench"></i> <?php echo get_phrase('personal_profile'); ?>

                                        </a>

                                        <a href="<?php echo base_url(); ?>index.php?admin/student/<?php echo $class_id; ?>/academic_result/<?php echo $row['student_id']; ?>"

                                             class="btn btn-gray">

                                                <i class="icon-wrench"></i> <?php echo get_phrase('academic_result'); ?>

                                        </a>

                                        <a href="<?php echo base_url(); ?>index.php?admin/student/<?php echo $class_id; ?>/edit/<?php echo $row['student_id']; ?>"

                                            class="btn btn-gray">

                                                <i class="icon-wrench"></i> <?php echo get_phrase('edit'); ?>

                                        </a>

                                        <a href="<?php echo base_url(); ?>index.php?admin/student/<?php echo $class_id; ?>/delete/<?php echo $row['student_id']; ?>" onclick="return confirm('delete?')"

                                             class="btn btn-red">

                                                <i class="icon-trash"></i> <?php echo get_phrase('delete'); ?>

                                        </a>--></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>

    <!----TABLE LISTING ENDS--->

    <!----CREATION FORM STARTS---->

    <div class="tab-pane box" id="add" style="padding: 5px">
    <div
        class="box-content"> <?php echo form_open('admin/student/create/', array('class' => 'form-horizontal validatable', 'enctype' => 'multipart/form-data')); ?>
    <script>
        function mostrarTmilitar(valor) {
            if (valor != 'masculino')
                $('#divtMilitar').css('display', 'none');
            else
                $('#divtMilitar').css('display', 'block');
        }
        function mostrarTipoingreso(valor) {
            if (valor != 'empresa')
                $('#divTipoingreso').css('display', 'none');
            else
                $('#divTipoingreso').css('display', 'block');
        }
        function mostrarTieneHijos(valor) {
            if (valor != 'si')
                $('#divTienehijos').css('display', 'none');
            else
                $('#divTienehijos').css('display', 'block');
        }
        function mostrarTipoingresoSena(valor) {
            if (valor != 'convenio_sena')
                $('.divconvenio_sena').css('display', 'none');
            else
                $('.divconvenio_sena').css('display', 'block');
        }


    </script>
    <div class="padded">
    <div class="control-group">
        <label class="control-label"><?php echo get_phrase('tipo_de_documento'); ?></label>

        <div class="controls">
            <select name="documento" class="uniform" style="width:100%;">
                <option value="0">-- Seleccione Uno --</option>
                <option value="CC"><?php echo get_phrase('CEDULA_DE_CIUDADANIA'); ?></option>

            </select>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label"><?php echo get_phrase('numero_de_documento'); ?></label>

        <div class="controls">
            <input type="text" class="validate[required]" name="ndocumento"/>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label"><?php echo get_phrase('primer_nombre'); ?></label>

        <div class="controls">
            <input type="text" class="validate[required]" name="name"/>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label"><?php echo get_phrase('segundo_nombre'); ?></label>

        <div class="controls">
            <input type="text" name="snombre"/>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label"><?php echo get_phrase('primer_apellido'); ?></label>

        <div class="controls">
            <input type="text" class="validate[required]" name="papellido"/>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label"><?php echo get_phrase('segundo_apellido'); ?></label>

        <div class="controls">
            <input type="text" class="validate[required]" name="sapellido"/>
        </div>
    </div>


    <div class="control-group">
        <label class="control-label"><?php echo get_phrase('tipo_de_ingreso'); ?></label>

        <div class="controls">
            <select name="tipodeingreso" class="uniform" style="width:100%;" onchange="mostrarTipoingreso(this.value);">
                <option value="0">-- Seleccione Uno --</option>
                <option value="becado"><?php echo get_phrase('becado'); ?></option>
                <option value="empresa"><?php echo get_phrase('empresa'); ?></option>

                <option value="otro"><?php echo get_phrase('otro'); ?></option>
            </select>
        </div>
    </div>

    <div class="control-group" id="divTipoingreso" style="display: none;">
        <label class="control-label"><?php echo get_phrase('empresa'); ?></label>

        <div class="controls">
            <select name="empresa" class="uniform" style="width:100%;">
                <option value="0">-- Seleccione Uno --</option>
                <?php
                $empresas = $this->db->get('empresas')->result_array();
                foreach ($empresas as $row2):
                    ?>
                    <option value="<?php echo $row2['empresas_id']; ?>"
                        <?php if ($row['empresas_id'] == $row2['empresas_id']) echo 'selected'; ?>> <?php echo $row2['nombre_empresas']; ?> </option>
                <?php
                endforeach;
                ?>
            </select>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label"><?php echo get_phrase('convenio'); ?></label>

        <div class="controls">
            <select name="convenio" class="uniform" style="width:100%;" onchange="mostrarTipoingresoSena(this.value);">
                <option value="0">-- Seleccione Uno --</option>
                <option value="convenio_sena"><?php echo get_phrase('convenio_sena'); ?></option>
                <option value="ninguno"><?php echo get_phrase('ninguno'); ?></option>

            </select>
        </div>
    </div>

    <div class="control-group divconvenio_sena" style="display: none;">
        <label class="control-label"><?php echo get_phrase('codigo_regional'); ?></label>

        <div class="controls">
            <input type="text" class="" name="cod_regional"/>
        </div>
    </div>
    <div class="control-group divconvenio_sena" style="display: none;">
        <label class="control-label"><?php echo get_phrase('nombre_regional'); ?></label>

        <div class="controls">
            <input type="text" class="" name="nom_regional"/>
        </div>
    </div>
    <div class="control-group divconvenio_sena" style="display: none;">
        <label class="control-label"><?php echo get_phrase('codigo_departamento'); ?></label>

        <div class="controls">
            <input type="text" class="" name="cod_departamento"/>
        </div>
    </div>
    <div class="control-group divconvenio_sena" style="display: none;">
        <label class="control-label"><?php echo get_phrase('nombre_departamento'); ?></label>

        <div class="controls">
            <input type="text" class="" name="nom_departamento"/>
        </div>
    </div>
    <div class="control-group divconvenio_sena" style="display: none;">
        <label class="control-label"><?php echo get_phrase('codigo_municipio'); ?></label>

        <div class="controls">
            <input type="text" class="" name="cod_municipio"/>
        </div>
    </div>
    <div class="control-group divconvenio_sena" style="display: none;">
        <label class="control-label"><?php echo get_phrase('nombre_municipio'); ?></label>

        <div class="controls">
            <input type="text" class="" name="nom_municipio"/>
        </div>
    </div>
    <div class="control-group divconvenio_sena" style="display: none;">
        <label class="control-label"><?php echo get_phrase('empresa_gremio'); ?></label>

        <div class="controls">
            <input type="text" class="" name="emp_gremio"/>
        </div>
    </div>
    <div class="control-group divconvenio_sena" style="display: none;">
        <label class="control-label"><?php echo get_phrase('linea_formacion'); ?></label>

        <div class="controls">
            <input type="text" class="" name="lin_formacion"/>
        </div>
    </div>
    <div class="control-group divconvenio_sena" style="display: none;">
        <label class="control-label"><?php echo get_phrase('codigo_ocupacion'); ?></label>

        <div class="controls">
            <input type="text" class="" name="cod_ocupacion"/>
        </div>
    </div>
    <div class="control-group divconvenio_sena" style="display: none;">
        <label class="control-label"><?php echo get_phrase('nombre_ocupacion'); ?></label>

        <div class="controls">
            <input type="text" class="" name="nom_ocupacion"/>
        </div>
    </div>
    <div class="control-group divconvenio_sena" style="display: none;">
        <label class="control-label"><?php echo get_phrase('codigo_curso'); ?></label>

        <div class="controls">
            <input type="text" class="" name="cod_curso"/>
        </div>
    </div>
    <div class="control-group divconvenio_sena" style="display: none;">
        <label class="control-label"><?php echo get_phrase('nombre_sector_economico'); ?></label>

        <div class="controls">
            <input type="text" class="" name="nom_sector_eco"/>
        </div>
    </div>
    <div class="control-group divconvenio_sena" style="display: none;">
        <label class="control-label"><?php echo get_phrase('nombre_subsector_economico'); ?></label>

        <div class="controls">
            <input type="text" class="" name="nom_subsector_eco"/>
        </div>
    </div>

    <div class="control-group divconvenio_sena" style="display: none;">
        <label class="control-label"><?php echo get_phrase('caracterizacion'); ?></label>

        <div class="controls">
            <select name="caracterizacion" class="uniform" style="width:100%;">
                <option value="0">-- Seleccione Uno --</option>
                <option value="NINGUNA"><?php echo get_phrase('Ninguna'); ?></option>
                <option value="INDIGENAS DESPLAZADOS POR LA VIOLENCIA"><?php echo get_phrase('INDIGENAS_DESPLAZADOS_POR_LA VIOLENCIA'); ?></option>
                <option value="INDIGENAS DESPLAZADOS POR LA VIOLENCIA CABEZA DE FAMILIA"><?php echo get_phrase('INDIGENAS_DESPLAZADOS_POR_LA_VIOLENCIA_CABEZA_DE_FAMILIA'); ?></option>
                <option value="DESPLAZADOS POR LA VIOLENCIA "><?php echo get_phrase('DESPLAZADOS_POR_LA_VIOLENCIA '); ?></option>
                <option value="DESPLAZADOS POR LA VIOLENCIA CABEZA DE FAMILIA "><?php echo get_phrase('DESPLAZADOS_POR_LA_VIOLENCIA_CABEZA_DE_FAMILIA'); ?></option>
                <option value="AFROCOLOMBIANOS DESPLAZADOS POR LA VIOLENCIA"><?php echo get_phrase('AFROCOLOMBIANOS_DESPLAZADOS_POR_LA_VIOLENCIA'); ?></option>
                <option value="DESPLAZADOS DISCAPACITADOS"><?php echo get_phrase('DESPLAZADOS_DISCAPACITADOS'); ?></option>
                <option value="DESPLAZADOS POR FENOMENOS NATURALES "><?php echo get_phrase('DESPLAZADOS_POR_FENOMENOS_NATURALES '); ?></option>
                <option value="CABEZA DE FAMILIA"><?php echo get_phrase('CABEZA_DE_FAMILIA'); ?></option>
                <option value="INDIGENAS"><?php echo get_phrase('INDIGENAS'); ?></option>
                <option value="INPEC"><?php echo get_phrase('INPEC'); ?></option>
                <option value="JOVENES VULNERABLES"><?php echo get_phrase('JOVENES_VULNERABLES'); ?></option>
                <option value="ADOLESCENTE EN CONFLICTO CON LA LEY PENAL"><?php echo get_phrase('ADOLESCENTE_EN_CONFLICTO_CON_LA_LEY_PENAL'); ?></option>
                <option value="MUJER CABEZA DE FAMILIA"><?php echo get_phrase('MUJER_CABEZA_DE_FAMILIA'); ?></option>
                <option value="NEGRITUDES"><?php echo get_phrase('NEGRITUDES'); ?></option>
                <option value="PROC REINTEGRACION"><?php echo get_phrase('PROC_REINTEGRACION'); ?></option>
                <option value="ADOLESCENTE DESVINCULADO DE GRUPOS ARMADOS ORGANIZADOS"><?php echo get_phrase('ADOLESCENTE_DESVINCULADO_DE_GRUPOS_ARMADOS_ORGANIZADOS'); ?></option>
                <option value="ADOLESCENTE TRABAJADOR"><?php echo get_phrase('ADOLESCENTE_TRABAJADORo'); ?></option>
                <option value="ARTESANOS"><?php echo get_phrase('ARTESANOS'); ?></option>
                <option value="MICROEMPRESAS"><?php echo get_phrase('MICROEMPRESAS'); ?></option>
                <option value="EMPRENDEDORES"><?php echo get_phrase('EMPRENDEDORES'); ?></option>
                <option value="REMITIDOS POR EL CIE"><?php echo get_phrase('REMITIDOS_POR_EL_CIE'); ?></option>
                <option value="REMITIDOS POR EL PAL"><?php echo get_phrase('REMITIDOS_POR_EL_PAL'); ?></option>
                <option value="SOLDADOS CAMPESINOS"><?php echo get_phrase('SOLDADOS_CAMPESINOS'); ?></option>
                <option value="SOBREVIVIENTES MINAS ANTIPERSONALES"><?php echo get_phrase('SOBREVIVIENTES_MINAS_ANTIPERSONALES'); ?></option>
                <option value="AFROCOLOMBIANOS"><?php echo get_phrase('AFROCOLOMBIANOS'); ?></option>
                <option value="PALENQUEROS"><?php echo get_phrase('PALENQUEROS'); ?></option>
                <option value="RAIZALES"><?php echo get_phrase('RAIZALES'); ?></option>
                <option value="ROM"><?php echo get_phrase('ROM'); ?></option>
            </select>
        </div>
    </div>
    <div class="control-group divconvenio_sena" style="display: none;">
        <label class="control-label"><?php echo get_phrase('cod_dep_dom'); ?></label>

        <div class="controls">
            <input type="text" class="" name="cod_dep_dom"/>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label"><?php echo get_phrase('fecha_de_nacimiento'); ?></label>

        <div class="controls">
            <input type="text" class="datepicker fill-up" name="birthday"/>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label"><?php echo get_phrase('sex'); ?></label>

        <div class="controls">
            <select name="sex" class="uniform" style="width:100%;" onchange="mostrarTmilitar(this.value);">
                <option value="0">-- Seleccione Uno --</option>
                <option value="masculino"><?php echo get_phrase('male'); ?></option>
                <option value="femenino"><?php echo get_phrase('female'); ?></option>
            </select>
        </div>
    </div>
    <div class="control-group" id="divtMilitar" style="display: none;">
        <label class="control-label"><?php echo get_phrase('Número_de_Libreta_Militar'); ?></label>

        <div class="controls">
            <input type="text" class="" name="nlibmilitar"/>
        </div>
    </div>


    <div class="control-group">
        <label class="control-label"><?php echo get_phrase('estado_civil'); ?></label>

        <div class="controls">
            <select name="estado_civil" class="uniform" style="width:100%;">
                <option value="0">-- Seleccione Uno --</option>
                <option value="Soltero"><?php echo get_phrase('Soltero'); ?></option>
                <option value="casado"><?php echo get_phrase('casado'); ?></option>
                <option value="Separado"><?php echo get_phrase('Separado'); ?></option>
                <option value="Union_Libre"><?php echo get_phrase('Unión_Libre'); ?></option>
                <option value="Viudo"><?php echo get_phrase('Viudo'); ?></option>
            </select>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label"><?php echo get_phrase('tiene_hijos'); ?></label>

        <div class="controls">
            <select name="tienehijos" class="uniform" style="width:100%;" onchange="mostrarTieneHijos(this.value);">
                <option value="0">-- Seleccione Uno --</option>
                <option value="si"><?php echo get_phrase('si'); ?></option>
                <option value="no"><?php echo get_phrase('no'); ?></option>
            </select>
        </div>
    </div>
    <div class="control-group" id="divTienehijos" style="display: none;">
        <label class="control-label"><?php echo get_phrase('numero_de_hijos'); ?></label>

        <div class="controls">
            <select name="ndehijos" class="uniform" style="width:100%;">
                <option value="0">-- Seleccione Uno --</option>
                <option value="1"><?php echo get_phrase('1'); ?></option>
                <option value="2"><?php echo get_phrase('2'); ?></option>
                <option value="3"><?php echo get_phrase('3'); ?></option>
                <option value="4"><?php echo get_phrase('4'); ?></option>
                <option value="5"><?php echo get_phrase('5'); ?></option>
                <option value="6"><?php echo get_phrase('6'); ?></option>
            </select>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label"><?php echo get_phrase('Direccion de residencia'); ?></label>

        <div class="controls">
            <input type="text" class="" name="address"/>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label"><?php echo get_phrase('Barrio'); ?></label>

        <div class="controls">
            <input type="text" class="" name="barrio"/>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label"><?php echo get_phrase('departamento'); ?></label>

        <div class="controls">
            <select name="departamento" class="uniform" style="width:100%;">
                <option value="0">-- Seleccione Uno --</option>
                <option value="Amazonas"><?php echo get_phrase('Amazonas'); ?></option>
                <option value="Antioquia"><?php echo get_phrase('Antioquia'); ?></option>
                <option value="Arauca"><?php echo get_phrase('Arauca'); ?></option>
                <option value="Atlantico"><?php echo get_phrase('Atlantico'); ?></option>
                <option value="Bolivar"><?php echo get_phrase('Bolivar'); ?></option>
                <option value="Boyaca"><?php echo get_phrase('Boyaca'); ?></option>
                <option value="Caldas"><?php echo get_phrase('Caldas'); ?></option>
                <option value="Caqueta"><?php echo get_phrase('Caqueta'); ?></option>
                <option value="Casanare"><?php echo get_phrase('Casanare'); ?></option>
                <option value="Cauca"><?php echo get_phrase('Cauca'); ?></option>
                <option value="Cesar"><?php echo get_phrase('Cesar'); ?></option>
                <option value="Choco"><?php echo get_phrase('Choco'); ?></option>
                <option value="Cordoba"><?php echo get_phrase('Cordoba'); ?></option>
                <option value="Cundinamarca"><?php echo get_phrase('Cundinamarca'); ?></option>
                <option value="Guainia"><?php echo get_phrase('Guainia'); ?></option>
                <option value="Guaviare"><?php echo get_phrase('Guaviare'); ?></option>
                <option value="Huila"><?php echo get_phrase('Huila'); ?></option>
                <option value="La Guajira"><?php echo get_phrase('La Guajira'); ?></option>
                <option value="Magdalena"><?php echo get_phrase('Magdalena'); ?></option>
                <option value="Meta"><?php echo get_phrase('Meta'); ?></option>
                <option value="Nariño"><?php echo get_phrase('Nariño'); ?></option>
                <option value="Norte de Santander"><?php echo get_phrase('Norte de Santander'); ?></option>
                <option value="Putumayo"><?php echo get_phrase('Putumayo'); ?></option>
                <option value="Quindio"><?php echo get_phrase('Quindio'); ?></option>
                <option value="Risaralda"><?php echo get_phrase('Risaralda'); ?></option>
                <option value="San Andres y Providencia"><?php echo get_phrase('San Andres y Providencia'); ?></option>
                <option value="Santander"><?php echo get_phrase('Santander'); ?></option>
                <option value="Sucre"><?php echo get_phrase('Sucre'); ?></option>
                <option value="Tolima"><?php echo get_phrase('Tolima'); ?></option>
                <option value="Valle del Cauca"><?php echo get_phrase('Valle del Cauca'); ?></option>
                <option value="Vaupes"><?php echo get_phrase('Vaupes'); ?></option>
                <option value="Vichada"><?php echo get_phrase('Vichada'); ?></option>
            </select>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label"><?php echo get_phrase('Municipio'); ?></label>

        <div class="controls">
            <input type="text" class="" name="municipio"/>
        </div>
    </div>

    <div class="control-group">
        <label class="control-label"><?php echo get_phrase('telefono_residencia'); ?></label>

        <div class="controls">
            <input type="text" class="" name="phone"/>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label"><?php echo get_phrase('email'); ?></label>

        <div class="controls">
            <input type="text" class="" name="email"/>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label"><?php echo get_phrase('class'); ?></label>

        <div class="controls">
            <select name="class_id" class="uniform" style="width:100%;">
                <?php

                $classes = $this->db->get('class')->result_array();

                foreach ($classes as $row):

                    ?>
                    <option value="<?php echo $row['class_id']; ?>"> <?php echo $row['name']; ?> </option>
                <?php

                endforeach;

                ?>
            </select>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label"><?php echo get_phrase('photo'); ?></label>

        <div class="controls" style="width:210px;">
            <input type="file" class="" name="userfile" id="imgInp"/>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label"></label>

        <div class="controls" style="width:210px;"><img id="blah" src="<?php echo base_url(); ?>uploads/user.jpg"
                                                        alt="your image" height="100"/></div>
    </div>
    </div>
    <div class="form-actions">
        <button type="submit" class="btn btn-gray"><?php echo get_phrase('add_student'); ?></button>
    </div>
    <?php echo form_close(); ?> </div>
    </div>

    <!----CREATION FORM ENDS--->

    </div>
    </div>
    </div>
<?php endif; ?>
<?php if ($class_id == ""): ?>
    <center>
        <div class="span5" style="float:none !important;">
            <div class="box">
                <div class="box-header"><span class="title"> <i
                            class="icon-info-sign"></i><?php echo get_phrase('alert_studinate'); ?></span></div>
                <div class="box-content padded"><br/>
                    <select name="class_id"
                            onchange="window.location='<?php echo base_url(); ?>index.php?admin/student/'+this.value">
                        <option value=""><?php echo get_phrase('select_a_class'); ?></option>
                        <?php

                        $classes = $this->db->get('class')->result_array();

                        foreach ($classes as $row):

                            ?>
                            <option value="<?php echo $row['class_id']; ?>"

                                <?php if ($class_id == $row['class_id']) echo 'selected'; ?>>
                                Class <?php echo $row['name']; ?></option>
                        <?php

                        endforeach;

                        ?>
                    </select>
                    <hr/>
                    <script>

                        $(document).ready(function () {

                            function ask() {

                                Growl.info({title: "Seleccione un Curso", text: " "});

                            }

                            setTimeout(ask, 500);

                        });

                    </script>
                </div>
            </div>
        </div>
    </center>
<?php endif; ?>
<script>

    function readURL(input) {

        if (input.files && input.files[0]) {

            var reader = new FileReader();


            reader.onload = function (e) {

                $('#blah').attr('src', e.target.result);

            }


            reader.readAsDataURL(input.files[0]);

        }

    }


    $("#imgInp").change(function () {

        readURL(this);

    });

</script>