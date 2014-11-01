<div class="navbar navbar-top navbar-inverse">

	<div class="navbar-inner">

		<div class="container-fluid">

    <div style=" margin-top:20px">

    	<a href="<?php echo base_url();?>">

        	<img src="<?php echo base_url();?>uploads/logo.png"  style="max-height:100px; max-width:100px;"/>

        </a>

    </div>

			<!-- the new toggle buttons -->

			<ul class="nav pull-right">

				<li class="toggle-primary-sidebar hidden-desktop" data-toggle="collapse" data-target=".nav-collapse-primary"><button type="button" class="btn btn-navbar"><i class="icon-th-list"></i></button></li>

				<li class="hidden-desktop" data-toggle="collapse" data-target=".nav-collapse-top"><button type="button" class="btn btn-navbar"><i class="icon-align-justify"></i></button></li>

			</ul>

			<div class="nav-collapse nav-collapse-top collapse">

            	<ul class="nav pull-right">

					<li class="dropdown">

					<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo get_phrase('account');?> <b class="caret"></b></a>

					<!-- Account Selector -->

                    <ul class="dropdown-menu">

                    	<li class="with-image">

                            <div class="avatar">

                                <img src="<?php echo base_url();?>template/images/icons_big/<?php 
                                
									$rol= $this->session->userdata('rol');
									
									$role = $this->db->get('hs_role')->result_array();
										foreach ($role as $row):
											if($row['rol_id']==$rol):
												echo $row['back_name'];
											endif;
										endforeach;
										?>.png" class="avatar-medium"/>

                            </div>

                            <span>
								<?php 
									$rol= $this->session->userdata('rol');
									$name = $this->db->get('hs_users')->result_array();
										foreach ($name as $row){
											if($row['rol']==$rol){
												
												echo $row['name'];
											}
										}
								?>
								</span>

                        </li>

                    	<li class="divider"></li>

                        

                        <?php
							$rol= $this->session->userdata('rol');
							$role = $this->db->get('hs_role')->result_array();
								foreach ($role as $row):
									if($row['rol_id']==$rol):
										
							
							
							if ($rol=='3' )

								$account_type	=	'parent';

							else
								$account_type	=	$row['back_name'];		
								endif;
						endforeach;			
										
						?>

						<li><a href="<?php echo base_url();?>index.php?<?php echo $account_type;?>/manage_profile">

                        		<i class="icon-user"></i><span><?php echo get_phrase('profile');?></span></a></li>

                        <li><a href="<?php echo base_url();?>index.php?<?php echo $account_type;?>/manage_profile">

                        		<i class="icon-lock"></i><span><?php echo get_phrase('change_password');?></span></a></li>

						<li><a href="<?php echo base_url();?>index.php?login/logout">

                        		<i class="icon-off"></i><span><?php echo get_phrase('logout');?></span></a></li>

					</ul>
						
                	<!-- Account Selector -->

					</li>

				</ul>

				

                <ul class="nav pull-right">

					<li class="dropdown">

						<a href="#" ><i class="icon-user"></i><?php
						
							$rol= $this->session->userdata('rol');
							$role=$this->db->get('hs_role')->result_array();
								foreach ($role as $row):
									if($row['rol_id']==$rol):
										echo get_phrase('panel').' '.get_phrase($row['rol']);
									endif;
								endforeach;
							?> 
						</a>

					</li>

				</ul>

			</div>

		</div>

	</div>

</div>
