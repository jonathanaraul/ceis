<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">



<html>

    <head>

        <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0">

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

        <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">

		<?php include 'includes.php';?>

        <title><?php echo get_phrase('Sistema_academico');?> | <?php echo $system_title;?></title>

    </head>

	<body>

        <div id="main_body">

            <?php if($this->session->flashdata('flash_message') != ""):?>

            <script>

                $(document).ready(function() {

                    Growl.info({title:"<?php echo $this->session->flashdata('flash_message');?>",text:" "})

                });

            </script>

            <?php endif;?>

            <div class="navbar navbar-top navbar-inverse">

                <div class="navbar-inner">

                    <div class="container-fluid">

                        

                        <a class="brand" href="<?php echo base_url();?>">

                            <?php echo $system_name;?>

                        </a>

                        

                        <ul class="nav pull-right">

                            <li class="dropdown">

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Select Language <b class="caret"></b></a>

                            <!-- Language Selector -->

                                <ul class="dropdown-menu">

                                    <?php

                                    $fields = $this->db->list_fields('language');

                                    foreach ($fields as $field)

                                    {

                                        if($field == 'phrase_id' || $field == 'phrase')continue;

                                        ?>

                                            <li>

                                                <a href="<?php echo base_url();?>index.php?multilanguage/select_language/<?php echo $field;?>">

                                                    <?php echo $field;?>

                                                    <?php //selecting current language

                                                        if($this->session->userdata('current_language') == $field):?>

                                                            <i class="icon-ok"></i>

                                                    <?php endif;?>

                                                </a>

                                            </li>

                                        <?php

                                    }

                                    ?>

                                </ul>

                            <!-- Language Selector -->

                            </li>

                        </ul>

                        

                    </div>

                </div>

            </div>

            <div class="container">

                <div class="span4 offset4">

                    <div class="padded">

                        <center>

                            <img src="<?php echo base_url();?>uploads/logo.png" style="max-height:100px;margin:20px 0px;" />

                        </center>

                        <div class="login box" style="margin-top: 10px;">

                            <div class="box-header">

                                <span class="title"><?php echo get_phrase('Ingresar_al_sistema');?></span>
                               
                            </div>

                            <div class="box-content padded">
								<?php echo validation_errors(); ?>
                                <?php echo form_open('login/new_user', array('class' => 'separate-sections'));?>


                                    <div class="input-prepend">

                                        <span class="add-on" href="#">

                                        <i class="icon-envelope"></i>

                                        </span>

                                        <input name="email" type="text" placeholder="<?php echo get_phrase('email');?>" autocomplete="off" >

                                    </div>

                                    <div class="input-prepend">

                                        <span class="add-on" href="#">

                                        <i class="icon-key"></i>

                                        </span>

                                        <input name="password" type="password" placeholder="<?php echo get_phrase('password');?>" autocomplete="off">

                                    </div>

                                    <div class="row-fluid">

                                        <div class="span6">

                                            <a  data-toggle="modal" href="#modal-simple"  class="btn btn-blue btn-block" >

                                                <?php echo get_phrase('forgot_password ?');?> 

                                            </a>

                                        </div>
                                        
                                        <?php echo form_hidden('token',$token);?>

                                        <div class="span6">

                                            <input type="submit" class="btn btn-gray btn-block "  value="<?php echo get_phrase('Entrar');?>"/>

                                        </div>

                                    </div>

                                </form>

                            </div>

                        </div>

                        <hr />

                        <div style="color:#a5a5a5;">

                        	

                        		<center>&copy; 2014, Sercreativo inc

                        		</center>

                            

                        </div>

                            

                    </div>

                </div>

            </div>

        </div>

        <!-----------password reset form ------>

        <div id="modal-simple" class="modal hide fade" style="top:30%;">

          <div class="modal-header">

            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

            <h6 style="color:#FFFFFF"  id="modal-tablesLabel"><?php echo get_phrase('reset_password');?></h6>

          </div>

          <div class="modal-body" style="padding:20px;">

            <?php echo form_open('login/reset_password');?>

            	
                <input type="email" name="email"  placeholder="<?php echo get_phrase('email');?>"  style="margin-bottom: 0px !important;"/>

                <input type="submit" value="<?php echo get_phrase('reset');?>"  class="btn btn-blue btn-medium"/>

            <?php echo form_close();?>

          </div>

          <div class="modal-footer">

            <button class="btn btn-default" data-dismiss="modal">Close</button>

          </div>

        </div>

        <!-----------password reset form ------>

        

        

	</body>

</html>
