<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="col-lg-10">
                <div class="page-header">
                    <h1><?php echo lang('login_heading'); ?></h1>
                </div>
                <div class="bs-docs-section">
                    <div class="messages">
                        <?php
                        if (isset($message)) {
                            $message = preg_replace("/<p>/", "", $message);
                            $message = preg_replace("/<\/p>/", "<br>", $message);
                            if (!empty($message)) {
                                echo '<div class="alert ' . $success. '">';
                                echo $message;
                                echo '</div>';
                            }
                        }
                        ?>
                    </div>

                    <?php echo form_open("ipphone/login"); ?>
                    <fieldset>
                        <div class="form-group">
                            <label for="Email" class="col-lg-1 control-label">Email</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-small"  name="identity">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label for="Password" class="col-lg-1 control-label">Password</label>
                            <div class="col-lg-3">
                                <input type="password" class="form-control input-small"  name="password">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-3">
                                <label class="control-label">Remember Me: &nbsp;</label><input type="checkbox" name="remember" value="1" >
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-1">
                                <input type="submit" name="Submit" value="Submit" >
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </fieldset>
                    <?php echo form_close(); ?>

                    <p><a href="forgot_password"><?php echo lang('login_forgot_password'); ?></a></p>
                </div>
            </div>
        </div>
    </div>
</div>