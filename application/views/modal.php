
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
    <head>
        <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
		<?php include 'application/views/includes.php';?>
        
    </head>
    
    
<body>
	<?php 
		$role = $this->db->get_where('hs_role', array('rol_id' => $this->session->userdata('rol')))->result_array();
		include $role[0]['back_name'].'/modal_'.$page_name.'.php';
	?>

</body>
</html>