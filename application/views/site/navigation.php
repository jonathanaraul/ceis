
</head>
<body>
<div class="sidebar-background">

    <div class="primary-sidebar-background">

    </div>

</div>

<div class="primary-sidebar">

<!-- Main nav -->


<ul class="nav nav-collapse collapse nav-collapse-primary">


<!--dashboard-->
<?php 
    if($this->session->userdata('rol')>0 && $this->session->userdata('rol')<=2){
?>

<li class="<?php if ($page_name == 'dashboard') echo 'dark-nav active'; ?>">

    <span class="glow"></span>

    <a href="<?php echo base_url(); ?>" rel="tooltip" data-placement="right"

       data-original-title="<?php echo get_phrase('inicio'); ?>">

        <!--<i class="icon-desktop icon-1x"></i>-->

        <img src="<?php echo base_url(); ?>template/images/icons/home.png"/>

        <span><?php echo get_phrase('dashboard'); ?></span>

    </a>

</li>
<?php 
	}
?>

<!--estudiantes-->
<?php 
	if($this->session->userdata('rol') == 1 || $this->session->userdata('rol') == 2){
 ?>

<li class="<?php if ($page_name == 'estudiantes') echo 'dark-nav active'; ?>">

    <span class="glow"></span>

    <a href="<?php echo base_url(); ?>index.php?site/estudiantes" rel="tooltip" data-placement="right"

       data-original-title="<?php echo get_phrase('gestionar_estudiantes'); ?>">

        <!--<i class="icon-user icon-1x"></i>-->

        <img src="<?php echo base_url(); ?>template/images/icons/user.png"/>

        <span><?php echo get_phrase('student'); ?></span>

    </a>

</li>

<!-- inscripciones -->

	
<li class="<?php if ($page_name == 'inscripcion') echo 'dark-nav active'; ?>">

    <span class="glow"></span>

    <a href="<?php echo base_url(); ?>index.php?site/inscripcion" rel="tooltip" data-placement="right"

       data-original-title="<?php echo get_phrase('Inscripciones/Preinscripciones'); ?>">

        <!--<i class="icon-columns icon-1x"></i>-->

        <img src="<?php echo base_url(); ?>template/images/icons/grade.png"/>

        <span><?php echo get_phrase('Inscripciones'); ?></span>

    </a>

</li>

<?php } ?>

<!--classes-->
<?php 
    if($this->session->userdata('rol') == 1){
?>

<li class="<?php if ($page_name == 'class') echo 'dark-nav active'; ?>">

    <span class="glow"></span>

    <a href="<?php echo base_url(); ?>index.php?site/cursos" rel="tooltip" data-placement="right"

       data-original-title="<?php echo get_phrase('cursos'); ?>">

        <!--<i class="icon-sitemap icon-1x"></i>-->

        <img src="<?php echo base_url(); ?>template/images/icons/class.png"/>

        <span><?= 'Cursos'?></span>

    </a>

</li>

<!--Gestionar Cursos-->
<?php 
    }
    if($this->session->userdata('rol') == 1 || $this->session->userdata('rol') == 2){
?>

<li class="<?php if ($page_name == 'gestionar_cursos') echo 'dark-nav active'; ?>">

    <span class="glow"></span>

    <a href="<?php echo base_url(); ?>index.php?site/gestionar_cursos" rel="tooltip" data-placement="right"

       data-original-title="<?php echo get_phrase('Gestion de Evaluaciones, Notas y Asistencias'); ?>">

        <!--<i class="icon-money icon-1x"></i>-->

        <img src="<?php echo base_url(); ?>template/images/icons/exam.png"/>

        <span><?php echo get_phrase('gestion_de_cursos'); ?></span>

    </a>

</li>

<!--subject-->
<?php 
    }
	if($this->session->userdata('rol') == 1 || $this->session->userdata('rol') == 2){
?>

<li class="<?php if ($page_name == 'materias') echo 'dark-nav active'; ?>">

    <span class="glow"></span>

    <a href="<?php echo base_url(); ?>index.php?site/materias/0" rel="tooltip" data-placement="right"

       data-original-title="<?php echo get_phrase('gestionar_materias'); ?>">

        <!--<i class="icon-tasks icon-1x"></i>-->

        <img src="<?php echo base_url(); ?>template/images/icons/subject.png"/>

        <span><?php echo get_phrase('materias'); ?></span>

    </a>

</li>
<?php
    }  
	if($this->session->userdata('rol')>0 && $this->session->userdata('rol')<=2){
?>

<!--class routine-->

<li class="<?php if ($page_name == 'horarios_materias') echo 'dark-nav active'; ?>">

    <span class="glow"></span>

    <a href="<?php echo base_url(); ?>index.php?site/horarios_materias" rel="tooltip" data-placement="right"

       data-original-title="<?php echo "Horarios de Materias" ?>">

        <!--<i class="icon-indent-right icon-1x"></i>-->

        <img src="<?php echo base_url(); ?>template/images/icons/routine.png"/>

        <span><?php echo get_phrase('horarios_materias'); ?></span>

    </a>

</li>


<!--facturacion-->
<?php
	}
	if($this->session->userdata('rol') == 1){
?>

<li class="<?php if ($page_name == 'facturacion') echo 'dark-nav active'; ?>">

    <span class="glow"></span>

    <a href="<?php echo base_url(); ?>index.php?site/facturacion" rel="tooltip" data-placement="right"

       data-original-title="<?php echo get_phrase('facturación'); ?>">

        <!--<i class="icon-money icon-1x"></i>-->

        <img src="<?php echo base_url(); ?>template/images/icons/payment.png"/>

        <span><?php echo get_phrase('facturacion'); ?></span>

    </a>

</li>


<!--DOCUMENTOS-->

<li class="<?php if ($page_name == 'documentos') echo 'dark-nav active'; ?>">

    <span class="glow"></span>

    <a href="<?php echo base_url(); ?>index.php?site/documentos" rel="tooltip" data-placement="right"

       data-original-title="<?php echo get_phrase('documentos_academicos'); ?>">

        <!--<i class="icon-book icon-1x"></i>-->

        <img src="<?php echo base_url(); ?>template/images/icons/book.png"/>

        <span><?php echo get_phrase('documentos'); ?></span>

    </a>

</li>

<!--Egresados-->

<li class="<?php if ($page_name == 'gestion_egresados') echo 'dark-nav active'; ?>">

    <span class="glow"></span>

    <a href="<?php echo base_url(); ?>index.php?site/gestion_egresados" rel="tooltip" data-placement="right"

       data-original-title="<?php echo get_phrase('gestion_de_egresados'); ?>">

        <!--<i class="icon-book icon-1x"></i>-->

        <img src="<?php echo base_url(); ?>template/images/icons/book.png"/>

        <span><?php echo get_phrase('gestion_de_egresados'); ?></span>

    </a>

</li>

<!--Empresas-->

<li class="<?php if ($page_name == 'empresas') echo 'dark-nav active'; ?>">

    <span class="glow"></span>

    <a href="<?php echo base_url(); ?>index.php?site/empresas" rel="tooltip" data-placement="right"

       data-original-title="<?php echo get_phrase('empresas'); ?>">

        <!--<i class="icon-book icon-1x"></i>-->

        <img src="<?php echo base_url(); ?>template/images/icons/dormitory.png"/>

        <span><?php echo get_phrase('empresas'); ?></span>

    </a>

</li>

<!--Reportes-->

<li class="<?php if ($page_name == 'reportes') echo 'dark-nav active'; ?>">

    <span class="glow"></span>

    <a href="<?php echo base_url(); ?>index.php?site/reportes" rel="tooltip" data-placement="right"

       data-original-title="<?php echo get_phrase('reportes'); ?>">

        <!--<i class="icon-book icon-1x"></i>-->

        <img src="<?php echo base_url(); ?>template/images/icons/subject.png"/>

        <span><?php echo get_phrase('reportes'); ?></span>

    </a>

</li>
<?php } ?>

<!--noticeboard-->
<?php 
    if($this->session->userdata('rol') == 1){
?>

<li class="<?php if ($page_name == 'noticeboard') echo 'dark-nav active'; ?>">

    <span class="glow"></span>

    <a href="<?php echo base_url(); ?>index.php?site/noticeboard" rel="tooltip" data-placement="right"

       data-original-title="<?php echo get_phrase('noticias'); ?>">

        <!--<i class="icon-columns icon-1x"></i>-->

        <img src="<?php echo base_url(); ?>template/images/icons/noticeboard.png"/>

        <span><?php echo get_phrase('noticeboard-event'); ?></span>

    </a>

</li>
<?php } ?>

<!-- rss -->
<?php 
	if($this->session->userdata('rol') == 1)
	{
?>

<li class="<?php if ($page_name == 'rss') echo 'dark-nav active'; ?>">

    <span class="glow"></span>

    <a href="<?php echo base_url(); ?>index.php?site/rss" rel="tooltip" data-placement="right"

       data-original-title="<?php echo get_phrase('rss'); ?>">

        <!--<i class="icon-columns icon-1x"></i>-->

        <img src="<?php echo base_url(); ?>template/images/icons/grade.png"/>

        <span><?php echo get_phrase('RSS'); ?></span>

    </a>

</li>


<!--system settings-->

<li class="dark-nav <?php if ($page_name == 'system_settings' ||

    $page_name == 'manage_language' ||
   
    $page_name == 'manage_users' ||

    $page_name == 'backup_restore'
) echo 'active';?>">

    <span class="glow"></span>

    <a class="accordion-toggle  " data-toggle="collapse" href="#settings_submenu" rel="tooltip" data-placement="right"

       data-original-title="<?php echo get_phrase('bed_ward_help'); ?>">

        <!--<i class="icon-wrench icon-1x"></i>-->

        <img src="<?php echo base_url(); ?>template/images/icons/settings.png"/>

        <span><?php echo get_phrase('settings'); ?><i class="icon-caret-down"></i></span>

    </a>


    <ul id="settings_submenu" class="collapse <?php if ($page_name == 'system_settings' ||

        $page_name == 'manage_language' ||
        
        $page_name == 'manage_users' ||

        $page_name == 'backup_restore'
    ) echo 'in';?>">

        <li class="<?php if ($page_name == 'system_settings') echo 'active'; ?>">

            <a href="<?php echo base_url(); ?>index.php?site/system_settings">

                <!--<i class="icon-h-sign"></i>-->

                <img src="<?php echo base_url(); ?>template/images/icons/system_settings.png"/>

                <?php echo get_phrase('system_settings'); ?>

            </a>

        </li>

        <li class="<?php if ($page_name == 'manage_language') echo 'active'; ?>">

            <a href="<?php echo base_url(); ?>index.php?site/manage_language">

                <!--<i class="icon-globe"></i>-->

                <img src="<?php echo base_url(); ?>template/images/icons/language.png"/>

                <?php echo get_phrase('manage_language'); ?>

            </a>

        </li>
        
        <li class="<?php if ($page_name == 'manage_users') echo 'active'; ?>">

            <a href="<?php echo base_url(); ?>index.php?site/users/0">

                <!--<i class="icon-download-alt"></i>-->

                <img src="<?php echo base_url(); ?>template/images/icons/users.png"/>

                <?php echo get_phrase('manejo_de_usuarios'); ?>

            </a>

        </li>

        <li class="<?php if ($page_name == 'configurar_cursos') echo 'active'; ?>">

            <a href="<?php echo base_url(); ?>index.php?site/configurar_cursos">

                <!--<i class="icon-download-alt"></i>-->

                <img src="<?php echo base_url(); ?>template/images/icons/system_settings.png"/>

                <?php echo get_phrase('configurar_cursos'); ?>

            </a>

        </li>

        <li class="<?php if ($page_name == 'backup_restore') echo 'active'; ?>">

            <a href="<?php echo base_url(); ?>index.php?site/backup_restore">

                <!--<i class="icon-download-alt"></i>-->

                <img src="<?php echo base_url(); ?>template/images/icons/backup.png"/>

                <?php echo get_phrase('backup_restore'); ?>

            </a>

        </li>

    </ul>

</li>
<?php 
	}
    if($this->session->userdata('rol')>0 && $this->session->userdata('rol')<=2 ){
?>
<!--manage own profile-->

<li class="<?php if ($page_name == 'manage_profile') echo 'dark-nav active'; ?>">

    <span class="glow"></span>

    <a href="<?php echo base_url(); ?>index.php?site/manage_profile" rel="tooltip" data-placement="right"

       data-original-title="<?php echo get_phrase('profile_help'); ?>">

        <!--<i class="icon-lock icon-1x"></i>-->

        <img src="<?php echo base_url(); ?>template/images/icons/profile.png"/>

        <span><?php echo get_phrase('profile'); ?></span>

    </a>

</li>
<?php } ?>


</ul>

</div>


