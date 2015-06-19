<div class="container-fluid padded">

<div class="row-fluid">

    <div class="span30">

        <!-- find me in partials/action_nav_normal -->
        <?php 
            if ($this->session->userdata('rol') == 1){
        ?>
        <!--big normal buttons-->
        <div class="action-nav-normal">

            <div class="row-fluid">

                <div class="span2 action-nav-button">

                    <a href="<?php echo base_url(); ?>index.php?site/pre_contactos">

                        <img src="<?php echo base_url(); ?>template/images/icons/user.png"/>

                        <span>Pre-Contáctos</span>

                        <span class="label label-blue"><?php $this->db->where('activo', 1);
                                                             $this->db->from('hs_estudiantes');
                                                             echo $this->db->count_all_results();
                                                        ?>
                        </span>

                    </a>

                </div>
                <div class="span2 action-nav-button">

                    <a href="<?php echo base_url(); ?>index.php?site/users/2">

                        <img src="<?php echo base_url(); ?>template/images/icons/teacher.png"/>

                        <span><?php echo get_phrase('manage_teacher'); ?></span>
                        <?php 
                            $this->db->where('rol', 2);
                            $this->db->from('hs_users');
                            $profesores= $this->db->count_all_results(); 
                        ?>
                        <span class="label label-blue"><?php echo $profesores; ?></span>

                    </a>

                </div>

                <div class="span2 action-nav-button">

                    <a href="<?php echo base_url(); ?>index.php?site/gestionar_cursos">

                        <img src="<?php echo base_url(); ?>template/images/icons/marks.png"/>

                        <span><?php echo get_phrase('gestionar_cursos'); ?></span>

                    </a>

                </div>

                <div class="span2 action-nav-button">

                    <a href="<?php echo base_url(); ?>index.php?site/horarios_materias">

                        <img src="<?php echo base_url(); ?>template/images/icons/routine.png"/>

                        <span><?php echo get_phrase('horarios_materias'); ?></span>

                    </a>

                </div>

                <div class="span2 action-nav-button">

                    <a href="<?php echo base_url(); ?>index.php?site/facturacion">

                        <img src="<?php echo base_url(); ?>template/images/icons/payment.png"/>

                        <span><?php echo get_phrase('payment'); ?></span>

                    </a>

                </div>

                <div class="span2 action-nav-button">

                    <a href="<?php echo base_url(); ?>index.php?site/documentos">

                        <img src="<?php echo base_url(); ?>template/images/icons/book.png"/>

                        <span><?php echo get_phrase('library'); ?></span>

                    </a>

                </div>
            </div>
        </div>
        <?php } ?>

    </div>

    <!---DASHBOARD MENU BAR ENDS HERE-->

</div>


<div class="box">
    <div class="box-header">
        <!--CONTROL TABS START-->
        <ul class="nav nav-tabs nav-tabs-left">
            <li class="active"><a href="#calendario" data-toggle="tab"><i class="icon-calendar"></i>Horario</a></li>
            <li><a href="#materias" data-toggle="tab"><i class="icon-calendar"></i>Horario de Materias</a></li>
        </ul>
        <!--CONTROL TABS END-->
    </div>


    <div class="box-content">
        <div class="tab-content">
            <!--TABLE LISTING STARTS-->
            <div class="tab-pane  active" id="calendario">
                <div class="box">
                    <div class="box-content" style="max-height: 500px; overflow-y: auto">
                        <div id="calendar2">
                            
                        </div>
                    </div>
                </div>
            </div>
    <!---CALENDAR ENDS-->

        <div class="tab-pane box" id="materias">
                <div class="box-content">
                    <div class="accordion" id="accordion2">
                    <?php
                    $toggle = true;
                    $classes = $this->db->get('hs_cursos')->result_array();
                    foreach ($classes as $row):
                        ?>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2"
                                   href="#collapse<?php echo $row['id']; ?>">
                                    <i class="icon-rss icon-1x"></i> Curso: <?php echo $this->crud_model->get_class_name($row['curso']).' -- Seccion: '.$row['seccion']; ?>
                                </a>
                            </div>
                            <div id="collapse<?php echo $row['id']; ?>"
                                 class="accordion-body collapse <?php if ($toggle) {
                                     echo 'in';
                                     $toggle = false;
                                 } ?>">
                                <div class="accordion-inner">
                                    <table cellpadding="0" cellspacing="0" border="0" class="table table-normal">
                                        <tbody>
                                        <?php
                                        for ($d = 0; $d < 7; $d++):

                                            if ($d == 0) $day = 'Domingo';
                                            else if ($d == 1) $day = 'Lunes';
                                            else if ($d == 2) $day = 'Martes';
                                            else if ($d == 3) $day = 'Miercoles';
                                            else if ($d == 4) $day = 'Jueves';
                                            else if ($d == 5) $day = 'Viernes';
                                            else if ($d == 6) $day = 'Sabado';
                                            ?>
                                            <tr class="gradeA">
                                                <td width="100"><?php echo strtoupper($day); ?></td>
                                                <td>
                                                    <?php
                                                    $this->db->order_by("hora_inicio", "asc");
                                                    $this->db->where('dia', $d);
                                                    $this->db->where('curso', $row['id']);
                                                    $routines = $this->db->get('hs_horarios_materias')->result_array();
                                                    foreach ($routines as $row2):
                                                        
                                                        ?>
                                                        <div class="btn-group">
                                                            <button class="btn btn-gray btn-normal dropdown-toggle"
                                                                    data-toggle="dropdown">
                                                                <?php
                                                                $materia = $this->db->get_where('hs_materias', array('id' => $row2['materia']))->result_array();    
                                                                 echo $this->crud_model->get_nombre_materia_by_id($materia[0]['nombre']); ?>
                                                                <?php echo '(' . $row2['hora_inicio'].':' .$row2['minutos_hora_inicio']. '-' . $row2['hora_fin'] .':'.$row2['minutos_hora_fin']. ')'; ?>
                                                                <?php 
                                                                    if($this->session->userdata('rol') == 1){
                                                                ?>                                                                
                                                                <span class="caret"></span>
                                                                <?php } ?>
                                                            </button>
                                                            <?php 
                                                                if($this->session->userdata('rol') == 1){
                                                            ?>
                                                            <ul class="dropdown-menu">
                                                                <li><a data-toggle="modal" href="#modal-form"
                                                                       onclick="modal('Editar_Horario',<?php echo $row2['id']; ?>)"><i
                                                                            class="icon-cog"></i> Editar</a></li>
                                                                <li><a data-toggle="modal" href="#modal-delete"
                                                                       onclick="modal_delete('<?php echo base_url(); ?>index.php?site/horarios_materias/delete/<?php echo $row2['id']; ?>')">
                                                                        <i class="icon-trash"></i> Eliminar</a></li>
                                                            </ul>
                                                            <?php } ?>
                                                        </div>
                                                    <?php endforeach; ?>

                                                </td>
                                            </tr>
                                        <?php endfor; ?>

                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    <?php
                    endforeach;
                    ?>
                </div>
            </div>
            <!--TABLE LISTING ENDS-->
        </div>
    </div>
</div>
</div>







<div class="row-fluid">
    <!---TO DO LIST STARTS-->

    <div class="span12">

        <div class="box">

            <div class="box-header">

                        <span class="title">

                            <i class="icon-reorder"></i>

                            <?php echo get_phrase('noticeboard'); ?>

                        </span>

            </div>

            <div class="box-content scrollable" style="max-height: 500px; overflow-y: auto">


                <?php

                $notices = $this->db->get('noticeboard')->result_array();

                foreach ($notices as $row):

                    ?>

                    <div class="box-section news with-icons">

                        <div class="avatar blue">

                            <i class="icon-tag icon-2x"></i>

                        </div>

                        <div class="news-time">

                            <span><?php echo date('d', $row['create_timestamp']); ?></span> <?php echo date('M', $row['create_timestamp']); ?>

                        </div>

                        <div class="news-content">

                            <div class="news-title">

                                <?php echo $row['notice_title']; ?>

                            </div>

                            <div class="news-text">

                                <?php echo $row['notice']; ?>

                            </div>

                        </div>

                    </div>

                <?php endforeach; ?>

            </div>

        </div>

    </div>

    <!---TO DO LIST ENDS-->

</div>

</div>


<script>

    $(document).ready(function () {



        // page is now ready, initialize the calendar...

       //var colores = {'red','blue','yellow','green','brown'};


        $("#calendar2").fullCalendar({

            header: {

                left: "prev,next",

                center: "title",

                right: "month,agendaWeek,agendaDay"

            },

            editable: 0,

            droppable: 0,

            lang: 'es',



            dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab'],

            monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio','Augosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],

            dayNames: ['Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado'],

            buttonText : {
                today : 'Hoy',
                month : 'Mes',
                week : 'Semana',
                day : 'Día'
            },


            events: [

                <?php



                $notices    =   $this->db->get('hs_cursos')->result_array();

                foreach($notices as $row){
                   $fechas = $this->crud_model->get_datetimes_by_horario_curso_materias( $row['fecha_ini'], $row['fecha_cul'], $row['id']  );
               // var_dump($fechas);exit;
                   foreach ($fechas as $fecha) {                  
                ?>

                {
                    title: "<?= $this->crud_model->get_hs_cursos_nombre($row['curso']);?>",
                    start: "<?= $fecha['inicio'];?>",
                    fin  : "<?= $fecha['fin'];?>",
                    allDay : false
                },

                <?php
                   }
                }

                ?>

            ]

        })


    });

</script>
