<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="page-header">
                <div class="col-lg-8">
                    <h2>Asset List of <?php echo $company[0]['name']; ?></h2>
                </div>
                <div class="col-lg-4">
                    <button type="button" class="btn btn-primary btn-small" id="add_asset">Add Asset</button>
                    <a class="btn btn-primary btn-small" href="<?php echo base_url().'index.php/ipphone'?>" >Manage Entry</a>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="bs-docs-section">
                <?php if (isset($message)): ?>
                    <p class="<?php echo $success; ?>">
                        <?php $message = preg_replace("/<p>/", "", $message); $message =  preg_replace("/<\/p>/", "<br>", $message); echo $message;?>
                    </p>
                <?php endif; ?>
                <?php if ($asset === false): ?>
                    <p class="text-danger">Sorry, there is no asset for your company, please provide some by clicking 'Add Asset' button.</p>
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
            <div class="panel-footer">
                <form action="<?php echo base_url() . 'index.php/ipphone/logout'; ?>">
                    <button type="submit" class="btn btn-primary btn-small">Logout</button>
                </form>
            </div>
        </div>
    </div>  
</div>

<!--pop up dialog for adding new asset-->
<div class="modal fade" id="modal_form_add">
    <div id="dialog_form" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><span class="label label-info">This form is used for adding new asset</span></h4>
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
                <a href="#" class="btn btn-primary btn-small" id="submit_asset_add_form" >Add</a>
                <a href="#" class="btn btn-small" id="close_asset_add_form">Close</a>
            </div>
        </div>
    </div>
</div>

<!--pop up dialog for edit and update asset-->
<div class="modal fade" id="modal_form_edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><span class="label label-info">This form is used for editing and updating entries</span></h4>
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
                <a href="#" class="btn btn-primary btn-small" id="submit_asset_edit_form" >Update</a>
                <a href="#" class="btn btn-small" id="close_asset_edit_form">Close</a>
            </div>
        </div>
    </div>
</div>

<!--pop up dialog for getting directory url-->
<div class="modal fade" id="modal_url">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><span class="label label-info">Copy this url and paste it into your asset 'XML Directory Service URL' field </span></h4>
            </div>
            <div class="modal-body">
                <input type="text" class="form-control input-small" name="url">
                <input type="hidden" name="base" value="<?php echo base_url(); ?>">
            </div>
        </div>
    </div>
</div>