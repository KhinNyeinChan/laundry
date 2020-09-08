<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Settings</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Settings</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline-info">
                <div class="card-body">
                    <form method="post" action="<?php echo base_url('admin/setting/updateSetting') ?>" class="form-horizontal" novalidate>
                        <div class="form-body">
                            
                            <div class="row p-t-20">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Site Name</label>
                                        <input type="text" name="site_name" class="form-control" value="<?php echo $settings->site_name; ?>" readonly>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label">Display Products</label>
                                        <?php
                                    $dpr = array('0' => 'Name', '1' => 'Photo' , '2' => 'Both');
                                    echo form_dropdown('display_product', $dpr, $settings->display_product, 'class="form-control" id="display_product"  required="required"') ?>
                                       </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label">Phone Number</label>
                                       <input type="text" name="phone" class="form-control" value="<?php echo $settings->phone; ?>">
                                            
                                       </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label">Currency Code</label>
                                       <input type="text" name="currency_prefix" class="form-control" value="<?php echo $settings->currency_prefix; ?>">
                                            
                                       </div>
                                </div>
                                 <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label">Default Discount</label>
                                       <input type="text" name="default_discount" class="form-control" value="<?php echo $settings->default_discount; ?>">
                                            
                                       </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label">Date Format</label>
                                       <input type="text" name="dateformat" class="form-control" value="<?php echo $settings->dateformat; ?>">
                                            
                                       </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label">Default Tax</label>
                                       <input type="text" name="default_tax_rate" class="form-control" value="<?php echo $settings->default_tax_rate; ?>">
                                            
                                       </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label">Time Format</label>
                                       <input type="text" name="timeformat" class="form-control" value="<?php echo $settings->timeformat; ?>">
                                            
                                       </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label">Service Charges</label>
                                       <input type="text" name="service_charges" class="form-control" value="<?php echo $settings->service_charges; ?>">
                                            
                                       </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label">Default Email</label>
                                       <input type="text" name="default_email" class="form-control" value="<?php echo $settings->default_email; ?>">
                                            
                                       </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label">Default Category</label>
                                        <?php
                                    $ct[0] = 'select'.' '.'default_category';
                                    foreach ($categories as $category) {
                                        $ct[$category->id] = $category->name;
                                    }
                                    echo form_dropdown('default_category', $ct, $settings->default_category, 'class="form-control " style="width:100%;" id="default_category"') ?>
                                       </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group ">
                                        <label class="control-label">Default Customer</label>
                                        <?php
                                    foreach ($customers as $customer) {
                                        $cu[$customer->id] = $customer->name;
                                    }
                                    echo form_dropdown('default_customer', $cu, $settings->default_customer, 'class="form-control " style="width:100%;" id="default_customer" required="required"'); ?>
                                       </div>
                                </div>
                                <!--/span-->
                            </div>

                        </div>
                        
                        <div class="card jumbotron p-3" >
                            <div class="row p-t-20">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Decimals</label>
                                        
                                                  <?php
                                    $dec = array(0 => 'Disable', 1 => '1',2=>'2');
                                            echo form_dropdown('decimals', $dec, $settings->decimals, 'class="form-control" id="decimals"  required="required"') ?>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Quantity Decimals</label>
                                         <?php
                                            $qty_decimals = array(0 => 'Disable', 1 => '1', 2 => '2');
                                            echo form_dropdown('qty_decimals', $qty_decimals, $settings->qty_decimals, 'class="form-control" id="qty_decimals" required="required"');
                                            ?>
                                        </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Decimals Separator</label>
                                         <?php
                                            $decimals_sep = array(0 => 'Dot(.)', 1 => 'Comma(,)');
                                            echo form_dropdown('decimals_sep', $decimals_sep, $settings->decimals_sep, 'class="form-control" id="decimals_sep" required="required"');
                                            ?>
                                        </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Thousands Separator</label>
                                         <?php
                                            $thousands_sep = array(0 => 'Dot(.)', 1 => 'Comma(,)',2=>'Space');
                                            echo form_dropdown('thousands_sep', $thousands_sep, $settings->thousands_sep, 'class="form-control" id="thousands_sep" required="required"');
                                            ?>
                                        </div>
                                </div>

                        </div>
                    </div>
                   
                    <div class="row">
                                <div class="col-md-12 ">
                                    <div class="form-group">
                                        <label class="control-label">Logo</label>
                                        <input type="file" name="logo" class="form-control" value="<?php echo $settings->logo; ?>" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Printing</label>
                                         <?php
                                            $print = array(0 => 'PHP Server(only for localhost/desktop', 1 => 'Web Browser',2=>'PHP POS Print Server');
                                            echo form_dropdown('printer', $print, $settings->printer, 'class="form-control" id="printer" required="required"');
                                            ?>
                                    </div>
                                </div>
                            
                           </div>
                           <br>  
                    <br>

                         <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" />

                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"> Update Setting</button>
                      </div>
              </form>
          </div>
      </div>
  </div>
</div>
</div>