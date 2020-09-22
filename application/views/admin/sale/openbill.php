<!-- Container fluid  -->

<div class="container-fluid">
    
    <!-- Bread crumb and right sidebar toggle -->
    
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Sales</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Opened Bills</li>
            </ol>
        </div>
        <div class="col-md-7 col-4 align-self-center">

            <div class="d-flex m-t-10 justify-content-end">
                <div class="">
                    <button class="right-side-toggle waves-effect waves-light btn-success btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                </div>
            </div>
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

            <div class="card">

                <div class="card-body">

                <!--?php if ($this->session->userdata('role') == 'admin'): ?>
                    <a href="<?php echo base_url('admin/sale') ?>" class="btn btn-info pull-right"><i class="fa fa-plus"></i> Opened Bills</a-->

                <!--?php else: ?-->
                    <!-- check logged user role permissions -->

                    <!--?php if(check_power(1)):?-->
                        <!--a href="<?php echo base_url('admin/sale') ?>" class="btn btn-info pull-right"><i class="fa fa-plus"></i> Opened Bills</a-->
                    <!--?php endif; ?-->
                <!--?php endif ?-->
                

                    <div class="table-responsive m-t-40">
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Order No</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Customer</th>
                                    <th>Reference Note</th>
                                    <th>Total Items</th>
                                    <th>Grand Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Order No</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Customer</th>
                                    <th>Reference Note</th>
                                    <th>Total Items</th>
                                    <th>Grand Total</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            
                            <tbody>
                            <?php if(is_array($openbill)): ?>
                            <?php foreach ($openbill as $order): ?>
                                
                                <tr>

                                    <td><?php echo $order['id']; ?></td>
                                    <td><?php echo $order['start_date']; ?></td>
                                    <td><?php echo $order['end_date']; ?></td>
                                    <td><?php echo $order['customer_name']; ?></td>
                                    <td><?php echo $order['note']; ?></td>
                                    <td><?php echo $order['total_item']; ?></td>
                                    <!-- <td><?php echo $order['grand_total']; ?></td> -->
                                    
                                    <td class="text-nowrap">

                                        <?php if ($this->session->userdata('role') == 'admin'): ?>
                                            <a href="<?php echo base_url('admin/pos/'.$order['id']) ?>" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-th m-r-10"></i> </a>

                                            <a id="delete" data-toggle="modal" data-target="#confirm_delete_<?php echo $order['id'];?>" href="#"  data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-trash text-danger m-r-10"></i> </a>


                                        <?php else: ?>

                                            <!-- check logged user role permissions -->

                                            <?php if(check_power(2)):?>
                                                <a href="<?php echo base_url('admin/pos/'.$order['id']) ?>" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-th m-r-10"></i> </a>
                                            <?php endif; ?>
                                            <?php if(check_power(3)):?>
                                                <a href="<?php echo base_url('admin/open_bill/delete/'.$order['id']) ?>" onClick="return doconfirm();" data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-trash text-danger m-r-10"></i> </a>
                                            <?php endif; ?>

                                        <?php endif ?>
                                        
                                    </td>
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


<?php if(is_array($openbill)): ?>
<?php foreach ($openbill as $order): ?>
 
 
<div class="modal fade" id="confirm_delete_<?php echo $order['id'];?>">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title"></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       
            <div class="form-body">
                
                Are you sure want to delete? <br> <hr>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <a href="<?php echo base_url('admin/sale/delete/'.$order['id']) ?>" class="btn btn-danger"> Delete</a>
                
            </div>

      </div>


    </div>
  </div>
</div>


<?php endforeach ?>
<?php endif; ?>