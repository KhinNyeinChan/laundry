<!-- Container fluid  -->

<div class="container-fluid">
    
    <!-- Bread crumb and right sidebar toggle -->
    
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">People</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">List Customers</li>
            </ol>
        </div>
        <div class="col-md-7 col-4 align-self-center">
            
            
            <div class="d-flex m-t-10 justify-content-end">
                <div class="d-flex m-r-20 m-l-10 hidden-md-down">
                    <!--div class="chart-text m-r-10"-->
                        <!--h6 class="m-b-0"><small>Active User</small></h6-->
                        <!--h4 class="m-t-0 text-info"><?php echo $count->active_user; ?></h4-->
                    <!--/div-->
                </div>
                <!--div class="d-flex m-r-20 m-l-10 hidden-md-down"-->
                    <!--div class="chart-text m-r-10">
                        <!--h6 class="m-b-0"><small>Inactive User</small></h6-->
                        <!--h4 class="m-t-0 text-primary"><?php echo $count->inactive_user; ?></h4-->
                    <!--/div-->
                </div>
                <div class="">
                    <button class="right-side-toggle waves-effect waves-light btn-success btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
                </div>
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
                    <a href="<?php echo base_url('admin/customer') ?>" class="btn btn-info pull-right"><i class="fa fa-plus"></i> Add New Customer</a> &nbsp;

                    
                <?php else: ?>
                    <!-- check logged user role permissions -->

                    <?php if(check_power(1)):?>
                        <a href="<?php echo base_url('admin/customer') ?>" class="btn btn-info pull-right"><i class="fa fa-plus"></i> Add New Customer</a>
                    <?php endif; ?>
                <?php endif ?>
                

                    <div class="table-responsive m-t-40">
                        <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <!--th>Email Address</th-->
                                    <th> 
                                    Address</th>
                                    <th>Customer Custom Field</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <!--th>Email Address</th-->
                                    <th>Address</th>
                                    <th>Customer Custom Field</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            
                            <tbody>
                            <?php foreach ($customers as $customer): ?>
                                
                                <tr>

                                    <td><?php echo $customer['name'];?></td>
                                    <!--td><?php //echo $customer['email address']; ?></td-->
                                    <td><?php echo $customer['phone']; ?></td>
                                    <td><?php echo $customer['address']; ?></td>
                                    <td><?php echo $customer['customfield']; ?></td>

                                    <!--td>
                                        <?php if ($user['status'] == 0): ?>
                                            <div class="label label-table label-danger">Inactive</div>
                                        <?php else: ?>
                                            <div class="label label-table label-success">Active</div>
                                        <?php endif ?>
                                    </td-->
                                    <!--td width="10%">
                                        <?php if ($user['role'] == 'admin'): ?>
                                            <div class="label label-table label-info"><i class="fa fa-user"></i> admin</div>
                                        <?php else: ?>
                                            <div class="label label-table label-success">user</div>
                                        <?php endif ?>
                                    </td-->

                                    <!--td><?php echo my_date_show_time($customer['created_at']); ?></td-->
                                    <td class="text-nowrap">

                                        <?php if ($this->session->userdata('role') == 'admin'): ?>
                                            <a href="<?php echo base_url('admin/customer/update/'.$customer['id']) ?>" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-success m-r-10"></i> </a>
                                            
                                            <span data-toggle="modal" data-target="#confirm_delete_<?php echo $customer['id'];?>">
                                            <a id="delete"  href="#"  data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-trash text-danger m-r-10"></i> </a>
                                            </span>

                                        <?php else: ?>

                                            <!-- check logged user role permissions -->

                                            <?php if(check_power(2)):?>
                                                <a href="<?php echo base_url('admin/customer/update/'.$customer['id']) ?>" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-success m-r-10"></i> </a>
                                            <?php endif; ?>
                                            <?php if(check_power(3)):?>
                                                <a href="<?php echo base_url('admin/customer/delete/'.$customer['id']) ?>" onClick="return doconfirm();" data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-trash text-danger m-r-10"></i> </a>
                                            <?php endif; ?>

                                        <?php endif ?>

                                        
                                        
                                        <!--?php if ($user['status'] == 1): ?-->
                                            <!--a href="<?php echo base_url('admin/customer/deactive/'.$customer['id']) ?>" data-toggle="tooltip" data-original-title="Deactive"> <i class="fa fa-close text-danger m-r-10"></i> </a>
                                        <!--?php else: ?-->
                                            <!--a href="<?php echo base_url('admin/customer/active/'.$customer['id']) ?>" data-toggle="tooltip" data-original-title="Active"> <i class="fa fa-check text-info m-r-10"></i> </a-->
                                        <!--?php endif ?-->
                                        
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



<?php foreach ($customers as $customer): ?>
 
 
<div class="modal fade" id="confirm_delete_<?php echo $customer['id'];?>">
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
                <a href="<?php echo base_url('admin/customer/delete/'.$customer['id']) ?>" class="btn btn-danger"> Delete</a>
                
            </div>

      </div>


    </div>
  </div>
</div>

<?php endforeach ?>