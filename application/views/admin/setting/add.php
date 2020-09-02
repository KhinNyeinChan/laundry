

<!-- Container fluid  -->

<div class="container-fluid">
    
    <!-- Bread crumb and right sidebar toggle -->
    
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Stores</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Stores</li>
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
                    <h4 class="m-b-0 text-white"> Stores <a href="<?php echo base_url('admin/setting/all_setting_list') ?>" class="btn btn-info pull-right"><i class="fa fa-list"></i> Stores </a></h4>

                </div>
                <div class="card-body">
                    <form method="post" action="<?php echo base_url('admin/setting/add') ?>" class="form-horizontal" novalidate>
                        <div class="form-body">
                            <br>
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3"> Name <span class="text-danger"></span></label>
                                        <div class="col-md-9 controls">
                                            <input type="text" name="name" class="form-control" >
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Code <span class="text-danger"></span></label>
                                        <div class="col-md-9 controls">
                                            <input type="text" name="code" class="form-control" >
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                             <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Phone<span class="text-danger"></span></label>
                                        <div class="col-md-9 controls">
                                            <input type="text" name="phone" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                             <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Email <span class="text-danger"></span></label>
                                        <div class="col-md-9 controls">
                                            <input type="text" name="email" class="form-control" >
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                             <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Address Line1 <span class="text-danger"></span></label>
                                        <div class="col-md-9 controls">
                                            <input type="text" name="address1" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                             <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Address Line2 <span class="text-danger"></span></label>
                                        <div class="col-md-9 controls">
                                            <input type="text" name="address2" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
 
                              <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">City<span class="text-danger"></span></label>
                                        <div class="col-md-9 controls">
                                            <input type="text" name="city" class="form-control" >
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                             <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">State <span class="text-danger"></span></label>
                                        <div class="col-md-9 controls">
                                            <input type="text" name="state" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
 
                              <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Postal_Code <span class="text-danger"></span></label>
                                        <div class="col-md-9 controls">
                                            <input type="text" name="postal_code" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
 
                              <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Country <span class="text-danger"></span></label>
                                        <div class="col-md-9 controls">
                                            <input type="text" name="country" class="form-control" >
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
 
                             <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Receipt_Header <span class="text-danger"></span></label>
                                        <div class="col-md-9 controls">
                                            <input type="text" name="receipt_header" class="form-control" 
                                            style="height:100px" >
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Receipt_Footer <span class="text-danger"></span></label>
                                        <div class="col-md-9 controls">
                                            <input type="text" name="receipt_footer" class="form-control" 
                                            style="height:100px">
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
                                            <button type="submit" class="btn btn-success">Save Store</button>
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