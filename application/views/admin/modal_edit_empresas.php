<div class="tab-pane box active" id="edit" style="padding: 5px">

    <div class="box-content">

        <?php foreach($edit_data as $row):?>

        <?php echo form_open('admin/empresas/do_update/'.$row['empresas_id'] , array('empresa' => 'form-horizontal validatable','target'=>'_top'));?>

            <div class="padded">

                <div class="control-group">

                    <label class="control-label"><?php echo get_phrase('nit_empresas');?></label>

                    <div class="controls">

                        <input type="text" class="validate[required]" name="nit_empresas" value="<?php echo $row['nit_empresas'];?>"/>

                    </div>

                </div>

                <div class="control-group">

                    <label class="control-label"><?php echo get_phrase('nombre_empresas');?></label>

                    <div class="controls">

                        <input type="text" class="" name="nombre_empresas" value="<?php echo $row['nombre_empresas'];?>"/>

                    </div>

                </div>

                  <div class="control-group">

                    <label class="control-label"><?php echo get_phrase('contacto_empresa');?></label>

                    <div class="controls">

                        <input type="text" class="" name="contacto_empresa" value="<?php echo $row['contacto_empresa'];?>"/>

                    </div>

                </div>

              



            </div>

            <div class="form-actions">

                <button type="submit" class="btn btn-gray"><?php echo get_phrase('edit_empresas');?></button>

            </div>

        </form>

        <?php endforeach;?>

    </div>

</div>