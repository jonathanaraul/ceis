<div class="tab-pane box active" id="edit" style="padding: 5px">

    <div class="box-content">

        <?php foreach ($edit_data as $row): ?>

            <?php echo form_open('site/manage_role/do_update/'. $row['rol_id'], array('class' => 'form-horizontal validatable', 'target' => '_top')); ?>

            <div class="padded">

                <div class="control-group">

					<label class="control-label"><?php echo get_phrase('nombre_rol'); ?></label>

					<div class="controls">

						<input type="text" class="" name="rol" value="<?php echo $row['rol']; ?>">

					</div>

				</div>

            </div>

            <div class="form-actions">

                <button type="submit" class="btn btn-gray"><?php echo get_phrase('edtar_rol'); ?></button>

            </div>

          
		<?php echo form_close(); ?>
        <?php endforeach; ?>

    </div>

</div>
