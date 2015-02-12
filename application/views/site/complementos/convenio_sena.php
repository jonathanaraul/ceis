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
