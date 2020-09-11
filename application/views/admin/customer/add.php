

<div class="container-fluid">
    
    <!-- Bread crumb and right sidebar toggle -->
    
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Customer</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Add New Customer</li>
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
                    <h4 class="m-b-0 text-white"> Add New Customer <a href="<?php echo base_url('admin/customer/all_customer_list') ?>" class="btn btn-info pull-right"><i class="fa fa-list"></i> List Customer </a></h4>

                </div>
                <div class="card-body">
                    <form method="post" action="<?php echo base_url('admin/customer/add') ?>" class="form-horizontal" novalidate>
                        <div class="form-body">
                            <br>
                            <!--div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">First Name <span class="text-danger">*</span></label>
                                        <div class="col-md-9 controls">
                                            <input type="text" name="firstname" class="form-control" required data-validation-required-message="First Name is required">
                                        </div>
                                    </div>
                                </div-->
                                <!--/span-->
                            <!--/div-->

                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3"> Name <span class="text-danger">*</span></label>
                                        <div class="col-md-9 controls">
                                            <input type="text" name="name" class="form-control" required data-validation-required-message=" Name is required">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            

                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Phone<span class="text-danger">*</span></label>
                                        <div class="col-md-9 controls">
                                            <input type="phone" name="phone" class="form-control" data-validation-containsnumber-regex="(\d)+" data-validation-required-message=" Enter Valid Mobile Number" required data-validation-required-message="This field is required">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>



                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3"> Address <span class="text-danger">*</span></label>
                                        <div class="col-md-9 controls">
                                            <input type="text" name="address" class="form-control" required data-validation-required-message="Address is required">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                         <div class="row">
                            <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">CustomField <span class="text-danger"></span></label>
                                        <div class="col-md-9 controls">
                                            <input type="text" name="customfield" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div> 



                            

                            <!-- CSRF token -->
                            <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />

                            
                            <hr>
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3"></label>
                                        <div class="controls">
                                            <button type="submit" name="submit" value="validate" class="btn btn-success">Save customer</button>

                                            <button type="reset" class="btn btn-default waves-effect" data-dismiss="modal" value="Reset">Cancel</button>
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