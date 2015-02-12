<?php

$student_info = $this->crud_model->get_student_info($current_student_id);

foreach ($student_info as $row):?>

    <center>

        <div class="box">

            <div>	
                <div class="title"> 
                    <div style="float:left;width:370px;height:147px;text-align:left;position:relative; margin-bottom:20px;">
                        <div style="position:absolute; bottom:10px;left:100px;">
							<h3 style=" color:#666;font-weight:100;">		
								<?php echo $row['nombre']; ?> <?php echo $row['snombre']; ?> 
								<?php echo $row['papellido']; ?> <?php echo $row['sapellido'];?>
							</h3>

                        </div>

                    </div>
                   <img src="<?php echo base_url(); ?>uploads/student_image/<?php echo $row['foto'];?>" width="180" height="250" style="margin-top:2%;margin-right:10%;float:right;border-radius:50px">
								
                </div>

            </div>

            <br/>

            <table class="table table-normal ">


                <?php if ($row['cedula'] != 0):  ?>

                    <tr>
                        <td>Documento</td>
                        <td><b><?php echo $row['cedula']; ?></b></td>
                    </tr>

                <?php 
					endif; 
					
					if ($row['tipo_ingreso'] != 0): 
				?>

                    <tr>
                        <td>Tipo de Ingreso</td>
                        <td><b><?php echo $this->crud_model->get_tipo_ingreso($row['tipo_ingreso']); ?></b>
                    </tr>
                <?php 
					endif; 
					
					if ($row['empresa'] != 0): 
				?>

                    <tr>
                        <td>Empresa</td>
                         <td><b><?php echo $this->crud_model->get_empresas_name($row['empresa']); ?></b>
                    </tr>
                <?php 
					endif; 
					
					if ($row['convenio'] != 0): 
				?>

                    <tr>
                        <td>Convenio</td>
                       <td><b><?php echo $this->crud_model->get_convenio($row['convenio']); ?></b>
                    </tr>
                <?php 
					endif; 
					
					if ($row['nom_regional'] != 0): 
				?>

                    <tr>
                        <td>Nombre Regional</td>
                        <td><b><?php echo $row['nom_regional']; ?></b></td>
                    </tr>

                    <tr>
                        <td>Código Regional</td>
                        <td><b><?php echo $row['cod_regional']; ?></b></td>
                    </tr>
                <?php 
					endif; 
					
					if ($row['nom_departamento'] != 0): 
				?>

                    <tr>
                        <td>Nombre Departameno</td>
                        <td><b><?php echo $row['nom_departamento']; ?></b></td>
                    </tr>
        
                    <tr>
                        <td>Código Departameno</td>
                        <td><b><?php echo $row['cod_departamento']; ?></b></td>
                    </tr>
                <?php 
					endif; 
					
					if ($row['nom_municipio'] != 0): 
				?>

                    <tr>
                        <td>Nombre Municipio</td>
                        <td><b><?php echo $row['nom_municipio']; ?></b></td>
                    </tr>
                
                    <tr>
                        <td>Código Municipio</td>
                        <td><b><?php echo $row['cod_municipio']; ?></b></td>
                    </tr>
                <?php 
					endif; 
					
					if ($row['emp_gremio'] != 0): 
				?>

                    <tr>
                        <td>Empresa y/o Gremio</td>
                        <td><b><?php echo $row['emp_gremio']; ?></b></td>
                    </tr>
                <?php 
					endif; 
					
					if ($row['linea_formacion'] != 0): 
				?>

                    <tr>
                        <td>Linea de Formación</td>
                        <td><b><?php echo $this->crud_model->get_linea_formacion($row['linea_formacion']); ?></b>
                    </tr>
                <?php 
					endif; 
					
					if ($row['sector_economico'] != 0): 
				?>

                    <tr>
                        <td>Nombre Sector Economico</td>
                        <td><b><?php echo $row['sector_economico']; ?></b></td>
                    </tr>
                <?php 
					endif; 
					
					if ($row['sub_sector_economico'] != 0): 
				?>

                    <tr>
                        <td>Nombre Subsector Economico</td>
                        <td><b><?php echo $row['sub_sector_economico']; ?></b></td>
                    </tr>
                <?php 
					endif; 
					
					if ($row['caracterizacion'] != 0): 
				?>

                    <tr>
                        <td>Caracterizacion</td>
                          <td><b><?php echo $this->crud_model->get_caracterizacion($row['caracterizacion']); ?></b>
                    </tr>
                <?php 
					endif; 
					
					if ($row['f_nacimiento'] != 0): 
				?>
                    <tr>
                        <td>Fecha de Nacimiento</td>
                        <td><b><?php echo  date("d/m/Y",strtotime($row['f_nacimiento'])); ?></b></td>
                    </tr>
                <?php 
					endif;
					
					if ($row['sexo'] != 0): 
				?>

                    <tr>
                        <td>Sexo</td>
                        <td><b><?php echo $this->crud_model->get_sex($row['sexo']); ?></b>
                    </tr>
                    
                <?php 
					endif; 
					
					if ($row['num_lib_militar'] != 0): 
				?>

                    <tr>
                        <td>Número de Libreta Militar</td>
                        <td><b><?php echo $row['num_lib_militar']; ?></b></td>
                    </tr>
                <?php 
					endif; 
					
					if ($row['edo_civil'] != 0): 
				?>

                    <tr>
                        <td>Estado Cívil</td>
                        <td><b><?php echo $this->crud_model->get_edo_civil($row['edo_civil']); ?></b>
                    </tr>
                <?php 
					endif; 
					
					if ($row['hijos'] != 0): 
				?>

                    <tr>
                        <td>Número de Hijos</td>
                        <td><b><?php echo $row['num_hijos']; ?></b></td>
                    </tr>
                <?php 
					endif; 
					
					if ($row['departamento'] != 0): 
				?>

                    <tr>
                        <td>Departameno</td>
                       <td><b><?php echo $this->crud_model->get_departamento($row['departamento']); ?></b></td>
                    </tr>
                <?php 
					endif; 
					
					if ($row['municipio'] != 0): 
				?>

                    <tr>
                        <td><?php echo 'Municipio'; ?></td>
                        <td><b><?php echo $this->crud_model->get_municipio($row['municipio']); ?></b></td>
                    </tr>
                <?php 
					endif; 
					
					if ($row['residencia'] != 0): 
				?>

                    <tr>
                        <td>Direccion de Residencia</td>
                        <td><b><?php echo $row['residencia'].'. '.$row['barrio']; ?></b></td>
                    </tr>
                <?php 
					endif; 
					
					if ($row['telefono'] != 0): 
				?>

                    <tr>
                        <td>Teléfono</td>
                        <td><b><?php echo $row['telefono']; ?></b></td>
                    </tr>
                <?php 
					endif; 
					
					if ($row['email'] != 0): 
				?>

                    <tr>
                        <td>Email</td>
                        <td><b><?php echo $row['email']; ?></b></td>
                    </tr>
                <?php 
					endif; 
					
					if ($row['talla_camisa'] != 0): 
				?>

                    <tr>
                        <td>Talla Camisa</td>
                        <td><b><?php echo $row['talla_camisa']; ?></b></td>
                    </tr>
                <?php 
					endif; 
				?>
					
                    <tr>
                        <td>Checkeo de Cédula</td>
                        <td><b><?php echo ($row['check_cedula'] == '1')? 'Sí':'No'; ?></b></td>
                    </tr>
               
                    <tr>
                        <td>Checkeo de Libreta Militar</td>
                        <td><b><?php echo ($row['check_lib_militar'] == '1')? 'Sí':'No'; ?></b></td>
                    </tr>
               
                    <tr>
                        <td>Checkeo de Certificado de Estudio</td>
                       <td><b><?php echo ($row['check_certificado'] == '1')? 'Sí':'No'; ?></b></td>
                    </tr>
               
                    <tr>
                        <td>Checkeo de Fotografía</td>
                        <td><b><?php echo ($row['check_foto'] == '1')? 'Sí':'No'; ?></b></td>
                    </tr>
                <?php 
				
					if ($row['seccion'] != 0): 
				?>

                    <tr>
                        <td>Sección</td>
                        <td><b><?php echo $this->crud_model->get_hs_cursos_seccion($row['seccion']); ?></b>
                    </tr>
                <?php 
					endif; 
					
					if ($row['curso'] != 0): 
				?>
					<tr>
                        <td>Curso</td>
                        <td><b><?php echo $row['curso']; ?></b></td>
                    </tr>
					
                <?php 
					endif; 
				?>
					<tr>
                        <td>Status</td>
                         <td><b><?php echo ($row['activo'] == '1')? 'Activo':'Inactivo'; ?></b></td>
                    </tr>
                    <tr>
                        <td>Egresado</td>
                         <td><b><?php echo ($row['no_egresado'] == '1')? 'Egresado':'No Egresado'; ?></b></td>
                    </tr>
                <?php 
					
					if ($row['fecha_egreso'] != 0): 
				?>

                    <tr>
                        <td>Fecha de Egreso</td>
                        <td><b><?php echo date("d/m/Y",strtotime($row['fecha_egreso'])); ?></b>
                    </tr>
                <?php 
					endif; 
				 
				?>
                
            </table>

        </div>

    </center>

<?php endforeach; ?>

