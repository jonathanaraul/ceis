<div class="tab-pane box active" id="edit" style="padding: 5px">

<div class="box-content">

<?php foreach ($edit_data as $row): ?>

    <?php echo form_open('admin/student/' . $class_id . '/do_update/' . $row['student_id'], array('class' => 'form-horizontal validatable', 'target' => '_top', 'enctype' => 'multipart/form-data')); ?>

    <div class="padded">

    <div class="control-group">

        <label class="control-label"></label>

        <div class="controls" style="width:210px;">

            <div class="avatar">

                <img id="blah" class="avatar-large"
                     src="<?php echo $this->crud_model->get_image_url('student', $row['student_id']); ?>" height="100" width="100"/>

            </div>

        </div>

    </div>
    <div class="control-group">

        <label class="control-label"><?php echo get_phrase('class'); ?></label>

        <div class="controls">

            <select name="class_id" class="uniform" style="width:100%;">

                <?php

                $classes = $this->db->get('class')->result_array();

                foreach ($classes as $row2):

                    ?>

                    <option value="<?php echo $row2['class_id']; ?>"

                        <?php if ($row['class_id'] == $row2['class_id']) echo 'selected'; ?>>

                        <?php echo $row2['name']; ?></option>

                <?php

                endforeach;

                ?>

            </select>

        </div>

    </div>

    <div class="control-group">

        <label class="control-label"><?php echo get_phrase('photo'); ?></label>

        <div class="controls" style="width:210px;">

            <input type="file" class="" name="userfile" id="imgInp"/>

        </div>

    </div>

    <div class="control-group">

        <label class="control-label"><?php echo get_phrase('tipo_de_documento'); ?></label>

        <div class="controls">

            <select name="documento" class="uniform" style="width:100%;">

                <option
                    value="CC" <?php if ($row['documento'] == 'CC') echo 'selected'; ?>><?php echo get_phrase('CEDULA_DE_CIUDADANIA'); ?></option>

                <option
                    value="CE" <?php if ($row['documento'] == 'CE') echo 'selected'; ?>><?php echo get_phrase('CEDULA_DE_EXTRANJERIA'); ?></option>
                <option
                    value="VISA" <?php if ($row['documento'] == 'VISA') echo 'selected'; ?>><?php echo get_phrase('VISA'); ?></option>


            </select>

        </div>

    </div>
    <div class="control-group">

        <label class="control-label"><?php echo get_phrase('numero_de_documento'); ?></label>

        <div class="controls">

            <input type="text" class="validate[required]" name="ndocumento" value="<?php echo $row['ndocumento']; ?>"/>

        </div>

    </div>

    <div class="control-group">

        <label class="control-label"><?php echo get_phrase('lugar_de_expedicion'); ?></label>

        <div class="controls">

            <input type="text" class="validate[required]" name="lexpedicion"
                   value="<?php echo $row['lexpedicion']; ?>"/>

        </div>

    </div>
    <div class="control-group">

        <label class="control-label"><?php echo get_phrase('fecha_de_expedicion'); ?></label>

        <div class="controls">

            <input type="text" class="datepicker fill-up" name="fchaexp" value="<?php echo $row['fchaexp']; ?>"/>

        </div>

    </div>
    <div class="control-group">

        <label class="control-label"><?php echo get_phrase('name'); ?></label>

        <div class="controls">

            <input type="text" class="validate[required]" name="name" value="<?php echo $row['name']; ?>"/>

        </div>

    </div>
    <div class="control-group">

        <label class="control-label"><?php echo get_phrase('segundo_nombre'); ?></label>

        <div class="controls">

            <input type="text" class="validate[required]" name="snombre" value="<?php echo $row['snombre']; ?>"/>

        </div>

    </div>
    <div class="control-group">

        <label class="control-label"><?php echo get_phrase('primer_apellido'); ?></label>

        <div class="controls">

            <input type="text" class="validate[required]" name="papellido" value="<?php echo $row['papellido']; ?>"/>

        </div>

    </div>
    <div class="control-group">

        <label class="control-label"><?php echo get_phrase('segundo_apellido'); ?></label>

        <div class="controls">

            <input type="text" class="validate[required]" name="sapellido" value="<?php echo $row['sapellido']; ?>"/>

        </div>

    </div>

    <div class="control-group">

        <label class="control-label"><?php echo get_phrase('birthday'); ?></label>

        <div class="controls">

            <input type="text" class="datepicker fill-up" name="birthday" value="<?php echo $row['birthday']; ?>"/>

        </div>

    </div>

    <div class="control-group">

        <label class="control-label"><?php echo get_phrase('sex'); ?></label>

        <div class="controls">

            <select name="sex" class="uniform" style="width:100%;">

                <option
                    value="male" <?php if ($row['sex'] == 'male') echo 'selected'; ?>><?php echo get_phrase('male'); ?></option>

                <option
                    value="female" <?php if ($row['sex'] == 'female') echo 'selected'; ?>><?php echo get_phrase('female'); ?></option>

            </select>

        </div>

    </div>


    <div class="control-group">

        <label class="control-label"><?php echo get_phrase('estado_civil'); ?></label>

        <div class="controls">

            <select name="estado_civil" class="uniform" style="width:100%;">

                <option
                    value="Soltero" <?php if ($row['estado_civil'] == 'Soltero') echo 'selected'; ?>><?php echo get_phrase('Soltero'); ?></option>

                <option
                    value="casado" <?php if ($row['estado_civil'] == 'casado') echo 'selected'; ?>><?php echo get_phrase('casado'); ?></option>
                <option
                    value="Separado" <?php if ($row['estado_civil'] == 'Separado') echo 'selected'; ?>><?php echo get_phrase('Separado'); ?></option>
                <option
                    value="Union_Libre" <?php if ($row['estado_civil'] == 'Union_Libre') echo 'selected'; ?>><?php echo get_phrase('Union_Libre'); ?></option>
                <option
                    value="Viudo" <?php if ($row['estado_civil'] == 'Viudo') echo 'selected'; ?>><?php echo get_phrase('Viudo'); ?></option>


            </select>

        </div>

    </div>


    <div class="control-group">

        <label class="control-label"><?php echo get_phrase('address'); ?></label>

        <div class="controls">

            <input type="text" class="" name="address" value="<?php echo $row['address']; ?>"/>

        </div>

    </div>

    <div class="control-group">

        <label class="control-label"><?php echo get_phrase('phone'); ?></label>

        <div class="controls">

            <input type="text" class="" name="phone" value="<?php echo $row['phone']; ?>"/>

        </div>

    </div>

    <div class="control-group">

        <label class="control-label"><?php echo get_phrase('email'); ?></label>

        <div class="controls">

            <input type="text" class="" name="email" value="<?php echo $row['email']; ?>"/>

        </div>

    </div>


    </div>

    <div class="form-actions">

        <button type="submit" class="btn btn-gray"><?php echo get_phrase('Actualizar_estudiante'); ?></button>

    </div>

    </form>

<?php endforeach; ?>

</div>

</div>


<script>

    function readURL(input) {

        if (input.files && input.files[0]) {

            var reader = new FileReader();


            reader.onload = function (e) {

                $('#blah').attr('src', e.target.result);

            }


            reader.readAsDataURL(input.files[0]);

        }

    }


    $("#imgInp").change(function () {

        readURL(this);

    });

</script>