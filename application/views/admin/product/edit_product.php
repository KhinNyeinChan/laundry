

<!-- Container fluid  -->

<div class="container-fluid">
    
    <!-- Bread crumb and right sidebar toggle -->
    
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Product</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Edit Product</li>
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
                    <h4 class="m-b-0 text-white"> Edit Product <a href="<?php echo base_url('admin/product/all_product_list') ?>" class="btn btn-info pull-right"><i class="fa fa-list"></i> List Products </a></h4>

                </div>
                <div class="card-body">
                    <form method="post" action="<?php echo base_url('admin/product/update/'.$product->id) ?>" class="form-horizontal" novalidate>
                        <div class="form-body">
                            <br>
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Name <span class="text-danger"></span></label>
                                        <div class="col-md-9 controls">
                                            <input type="text" name="name" class="form-control" value="<?php echo $product->name; ?>">
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
                                            <input type="text" name="code" class="form-control" required data-validation-required-message="Product code is required" value="<?php echo $product->code; ?>">
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

                                                <select class="form-control form-control-line" name="category_id">

                                                    <?php foreach ($category as $ca): ?>
                                                        <?php 
                                                            if($ca['id'] == $category->id){
                                                                $selec = 'selected';
                                                            }else{
                                                                $selec = '';
                                                            }
                                                        ?>
                                                        <option <?php echo $selec; ?> value="<?php echo $ca['id']; ?>"><?php echo $ca['name']; ?></option>
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
                                            <input type="text" name="price" class="form-control" required data-validation-required-message="Price is required" value="<?php echo $product->price; ?>">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                                            
                            <!-- CSRF token -->
                            <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />

                            
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3"></label>
                                        <div class="controls">
                                            <button type="submit" class="btn btn-success">Update</button>
                                       
                                            <!--button type="submit" class="btn btn-inverse" data-dismiss="modal" value="cancel">Cancel</button-->  

                                            <button type="reset" class="btn btn-default waves-effect"  value="cancel" onclick="window.history.back()">Cancel</button>

                                            <!--a href="<?php echo base_url('admin/customer/delete/'.$customer['id']) ?>" class="btn btn-danger"> Delete</a-->
                                            <!--button type="cancel" class="btn btn-inverse" value="cancel" onclick="javascript:window.location='admin/product/all_product_list';">Cancel</button-->

                                            <!--button type="cancel" onclick="window.location='all_product_list';return false;">Cancel</button-->    
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