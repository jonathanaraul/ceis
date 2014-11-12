<!--password-->
<div class="box">
    <div class="box-header">

        <!------CONTROL TABS START------->
        <ul class="nav nav-tabs nav-tabs-left">

            <li class="active">
                <a href="#list" data-toggle="tab"><i class="icon-lock"></i>
                    <?php echo get_phrase('change_password'); ?>
                </a></li>
        </ul>
        <!------CONTROL TABS END------->

    </div>
    <div class="box-content padded">
        <div class="tab-content">
            <!----EDITING FORM STARTS---->
            <div class="tab-pane box active" id="list" style="padding: 5px">
            
                   
                        <?php echo form_open('password/manage_password', array('class' => 'form-horizontal validatable', 'target' => '_top')); ?>
                        <div class="control-group">
                           <h6>
							Por seguridad,
							a continuación ingrese los datos que se han registrado a su nombre en nuestra base de datos para los campos
                            de Email y Número Telefónico. 
                           </h6>

                        </div>
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('email'); ?></label>

                            <div class="controls">
                                <input type="text" class="" name="email" value="" required>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('phone'); ?></label>

                            <div class="controls">
                                <input type="text" class="" name="phone" value=""required>
                            </div>
                        </div>
                        
                        <div class="control-group">
                            <h6>Ahora, establezca su nueva contraseña.</h6>

                        </div>
                        
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('new_password'); ?></label>

                            <div class="controls">
                                <input type="password" class="" name="new_password" value=""required>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('confirm_new_password'); ?></label>

                            <div class="controls">
                                <input type="password" class="" name="confirm_new_password" value="" required>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit"
                                    class="btn btn-gray"><?php echo get_phrase('update_password'); ?></button>
                        </div>
                    </form>
                   
                </div>
            </div>
            <!----EDITING FORM ENDS--->

        </div>
    </div>
</div>

