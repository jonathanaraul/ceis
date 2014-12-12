<div class="tab-pane">
    <div class="box">
        <div class="box-content">
            <div id="dataTables">
                <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive ">
                    <div class="control-group">
                        <center>
                            <label class="control-label"><?= 'RESULTADO DE BUSQUEDA' ?></label>
                        </center>
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
                                <div><?php echo get_phrase('NRO'); ?></div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($res as $re): ?>
                            <tr>
                                <td style="text-align:center;"><?php echo $re['cedula']; ?></td>
                                <td style="text-align:center;"><?php echo $re['nombre']; ?></td>
                                <td style="text-align:center;" ><?php echo $re['papellido']; ?></td>
                                <td style="text-align:center;" ><?php echo $re['nro']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>