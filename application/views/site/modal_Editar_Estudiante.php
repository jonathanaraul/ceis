<?php

	$student_info = $this->crud_model->get_student_info($edit_data);

	foreach ($student_info as $row):
?>
<div class="tab-pane box active" id="edit" style="padding: 5px">

    <div class="box-content">

            <?php echo form_open('site/pre_contactos/do_update/'. $row['id'], array('class' => 'form-horizontal validatable', 'target' => '_top', 'enctype' => 'multipart/form-data')); ?>

                <div class="padded">
						<div class="control-group">
                            <label class="control-label"><?php echo get_phrase('numero_de_documento'); ?></label>

                            <div class="controls">
                                <input type="text" class="uniform" name="documento" id="documento" oninput="ajaxDocumento()" value="<?= $row['cedula'] ?>" required>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('primer_nombre'); ?></label>

                            <div class="controls">
                                <input type="text" class="uniform" required name="nombre" value="<?= $row['nombre'] ?>" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('segundo_nombre'); ?></label>

                            <div class="controls">
                                <input type="text" class="uniform" name="snombre" value="<?= $row['snombre'] ?>" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('primer_apellido'); ?></label>

                            <div class="controls">
                                <input type="text" class="uniform" required name="papellido" value="<?= $row['papellido'] ?>" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('segundo_apellido'); ?></label>

                            <div class="controls">
                                <input type="text" class="uniform" name="sapellido" value="<?= $row['sapellido'] ?>" />
                            </div>
                        </div>
						
						<div class="control-group">
							<label class="control-label"><?php echo get_phrase('tipo_de_ingreso'); ?></label>

							<div class="controls">
								<select name="tipodeingreso" class="uniform" onchange="mostrarTipoingreso(this.value);">
									<option value="">-- Seleccione Uno --</option>
									<?php  
										$tipo_ingreso = $row['tipo_ingreso'];
										if(!is_numeric($tipo_ingreso)):
									
											echo "<option value='".$row['tipo_ingreso']."' selected>".$row['tipo_ingreso']."</option>";
									
										endif;
										$ingresos = $this->db->get('hs_tipo_ingreso')->result_array();
										foreach ($ingresos as $ingreso):
                                    ?>
                                        <option value="<?php echo $ingreso['id']; ?>"<?php echo ($ingreso['id'] == $tipo_ingreso)? 'selected':''; ?> > 
											<?php echo $ingreso['tipo']; ?> 
										</option>
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
						<?php if($row['tipo_ingreso']==3){?>
                        <div class="control-group" id="divTipoingreso">
                            <label class="control-label"><?php echo get_phrase('empresa'); ?></label>

                            <div class="controls">
                                <select name="empresa" class="uniform">
                                    <option value="">-- Seleccione Uno --</option>
                                    <?php
                                    $empresas = $this->db->get('hs_empresas')->result_array();
                                    foreach ($empresas as $empresa):
                                        ?>
                                        <option value="<?php echo $empresa['id'];?>"<?php echo ($empresa['id'] == $row['empresa'])? 'selected':''; ?>> 
											<?php echo $empresa['nombre']; ?> 
										</option>
                                    <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <?php }else{?>
                        <div class="control-group" id="divTipoingreso" style="display: none;">
                            <label class="control-label"><?php echo get_phrase('empresa'); ?></label>

                            <div class="controls">
                                <select name="empresa" class="uniform">
                                    <option value="">-- Seleccione Uno --</option>
                                    <?php
                                    $empresas = $this->db->get('hs_empresas')->result_array();
                                    foreach ($empresas as $empresa):
                                        ?>
                                        <option value="<?php echo $empresa['id']; ?>"> <?php echo $empresa['nombre']; ?> </option>
                                    <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <?php }?>
                        <div class="control-group">
							<label class="control-label"><?php echo get_phrase('convenio'); ?></label>
							<input type="hidden" value="<?php echo $row['convenio']; ?>" id="convenio_value">
							<div class="controls">
								<select name="convenio" class="uniform" style="width:100%;" onchange="mostrarTipoingresoSena(this.value);">
									<option value="">-- Seleccione Uno --</option>
									<?php
                                    $tipo_convenio = $row['convenio'];
                                    $convenios = $this->db->get('hs_convenio')->result_array();
                                    foreach ($convenios as $convenio):
                                        ?>
                                        <option value="<?php echo $convenio['id']; ?>" <?php echo ($convenio['id'] == $tipo_convenio)? 'selected':'';?>> 
											<?php echo $convenio['convenio']; ?> 
										</option>
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
									<option <?php echo ($row['nom_regional'] == 0)? 'selected':'';?>>-- Seleccione Uno --</option>
									<?php 
										$array = array("Atlantico","Bolivar","Magdalena","Cesar",0);
										$found = false;
										foreach($array as $nom_regional){
											if($nom_regional == $row['nom_regional']){
												$found = true;
											}
										}
										if(!$found){
											echo "<option id='nom_regional_value' value='".$row['nom_regional']."' selected>".$row['nom_regional']."</option>";
										}
									?>
									<option value="Atlantico"	<?php echo ($row['nom_regional'] == 'Atlantico')? 'selected':'';?>>
										<?php echo get_phrase('Atlantico'); ?>
									</option>
									<option value="Bolivar"		<?php echo ($row['nom_regional'] == 'Bolivar')? 'selected':'';?>>
										<?php echo get_phrase('Bolivar'); ?>
									</option>
									<option value="Magdalena" 	<?php echo ($row['nom_regional'] == 'Magdalena')? 'selected':'';?>>
										<?php echo get_phrase('Magdalena'); ?>
									</option>
									<option value="Cesar" 		<?php echo ($row['nom_regional'] == 'Cesar')? 'selected':'';?>>
										<?php echo get_phrase('Cesar'); ?>
									</option>
									<option value="otro"><?php echo get_phrase('otro'); ?></option>
								</select>
							
								<a rel="tooltip" data-placement="right" data-original-title="<?php echo get_phrase('codigo_regional'); ?>">
									&nbsp;&nbsp;&nbsp;
									<input type="text" name="cod_regional" id="cod_regional" value="<?php echo $row['cod_regional'];?>" readonly >
									<input type="hidden" id="cod_regional_value" value="<?php echo $row['cod_regional'];?>">
								</a>
							</div>
						
							<br>
						
							<label class="control-label"><?php echo get_phrase('nombre_departamento'); ?></label>

							<div class="controls">
								<select name="nom_departamento" class="uniform"onchange="mostrarCodDepartamento(this.value);">
									<option <?php echo ($row['nom_departamento'] == 0)? 'selected':'';?>>-- Seleccione Uno --</option>
									<?php 
										$array = array("Atlantico","Bolivar","Magdalena","Cesar",0);
										$found = false;
										foreach($array as $nom_departamento){
											if($nom_departamento == $row['nom_departamento']){
												$found = true;
											}
										}
										if(!$found){
											echo "<option id='nom_departamento_value' value='".$row['nom_departamento']."' selected>".$row['nom_departamento']."</option>";
										}
									?>
									<option value="Atlantico"	<?php echo ($row['nom_departamento'] == 'Atlantico')? 'selected':'';?>>
										<?php echo get_phrase('Atlantico'); ?>
									</option>
									<option value="Bolivar"		<?php echo ($row['nom_departamento'] == 'Bolivar')? 'selected':'';?>>
										<?php echo get_phrase('Bolivar'); ?>
									</option>
									<option value="Magdalena" 	<?php echo ($row['nom_departamento'] == 'Magdalena')? 'selected':'';?>>
										<?php echo get_phrase('Magdalena'); ?>
									</option>
									<option value="Cesar" 		<?php echo ($row['nom_departamento'] == 'Cesar')? 'selected':'';?>>
										<?php echo get_phrase('Cesar'); ?>
									</option>
									<option value="otro"><?php echo get_phrase('otro'); ?></option>
								</select>
								
								<a rel="tooltip" data-placement="right" data-original-title="<?php echo get_phrase('codigo_departamento'); ?>">
									&nbsp;&nbsp;&nbsp;
									<input type="text" name="cod_departamento" id="cod_departamento" value="<?php echo $row['cod_departamento'];?>" readonly >
									<input type="hidden" id="cod_departamento_value" value="<?php echo $row['cod_departamento'];?>">
								</a>
							</div>
						
							<br>
							<label class="control-label"><?php echo get_phrase('nombre_municipio'); ?></label>

							<div class="controls">
								<select name="nom_municipio" class="uniform" onchange="mostrarCodMunicipio(this.value);">
									<option <?php echo ($row['nom_municipio'] == 0)? 'selected':'';?>>-- Seleccione Uno --</option>
									<?php 
										$array = array("Barranquilla","Cartagena","Santa Marta","Valledupar",0);
										$found = false;
										foreach($array as $nom_municipio){
											if($nom_municipio == $row['nom_municipio']){
												$found = true;
											}
										}
										if(!$found){
											echo "<option id='nom_municipio_value' value='".$row['nom_municipio']."' selected>".$row['nom_municipio'].		"</option>";
										}
									?>
									<option value="Barranquilla" <?php echo ($row['nom_municipio'] == 'Barranquilla')? 'selected':'';?>>
										<?php echo get_phrase('Barranquilla'); ?>
									</option>
									<option value="Cartagena"	<?php echo ($row['nom_municipio'] == 'Cartagena')? 'selected':'';?>>
										<?php echo get_phrase('Cartagena'); ?>
									</option>
									<option value="Santa Marta"	<?php echo ($row['nom_municipio'] == 'Santa Marta')? 'selected':'';?>>
										<?php echo get_phrase('Santa Marta'); ?>
									</option>
									<option value="Valledupar"	<?php echo ($row['nom_municipio'] == 'Valledupar')? 'selected':'';?>>
										<?php echo get_phrase('Valledupar'); ?>
									</option>
									<option value="otro"><?php echo get_phrase('otro'); ?></option>
								</select>
								
								<a rel="tooltip" data-placement="right" data-original-title="<?php echo get_phrase('codigo_municipio'); ?>">
									&nbsp;&nbsp;&nbsp;
									<input type="text" name="cod_municipio" id="cod_municipio" value="<?php echo $row['cod_municipio'];?>" readonly >
									<input type="hidden" id="cod_municipio_value" value="<?php echo $row['cod_municipio'];?>">
								</a>
							</div>
							<br>
							<label class="control-label"><?php echo get_phrase('empresa_y/o_gremio'); ?></label>

							<div class="controls">
								<input type="text" name="emp_gremio" value="<?php echo $row['emp_gremio'];?>">
							</div>
							
							<br>
							
							<label class="control-label"><?php echo get_phrase('linea_formacion'); ?></label>

							<div class="controls">
								<select name="linea_formacion" class="uniform">
									<option value="0">-- Seleccione Uno --</option>
									<?php  
										$lineas = $this->db->get('hs_linea_formacion')->result_array();
										foreach ($lineas as $linea):
									?>
										
										<option value="<?php echo $linea['id'];?>" <?php echo ($linea['id']==$row['linea_formacion'])? 'selected':'';?>>
											<?php echo $linea['tipo']; ?>
										</option>
									 
									 <?php endforeach; ?>
								</select>
							</div>
						
							<br>
							
							<label class="control-label"><?php echo get_phrase('nombre_sector_economico'); ?></label>

							<div class="controls">
								<input type="text" value="SERVICIOS" name="sector_eco" >
							</div>
						
							<br>
							
							<label class="control-label"><?php echo get_phrase('nombre_subsector_Econ.'); ?></label>

							<div class="controls">
								<input type="text" value="VIGILANCIA"  name="sub_sector_eco"/>
							</div>
						
							<br>
							
							<label class="control-label"><?php echo get_phrase('caracterizacion'); ?></label>

							<div class="controls">
								<select name="caracterizacion" class="uniform">
									<option value="">-- Seleccione Uno --</option>
									<?php  
										$caracterizaciones = $this->db->get('hs_caracterizacion')->result_array();
										foreach($caracterizaciones as $caracterizacion):
									?>
										
										<option value="<?php echo $caracterizacion['id'];?>" <?php echo ($caracterizacion['id'] == $row['caracterizacion'])? 'selected':'';?>>
											<?php echo $caracterizacion['tipo']; ?>
										</option>
									 
									 <?php endforeach; ?>
								</select>
							</div>
							
						</div>
						
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('fecha_de_nacimiento'); ?></label>

                            <div class="controls">
                                <input type="text" class="datepicker fill-up" required name="f_nacimiento" value="<?php echo date("d/m/Y",strtotime($row['f_nacimiento']));?>">
                               
									<i class="icon-calendar"></i>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('sex'); ?></label>

                            <div class="controls">
                                <select name="sexo" class="uniform" required onchange="mostrarTmilitar(this.value);">
                                     <option value="">-- Seleccione--</option>
									<?php  
										$sexos = $this->db->get('hs_sex')->result_array();
										foreach ($sexos as $sexo):
									?>
										
										<option value="<?php echo $sexo['id'];?>" <?php echo ($sexo['id'] == $row['sexo'])? 'selected':'';?>>
											<?php echo $sexo['tipo']; ?>
										</option>
									 
									 <?php endforeach; ?>
                                
                                </select>
                            </div>
                        </div>
                       <?php if($row['sexo']==1){ ?>
                        <div class="control-group" id="divtMilitar">
							<label class="control-label"><?php echo get_phrase('Número_de_Libreta_Militar'); ?></label>

							<div class="controls" id="nlibmilitar">
								<input type="text" readonly name="nlibmilitar" value="<?php echo $row['cedula'];?>">
							</div>
						</div>
						<?php }else{ ?>
						<div class="control-group" id="divtMilitar"  style="display: none;">
							<label class="control-label"><?php echo get_phrase('Número_de_Libreta_Militar'); ?></label>

							<div class="controls" id="nlibmilitar"></div>
						</div>
						<?php } ?>
						<div class="control-group">
							<label class="control-label"><?php echo get_phrase('estado_civil'); ?></label>

							<div class="controls">
								<select name="edo_civil" class="uniform" style="width:100%;">
									 <option value="">-- Seleccione--</option>
									<?php  
										$edo_civil = $this->db->get('hs_edo_civil')->result_array();
										foreach ($edo_civil as $edo):
									?>
										<option value="<?php echo $edo['id'];?>" <?php echo ($edo['id'] == $row['edo_civil'])? 'selected':'';?>>
											<?php echo $edo['estado']; ?>
										</option>
									 	<?php endforeach; ?>
								</select>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label"><?php echo get_phrase('tiene_hijos'); ?></label>

							<div class="controls">
								<select name="hijos" class="uniform" style="width:100%;" onchange="mostrarTieneHijos(this.value);">
									<option value="0">-- Seleccione Uno --</option>
									<option value="si" <?php echo ($row['hijos'] == 'si')? 'selected':'';?>><?php echo get_phrase('si'); ?></option>
									<option value="no" <?php echo ($row['hijos'] == 'no')? 'selected':'';?>><?php echo get_phrase('no'); ?></option>
								</select>
							</div>
						</div>
						<?php if($row['hijos'] == 'si'){ ?>
						<div class="control-group" id="divTienehijos">
							<label class="control-label"><?php echo get_phrase('numero_de_hijos'); ?></label>

							<div class="controls">
								<select name="num_hijos" class="uniform" style="width:100%;">
									<option value="0">-- Seleccione Uno --</option>
									<option value="1" <?php echo ($row['num_hijos'] == 1)? 'selected':'';?>><?php echo get_phrase('1'); ?></option>
									<option value="2" <?php echo ($row['num_hijos'] == 2)? 'selected':'';?>><?php echo get_phrase('2'); ?></option>
									<option value="3" <?php echo ($row['num_hijos'] == 3)? 'selected':'';?>><?php echo get_phrase('3'); ?></option>
									<option value="4" <?php echo ($row['num_hijos'] == 4)? 'selected':'';?>><?php echo get_phrase('4'); ?></option>
									<option value="5" <?php echo ($row['num_hijos'] == 5)? 'selected':'';?>><?php echo get_phrase('5'); ?></option>
									<option value="6" <?php echo ($row['num_hijos'] == 6)? 'selected':'';?>><?php echo get_phrase('6'); ?></option>
								</select>
							</div>
						</div>
						
						<?php }else{ ?>
							
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
						<?php }?>

                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('departamento'); ?></label>

                            <div class="controls">
                                <select class="uniform" required name="departamento" id="departamento" onchange="ajaxDepartamento(this.value)">
									
									 <option value="">-- Seleccione--</option>
									
									<?php  
										$departamentos = $this->db->get('departamento')->result_array();
										foreach ($departamentos as $dep):
									?>
										
										<option value="<?php echo $dep['id'];?>" <?php echo ($dep['id'] == $row['departamento'])? 'selected':'';?>><?php echo $dep['nombre']; ?></option>
									 
									 <?php endforeach; ?>
                                
                                </select>
                               
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('municipio'); ?></label>
							<input type="hidden" value="<?php echo $row['municipio'];?>" name="municipio">
                            <div class="controls">
								<select class="uniform" required name="municipio_" id="municipio" disabled>
									<option value="<?php echo $row['municipio'];?>"><?php echo $this->crud_model->get_municipio($row['municipio']); ?></option>
								</select>
                            </div>
                           
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('Direccion de residencia'); ?></label>

                            <div class="controls">
                                <input type="text" class="uniform" required name="residencia" value="<?php echo $row['residencia'];?>">
                            </div>
                        </div>
						<div class="control-group">
							<label class="control-label"><?php echo get_phrase('Barrio'); ?></label>

							<div class="controls">
								<input type="text" class="" name="barrio" value="<?php echo $row['barrio'];?>">
							</div>
						</div>
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('telefono_residencia'); ?></label>

                            <div class="controls">
                                <input type="text" class="uniform" required name="telefono" value="<?php echo $row['telefono'];?>">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('email'); ?></label>

                            <div class="controls">
                                <input type="text" class="uniform" required name="email" value="<?php echo $row['email'];?>">
                            </div>
                        </div>
                        <div class="control-group">
							<label class="control-label"><?php echo get_phrase('photo'); ?></label>

							<div class="controls" style="width:210px;">
								<img src="<?php echo base_url(); ?>uploads/student_image/<?php echo $row['foto'];?>" width="100" height="80">
								<input type="hidden" name="foto_estudiante" 	value="<?php echo $row['foto'];?>">
								<input type="file"	 name="new_foto_estudiante" id="imgInp"/>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label"><?php echo get_phrase('talla_camisa'); ?></label>

							<div class="controls">
								<input type="text" name="camisa" value="<?php echo $row['talla_camisa'];?>">
							</div>
							
						</div>
						<div class="control-group">
							<label class="control-label"><?php echo get_phrase('Documentacion'); ?></label>

							<div class="controls">
								<input type="checkbox" name="check_cedula" 		<?php echo ($row['check_cedula'] == '1')? 'checked':''; ?>>
									<?php echo get_phrase('Cedula'); ?>
								</br>
								<input type="checkbox" name="check_lib_militar" <?php echo ($row['check_lib_militar'] == '1')? 'checked':''; ?>>
									<?php echo get_phrase('Libreta_Militar'); ?>
								</br>
								<input type="checkbox" name="check_cert_est"	<?php echo ($row['check_certificado'] == '1')? 'checked':''; ?>>
									<?php echo get_phrase('Certificado_de_Estudios'); ?>
								</br>
								<input type="checkbox" name="check_foto"		<?php echo ($row['check_foto'] == '1')? 'checked':''; ?>>
									<?php echo get_phrase('Foto'); ?>
								</br>
							</div>
						</div>
                    </div>

                    <div class="control-group">
                            <label class="control-label"><?= 'Procedencia'?></label>
                            <div class="controls">
                                <select name="procedencia" class="uniform" style="width:100%;">
                                    <option value="Llamada telefonica">Llamada telefonica</option>
                                    <option value="Página web">Página web</option>
                                    <option value="Redes Sociales">Redes Sociales</option>
                                    <option value="E-Mail Directo">E-Mail Directo</option>
                                    <option value="Punto de Venta">Punto de Venta</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?= 'Curso'?></label>
                            <div class="controls">
                                <select name="curso" class="uniform" style="width:100%;">
                                    <?php
                                    $elements = $this->db->get('class_name')->result_array();
                                    foreach ($elements as $element){
                                        echo '<option value="'.$element['id'].'">'.$element['nombre'].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?= 'observacion 1'?></label>
                            <div class="controls">
                               <textarea name="observacion_1"><?php echo $row['observacion_1']?></textarea>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?= 'observacion 2'?><?php echo $row['observacion_2']?></label>
                            <div class="controls">
                               <textarea name="observacion_2"></textarea>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?= 'observacion 3'?><?php echo $row['observacion_3']?></label>
                            <div class="controls">
                               <textarea name="observacion_3"></textarea>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?= 'observacion 4'?><?php echo $row['observacion_4']?></label>
                            <div class="controls">
                               <textarea name="observacion_4"></textarea>
                            </div>
                        </div>

					<div class="form-actions">
						<button type="submit" class="btn btn-gray"><?php echo get_phrase('Actualizar_datos'); ?></button>
					</div>
				</div>

            </form>

        <?php endforeach; ?>

    </div>

</div>



<script src="<?php echo base_url();?>template/js/estudiantes-script.js" 	 type="text/javascript"></script>

<script>
   function ajaxDepartamento(value) {
		
		
		$('#municipio').empty();
        $('#municipio').prev().html('-- Seleccione un Municipio --');
       

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
