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
<!--main content -->
<div class="row">
    <div class="col-lg-12">
        <!--left navs -->
        <div class="col-lg-2">
            <ul class="nav nav-pills nav-stacked left-nav">
                <li><a href="<?php echo base_url() . 'index.php?/ipphone/manage_account' ?>">Manage Account</a></li>
                <li class="active"><a href="<?php echo base_url() . 'index.php?/ipphone' ?>"><strong>Manage Directory</strong></a></li>
                <li><a id="add_entry" href="#modal_form_add" >Create a New Entry</a></li>
                <li><a class="upload_add" href="#modal_form_add_upload" >Create Entries by Uploading File</a></li>
                <li><a class="get_xml_url" href="#modal_url">Get Directory Link</a></li>
            </ul>          
        </div><!--end of left navs-->
        <!--right col -->
        <div class="col-lg-9 right-content-col">
            <!--content head-->
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
            <div class="page-header">
                <h3>Directory Title: <?php echo $company['title']; ?></h3>
                <h4>Prompt: <?php echo $company['prompt']; ?></h4>
                <div class="clearfix"></div>
            </div><!--end of content head-->
            <!--content : table or other information-->
            <div class="bs-docs-section ">
                <?php if ($entries === false): ?>
                    <div class="alert alert-danger">Sorry, there is no entry for your company, please provide some by clicking 'Create a New Entry' button.</div>
                <?php else: ?>
                    <table class="table table-hover table-condensed">
                        <thead>
                            <tr class="active">
                                <th>#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Telephone</th>
                                <th>Action </th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($entries as $row):
                                ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td class="entry_first_name"><?php echo $row['first_name']; ?></td>
                                    <td class="entry_last_name"><?php echo $row['last_name']; ?></td>
                                    <td class="entry_telephone"><?php echo $row['telephone']; ?></td>
                                    <td><a href="#modal_form_edit" class="edit_entry_link">Edit</a></td>
                                    <td><a class="text-danger" href="<?php echo base_url() . "index.php?/ipphone/delete_entry/" . $row['id']; ?>" class="delete_item" >Delete</a></td>
                                </tr>
                                <?php
                                $i++;
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
            <!--end of content -->
        </div><!--end of right col -->
    </div>
</div>
<div id="footer"></div>
<!--end of main content -->
<!--pop up dialog for adding new entry-->
<div class="modal fade" id="modal_form_add">
    <div id="dialog_form" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><br>
                <div class="alert alert-info">This form is used for adding new entry</div>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url() . 'index.php?/ipphone/add_entry'; ?>" method="post" class="form-horizontal" id="add_entry_form">
                    <fieldset>
                        <div class="form-group">
                            <label for="addFirstName" class="col-lg-3 control-label">First Name</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control input-small"  name="first_name">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label for="addLastName" class="col-lg-3 control-label">Last Name</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control input-small"  name="last_name">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label for="addTelephone" class="col-lg-3 control-label">Telephone</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control input-small" name="telephone">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </fieldset>
                </form>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-primary btn-small submit-form-btn" >Add</a>
                <a href="#" class="btn btn-small btn-default close-form-btn">Close</a>
            </div>
        </div>
    </div>
</div>

<!--pop up dialog for adding new entry by uploading csv files-->
<div class="modal fade" id="modal_form_add_upload">
    <div id="dialog_form" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><br>
                <div class="alert alert-info">This form is used for adding new entry by uploading .csv file</div>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url() . 'index.php?/ipphone/upload_entry'; ?>" method="post" class="form-horizontal" id="upload_add_asset_form" enctype="multipart/form-data">
                    <fieldset>
                        <div class="form-group">
                            <label for="addModel" class="col-lg-3 control-label">File</label>
                            <div class="col-lg-9">
                                <input type="file" id="asset_file" name="entry_file">
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

<!--pop up dialog for edit and update entry-->
<div class="modal fade" id="modal_form_edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><br>
                <div class="alert alert-info">This form is used for editing and updating entries</div>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url() . 'index.php?/ipphone/update_entry'; ?>" method="post" class="form-horizontal" id="edit_entry_form">
                    <fieldset>
                        <div class="form-group">
                            <label for="firstname" class="col-lg-3 control-label">First Name</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control input-small"  name="first_name">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label for="lastname" class="col-lg-3 control-label">Last Name</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control input-small"  name="last_name">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label for="telephone" class="col-lg-3 control-label">Telephone</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control input-small" name="telephone">
                            </div>
                            <div class="clearfix"></div>
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

<!-- get directory link-->
<div class="modal fade" id="modal_url">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><br>
                <div class="alert alert-info">Copy this url and paste it into your asset 'XML Directory Service URL' field </div>
            </div>
            <div class="modal-body">
                <input type="text" class="form-control input-small" name="url" value="<?php echo base_url().'index.php?/ipphone/xml_directory/'. $company['xml_key']?>">
                <input type="hidden" name="base" value="<?php echo base_url(); ?>">
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-small btn-default close-form-btn">Close</a>
            </div>
        </div>
    </div>
</div>