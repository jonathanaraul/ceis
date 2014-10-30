    <div class="tab-pane active" id="list">
        <table cellpadding="0" cellspacing="0" border="0" class="table table-normal box">
            <thead>
            <tr>
                <td><?= 'Imprime TODOS'; ?></td>
                <td><?= 'Seleccionar materia'; ?></td>
                <td><?= 'Media'; ?></td>
                <td>&nbsp;</td>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $this->crud_model->get_hs_student_nombre_by_id($diploma_nombre)?></td>
                    <td>Algo</td>
                    <td><?=$media?></td>
                    <td align="center">
                        <a data-toggle="modal" href="#modal-form"
                           onclick="modal('edit_inscripcion',<?php echo $row['id']; ?>)"
                           class="btn btn-gray btn-small">
                            <i class="icon-wrench"></i> <?php echo get_phrase('edit'); ?>
                        </a>
                        <a data-toggle="modal" href="#modal-delete"
                           onclick="modal_delete('<?php echo base_url(); ?>index.php?admin/inscripcion/delete/<?php echo $row['id']; ?>')"
                           class="btn btn-red btn-small">
                            <i class="icon-trash"></i> <?php echo get_phrase('delete'); ?>
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div><p style="text-align:center" ><button class="btn btn-normal btn-gray" style="width: 100%;
                margin-top: 20px;"  onclick="actualizarNotas()">Imprimir Diploma</button></p></td>
    </div>