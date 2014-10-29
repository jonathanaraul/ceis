<div class="box">
    <div class="box-header">

        <!------CONTROL TABS START------->
        <ul class="nav nav-tabs nav-tabs-left">

            <li class="<?php if (!isset($edit_profile)) echo 'active'; ?>">
                <a href="#list" data-toggle="tab"><i class="icon-align-justify"></i>
                    <?php echo get_phrase('manejo_de_usuarios'); ?>
                </a>
            </li>
            <li>
				<a href="#add" data-toggle="tab"><i class="icon-plus"></i> <?php echo get_phrase('añadir_usuario'); ?> </a>
			</li>
        </ul>
        <!------CONTROL TABS END------->

    </div>
    <div class="box-content padded">
        <div class="tab-content">
			<div class="tab-pane  active" id="list">
				
				<br>
				<h5>Seleccione Usuarios según: &nbsp;
					<select id="user" onchange="showUser(this)"> 
							
							<option value=""><?php echo get_phrase('account_type');?></option>
							<option value="management"><?php echo get_phrase('Gerencia');?></option>
							<option value="operative"><?php echo get_phrase('Operativo');?></option>
							<option value="admin"><?php echo get_phrase('Administrativo');?></option>
							<option value="teacher"><?php echo get_phrase('Profesor');?></option>
							<option value="reception"><?php echo get_phrase('Recepción');?></option>
									
					</select>
				</h5>  
			
				<br>
				<center>
					<div id="load" style="display:none"><img src="template/images/loader.gif"></div>			
				</center>
				<div id="show"></div>
		
			</div>  
 
        <!----CREATION FORM STARTS---->

        <div class="tab-pane box" id="add" style="padding: 5px">
            <div
                class="box-content"> <?php echo form_open('admin/users/create', array('class' => 'form-horizontal validatable', 'target' => '_top', 'enctype' => 'multipart/form-data')); ?>
                
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

									$rol = $this->db->get('rol')->result_array();

									foreach ($rol as $row):

										?>
										<option value="<?php echo $row['rol_id']; ?>"

											<?php if ($rol_id == $row['rol_id']) echo 'selected'; ?>>
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

<script>
   
	function showUser(element){
		$.ajax({
				beforeSend: function() 
					{ 
					 $('#load').show(); 
					 $('#show').hide();
					}, 
				complete: function() 
					{ $('#load').hide();
					  $('#show').show(); 
					},
				
	   })
		
		if (element.value=="management"){
			
			$('#show').load('index.php?admin/users/2');
		
		}else if (element.value=="operative"){	
			$('#show').load('index.php?admin/users/3');
		
		}else if (element.value=="admin"){	
			$('#show').load('index.php?admin/users/1');
		
		}else if (element.value=="teacher"){	
			$('#show').load('index.php?admin/users/4');
		
		}else if (element.value=="reception"){	
			$('#show').load('index.php?admin/users/5');
		
		}	
	}
	
	
</script>
