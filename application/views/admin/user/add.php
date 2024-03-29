

<!-- Container fluid  -->

<div class="container-fluid">
    
    <!-- Bread crumb and right sidebar toggle -->
    
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">User</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Add New User</li>
            </ol>
        </div>
        
    </div>
    
    <!-- End Bread crumb and right sidebar toggle -->
    

    
    <!-- Start Page Content -->

    <div class="row">
        <div class="col-lg-12">

            <?php $error_msg = $this->session->flashdata('error_msg'); ?>
            <?php if (isset($error_msg)): ?>
                <div class="alert alert-danger delete_msg pull" style="width: 100%"> <i class="fa fa-times"></i> <?php echo $error_msg; ?> &nbsp;
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                </div>
            <?php endif ?>
            
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="m-b-0 text-white"> Add New User <a href="<?php echo base_url('admin/user/all_user_list') ?>" class="btn btn-info pull-right"><i class="fa fa-list"></i> All Users </a></h4>

                </div>
                <div class="card-body">
                    <form method="post" action="<?php echo base_url('admin/user/add') ?>" class="form-horizontal" novalidate>
                        <div class="form-body">
                            <br>
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Name <span class="text-danger">*</span></label>
                                        <div class="col-md-9 controls">
                                            <input type="text" name="name" class="form-control" required data-validation-required-message="Name is required">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Phone<span class="text-danger">*</span> </label>
                                        <div class="col-md-9 controls">
                                            <input type="text" name="phone" class="form-control" 
                                            data-validation-containsnumber-regex="(\d)+" data-validation-required-message=" Enter Valid Phone Number">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                        

                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Email <span class="text-danger">*</span></label>
                                        <div class="col-md-9 controls">
                                            <input type="email" name="email" class="form-control" required data-validation-required-message="Email is required">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>


                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Password <span class="text-danger">*</span></label>
                                        <div class="col-md-9 controls">
                                            <input type="password" name="password" class="form-control" required data-validation-required-message="Password is required">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            


                            <!--div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Country </label>
                                        <div class="col-md-9 controls">
                                            <div class="form-group has-success">
                                                <select class="form-control custom-select" name="country" aria-invalid="false">
                                                    <option value="0">Select</option>
                                                    <?php // foreach ($country as $cn): ?>
                                                        <option value="<?php // echo $cn['id']; ?>"><?php // echo $cn['name']; ?></option>
                                                    <?php // endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div-->
                                <!--/span-->
                            <!--/div-->


                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3"></label>
                                        <div class="controls">
                                            <div class="form-check">
                                                <label class="custom-control custom-radio">
                                                    <input id="user" name="role" type="radio" value="user" class="custom-control-input" required data-validation-required-message="You need to select user role type" aria-invalid="false">
                                                    <span class="custom-control-indicator"></span>
                                                    <span class="custom-control-description">User</span>
                                                </label>
                                                <label class="custom-control custom-radio">
                                                    <input id="admin" name="role" type="radio" value="admin" class="custom-control-input" required data-validation-required-message="You need to select user role type" aria-invalid="false">
                                                    <span class="custom-control-indicator"></span>
                                                    <span class="custom-control-description">Admin</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            

                            <div class="row user_role_area" style="display: none;">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">User Permissions</label>
                                        <div class="controls">

                                            <?php foreach ($power as $pw): ?>
                                                <label class="custom-control custom-checkbox">
                                                    <input type="checkbox" value="<?php echo $pw['power_id']; ?>" name="role_action[]" class="custom-control-input"> <span class="custom-control-indicator"></span> <span class="custom-control-description"><?php echo $pw['name']; ?></span> 
                                                </label>
                                            <?php endforeach ?>

                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- CSRF token -->
                            <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />

                            
                            <hr>
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3"></label>
                                        <div class="controls">
                                            <button type="submit" class="btn btn-success">Save user</button>

                                            <button type="reset" class="btn btn-default waves-effect"  value="cancel" onclick="window.history.back()">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                           
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- End Page Content -->

</div>