<div class="tab-pane box active" id="edit" style="padding: 5px">

    <div class="box-content">

        <?php foreach($edit_data as $row):?>

        <?php echo form_open('admin/classes/do_update/'.$row['class_id'] , array('class' => 'form-horizontal validatable','target'=>'_top'));?>

            <div class="padded">

                <div class="control-group">

                    <label class="control-label"><?php echo get_phrase('name');?></label>

                    <div class="controls">

                        <input type="text" class="validate[required]" name="name" value="<?php echo $row['name'];?>"/>

                    </div>

                </div>

              <div class="control-group">

                                <label class="control-label"><?php echo get_phrase('fecha_inicio');?></label>

                                <div class="controls">

                                    <input type="text" class="datepicker fill-up" name="fcha_inicio" value="<?php echo $row['fcha_inicio'];?>"/>

                                </div>

                            </div>
                            <div class="control-group">

                                <label class="control-label"><?php echo get_phrase('fecha_fin');?></label>

                                <div class="controls">

                                    <input type="text" class="datepicker fill-up" name="fcha_fin" value="<?php echo $row['fcha_fin'];?>"/>

                                </div>

                            </div>
                 <div class="control-group">

                    <label class="control-label"><?php echo get_phrase('starting_time');?></label>

                    <div class="controls">

                        <?php 

                            if($row['hora_inicio'] < 13)

                            {

                                $hora_inicio		=	$row['hora_inicio'];

                                $starting_ampm	=	1;

                            }

                            else if($row['hora_inicio'] > 12)

                            {

                                $hora_inicio		=	$row['hora_inicio'] - 12;

                                $starting_ampm	=	2;

                            }

                            

                        ?>

                        <select name="hora_inicio" class="uniform" style="width:100%;">

                            <?php for($i = 0; $i <= 12 ; $i++):?>

                                <option value="<?php echo $i;?>" <?php if($i ==$hora_inicio)echo 'selected="selected"';?>>

                                    <?php echo $i;?></option>

                            <?php endfor;?>

                        </select>

                        <select name="starting_ampm" class="uniform" style="width:100%">

                            <option value="1" <?php if($starting_ampm	==	'1')echo 'selected="selected"';?>>am</option>

                            <option value="2" <?php if($starting_ampm	==	'2')echo 'selected="selected"';?>>pm</option>

                        </select>

                    </div>

                </div>

                <div class="control-group">

                    <label class="control-label"><?php echo get_phrase('ending_time');?></label>

                    <div class="controls">

                        

                        

                        <?php 

                            if($row['hora_fin'] < 13)

                            {

                                $hora_fin		=	$row['hora_fin'];

                                $ending_ampm	=	1;

                            }

                            else if($row['hora_fin'] > 12)

                            {

                                $hora_fin		=	$row['hora_fin'] - 12;

                                $ending_ampm	=	2;

                            }

                            

                        ?>

                        <select name="hora_fin" class="uniform" style="width:100%;">

                            <?php for($i = 0; $i <= 12 ; $i++):?>

                                <option value="<?php echo $i;?>" <?php if($i ==$hora_fin)echo 'selected="selected"';?>>

                                    <?php echo $i;?></option>

                            <?php endfor;?>

                        </select>

                        <select name="ending_ampm" class="uniform" style="width:100%">

                            <option value="1" <?php if($ending_ampm	==	'1')echo 'selected="selected"';?>>am</option>

                            <option value="2" <?php if($ending_ampm	==	'2')echo 'selected="selected"';?>>pm</option>

                        </select>

                    </div>

                </div>


   <div class="control-group">

                    <label class="control-label"><?php echo get_phrase('cupo');?></label>

                    <div class="controls">

                        <input type="text" class="validate[required]" name="cupo" value="<?php echo $row['cupo'];?>"/>

                    </div>

                </div>



            </div>

            <div class="form-actions">

                <button type="submit" class="btn btn-gray"><?php echo get_phrase('edit_class');?></button>

            </div>

        </form>

        <?php endforeach;?>

    </div>

</div>