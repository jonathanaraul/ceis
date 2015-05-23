<div class="box">
    <div class="box-header">

        <!--CONTROL TABS START-->
        <ul class="nav nav-tabs nav-tabs-left">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="icon-align-justify"></i>
                    <?= 'Lista de horarios de materias'; ?>
                </a>
            </li>
            <?php 
				if($this->session->userdata('rol') == 1){
			 ?>
            <li>
                <a href="#add" data-toggle="tab"><i class="icon-plus"></i>
                    <?= 'Agregar horario de materia'; ?>
                </a>
            </li>
            <?php 
			}
			?>
        </ul>
        <!--CONTROL TABS END-->

    </div>
    <div class="box-content padded">
        <div class="tab-content">
            <!--TABLE LISTING STARTS-->
            <div class="tab-pane active" id="list">
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
                                                                <?php echo '(' . $row2['hora_inicio'].':' .$row2['minutos_hora_inicio']. '-' . $row2['hora_fin'] .':' .$row2['minutos_hora_fin']. ')'; ?>
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


            <!--CREATION FORM STARTS-->
            <div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box-content">
                    <?php echo form_open('site/horarios_materias/create', array('onsubmit' => 'return validateForm()','name' => 'crear_horarios','class' => 'form-horizontal validatable', 'target' => '_top')); ?>
                    <div class="padded">
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('class'); ?></label>

                            <div class="controls">
                               <select name="cursos" id="cursos" class="uniform" onchange="ajaxMaterias(this.value)" style="width:100%;">
                                <option value="0"><?= 'Seleccionar curso' ?></option>
                                <?php
                                $classes = $this->db->get('hs_cursos')->result_array();
                                foreach ($classes as $row) {
                                    echo '<option value="' . $row['id'] . '">' . $this->crud_model->get_class_name($row['curso']).' -- Seccion: '.$row['seccion'] . '</option>';
                                }
                                ?>
                            </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('materias'); ?></label>

                            <div class="controls">
                                <select name="materias" id="materias" class="uniform" style="width:100%;">
                                   
                                    <option value="0"><?='Seleccionar materia'?></option>
                                   
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('day'); ?></label>

                            <div class="controls">
                                <select name="dia" class="uniform" style="width:100%;">
                                    <option value="0">Domingo</option>
                                    <option value="1">Lunes</option>
                                    <option value="2">Martes</option>
                                    <option value="3">Miercoles</option>
                                    <option value="4">Jueves</option>
                                    <option value="5">Viernes</option>
                                    <option value="6">Sabado</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('starting_time'); ?></label>

                            <div class="controls">
                                Hora: <select name="time_start" class="uniform" style="width:100%;">
                                    <?php for ($i = 0; $i <= 12; $i++): ?>
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                    <?php endfor; ?>
                                </select>
                                Minutos: <select name="minutos_hora_inicio" class="uniform" style="width:100%;">
                                     <?php for($i=0;$i<=5;$i++)
                                                {
                                                     for($ii=0;$ii<=9;$ii++)
                                                            {
                                                                  echo "<option value='".$i,$ii."'>".$i,$ii."</option>";
                                                             }
                                                }
                                    ?>
                                </select>
                                <select name="starting_ampm" class="uniform" style="width:100%">
                                    <option value="1">am</option>
                                    <option value="2">pm</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('ending_time'); ?></label>

                            <div class="controls">
                                Hora: <select name="time_end" class="uniform" style="width:100%;">
                                    <?php for ($i = 0; $i <= 12; $i++): ?>
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                    <?php endfor; ?>
                                </select>
                                Minutos: <select name="minutos_hora_fin" class="uniform" style="width:100%;">
                                    <?php for($i=0;$i<=5;$i++)
                                                {
                                                     for($ii=0;$ii<=9;$ii++)
                                                            {
                                                                  echo "<option value='".$i,$ii."'>".$i,$ii."</option>";
                                                             }
                                                }
                                    ?>
                                </select>
                                <select name="ending_ampm" class="uniform" style="width:100%">
                                    <option value="1">am</option>
                                    <option value="2">pm</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit"
                                class="btn btn-gray"><?php echo get_phrase('add_class_routine'); ?></button>
                    </div>
                    </form>
                </div>
            </div>

<script type="text/javascript">

 function ajaxMaterias(valor) {

        $('#materias').empty();

        $.post('<?php echo site_url()?>ajax/obtenMaterias',
            {'curso': valor },
            function (data) {
                $('#materias').html(data);
            });
    }

    function validateForm() {
    var curso = document.forms["crear_horarios"]["cursos"].value;
    var materias = document.forms["crear_horarios"]["materias"].value;
        if (curso == 0) {
            alert("Debe seleccionar un curso");
            return false;
        }
        if (materias == 0) {
            alert("Debe seleccionar una materia");
            return false;
        }
    }

</script>


