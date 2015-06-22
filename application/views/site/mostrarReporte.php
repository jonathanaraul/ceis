<center>
	<?php
			$fechaDesde2 = date_create( $fechaDesde);
			$fechaDesde2 = date_format($fechaDesde2, 'd-m-Y');
  			$fechaHasta2 = date_create( $fechaHasta);
  			$fechaHasta2 = date_format($fechaHasta2, 'd-m-Y');

	?>
	<br><br>
	<?php if($est_inscritos == "true"){ ?>
		<center>
		<table style="width:700px" border="0" cellspacing="0" cellpadding="0" class="table table-normal box">
		    <thead>
		    		<th colspan="2" style="text-align: center;">Estudiantes Inscritos Desde: <?= $fechaDesde2; ?> Hasta: <?= $fechaHasta2; ?></th>
		    </thead>
		    <tbody>
		        <tr>
		            <td style="width:500px">
		                <div class="control-group">
		                    <div class="controls">
		                        <label class="control-label">Numero de estudiantes inscritos </label>
		                    </div>
		                </div>
		            </td>
		            <td style="width:200px">
						<?php
							$query = $this->db->query("SELECT *
										                  FROM hs_inscripcion
										                  WHERE DATE(create_at)
										                  BETWEEN '".$fechaDesde."'
										                  AND '".$fechaHasta."'");
							echo $query->num_rows();

						?>
		            </td>
		        </tr>
		    </tbody>
		</table>
		</center>
	<?php } ?>
	<br><br>
	<?php if($est_insc_emp == "true"){ ?>
		<table style="width:700px" border="0" cellspacing="0" cellpadding="0" class="table table-normal box">
		    <thead>
		    		<th style="text-align: center;">Estudiantes Inscritos por Empresas</th>
		    </thead>
		    <tbody>
		        <tr>
		            <td style="width:600px">
		                <div class="control-group">
		                    <div class="controls">
								<?php $empresas= $this->db->get('hs_empresas')->result_array(); ?>
		                        <center>
			                        <table style="width:600px"  border="0" cellspacing="0" cellpadding="0" class="table table-normal box">
			                        	<?php
				                        	foreach($empresas as $empresa):
				                        ?>
				                        	<tr>
				                        		<td>
							                    	<?= $empresa['nombre']; ?>
											    </td>
											    <td>
											    	<?php
													    $this->db->where('empresa', $empresa['id']);
															$this->db->where("DATE(create_at) BETWEEN '".$fechaDesde."'	AND '".$fechaHasta."'");
															$this->db->from('hs_inscripcion');
															echo $this->db->count_all_results();
													?>
												</td>
											</tr>
										<?php
							                endforeach;
						                ?>
						             </table>
					             </center>
		                    </div>
		                </div>
		            </td>
		        </tr>
		    </tbody>
		</table>
	<?php } ?>
	<br><br>
	<?php if($est_insc_curso == "true"){ ?>
		<table style="width:700px" border="0" cellspacing="0" cellpadding="0" class="table table-normal box">
		    <thead>
		    		<th style="text-align: center;">Estudiantes Inscritos por Curso</th>
		    </thead>
		    <tbody>
		        <tr>
		            <td style="width:600px">
		                <div class="control-group">
		                    <div class="controls">
								<?php $cursos= $this->db->get('hs_cursos')->result_array(); ?>
		                        <center>
			                        <table style="width:600px"  border="0" cellspacing="0" cellpadding="0" class="table table-normal box">
			                        	<?php
				                        	foreach($cursos as $curso):
				                        ?>
				                        	<tr>
				                        		<td>
							                    	<?= $this->crud_model->get_class_name($curso['curso'])." Seccion: ".$curso['seccion']; ?>
											    </td>
											    <td>
											    	<?php
													    $this->db->where('curso', $curso['id']);
														$this->db->from('hs_inscripcion');
														echo $this->db->count_all_results();
													?>
												</td>
											</tr>
										<?php
							                endforeach;
						                ?>
						             </table>
					             </center>
		                    </div>
		                </div>
		            </td>
		        </tr>
		    </tbody>
		</table>
	<?php } ?>
