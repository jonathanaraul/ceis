<div class="tab-pane">
    <div class="box">
        <div class="box-content">
            <div id="dataTables">
                <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive ">
                    <div class="control-group">
                        <label class="control-label"><?= 'LISTA DE ESTUDIANTES NO-EGRESADOS' ?></label>
                    </div>
                    <thead>
                        <tr>
                            <th width="10%" >
                                <div><?php echo get_phrase('cedula'); ?></div>
                            </th>
                            <th width="10%">
                                <div><?php echo get_phrase('nombre'); ?></div>
                            </th>
                            <th width="10%">
                                <div><?php echo get_phrase('apellido'); ?></div>
                            </th>
                            <th width="10%">
                                <div><?php echo get_phrase('fecha_de_Procesado'); ?></div>
                            </th>
                            <th width="10%">
                                <div><?php echo get_phrase('curso'); ?></div>
                            </th>
                            <th width="10%">
                                <div><?php echo get_phrase('seccion'); ?></div>
                            </th>
                            <th width="10%">
                                <div><?php echo get_phrase('observacion'); ?></div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($noegresado as $noegresa): ?>
                            <tr>
                                <td style="text-align:center;"><?php echo $noegresa['cedula']; ?></td>
                                <td style="text-align:center;"><?php echo $noegresa['nombre']; ?></td>
                                <td style="text-align:center;" ><?php echo $noegresa['papellido']; ?></td>
                                <td style="text-align:center;" ><?php echo $noegresa['fecha_procesado']; ?></td>
                                <td style="text-align:center;" ><?php echo $noegresa['curso']; ?></td>
                                <td style="text-align:center;" ><?php echo $noegresa['seccion']; ?></td>
                                <td style="text-align:center;" ><?php echo $noegresa['observacion']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>