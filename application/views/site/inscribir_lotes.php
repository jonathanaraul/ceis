<table border="0" cellspacing="0" cellpadding="0" class="table table-normal box">
    <thead>
    <th>Estudiante</th>
    <th>Estatus</th>
    </thead>
    <tbody>
    <?php
    foreach ($estudiantes as $estudiante) {
        $this->db->where('estudiante', $estudiante['student_id']);
        $this->db->where('curso', $curso);
        $this->db->where('status', 1);
        $this->db->from('hs_inscripcion');
        $inscrito = $this->db->count_all_results();
        if($inscrito == 0){
        ?>
        <tr>
            <td>
                <?= $this->crud_model->get_hs_student_nombre_by_id($estudiante['student_id']).' '.$this->crud_model->get_hs_student_apellido_by_id($estudiante['student_id']); ?>
            </td>
            <td>
                <div class="control-group">
                    <div class="controls">
                        <select name="status_<?= $estudiante['student_id']?>" id="status" class="recopila" style="width:100%;">
                            <option value="0">Preinscripcion</option>
                            <option value="1">Inscripcion</option>
                        </select>
                    </div>
                </div>
            </td>
        </tr>
    <?php
    }
    }
    ?>
    <tr>
        <td colspan="4"><p style="text-align:center" ><button class="btn btn-normal btn-gray" style="width: 100%;
margin-top: 20px;"  onclick="inscribirEstudiantes()">Inscribir Estudiantes</button></p></td>
    </tr>
    </tbody>
</table>