<div class="tab-pane">
    <div class="box">
        <div class="box-content">
            <div id="dataTables">
                <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive ">
                    <div class="control-group">
                        <label class="control-label"><?= 'LISTA DE ESTUDIANTES EGRESADOS' ?></label>
                    </div>
                    <thead>
                        <tr>
                            <th width="10%" >
                                <div><?php echo get_phrase('cedula'); ?></div>
                            </th>
                            <th width="7%">
                                <div><?php echo get_phrase('nombre'); ?></div>
                            </th>
                            <th width="8%">
                                <div><?php echo get_phrase('apellido'); ?></div>
                            </th>
                            <th width="10%">
                                <div><?php echo get_phrase('fecha_egreso'); ?></div>
                            </th>
                            <th width="15%">
                                <div><?php echo get_phrase('curso'); ?></div>
                            </th>
                            <th width="5%">
                                <div><?php echo get_phrase('seccion'); ?></div>
                            </th>
                            <th width="15%">
                                <div><?php echo get_phrase('observacion'); ?></div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($egresado as $egresa): ?>
                            <tr>
                                <td style="text-align:center;"><?php echo $egresa['cedula']; ?></td>
                                <td style="text-align:center;"><?php echo $egresa['nombre']; ?></td>
                                <td style="text-align:center;" ><?php echo $egresa['papellido']; ?></td>
                                <td style="text-align:center;" ><?php echo $egresa['fecha_egreso']; ?></td>
                                <td style="text-align:center;" ><?php echo $egresa['curso']; ?></td>
                                <td style="text-align:center;" ><?php echo $egresa['seccion']; ?></td>
                                <td style="text-align:center;" ><?php echo $egresa['observacion']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>