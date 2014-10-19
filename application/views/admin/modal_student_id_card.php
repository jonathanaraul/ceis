<?php

$student_info	=	$this->crud_model->get_student_info($current_student_id);

foreach($student_info as $row):?>



	<div style="background-color: #ddd;text-align: left;color: #fff;font-size: 21px;font-weight: 100;padding-left:20px;margin-top:60px;">

    	<img src="<?php echo base_url();?>uploads/logo.png"  

        	style="max-height:60px; max-width:100px; vertical-align:text-bottom;"/>

				

    </div>

<style>

.idcard_text

{

	padding: 6px;

	font-weight: 100;

	font-size: 13px;

}

</style>

	<table width="100%" border="0" style="background-color:#fff; font-size:13px;">

      <tr>

        <td rowspan="5" width="170" valign="top">

        	<img src="<?php echo $this->crud_model->get_image_url('student' , $row['student_id']);?>" 

                 style="max-height:130px;max-width:130px;border-radius: 10%;margin:20px;" />

        </td>

        <td class="idcard_text" width="100" style="padding-top:16px;"><?php echo get_phrase('nombres');?></td>

        <td class="idcard_text" style="padding-top:16px;"><?php echo $row['name'];?> <?php echo $row['snombre'];?> <?php echo $row['papellido'];?> <?php echo $row['sapellido'];?></td>

      </tr>

      <tr>

        <td class="idcard_text"><?php echo get_phrase('curso');?></td>

        <td class="idcard_text"><?php echo $this->crud_model->get_class_name($row['class_id']);?></td>

      </tr>

      <tr>

        <td class="idcard_text"><?php echo get_phrase('Documento');?></td>

        <td class="idcard_text"><?php echo $row['documento'];?> : <?php echo $row['ndocumento'];?></td>

      </tr>

      <tr>

        <td class="idcard_text"><?php echo get_phrase('fecha_de_nacimineto');?></td>

        <td class="idcard_text"><?php echo $row['birthday'];?></td>

      </tr>

      <tr>

        <td class="idcard_text"><?php echo get_phrase('sex');?></td>

        <td class="idcard_text"><?php echo $row['sex'];?></td>

      </tr>

      <tr>

        <td colspan="3" style="background-color:#ddd;font-size:10px; text-align:right;padding:8px;">&copy; 2014</td>

      </tr>

    </table>



<?php endforeach;?>