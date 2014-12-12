
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
    <head>
        <meta name="viewport" content="width=device-width, maximum-scale=1, initial-scale=1, user-scalable=0">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
        <link rel="icon" href="<?=base_url()?>/template/images/favicon.gif" type="image/gif">
		<?php include 'includes.php';?>
        <title><?php echo $page_title;?> | <?php echo $system_title;?></title>
    </head>
    
    
<body>
	<div id="main_body">
		
        <?php if($page_name=="consult_nro"){ ?>
            
            <?php include 'site/'.$page_name.'.php';?>
        
        <?php }else{ ?>

    		<?php include 'header.php';?>
            <?php include 'site/navigation.php';?>
            <div class="main-content">
                <?php include 'page_info.php';?>
                <div class="container-fluid padded">
                    <?php include 'site/'.$page_name.'.php';?>
                </div>       
            <?php include 'footer.php';?>
            </div>
        
       <?php } ?>
	</div>
</body>
<?php include 'modal_hidden.php';?> 
</html>
