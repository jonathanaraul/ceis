<div class="box">
	<div class="box-header">
		<!--CONTROL TABS START-->
		<ul class="nav nav-tabs nav-tabs-left">
			<li class="active"><a href="#list" data-toggle="tab"><i
						class="icon-align-justify"></i> <?php echo get_phrase('listado_roles_usuarios'); ?> </a></li>
			</li>
		</ul>
		<a class="btn btn-black" style="float:right;height:27px" href="index.php?admin/users/0">
			<i class="icon-info-sign"></i>
				Manejar Usuarios
		</a>
		<!--CONTROL TABS END-->
	</div>
	
	<div class="box-content">

	<div class="box-content padded">
		<div class="tab-content">
		
	<!----CREATION FORM STARTS ROLE--->

			<div class="box-content"> <?php echo form_open('admin/manage_role/create', array('class' => 'form-horizontal validatable', 'target' => '_top')); ?>
			   
				<form method="post" action="<?php echo base_url(); ?>index.php?admin/manage_role/create/" class="form-horizontal validatable">
				   
				   <h5>Nuevo <i class="icon-plus"></i>&nbsp;
						<input type="text" class="validate[required]" name="rol" placeholder="Ingresar nombre del rol"/>
						<button type="submit" class="btn btn-gray"><?php echo get_phrase('añadir_rol'); ?></button>
				   </h5>  
				</form>
			</div>
			
			
			<br>
	<!----CREATION FORM END ROLE--->	
		
	<!----SEE ROLES--->		
			<div class="box">
				<div class="box-content">
					<div id="dataTables">
						<table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">		
							<thead>
								<tr>
									<th>
										<div>ID</div>
									</th>
									<th width="60%">
										<div><?php echo get_phrase('nombre_rol'); ?></div>
									</th>
									<th>
										<div><?php echo get_phrase('options'); ?></div>
									</th>
								</tr>
							</thead>
							<tbody>
								<?php 
									$rol = $this->db->get('hs_role')->result_array();
										foreach ($rol as $row): 
								?>
									<tr>
										<td><?php echo $row['rol_id']; ?></td>
										
										<td><?php echo $row['rol']; ?></td>
										
										<td align="center">
											
											<a data-toggle="modal" href="#modal-form"onclick="modal('edit_role',<?php echo $row['rol_id']; ?>)"
												class="btn btn-gray btn-small"> 
												<i class="icon-wrench"></i> <?php echo get_phrase('edit'); ?> 
											</a> 
											<a data-toggle="modal" href="#modal-delete" onclick="modal_delete('<?php echo base_url(); ?>index.php?admin/manage_role/delete/<?php echo $row['rol_id']; ?>')" class="btn btn-red btn-small"> 
												<i class="icon-trash"></i> <?php echo get_phrase('delete'); ?> 
											</a>
										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!----//SEE ROLE--->
</div>


