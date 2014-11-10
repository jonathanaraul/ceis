<div class="box">
    <div class="box-header">
        <!--CONTROL TABS START-->
        <ul class="nav nav-tabs nav-tabs-left">
            <li class="active"><a href="#list" data-toggle="tab"><i
                        class="icon-align-justify"></i> <?php echo get_phrase('student_list'); ?> </a></li>
        <?php 
            if($this->session->userdata('rol') == 1){
        ?>
            <li><a href="#add" data-toggle="tab"><i class="icon-plus"></i> <?php echo get_phrase('add_student'); ?> </a>
            </li>
        <?php } ?>
        </ul>
        <!--CONTROL TABS END-->
    </div>
    <div class="box-content">
        <div class="tab-content">
            <!--TABLE LISTING STARTS-->
            <div class="tab-pane  active" id="list">
                <div class="box">
                    <div class="box-content">
                        <div id="dataTables">
                            <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive ">
                                <thead>
                                <tr>
                                    <th>
                                        <div><?php echo get_phrase('cedula'); ?></div>
                                    </th>
                                    <th width="20%">
                                        <div><?php echo get_phrase('nombre'); ?></div>
                                    </th>
                                    <th class="span2">
                                        <div><?php echo get_phrase('direccion'); ?></div>
                                    </th>
                                    <th>
                                        <div><?php echo get_phrase('email'); ?></div>
                                    </th>
                                    <th>
                                        <div><?php echo get_phrase('telefono'); ?></div>
                                    </th>
                                    <th>
                                        <div><?php echo get_phrase('options'); ?></div>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $count = 1;
                                foreach ($estudiantes as $row): ?>
                                    <tr>
                                        <td><?php echo $row['documento']; ?></td>
                                        <td><?php echo $row['nombre']; ?> <?php echo $row['snombre']; ?> <?php echo $row['papellido']; ?> <?php echo $row['sapellido']; ?></td>
                                        <td><?php echo $row['direccion']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['telefono']; ?></td>
                                        <td align="center" class="span5">
                                           
                                            <a data-toggle="modal" href="#modal-form"
                                               onclick="modal('Perfil_Estudiante',<?php echo $row['id']; ?>)"
                                               class="btn btn-default btn-small"> <i
                                                    class="icon-user"></i> <?php echo get_phrase('profile'); ?> </a>

                                            <a
                                                data-toggle="modal" href="#modal-form"
                                                onclick="modal('Editar_Estudiante',<?php echo $row['id']; ?>)"
                                                class="btn btn-gray btn-small"> <i
                                                    class="icon-wrench"></i> <?php echo get_phrase('actualizar'); ?> </a>
                                          
                                                <a
                                                    data-toggle="modal" href="#modal-delete"
                                                    onclick="modal_delete('<?php echo base_url(); ?>index.php?site/estudiantes/delete/<?php echo $row['id']; ?>')"
                                                    class="btn btn-red btn-small"> <i
                                                        class="icon-trash"></i> <?php echo get_phrase('delete'); ?> </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!----TABLE LISTING ENDS--->

            <!----CREATION FORM STARTS---->

            <div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box-content"> <?php echo form_open('site/estudiantes/create/', array('class' => 'form-horizontal validatable', 'enctype' => 'multipart/form-data')); ?>
                    <div class="padded">
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('numero_de_documento'); ?></label>

                            <div class="controls">
                                <input type="text" class="validate[required]" name="documento"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('primer_nombre'); ?></label>

                            <div class="controls">
                                <input type="text" class="validate[required]" name="nombre"/>
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
                                <input type="text" class="uniform" name="sapellido"/>
                            </div>
                        </div>


                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('tipo_de_ingreso'); ?></label>

                            <div class="controls">
                                <select name="tipodeingreso" class="uniform" style="width:100%;" onchange="mostrarEmpresas(this.value);">
                                    <option value="">-- Seleccione Uno --</option>
                                    <option value=""><?php echo get_phrase('particular'); ?></option>
                                    <option value="empresa"><?php echo get_phrase('empresa'); ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group" id="divTipoingreso" style="display: none;">
                            <label class="control-label"><?php echo get_phrase('empresa'); ?></label>

                            <div class="controls">
                                <select name="empresa" class="uniform" style="width:100%;">
                                    <option value="">-- Seleccione Uno --</option>
                                    <?php
                                    $empresas = $this->db->get('hs_empresas')->result_array();
                                    foreach ($empresas as $row2):
                                        ?>
                                        <option value="<?php echo $row2['nombre']; ?>"> <?php echo $row2['nombre']; ?> </option>
                                    <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('fecha_de_nacimiento'); ?></label>

                            <div class="controls">
                                <input type="text" class="datepicker fill-up" name="f_nacimiento"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('sex'); ?></label>

                            <div class="controls">
                                <select name="sexo" class="uniform" style="width:100%;">
                                    <option value="0">-- Seleccione Uno --</option>
                                    <option value="male"><?php echo get_phrase('male'); ?></option>
                                    <option value="female"><?php echo get_phrase('female'); ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('Direccion de residencia'); ?></label>

                            <div class="controls">
                                <input type="text" class="uniform" name="direccion"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('telefono_residencia'); ?></label>

                            <div class="controls">
                                <input type="text" class="uniform" name="telefono"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('email'); ?></label>

                            <div class="controls">
                                <input type="text" class="uniform" name="email"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-gray"><?php echo get_phrase('add_student'); ?></button>
                    </div>
                        <?php echo form_close(); ?> </div>
                </div>
            </div>

            <!--CREATION FORM ENDS-->

        </div>
    </div>
</div>

<script>
    function mostrarEmpresas(valor) {
        if (valor == 'empresa') {
            $('#divTipoingreso').css('display', 'block');
        }else{
            $('#divTipoingreso').css('display', 'none');
        }
    }
</script>
