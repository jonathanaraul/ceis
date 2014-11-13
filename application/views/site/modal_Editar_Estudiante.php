<div class="tab-pane box active" id="edit" style="padding: 5px">

    <div class="box-content">

        <?php foreach ($edit_data as $row): ?>

            <?php echo form_open('site/estudiantes/do_update/'. $row['id'], array('class' => 'form-horizontal validatable', 'target' => '_top', 'enctype' => 'multipart/form-data')); ?>

                <div class="padded">
                    <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('numero_de_documento'); ?></label>

                            <div class="controls">
                                <input type="text" class="uniform" required name="documento" value="<?= $row['documento'] ?>" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('primer_nombre'); ?></label>

                            <div class="controls">
                                <input type="text" class="uniform" required name="nombre" value="<?= $row['nombre'] ?>"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('segundo_nombre'); ?></label>

                            <div class="controls">
                                <input type="text" name="snombre" value="<?= $row['snombre'] ?>"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('primer_apellido'); ?></label>

                            <div class="controls">
                                <input type="text" class="uniform" required name="papellido" value="<?=$row['papellido'] ?>"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('segundo_apellido'); ?></label>

                            <div class="controls">
                                <input type="text" class="uniform" name="sapellido" value="<?= $row['sapellido'] ?>"/>
                            </div>
                        </div>


                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('tipo_de_ingreso'); ?></label>

                            <div class="controls">
                                <select name="tipodeingreso" class="uniform" style="width:100%;" onchange="mostrarEmpresas(this.value);">
                                    <option value="">-- Seleccione Uno --</option>
                                    <option value=""><?php echo get_phrase('particular'); ?></option>
                                    <option value="empresa"><?php echo get_phrase('empresa'); ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group" id="divTipoingreso" style="display: none;">
                            <label class="control-label"><?php echo get_phrase('empresa'); ?></label>

                            <div class="controls">
                                <select name="empresa" class="uniform" style="width:100%;">
                                    <option value="" selected>-- Seleccione Uno --</option>
                                    <?php
                                    $empresas = $this->db->get('hs_empresas')->result_array();
                                    foreach ($empresas as $row2):
                                        ?>
                                        <option value="<?php echo $row2['nombre']; ?>"> <?php echo $row2['nombre']; ?> </option>
                                    <?php
                                    endforeach;
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('fecha_de_nacimiento'); ?></label>

                            <div class="controls">
                                <input type="text" class="datepicker fill-up" required name="f_nacimiento" value="<?= date('m/d/Y', $row['f_nacimiento']); ?>"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('sex'); ?></label>

                            <div class="controls">
                                <select name="sexo" class="uniform" required style="width:100%;">
                                    <option value="0">-- Seleccione Uno --</option>
                                    <option <?php if($row['sexo'] == "male"){ echo "selected";} ?> value="male"><?php echo get_phrase('male'); ?></option>
                                    <option <?php if($row['sexo'] == "female"){ echo "selected";} ?> value="female"><?php echo get_phrase('female'); ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('departamento'); ?></label>

                            <div class="controls">
                                <input type="text" class="uniform" name="departamento" required value="<?= $row['departamento']?>"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('municipio'); ?></label>

                            <div class="controls">
                                <input type="text" class="uniform" name="municipio" required value="<?= $row['municipio']?>"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('Direccion de residencia'); ?></label>

                            <div class="controls">
                                <input type="text" class="uniform" name="direccion" required value="<?= $row['direccion']?>"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('telefono_residencia'); ?></label>

                            <div class="controls">
                                <input type="text" class="uniform" name="telefono" required value="<?=$row['telefono']?>"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('email'); ?></label>

                            <div class="controls">
                                <input type="text" class="uniform" name="email" required value="<?= $row['email']?>"/>
                            </div>
                        </div>
                </div>

                <div class="form-actions">

                    <button type="submit" class="btn btn-gray"><?php echo get_phrase('Actualizar_datos'); ?></button>

                </div>

            </form>

        <?php endforeach; ?>

    </div>

</div>


<script>

    function mostrarEmpresas(valor) {
        if (valor == 'empresa') {
            $('#divTipoingreso').css('display', 'block');
        }else{
            $('#divTipoingreso').css('display', 'none');
        }
    }

</script>
