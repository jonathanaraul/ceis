<table border="0" cellspacing="0" cellpadding="0" class="table table-normal box">
    <thead>
    <th style="width: 25%">Cedula</th>
    <th style="width: 25%">Nombre</th>
    <th style="width: 25%">Apellido</th>
    <th style="width: 25%">Asistencia</th>
    </thead>
    <tbody>
    <?php
    foreach ($elements as $element) {
        ?>
        <tr>
            <td>
                <?= $this->crud_model->get_hs_student_cedula_by_id($element['estudiante']); ?>
            </td>
            <td>
                <?= $this->crud_model->get_hs_student_nombre_by_id($element['estudiante']); ?>
            </td>
            <td>    
                <?= $this->crud_model->get_hs_student_apellido_by_id($element['estudiante']); ?>
            </td>
            <?php if($element['presente']==1){ ?>
                <td>
                    <input type="checkbox" checked name="presente"value="1" disabled>
                </td>
            <?php }else{ ?>
                <td>
                    <input type="checkbox" name="presente" value="0" disabled>
                </td>
            <?php } ?>               
        </tr>
    <?php
    }
    ?>

    </tbody>
</table>