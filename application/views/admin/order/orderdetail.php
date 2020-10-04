<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Order Detail</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">All Order Details</li>
            </ol>
        </div>
        </div>
    </div>
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
                    <a href="<?php echo base_url('admin/pos') ?>" class="btn btn-info pull-right"><i class="fa fa-plus"></i> Add New Order</a> 
                <?php else: ?>
                    <!-- check logged user role permissions -->

                    <?php if(check_power(1)):?>
                        <a href="<?php echo base_url('admin/pos') ?>" class="btn btn-info pull-right"><i class="fa fa-plus"></i> Add New Order</a>
                    <?php endif; ?>
                <?php endif ?>
                    <div class="table-responsive m-t-40">
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <!-- <th>Start Date</th>
                                    <th>End Date</th> -->
                                    <th>Order No.</th>
                                    <!-- <th>Customer</th> -->
                                    <th>Product Code</th>
                                    <th>Product Name</th>
                                    <th>Status</th>
                                    <th>Assigned To</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <!-- <th>Start Date</th>
                                    <th>End Date</th> -->
                                    <th>Order No.</th>
                                    <!-- <th>Customer</th> -->
                                    <th>Product Code</th>
                                    <th>Product Name</th>
                                    <th>Status</th>
                                    <th>Assigned To</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            
                            <tbody>
                            <?php foreach ($orderdetails as $orderdetail): ?>
                                <tr>
                                    
                                    <td><?php echo $orderdetail['order_id']; ?></td>
                                    <!-- <td><?php //echo $orderdetail['customer_name']; ?></td> -->
                                    <td><?php echo $orderdetail['product_code']; ?></td>
                                    <td><?php echo $orderdetail['product_name']; ?></td>
                                    <td><?php echo $orderdetail['status']; ?></td>
                                    <td><?php echo $orderdetail['assign_to']; ?></td>

                                    <td class="text-nowrap">
                                    <span data-toggle="modal" data-target="#view-modal">
                                        <a id="add_assign" data-target="#assign-modal<?php echo $orderdetail['id'];?>" href="#" data-toggle="tooltip" data-original-title="Add Assign"><i class="fa fa-user text-success m-10"></i></a>
                                    </span>
                                    </td>
                                </tr>

                            <?php endforeach ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script type="text/javascript">
    setInterval(function () {
    if(alert('Your session has expired!')){}
              else    window.location.reload(); 
            }, 7200000);
</script>

<?php foreach ($orderdetails as $orderdetail): ?>
<div id="assign-modal<?= $orderdetail['id'] ?>" class="modal fade" tabindex="1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">Add Assign</h4>
       <button type="button" class="close" data-dismiss="modal">&times;</button>  
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <?php echo validation_errors(); ?>
       <?php echo form_open('admin/order/add_assign/'.$orderdetail['id']); ?>
            <div class="form-body">
                <div class="form-groupv">
                <label class="control-label">Name</label>
                <input type="text" name="name" id="name" value="<?= $orderdetail['assign_to'] ?>" class="form-control" palceholder="Staff Name" required>
                </div>
                <div class="form-actions">
                    <br>
                    <button type="submit" class="btn btn-success">Add</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
</div>
<?php endforeach ?>

