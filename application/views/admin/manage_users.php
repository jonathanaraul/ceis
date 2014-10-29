<div class="box">
    <div class="box-header">

        <!------CONTROL TABS START------->
        <ul class="nav nav-tabs nav-tabs-left">

            <li class="<?php if (!isset($edit_profile)) echo 'active'; ?>">
                <a href="#list" data-toggle="tab"><i class="icon-align-justify"></i>
                    <?php echo get_phrase('manejo_de_usuarios'); ?>
                </a></li>
        </ul>
        <!------CONTROL TABS END------->

    </div>
    <div class="box-content padded">
        <div class="tab-content">
           <div class="tab-pane  active" id="list">
				<center>
					
					<br>
						<select id="user" onchange="showUser(this)">
								
								<option value=""><?php echo get_phrase('account_type');?></option>
								<option value="admin"><?php echo get_phrase('Gerencia');?></option>
								<option value="admin"><?php echo get_phrase('Operativo');?></option>
								<option value="admin"><?php echo get_phrase('Administrativo');?></option>
                                <option value="teacher"><?php echo get_phrase('Profesor');?></option>
                                <option value="admin"><?php echo get_phrase('Recepción');?></option>
										
						</select>
									
				</center>
            </div>  
        </div>
    </div>
</div>

<script>
   
	function showUser(elemen){
		
		if (elemen.value=="teacher"){
			location.href="index.php?admin/teacher/";
		}	
		
	}	
</script>
