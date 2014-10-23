<div class="box">
    <div class="box-header">

        <!------CONTROL TABS START------->
        <ul class="nav nav-tabs nav-tabs-left">
            <li class="active">
                <a href="#list" data-toggle="tab"><i class="icon-align-justify"></i>
                    <?php echo get_phrase('rss_list'); ?>
                </a></li>
            <li>
                <a href="#add" data-toggle="tab"><i class="icon-plus"></i>
                    <?php echo get_phrase('add_rss'); ?>
                </a></li>
        </ul>
        <!------CONTROL TABS END------->

    </div>
    <div class="box-content padded">
        <div class="tab-content">
            <!----TABLE LISTING STARTS--->
            <div class="tab-pane box active" id="list">
                <table cellpadding="0" cellspacing="0" border="0" class="dTable responsive">
                    <thead>
                    <tr>
                        <th>
                            <div>#</div>
                        </th>
                        <th>
                            <div><?php echo get_phrase('name'); ?></div>
                        </th>
                        <th>
                            <div><?php echo get_phrase('url'); ?></div>
                        </th>
                        <th>
                            <div><?php echo get_phrase('date'); ?></div>
                        </th>
                        <th>
                            <div><?php echo get_phrase('options'); ?></div>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $count = 1;
                    foreach ($rss as $row): ?>
                        <tr>
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['url']; ?></td>

                            <td><?php echo $row['create_timestamp'] ?></td>
                            <td align="center">
                                <a data-toggle="modal" href="#modal-form"
                                   onclick="modal('edit_rss',<?php echo $row['id']; ?>)"
                                   class="btn btn-gray btn-small">
                                    <i class="icon-wrench"></i> <?php echo get_phrase('edit'); ?>
                                </a>
                                <a data-toggle="modal" href="#modal-delete"
                                   onclick="modal_delete('<?php echo base_url(); ?>index.php?admin/rss/delete/<?php echo $row['id']; ?>')"
                                   class="btn btn-red btn-small">
                                    <i class="icon-trash"></i> <?php echo get_phrase('delete'); ?>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!----TABLE LISTING ENDS--->


            <!----CREATION FORM STARTS---->
            <div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box-content">
                    <?php echo form_open('admin/rss/create', array('class' => 'form-horizontal validatable', 'target' => '_top')); ?>
                    <div class="padded">
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('name'); ?></label>

                            <div class="controls">
                                <input type="text" class="validate[required]" name="name"/>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label"><?php echo get_phrase('url'); ?></label>

                            <div class="controls">
                                <input type="text" class="validate[required]" name="url"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-blue"><?php echo get_phrase('add_rss'); ?></button>
                    </div>
                    </form>
                </div>
        </div>
        <!----CREATION FORM ENDS--->
        </div>
    </div>
</div>