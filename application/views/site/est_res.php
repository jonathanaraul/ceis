<div class="tab-pane">
    <div class="box">
        <div class="box-content">
            <div id="dataTables">
                <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive ">
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
                            <th width="8%">
                                <div><?php echo get_phrase('NRO'); ?></div>
                            </th>                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($res_busquedas as $res_busqueda): ?>
                            <tr>
                                <td style="text-align:center;"><?php echo $res_busqueda['cedula']; ?></td>
                                <td style="text-align:center;"><?php echo $res_busqueda['nombre']; ?></td>
                                <td style="text-align:center;" ><?php echo $res_busqueda['papellido']; ?></td>
                                <td style="text-align:center;" ><?php if($res_busqueda['nro']=="No asignado"){echo "No Asignado";}else{echo $res_busqueda['nro'];}?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>