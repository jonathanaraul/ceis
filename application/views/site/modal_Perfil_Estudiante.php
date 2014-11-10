<?php

$student_info = $this->crud_model->get_student_info($current_student_id);

foreach ($student_info as $row):?>

    <center>

        <div class="box">

            <div class="">

                <div class="title">

                    <div
                        style="float:left;width:370px;height:147px;text-align:left;position:relative; margin-bottom:20px;">

                        <div style="position:absolute; bottom:10px;left:100px;">

                            <h3 style=" color:#666;font-weight:100;"><?php echo $row['nombre']; ?> <?php echo $row['snombre']; ?> <?php echo $row['papellido']; ?> <?php echo $row['sapellido']; ?></h3>

                        </div>

                    </div>

                </div>

            </div>

            <br/>

            <table class="table table-normal ">


                <?php if ($row['documento'] != '' || $row['documento'] != 0): ?>

                    <tr>

                        <td>Documento</td>

                        <td><b><?php echo $row['documento']; ?></b></td>

                    </tr>

                <?php endif; ?>



                <?php if ($row['f_nacimiento'] != '' || $row['f_nacimiento'] != 0): ?>

                    <tr>

                        <td>Fecha de Nacimiento</td>

                        <td><b><?php echo $row['f_nacimiento']; ?></b></td>

                    </tr>

                <?php endif; ?>



                <?php if ($row['sexo'] != '' || $row['sexo'] != 0): ?>

                    <tr>

                        <td>Sexo</td>
                        <?php if( $row['sexo']==male ){?><td><b>Masculino</b></td><?php }else{?><td><b>Femenino</b></td><?php } ?>
                        

                    </tr>

                <?php endif; ?>





                <?php if ($row['telefono'] != '' || $row['telefono'] != 0): ?>

                    <tr>

                        <td>Telefono de contacto</td>

                        <td><b><?php echo $row['telefono']; ?></b></td>

                    </tr>

                <?php endif; ?>



                <?php if ($row['email'] != '' || $row['email'] != 0): ?>

                    <tr>

                        <td>Email</td>

                        <td><b><?php echo $row['email']; ?></b></td>

                    </tr>

                <?php endif; ?>







                <?php if ($row['direccion'] != '' || $row['direccion'] != 0): ?>

                    <tr>

                        <td style="vertical-align:top;">Direccion</td>

                        <td><b><?php echo $row['direccion']; ?></b>


                        </td>

                    </tr>

                <?php endif; ?>

                <?php if ($row['empresa'] != ''): ?>

                    <tr>

                        <td style="vertical-align:top;">Empresa</td>

                        <td><b><?php echo $row['empresa']; ?></b>


                        </td>

                    </tr>

                <?php endif; ?>


            </table>

        </div>

    </center>

<?php endforeach; ?>
