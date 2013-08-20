<!-- top nav bar -->
<div class="navbar top-navbar">
    <div class="top-navbar-brand"><p class="name"><?php echo $company['name']; ?></p></div>
    <ul class="nav navbar-nav pull-right top-navbar-account ">
        <li id="fat-menu" class="dropdown">
            <a href="#" id="drop3" role="button" class="dropdown-toggle" data-toggle="dropdown"><?php echo ucwords($user->username); ?><b class="caret"></b></a>
            <ul class="dropdown-menu" role="menu" aria-labelledby="drop3">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url() . 'index.php?/ipphone/manage_account'; ?>">Manage Account</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url() . 'index.php?/ipphone/logout'; ?>">Logout</a></li>
            </ul>
        </li>
    </ul>
</div><!-- end of top nav bar -->

<div class="row">
    <div class="col-lg-12">
        <!--left navs -->
        <div class="col-lg-2">
            <ul class="nav nav-pills nav-stacked left-nav">
                <li class="active"><a href="<?php echo base_url() . 'index.php?/ipphone/manage_account'; ?>"><strong>Manage Account</strong></a></li>
                <li ><a href="<?php echo base_url() . 'index.php?/ipphone' ?>">Manage Directory</a></li>
                <!--<li ><a href="<?php echo base_url() . 'index.php?/ipphone/get_asset' ?>">Manage Assets</a></li>-->
            </ul>          
        </div><!--end of left navs-->
        <!--right col -->
        <div class="col-lg-9 right-content-col">
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
                <form class="form-horizontal" role="form" action="<?php echo base_url() . 'index.php?/ipphone/change_company_info'; ?>" method="post">
                    <div class="form-group">
                        <label for="inputCompany" class="col-lg-2 control-label">Company Name</label>
                        <div class="col-lg-3">
                            <input type="text" class="form-control" value="<?php echo $company['name']; ?>" name="name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputDirectoryTitle" class="col-lg-2 control-label">Directory Title</label>
                        <div class="col-lg-3">
                            <input type="text" class="form-control" value="<?php echo $company['title'] ?>" name="title">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPrompt" class="col-lg-2 control-label">Prompt</label>
                        <div class="col-lg-3">
                            <input type="text" class="form-control" value="<?php if ($company['prompt'] != '') {echo $company['prompt'];} ?>" name="prompt">
                        </div>
                        <div class="col-lg-3">
                            <button type="submit" class="btn btn-primary">Change Company Information</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="bs-docs-section">
                <form class="form-horizontal" role="form" action="<?php echo base_url() . 'index.php?/ipphone/change_user_info'; ?>" method="post">
                    <div class="form-group">
                        <label for="inputFirstName" class="col-lg-2 control-label">First Name</label>
                        <div class="col-lg-3">
                            <input type="text" class="form-control" value="<?php echo $user->first_name; ?>" name="first_name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputLastName" class="col-lg-2 control-label">Last Name</label>
                        <div class="col-lg-3">
                            <input type="text" class="form-control" value="<?php echo $user->last_name; ?>" name="last_name">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPhone" class="col-lg-2 control-label">Phone</label>
                        <div class="col-lg-3">
                            <input type="text" class="form-control" value="<?php echo $user->phone; ?>" name="phone">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail" class="col-lg-2 control-label">Email</label>
                        <div class="col-lg-3">
                            <input type="text" class="form-control" value="<?php echo $user->email; ?>" name="email" disabled>
                        </div>
                        <div class="col-lg-3">
                            <button type="submit" class="btn btn-primary">Change Account Information</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="bs-docs-section">
                <form class="form-horizontal" role="form" action="<?php echo base_url() . 'index.php?/ipphone/change_password'; ?>" method="post">
                    <div class="form-group">
                        <label for="OldPassword" class="col-lg-2 control-label">Old Password</label>
                        <div class="col-lg-3">
                            <input type="password" class="form-control" value="" name="old">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="NewPassword" class="col-lg-2 control-label">New Password</label>
                        <div class="col-lg-3">
                            <input type="password" class="form-control" value="" name="new">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="ConfirmPassword" class="col-lg-2 control-label">Confirm Password</label>
                        <div class="col-lg-3">
                            <input type="password" class="form-control" value="" name="new_confirm" >
                        </div>
                        <div class="col-lg-3">
                            <button type="submit" class="btn btn-primary">Change Password</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>  
<div id="footer"></div>