<!-- top nav bar -->
<div class="navbar top-navbar">
    <div class="top-navbar-brand"><p class="name"><?php echo $company['name']; ?></p></div>
    <ul class="nav navbar-nav pull-right top-navbar-account ">
        <li id="fat-menu" class="dropdown">
            <a href="#" id="drop3" role="button" class="dropdown-toggle" data-toggle="dropdown"><?php echo $username; ?><b class="caret"></b></a>
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
                <li><a href="<?php echo base_url() . 'index.php?/ipphone/manage_account' ?>">Manage Account</a></li>
                <li class="active"><a href="<?php echo base_url() . 'index.php?/ipphone' ?>"><strong>Manage Users</strong></a></li>
                <li><a id="add_user" href="#modal_form_add" >Create a New User</a></li>
                <li><a class="upload_add" href="#modal_form_add_upload" >Create New Users by Uploading File</a></li>
                <li><a href="<?php echo base_url() . 'index.php?/ipphone/logout'; ?>">Logout</a></li>
            </ul>          
        </div><!--end of left navs-->
        <div class="col-lg-9 right-content-col">
            <div class="messages">
                <?php
                if (isset($message)) {
                    $message = preg_replace("/<p>/", "", $message);
                    $message = preg_replace("/<\/p>/", "<br>", $message);
                    if (!empty($message)) {
                        echo '<div class="alert ';
                        echo isset($success)?$success:'alert-info';
                        echo '">';
                        echo $message;
                        echo '</div>';
                    }
                }
                ?>
            </div>
            <div class="page-header">
                <h1><?php echo lang('index_heading'); ?></h1>
                <p><?php echo lang('index_subheading'); ?></p>
            </div>
            <div class="bs-docs-section fix-height">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th><?php echo lang('index_fname_th'); ?>&nbsp;<a href="<?php
                                    if ($order === '' || ($order === 'asc' && $order_name === 'first_name')) {
                                        echo base_url() . 'index.php?/ipphone/index/'.$perpage.'/first_name/desc';
                                    } else {
                                        echo base_url() . 'index.php?/ipphone/index/'.$perpage.'/first_name/asc';
                                    }
                                    ?>"><img src="<?php
                                                           if ($order === '' || ($order === 'asc' && $order_name === 'first_name')) {
                                                               echo base_url() . 'img/up.png';
                                                           } else {
                                                               echo base_url() . 'img/down.png';
                                                           }
                                                           ?>"/></a></th>
                            <th><?php echo lang('index_lname_th'); ?>&nbsp;<a href="<?php
                                    if ($order === '' || ($order === 'asc' && $order_name === 'last_name')) {
                                        echo base_url() . 'index.php?/ipphone/index/'.$perpage.'/last_name/desc';
                                    } else {
                                        echo base_url() . 'index.php?/ipphone/index/'.$perpage.'/last_name/asc';
                                    }
                                    ?>"><img src="<?php
                                                           if ($order === '' || ($order === 'asc' && $order_name === 'last_name')) {
                                                               echo base_url() . 'img/up.png';
                                                           } else {
                                                               echo base_url() . 'img/down.png';
                                                           }
                                                           ?>"/></a></th>
                            <th><?php echo lang('index_email_th'); ?>&nbsp;<a href="<?php
                                    if ($order === '' || ($order === 'asc' && $order_name === 'email')) {
                                        echo base_url() . 'index.php?/ipphone/index/'.$perpage.'/email/desc';
                                    } else {
                                        echo base_url() . 'index.php?/ipphone/index/'.$perpage.'/email/asc';
                                    }
                                    ?>"><img src="<?php
                                                           if ($order === '' || ($order === 'asc' && $order_name === 'email')) {
                                                               echo base_url() . 'img/up.png';
                                                           } else {
                                                               echo base_url() . 'img/down.png';
                                                           }
                                                           ?>"/></a></th>
                            <th>Company&nbsp;<a href="<?php
                                    if ($order === '' || ($order === 'asc' && $order_name === 'company')) {
                                        echo base_url() . 'index.php?/ipphone/index/'.$perpage.'/company/desc';
                                    } else {
                                        echo base_url() . 'index.php?/ipphone/index/'.$perpage.'/company/asc';
                                    }
                                    ?>"><img src="<?php
                                                           if ($order === '' || ($order === 'asc' && $order_name === 'company')) {
                                                               echo base_url() . 'img/up.png';
                                                           } else {
                                                               echo base_url() . 'img/down.png';
                                                           }
                                                           ?>"/></a></th>
                            <th>Phone&nbsp;<a href="<?php
                                    if ($order === '' || ($order === 'asc' && $order_name === 'phone')) {
                                        echo base_url() . 'index.php?/ipphone/index/'.$perpage.'/phone/desc';
                                    } else {
                                        echo base_url() . 'index.php?/ipphone/index/'.$perpage.'/phone/asc';
                                    }
                                    ?>"><img src="<?php
                                                           if ($order === '' || ($order === 'asc' && $order_name === 'phone')) {
                                                               echo base_url() . 'img/up.png';
                                                           } else {
                                                               echo base_url() . 'img/down.png';
                                                           }
                                                           ?>"/></a></th>
                            <th><?php echo lang('index_groups_th'); ?></th>
                            <th><?php echo lang('index_status_th'); ?></th>
                            <th><?php echo lang('index_action_th'); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        foreach ($users as $user):
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td class="user_first_name"><?php echo $user->first_name; ?></td>
                                <td class="user_last_name"><?php echo $user->last_name; ?></td>
                                <td class="user_email"><?php echo $user->email; ?></td>
                                <td class="user_company"><?php echo $user->company_name; ?></td>
                                <td class="user_phone"><?php echo $user->phone; ?></td>
                                <td class="user_groups">
                                    <?php foreach ($user->groups as $group): ?>
                                        <?php echo $group->name; ?> &nbsp;
                                    <?php endforeach; ?>
                                </td>
                                <td>
                                    <?php if($user->active):?>
                                        <a class="activate text-success" href="<?php echo base_url()."index.php?/ipphone/deactivate/".$user->id; ?>">Active</a>
                                    <?php else: ?>
                                        <a class="deactivate text-danger" href="<?php echo base_url()."index.php?/ipphone/activate/".$user->id; ?>">Inactive</a>
                                    <?php endif;?>
                                </td>
                                <td><a href="#modal_form_edit" class="edit_user_link">Edit</a></td>
                                <td><a class='text-danger delete_item' href="<?php echo base_url().'index.php?/ipphone/delete_user/'. $user->id; ?>">Delete</a></td>
                            </tr>
                            <?php
                            $i++;
                        endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
            <div>
                <div class="pull-left">
                    <ul class="pagination ">
                        <li class="<?php if ($page == 1) echo 'active'; ?>"><a href="<?php echo current_url() . '/?page=' . ($page - 1); ?>">&laquo; prev</a></li>
                        <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                            <?php if ($i == $page): ?>
                                <li class="active"><a href=""><?php echo $i; ?></a></li>
                            <?php else: ?>
                                <li><a href="<?php echo current_url() . '/?page=' . $i; ?>"><?php echo $i; ?></a></li>
                            <?php endif; ?>
                        <?php endfor; ?>
                        <li class="<?php
                        if ($page == $total_pages) {
                            echo 'active';
                        }
                        ?>" ><a href="<?php echo current_url() . '/?page=' . ($page + 1); ?>">next &raquo;</a></li>
                    </ul>
                </div>
                <div class="pull-right">
                    <ul class="pagination ">
                        <li class="<?php if ($perpage == 15) echo 'active'; ?>"><a href="<?php echo base_url() . '/index.php?/ipphone/index/15'; ?>">15</a></li>
                        <li class="<?php if ($perpage == 30) echo 'active'; ?>"><a href="<?php echo base_url() . '/index.php?/ipphone/index/30'; ?>">30</a></li>
                        <li class="<?php if ($perpage == 50) echo 'active'; ?>"><a href="<?php echo base_url() . '/index.php?/ipphone/index/50'; ?>">50</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<!--pop up dialog for create new user-->
<div class="modal fade" id="modal_form_add">
    <div id="dialog_form" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><br>
                <div class="alert alert-info">This form is used for creating a new user</div>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url() . 'index.php?/ipphone/create_user'; ?>" method="post" class="form-horizontal" id="create_user_form">
                    <fieldset>
                        <div class="form-group">
                            <label for="firstname" class="col-lg-4 control-label">First Name</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control input-small"  name="first_name">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="col-lg-4 control-label">Last Name</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control input-small"  name="last_name">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-lg-4 control-label">Email</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control input-small"  name="email">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label for="telephone" class="col-lg-4 control-label">Phone</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control input-small" name="phone">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="company" class="col-lg-4 control-label">Company</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control input-small" name="company">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-lg-4 control-label">Password</label>
                            <div class="col-lg-6">
                                <input type="password" class="form-control input-small password" name="password">
                            </div>
                            <span class='col-lg-2 message'>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="passwordconfirm" class="col-lg-4 control-label">Confirm Password</label>
                            <div class="col-lg-6">
                                <input type="password" class="form-control input-small password_confirm" name="password_confirm">
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-primary btn-small submit-form-btn" >Create</a>
                <a href="#" class="btn btn-small btn-default close-form-btn">Close</a>
            </div>
        </div>
    </div>
</div>

<!--pop up dialog for create new users by uploading csv files-->
<div class="modal fade" id="modal_form_add_upload">
    <div id="dialog_form" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><br>
                <div class="alert alert-info">This form is used for create users by uploading .csv file</div>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url() . 'index.php?/ipphone/upload_users'; ?>" method="post" class="form-horizontal" id="create_users_upload" enctype="multipart/form-data">
                    <fieldset>
                        <div class="form-group">
                            <label for="file" class="col-lg-3 control-label">File</label>
                            <div class="col-lg-9">
                                <input type="file" id="asset_file" name="users_file">
                                <p class="help-block">Choose the .csv file you want to upload then click 'Upload' button</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </fieldset>
                </form>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-primary btn-small submit-form-btn" >Upload</a>
                <a href="#" class="btn btn-small btn-default close-form-btn" >Close</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal_form_edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><br>
                <div class="alert alert-info">This form is used for editing and updating user</div>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url() . 'index.php?/ipphone/edit_user'; ?>" method="post" class="form-horizontal" id="edit_user_form">
                    <fieldset>
                        <div class="form-group">
                            <label for="firstname" class="col-lg-4 control-label">First Name</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control input-small"  name="first_name">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="col-lg-4 control-label">Last Name</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control input-small"  name="last_name">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label for="telephone" class="col-lg-4 control-label">Phone</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control input-small" name="phone">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="company" class="col-lg-4 control-label">Company</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control input-small" name="company">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="company" class="col-lg-4 control-label">Groups</label>
                            <div class="col-lg-6">
                                <input type="checkbox" name="groups[]" value="1" id="admin">Admin&nbsp;
                                <input type="checkbox" name="groups[]" value="2" id="members">Members
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-lg-4 control-label">Password</label>
                            <div class="col-lg-6">
                                <input type="password" class="form-control input-small password" name="password">
                            </div>
                            <span class='col-lg-2 message'>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="passwordconfirm" class="col-lg-4 control-label">Confirm Password</label>
                            <div class="col-lg-6">
                                <input type="password" class="form-control input-small password_confirm" name="password_confirm">
                            </div>
                            </span>
                        </div>
                    </fieldset>
                </form>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-primary btn-small submit-form-btn" >Update</a>
                <a href="#" class="btn btn-small btn-default close-form-btn" >Close</a>
            </div>
        </div>
    </div>
</div>

