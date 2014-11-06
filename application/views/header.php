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
                                
									$role = $this->db->get_where('hs_role', array('rol_id' => $this->session->userdata('rol')))->result_array();
			
										echo $role[0]['back_name']?>.png" class="avatar-medium"/>

                            </div>

                            <span>
								<?php 
									$role = $this->db->get_where('hs_users', array('user_id' => $this->session->userdata('user_id')))->result_array();
									echo $role[0]['name'].' '.$role[0]['papellido'];		
								?>
							</span>

                        </li>

                    	<li class="divider"></li>

                       

						<li><a href="<?php echo base_url();?>index.php?site/manage_profile">

                        		<i class="icon-user"></i><span><?php echo get_phrase('profile');?></span></a></li>

                        <li><a href="<?php echo base_url();?>index.php?site/manage_profile">

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
							$role = $this->db->get_where('hs_role', array('rol_id' => $this->session->userdata('rol')))->result_array();
								
								echo get_phrase('panel').' '.get_phrase($role[0]['rol']);
							?> 
						</a>

					</li>

				</ul>

			</div>

		</div>

	</div>

</div>
