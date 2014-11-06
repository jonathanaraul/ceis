<table border="0" cellspacing="0" cellpadding="0" class="table table-normal box">
    <thead>
    <th style="text-align: center;">Seleccione Estudiante</th>
    <th style="text-align: center;">Seleccione Estatus</th>
    </thead>
    <tbody>
        <tr>
            <td>
                <div class="control-group">
                    <div class="controls">
                        <select name="estudiante" id="estudiante" class="uniform" style="width:100%;">
                            <?php
                            foreach ($estudiantes as $estudiante):
                            $this->db->where('estudiante', $estudiante['student_id']);
                            $this->db->where('curso', $curso);
                            $this->db->where('status', 1);
                            $this->db->from('hs_inscripcion');
                            $inscrito = $this->db->count_all_results();
                            if($inscrito == 0){
                            ?>
                                <option value="<?php echo $estudiante['student_id']; ?>">
                                    <?php echo $estudiante['name'] . ' ' . $estudiante['papellido'] . ' - ' . $estudiante['ndocumento']; ?> </option>
                            <?php
                            //}
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>
            </td>
            <td>
                <div class="control-group">
                    <div class="controls">
                        <select name="status" id="status" class="uniform" style="width:100%;">
                            <option value="0">Preinscripcion</option>
                            <option value="1">Inscripcion</option>
                        </select>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="4"><p style="text-align:center" ><button class="btn btn-normal btn-gray" style="width: 100%;
    margin-top: 20px;"  onclick="inscribirEstudiante()">Agregar Inscripción</button></p></td>
        </tr>
        </tbody>
</table>