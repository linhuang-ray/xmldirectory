<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="page-header">
                <div class="col-lg-8">
                    <h2>Company: <?php echo $company[0]['name']; ?></h2>
                    <h3>Directory Title: <?php echo $company[0]['title'] ?></h3>
                    <h4>Prompt: <?php
                        if ($company[0]['prompt'] != '') {
                            echo $company[0]['prompt'];
                        }
                        ?></h4>
                </div>
                <div class="col-lg-4">
                    <button type="button" class="btn btn-primary btn-small" id="add_entry">Add Entry</button>
                    <a class="btn btn-primary btn-small" href="<?php echo base_url().'index.php/ipphone/get_asset'?>" >Manage Asset</a>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="bs-docs-section">
                <?php if (isset($message)): ?>
                    <p class="<?php echo $success; ?>">
                        <?php $message = preg_replace("/<p>/", "", $message); $message =  preg_replace("/<\/p>/", "<br>", $message); echo $message;?>
                    </p>
                <?php endif; ?>
                <?php if ($entries === false): ?>
                    <p class="text-danger">Sorry, there is no entry for your company, please provide some by clicking 'Add Entry' button.</p>
                <?php else: ?>
                    <table class="table table-hover table-condensed">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Telephone</th>
                                <th> </th>
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
                                    <td class="entry_name"><?php echo $row['name']; ?></td>
                                    <td class="entry_telephone"><?php echo $row['telephone']; ?></td>
                                    <td><a href="#modal_form_edit" class="edit_entry_link">Edit</a></td>
                                    <td><a href="<?php echo base_url() . "index.php/ipphone/delete_entry/" . $row['id']; ?>" class="delete_item" >Delete</a></td>
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

<!--pop up dialog for adding new entry-->
<div class="modal fade" id="modal_form_add">
    <div id="dialog_form" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><span class="label label-info">This form is used for adding new entry</span></h4>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url() . 'index.php/ipphone/add_entry'; ?>" method="post" class="form-horizontal" id="add_entry_form">
                    <fieldset>
                        <div class="form-group">
                            <label for="addFirstName" class="col-lg-4 control-label">First Name</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control input-small"  name="first_name">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label for="addLastName" class="col-lg-4 control-label">Last Name</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control input-small"  name="last_name">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label for="addTelephone" class="col-lg-4 control-label">Telephone</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control input-small" name="telephone">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </fieldset>
                </form>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-primary btn-small" id="submit_form_add" >Add</a>
                <a href="#" class="btn btn-small" id="close_form_add">Close</a>
            </div>
        </div>
    </div>
</div>

<!--pop up dialog for edit and update entry-->
<div class="modal fade" id="modal_form_edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><span class="label label-info">This form is used for editing and updating entries</span></h4>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url() . 'index.php/ipphone/update_entry'; ?>" method="post" class="form-horizontal" id="edit_entry_form">
                    <fieldset>
                        <div class="form-group">
                            <label for="exampleInputEmail" class="col-lg-4 control-label">First Name</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control input-small"  name="first_name">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail" class="col-lg-4 control-label">Last Name</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control input-small"  name="last_name">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail" class="col-lg-4 control-label">Telephone</label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control input-small" name="telephone">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </fieldset>
                </form>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-primary btn-small" id="submit_form_edit" >Update</a>
                <a href="#" class="btn btn-small" id="close_form_edit">Close</a>
            </div>
        </div>
    </div>
</div>