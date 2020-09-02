

<!-- Container fluid  -->

<div class="container-fluid">
    
    <!-- Bread crumb and right sidebar toggle -->
    
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Store</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Edit Store</li>
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
                    <h4 class="m-b-0 text-white"> Edit Store <a href="<?php echo base_url('admin/setting/all_setting_list') ?>" class="btn btn-info pull-right"><i class="fa fa-list"></i>  Stores </a></h4>

                </div>
                <div class="card-body">
                    <form method="post" action="<?php echo base_url('admin/setting/update/'.$store->id) ?>" class="form-horizontal" novalidate>
                        <div class="form-body">
                            <br>
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Name <span class="text-danger"></span></label>
                                        <div class="col-md-9 controls">
                                            <input type="text" name="name" class="form-control" value="<?php echo $store->name; ?>">
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
                                            <input type="text" name="code" class="form-control" value="<?php echo $store->code; ?>">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Phone <span class="text-danger"></span></label>
                                        <div class="col-md-9 controls">
                                            <input type="text" name="phone" class="form-control" value="<?php echo $store->phone; ?>">
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
                                            <input type="text" name="email" class="form-control" value="<?php echo $store->email; ?>">
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
                                            <input type="text" name="address1" class="form-control" value="<?php echo $store->address1; ?>">
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
                                            <input type="text" name="address2" class="form-control" value="<?php echo $store->address2; ?>">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                              <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">City <span class="text-danger"></span></label>
                                        <div class="col-md-9 controls">
                                            <input type="text" name="city" class="form-control" value="<?php echo $store->city; ?>">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                              <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">State<span class="text-danger"></span></label>
                                        <div class="col-md-9 controls">
                                            <input type="text" name="state" class="form-control" value="<?php echo $store->state; ?>">
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
                                            <input type="text" name="postal_code" class="form-control" value="<?php echo $store->postal_code; ?>">
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
                                            <input type="text" name="country" class="form-control" value="<?php echo $store->country; ?>">
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
                                            <input type="text" name="receipt_header" class="form-control" value="<?php echo $store->receipt_header; ?>">
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
                                            <input type="text" name="receipt_footer" class="form-control" value="<?php echo $store->receipt_footer; ?>">
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
                                            <button type="submit" class="btn btn-success">Update</button>
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