<!-- top nav bar -->
<div class="navbar top-navbar">
    <a href="<?php echo base_url() . 'index.php/ipphone' ?>" class="navbar-brand top-navbar-brand"><?php echo $company[0]['name']; ?></a>
    <ul class="nav navbar-nav pull-right top-navbar-account ">
        <li id="fat-menu" class="dropdown">
            <a href="#" id="drop3" role="button" class="dropdown-toggle" data-toggle="dropdown"><?php echo $username; ?><b class="caret"></b></a>
            <ul class="dropdown-menu" role="menu" aria-labelledby="drop3">
                <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url() . 'index.php/ipphone/get_account'; ?>">Manage Account</a></li>
                <li role="presentation"><a role="menuitem" tabindex="-1" href="<?php echo base_url() . 'index.php/ipphone/logout'; ?>">Logout</a></li>
            </ul>
        </li>
    </ul>
</div><!-- end of top nav bar -->

<div class="row">
    <div class="col-lg-12">
        <!--left navs -->
        <div class="col-lg-2 left-nav-col">
            <ul class="nav nav-pills nav-stacked left-nav">
                <li ><a href="<?php echo base_url() . 'index.php/ipphone' ?>">Manage Directory</a></li>
                <li class="active"><a href="<?php echo base_url() . 'index.php/ipphone/get_asset' ?>"><strong>Manage Assets</strong></a></li>
                <li><a href="<?php echo base_url() . 'index.php/ipphone/get_account' ?>">Manage Account</a></li>
                <li><a id="add_asset" href="#modal_form_add" >Add Asset</a></li>
                <li><a id="upload_add_asset" href="#modal_form_add_upload" >Add Asset by Uploading File</a></li>
            </ul>          
        </div><!--end of left navs-->
        <!--right col -->
        <div class="col-lg-9">
            <div class="page-header">
                    <h3>Asset List of <?php echo $company[0]['name']; ?></h3>
            </div>
            <div class="bs-docs-section">
                <?php if (isset($message)){
                        $message = preg_replace("/<p>/", "", $message);
                        $message = preg_replace("/<\/p>/", "<br>", $message);
                        if(!empty($message)){
                          echo '<div class="alert '. $success . '">'; 
                          echo $message;
                          echo '</div>';
                        }
                }?>
                <?php if ($asset === false): ?>
                    <div class="alert"><strong>Sorry</strong>, there is no asset for your company, please provide some by clicking 'Add Asset' button or by uploading a .csv file.</div>
                <?php else: ?>
                    <table class="table table-hover table-condensed">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Model</th>
                                <th>Serial Number</th>
                                <th>MAC Address</th>
                                <th>Key</th>
                                <th> </th>
                                <th> </th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($asset as $row):
                                ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td class="asset_model"><?php echo $row['model']; ?></td>
                                    <td class="asset_serial_number"><?php echo $row['serial_number']; ?></td>
                                    <td class="asset_mac"><?php echo $row['mac']; ?></td>
                                    <td class="asset_xmlkey"><?php echo $row['xml_key']; ?></td>
                                    <td ><a href="#get_url" class="get_xml_url">Get Directory URL</a></td>
                                    <td><a href="#modal_form_edit" class="edit_asset_link">Edit</a></td>
                                    <td><a href="<?php echo base_url() . "index.php/ipphone/delete_asset/" . $row['id']; ?>" class="delete_item" >Delete</a></td>
                                </tr>
                                <?php
                                $i++;
                            endforeach;
                            ?>
                        </tbody>
                    </table>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>  
<div id="footer"></div>

<!--pop up dialog for adding new asset-->
<div class="modal fade" id="modal_form_add">
    <div id="dialog_form" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><br>
                <div class="alert alert-info">This form is used for adding new asset</div>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url() . 'index.php/ipphone/add_asset'; ?>" method="post" class="form-horizontal" id="add_asset_form">
                    <fieldset>
                        <div class="form-group">
                            <label for="addModel" class="col-lg-4 control-label">Model</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control input-small"  name="model">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label for="addSerialNumber" class="col-lg-4 control-label">Serial Number</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control input-small"  name="serial_number">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label for="addMac" class="col-lg-4 control-label">MAC Address</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control input-small" name="mac">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </fieldset>
                </form>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-primary btn-small submit-form-btn" >Add</a>
                <a href="#" class="btn btn-small close-form-btn" >Close</a>
            </div>
        </div>
    </div>
</div>

<!--pop up dialog for uploading file new asset-->
<div class="modal fade" id="modal_form_add_upload">
    <div id="dialog_form" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><br>
                <div class="alert alert-info">This form is used for adding new assets by uploading .csv file</div>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url() . 'index.php/ipphone/upload_asset'; ?>" method="post" class="form-horizontal" id="upload_add_asset_form" enctype="multipart/form-data">
                    <fieldset>
                        <div class="form-group">
                            <label for="addModel" class="col-lg-4 control-label">File</label>
                            <div class="col-lg-8">
                                <input type="file" id="asset_file" name="asset_file">
                                <p class="help-block">Choose the .csv file you want to upload then click 'Upload' button</p>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </fieldset>
                </form>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-primary btn-small submit-form-btn" >Upload</a>
                <a href="#" class="btn btn-small close-form-btn" >Close</a>
            </div>
        </div>
    </div>
</div>

<!--pop up dialog for edit and update asset-->
<div class="modal fade" id="modal_form_edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><br>
                <div class="alert alert-info">You can edit this asset information</div>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url() . 'index.php/ipphone/update_asset'; ?>" method="post" class="form-horizontal" id="edit_asset_form">
                    <fieldset>
                        <div class="form-group">
                            <label for="editModel" class="col-lg-4 control-label">Model</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control input-small"  name="model">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label for="editSerialNumber" class="col-lg-4 control-label">Serial Number</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control input-small"  name="serial_number">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label for="editMac" class="col-lg-4 control-label">MAC Address</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control input-small" name="mac">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </fieldset>
                </form>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-primary btn-small submit-form-btn" >Update</a>
                <a href="#" class="btn btn-small close-form-btn">Close</a>
            </div>
        </div>
    </div>
</div>

<!--pop up dialog for getting directory url-->
<div class="modal fade" id="modal_url">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><br>
                <div class="alert alert-info">Copy this url and paste it into your asset 'XML Directory Service URL' field </div>
            </div>
            <div class="modal-body">
                <input type="text" class="form-control input-small" name="url">
                <input type="hidden" name="base" value="<?php echo base_url(); ?>">
            </div>
        </div>
    </div>
</div>