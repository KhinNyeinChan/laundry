

<!-- Container fluid  -->

<div class="container-fluid">
    
    <!-- Bread crumb and right sidebar toggle -->
                    
                    <div class="row page-titles">
                        <div class="col-md-5 col-8 align-self-center">
                            <h3 class="text-themecolor m-b-0 m-t-0">Order</h3>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">All Orders</li>
                            </ol>
                        </div>
                        <div class="col-md-7 col-4 align-self-center">
                                <div class="">
                                    <button class="right-side-toggle waves-effect waves-light btn-success btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                                </div>
                        </div>
                    </div>
                    <!-- </div> -->
                
                <!-- End Bread crumb and right sidebar toggle -->

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

        <div class="card">
            <div class="card-body">
                <?php if ($this->session->userdata('role') == 'admin'): ?>
                                <a href="<?php echo base_url('admin/order') ?>" class="btn btn-info pull-right"><i class="fa fa-plus"></i> Add New Order</a> 

                                <a href="<?php echo base_url('admin/order/all_order_list') ?>" class="btn btn-info"><i class="fa fa-list"></i> &nbsp; List Order</a>
                            <?php else: ?>
                                <!-- check logged user role permissions -->

                                <?php if(check_power(1)):?>
                                    <a href="<?php echo base_url('admin/order') ?>" class="btn btn-info pull-left"><i class="fa fa-plus"></i> List Order</a>
                                <?php endif; ?>
                            <?php endif ?>
                            

                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Customer</th>
                                                <th>Product Code</th>
                                                <th>Product Name</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                                <th>Assigned To</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Start Date</th>
                                                <th>End Date</th>
                                                <th>Customer</th>
                                                <th>Product Code</th>
                                                <th>Product Name</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                                <th>Assigned To</th> 
                                                
                                            </tr>
                                        </tfoot>
                                        
                                        <tbody>
                                        <?php if(is_array($orderdetails)): ?>

                                        <?php foreach ($orderdetails as $orderdetail): ?>
                                            
                                            <tr>
                                                <td><?php echo my_date_show_time($orderdetail['sdate']); ?></td>
                                                <td><?php echo my_date_show_time($orderdetail['edate']); ?></td>
                                                <td><?php echo $orderdetail['cname']; ?></td>
                                                <td><?php echo $orderdetail['product_code']; ?></td>
                                                <td><?php echo $orderdetail['product_name']; ?></td>
                                                <td><?php echo $orderdetail['status']; ?></td>
                                                <td class="text-nowrap">
                                                            <!-- The Modal -->
                                                <?php if ($this->session->userdata('role') == 'admin'): ?>
                                                    <a id="add_assign" data-toggle="modal" data-target="#assign-modal<?php echo $orderdetail['id'];?>" href="#" data-toggle="tooltip" data-original-title="Add Assign"><i class="fa fa-user text-success m-10"></i></a></td>
                                                    <?php endif; ?>
                        <td><?php echo $orderdetail['assign_to']; ?></td>
                    </tr>
                          <?php endforeach ?>
                            <?php endif; ?>
                    </tbody>
                    </table>
                </div>
            </div><!-- End card body -->
        </div><!-- End card -->
    </div>
</div>
<!-- End Page Content -->

<?php foreach ($orderdetails as $orderdetail): ?>
 
<div id="assign-modal<?= $orderdetail['id'] ?>" class="modal fade" tabindex="1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <?php echo validation_errors(); ?>
       <?php echo form_open('admin/order/add_assign/'.$orderdetail['id']); ?>
            <div class="form-body">
                <div class="form-groupv">
                <label class="control-label">Name</label>
                <input type="text" name="name" id="name" value="<?= $orderdetail['assign_to']?>" class="form-control" palceholder="Staff Name" required>
                </div>
                <div class="form-actions">
                <button type="submit" class="btn btn-success"><i class="fa fa-check"></i>Add</button>
            </div>
      </div>
    </div>
  </div>
</div>
</div>
<?php endforeach ?>

<script type="text/javascript">
    setInterval(function () {
    if(alert('Your session has expired!')){}
              else    window.location.reload(); 
            }, 7200000);
</script>
<!--?php endforeach ?-->