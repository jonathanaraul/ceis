<div class="box">

	<div class="box-header">

    

    	<!------CONTROL TABS START------->

		<ul class="nav nav-tabs nav-tabs-left">

			<li class="active">

            	<a href="#list" data-toggle="tab"><i class="icon-align-justify"></i> 

					<?php echo get_phrase('lista_de_empresas');?>

                    	</a></li>

			<li>

            	<a href="#add" data-toggle="tab"><i class="icon-plus"></i>

					<?php echo get_phrase('crear_empresas');?>

                    	</a></li>

		</ul>

    	<!------CONTROL TABS END------->

        

	</div>

	<div class="box-content padded">

		<div class="tab-content">

            <!----TABLE LISTING STARTS--->

            <div class="tab-pane box <?php if(!isset($edit_data))echo 'active';?>" id="list">

				

                <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">

                	<thead>

                		<tr>

                    		<th><div>#</div></th>

                    		<th><div><?php echo get_phrase('nit_empresas');?></div></th>

                    		<th><div><?php echo get_phrase('nombre_empresas');?></div></th>

                    		<th><div><?php echo get_phrase('contacto_empresa');?></div></th>
                            	<th><div><?php echo get_phrase('options');?></div></th>

         						</tr>

					</thead>

                    <tbody>

                    	<?php $count = 1;foreach($empresas as $row):?>

                        <tr>

                            <td><?php echo $count++;?></td>

							<td><?php echo $row['nit_empresas'];?></td>

							<td><?php echo $row['nombre_empresas'];?></td>
                            

							<td><?php echo $row['contacto_empresa'];?></td>
                            

							<td align="center">

                            	<a data-toggle="modal" href="#modal-form" onclick="modal('edit_empresas',<?php echo $row['empresas_id'];?>)" class="btn btn-gray btn-small">

                                		<i class="icon-wrench"></i> <?php echo get_phrase('edit');?>

                                </a>

                            	<a data-toggle="modal" href="#modal-delete" onclick="modal_delete('<?php echo base_url();?>index.php?admin/empresas/delete/<?php echo $row['empresas_id'];?>')" class="btn btn-red btn-small">

                                		<i class="icon-trash"></i> <?php echo get_phrase('delete');?>

                                </a>

        					</td>

                        </tr>

                        <?php endforeach;?>

                    </tbody>

                </table>

			</div>

            <!----TABLE LISTING ENDS--->

            

            

			<!----CREATION FORM STARTS---->

			<div class="tab-pane box" id="add" style="padding: 5px">

                <div class="box-content">

                	<?php echo form_open('admin/empresas/create' , array('class' => 'form-horizontal validatable','target'=>'_top'));?>

                        <div class="padded">

                            <div class="control-group">

                                <label class="control-label"><?php echo get_phrase('nit_empresa');?></label>

                                <div class="controls">

                                    <input type="text" class="validate[required]" name="nit_empresas"/>

                                </div>

                            </div>

                            <div class="control-group">

                                <label class="control-label"><?php echo get_phrase('nombre_empresas');?></label>

                                <div class="controls">

                                    <input type="text" class="" name="nombre_empresas"/>

                                </div>

                            </div>

                            <div class="control-group">

                                <label class="control-label"><?php echo get_phrase('telefono_empresa');?></label>

                                <div class="controls">

                                    <input type="text" class="" name="contacto_empresa"/>

                                </div>

                            </div>

                        </div>

                        <div class="form-actions">

                            <button type="submit" class="btn btn-gray"><?php echo get_phrase('crear_empresa');?></button>

                        </div>

                    </form>                

                </div>                

			</div>

			<!----CREATION FORM ENDS--->

            

		</div>

	</div>

</div>