<style type="text/css">

	#nombre {
		width			:1000px;
		height			:50px;
		font-weight		:bold;
		text-align		:center;
		font-size		:40px;
		color			:#000000;
		padding-top		:370px;
		margin-left		:35px;
	}

	#documento {
		font-size		:17px;
		float:left;
		font-weight		:bold;
		margin-top		:30px;
		margin-left		:330px;
		color			:#000000;
	}

	#departamento {
		font-size		:17px;
		float			:right;
		font-weight		:bold;
		margin-top		:30px;
		margin-right	:220px;
		color			:#000000;
	}

	#curso {
		font-size		:17px;
		margin-top		:123px;
		font-weight		:bold;
		text-align		:center;
		color			:#000000;
	}

	#duracion {
		font-size		:17px;
		margin-top		:8px;
		margin-left		:580px;
		font-weight		:bold;
		color			:#000000;
	}

	#content {
		width			:1056px;
		height			:50px;
		margin-top		:20px;
	}

	.same {
		font-size		:17px;
		display			: inline;
		margin-left		:160px;
		font-weight		:bold;
		color			:#000000;
	}
	#mes{
		font-size		:17px;
		display			: inline;
		margin-left		:245px;
		font-weight		:bold;
		color			:#000000;
	}
	#año{
		font-size		:17px;
		display			: inline;
		margin-left		:95px;
		font-weight		:bold;
		color			:#000000;
	}

</style>
<div  id="print_area_<?= $documento_nombre; ?>" style="width: 1056px; height: 816px; background-image: url(template/images/Diploma.png);">
	    	<div id="nombre">
						<?= $this->crud_model->get_hs_student_nombre_by_id($documento_nombre).' '.$this->crud_model->get_hs_student_apellido_by_id($documento_nombre); ?>
			</div>
			<div id="documento">
				<?= $this->crud_model->get_hs_student_cedula_by_id($documento_nombre)?>
			</div>

			<div id="departamento">
				<?= $this->crud_model->get_hs_student_departamento_by_id($documento_nombre)?>
			</div>

			<div id="curso">
				<?php
					$cursos= $this->db->get_where('hs_cursos', array('id' => $curso))->result_array();
					echo $this->crud_model->get_hs_cursos_nombre($cursos[0]['curso']);
				?>
			</div>
			<div id="duracion">
				<?=
					$cursos[0]['duracion'];
				?>
			</div>
			<div id="content">
				<div class="same">
					Barranquilla
				</div>
				<div class="same">
					<?= date("j"); ?>
				</div>
				<div id="mes">
					<?php   $mes=date("n");
							if ($mes=="1") $mes="Enero";
							if ($mes=="2") $mes="Febrero";
							if ($mes=="3") $mes="Marzo";
							if ($mes=="4") $mes="Abril";
							if ($mes=="5") $mes="Mayo";
							if ($mes=="6") $mes="Junio";
							if ($mes=="7") $mes="Julio";
							if ($mes=="8") $mes="Agosto";
							if ($mes=="9") $mes="Setiembre";
							if ($mes=="10") $mes="Octubre";
							if ($mes=="11") $mes="Noviembre";
							if ($mes=="12") $mes="Diciembre";
							echo $mes;
					?>
				</div>
				<div id="año">
					<?= date("Y"); ?>
				</div>
			</div>
</div>

<div><p style="text-align:center" ><button type="button" id="imprimir" <?php if($media < 7){echo "disabled";}?> class="btn btn-normal btn-gray" style="width: 100%;
            margin-top: 20px;"  onclick="imprimirDocumento('print_area_<?= $documento_nombre;?>')"><?php if($media < 7){echo "Estudiante Reprobado";}else{echo "Imprimir Diploma";}?></button></p></td>
</div>
