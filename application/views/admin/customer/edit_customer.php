

<!-- Container fluid  -->

<div class="container-fluid">
    
    <!-- Bread crumb and right sidebar toggle -->
    
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Customer</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Edit Customer</li>
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
                    <h4 class="m-b-0 text-white"> Edit Customer <a href="<?php echo base_url('admin/customer/all_customer_list') ?>" class="btn btn-info pull-right"><i class="fa fa-list"></i> List Customers </a></h4>

                </div>
                <div class="card-body">
                    <form method="post" action="<?php echo base_url('admin/customer/update/'.$customer->id) ?>" class="form-horizontal" novalidate>
                        <div class="form-body">
                            <br>
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Name <span class="text-danger"></span></label>
                                        <div class="col-md-9 controls">
                                            <input type="text" name="name" class="form-control" value="<?php echo $customer->name; ?>">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <!--div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Last Name <span class="text-danger"></span></label>
                                        <div class="col-md-9 controls">
                                            <input type="text" name="last_name" class="form-control" value="<?php echo $user->last_name; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div-->


                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Phone</label>
                                        <div class="col-md-9 controls">
                                            <input type="text" name="phone" class="form-control" value="<?php echo $customer->phone; ?>">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3"> Address</label>
                                        <div class="col-md-9 controls">
                                            <input type="text" name="address" class="form-control" value="<?php echo $customer->address; ?>">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">CustomField</label>
                                        <div class="col-md-9 controls">
                                            <input type="text" name="customfield" class="form-control" value="<?php echo $customer->customfield; ?>">
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>


                            <!--div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">Customer Address</label>
                                        <div class="col-md-9 controls">
                                            <div class="form-group has-success">
                                                <select class="form-control form-control-line" name="c">

                                                    <?php foreach ($country as $cn): ?>
                                                        <?php 
                                                            if($cn['id'] == $user->country){
                                                                $selec = 'selected';
                                                            }else{
                                                                $selec = '';
                                                            }
                                                        ?>
                                                        <option <?php echo $selec; ?> value="<?php echo $cn['id']; ?>"><?php echo $cn['name']; ?></option>
                                                    <?php endforeach ?>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div-->


                            <!--div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3"></label>
                                        <div class="controls">
                                            <div class="form-check">
                                                <label class="custom-control custom-radio">
                                                    <input <?php if($user->role == "user"){echo "checked";}; ?> id="user" name="role" type="radio" value="user" class="custom-control-input" required data-validation-required-message="You need to select user role type" aria-invalid="false">
                                                    <span class="custom-control-indicator"></span>
                                                    <span class="custom-control-description">User</span>
                                                </label>
                                                <label class="custom-control custom-radio">
                                                    <input <?php if($user->role == "admin"){echo "checked";}; ?> id="admin" name="role" type="radio" value="admin" class="custom-control-input" required data-validation-required-message="You need to select user role type" aria-invalid="false">
                                                    <span class="custom-control-indicator"></span>
                                                    <span class="custom-control-description">Admin</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div-->

                            
                            <!--?php if ($user->role == "user"): ?-->
                                <!--?php $dis = 'block'; ?-->
                            <!--?php else: ?-->
                                <!--?php $dis = 'none'; ?-->
                            <!--?php endif ?-->

                            <!--div class="row user_role_area" style="display: <?php echo $dis; ?>">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3">User Permission</label>
                                        <div class="controls">

                                            <?php foreach ($power as $pw): ?>

                                                <?php foreach ($user_role as $role){
                                                        if ($role['action'] == $pw['id']) {
                                                            $check = 'checked';
                                                            break;
                                                        }else{
                                                            $check = '';
                                                        }
                                                    }
                                                ?>

                                                <label class="custom-control custom-checkbox">
                                                    <input <?php if(isset($check)) {echo $check;} else {echo "";} ?> type="checkbox" value="<?php echo $pw['power_id'] ?>" name="role_action[]" class="custom-control-input"> <span class="custom-control-indicator"></span> <span class="custom-control-description"><?php echo $pw['name'] ?></span> 
                                                </label>
                                            
                                            <?php endforeach ?>

                                        </div>
                                    </div>
                                </div>
                            </div-->


                            <!-- CSRF token -->
                            <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />

                            
                            <hr>
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group row">
                                        <label class="control-label text-right col-md-3"></label>
                                        <div class="controls">
                                            <button type="submit" class="btn btn-success">Update</button>
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