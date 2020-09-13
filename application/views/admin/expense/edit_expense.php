

<!-- Container fluid  -->

<div class="container-fluid">
    
    <!-- Bread crumb and right sidebar toggle -->
    
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Expense </h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Edit Expense </li>
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
                    <h4 class="m-b-0 text-white"> Edit Expense <a href="<?php echo base_url('admin/expense/all_expense_list') ?>" class="btn btn-info pull-right"><i class="fa fa-list"></i> List Expense  </a></h4>

                </div>
                <div class="card-body">
                    <form method="post" action="<?php echo base_url('admin/expense/update/'.$expense->id) ?>" class="form-horizontal" novalidate>
                        <div class="form-body">
                            <br>

                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Date<span class="text-danger"></span></label>
                                        <div class="col-md-9 controls">
                                            <input type="date" name="date" placeholder="dd/mm/yyyy"class="form-control" value="<?php echo $expense->date; ?>">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3 ">Reference </label>
                                        <div class="col-md-9  controls">
                                           <input type="text" class="form-control" name="reference" value="<?php echo ($expense->reference); ?>" >
                                        </div>    
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Amount<span class="text-danger"></span></label>
                                        <div class="col-md-9 controls">
                                            <input type="text" name="amount" class="form-control"required data-validation-containsnumber-regex="(\d)+" value="<?php echo $expense->amount; ?>">
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
                                           <textarea class="form-control" name="note" type="text" ><?php echo ($expense->note); ?></textarea>
                                        </div>    
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Expense Category</label>
                                        <div class="col-md-9 controls">
                                            <div class="form-group has-success">
                                                <select class="form-control form-control-line" name="expense_category">

                                                    <?php foreach ($expense_category as $ec): ?>
                                                        <?php 
                                                            if($ec['id'] == $expense->expense_category){
                                                                $selec = 'selected';
                                                            }else{
                                                                $selec = '';
                                                            }
                                                        ?>
                                                        <option <?php echo $selec; ?> value="<?php echo $ec['id']; ?>"><?php echo $ec['name']; ?></option>
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
                                            <input type="file" name="attachment" class="form-control"  value="<?php echo $expense->attachment; ?>"> 
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