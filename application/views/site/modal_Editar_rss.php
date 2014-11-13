<div class="tab-pane box" id="add" style="padding: 5px">
    <div class="box-content">
        <?php foreach ($edit_data as $row): ?>
            <?php echo form_open('site/rss/create', array('class' => 'form-horizontal validatable', 'target' => '_top')); ?>
            <div class="padded">
                <div class="control-group">
                    <label class="control-label"><?php echo get_phrase('name'); ?></label>

                    <div class="controls">
                        <input type="text" class="uniform" required name="name" value="<?= $row['name'] ?>" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label"><?php echo get_phrase('url'); ?></label>

                    <div class="controls">
                        <input type="text" class="uniform" required name="url" value="<?= $row['url'] ?>"/>
                    </div>
                </div>
            </div>
            <div class="form-actions">
                <button type="submit" class="btn btn-blue"><?php echo get_phrase('editar_rss'); ?></button>
            </div>
            </form>
        <?php endforeach; ?>
    </div>
</div>
