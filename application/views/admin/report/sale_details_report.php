<!-- Container fluid  -->


<div class="container-fluid">
    
    <!-- Bread crumb and right sidebar toggle -->
    
    <div class="row page-titles">
        
        <div class="col-md-5 col-8 align-self-center">       
            <h3 class="text-themecolor m-b-0 m-t-0">Reports</h3>  
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active"> Sale Details Report</li>
            </ol>
            
        </div>
        <!--a href="#" class="btn btn-default btn-md toggle_form topright">Show Hide/Form</a-->
        <div class="col-md-7 col-4 align-self-center">
        
            <div class="d-flex m-t-10 justify-content-end">
                <div class="">
                    <button class="right-side-toggle waves-effect waves-light btn-success btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                </div>
            </div>
        </div>
         <div>
            <br>
             <button onclick="myfunction()" class="btn btn-outline-info btn-sm  top-right" type="button" 
            >Show Hide/Form</button>
        </div>
    </div>

        <!-- Start Page Content -->

    <div class="row">
        <div class="col-12">

            <?php $msg = $this->session->flashdata('msg'); ?>
            <?php if (isset($msg)): ?>
                <div class="alert alert-success delete_msg pull" style="width: 100%"> <i class="fa fa-check-circle"></i> <?php echo $msg; ?> &nbsp;
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                </div>
            <?php endif ?>

            <?php $error_msg = $this->session->flashdata('error_msg'); ?>
            <?php if (isset($error_msg)): ?>
                <div class="alert alert-danger delete_msg pull" style="width: 100%"> <i class="fa fa-times"></i> <?php echo $error_msg; ?> &nbsp;
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                </div>
            <?php endif ?>


        
               
                   
    <div  id="showhide" class="panel panel-default" style="display: none; ">
        <div class="panel-body">
        <form method="get" action=" <?php echo base_url('admin/report/sale_details_report')?>" class="form-horizontal " novalidate>

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="control-label text-right-col-md-2" for="start_date">Start Date</label>
                        <div class="col-md-3 controls">
                            <div class="form-group ">
                                 <input type="date" name="start_date" class="form-control">
                            </div>
                        </div>
            
                        
                        <label class="control-label  text-right-col-md-2" for="end_date">End Date</label>
                            <div class="col-md-3 controls">
                                <div class="form-group ">
                                 <input type="date" name="end_date" class="form-control">
                                </div>
                            </div>
                    </div>
                </div>
            </div>

                          
                          

                            <div class="form-group">
                               <div class="col-sm-4" style="margin: auto;">
                                    <button type="submit" id="submit" class="btn btn-success" style="width: 30%;">Submit</button>
                                    <button type="reset" class="btn btn-outline-success"  value="cancel">Cancel </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-responsive m-t-40">
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Sale No</th>
                                    <th>Code</th>
                                    <th>Product Name</th>
                                    <th>Qty</th>
                                    <th>Sale Price</th>
                                    <th>Amount</th>
                                    <th>Cash</th>
                                    <th>Customer Name</th>
                                    <th>Time</th>   
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Sale No</th>
                                    <th>Code</th>
                                    <th>Product Name</th>
                                    <th>Qty</th>
                                    <th>Sale Price</th>
                                    <th>Amount</th>
                                    <th>Cash</th>
                                    <th>Customer Name</th>
                                    <th>Time</th>   
                                </tr>
                            </tfoot>
                            
                            <tbody>
                           
                            <?php foreach ($detailreport as $sale): ?>
                                
                                <tr>

                                    <td><?php echo $sale['id']; ?></td>
                                    <td><?php echo $sale['product_code']; ?></td>
                                    <td><?php echo $sale['product_name']; ?></td>
                                    <td><?php echo $sale['quantity']; ?></td>
                                    <td><?php echo $sale['price']; ?></td>
                                    <td><?php echo $sale['amount']; ?></td>
                                    <td><?php echo $sale['status']; ?></td>
                                    <td><?php echo $sale['customer_name']; ?></td>
                                    <td><?php echo $sale['pay_date']; ?></td>
                                    
                                </tr>

                           
                            <?php endforeach ?>
                            
                            </tbody>


                        </table>
                    </div>
                </div>
            </div>       
  
        <!-- End Page Content -->
</div>
<script type="text/javascript">
    function myfunction(){
        var x=document.getElementById("showhide");
        if(x.style.display=="none"){
            x.style.display="block";

        }else{
            x.style.display="none";
        }
    }
</script>



