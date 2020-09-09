

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
                    <a href="<?php echo base_url('admin/order') ?>" class="btn btn-info pull-right"><i class="fa fa-plus"></i> Add New Order</a> 
                <?php else: ?>
                    <!-- check logged user role permissions -->

                    <?php if(check_power(1)):?>
                        <a href="<?php echo base_url('admin/order') ?>" class="btn btn-info pull-right"><i class="fa fa-plus"></i> Add New Order</a>
                    <?php endif; ?>
                <?php endif ?>
                    <div class="table-responsive m-t-40">
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Order No.</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Customer</th>
                                    <th>User</th>
                                    <th>Total Qty</th>
                                    <th>Total Items</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Order No.</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Customer</th>
                                    <th>User</th>
                                    <th>Total Qty</th>
                                    <th>Total Items</th>
                                </tr>
                            </tfoot>
                            
                            <tbody>
                            <?php if(is_array($orders)): ?>
                            <?php foreach ($orders as $order): ?>
                                
                                <tr>

                                    <td><?php echo $order['id']; ?></td>
                                    <td><?php echo my_date_show_time($order['start_date']); ?></td>
                                    <td><?php echo my_date_show_time($order['end_date']); ?></td>
                                    <td><?php echo $order['customer_name']; ?></td>
                                    <td><?php echo $order['created_by']; ?></td>
                                    <td><?php echo $order['total_qty']; ?></td>
                                    <td><?php echo $order['total_item']; ?></td>
                                 </tr>  
                            <?php endforeach ?>
                            <?php endif; ?>

                            </tbody>


                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- End Page Content -->

</div>


<?php if(is_array($orders)): ?>
<?php foreach ($orders as $order): ?>
 
<!--div class="modal fade" id="confirm_delete_<?php echo $order['id'];?>">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title"></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

    </div>
  </div>
</div-->

<?php endforeach ?>
<?php endif; ?>
<script type="text/javascript">
setInterval(function () {
  if(alert('Your session has expired!')){}
  else    window.location.reload(); 
}, 7200000);
</script>