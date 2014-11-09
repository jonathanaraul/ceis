<div class="tab-pane box active" id="edit" style="padding: 20px">
    <div class="box-content">
        <?php foreach ($edit_data as $row): ?>


            <div class="pull-left">
			<span style="font-size:20px;font-weight:100;">
				<?= get_phrase('pagar_a'); ?>
            </span>
                <br/>
                <?= "CEIS"; ?>
                <br/>
                <?= $this->db->get_where('settings', array('type' => 'address'))->row()->description; ?>
            </div>
            <div class="pull-right">
			<span style="font-size:20px;font-weight:100;">
				<?= get_phrase('bill_to'); ?>
            </span>
                <br/>
                <?= $this->crud_model->get_empresas_name($row['empresa']);?>
                <br/>
                <?= get_phrase('curso'); ?> :
                <?php
                 $curso= $this->db->get_where('hs_cursos', array('id' => $row['curso']))->result_array();
                 echo $this->crud_model->get_hs_cursos_nombre($curso[0]['curso']);
                ?>
                <br/>
                <?= get_phrase('seccion'); ?> :
                <?=
                 $curso[0]['seccion'];
                ?>
            </div>
            <div style="clear:both;"></div>
            <hr/>
            <table width="100%">
                <tr style="background-color:#7087A3; color:#fff; padding:5px;">
                    <td style="padding:5px;"><?= get_phrase('descripción'); ?></td>
                    <td width="30%" style="padding:5px;">
                        <div class="pull-right">
                            <?= get_phrase('monto'); ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php echo $row['descripcion']; ?>
                    </td>
                    <td width="30%" style="padding:5px;">
                        <div class="pull-right">
						<span style="font-size:20px;font-weight:100;">
							<?php echo $row['monto']; ?>
                        </span>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td width="30%" style="padding:5px;">
                        <div class="pull-right">
                            <hr/>
                            <?php echo get_phrase('status'); ?> : <?= $this->crud_model->get_hs_facturacion_estado($row['estado']); ?>
                            <br/>
                            <?php echo get_phrase('invoice_id'); ?> : <?php echo "Emp-Fac-". $row['id']; ?>
                            <br/>
                            <?php echo get_phrase('date'); ?> : <?php $f= date_create($row['fecha']);
                                                                      $date= date_format($f, 'd/m/Y');
                                                                      echo $date; 
                                ?>
                        </div>
                    </td>
                </tr>
            </table>
            <br/>
            <br/>


        <?php endforeach; ?>
    </div>
</div>