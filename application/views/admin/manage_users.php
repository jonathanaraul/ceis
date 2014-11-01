<?php if ($rol != ""): ?>

<div class="box">
<div class="box-header">
    <!--CONTROL TABS START-->
    <ul class="nav nav-tabs nav-tabs-left">
        <li class="active"><a href="#list" data-toggle="tab"><i
                    class="icon-align-justify"></i> <?php echo get_phrase('listado_usuarios'); ?> </a></li>
        <li><a href="#add" data-toggle="tab"><i class="icon-plus"></i> <?php echo get_phrase('añadir_usuarios'); ?> </a>
        </li>
    </ul>
    
	<a class="btn btn-black" style="float:right;height:27px" href="index.php?admin/manage_role">
		<i class="icon-info-sign"></i>
			Manejar Roles
	</a>
    <!--CONTROL TABS END-->
</div>
<div class="box-content">
<div class="tab-content">
<!--TABLE LISTING STARTS-->
<div class="tab-pane  active" id="list">
    
    <center>
        <br>
        
        <select name="rol" onchange="window.location='<?php echo base_url(); ?>index.php?admin/users/'+this.value">
            <option value=""><?php echo get_phrase('account_type'); ?></option>
            <?php
					$role = $this->db->get('hs_role')->result_array();
					foreach ($role as $row):
			?>
                <option value="<?php echo $row['rol_id']; ?>">
                    <?php echo $row['rol']; ?>
                </option>
            
            <?php endforeach; ?>
        </select>
        <br/>
        <br/>
        <?php if ($rol == ''): ?>
            <div id="ask_users" class="  alert alert-info  " style="width:300px;"><i class="icon-info-sign"></i>Por
                Favor Seleccione una opción
            </div>
            <script>
                $(document).ready(function () {
                    function shake() {
                        $("#ask_users").effect("shake");
                    }

                    setTimeout(shake, 500);
                });
            </script>
            <br/>
            <br/>
        <?php endif; ?>
        <?php if ($rol != ''): ?>
        <div class="action-nav-normal">
            <div class=" action-nav-button" style="width:300px;">
				<a href="#" title="Users"><img src="<?php echo base_url(); ?>template/images/icons/user.png"/>
                    <span>Total 
						<?php
							$role = $this->db->get('hs_role')->result_array();
							$found = false;
							foreach ($users as $row){
								foreach ($role as $rol){
									if($row['rol']==$rol['rol_id']){
										$found = true;	
									}
								}
							}
							if($found){
							echo count($users).' '.$rol['rol'];	
							}	
						?>
                    </span>
                </a>
            </div>
        </div>
        
    </center>
    <div class="box">
        <div class="box-content">
            <div id="dataTables">
                <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive"  style="width:120%">		
					<thead>
						<tr>
							<th>
								<div>ID</div>
							</th>
							<th width="70">
								<div><?php echo get_phrase('photo'); ?></div>
							</th>
							<th>
								<div><?php echo get_phrase('nombre_usuario'); ?></div>
							</th>
							<th>
								<div><?php echo get_phrase('email'); ?></div>
							</th>
							<th>
								<div><?php echo get_phrase('tel_contacto'); ?></div>
							</th>
							<th width="25%">
								<div><?php echo get_phrase('options'); ?></div>
							</th>
						</tr>
					</thead>
					<tbody>
						<?php $count = 1;
						foreach ($users as $row): ?>
							<tr>
								<td><?php echo $count++; ?></td>
								<td>
									<div class="avatar"><img
											src="<?php echo $this->crud_model->get_image_url('user', $row['user_id']); ?>"
											class="avatar-medium"/>
									</div>
								</td>
								<td><?php echo $row['name']; ?> <?php echo $row['snombre']; ?> <?php echo $row['papellido']; ?> <?php echo $row['sapellido']; ?></td>
								<td><?php echo $row['email']; ?></td>
								<td><?php echo $row['phone']; ?></td>
								
								<td align="center" class="span5">
									<a data-toggle="modal" href="#modal-form" onclick="modal('user_profile',<?php echo $row['user_id']; ?>)"
										class="btn btn-default btn-small"> 
										<i class="icon-user"></i> <?php echo get_phrase('profile'); ?> 
									</a> 
									<a data-toggle="modal" href="#modal-form"
										onclick="modal('edit_user',<?php echo $row['user_id']; ?>,<?php echo $rol; ?>)"
										class="btn btn-gray btn-small"> <i
                                        class="icon-wrench"></i> <?php echo get_phrase('edit'); ?> 
                                    </a>
									<a data-toggle="modal" href="#modal-delete" 
										onclick="modal_delete('<?php echo base_url(); ?>index.php?admin/users/<?php echo $rol; ?>/delete/<?php echo $row['user_id']; ?>')" class="btn btn-red btn-small"> <i class="icon-trash"></i> <?php echo get_phrase('delete'); ?> 
									</a>
									
								</td>
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
	
	<div class="box-content"> <?php echo form_open('admin/users/create', array('class' => 'form-horizontal validatable', 'target' => '_top', 'enctype' => 'multipart/form-data')); ?>
					
		<form method="post" action="<?php echo base_url(); ?>index.php?admin/users/create/" 
							class="form-horizontal validatable" enctype="multipart/form-data">
			<div class="padded">
				<div class="control-group">
					<label class="control-label"><?php echo get_phrase('name'); ?></label>

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
					<label class="control-label"><?php echo get_phrase('sex'); ?></label>

					<div class="controls">
						<select name="sex" class="uniform" style="width:100%;">
							<option value="male"><?php echo get_phrase('male'); ?></option>
							<option value="female"><?php echo get_phrase('female'); ?></option>
						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label"><?php echo get_phrase('address'); ?></label>

					<div class="controls">
						<input type="text" class="" name="address"/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label"><?php echo get_phrase('phone'); ?></label>

					<div class="controls">
						<input type="text" class="" name="phone"/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label"><?php echo get_phrase('rol'); ?></label>

					<div class="controls">
						<select name="rol" class="uniform" style="width:100%;">
								
							<option value=""><?php echo get_phrase('seleccione'); ?></option>
							<?php

							$role = $this->db->get('hs_role')->result_array();

							foreach ($role as $row):

								?>
								<option value="<?php echo $row['rol_id']; ?>"

									<?php if ($rol == $row['rol_id']) echo 'selected'; ?>>
									<?php echo $row['rol']; ?></option>
							<?php

							endforeach;

							?>
						</select>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label"><?php echo get_phrase('email'); ?></label>

					<div class="controls">
						<input type="text" class="" name="email"/>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label"><?php echo get_phrase('password'); ?></label>

					<div class="controls">
						<input type="password" class="" name="password"/>
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

					<div class="controls" style="width:210px;">
						<img id="blah" src="<?php echo base_url(); ?>uploads/user.jpg" alt="your image" height="100"/>
					</div>
				</div>
			</div>
			<div class="form-actions">
				<button type="submit" class="btn btn-gray"><?php echo get_phrase('añadir_usuario'); ?></button>
			</div>
		</form>
	</div>
</div>

<!----CREATION FORM ENDS--->

</div>
</div>
</div>
<?php endif; ?>
<?php if ($rol == ""): ?>
 <center>
        <div class="span5" style="float:none !important;">
            <div class="box">
                <div class="box-header"><span class="title"> <i
                            class="icon-info-sign"></i><?php echo get_phrase('manejar_usuarios'); ?></span></div>
                <div class="box-content padded"><br/>
                    <select name="rol"
                            onchange="window.location='<?php echo base_url(); ?>index.php?admin/users/'+this.value">
                        <option value=""><?php echo get_phrase('account_type'); ?></option>
                        <?php

                        $role = $this->db->get('hs_role')->result_array();

                        foreach ($role as $row):

                            ?>
                            <option value="<?php echo $row['rol_id']; ?>"

                                <?php if ($rol == $row['rol_id']) echo 'selected'; ?>>
                                <?php echo $row['rol']; ?></option>
                        <?php

                        endforeach;

                        ?>
                    </select>
                    <hr/>
                    
					<button onclick="window.location='<?php echo base_url(); ?>index.php?admin/manage_role'">
						<div class="box-header">
							<span class="title"> <i class="icon-info-sign"></i>
								Manejar Roles de usuarios
							</span>
						</div>
					</button>
            
                <script>


					$(document).ready(function () {

						function ask() {

							Growl.info({title: "Seleccione alguna opción", text: " "});

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
