<div class="tab-pane box active" id="edit" style="padding: 5px">

    <div class="box-content">

        <?php foreach ($edit_data as $row): ?>

            <?php echo form_open('site/empresas/do_update/' . $row['id'], array('class' => 'form-horizontal validatable', 'target' => '_top')); ?>

                <div class="padded">

                    <div class="control-group">

                        <label class="control-label"><?php echo get_phrase('nit'); ?></label>

                        <div class="controls">

                            <input type="text" class="uniform" name="nit" required value="<?php echo $row['nit']; ?>"/>

                        </div>

                    </div>

                    <div class="control-group">

                        <label class="control-label"><?php echo get_phrase('nombre'); ?></label>

                        <div class="controls">

                            <input type="text" class="uniform" name="nombre" required value="<?php echo $row['nombre']; ?>"/>

                        </div>

                    </div>

                    <div class="control-group">

                        <label class="control-label"><?php echo get_phrase('contacto'); ?></label>

                        <div class="controls">

                            <input type="text" class="uniform" name="contacto" required value="<?php echo $row['contacto']; ?>"/>

                        </div>

                    </div>


                </div>

                <div class="form-actions">

                    <button type="submit" class="btn btn-gray"><?php echo get_phrase('edit_empresas'); ?></button>

                </div>

            </form>

        <?php endforeach; ?>

    </div>

</div>
