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

                    <a href="<?php echo base_url(); ?>index.php?site/estudiantes">

                        <img src="<?php echo base_url(); ?>template/images/icons/user.png"/>

                        <span><?php echo get_phrase('manage_student'); ?></span>

                        <span class="label label-blue"><?php echo $this->db->count_all_results('hs_estudiantes'); ?></span>

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


<div class="row-fluid">

    <div class="span12">

        <div class="box" >

            <div class="box-header">

                <div class="title">

                    <i class="icon-calendar"></i>

                    <?php echo get_phrase('calendar_schedule'); ?>

                </div>

            </div>

            <div class="box-content" style="max-height: 500px; overflow-y: auto">

                <div id="calendar2">

                </div>

            </div>

        </div>

    </div>

    <!---CALENDAR ENDS-->

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
