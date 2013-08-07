<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="page-header">
                <h1><?php echo lang('create_group_heading'); ?></h1>
            </div>
            <div class="bs-docs-section">
                <p><?php echo lang('create_group_subheading'); ?></p>

                <div id="infoMessage"><?php echo $message; ?></div>

                <?php echo form_open("ipphone/create_group"); ?>

                <p>
                    <?php echo lang('create_group_name_label', 'group_name'); ?> <br />
                    <?php echo form_input($group_name); ?>
                </p>

                <p>
                    <?php echo lang('create_group_desc_label', 'description'); ?> <br />
                    <?php echo form_input($description); ?>
                </p>

                <p><?php echo form_submit('submit', lang('create_group_submit_btn')); ?></p>

                <?php echo form_close(); ?>
            </div>
            <div class="panel-footer">
                <p><?php echo anchor('ipphone/create_user', lang('index_create_user_link')) ?> | Create a new group | <?php echo anchor('ipphone/logout', 'Logout') ?></p>
            </div>
        </div>
    </div>
</div>