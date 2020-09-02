<div class="container-fluid">
    
    <!-- Bread crumb and right sidebar toggle -->
    
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Product</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Add New Product</li>
            </ol>
        </div>
        
    </div>

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
                    <h4 class="m-b-0 text-white"> Add New Product <a href="<?php echo base_url('admin/product/all_product_list') ?>" class="btn btn-info pull-right"><i class="fa fa-list"></i> List Products </a></h4>

                </div>

                <div class="card-body">
                    <form method="post" action="<?php echo base_url('admin/product/add') ?>" class="form-horizontal" novalidate>
                        <div class="form-body">
                            <br>
                              <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Name <span class="text-danger"></span></label>
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
                                        <label class="control-label text-right col-md-3">Product Code <span class="text-danger"></span></label>
                                        <div class="col-md-9 controls">
                                            <input type="text" name="code" class="form-control" required data-validation-required-message="Product code is required">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                                 <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Category </label>
                                        <div class="col-md-9 controls">
                                            <div class="form-group has-success">
                                                <select class="form-control category-select" name="category_id" aria-invalid="false
                                                ">
                                                    <option value="">Select</option>
                                                    <?php foreach ($category as $ca): ?>
                                                        <option value="<?php echo $ca['id']; ?>"><?php echo $ca['name']; ?></option>
                                                    <?php endforeach ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>


                                <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Price <span class="text-danger"></span></label>
                                        <div class="col-md-9 controls">
                                            <input type="text" name="price" class="form-control" required data-validation-required-message="Price is required">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Quantity<span class="text-danger"></span></label>
                                        <div class="col-md-9 controls">
                                            <input type="text" name="quantity" class="form-control" required data-validation-required-message="Quantity is required">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />

                            
                            <hr>
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3"></label>
                                        <div class="controls">
                                            <button type="submit" class="btn btn-success">Save Product</button>
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