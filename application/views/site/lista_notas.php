<table border="0" cellspacing="0" cellpadding="0" class="table table-normal box">
    <thead>
    <th style="width: 25%">Cedula</th>
    <th style="width: 25%">Nombre</th>
    <th style="width: 25%">Apellido</th>
    <th style="width: 25%">Evaluar Estudiante</th>
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
            <td align="center">
                <center>
                <a data-toggle="modal" href="#modal-form"
                   onclick="modal('Evaluar_Estudiante', <?php echo $element['estudiante']; ?>,<?php echo $curso; ?>,<?php echo $materia; ?>,<?php echo $evaluacion; ?>)"
                   class="btn btn-gray btn-small">
                    <i class="icon-wrench"></i> <?php echo get_phrase('evaluar_estudiante'); ?>
                </a>
                </center>
            </td>
        </tr>
    <?php
    }
    ?>
    </tbody>
</table>