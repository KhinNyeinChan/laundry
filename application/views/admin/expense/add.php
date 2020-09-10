

<!-- Container fluid  -->

<div class="container-fluid">
    
    <!-- Bread crumb and right sidebar toggle -->
    
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Expenses</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Add New Expense Category</li>
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
                    <h4 class="m-b-0 text-white"> Add New Expense <a href="<?php echo base_url('admin/expense/all_expense_list') ?>" class="btn btn-info pull-right"><i class="fa fa-list"></i> List Expenses </a></h4>

                </div>
                <div class="card-body">
                    <form method="post" action="<?php echo base_url('admin/expense/add') ?>" class="form-horizontal" novalidate>
                        <div class="form-body">
                            <br>
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3"> Date <span class="text-danger">*</span></label>
                                        <div class="col-md-9 controls">
                                            <input type="date" name="date"placeholder="dd/mm/yyyy" class="form-control" required data-validation-required-message="Date is required">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3 ">Reference</label>
                                        <div class="col-md-9  controls">
                                           <input type="text"class="form-control" name="reference" >
                                        </div>    
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                             <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Amount <span class="text-danger">*</span></label>
                                        <div class="col-md-9 controls">
                                            
                                            <input type="text" name="amount" class="form-control" required data-validation-containsnumber-regex="(\d)+"data-validation-containsnumber-message="No Characters Allowed, Only Numbers"required data-validation-required-message="Amount is required" >
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3 ">Note </label>
                                        <div class="col-md-9  controls">
                                           <textarea class="form-control" name="note" type="text" ></textarea>
                                        </div>    
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Expense Category </label>
                                        <div class="col-md-9 controls">
                                            <div class="form-group has-success">
                                                <select class="form-control category-select" name="expense_category" aria-invalid="false
                                                ">
                                                    <option value="">Select</option>
                                                    <?php foreach ($expense_category as $ec): ?>
                                                        <option value="<?php echo $ec['id']; ?>"><?php echo $ec['name']; ?></option>
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
                                        <label class="control-label text-right col-md-3">Attachment </label>
                                        <div class="col-md-9 controls">
                                            <input type="file" name="attachment" class="form-control" > 
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
                                            <button type="submit" class="btn btn-success">Save Expense</button>
                                            <button type="reset" class="btn btn-outline-success" onclick="window.history.back()" value="cancel">Cancel </button>
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