<!-- Container fluid  -->

<div class="container-fluid">
    
    <!-- Bread crumb and right sidebar toggle -->
    
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Sales</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">List Sales</li>
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
                    <?php if ($this->session->userdata('role') == 'admin'): ?>
                        <a href="<?php echo base_url('admin/sale') ?>" class="btn btn-info pull-right"><i class="fa fa-plus"></i> Opened Bills</a> &nbsp;

                    <?php else: ?>
                        <!-- check logged user role permissions -->

                        <?php if(check_power(1)):?>
                            <a href="<?php echo base_url('admin/sale') ?>" class="btn btn-info pull-right"><i class="fa fa-plus"></i> Opened Bills</a>
                        <?php endif; ?>
                    <?php endif ?>
                

                    <div class="table-responsive m-t-40">
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Sale No</th>
                                    <th>Order No</th>
                                    <th>Date</th>
                                    <th>Customer</th>
                                    <th>Total</th>
                                    <th>Discount</th>
                                    <th>Grand Total</th>
                                    <th>Paid</th>
                                    <th>Status</th>
                                    <th>Note/Member</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Sale No</th>
                                    <th>Order No</th>
                                    <th>Date</th>
                                    <th>Customer</th>
                                    <th>Total</th>
                                    <th>Discount</th>
                                    <th>Grand Total</th>
                                    <th>Paid</th>
                                    <th>Status</th>
                                    <th>Note/Member</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            
                            <tbody>
                            <?php foreach ($listsale as $sale): ?>    
                                <tr>
                                    <td><?php echo $sale['id']; ?></td>
                                    <td><?php echo $sale['order_id']; ?></td>
                                    <td><?php echo $sale['date']; ?></td>
                                    <td><?php echo $sale['customer_name']; ?></td>
                                    <td><?php echo $sale['total']; ?></td>
                                    <!-- <td><?php echo $sale['total_tax']; ?></td> -->
                                    <!-- <td><?php echo $sale['rounding']; ?></td> -->
                                    <td><?php echo $sale['discount']; ?></td>
                                    <td><?php echo $sale['grand_total']; ?></td>
                                    <td><?php echo $sale['paid']; ?></td>
                                    <td><?php echo $sale['status']; ?></td>
                                    <td><?php echo $sale['note']; ?></td>
                                    <!--td>
                                        <?php if ($product['status'] == 0): ?>
                                            <div class="label label-table label-danger">Inactive</div>
                                        <?php else: ?>
                                            <div class="label label-table label-success">Active</div>
                                        <?php endif ?>
                                    </td-->
                                   

                                    <td class="text-nowrap">

                                        <?php if ($this->session->userdata('role') == 'admin'): ?>
                                    
                                            <span data-toggle="modal" data-target="#view-sale<?php echo $sale['id'];?>">
                                            <button type="button" class="btn btn-success btn-xs" id="btn_viewSale"  href="#" data-toggle="tooltip" data-original-title="View Sale">View</button>
                                            </span>

                                            <!--  Add View Sale Button -->
                                            <a href="<?php echo base_url('admin/sale/update/'.$sale['id']) ?>" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-success m-r-10"></i> </a>


                                             <span data-toggle="modal" data-target="#confirm_delete_<?php echo $sale['id'];?>">
                                                <a id="delete" href="#" data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-trash text-danger m-r-10"></i> </a>
                                            </span>

                                            <!-- <a id="delete" data-toggle="modal" data-target="#confirm_delete_<?php echo $sale['id'];?>" href="#"  data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-trash text-danger m-r-10"></i> </a> -->

                                       <?php endif?>

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
        <!-- End Page Content -->
</div>

<?php foreach ($listsale as $sale): ?> 
<div class="modal fade" id="confirm_delete_<?php echo $sale['id'];?>">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h4 class="modal-title text-danger">Confirm Delete!</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="form-body">
                    Are you sure want to delete? <br> <hr>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <a href="<?php echo base_url('admin/sale/delete/'.$sale['id']) ?>" class="btn btn-danger"> Delete</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- View Sale Modal -->
<div id="view-sale<?= $sale['id'] ?>" class="modal fade" tabindex="1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4>View Sale</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>  
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="container printableArea">
                    <div class="text-center col-md-12">
                        <?php foreach($store as $st){
                            echo '<p>'.$st['name'];
                            echo '<br>';
                            echo $st['address1'].'<br>'.$st['address2'];
                            echo $st['city'].'<br>'.$st['phone'];
                            echo '</p>';
                            echo '<p>'.$st['receipt_header'].'</p><br>';
                        }
                        ?>
                    </div>
                    
                    <?php foreach($orders as $order) :?>
                    <?php if($sale['order_id'] == $order['id']) :?>
                    
                    <div class="col-md-12">
                        <p class="text-left">
                            Date : <?= $order['start_date'] ?> <br>
                            Sales Person : <?= $sale['created_by'] ?>   <br>
                            Order No : <?= $sale['order_id'] ?>  <br>
                            Customer Name : <?= $sale['customer_name'] ?>  <br>
                            Customer Phone : <?= $sale['customer_phone'] ?>  <br>
                            Pick up Date : <?= $order['end_date'] ?>  
                        </p>                                                                                              
                    </div>

                    <?php endif ?>
                    <?php endforeach ?>
                    <div class="col-md-12">
                        <div class="table-responsive m-t-40" style="clear: both;">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Description</th>
                                        <th class="text-right">Quantity</th>
                                        <th class="text-right">Total</th>
                                        <th class="text-right">SubTotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($sale_items as $saleItem) : ?>
                                    <?php if($sale['id'] == $saleItem['sale_id']) :?>
                                        <tr>
                                            <td> <?= $saleItem['product_name'] ?></td>
                                            <td class="text-right"><?= number_format($saleItem['quantity']) ?></td>
                                            <td class="text-right"> <?= number_format($saleItem['total']) ?></td>
                                            <td class="text-right"><?= number_format($saleItem['subtotal']) ?></td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <hr>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-3"></div>
                            <div class="col-3"></div>
                            <div class="col-3 text-right">Total</div>
                            <div class="col-3 text-right"><?= number_format($sale['total']) ?></div>
                        </div>
                        <div class="row">
                            <div class="col-3"></div>
                            <div class="col-3"></div>
                            <div class="col-3 text-right">Discount</div>
                            <div class="col-3 text-right"><?= number_format($sale['discount']) ?></div>
                        </div>
                        <hr>
                        <?php foreach($payments as $payment) :?>
                        <?php if($sale['id'] == $payment['sale_id']) :?>
                        <div class="row">
                            <div class="col-3"></div>
                            <div class="col-3"></div>
                            <div class="col-3 text-right">Net Amount</div>
                            <div class="col-3 text-right"><?= number_format($payment['amount']) ?></div>
                        </div>
                        <div class="row">
                            <div class="col-3"></div>
                            <div class="col-3"></div>
                            <div class="col-3 text-right">Paid Amount</div>
                            <div class="col-3 text-right"><?= number_format($payment['pos_paid']) ?></div>
                        </div>
                        <div class="row">
                            <div class="col-3"></div>
                            <div class="col-3"></div>
                            <div class="col-3 text-right">Change</div>
                            <div class="col-3 text-right"><?= number_format($payment['pos_balance']) ?></div>
                        </div>
                        <div class="row">
                            <div class="col-3"></div>
                            <div class="col-3"></div>
                            <div class="col-3 text-right">Status</div>
                            <div class="col-3 text-right"><?= $payment['status'] ?></div>
                        </div>
                        <?php endif ?>
                        <?php endforeach ?>
                        <div class="row text-center mt-2">
                            <?php foreach($store as $st) : ?>
                                <div class="alert alert-success col-12"><?= $st['receipt_footer'] ?> </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="clearfix"></div>
                    <hr>
                    <div class="text-right">
                        <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                        <button id="print" class="btn btn-default btn-outline" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endforeach; ?>
