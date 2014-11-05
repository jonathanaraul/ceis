<div class="box">

    <div class="box-content padded">
        <div class="tab-content">
			
 
        <div class="action-nav-normal">
            <div class=" action-nav-button" style="width:300px;"><a href="#" title="Users"> <img
                        src="<?php echo base_url(); ?>template/images/icons/user.png"/>
                    <span>Total <?php echo count($users); ?> Usuarios</span> </a></div>
			</div>
		<br>
		<br>
				<div class="box">
					<div class="box-content">
						<div id="dataTables">
							<table cellpadding="0" cellspacing="0" border="0" class="dTable responsive"  style="width:120%">		
								<thead>
									<tr>
										<th>
											<div>ID</div>
										</th>
										<th width="80">
											<div><?php echo get_phrase('photo'); ?></div>
										</th>
										<th>
											<div><?php echo get_phrase('user_name'); ?></div>
										</th>
										<th>
											<div><?php echo get_phrase('email'); ?></div>
										</th>
										<th>
											<div><?php echo get_phrase('tel_contacto'); ?></div>
										</th>
										<th>
											<div><?php echo get_phrase('options'); ?></div>
										</th>
									</tr>
								</thead>
								<tbody>
									<?php $count = 1;
									foreach ($users as $row): ?>
										<tr>
											<td><?php echo $count++; ?></td>
											<td>
												<div class="avatar"><img
														src="<?php echo $this->crud_model->get_image_url('user', $row['user_id']); ?>"
														class="avatar-medium"/></div>
											</td>
											<td><?php echo $row['name']; ?> <?php echo $row['snombre']; ?> <?php echo $row['papellido']; ?> <?php echo $row['sapellido']; ?></td>
											<td><?php echo $row['email']; ?></td>
											<td><?php echo $row['phone']; ?></td>
											<td align="center">
												
												<a data-toggle="modal" href="#modal-form" onclick="modal('user_profile',<?php echo $row['user_id']; ?>)"
													class="btn btn-default btn-small"> 
													<i class="icon-user"></i> <?php echo get_phrase('profile'); ?> 
												</a> 
												<a data-toggle="modal" href="#modal-form"onclick="modal('edit_user',<?php echo $row['user_id']; ?>)"
													class="btn btn-gray btn-small"> 
													<i class="icon-wrench"></i> <?php echo get_phrase('edit'); ?> 
												</a> 
												<a data-toggle="modal" href="#modal-delete" onclick="modal_delete('<?php echo base_url(); ?>index.php?admin/users/delete/<?php echo $row['user_id']; ?>')" class="btn btn-red btn-small"> 
													<i class="icon-trash"></i> <?php echo get_phrase('delete'); ?> 
												</a>
											</td>
										</tr>
									<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>
        <!----CREATION FORM ENDS ROLE--->
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
