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
                                    <th width="5%">
                                        <div><?php echo get_phrase('cedula'); ?></div>
                                    </th>
                                    <th>
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
                                    <th width="25%">
                                        <div><?php echo get_phrase('options'); ?></div>
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $count = 1;
                                foreach ($estudiantes as $row): ?>
                                    <tr>
                                        <td><?php echo $row['cedula']; ?></td>
                                        <td><?php echo $row['nombre']; ?> <?php echo $row['snombre']; ?> <?php echo $row['papellido']; ?> <?php echo $row['sapellido']; ?></td>
                                        <td><?php echo $row['residencia'].'. '.$row['barrio']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td><?php echo $row['telefono']; ?></td>
                                        <td align="center" class="span5">
                                           
                                            <a data-toggle="modal" href="#modal-form"
                                               onclick="modal('Perfil_Estudiante',<?php echo $row['id']; ?>)"
                                               class="btn btn-default btn-small"> <i
                                                    class="icon-user"></i> <?php echo get_phrase('profile'); ?> </a>
                                        <?php if($this->session->userdata('rol') ==1){?>
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
                                        <?php } ?>
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
                                <input type="text" class="uniform" required name="documento" id="documento" oninput="ajaxDocumento()">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('primer_nombre'); ?></label>

                            <div class="controls">
                                <input type="text" class="uniform" required name="nombre"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('segundo_nombre'); ?></label>

                            <div class="controls">
                                <input type="text" class="uniform" name="snombre"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('primer_apellido'); ?></label>

                            <div class="controls">
                                <input type="text" class="uniform" required name="papellido"/>
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
								<select name="tipodeingreso" class="uniform" onchange="mostrarTipoingreso(this.value);">
									<option value="">-- Seleccione Uno --</option>
                                    <?php
                                    $ingreso = $this->db->get('hs_tipo_ingreso')->result_array();
                                    foreach ($ingreso as $row):
                                        ?>
                                        <option value="<?php echo $row['id']; ?>"> <?php echo $row['tipo']; ?> </option>
                                    <?php
                                    endforeach;
                                    ?>
								</select>
							</div>
						</div>

						<div class="control-group" id="divHelpertipodeingreso" style="display: none;">
							<label class="control-label"><?php echo get_phrase('¿Cual tipo de ingreso?'); ?></label>

							<div class="controls">
								<input type="text" class="" name="helpertipodeingreso"/>
							</div>
						</div>

                        <div class="control-group" id="divTipoingreso" style="display: none;">
                            <label class="control-label"><?php echo get_phrase('empresa'); ?></label>

                            <div class="controls">
                                <select name="empresa" class="uniform">
                                    <option value="">-- Seleccione Uno --</option>
                                    <?php
                                    $empresas = $this->db->get('hs_empresas')->result_array();
                                    foreach ($empresas as $row):
                                        ?>
                                        <option value="<?php echo $row['id']; ?>"> <?php echo $row['nombre']; ?> </option>
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
									<option value="">-- Seleccione Uno --</option>
									<?php
                                    $convenio = $this->db->get('hs_convenio')->result_array();
                                    foreach ($convenio as $row):
                                        ?>
                                        <option value="<?php echo $row['id']; ?>"> <?php echo $row['convenio']; ?> </option>
                                    <?php
                                    endforeach;
                                    ?>

								</select>
							</div>
						</div>
						<div class="control-group divconvenio_sena" style="display: none;">
							<label class="control-label"><?php echo get_phrase('nombre_regional'); ?></label>

							<div class="controls">
								<select name="nom_regional" class="uniform" style="width:100%;" onchange="mostrarCodRegional(this.value);">
									<option value="">-- Seleccione Uno --</option>
									<option value="Atlantico"><?php echo get_phrase('Atlantico'); ?></option>
									<option value="Bolivar"><?php echo get_phrase('Bolivar'); ?></option>
									<option value="Magdalena"><?php echo get_phrase('Magdalena'); ?></option>
									<option value="Cesar"><?php echo get_phrase('Cesar'); ?></option>
									<option value="otro"><?php echo get_phrase('otro'); ?></option>
								</select>
							
								<a rel="tooltip" data-placement="right" data-original-title="<?php echo get_phrase('codigo_regional'); ?>">
									&nbsp;&nbsp;&nbsp;<input type="text" name="cod_regional" id="cod_regional" readonly>
								</a>
							</div>
						
							<br>
						
							<label class="control-label"><?php echo get_phrase('nombre_departamento'); ?></label>

							<div class="controls">
								<select name="nom_departamento" class="uniform"onchange="mostrarCodDepartamento(this.value);">
									<option value="">-- Seleccione Uno --</option>
									<option value="Atlantico"><?php echo get_phrase('Atlantico'); ?></option>
									<option value="Bolivar"><?php echo get_phrase('Bolivar'); ?></option>
									<option value="Magdalena"><?php echo get_phrase('Magdalena'); ?></option>
									<option value="Cesar"><?php echo get_phrase('Cesar'); ?></option>
									<option value="otro"><?php echo get_phrase('otro'); ?></option>
								</select>
								
								<a rel="tooltip" data-placement="right" data-original-title="<?php echo get_phrase('codigo_departamento'); ?>">
									&nbsp;&nbsp;&nbsp;<input type="text" name="cod_departamento" id="cod_departamento" readonly>
								</a>
							</div>
						
							<br>
							<label class="control-label"><?php echo get_phrase('nombre_municipio'); ?></label>

							<div class="controls">
								<select name="nom_municipio" class="uniform" onchange="mostrarCodMunicipio(this.value);">
									<option value="">-- Seleccione Uno --</option>
									<option value="Barranquilla"><?php echo get_phrase('Barranquilla'); ?></option>
									<option value="Cartagena"><?php echo get_phrase('Cartagena'); ?></option>
									<option value="Santa Marta"><?php echo get_phrase('Santa Marta'); ?></option>
									<option value="Valledupar"><?php echo get_phrase('Valledupar'); ?></option>
									<option value="otro"><?php echo get_phrase('otro'); ?></option>
								</select>
								
								<a rel="tooltip" data-placement="right" data-original-title="<?php echo get_phrase('codigo_municipio'); ?>">
									&nbsp;<input type="text" name="cod_municipio" id="cod_municipio" readonly>
								</a>
							</div>
							<br>
							<label class="control-label"><?php echo get_phrase('empresa_y/o_gremio'); ?></label>

							<div class="controls">
								<input type="text" name="emp_gremio"/>
							</div>
							
							<br>
							
							<label class="control-label"><?php echo get_phrase('linea_formacion'); ?></label>

							<div class="controls">
								<select name="linea_formacion" class="uniform">
									<option value="0">-- Seleccione Uno --</option>
									<?php  
										$linea = $this->db->get('hs_linea_formacion')->result_array();
										foreach ($linea as $row):
									?>
										
										<option value="<?php echo $row['id']; ?>"><?php echo $row['tipo']; ?></option>
									 
									 <?php endforeach; ?>
								</select>
							</div>
						
							<br>
							
							<label class="control-label"><?php echo get_phrase('nombre_sector_economico'); ?></label>

							<div class="controls">
								<input type="text" class="" name="sector_eco" value="SERVICIOS"/>
							</div>
						
							<br>
							
							<label class="control-label"><?php echo get_phrase('nombre_subsector_Econ.'); ?></label>

							<div class="controls">
								<input type="text" class="" name="sub_sector_eco" value="VIGILANCIA"/>
							</div>
						
							<br>
							
							<label class="control-label"><?php echo get_phrase('caracterizacion'); ?></label>

							<div class="controls">
								<select name="caracterizacion" class="uniform">
									<option value="0">-- Seleccione Uno --</option>
									<?php  
										$caracterizacion = $this->db->get('hs_caracterizacion')->result_array();
										foreach ($caracterizacion as $row):
									?>
										
										<option value="<?php echo $row['id']; ?>"><?php echo $row['tipo']; ?></option>
									 
									 <?php endforeach; ?>
								</select>
							</div>
							<br>
						</div>
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('fecha_de_nacimiento'); ?></label>

                            <div class="controls">
                                <input type="text" class="datepicker fill-up"required name="f_nacimiento" data-date-format="dd/mm/yyyy"/>
									<i class="icon-calendar"></i>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('sex'); ?></label>

                            <div class="controls">
                                <select name="sexo" class="uniform" required onchange="mostrarTmilitar(this.value);">
                                     <option value="">-- Seleccione--</option>
									<?php  
										$sex = $this->db->get('hs_sex')->result_array();
										foreach ($sex as $row):
									?>
										
										<option value="<?php echo $row['id']; ?>"><?php echo $row['tipo']; ?></option>
									 
									 <?php endforeach; ?>
                                
                                </select>
                            </div>
                        </div>
                        <div class="control-group" id="divtMilitar" style="display: none;">
							<label class="control-label"><?php echo get_phrase('Número_de_Libreta_Militar'); ?></label>

							<div class="controls" id="nlibmilitar"></div>
						</div>
						<div class="control-group">
							<label class="control-label"><?php echo get_phrase('estado_civil'); ?></label>

							<div class="controls">
								<select name="edo_civil" class="uniform" style="width:100%;">
									 <option value="">-- Seleccione--</option>
									<?php  
										$edo = $this->db->get('hs_edo_civil')->result_array();
										foreach ($edo as $row):
									?>
										<option value="<?php echo $row['id']; ?>"><?php echo $row['estado']; ?></option>
									 	<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label"><?php echo get_phrase('tiene_hijos'); ?></label>

							<div class="controls">
								<select name="hijos" class="uniform" style="width:100%;" onchange="mostrarTieneHijos(this.value);">
									<option value="0">-- Seleccione Uno --</option>
									<option value="si"><?php echo get_phrase('si'); ?></option>
									<option value="no"><?php echo get_phrase('no'); ?></option>
								</select>
							</div>
						</div>
						<div class="control-group" id="divTienehijos" style="display: none;">
							<label class="control-label"><?php echo get_phrase('numero_de_hijos'); ?></label>

							<div class="controls">
								<select name="num_hijos" class="uniform" style="width:100%;">
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
                            <label class="control-label"><?php echo get_phrase('departamento'); ?></label>

                            <div class="controls">
                                <select class="uniform" required name="departamento" id="departamento" onchange="ajaxDepartamento(this.value)">
									
									 <option value="">-- Seleccione--</option>
									
									<?php  
										$departamentos = $this->db->get('departamento')->result_array();
										foreach ($departamentos as $dep):
									?>
										
										<option value="<?php echo $dep['id']; ?>"><?php echo $dep['nombre']; ?></option>
									 
									 <?php endforeach; ?>
                                
                                </select>
                               
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('municipio'); ?></label>

                            <div class="controls">
								<select class="uniform" required name="municipio" id="municipio" disabled title="Seleccione primero un departamento">
									<option>Seleccione un Municipio</option>
								</select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('Direccion de residencia'); ?></label>

                            <div class="controls">
                                <input type="text" class="uniform" required name="residencia"/>
                            </div>
                        </div>
						<div class="control-group">
							<label class="control-label"><?php echo get_phrase('Barrio'); ?></label>

							<div class="controls">
								<input type="text" class="" name="barrio"/>
							</div>
						</div>
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('telefono_residencia'); ?></label>

                            <div class="controls">
                                <input type="text" class="uniform" required name="telefono"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('email'); ?></label>

                            <div class="controls">
                                <input type="text" class="uniform" required name="email"/>
                            </div>
                        </div>
                        <div class="control-group">
							<label class="control-label"><?php echo get_phrase('photo'); ?></label>

							<div class="controls" style="width:210px;">
								<input type="file" class="" name="foto_estudiante" id="imgInp"/>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label"><?php echo get_phrase('talla_camisa'); ?></label>

							<div class="controls">
								<input type="text" name="camisa" value="">
							</div>
							
						</div>
						<div class="control-group">
							<label class="control-label"><?php echo get_phrase('Documentacion'); ?></label>

							<div class="controls">
								<input type="checkbox" name="check_cedula"><?php echo get_phrase('Cedula'); ?>
								</br>
								<input type="checkbox" name="check_lib_militar"><?php echo get_phrase('Libreta_Militar'); ?>
								</br>
								<input type="checkbox" name="check_cert_est"><?php echo get_phrase('Certificado_de_Estudios'); ?>
								</br>
								<input type="checkbox" name="check_foto"><?php echo get_phrase('Foto'); ?>
								</br>
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
   function ajaxDepartamento(value) {
		
		$('#municipio').empty();
						
        $('#municipio').prev().html('');
       

        $.post('<?php echo site_url()?>ajax/obtenMunicipios',
            {'departamento': value },
            function (data) {
				//success data
				$("#municipio").removeAttr('disabled');
				$("#municipio").removeAttr('title');
                $('#municipio').html(data);
            });
    }
</script>
