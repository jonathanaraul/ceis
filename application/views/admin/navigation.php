</head>
<body>


<div class="sidebar-background">

    <div class="primary-sidebar-background">

    </div>

</div>

<div class="primary-sidebar">

<!-- Main nav -->


<ul class="nav nav-collapse collapse nav-collapse-primary">


<!------dashboard----->

<li class="<?php if ($page_name == 'dashboard') echo 'dark-nav active'; ?>">

    <span class="glow"></span>

    <a href="<?php echo base_url(); ?>" rel="tooltip" data-placement="right"

       data-original-title="<?php echo get_phrase('dashboard_help'); ?>">

        <!--<i class="icon-desktop icon-1x"></i>-->

        <img src="<?php echo base_url(); ?>template/images/icons/home.png"/>

        <span><?php echo get_phrase('dashboard'); ?></span>

    </a>

</li>


<!------student----->

<li class="<?php if ($page_name == 'student') echo 'dark-nav active'; ?>">

    <span class="glow"></span>

    <a href="<?php echo base_url(); ?>index.php?admin/student" rel="tooltip" data-placement="right"

       data-original-title="<?php echo get_phrase('student_help'); ?>">

        <!--<i class="icon-user icon-1x"></i>-->

        <img src="<?php echo base_url(); ?>template/images/icons/user.png"/>

        <span><?php echo get_phrase('student'); ?></span>

    </a>

</li>

<!-- inscripciones -->
<li class="<?php if ($page_name == 'inscripcion') echo 'dark-nav active'; ?>">

    <span class="glow"></span>

    <a href="<?php echo base_url(); ?>index.php?admin/inscripcion" rel="tooltip" data-placement="right"

       data-original-title="<?php echo get_phrase('Inscripciones/Preinscripciones'); ?>">

        <!--<i class="icon-columns icon-1x"></i>-->

        <img src="<?php echo base_url(); ?>template/images/icons/grade.png"/>

        <span><?php echo get_phrase('Inscripciones'); ?></span>

    </a>

</li>

<!------teacher----->

<li class="<?php if ($page_name == 'teacher') echo 'dark-nav active'; ?>">

    <span class="glow"></span>

    <a href="<?php echo base_url(); ?>index.php?admin/teacher" rel="tooltip" data-placement="right"

       data-original-title="<?php echo get_phrase('teacher_help'); ?>">

        <!--<i class="icon-user icon-1x"></i>-->

        <img src="<?php echo base_url(); ?>template/images/icons/teacher.png"/>

        <span><?php echo get_phrase('teacher'); ?></span>

    </a>

</li>

<!------Periodo----->

<li class="<?php if ($page_name == 'periodo') echo 'dark-nav active'; ?>">

    <span class="glow"></span>

    <a href="<?php echo base_url(); ?>index.php?admin/periodo" rel="tooltip" data-placement="right"

       data-original-title="Ayuda de Periodo">

        <!--<i class="icon-user icon-1x"></i>-->

        <img src="<?php echo base_url(); ?>template/images/icons/book.png"/>

        <span><?php echo get_phrase('Periodo'); ?></span>

    </a>

</li>

<!------subject----->

<li class="<?php if ($page_name == 'materias') echo 'dark-nav active'; ?>">

    <span class="glow"></span>

    <a href="<?php echo base_url(); ?>index.php?admin/materias" rel="tooltip" data-placement="right"

       data-original-title="<?php echo get_phrase('ayuda_de_materias'); ?>">

        <!--<i class="icon-tasks icon-1x"></i>-->

        <img src="<?php echo base_url(); ?>template/images/icons/subject.png"/>

        <span><?php echo get_phrase('materias'); ?></span>

    </a>

</li>


<!------classes----->

<li class="<?php if ($page_name == 'class') echo 'dark-nav active'; ?>">

    <span class="glow"></span>

    <a href="<?php echo base_url(); ?>index.php?admin/cursos" rel="tooltip" data-placement="right"

       data-original-title="<?php echo get_phrase('class_help'); ?>">

        <!--<i class="icon-sitemap icon-1x"></i>-->

        <img src="<?php echo base_url(); ?>template/images/icons/class.png"/>

        <span><?= 'Cursos'?></span>

    </a>

</li>

<!------Evaluaciones----->

<li class="<?php if ($page_name == 'evaluaciones') echo 'dark-nav active'; ?>">

    <span class="glow"></span>

    <a href="<?php echo base_url(); ?>index.php?admin/evaluaciones" rel="tooltip" data-placement="right"

       data-original-title="<?php echo get_phrase('Ayuda Evaluaciones'); ?>">

        <!--<i class="icon-money icon-1x"></i>-->

        <img src="<?php echo base_url(); ?>template/images/icons/exam.png"/>

        <span><?php echo get_phrase('evaluaciones'); ?></span>

    </a>

</li>

<!------notas----->

<li class="<?php if ($page_name == 'notas') echo 'dark-nav active'; ?>">

    <span class="glow"></span>

    <a href="<?php echo base_url(); ?>index.php?admin/notas" rel="tooltip" data-placement="right"

       data-original-title="<?php echo get_phrase('Notas'); ?>">

        <!--<i class="icon-pencil icon-1x"></i>-->

        <img src="<?php echo base_url(); ?>template/images/icons/marks.png"/>

        <span><?= Notas; ?></span>

    </a>

</li>

<!------Asistencias----->

<li class="<?php if ($page_name == 'asistencias') echo 'dark-nav active'; ?>">

    <span class="glow"></span>

    <a href="<?php echo base_url(); ?>index.php?admin/asistencias" rel="tooltip" data-placement="right"

       data-original-title="<?php echo get_phrase('asistencias'); ?>">

        <!--<i class="icon-pencil icon-1x"></i>-->

        <img src="<?php echo base_url(); ?>template/images/icons/noticeboard.png"/>

        <span><?= Asistencias; ?></span>

    </a>

</li>


<!------class routine----->

<li class="<?php if ($page_name == 'class_routine') echo 'dark-nav active'; ?>">

    <span class="glow"></span>

    <a href="<?php echo base_url(); ?>index.php?admin/class_routine" rel="tooltip" data-placement="right"

       data-original-title="<?php echo get_phrase('class_routine_help'); ?>">

        <!--<i class="icon-indent-right icon-1x"></i>-->

        <img src="<?php echo base_url(); ?>template/images/icons/routine.png"/>

        <span><?php echo get_phrase('class_routine'); ?></span>

    </a>

</li>

<!--class routine-->

<li class="<?php if ($page_name == 'horarios_materias') echo 'dark-nav active'; ?>">

    <span class="glow"></span>

    <a href="<?php echo base_url(); ?>index.php?admin/horarios_materias" rel="tooltip" data-placement="right"

       data-original-title="<?php echo "Ayuda de horarios" ?>">

        <!--<i class="icon-indent-right icon-1x"></i>-->

        <img src="<?php echo base_url(); ?>template/images/icons/routine.png"/>

        <span><?php echo get_phrase('horarios_materias'); ?></span>

    </a>

</li>

<!------fcturacion----->

<li class="<?php if ($page_name == 'facturacion') echo 'dark-nav active'; ?>">

    <span class="glow"></span>

    <a href="<?php echo base_url(); ?>index.php?admin/facturacion" rel="tooltip" data-placement="right"

       data-original-title="<?php echo get_phrase('invoice_help'); ?>">

        <!--<i class="icon-money icon-1x"></i>-->

        <img src="<?php echo base_url(); ?>template/images/icons/payment.png"/>

        <span><?php echo get_phrase('facturacion'); ?></span>

    </a>

</li>


<!------DOCUMENTOS----->

<li class="<?php if ($page_name == 'documentos') echo 'dark-nav active'; ?>">

    <span class="glow"></span>

    <a href="<?php echo base_url(); ?>index.php?admin/documentos" rel="tooltip" data-placement="right"

       data-original-title="<?php echo get_phrase('documentos_academicos'); ?>">

        <!--<i class="icon-book icon-1x"></i>-->

        <img src="<?php echo base_url(); ?>template/images/icons/book.png"/>

        <span><?php echo get_phrase('documentos'); ?></span>

    </a>

</li>


<!------Empresas----->

<li class="<?php if ($page_name == 'empresas') echo 'dark-nav active'; ?>">

    <span class="glow"></span>

    <a href="<?php echo base_url(); ?>index.php?admin/empresas" rel="tooltip" data-placement="right"

       data-original-title="<?php echo get_phrase('empresas'); ?>">

        <!--<i class="icon-book icon-1x"></i>-->

        <img src="<?php echo base_url(); ?>template/images/icons/dormitory.png"/>

        <span><?php echo get_phrase('empresas'); ?></span>

    </a>

</li>


<!------noticeboard----->

<li class="<?php if ($page_name == 'noticeboard') echo 'dark-nav active'; ?>">

    <span class="glow"></span>

    <a href="<?php echo base_url(); ?>index.php?admin/noticeboard" rel="tooltip" data-placement="right"

       data-original-title="<?php echo get_phrase('noticeboard_help'); ?>">

        <!--<i class="icon-columns icon-1x"></i>-->

        <img src="<?php echo base_url(); ?>template/images/icons/noticeboard.png"/>

        <span><?php echo get_phrase('noticeboard-event'); ?></span>

    </a>

</li>

<!-- rss -->

<li class="<?php if ($page_name == 'rss') echo 'dark-nav active'; ?>">

    <span class="glow"></span>

    <a href="<?php echo base_url(); ?>index.php?admin/rss" rel="tooltip" data-placement="right"

       data-original-title="<?php echo get_phrase('rss'); ?>">

        <!--<i class="icon-columns icon-1x"></i>-->

        <img src="<?php echo base_url(); ?>template/images/icons/grade.png"/>

        <span><?php echo get_phrase('RSS'); ?></span>

    </a>

</li>


<!------system settings------>

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

            <a href="<?php echo base_url(); ?>index.php?admin/system_settings">

                <!--<i class="icon-h-sign"></i>-->

                <img src="<?php echo base_url(); ?>template/images/icons/system_settings.png"/>

                <?php echo get_phrase('system_settings'); ?>

            </a>

        </li>

        <li class="<?php if ($page_name == 'manage_language') echo 'active'; ?>">

            <a href="<?php echo base_url(); ?>index.php?admin/manage_language">

                <!--<i class="icon-globe"></i>-->

                <img src="<?php echo base_url(); ?>template/images/icons/language.png"/>

                <?php echo get_phrase('manage_language'); ?>

            </a>

        </li>
        
        <li class="<?php if ($page_name == 'manage_users') echo 'active'; ?>">

            <a href="<?php echo base_url(); ?>index.php?admin/manage_users">

                <!--<i class="icon-download-alt"></i>-->

                <img src="<?php echo base_url(); ?>template/images/icons/users.png"/>

                <?php echo get_phrase('manejo_de_usuarios'); ?>

            </a>

        </li>

        <li class="<?php if ($page_name == 'backup_restore') echo 'active'; ?>">

            <a href="<?php echo base_url(); ?>index.php?admin/backup_restore">

                <!--<i class="icon-download-alt"></i>-->

                <img src="<?php echo base_url(); ?>template/images/icons/backup.png"/>

                <?php echo get_phrase('backup_restore'); ?>

            </a>

        </li>

    </ul>

</li>


<!------manage own profile--->

<li class="<?php if ($page_name == 'manage_profile') echo 'dark-nav active'; ?>">

    <span class="glow"></span>

    <a href="<?php echo base_url(); ?>index.php?admin/manage_profile" rel="tooltip" data-placement="right"

       data-original-title="<?php echo get_phrase('profile_help'); ?>">

        <!--<i class="icon-lock icon-1x"></i>-->

        <img src="<?php echo base_url(); ?>template/images/icons/profile.png"/>

        <span><?php echo get_phrase('profile'); ?></span>

    </a>

</li>


</ul>


</div>
