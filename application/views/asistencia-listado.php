<table border="0" cellspacing="0" cellpadding="0" class="table table-normal box">
    <thead>
    <th style="width: 25%">Cedula</th>
    <th style="width: 25%">Nombre</th>
    <th style="width: 25%">Apellido</th>
    <th style="width: 25%">Puntuacion</th>
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
                <input type="number" value="0" min="0" max="10" name="nota_estudiante_<?= $element['estudiante']?>">
            </td>
            <td>
                <input type="checkbox" checked name="asistencia_estudiante_<?= $element['estudiante']?>">
            </td>
        </tr>
    <?php
    }
    ?>

    </tbody>
</table>