<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="page-header">
                <h1><?php echo lang('forgot_password_heading'); ?></h1>
                <p><?php echo sprintf(lang('forgot_password_subheading'), $identity_label); ?></p>
            </div>
            <div class="messages">
                <?php
                if (isset($message)) {
                    $message = preg_replace("/<p>/", "", $message);
                    $message = preg_replace("/<\/p>/", "<br>", $message);
                    if (!empty($message)) {
                        echo '<div class="alert ' . $success . '">';
                        echo $message;
                        echo '</div>';
                    }
                }
                ?>
            </div>
            <div class="bs-docs-section">
                <?php echo form_open("ipphone/forgot_password"); ?>

                <p>
                    <label for="email"><?php echo sprintf(lang('forgot_password_email_label'), $identity_label); ?></label> <br />
                    <?php echo form_input($email); ?>
                </p>

                <p><?php echo form_submit('submit', lang('forgot_password_submit_btn')); ?></p>

                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>