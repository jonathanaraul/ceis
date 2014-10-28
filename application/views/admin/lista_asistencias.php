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

            <td>
                <input type="checkbox" checked name="presente"value="1">
            </td>
                      
        </tr>
    <?php
    }
    ?>
    <tr>
     <td colspan="4"><p style="text-align:center" ><button class="btn btn-normal btn-gray" style="width: 100%;
margin-top: 20px;">Actualizar</button></p></td>
    </tr>
    </tbody>
</table>