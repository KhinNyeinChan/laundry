

<!-- Container fluid  -->

<div class="container-fluid">
    
    <!-- Bread crumb and right sidebar toggle -->
    
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Customer</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Edit Customer</li>
            </ol>
        </div>
        <div class="col-md-7 col-4 align-self-center">
            <div class="d-flex m-t-10 justify-content-end">

                
            </div>
        </div>
    </div>
    
    <!-- End Bread crumb and right sidebar toggle -->
    

    
    <!-- Start Page Content -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-header">
                    <h4 class="m-b-0 text-white"> Edit Customer <a href="<?php echo base_url('admin/customer/all_customer_list') ?>" class="btn btn-info pull-right"><i class="fa fa-list"></i> All Customers </a></h4>

                </div>
                <div class="card-body">
                    <form method="post" action="<?php echo base_url('admin/customer/update/'.$customer->id) ?>" class="form-horizontal" novalidate>
                        <div class="form-body">
                            <br>
                            <!--div class="row"-->
                                <!--div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">First Name <span class="text-danger"></span></label>
                                        <div class="col-md-9 controls">
                                            <input type="text" name="first_name" class="form-control" value="<?php echo $customer->first_name; ?>">
                                        </div>
                                    </div>
                                </div-->
                                <!--/span-->
                            <!--/div-->

                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3"> Name <span class="text-danger"></span></label>
                                        <div class="col-md-9 controls">
                                            <input type="text" name="name" class="form-control" value="<?php echo $customer->name; ?>">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>


                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Phone </label>
                                        <div class="col-md-9 controls">
                                            <input type="text" name="phone" class="form-control" value="<?php echo $customer->phone; ?>">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                        <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Address </label>
                                        <div class="col-md-9 controls">
                                            <input type="text" name="address" class="form-control" value="<?php echo $customer->address; ?>">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">CustomField</label>
                                        <div class="col-md-9 controls">
                                            <input type="text" name="customfield" class="form-control" value="<?php echo $customer->customfield; ?>">
                                        </div>
                                    </div>
                                </div>
                                <!--span-->
                            </div>


                            <!-- CSRF token -->
                            <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />

                            <hr>
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3"></label>
                                        <div class="controls">
                                            <button type="submit" class="btn btn-success">Update</button>

                                            <button type="reset" class="btn btn-default waves-effect" onclick="window.history.back()" value="cancel">Cancel</button> 
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

</div>s