<?php (defined('BASEPATH')) OR exit('No direct script access allowed'); ?><!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    
    <!-- mod for cache issue by nyi nyi on 24th April 2018 -->
     <meta http-equiv="cache-control" content="max-age=0"/>
     <meta http-equiv="cache-control" content="no-cache"/>
     <meta http-equiv="expires" content="0"/>
     <meta http-equiv="pragma" content="no-cache"/>
    <!-- end mod -->            
    <title><?= $page_title.' | '.$Settings->site_name; ?></title>
    <link rel="shortcut icon" href="<?= $assets ?>images/icon.png"/>
    <link href="<?= $assets ?>dist/css/styles.css" rel="stylesheet" type="text/css" />
    <script src="<?= $assets ?>plugins/jQuery/jQuery-2.1.4.min.js" type="text/javascript"></script>
</head>
<body class="skin-<?= $Settings->theme_style; ?> sidebar-collapse sidebar-mini pos">
    <div class="wrapper">

        <header class="main-header">
            <!-- mod added for waiter role by Nyi Nyi on 23rd Jan 2018 -->
            <?php if (!$Waiter || !$Mobile_Caisher) {?>
            <a href="<?= site_url(); ?>" class="logo">
                <?php if ($store) { ?>
                <span class="logo-mini"><?= $store->code; ?></span>
                <span class="logo-lg"><?= $store->name == 'iWave' ? 'iWave<b>POS</b>' : $store->name; ?></span>
                <?php } else { ?>
                <span class="logo-mini">POS</span>
                <span class="logo-lg"><?= $Settings->site_name == 'iWave' ? 'iWave<b>POS</b>' : $Settings->site_name; ?></span>
                <?php } ?>
            </a>
            <?php } ?>
            <!-- end mod -->
            <nav class="navbar navbar-static-top" role="navigation">
                <ul class="nav navbar-nav pull-left">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="<?= $assets; ?>images/<?= $Settings->selected_language; ?>.png" alt="<?= $Settings->selected_language; ?>"></a>
                        <ul class="dropdown-menu">
                            <?php $scanned_lang_dir = array_map(function ($path) {
                                return basename($path);
                            }, glob(APPPATH . 'language/*', GLOB_ONLYDIR));
                            foreach ($scanned_lang_dir as $entry) { ?>
                            <li><a href="<?= site_url('pos/language/' . $entry); ?>"><img
                                src="<?= $assets; ?>images/<?= $entry; ?>.png"
                                class="language-img"> &nbsp;&nbsp;<?= ucwords($entry); ?></a></li>
                                <?php } ?>
                            </ul>
                        </li>
                    </ul>
                    
                    <div align="left" class="navbar-custom-menu" style="font-size:22px;">
                    
                        <ul class="nav navbar-nav">
                       <!--#mod #mod1 clock removed by zay yar at 23/3/2017 -->
                     
              <!--  <li><a href="#" class="clock"></a></li> -->
                            
                            <!-- mod added for waiter role by Nyi Nyi on 23rd Jan 2018 -->
                            <?php if (!$Waiter || !$Mobile_Caisher) {?>
                            <li><a href="<?= site_url(); ?>"><i class="fa fa-dashboard"></i></a></li>
                            <?php if ($Admin) { ?>
                            <li><a href="<?= site_url('settings'); ?>"><i class="fa fa-cogs"></i></a></li>
                            <?php } ?>
                            <?php if ($this->db->dbdriver != 'sqlite3') { ?>
                            <li><a href="<?= site_url('pos/view_bill'); ?>" target="_blank"><i class="fa fa-desktop"></i></a></li>
                            <?php } ?>
                            <li class="hidden-xs hidden-sm"><a href="<?= site_url('pos/shortcuts'); ?>" data-toggle="ajax"><i class="fa fa-key"></i></a></li>
                            <li><a href="<?= site_url('pos/register_details'); ?>" data-toggle="ajax"><?= lang('register_details'); ?></a></li>
                            <?php if (($Admin) || ($Manager)){ ?>
                            <li><a href="<?= site_url('pos/today_sale'); ?>" data-toggle="ajax"><?= lang('today_sale'); ?></a></li>
                            <?php } ?>
                            <li><a href="<?= site_url('pos/close_register'); ?>" data-toggle="ajax"><?= lang('close_register'); ?></a></li>
                            <?php //} ?>
                            <!-- mod added for waiter role to have refresh button on 26th Jan 2018 -->
                            <?php } elseif ($Waiter || $Mobile_Caisher) { ?>
                            <li><a href="<?= site_url('pos'); ?>"> <i class="fa fa-refresh"></i></a></li>
                            <?php } ?>
                            <!-- end mod -->
                            
                            <!-- end mod -->
                            <?php if ($suspended_sales) { ?>
                            <li class="dropdown notifications-menu" id="suspended_sales">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-bell-o"></i>
                                    <span class="label label-warning"><?=sizeof($suspended_sales);?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header">
                                        <input type="text" autocomplete="off" data-list=".list-suspended-sales" name="filter-suspended-sales" id="filter-suspended-sales" class="form-control input-sm kb-text clearfix" placeholder="<?= lang('filter_by_reference'); ?>">
                                    </li>
                                    <li>
                                        <ul class="menu">
                                            <li class="list-suspended-sales">
                                                <?php
                                                foreach ($suspended_sales as $ss) {
                                                    echo '<a href="'.site_url('pos/?hold='.$ss->id).'" class="load_suspended">'.$this->tec->hrld($ss->date).' ('.$ss->customer_name.')<br><div class="bold">'.$ss->hold_ref.'</div></a>';
                                                }
                                                ?>
                                            </li>
                                        </ul>
                                    </li>
                                    <!-- mod by Nyi Nyi on 23rd Jan 2018 to hide View All to restrict access to menu for waiter
                                    <?php if(!$Waiter) { ?>
                                    <li class="footer"><a href="<?= site_url('sales/opened'); ?>"><?= lang('view_all'); ?></a></li>
                                    <?php } ?>
                                    <!-- end mod -->
                                </ul>
                            </li>
                            <?php } ?>
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="<?= base_url('uploads/avatars/thumbs/'.($this->session->userdata('avatar') ? $this->session->userdata('avatar') : $this->session->userdata('gender').'.png')) ?>" class="user-image" alt="Avatar" />
                                    <span><?= $this->session->userdata('first_name').' '.$this->session->userdata('last_name'); ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="user-header">
                                        <img src="<?= base_url('uploads/avatars/'.($this->session->userdata('avatar') ? $this->session->userdata('avatar') : $this->session->userdata('gender').'.png')) ?>" class="img-circle" alt="Avatar" />
                                        <p>
                                            <?= $this->session->userdata('email'); ?>
                                            <small><?= lang('member_since').' '.$this->session->userdata('created_on'); ?></small>
                                        </p>
                                    </li>
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="<?= site_url('users/profile/'.$this->session->userdata('user_id')); ?>" class="btn btn-default btn-flat"><?= lang('profile'); ?></a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="<?= site_url('logout'); ?>" class="btn btn-default btn-flat<?= $this->session->userdata('register_id') ? ' sign_out' : ''; ?>"><?= lang('sign_out'); ?></a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            
                            <li>
                            <!-- mod by Nyi Nyi on 31st Jan 2018 -->
                            <?php if (config_item('is_restaurant')) { ?>
                                <a href="#" data-toggle="control-sidebar" class="sidebar-icon"><i class="fa fa-cutlery sidebar-icon"></i> Menu</a> 
                            <?php } else { ?>
                                <a href="#" data-toggle="control-sidebar" class="sidebar-icon"><i class="fa fa-folder sidebar-icon"></i> <?= lang('categories'); ?></a> 
                            <?php } ?>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>

            <!-- mod added for waiter role by Nyi Nyi on 23rd Jan 2018 -->
            <?php if (!$Waiter || $Mobile_Caisher) {?>
            <aside class="main-sidebar">
                <section class="sidebar">
                    <ul class="sidebar-menu">
                        
                        <li class="mm_welcome"><a href="<?= site_url(); ?>"><i class="fa fa-dashboard"></i> <span><?= lang('dashboard'); ?></span></a></li>         
                        <?php if ($Settings->multi_store && !$this->session->userdata('store_id')) { ?>
                        <li class="mm_stores"><a href="<?= site_url('stores'); ?>"><i class="fa fa-building-o"></i> <span><?= lang('stores'); ?></span></a></li>
                        <?php } ?>
                        <li class="mm_pos"><a href="<?= site_url('pos'); ?>"><i class="fa fa-th"></i> <span><?= lang('pos'); ?></span></a></li>

                        <!-- mod for manager role by Nyi Nyi on 3rd Aug 2017 -->
                        <?php if (($Admin) || ($Manager)) { ?>
                        <!-- end mod -->
                        <li class="treeview mm_products">
                            <a href="#">
                                <i class="fa fa-barcode"></i>
                                <span><?= lang('products'); ?></span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li id="products_index"><a href="<?= site_url('products'); ?>"><i class="fa fa-circle-o"></i> <?= lang('list_products'); ?></a></li>
                                <li id="products_add"><a href="<?= site_url('products/add'); ?>"><i class="fa fa-circle-o"></i> <?= lang('add_product'); ?></a></li>

                                <li id="products_import"><a href="<?= site_url('products/import'); ?>"><i class="fa fa-circle-o"></i> <?= lang('import_products'); ?></a></li>
                                <li class="divider"></li>
                                
                                
                                <li id="unit"><a href="<?= site_url('products/list_units'); ?>"><i class="fa fa-circle-o"></i> <?= lang('list_units'); ?></a></li>
                                 <li id="unit_add"><a href="<?= site_url('products/unit_add'); ?>"><i class="fa fa-circle-o"></i> <?= lang('add_unit'); ?></a></li>           
                                 
                              <?php if(!config_item('is_restaurant')) { ?>
                              <li id="brand"><a href="<?= site_url('products/list_brands'); ?>"><i class="fa fa-circle-o"></i> <?= lang('list_brands'); ?></a></li>
                                <li id="brand"><a href="<?= site_url('products/brands_add'); ?>"><i class="fa fa-circle-o"></i> <?= lang('add_brands'); ?></a></li>
                                <?php } ?>
                                <li class="divider"></li>
                                <li id="products_print_barcodes">
                                    <a onclick="window.open('<?= site_url('products/print_barcodes'); ?>', 'pos_popup', 'width=900,height=600,menubar=yes,scrollbars=yes,status=no,resizable=yes,screenx=0,screeny=0'); return false;" href="#"><i class="fa fa-circle-o"></i> <?= lang('print_barcodes'); ?></a>
                                </li>
                                <li id="products_print_labels">
                                    <a onclick="window.open('<?= site_url('products/print_labels'); ?>', 'pos_popup', 'width=900,height=600,menubar=yes,scrollbars=yes,status=no,resizable=yes,screenx=0,screeny=0'); return false;" href="#"><i class="fa fa-circle-o"></i> <?= lang('print_labels'); ?></a>
                                </li>
                            </ul>
                        </li>
                        
                        <li class="treeview mm_categories">
                            <a href="#">
                                <i class="fa fa-folder"></i>
                                <span><?= lang('categories'); ?></span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li id="categories_index"><a href="<?= site_url('categories'); ?>"><i class="fa fa-circle-o"></i> <?= lang('list_categories'); ?></a></li>
                                <li id="categories_add"><a href="<?= site_url('categories/add'); ?>"><i class="fa fa-circle-o"></i> <?= lang('add_category'); ?></a></li>
                                <li id="categories_import"><a href="<?= site_url('categories/import'); ?>"><i class="fa fa-circle-o"></i> <?= lang('import_categories'); ?></a></li>
                            </ul>
                        </li>
                        <?php if(config_item('order_tracking') && config_item('is_restaurant')){ ?>
                        <li class="treeview mm_categories">
                            <a href="#">
                                <i class="fa fa-check-square-o"></i>
                                <span><?= lang('orders'); ?></span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                 <li id="categories_index"><a href="<?= site_url('orders/list_orders'); ?>"><i class="fa fa-circle-o"></i> <?= lang('list_orders'); ?></a></li>
                                 <li id="categories_index"><a href="<?= site_url('orders'); ?>"><i class="fa fa-circle-o"></i> <?= lang('list_orders_details'); ?></a></li>
                            </ul>
                        </li>
                       <?php } ?>
                        <?php if ($this->session->userdata('store_id')) { ?>
                        <li class="treeview mm_sales">
                            <a href="#">
                                <i class="fa fa-shopping-cart"></i>
                                <span><?= lang('sales'); ?></span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li id="sales_index"><a href="<?= site_url('sales'); ?>"><i class="fa fa-circle-o"></i> <?= lang('list_sales'); ?></a></li>
                                <li id="sales_opened"><a href="<?= site_url('sales/opened'); ?>"><i class="fa fa-circle-o"></i> <?= lang('list_opened_bills'); ?></a></li>
                            </ul>
                        </li>
                       
                        <li class="treeview mm_purchases">
                            <a href="#">
                                <i class="fa fa-plus"></i>
                                <span><?= lang('purchases'); ?></span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li id="purchases_index"><a href="<?= site_url('purchases'); ?>"><i class="fa fa-circle-o"></i> <?= lang('list_purchases'); ?></a></li>
                                <li id="purchases_add"><a href="<?= site_url('purchases/add'); ?>"><i class="fa fa-circle-o"></i> <?= lang('add_purchase'); ?></a></li>
                                <li class="divider"></li>
                                <li id="purchases_expenses"><a href="<?= site_url('purchases/expenses'); ?>"><i class="fa fa-circle-o"></i> <?= lang('list_expenses'); ?></a></li>
                                <li id="purchases_add_expense"><a href="<?= site_url('purchases/add_expense'); ?>"><i class="fa fa-circle-o"></i> <?= lang('add_expense'); ?></a></li>
                                <li id="list_expense_category"><a href="<?= site_url('purchases/expense_category_list'); ?>"><i class="fa fa-circle-o"></i> <?= lang('expense_category_list'); ?></a></li>
                                <li id="add_expense_category"><a href="<?= site_url('purchases/expense_category_add'); ?>"><i class="fa fa-circle-o"></i> <?= lang('add_expense_category'); ?></a></li>
                            </ul>
                        </li>
                        <?php } 
                        if(config_item('gift_card')){
                        ?>
                        <li class="treeview mm_gift_cards">
                            <a href="#">
                                <i class="fa fa-credit-card"></i>
                                <span><?= lang('gift_cards'); ?></span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li id="gift_cards_index"><a href="<?= site_url('gift_cards'); ?>"><i class="fa fa-circle-o"></i> <?= lang('list_gift_cards'); ?></a></li>
                                <li id="gift_cards_add"><a href="<?= site_url('gift_cards/add'); ?>"><i class="fa fa-circle-o"></i> <?= lang('add_gift_card'); ?></a></li>
                            </ul>
                        </li>
                        <?php } // end mod by mtk
                        ?> 

                        <li class="treeview mm_auth mm_customers mm_suppliers">
                            <a href="#">
                                <i class="fa fa-users"></i>
                                <span><?= lang('people'); ?></span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li id="auth_users"><a href="<?= site_url('users'); ?>"><i class="fa fa-circle-o"></i> <?= lang('list_users'); ?></a></li>
                                <li id="auth_add"><a href="<?= site_url('users/add'); ?>"><i class="fa fa-circle-o"></i> <?= lang('add_user'); ?></a></li>
                                <li class="divider"></li>
                                <li id="customers_index"><a href="<?= site_url('customers'); ?>"><i class="fa fa-circle-o"></i> <?= lang('list_customers'); ?></a></li>
                                <li id="customers_add"><a href="<?= site_url('customers/add'); ?>"><i class="fa fa-circle-o"></i> <?= lang('add_customer'); ?></a></li>
                                <li class="divider"></li>
                                <li id="suppliers_index"><a href="<?= site_url('suppliers'); ?>"><i class="fa fa-circle-o"></i> <?= lang('list_suppliers'); ?></a></li>
                                <li id="suppliers_add"><a href="<?= site_url('suppliers/add'); ?>"><i class="fa fa-circle-o"></i> <?= lang('add_supplier'); ?></a></li>
                            </ul>
                        </li>

                        <!-- mod for manager role by Nyi Nyi on 3rd Aug 2017 -->
                        <?php if ($Admin)  { ?>
                        <!-- end mod -->
                        <li class="treeview mm_settings">
                            <a href="#">
                                <i class="fa fa-cogs"></i>
                                <span><?= lang('settings'); ?></span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li id="settings_index"><a href="<?= site_url('settings'); ?>"><i class="fa fa-circle-o"></i> <?= lang('settings'); ?></a></li>
                                <li class="divider"></li>
                                <?php if ($Settings->multi_store) { ?>
                                <li id="settings_stores"><a href="<?= site_url('settings/stores'); ?>"><i class="fa fa-circle-o"></i> <?= lang('stores'); ?></a></li>
                                <li id="settings_add_store"><a href="<?= site_url('settings/add_store'); ?>"><i class="fa fa-circle-o"></i> <?= lang('add_store'); ?></a></li>
                                <li class="divider"></li>
                                <?php } ?>
                                <li id="settings_printers"><a href="<?= site_url('settings/printers'); ?>"><i class="fa fa-circle-o"></i> <?= lang('printers'); ?></a></li>
                                <li id="settings_add_printer"><a href="<?= site_url('settings/add_printer'); ?>"><i class="fa fa-circle-o"></i> <?= lang('add_printer'); ?></a></li>
                                <li class="divider"></li>
                                <?php if ($this->db->dbdriver != 'sqlite3') { ?>
                                <li id="settings_backups"><a href="<?= site_url('settings/backups'); ?>"><i class="fa fa-circle-o"></i> <?= lang('backups'); ?></a></li>
                                <?php } ?>
                   <!--             <li id="settings_updates"><a href="<?= site_url('settings/updates'); ?>"><i class="fa fa-circle-o"></i> <?= lang('updates'); ?></a></li> -->
                            </ul>
                        </li>
                         <?php } ?>
                         <?php if((($Manager)  && (config_item('manager_view_report')) ) || ($Admin)){ ?>
                        <li class="treeview mm_reports">
                            <a href="#">
                                <i class="fa fa-bar-chart-o"></i>
                                <span><?= lang('reports'); ?></span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li id="reports_daily_sales"><a href="<?= site_url('reports/daily_sales'); ?>"><i class="fa fa-circle-o"></i> <?= lang('daily_sales'); ?></a></li>
                                <li id="reports_monthly_sales"><a href="<?= site_url('reports/monthly_sales'); ?>"><i class="fa fa-circle-o"></i> <?= lang('monthly_sales'); ?></a></li>
                                <li id="reports_index"><a href="<?= site_url('reports'); ?>"><i class="fa fa-circle-o"></i> <?= lang('sales_report'); ?></a></li>
                                <!-- mod by mtk for sale details report at 8 Feb 2019-->
                                <li id="reports_sale_details"><a href="<?= site_url('reports/sale_details'); ?>"><i class="fa fa-circle-o"></i> <?= lang('sale_details_report'); ?></a></li>
                                <!-- end mod by mtk -->
                                <li class="divider"></li>
                                <li id="reports_payments"><a href="<?= site_url('reports/payments'); ?>"><i class="fa fa-circle-o"></i> <?= lang('payments_report'); ?></a></li>
                                <li class="divider"></li>
                                <li id="reports_registers"><a href="<?= site_url('reports/registers'); ?>"><i class="fa fa-circle-o"></i> <?= lang('registers_report'); ?></a></li>
                                <li class="divider"></li>
                                <li id="reports_top_products"><a href="<?= site_url('reports/top_products'); ?>"><i class="fa fa-circle-o"></i> <?= lang('top_products'); ?></a></li>
                                <li id="reports_products"><a href="<?= site_url('reports/products'); ?>"><i class="fa fa-circle-o"></i> <?= lang('products_report'); ?></a></li>
                            </ul>
                        </li>
                         <?php } ?>
                        <?php } else { ?>
                        
                        <li class="mm_products"><a href="<?= site_url('products'); ?>"><i class="fa fa-barcode"></i> <span><?= lang('products'); ?></span></a></li>
                        <li class="mm_categories"><a href="<?= site_url('categories'); ?>"><i class="fa fa-folder-open"></i> <span><?= lang('categories'); ?></span></a></li>
                        <?php if ($this->session->userdata('store_id')) { ?>   
                        <li class="treeview mm_sales">
                            <a href="#">
                                <i class="fa fa-shopping-cart"></i>
                                <span><?= lang('sales'); ?></span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <?php if (($Staff) && config_item('staff_view_sales')) { ?>
                                <li id="sales_index"><a href="<?= site_url('sales'); ?>"><i class="fa fa-circle-o"></i> <?= lang('list_sales'); ?></a></li>
                                <?php } ?>
                                <li id="sales_opened"><a href="<?= site_url('sales/opened'); ?>"><i class="fa fa-circle-o"></i> <?= lang('list_opened_bills'); ?></a></li>
                            </ul>
                        </li>
                    
                        <li class="treeview mm_purchases">
                            <a href="#">
                                <i class="fa fa-plus"></i>
                                <span><?= lang('expenses'); ?></span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li id="purchases_expenses"><a href="<?= site_url('purchases/expenses'); ?>"><i class="fa fa-circle-o"></i> <?= lang('list_expenses'); ?></a></li>
                                <li id="purchases_add_expense"><a href="<?= site_url('purchases/add_expense'); ?>"><i class="fa fa-circle-o"></i> <?= lang('add_expense'); ?></a></li>
                            </ul>
                        </li>
                        <?php } 
                        if(config_item('gift_card')){ //mod by mtk at 28 Feb 2019 for showing gift card
                        ?>
                        <li class="treeview mm_gift_cards">
                            <a href="#">
                                <i class="fa fa-credit-card"></i>
                                <span><?= lang('gift_cards'); ?></span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li id="gift_cards_index"><a href="<?= site_url('gift_cards'); ?>"><i class="fa fa-circle-o"></i> <?= lang('list_gift_cards'); ?></a></li>
                                <li id="gift_cards_add"><a href="<?= site_url('gift_cards/add'); ?>"><i class="fa fa-circle-o"></i> <?= lang('add_gift_card'); ?></a></li>
                            </ul>
                        </li>
                        <?php } // end mod by mtk
                        ?>

                        <li class="treeview mm_customers">
                            <a href="#">
                                <i class="fa fa-users"></i>
                                <span><?= lang('customers'); ?></span>
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <li id="customers_index"><a href="<?= site_url('customers'); ?>"><i class="fa fa-circle-o"></i> <?= lang('list_customers'); ?></a></li>

                                <li id="customers_add"><a href="<?= site_url('customers/add'); ?>"><i class="fa fa-circle-o"></i> <?= lang('add_customer'); ?></a></li>
                            </ul>
                        </li>
                        <?php } ?>
                    </ul>
                </section>
            </aside>
            <?php } ?>
            <!-- end mod -->

            <div class="content-wrapper">

                <div class="col-lg-12 alerts">
                <?php if ($error)  { ?>
                    <div class="alert alert-danger alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <h4><i class="icon fa fa-ban"></i> <?= lang('error'); ?></h4>
                        <?= $error; ?>
                    </div>
                    <?php } if ($message) { ?>
                    <div class="alert alert-success alert-dismissable">
                        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                        <h4><i class="icon fa fa-check"></i> <?= lang('Success'); ?></h4>
                        <?= $message; ?>
                    </div>
                    <?php } ?>
                </div>

                <!-- mob by Nyi Nyi on 31st Jan 2018 for waiter pos screen layout -->
                <?php if($Waiter || $Mobile_Caisher) { ?>
                
                <!-- <table style="width:100%;" class="layout-table">  -->
                    
                            <div id="pos">
                                <?= form_open('pos', 'id="pos-sale-form"'); ?>
                                <div class="well well-sm" id="leftdiv">
                                    <div id="lefttop" style="margin-bottom:5px;">
            
                                        <div class="form-group" style="margin-bottom:5px;font-size:24px;">
                                            <div class="input-group">
                                                <?php foreach($customers as $customer){
                                                            $cus[$customer->id] = $customer->name;
                                                  } ?>
                                                <?= form_dropdown('customer_id', $cus, set_value('customer_id', $Settings->default_customer), 'id="spos_customer" data-placeholder="' . lang("select") . ' ' . lang("customer") . '" required="required" class="form-control select2" style="width:100%;position:absolute;"'); ?>
                                                <div class="input-group-addon no-print" style="padding: 2px 5px;">
                                                    <a href="#" id="add-customer" class="external" data-toggle="modal" data-target="#myModal"><i class="fa fa-2x fa-plus-circle" id="addIcon"></i></a>
                                                </div>
                                            </div>
                                            <div style="clear:both;"></div>
                                        </div>
                                        <?php if ($eid && $Admin) { ?>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <?= form_input('date', set_value('date', $sale->date), 'id="date" required="required" class="form-control"'); ?>
                                        </div>
                                        <?php } ?>
                                        <div class="form-group" style="margin-bottom:5px;font-size:24px;">
                                            <input type="text" name="hold_ref" value="<?= $reference_note; ?>" id="hold_ref" class="form-control kb-text" placeholder="<?=lang('reference_note')?>" />
                                        </div>

                                        <!-- mod by Nyi Nyi on 31st Jan 2018 -->
                                        <?php if(!$Waiter || !$Mobile_Caisher) { ?>
                                        <div class="form-group" style="margin-bottom:5px;">
                                            <input type="text" name="code" id="add_item" class="form-control" placeholder="<?=lang('search__scan')?>" />
                                        </div>
                                        <?php } ?>
                                        <!-- end mod -->
                                    </div>
                                    <div id="printhead" class="print">
                                        <?= $Settings->header; ?>
                                        <p><?= lang('date'); ?>: <?=date($Settings->dateformat)?></p>
                                    </div>
                                    <div id="print" class="fixed-table-container">
                                        <div id="list-table-div">
                                            <div class="fixed-table-header">
                                                <table class="table table-striped table-condensed table-hover list-table" style="margin:0;font-size:16px;">
                                                    <thead>
                                                        <tr class="success">
                                                            <th><?=lang('product')?></th>
                                                            <th style="width: 15%;text-align:center;"><?=lang('price')?></th>
                                                            <th style="width: 15%;text-align:center;"><?=lang('qty')?></th>
                                                            <th style="width: 20%;text-align:center;"><?=lang('subtotal')?></th>
                                                            <th style="width: 20px;" class="satu"><i class="fa fa-trash-o"></i></th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                         <table id="posTable" class="table table-responsive table-striped table-condensed table-hover list-table" style="margin:0;font-size:16px;">
                                                <thead>
                                                    <tr class="success">
                                                        <th><?=lang('product')?></th>
                                                        <th style="width: 15%;text-align:center;"><?=lang('price')?></th>
                                                        <th style="width: 15%;text-align:center;"><?=lang('qty')?></th>
                                                        <th style="width: 20%;text-align:center;"><?=lang('subtotal')?></th>
                                                        <th style="width: 50px;" class="satu"><i class="fa fa-trash-o"></i></th>
                                                    </tr>
                                                </thead>
                                                <tbody></tbody>
                                            </table>
                                        </div>
                                        <div style="clear:both;"></div>
                                        <div id="totaldiv">
                           <table id="totaltbl" class="table table-condensed totals" style="margin-bottom:5px;font-weight:bold;font-size:18px;">
                                                <tbody>
                                                    <tr class="info">
                                                        <td width="25%"><?=lang('total_items')?></td>
                                                        <td class="text-right" style="padding-right:10px;"><span id="count">0</span></td>
                                                        <td width="25%"><?=lang('total')?></td>
                                                        <td class="text-right" colspan="2"><span id="total">0</span></td>
                                                    </tr>
                                                    <tr class="info">
                                                        <td width="25%"><a href="#" id="add_discount"><?=lang('discount')?></a></td>
                                                        <td class="text-right" style="padding-right:10px;"><span id="ds_con">0</span></td>
                                                        <td width="25%"><a href="#" id="add_tax"><?=lang('order_tax')?></a></td>
                                                        <td class="text-right"><span id="ts_con">0</span></td>
                                                    </tr>
                                                    <!-- mod by nyi nyi on 8th Jan 2018 for service charges -->
                                                    <?php if (config_item('is_restaurant') && config_item('service_charges')){ ?>
                                                    <tr class="info">
                                                        <td width="40%"><a href="#" id="add_sc"><?=lang('service_charges')?></a></td><!-- mod by mtk at 26 Feb 2019 for service charges -->
                                                        <td class="text-right" style="padding-right:10px;"><span id="sc_con">0</span></td>
                                                        <td width="10%"></td>
                                                        <td class="text-right" style="padding-right:10px;"><span id="nothing"></span></td> 
                                                    </tr>
                                                    <?php } ?>
                                                    <!-- end mod -->
                                                    <tr class="success">
                                                        <td colspan="2" style="font-weight:bold;font-size:18px;">
                                                            <?=lang('total_payable')?>
                                                            <a role="button" data-toggle="modal" data-target="#noteModal">
                                                                <i class="fa fa-comment"></i>
                                                            </a>
                                                        </td>
                                                         <td class="text-right" colspan="2" style="font-weight:bold;font-size:18px;"><span id="total-payable">0</span></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div id="botbuttons" class="col-xs-12 text-center">
                                        <div class="row">
                                            <!-- mod by nyi nyi on 8th Jan 2018 to show / hide order & bill -->
                                                <?php if (config_item('is_restaurant')){ ?>
                                            <div class="col-xs-4" style="padding: 0;">
                                                <?php } else { ?>
                                                <div class="col-xs-6" style="padding: 0;">
                                                <?php } ?>
                                                <div class="btn-group-vertical btn-block">
                                                    <button type="button" class="btn btn-warning btn-block btn-flat"
                                                    id="suspend" style="height:48px;font-size:20px;"><?= lang('hold'); ?></button>
                                                    <!-- mod by Nyi Nyi to show/hide bill/payment for waiter role -->
                                                        <?php if (($this->Admin) || ($this->Manager)  || ($this->Staff) || ((($this->Waiter) &&(config_item('waiter_settle_payment')))) || ((($this->Mobile_Caisher) &&(config_item('mobile_caisher_settle_payment'))))){ ?>
                                                    <button type="button" class="btn btn-danger btn-block btn-flat"
                                                  id="reset" style="height:48px;font-size:20px;"><?= lang('cancel'); ?></button>
                                                  <?php } ?>
                                                        <!-- end mod -->
                                                </div>

                                                </div>
                                                
                                                <?php if (config_item('is_restaurant')){ ?>
                                                <div class="col-xs-4" style="padding: 0 5px;">
                                                    <div class="btn-group-vertical btn-block">
                                                        <button type="button" class="btn bg-purple btn-block btn-flat" id="print_order" style="height:48px;font-size:20px;"><?= lang('print_order'); ?></button>
                                                        
                                                        <!-- mod by Nyi Nyi to show/hide bill/payment for waiter role -->
                                                        <?php if (($this->Admin) || ($this->Manager) || ($this->Staff) || ((($this->Waiter) &&(config_item('waiter_settle_payment')))) || ((($this->Mobile_Caisher) &&(config_item('mobile_caisher_settle_payment'))))){ ?>
                                                        <button type="button" class="btn bg-navy btn-block btn-flat" id="print_bill" style="height:48px;font-size:20px;"><?= lang('print_bill'); ?></button>
                                                        <?php } ?>
                                                        <!-- end mod -->
                                                    </div>
                                                </div>
                                                <?php } ?>
                                                
                                                
                                                <?php if (config_item('is_restaurant')){ ?>
                                            <div class="col-xs-4" style="padding: 0;">
                                                <?php } else { ?>
                                                <div class="col-xs-6" style="padding: 0;">
                                                <?php } ?>
                                                <!-- end mod -->
                                                    <!-- mod by Nyi Nyi to show/hide bill/payment for waiter role -->
                                                    <?php if (($this->Admin) || ($this->Manager) || ($this->Staff) || ((($this->Waiter) &&(config_item('waiter_settle_payment')))) || ((($this->Mobile_Caisher) &&(config_item('mobile_caisher_settle_payment'))))){ ?>
                                                    <button type="button" class="btn btn-success btn-block btn-flat" id="<?= $eid ? 'submit-sale' : 'payment'; ?>" style="height:96px;font-size:18px;"><?= $eid ? lang('submit') : lang('payment'); ?></button>
                                                    <?php } else { ?>
                                                     <button type="button" class="btn btn-danger btn-block btn-flat"
                                                  id="reset" style="height:48px;font-size:18px;"><?= lang('cancel'); ?></button>
                                                  <?php } ?>
                                                        <!-- end mod -->
                                                </div>
                                            </div>

                                    </div>
                                    <div class="clearfix"></div>
                                    <span id="hidesuspend"></span>
                                    <input type="hidden" name="spos_note" value="" id="spos_note">

                                    <div id="payment-con">
                                        <input type="hidden" name="amount" id="amount_val" value="<?= $eid ? $sale->paid : ''; ?>"/>
                                        <input type="hidden" name="balance_amount" id="balance_val" value=""/>
                                        <input type="hidden" name="paid_by" id="paid_by_val" value="cash"/>
                                        <input type="hidden" name="cc_no" id="cc_no_val" value=""/>
                                        <input type="hidden" name="paying_gift_card_no" id="paying_gift_card_no_val" value=""/>
                                        <input type="hidden" name="cc_holder" id="cc_holder_val" value=""/>
                                        <input type="hidden" name="cheque_no" id="cheque_no_val" value=""/>
                                        <input type="hidden" name="cc_month" id="cc_month_val" value=""/>
                                        <input type="hidden" name="cc_year" id="cc_year_val" value=""/>
                                        <input type="hidden" name="cc_type" id="cc_type_val" value=""/>
                                        <input type="hidden" name="cc_cvv2" id="cc_cvv2_val" value=""/>
                                        <input type="hidden" name="balance" id="balance_val" value=""/>
                                        <input type="hidden" name="payment_note" id="payment_note_val" value=""/>
                                    </div>
                                    <input type="hidden" name="customer" id="customer" value="<?=$Settings->default_customer?>" />
                                    <input type="hidden" name="order_tax" id="tax_val" value="" />
                                    <!-- mod by nyi nyi on 8th Jan 2018 for service charges -->
                                    <input type="hidden" name="service_charges" id="sc_val" value="" /><!-- mod by mtk at 26 Feb 2019 for service charges --> 
                                    <!-- end mod -->
                                    <input type="hidden" name="order_discount" id="discount_val" value="" />
                                    <input type="hidden" name="count" id="total_item" value="" />
                                    <input type="hidden" name="did" id="is_delete" value="<?=$sid;?>" />
                                    <input type="hidden" name="eid" id="is_delete" value="<?=$eid;?>" />
                                    <input type="hidden" name="total_items" id="total_items" value="" />
                                     <input type="hidden" name="capacity" id="capacity" value=""/>
                                    <input type="hidden" name="total_quantity" id="total_quantity" value="" />
                                    <input type="submit" id="submit" value="Submit Sale" style="display: none;" />
                                </div>
                                <?=form_close();?>
                            </div>
                            
                            <div class="contents" id="right-col">
                                    <div id="item-list">
                                        <div class="items">
                                            <?php echo $products; ?>
                                        </div>
                                    </div>
                                    <div class="product-nav">
                                        <div class="btn-group btn-group-justified">
                                            <div class="btn-group">
                                                <button style="z-index:10002;font-size:18px;" class="btn btn-default pos-tip btn-flat" type="button" id="previous"><i class="fa fa-chevron-left"></i></button>
                                            </div>
                                            
                                             <div class="btn-group">
                                                <button style="z-index:10003;font-size:18px;" class="btn bg-blue pos-tip btn-flat" type="button" id=""><?= "iWave POS" ?></button>
                                            </div>
                                            
                                            <div class="btn-group">
                                                <button style="z-index:10004;font-size:18px;" class="btn btn-default pos-tip btn-flat" type="button" id="next"><i class="fa fa-chevron-right"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <!-- </td> -->
                            <!-- <td> -->
                                
                            <!-- </td> -->
                        <!-- </tr> -->
                    <!-- </table> -->
                <!-- end waiter pos screen layout -->
                <?php } else { ?>
                
                <table style="width:100%;" class="layout-table"> 
                    <tr>
                        <!-- mod by Nyi Nyi on 31st Jan 2018 -->
                        <?php if (!$Waiter || !$Mobile_Caisher) { ?>
                        <td style="width: 460px;height: 100%">
                        <?php } ?>
                        <!-- end mod -->
                            <div id="pos">
                                <?= form_open('pos', 'id="pos-sale-form"'); ?>
                                <div class="well well-sm" id="leftdiv">
                                    <div id="lefttop" style="margin-bottom:2px;">
            <!--<div class="form-group" style="margin-bottom:2px;">
                <div class="row">

                    <div class="col-sm-6">
                    <?= lang('sale_type') ?>
                    </div>
                    <div class="col-sm-6">
                    <input type="button" class="btn btn-link" style="background-color: #ffffff" name="sale_type" id="take_away" value="Take Away">

                    <input type="button" class="btn btn-link" style="background-color: #ffffff" name="sale_type" id="dine_in" value="Dine In">
                    </div>
                </div> 
            <div style="clear:both;"></div>
            </div>-->
                                        <div class="form-group" style="margin-bottom:2px;">
                                            <div class="input-group">
                                                <?php foreach($customers as $customer){
                                                            $cus[$customer->id] = $customer->name;
                                                  } ?>
                                                <?= form_dropdown('customer_id', $cus, set_value('customer_id', $Settings->default_customer), 'id="spos_customer" data-placeholder="' . lang("select") . ' ' . lang("customer") . '" required="required" class="form-control select2" style="width:100%;position:absolute;"'); ?>
                                                <div class="input-group-addon no-print" style="padding: 2px 5px;">
                                                    <a href="#" id="add-customer" class="external" data-toggle="modal" data-target="#myModal"><i class="fa fa-2x fa-plus-circle" id="addIcon"></i></a>
                                                </div>
                                            </div>
                                            <div style="clear:both;"></div>
                                        </div>
                                        <?php if ($eid && $Admin) { ?>
                                        <div class="form-group" style="margin-bottom:2px;">
                                            <?= form_input('date', set_value('date', $sale->date), 'id="date" required="required" class="form-control"'); ?>
                                        </div>
                                        <?php } ?>
                                        <div class="form-group" style="margin-bottom:2px;">
                                            <input type="text" name="hold_ref" value="<?= $reference_note; ?>" id="hold_ref" class="form-control kb-text" placeholder="<?=lang('reference_note')?>" />
                                        </div>
                                        <!-- mod by Nyi Nyi on 31st Jan 2018 -->
                                        <?php if(!$Waiter || !$Mobile_Caisher) { ?>
                                        <div class="form-group" style="margin-bottom:2px;">
                                            <input type="text" name="code" id="add_item" class="form-control" placeholder="<?=lang('search__scan')?>" />
                                        </div>
                                        <?php } ?>
                                        <!-- end mod -->
                                    </div>
                                    <div id="printhead" class="print">
                                        <?= $Settings->header; ?>
                                        <p><?= lang('date'); ?>: <?=date($Settings->dateformat)?></p>
                                    </div>
                                    <div id="print" class="fixed-table-container">
                                        <div id="list-table-div">
                                            <div class="fixed-table-header">
                                                <table class="table table-striped table-condensed table-hover list-table" style="margin:0;">
                                                    <thead>
                                                        <tr class="success">
                                                            <th><?=lang('product')?></th>
                                                            <th style="width: 15%;text-align:center;"><?=lang('price')?></th>
                                                            <th style="width: 15%;text-align:center;"><?=lang('qty')?></th>
                                                            <th style="width: 20%;text-align:center;"><?=lang('subtotal')?></th>
                                                            <th style="width: 20px;" class="satu"><i class="fa fa-trash-o"></i></th>
                                                        </tr>
                                                    </thead>
                                                </table>
                                            </div>
                                         <table id="posTable" class="table table-striped table-condensed table-hover list-table" style="margin:0;font-size:16px;">
                                                <thead>
                                                    <tr class="success">
                                                        <th><?=lang('product')?></th>
                                                        <th style="width: 15%;text-align:center;"><?=lang('price')?></th>
                                                        <th style="width: 15%;text-align:center;"><?=lang('qty')?></th>
                                                        <th style="width: 20%;text-align:center;"><?=lang('subtotal')?></th>
                                                        <th style="width: 20px;" class="satu"><i class="fa fa-trash-o"></i></th>
                                                    </tr>
                                                </thead>
                                                <tbody></tbody>
                                            </table>
                                        </div>
                                        <div style="clear:both;"></div>
                                        <div id="totaldiv">
                           <table id="totaltbl" class="table table-condensed totals" style="margin-bottom:5px;font-weight:bold;font-size:16px;">
                                                <tbody>
                                                    <tr class="info">
                                                        <td width="25%"><?=lang('total_items')?></td>
                                                        <td class="text-right" style="padding-right:10px;"><span id="count">0</span></td>
                                                        <td width="25%"><?=lang('total')?></td>
                                                        <td class="text-right" colspan="2"><span id="total">0</span></td>
                                                    </tr>
                                                    <tr class="info">
                                                        <td width="25%"><a href="#" id="add_discount"><?=lang('discount')?></a></td>
                                                        <td class="text-right" style="padding-right:10px;"><span id="ds_con">0</span></td>
                                                        <td width="25%"><a href="#" id="add_tax"><?=lang('order_tax')?></a></td>
                                                        <td class="text-right"><span id="ts_con">0</span></td>
                                                    </tr>
                                                    <!-- mod by nyi nyi on 8th Jan 2018 for service charges -->
                                                    <?php if (config_item('is_restaurant') && config_item('service_charges')){ ?>
                                                    <tr class="info">
                                                        <td width="40%"><a href="#" id="add_sc"><?=lang('service_charges')?></a></td><!-- mod by mtk at 26 Feb 2019 for service charges -->
                                                        <td class="text-right" style="padding-right:10px;"><span id="sc_con">0</span></td>
                                                        <td width="10%"></td>
                                                        <td class="text-right" style="padding-right:10px;"><span id="nothing"></span></td> 
                                                    </tr>
                                                    <?php } ?>
                                                    <!-- end mod -->
                                                    <tr class="success">
                                                        <td colspan="2" style="font-weight:bold;font-size:18px;">
                                                            <?=lang('total_payable')?>
                                                            <a role="button" data-toggle="modal" data-target="#noteModal">
                                                                <i class="fa fa-comment"></i>
                                                            </a>
                                                        </td>
                                                         <td class="text-right" colspan="2" style="font-weight:bold;font-size:18px;"><span id="total-payable">0</span></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div id="botbuttons" class="col-xs-12 text-center">
                                        <div class="row">
                                            <!-- mod by nyi nyi on 8th Jan 2018 to show / hide order & bill -->
                                                <?php if (config_item('is_restaurant')){ ?>
                                            <div class="col-xs-4" style="padding: 0;">
                                                <?php } else { ?>
                                                <div class="col-xs-6" style="padding: 0;">
                                                <?php } ?>
                                                <div class="btn-group-vertical btn-block">
                                                    <button type="button" class="btn btn-warning btn-block btn-flat"
                                                    id="suspend" style="height:48px;font-size:18px;"><?= lang('hold'); ?></button>
                                                    <!-- mod by Nyi Nyi to show/hide bill/payment for waiter role -->
                                                        <?php if (($this->Admin) || ($this->Manager)  || ($this->Staff) || ((($this->Waiter) &&(config_item('waiter_settle_payment')))) || ((($this->Mobile_Caisher) &&(config_item('mobile_caisher_settle_payment'))))){ ?>
                                                    <button type="button" class="btn btn-danger btn-block btn-flat"
                                                  id="reset" style="height:48px;font-size:18px;"><?= lang('cancel'); ?></button>
                                                  <?php } ?>
                                                        <!-- end mod -->
                                                </div>

                                                </div>
                                                
                                                <?php if (config_item('is_restaurant')){ ?>
                                                <div class="col-xs-4" style="padding: 0 5px;">
                                                    <div class="btn-group-vertical btn-block">
                                                        <button type="button" class="btn bg-purple btn-block btn-flat" id="print_order" style="height:48px;font-size:18px;"><?= lang('print_order'); ?></button>
                                                        
                                                        <!-- mod by Nyi Nyi to show/hide bill/payment for waiter role -->
                                                        <?php if (($this->Admin) || ($this->Manager) || ($this->Staff) || ((($this->Waiter) &&(config_item('waiter_settle_payment')))) || ((($this->Mobile_Caisher) &&(config_item('mobile_caisher_settle_payment'))))){ ?>
                                                        <button type="button" class="btn bg-navy btn-block btn-flat" id="print_bill" style="height:48px;font-size:18px;"><?= lang('print_bill'); ?></button>
                                                        <?php } ?>
                                                        <!-- end mod -->
                                                    </div>
                                                </div>
                                                <?php } ?>
                                                
                                                
                                                <?php if (config_item('is_restaurant')){ ?>
                                            <div class="col-xs-4" style="padding: 0;">
                                                <?php } else { ?>
                                                <div class="col-xs-6" style="padding: 0;">
                                                <?php } ?>
                                                <!-- end mod -->
                                                    <!-- mod by Nyi Nyi to show/hide bill/payment for waiter role -->
                                                    <?php if (($this->Admin) || ($this->Manager) || ($this->Staff) || ((($this->Waiter) &&(config_item('waiter_settle_payment')))) || ((($this->Mobile_Caisher) &&(config_item('mobile_caisher_settle_payment'))))){ ?>
                                                    <button type="button" class="btn btn-success btn-block btn-flat" id="<?= $eid ? 'submit-sale' : 'payment'; ?>" style="height:96px;font-size:18px;"><?= $eid ? lang('submit') : lang('payment'); ?></button>
                                                    <?php } else { ?>
                                                     <button type="button" class="btn btn-danger btn-block btn-flat"
                                                  id="reset" style="height:48px;font-size:18px;"><?= lang('cancel'); ?></button>
                                                  <?php } ?>
                                                        <!-- end mod -->
                                                </div>
                                            </div>

                                    </div>
                                    <div class="clearfix"></div>
                                    <span id="hidesuspend"></span>
                                    <input type="hidden" name="spos_note" value="" id="spos_note">

                                    <div id="payment-con">
                                        <input type="hidden" name="amount" id="amount_val" value="<?= $eid ? $sale->paid : ''; ?>"/>
                                        <input type="hidden" name="balance_amount" id="balance_val" value=""/>
                                        <input type="hidden" name="paid_by" id="paid_by_val" value="cash"/>
                                        <input type="hidden" name="cc_no" id="cc_no_val" value=""/>
                                        <input type="hidden" name="paying_gift_card_no" id="paying_gift_card_no_val" value=""/>
                                        <input type="hidden" name="cc_holder" id="cc_holder_val" value=""/>
                                        <input type="hidden" name="cheque_no" id="cheque_no_val" value=""/>
                                        <input type="hidden" name="cc_month" id="cc_month_val" value=""/>
                                        <input type="hidden" name="cc_year" id="cc_year_val" value=""/>
                                        <input type="hidden" name="cc_type" id="cc_type_val" value=""/>
                                        <input type="hidden" name="cc_cvv2" id="cc_cvv2_val" value=""/>
                                        <input type="hidden" name="balance" id="balance_val" value=""/>
                                        <input type="hidden" name="payment_note" id="payment_note_val" value=""/>
                                    </div>
                                    <input type="hidden" name="customer" id="customer" value="<?=$Settings->default_customer?>" />
                                    <input type="hidden" name="order_tax" id="tax_val" value="" />
                                    <!-- mod by nyi nyi on 8th Jan 2018 for service charges -->
                                    <input type="hidden" name="service_charges" id="sc_val" value="" /><!-- mod by mtk at 26 Feb 2019 for service charges --> 
                                    <!-- end mod -->
                                    <input type="hidden" name="order_discount" id="discount_val" value="" />
                                    <input type="hidden" name="count" id="total_item" value="" />
                                    <input type="hidden" name="did" id="is_delete" value="<?=$sid;?>" />
                                    <input type="hidden" name="eid" id="is_delete" value="<?=$eid;?>" />
                                    <input type="hidden" name="total_items" id="total_items" value="" />
                                     <input type="hidden" name="capacity" id="capacity" value="" />
                                     <?php if(config_item('order_tracking')) {?>
                                     <input type="hidden" name="order_tracking" id="order_tracking" value="true" />
                                 <?php } ?>
                                    <input type="hidden" name="total_quantity" id="total_quantity" value="" />
                                    <input type="submit" id="submit" value="Submit Sale" style="display: none;" />
                                </div>
                                <?=form_close();?>
                            </div>

                            </td>
                            <td>
                                <div class="contents" id="right-col">
                                    <div id="item-list">
                                        <div class="items">
                                            <?php echo $products; ?>
                                        </div>
                                    </div>
                                    <div class="product-nav">
                                        <div class="btn-group btn-group-justified">
                                            <div class="btn-group">
                                                <button style="z-index:10002;font-size:18px;" class="btn btn-default pos-tip btn-flat" type="button" id="previous"><i class="fa fa-chevron-left"></i></button>
                                            </div>
                                            <!-- mod added for waiter role by Nyi Nyi on 23rd Jan 2018 -->
                                            <?php if ((!$Waiter && config_item('gift_card')) || !($Mobile_Caisher && config_item('gift_card'))) { ?>
                                            <div class="btn-group">
                                                <button style="z-index:10003;font-size:18px;" class="btn btn-success pos-tip btn-flat" type="button" id="sellGiftCard"><i class="fa fa-credit-card" id="addIcon"></i> <?= lang('sell_gift_card') ?></button>
                                            </div>
                                            <?php } else { ?>
                                             <div class="btn-group">
                                                <button style="z-index:10003;font-size:18px;" class="btn bg-blue pos-tip btn-flat" type="button" id=""><?= "iWave POS" ?></button>
                                            </div>
                                            <?php } ?>
                                            <!-- end mod -->
                                            <div class="btn-group">
                                                <button style="z-index:10004;font-size:18px;" class="btn btn-default pos-tip btn-flat" type="button" id="next"><i class="fa fa-chevron-right"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <?php } ?>
                </div>
            </div>

        <aside class="control-sidebar control-sidebar-dark" id="categories-list">
            <div class="tab-content sb">
                <div class="tab-pane active sb" id="control-sidebar-home-tab">
                    <div id="filter-categories-con">
                        <input type="text" autocomplete="off" data-list=".control-sidebar-menu" name="filter-categories" id="filter-categories" class="form-control sb col-xs-12 kb-text" placeholder="<?= lang('filter_categories'); ?>" style="margin-bottom: 20px;">
                    </div>
                    <div class="clearfix sb"></div>
                    <div id="category-sidebar-menu">
                        <ul class="control-sidebar-menu">
                            <?php
                            foreach($categories as $category) {
                                echo '<li><a href="#" class="category'.($category->id == $Settings->default_category ? ' active' : '').'" id="'.$category->id.'">';
                                if ($category->image) {
                    //mod by Nyi Nyi on 23rd Jan 2018 to hide category image and icon 
                                    //echo '<div class="menu-icon"><img src="'.base_url('uploads/thumbs/'.$category->image).'" alt="" class="img-thumbnail img-responsive"></div>';
                                } else {
                                    //echo '<i class="menu-icon fa fa-folder-open bg-red"></i>';
                                }
                                //echo '<div class="menu-info"><h4 class="control-sidebar-subheading">'.$category->code.'</h4><p>'.$category->name.'</p></div>
                echo '<div class="menu-info"><h4 class="control-sidebar-subheading">'.$category->name . ' ('. $category->code .')'.'</h4></div>
                            </a></li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </aside>
    <div class="control-sidebar-bg sb"></div>
</div>
</div>
<div id="order_tbl" style="display:none;"><span id="order_span"></span>
    <?php 
    echo form_input('order_id',$suspend_order_id,'id="sus_order_id" size="5px" hidden'); ?>
    <?php 
    echo form_input('order_id',$order_idd,'id="order_id" size="5px" hidden'); ?>
    
    <table id="order-table" class="prT table table-striped table-condensed" style="width:100%;margin-bottom:0;"></table>
</div>

<div id="order_tbl1" style="display:none;"><span id="order_spann"></span>
   
    
    <table id="order-table1" class="prT table table-striped table-condensed" style="width:100%;margin-bottom:0;"></table>
</div>
<div id="bill_tbl" style="display:none;"><span id="bill_span"></span>
    <table id="bill-table" width="100%" class="prT table table-striped table-condensed" style="width:100%;margin-bottom:0;">
    </table>
    <table id="bill-total-table" width="100%" class="prT table table-striped table-condensed" style="width:100%;margin-bottom:0;"></table>
</div>

<div id="ajaxCall"><i class="fa fa-spinner fa-pulse"></i></div>

<div class="modal" data-easein="flipYIn" id="gcModal" tabindex="-1" role="dialog" aria-labelledby="mModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                <h4 class="modal-title" id="myModalLabel"><?= lang('sell_gift_card'); ?></h4>
            </div>
            <div class="modal-body">
                <p><?= lang('enter_info'); ?></p>

                <div class="alert alert-danger gcerror-con" style="display: none;">
                    <button data-dismiss="alert" class="close" type="button">×</button>
                    <span id="gcerror"></span>
                </div>
                <div class="form-group">
                    <?= lang("card_no", "gccard_no"); ?> *
                    <div class="input-group">
                        <?php echo form_input('gccard_no', '', 'class="form-control" id="gccard_no"'); ?>
                        <div class="input-group-addon" style="padding-left: 10px; padding-right: 10px;"><a href="#" id="genNo"><i class="fa fa-cogs"></i></a></div>
                    </div>
                </div>
                <input type="hidden" name="gcname" value="<?= lang('gift_card') ?>" id="gcname"/>
                <div class="form-group">
                    <?= lang("value", "gcvalue"); ?> *
                    <?php echo form_input('gcvalue', '', 'class="form-control" id="gcvalue"'); ?>
                </div>
                <div class="form-group">
                    <?= lang("price", "gcprice"); ?> *
                    <?php echo form_input('gcprice', '', 'class="form-control" id="gcprice"'); ?>
                </div>
                <div class="form-group">
                    <?= lang("expiry_date", "gcexpiry"); ?>
                    <?php echo form_input('gcexpiry', '', 'class="form-control" id="gcexpiry"'); ?>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><?=lang('close')?></button>
                <button type="button" id="addGiftCard" class="btn btn-primary"><?= lang('sell_gift_card') ?></button>
            </div>
        </div>
    </div>
</div>

<div class="modal" data-easein="flipYIn" id="dsModal" tabindex="-1" role="dialog" aria-labelledby="dsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                <h4 class="modal-title" id="dsModalLabel"><?= lang('discount_title'); ?></h4>
            </div>
            <div class="modal-body">
                <input type='text' class='form-control input-sm kb-pad' id='get_ds' onClick='this.select();' value=''>

                <label class="checkbox" for="apply_to_order">
                    <input type="radio" name="apply_to" value="order" id="apply_to_order" checked="checked"/>
                    <?= lang('apply_to_order') ?>
                </label>
                <label class="checkbox" for="apply_to_products">
                    <input type="radio" name="apply_to" value="products" id="apply_to_products"/>
                    <?= lang('apply_to_products') ?>
                </label>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm pull-left" data-dismiss="modal"><?=lang('close')?></button>
                <button type="button" id="updateDiscount" class="btn btn-primary btn-sm"><?= lang('update') ?></button>
            </div>
        </div>
    </div>
</div>


<div class="modal" data-easein="flipYIn" id="tsModal" tabindex="-1" role="dialog" aria-labelledby="tsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                <h4 class="modal-title" id="tsModalLabel"><?= lang('tax_title'); ?></h4>
            </div>
            <div class="modal-body">
                <input type='text' class='form-control input-sm kb-pad' id='get_ts' onClick='this.select();' value=''>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm pull-left" data-dismiss="modal"><?=lang('close')?></button>
                <button type="button" id="updateTax" class="btn btn-primary btn-sm"><?= lang('update') ?></button>
            </div>
        </div>
    </div>
</div>

<!-- mod by mtk at 26 Feb 2019 for service charges -->
<div class="modal" data-easein="flipYIn" id="scModal" tabindex="-1" role="dialog" aria-labelledby="scModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                <h4 class="modal-title" id="scModalLabel"><?= lang('sc_title'); ?></h4>
            </div>
            <div class="modal-body">
                <input type='text' class='form-control input-sm kb-pad' id='get_sc' onClick='this.select();' value=''>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm pull-left" data-dismiss="modal"><?=lang('close')?></button>
                <button type="button" id="updateSc" class="btn btn-primary btn-sm"><?= lang('update') ?></button>
            </div>
        </div>
    </div>
</div>
<!-- end mod by mtk -->

<div class="modal" data-easein="flipYIn" id="noteModal" tabindex="-1" role="dialog" aria-labelledby="noteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                <h4 class="modal-title" id="noteModalLabel"><?= lang('note'); ?></h4>
            </div>
            <div class="modal-body">
                <textarea name="snote" id="snote" class="pa form-control kb-text"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-sm pull-left" data-dismiss="modal"><?=lang('close')?></button>
                <button type="button" id="update-note" class="btn btn-primary btn-sm"><?= lang('update') ?></button>
            </div>
        </div>
    </div>
</div>
<?php if(config_item('popup_for_cancel_item')){ ?>
 <input type="hidden" name="popup" id="popup" value="true"/>
<?php } else {?>
    <input type="hidden" name="popup" id="popup" value="false"/>
<?php } ?>
<?php if(config_item('order_tracking')){ ?>
 <input type="hidden" name="tracking" id="tracking" value="true"/>
<?php } else {?>
    <input type="hidden" name="tracking" id="tracking" value="false"/>
<?php } ?>
<div class="modal" data-easein="flipYIn" id="proModal" tabindex="-1" role="dialog" aria-labelledby="proModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-primary">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                <h4 class="modal-title" id="proModalLabel">
                    <?=lang('payment')?>
                </h4>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th style="width:25%;"><?= lang('net_price'); ?></th>
                        <th style="width:25%;"><span id="net_price"></span></th>
                        <th style="width:25%;"><?= lang('product_tax'); ?></th>
                        <th style="width:25%;"><span id="pro_tax"></span> <span id="pro_tax_method"></span></th>
                    </tr>
                </table>
                <input type="hidden" id="row_id" />
                <input type="hidden" id="item_id" />
                <div class="row">
                <!-- mod by mtk for qty and foc at 28 March 2019-->
                <?php if(config_item('show_foc')) { ?>
                
                    <div class="col-sm-4">
                        <div class="form-group">
                            <?=lang('unit_price', 'nPrice')?>
							<!-- Mod Nyi Nyi on 6th Aug 2017 -->
							 <?php if(($this->Admin) || (config_item('manager_update_price')) ) { ?>
								<input type="text" class="form-control input-sm kb-pad" id="nPrice" onClick="this.select();" placeholder="<?=lang('new_price')?>">
							 <?php } else { ?>
								<input type="text" disabled class="form-control input-sm kb-pad" id="nPrice" onClick="this.select();" placeholder="<?=lang('new_price')?>"> 
							 <?php }; ?>
                        </div>
                        <div class="form-group">
                            <?=lang('discount', 'nDiscount')?>
                            <input type="text" class="form-control input-sm kb-pad" id="nDiscount" onClick="this.select();" placeholder="<?=lang('discount')?>">
                        </div>
                    </div>

                    <!-- mod by mtk for showing foc at 21 March 2019 -->
                    <!--
                  <?php if(config_item('show_foc')) { ?>
                    <div class="col-sm-6">
                      <div class="col-xs-6">  
                        <div class="form-group">
                            <?=lang('quantity', 'nQuantity')?>

                            <input type="text" class="form-control input-sm kb-pad" id="nQuantity" onClick="this.select();" placeholder="<?=lang('current_quantity')?>">

                        </div>
                      </div> 
                      <div class="col-xs-6">
                        <div class="form-group">
                            <?=lang('foc', 'nFoc')?>

                            <input type="text" class="form-control input-sm kb-pad" id="nFoc" onClick="this.select();" placeholder="0">

                        </div>
                      </div>
                    </div>
                   <?php } 
                    else { ?>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <?=lang('quantity', 'nQuantity')?>

                            <input type="text" class="form-control input-sm kb-pad" id="nQuantity" onClick="this.select();" placeholder="<?=lang('current_quantity')?>">
                            
                        </div>
                        <div class="form-group">
                             <input type="hidden" name="" id="nFoc">
                        </div>
                    </div>
                    <?php } ?> -->

                    
                     
                     
                       <div class="col-sm-8">
                        <div class="col-xs-6">
                        <div class="form-group">
                            <?=lang('quantity', 'nQuantity')?><br>
                            <button id="minus_qty" name="minus"><i class="fa fa-minus"></i></button>
                             <?= 
                            form_input('nQuantity', set_value('nQuantity'), ' id="nQuantity"  required="required" size="8px"'); 
                             ?>     
                            <button id="plus_qty" name="plus"><i class="fa fa-plus"></i></button>
                        </div>
                        </div>
                    
                        <div class="col-xs-6">
                        <div class="form-group">
                            <?=lang('foc', 'nFoc')?><br>
                            <button id="minus_foc" name="minus"><i class="fa fa-minus"></i></button>
                             <?= 
                            form_input('nFoc', set_value('nFoc'), ' id="nFoc"  required="required" size="8px"'); 
                             ?> 
                            <button id="plus_foc" name="plus"><i class="fa fa-plus"></i></button>
                        </div>
                        </div>
                      </div>
                     
                    
                   <?php } 
                    else { ?>

                    <div class="col-sm-6">
                        <div class="form-group">
                            <?=lang('unit_price', 'nPrice')?>
                            <!-- Mod Nyi Nyi on 6th Aug 2017 -->
                             <?php if(($this->Admin) || (config_item('manager_update_price')) ) { ?>
                                <input type="text" class="form-control input-sm kb-pad" id="nPrice" onClick="this.select();" placeholder="<?=lang('new_price')?>">
                             <?php } else { ?>
                                <input type="text" disabled class="form-control input-sm kb-pad" id="nPrice" onClick="this.select();" placeholder="<?=lang('new_price')?>"> 
                             <?php }; ?>
                        </div>
                        <div class="form-group">
                            <?=lang('discount', 'nDiscount')?>
                            <input type="text" class="form-control input-sm kb-pad" id="nDiscount" onClick="this.select();" placeholder="<?=lang('discount')?>">
			               <input type="text" class="form-control input-sm kb-pad" id="nQuantity" onClick="this.select();" placeholder="<?=lang('current_quantity')?>">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <?=lang('quantity', 'nQuantity')?>
                            <button id="minus_qty" name="minus" style=display:none><i class="fa fa-minus"></i></button>
                            <?= 
                            form_input('nQuantity', set_value('nQuantity'), ' id="nQuantity"  required="required" size="8px"'); 
                             ?> 
                            <button id="plus_qty" name="plus" style=display:none><i class="fa fa-plus"></i></button>
                        </div>
                        <div class="form-group">
                             <input type="hidden" name="" id="nFoc">
                        </div>
                    </div>
                    <?php } ?>
                    <!-- end mod by mtk -->

                    <?php if(config_item('show_wholesale_price') && !config_item('is_restaurant')) { 

                if(!config_item('show_multiple_price')) {?>
<!-- Wholesale Mod by mtk -->                    
                    <div class="col-sm-6">
                        <div class="col-xs-6">
                        <div class="form-group">
                            <?=lang('wholesale', 'nWholeSale')?>                   
                            <input type="text" disabled class="form-control input-sm kb-pad" id="nWholeSale">                        
                        </div>

                        <div class="form-group">
                             <input type="hidden" name="" id="hidden_id">
                        </div>
                        </div>


                    <div class="col-xs-6">
                    <div class="row">
                    <div class="col-sm-6">                
                      <div class="form-group">
                        <?=lang('blank', 'blank')?>
                        <button type="submit" class="btn btn-primary" id="change_wh" onclick="change()"> <?=lang('apply')?> </button>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <?=lang('blank', 'blank')?>
                        <button type="submit" class="btn btn-primary" id="rechange" onclick="rechange()"> <?=lang('reapply')?> </button>
                      </div>
                    </div> 

                    <input type="hidden" name="whsale" id="whsale" value="true"/>
                    </div>               
                    </div>
                </div>
   
                <?php } else { ?>

                <div class="col-sm-8">                    
                    <div class="col-xs-8">                   
                     <div class="col-sm-10">                
                      <div class="form-group">
                        <?=lang('other_price', 'other_price')?>
                      </div>
                     </div> 

                     
                    
                     <div class="col-sm-2">
                      <div class="form-group">
                        <button type="submit" class="btn btn-primary" id="rechange" onclick="reset()"> <?=lang('reapply')?> </button>
                      </div>
                     </div> 

                     <div class="form-group">
                             <input type="hidden" name="" id="hid" value="">
                        </div>
                    </div> 

                <div class="col-xs-12">  
                <div class="row">

                    <div class="col-sm-2">                
                      <div class="form-group">                  
                       <input type="button" class="btn btn-link" style="background-color: #ffffff" name="whs" id="nWholeSale">
                      </div>
                    </div>

                    <div class="col-sm-2">
                      <div class="form-group">
                        <input type="button" class="btn btn-link" style="background-color: #ffffff" name="whs" id="nWholeSale1">
                      </div>
                    </div> 

                    <div class="col-sm-2">
                      <div class="form-group">
                        <input type="submit" class="btn btn-link" style="background-color: #ffffff" name="whs" id="nWholeSale2">
                      </div>
                    </div>

                    <div class="col-sm-2">
                      <div class="form-group">
                        <input type="submit" class="btn btn-link" style="background-color: #ffffff" name="whs" id="nWholeSale3">
                      </div>
                    </div>

                    <div class="col-sm-2">
                      <div class="form-group">
                        <input type="submit" class="btn btn-link" style="background-color: #ffffff" name="whs" id="nWholeSale4">
                      </div>
                    </div>

                    <div class="col-sm-2">
                      <div class="form-group">
                        <input type="submit" class="btn btn-link" style="background-color: #ffffff" name="whs" id="nWholeSale5">
                      </div>
                    </div>

                    <div class="col-sm-2">
                      <div class="form-group">
                        <input type="submit" class="btn btn-link" style="background-color: #ffffff" name="whs" id="nWholeSale6">
                      </div>
                    </div>

                    <div class="col-sm-3"> 
                      <div class="form-group">
                        <input type="hidden" name="" id="hid">
                      </div>
                      <div class="form-group">
                        <input type="hidden" name="" id="hhid">
                      </div>
                     </div>

                     <input type="hidden" name="whsale" id="whsale" value="false"/>
                </div>
                </div>
            </div>
                    <?php } 
                }?>
                </div>




                <!--mod by MTK on 7 Dec 2018 to show Food Modifier-->
                
                <?php if (config_item('is_restaurant')) { 
                  if (config_item('food_modifier_with_mm')) 
                   { 

                   $cancel_mm = array('အခ်ိဳမွဳန္႔ေ႐ွာင္','ဆီေ႐ွာင္','အငန္ေ႐ွာင္','အခ်ိဳေ႐ွာင္','အစပ္ေ႐ွာင္','အခ်ဥ္ေ႐ွာင္','ေရခဲေ႐ွာင္','နံနံပင္ေရွာင္','ၾကက္သြန္ေရွာင္','ပဲမႈန္႔ေ႐ွာင္');
                ?>
                <div class="row">
                    <div class="col-sm-4">
                         <h5> <b> <?=lang('food_modifier')?> </b> </h5>
                    </div>
                </div>

                  <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                                 <select id="cancel_id">
                                    <option value="can" selected="selected"> -- ေ႐ွာင္ရန္ -- 
                                    </option>
                                    <option value="<?=$cancel_mm[0]?>"><?=$cancel_mm[0]?></option>
                                    <option value="<?=$cancel_mm[1]?>"><?=$cancel_mm[1]?></option>
                                    <option value="<?=$cancel_mm[2]?>"><?=$cancel_mm[2]?></option>
                                    <option value="<?=$cancel_mm[3]?>"><?=$cancel_mm[3]?></option>
                                    <option value="<?=$cancel_mm[4]?>"><?=$cancel_mm[4]?></option>
                                    <option value="<?=$cancel_mm[5]?>"><?=$cancel_mm[5]?></option>
                                    <option value="<?=$cancel_mm[6]?>"><?=$cancel_mm[6]?></option>
                                    <option value="<?=$cancel_mm[7]?>"><?=$cancel_mm[7]?></option>
                                    <option value="<?=$cancel_mm[8]?>"><?=$cancel_mm[8]?></option>
                                    <option value="<?=$cancel_mm[9]?>"><?=$cancel_mm[9]?></option>
                                 </select>
                        </div>
                    </div>
                
                <?php 
                $reduce_mm = array('အခ်ိဳမွဳန္႔ေလွ်ာ့','ဆီေလွ်ာ့','အငန္ေလွ်ာ့','အခ်ိဳေလွ်ာ့','အစပ္ေလွ်ာ့','အခ်ဥ္ေလွ်ာ့','ေရခဲေလွ်ာ့','နံနံပင္ေလွ်ာ့','ၾကက္သြန္ေလွ်ာ့','ပဲမႈန္႔ေလွ်ာ့');
                ?>
                
                    <div class="col-sm-4">
                        <div class="form-group">
                                 <select id="reduce_id">
                                    <option value="red" selected="selected"> -- ေလွ်ာ့ရန္ -- 
                                    </option>
                                    <option value="<?=$reduce_mm[0]?>"><?=$reduce_mm[0]?></option>
                                    <option value="<?=$reduce_mm[1]?>"><?=$reduce_mm[1]?></option>
                                    <option value="<?=$reduce_mm[2]?>"><?=$reduce_mm[2]?></option>
                                    <option value="<?=$reduce_mm[3]?>"><?=$reduce_mm[3]?></option>
                                    <option value="<?=$reduce_mm[4]?>"><?=$reduce_mm[4]?></option>
                                    <option value="<?=$reduce_mm[5]?>"><?=$reduce_mm[5]?></option>
                                    <option value="<?=$reduce_mm[6]?>"><?=$reduce_mm[6]?></option>
                                    <option value="<?=$reduce_mm[7]?>"><?=$reduce_mm[7]?></option>
                                    <option value="<?=$reduce_mm[8]?>"><?=$reduce_mm[8]?></option>
                                    <option value="<?=$reduce_mm[9]?>"><?=$reduce_mm[9]?></option>
                                 </select>
                        </div>
                    </div>
                
                <?php 
                $add_mm = array('ဆီမ်ားမ်ား','ငန္ငန္ေလး','ခ်ိဳခ်ိဳေလး','စပ္စပ္ေလး','ခ်ဥ္ခ်ဥ္ေလး','ေရခဲမ်ားမ်ား','နံနံပင္မ်ားမ်ား','ၾကက္သြန္မ်ားမ်ား','ပဲမႈန္႔မ်ားမ်ား','ခ်ဥ္စပ္','ခ်ဥ္ငန္စပ္');
                ?>
                
                    <div class="col-sm-4">
                        <div class="form-group">
                                 <select id="add_id">
                                    <option value="add" selected="selected"> -- တိုးရန္ -- 
                                    </option>
                                    <option value="<?=$add_mm[0]?>"><?=$add_mm[0]?></option>
                                    <option value="<?=$add_mm[1]?>"><?=$add_mm[1]?></option>
                                    <option value="<?=$add_mm[2]?>"><?=$add_mm[2]?></option>
                                    <option value="<?=$add_mm[3]?>"><?=$add_mm[3]?></option>
                                    <option value="<?=$add_mm[4]?>"><?=$add_mm[4]?></option>
                                    <option value="<?=$add_mm[5]?>"><?=$add_mm[5]?></option>
                                    <option value="<?=$add_mm[6]?>"><?=$add_mm[6]?></option>
                                    <option value="<?=$add_mm[7]?>"><?=$add_mm[7]?></option>
                                    <option value="<?=$add_mm[8]?>"><?=$add_mm[8]?></option>
                                    <option value="<?=$add_mm[9]?>"><?=$add_mm[9]?></option>
                                    <option value="<?=$add_mm[10]?>"><?=$add_mm[10]?></option>
                                 </select>
                        </div>
                    </div>
                </div>

                <?php 
                 }
                 else
                  {
                    $cancel_eng = array('No MSG (A Cho Mhont Shaung)','No Oil (C Shaung)','No Salty (A Ngan Shaung)','No Sweet (A Cho Shaung)','No Spicy(A Satt Shaung)','No Sour (A Chin Shaung)','No Ice (Yay Khe Shaung)','No Coriander (Nan Nan Shaung)','No Onion (Kyat Thon Shaung)','No Pea-Flour (Pe Mhont Shaung)');
                ?>
                <div class="row">
                    <div class="col-sm-6">
                       <h5> <b> <?=lang('food_modifier')?> </b></h5>
                    </div>
                </div>

                 <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                                 <select id="cancel_id">
                                    <option value="can" selected="selected"> -- Remove -- 
                                    </option>
                                    <option value="<?=$cancel_eng[0]?>"><?=$cancel_eng[0]?></option>
                                    <option value="<?=$cancel_eng[1]?>"><?=$cancel_eng[1]?></option>
                                    <option value="<?=$cancel_eng[2]?>"><?=$cancel_eng[2]?></option>
                                    <option value="<?=$cancel_eng[3]?>"><?=$cancel_eng[3]?></option>
                                    <option value="<?=$cancel_eng[4]?>"><?=$cancel_eng[4]?></option>
                                    <option value="<?=$cancel_eng[5]?>"><?=$cancel_eng[5]?></option>
                                    <option value="<?=$cancel_eng[6]?>"><?=$cancel_eng[6]?></option>
                                    <option value="<?=$cancel_eng[7]?>"><?=$cancel_eng[7]?></option>
                                    <option value="<?=$cancel_eng[8]?>"><?=$cancel_eng[8]?></option>
                                    <option value="<?=$cancel_eng[9]?>"><?=$cancel_eng[9]?></option>
                                 </select>
                        </div>
                    
                
                <?php 
                $reduce_eng = array('Less MSG (A Cho Mhont Shot)','Less Oil (C Shot)','Less Salty (A Ngan Shot)','Less Sweet (A Cho Shot)','Less Spicy (A Satt Shot)','Less Sour (A Chin Shot)','Less Ice (Yay Khe Shot)','Less Coriander (Nan Nan Shot)','Less Onion (Kyat Thon Shaung)','Less Pea-Flour (Pe Mhont Shot)');
                ?>
                
                    
                        <div class="form-group">
                                 <select id="reduce_id">
                                    <option value="red" selected="selected"> -- Reduce -- 
                                    </option>
                                    <option value="<?=$reduce_eng[0]?>"><?=$reduce_eng[0]?></option>
                                    <option value="<?=$reduce_eng[1]?>"><?=$reduce_eng[1]?></option>
                                    <option value="<?=$reduce_eng[2]?>"><?=$reduce_eng[2]?></option>
                                    <option value="<?=$reduce_eng[3]?>"><?=$reduce_eng[3]?></option>
                                    <option value="<?=$reduce_eng[4]?>"><?=$reduce_eng[4]?></option>
                                    <option value="<?=$reduce_eng[5]?>"><?=$reduce_eng[5]?></option>
                                    <option value="<?=$reduce_eng[6]?>"><?=$reduce_eng[6]?></option>
                                    <option value="<?=$reduce_eng[7]?>"><?=$reduce_eng[7]?></option>
                                    <option value="<?=$reduce_eng[8]?>"><?=$reduce_eng[8]?></option>
                                    <option value="<?=$reduce_eng[9]?>"><?=$reduce_eng[9]?></option>
                                 </select>
                        </div>
                    </div>
                
                
                <?php 
                $add_eng = array('More Oil (C Myar Myar)','More Salty (Ngan Ngan Lay)','More Sweet (Cho Cho Lay)','More Spicy (Satt Satt Lay)','More Sour (Chin Chin Lay)','More Ice (Yay Khe Myar Myar)','More Coriander (Nan Nan Myar Myar)','More Onion (Kyat Thon Myar Myar)','More Pea-Flour(Pe Mhont Myar Myar)','Sour and Spicy (Chin Satt)','Sour-Salty-Spicy (Chin Ngan Satt)');
                ?>
                
                    <div class="col-sm-6">
                        <div class="form-group">
                                 <select id="add_id">
                                    <option value="add" selected="selected"> -- Add -- 
                                    </option>
                                    <option value="<?=$add_eng[0]?>"><?=$add_eng[0]?></option>
                                    <option value="<?=$add_eng[1]?>"><?=$add_eng[1]?></option>
                                    <option value="<?=$add_eng[2]?>"><?=$add_eng[2]?></option>
                                    <option value="<?=$add_eng[3]?>"><?=$add_eng[3]?></option>
                                    <option value="<?=$add_eng[4]?>"><?=$add_eng[4]?></option>
                                    <option value="<?=$add_eng[5]?>"><?=$add_eng[5]?></option>
                                    <option value="<?=$add_eng[6]?>"><?=$add_eng[6]?></option>
                                    <option value="<?=$add_eng[7]?>"><?=$add_eng[7]?></option>
                                    <option value="<?=$add_eng[8]?>"><?=$add_eng[8]?></option>
                                    <option value="<?=$add_eng[9]?>"><?=$add_eng[9]?></option>
                                    <option value="<?=$add_eng[10]?>"><?=$add_eng[10]?></option>
                                 </select>
                        </div>
                    </div>
                </div>
 
                <?php  }
            }?>
            
            <!-- end mod-->

                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <?=lang('comment', 'nComment')?>
                            <textarea class="form-control kb-text" id="nComment"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal"><?=lang('close')?></button>
                <button class="btn btn-success" id="editItem"><?=lang('update')?></button>
            </div>
        </div>
    </div>
</div>

<div class="modal" data-easein="flipYIn" id="susModal" tabindex="-1" role="dialog" aria-labelledby="susModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                <h4 class="modal-title" id="susModalLabel"><?= lang('suspend_sale'); ?></h4>
            </div>
            <div class="modal-body">
             
       
                <div class="form-group">
                    <?= 
                    lang("reference_note", "reference_note"); ?>
                    <?php echo form_input('reference_note',$reference_note,'class="form-control kb-text" id="reference_note"'); 
                    ?>
                
                </div>

                
   <?php if(config_item('capacity') && config_item('is_restaurant')){ ?>
                <div class="form-group">

                <?= lang("capacity", "capacity"); ?><br>
                  <button id="minus" name="minus" style=display:none"><i class="fa fa-minus"></i></button>
                 <?php  
                  if($capacity==null || $capacity==0 ){
                    $capacity=1;
                 }
                    echo form_input('capacity',$capacity,'id="capacity1" size="5px"'); 
   
                    
                    ?> <button id="plus" name="plus" style=display:none"><i class="fa fa-plus"></i></button>
                </div>
<?php } ?>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal"> <?=lang('close')?> </button>
                <button type="button" id="suspend_sale" class="btn btn-primary"><?= lang('submit') ?></button>
            </div>
        </div>
    </div>
</div>


<div class="modal" data-easein="flipYIn" id="delModal" tabindex="-1" role="dialog" aria-labelledby="delModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                <h4 class="modal-title" id="delModalLabel"><?= lang('delete_items'); ?></h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <?= lang("reason", "reason"); ?>
                    <?php echo form_input('reason', $reason, 'class="form-control kb-text" id="reason" required="required"'); 
                    ?>
                </div>

               <div class="form-group">
                                     <?= lang("res_person", "res_person"); ?>
                                    <?php
                                    $customers=$this->site->getUsers();
                                    foreach ($customers as $customer) {
                                        $cu[$customer->username] = $customer->username;
                                    }
                                    echo form_dropdown('default_customer', $cu, $settings->default_customer, 'class="form-control select2" style="width:100%;" id="res_person" required="required"'); 
                              
                              
                    echo form_input('del_id', $del_id, 'id="del_id" hidden ');
                    
                    echo form_input('del_code', $del_code, ' id="del_code" hidden'); 
                    echo form_input('del_name', $del_name, '  id="del_name" size="5px" hidden '); 
                    echo form_input('cancel_order_no', $cancel_order_no, 'id="cancel_order_no" hidden ');
                    echo form_input('ccname', $cname, '  id="ccname" size="5px" hidden ');
                    echo form_input('ssname', $store->name, '  id="ssname" size="5px" hidden ');
                    echo form_input('rea', $rea, '  id="rea"  hidden ');
                    //echo form_input('user_name', $user_name, '  id="user_name" size="5px" hidden ');
                    ?>

                   
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal"> <?=lang('close')?> </button>
                <button  type="button" id="del_items" class="btn btn-primary"><?= lang('submit') ?></button>
            </div>
        </div>
    </div>
</div>


<div class="modal" data-easein="flipYIn" id="saleModal" tabindex="-1" role="dialog" aria-labelledby="saleModalLabel" aria-hidden="true"></div>
<div class="modal" data-easein="flipYIn" id="opModal" tabindex="-1" role="dialog" aria-labelledby="opModalLabel" aria-hidden="true"></div>

<div class="modal" data-easein="flipYIn" id="payModal" tabindex="-1" role="dialog" aria-labelledby="payModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-success">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                <h4 class="modal-title" id="payModalLabel">
                    <?=lang('payment')?>
                </h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-9">
                        <div class="font16">
                            <table class="table table-bordered table-condensed" style="margin-bottom: 0;">
                                <tbody>
                                    <tr>
                                        <td width="25%" style="border-right-color: #FFF !important;"><?= lang("total_items"); ?></td>
                                        <td width="25%" class="text-right"><span id="item_count">0.00</span></td>
                                        <td width="25%" style="border-right-color: #FFF !important;"><?= lang("total_payable"); ?></td>
                                        <td width="25%" class="text-right"><span id="twt">0.00</span></td>
                                    </tr>
                                    <tr>
                                        <td style="border-right-color: #FFF !important;"><?= lang("total_paying"); ?></td>
                                        <td class="text-right"><span id="total_paying">0.00</span></td>
                                        <td style="border-right-color: #FFF !important;"><?= lang("balance"); ?></td>
                                        <td class="text-right"><span id="balance">0.00</span></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="clearfix"></div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <?= lang('note', 'note'); ?>
                                    <textarea name="note" id="note" class="pa form-control kb-text"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <?= lang("amount", "amount"); ?>
                                    <input name="amount" type="text" id="amount"
                                    class="pa form-control kb-pad amount"/>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <?= lang("paying_by", "paid_by"); ?>
                                    <select id="paid_by" class="form-control paid_by select2" style="width:100%;">
                                        <option value="cash"><?= lang("cash"); ?></option>
                                        <option value="CC"><?= lang("cc"); ?></option>
                                       <!-- <option value="cheque"><?= lang("cheque"); ?></option> -->
                                        <option value="gift_card"><?= lang("gift_card"); ?></option>
                                        <!-- <?= isset($Settings->stripe) ? '<option value="stripe">' . lang("stripe") . '</option>' : ''; ?> -->
                                        <option value="other"><?= lang("other"); ?></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group gc" style="display: none;">
                                    <?= lang("gift_card_no", "gift_card_no"); ?>
                                    <input type="text" id="gift_card_no"
                                    class="pa form-control kb-pad gift_card_no gift_card_input"/>

                                    <div id="gc_details"></div>
                                </div>
                                <div class="pcc" style="display:none;">
                                    <div class="form-group">
                                        <input type="text" id="swipe" class="form-control swipe swipe_input"
                                        placeholder="<?= lang('focus_swipe_here') ?>"/>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-6">
                                            <div class="form-group">
                                                <input type="text" id="pcc_no"
                                                class="form-control kb-pad"
                                                placeholder="<?= lang('cc_no') ?>"/>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <div class="form-group">

                                                <input type="text" id="pcc_holder"
                                                class="form-control kb-text"
                                                placeholder="<?= lang('cc_holder') ?>"/>
                                            </div>
                                        </div>
                                        <div class="col-xs-3">
                                            <div class="form-group">
                                                <select id="pcc_type"
                                                class="form-control pcc_type select2"
                                                placeholder="<?= lang('card_type') ?>">
                                                <option value="Visa"><?= lang("Visa"); ?></option>
                                                <option
                                                value="MasterCard"><?= lang("MasterCard"); ?></option>
                                                <option value="Amex"><?= lang("Amex"); ?></option>
                                                <option
                                                value="Discover"><?= lang("Discover"); ?></option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xs-3">
                                        <div class="form-group">
                                            <input type="text" id="pcc_month"
                                            class="form-control kb-pad"
                                            placeholder="<?= lang('month') ?>"/>
                                        </div>
                                    </div>
                                    <div class="col-xs-3">
                                        <div class="form-group">

                                            <input type="text" id="pcc_year"
                                            class="form-control kb-pad"
                                            placeholder="<?= lang('year') ?>"/>
                                        </div>
                                    </div>
                                    <div class="col-xs-3">
                                        <div class="form-group">

                                            <input type="text" id="pcc_cvv2"
                                            class="form-control kb-pad"
                                            placeholder="<?= lang('cvv2') ?>"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pcheque" style="display:none;">
                                <div class="form-group"><?= lang("cheque_no", "cheque_no"); ?>
                                    <input type="text" id="cheque_no"
                                    class="form-control cheque_no kb-text"/>
                                </div>
                            </div>
                            <div class="pcash">
                                <div class="form-group"><?= lang("payment_note", "payment_note"); ?>
                                    <input type="text" id="payment_note"
                                    class="form-control payment_note kb-text"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="col-xs-3 text-center">
                    <!-- <span style="font-size: 1.2em; font-weight: bold;"><?= lang('quick_cash'); ?></span> -->

                    <div class="btn-group btn-group-vertical" style="width:100%;">
                        <button type="button" class="btn btn-info btn-block quick-cash" id="quick-payable">0.00
                        </button>
                        <?php
                        foreach (lang('quick_cash_notes') as $cash_note_amount) {
                            echo '<button type="button" class="btn btn-block btn-warning quick-cash">' . $cash_note_amount . '</button>';
                        }
                        ?>
                        <button type="button" class="btn btn-block btn-danger"
                        id="clear-cash-notes"><?= lang('clear'); ?></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal"> <?=lang('close')?> </button>
            <button class="btn btn-primary" id="<?= $eid ? '' : 'submit-sale'; ?>"><?=lang('submit')?></button>
        </div>
    </div>
</div>
</div>

<div class="modal" data-easein="flipYIn" id="customerModal" tabindex="-1" role="dialog" aria-labelledby="cModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-primary">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                <h4 class="modal-title" id="cModalLabel">
                    <?=lang('add_customer')?>
                </h4>
            </div>
            <?= form_open('pos/add_customer', 'id="customer-form"'); ?>
            <div class="modal-body">
                <div id="c-alert" class="alert alert-danger" style="display:none;"></div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label class="control-label" for="code">
                                <?= lang("name"); ?>
                            </label>
                            <?= form_input('name', '', 'class="form-control input-sm kb-text" id="cname"'); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label class="control-label" for="cemail">
                                <?= lang("email_address"); ?>
                            </label>
                            <?= form_input('email', '', 'class="form-control input-sm kb-text" id="cemail"'); ?>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label class="control-label" for="phone">
                                <?= lang("phone"); ?>
                            </label>
                            <?= form_input('phone', '', 'class="form-control input-sm kb-pad" id="cphone"');?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label class="control-label" for="cf1">
                                <?= lang("cf1"); ?>
                            </label>
                            <?= form_input('cf1', '', 'class="form-control input-sm kb-text" id="cf1"'); ?>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label class="control-label" for="cf2">
                                <?= lang("cf2"); ?>
                            </label>
                            <?= form_input('cf2', '', 'class="form-control input-sm kb-text" id="cf2"');?>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer" style="margin-top:0;">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal"> <?=lang('close')?> </button>
                <button type="submit" class="btn btn-primary" id="add_customer"> <?=lang('add_customer')?> </button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>

<div class="modal" data-easein="flipYIn" id="posModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"></div>
<div class="modal" data-easein="flipYIn" id="posModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true"></div>

<script type="text/javascript">
    var base_url = '<?=base_url();?>', assets = '<?= $assets ?>';
    var dateformat = '<?=$Settings->dateformat;?>', timeformat = '<?= $Settings->timeformat ?>';
    <?php unset($Settings->protocol, $Settings->smtp_host, $Settings->smtp_user, $Settings->smtp_pass, $Settings->smtp_port, $Settings->smtp_crypto, $Settings->mailpath, $Settings->timezone, $Settings->setting_id, $Settings->default_email, $Settings->version, $Settings->stripe, $Settings->stripe_secret_key, $Settings->stripe_publishable_key); ?>
    var Settings = <?= json_encode($Settings); ?>;
    var sid = false, username = '<?=$this->session->userdata('username');?>', spositems = {};
    $(window).load(function () {
        $('#mm_<?=$m?>').addClass('active');
        $('#<?=$m?>_<?=$v?>').addClass('active');
    });
    var pro_limit = <?=$Settings->pro_limit?>, java_applet = 0, count = 1, total = 0, an = 1, p_page = 0, page = 0, cat_id = <?=$Settings->default_category?>, tcp = <?=$tcp?>;
    //mod nyi nyi on 6th Aug 2017
    //var gtotal = 0, order_discount = 0, order_tax = 0, protect_delete = <?= ($Admin) ? 0 : ($Settings->pin_code ? 1 : 0); ?>;
    var gtotal = 0, order_discount = 0, order_tax = 0, protect_delete = <?= (($Admin) ||($Manager))? 0 : ($Settings->pin_code ? 1 : 0); ?>;
    //end mod 
    var order_data = {}, bill_data = {};
    <?php
    if ($Settings->remote_printing == 2) {

        ?>
        var ob_store_name = "<?= printText($store->name, (!empty($printer) ? $printer->char_per_line : '')); ?>\r\n";
        order_data.store_name = ob_store_name;
        bill_data.store_name = ob_store_name;

        ob_header = "";
        ob_header += "<?= printText($store->name.' ('.$store->code.')', (!empty($printer) ? $printer->char_per_line : '')); ?>\r\n";
        <?php
        if ($store->address1) { ?>
            ob_header += "<?= printText($store->address1, (!empty($printer) ? $printer->char_per_line : ''));?>\r\n";
            <?php
        }
        if ($store->address2) { ?>
            ob_header += "<?= printText($store->address2, (!empty($printer) ? $printer->char_per_line : ''));?>\r\n";
            <?php
        }
        if ($store->city) { ?>
            ob_header += "<?= printText($store->city, (!empty($printer) ? $printer->char_per_line : ''));?>\r\n";
            <?php
        } ?>
        ob_header += "<?= printText(lang('tel').': '.$store->phone, (!empty($printer) ? $printer->char_per_line : ''));?>\r\n\r\n";
        ob_header += "<?= printText(str_replace( array( "\n", "\r" ), array( "\\n", "\\r" ), $store->receipt_header), (!empty($printer) ? $printer->char_per_line : ''));?>\r\n\r\n";

        order_data.header = ob_header + "<?= printText(lang('order'), (!empty($printer) ? $printer->char_per_line : '')); ?>\r\n\r\n";
        bill_data.header = ob_header + "<?= printText(lang('bill'), (!empty($printer) ? $printer->char_per_line : '')); ?>\r\n\r\n";
        order_data.totals = '';
        order_data.payments = '';
        bill_data.payments = '';
        order_data.footer = '';
        bill_data.footer = "<?= lang('merchant_copy'); ?> \n";
        <?php
    }
    ?>
    var lang = new Array();
    lang['code_error'] = '<?= lang('code_error'); ?>';
    lang['r_u_sure'] = '<?= lang('r_u_sure'); ?>';
    lang['please_add_product'] = '<?= lang('please_add_product'); ?>';
    lang['paid_less_than_amount'] = '<?= lang('paid_less_than_amount'); ?>';
    lang['x_suspend'] = '<?= lang('x_suspend'); ?>';
    lang['discount_title'] = '<?= lang('discount_title'); ?>';
    lang['update'] = '<?= lang('update'); ?>';
    lang['tax_title'] = '<?= lang('tax_title'); ?>';
    lang['leave_alert'] = '<?= lang('leave_alert'); ?>';
    lang['close'] = '<?= lang('close'); ?>';
    lang['delete'] = '<?= lang('delete'); ?>';
    lang['no_match_found'] = '<?= lang('no_match_found'); ?>';
    lang['wrong_pin'] = '<?= lang('wrong_pin'); ?>';
    lang['file_required_fields'] = '<?= lang('file_required_fields'); ?>';
    lang['enter_pin_code'] = '<?= lang('enter_pin_code'); ?>';
    lang['incorrect_gift_card'] = '<?= lang('incorrect_gift_card'); ?>';
    lang['card_no'] = '<?= lang('card_no'); ?>';
    lang['value'] = '<?= lang('value'); ?>';
    lang['balance'] = '<?= lang('balance'); ?>';
    lang['unexpected_value'] = '<?= lang('unexpected_value'); ?>';
    lang['inclusive'] = '<?= lang('inclusive'); ?>';
    lang['exclusive'] = '<?= lang('exclusive'); ?>';
    lang['total'] = '<?= lang('total'); ?>';
    lang['total_items'] = '<?= lang('total_items'); ?>';
    lang['order_tax'] = '<?= lang('order_tax'); ?>';
    lang['order_discount'] = '<?= lang('order_discount'); ?>';
    lang['total_payable'] = '<?= lang('total_payable'); ?>';
    lang['rounding'] = '<?= lang('rounding'); ?>';
    lang['grand_total'] = '<?= lang('grand_total'); ?>';
    lang['register_open_alert'] = '<?= lang('register_open_alert'); ?>';
    lang['discount'] = '<?= lang('discount'); ?>';
    lang['order'] = '<?= lang('order'); ?>';
    lang['bill'] = '<?= lang('bill'); ?>';
    lang['merchant_copy'] = '<?= lang('merchant_copy'); ?>';

    $(document).ready(function() {
        <?php if ($this->session->userdata('rmspos')) { ?>
            if (get('spositems')) { remove('spositems'); }
            if (get('spos_discount')) { remove('spos_discount'); }
            if (get('spos_tax')) { remove('spos_tax'); }
            if (get('spos_sc')) { remove('spos_sc'); }
            if (get('spos_note')) { remove('spos_note'); }
            if (get('spos_customer')) { remove('spos_customer'); }
            if (get('amount')) { remove('amount'); }
            <?php $this->tec->unset_data('rmspos'); } ?>

            if (get('rmspos')) {
                if (get('spositems')) { remove('spositems'); }
                if (get('spos_discount')) { remove('spos_discount'); }
                if (get('spos_tax')) { remove('spos_tax'); }
                if (get('spos_sc')) { remove('spos_sc'); }
                if (get('spos_note')) { remove('spos_note'); }
                if (get('spos_customer')) { remove('spos_customer'); }
                if (get('amount')) { remove('amount'); }
                remove('rmspos');
            }
            <?php if ($sid) { ?>

                store('spositems', JSON.stringify(<?=$items;?>));
                store('spos_discount', '<?=$suspend_sale->order_discount_id;?>');
                store('spos_tax', '<?=$suspend_sale->order_tax_id;?>');
                store('spos_sc', '<?=$suspend_sale->sc_id;?>');// mod by mtk at 26 Feb 2019 for service charges 
                store('capacity', '<?=$suspend_sale->capacity;?>');
                store('spos_customer', '<?=$suspend_sale->customer_id;?>');
                $('#spos_customer').select2().select2('val', '<?=$suspend_sale->customer_id;?>');
                store('rmspos', '1');
                $('#tax_val').val('<?=$suspend_sale->order_tax_id;?>');
                $('#sc_val').val('<?=$suspend_sale->sc_id;?>');// mod by mtk at 26 Feb 2019 for service charges
                $('#capacity').val('<?=$suspend_sale->capacity;?>');

                $('#discount_val').val('<?=$suspend_sale->order_discount_id;?>');
                <?php } elseif ($eid) { ?>
                    $('#date').inputmask("y-m-d h:s:s", { "placeholder": "YYYY/MM/DD HH:mm:ss" });
                    store('spositems', JSON.stringify(<?=$items;?>));
                    store('spos_discount', '<?=$sale->order_discount_id;?>');
                    store('spos_tax', '<?=$sale->order_tax_id;?>');
                    store('spos_sc', '<?=$sale->sc_id;?>');// mod by mtk at 26 Feb 2019 for service charges 
                    store('spos_customer', '<?=$sale->customer_id;?>');
                     //store('capacity', '<?=$suspend_sale->capacity;?>');
                    store('sale_date', '<?=$sale->date;?>');
                    $('#spos_customer').select2().select2('val', '<?=$sale->customer_id;?>');
                    $('#date').val('<?=$sale->date;?>');
                    store('rmspos', '1');
                    $('#tax_val').val('<?=$sale->order_tax_id;?>');
                    $('#sc_val').val('<?=$sale->sc_id;?>');// mod by mtk at 26 Feb 2019 for service charges 
                    $('#capacity').val('<?=$sale->capacity;?>');
                    $('#discount_val').val('<?=$sale->order_discount_id;?>');
                    <?php } else { ?>
                        if (! get('spos_discount')) {
                            store('spos_discount', '<?=$Settings->default_discount;?>');
                            $('#discount_val').val('<?=$Settings->default_discount;?>');
                        }
                        if (! get('spos_tax')) {
                            store('spos_tax', '<?=$Settings->default_tax_rate;?>');
                            $('#tax_val').val('<?=$Settings->default_tax_rate;?>');
                        }
                        // mod by mtk at 26 Feb 2019 for service charges 
                        if (! get('spos_sc')) {
                            store('spos_sc', '<?=$Settings->service_charges;?>');
                            $('#sc_val').val('<?=$Settings->service_charges;?>');
                        }
                        // end mod by mtk
                        <?php } ?>

                        if (ots = get('spos_tax')) {
                            $('#tax_val').val(ots);
                        }
                        // mod by mtk at 26 Feb 2019 for service charges 
                        if (scs = get('spos_sc')) {
                            $('#sc_val').val(scs);
                        }
                        //end mod by mtk
                         if (capacity=get('capacity')) {
                            $('#capacity').val(capacity);
                        }
                        if (ods = get('spos_discount')) {
                            $('#discount_val').val(ods);
                        }

                        bootbox.addLocale('bl',{OK:'<?= lang('ok'); ?>',CANCEL:'<?= lang('no'); ?>',CONFIRM:'<?= lang('yes'); ?>'});
                        bootbox.setDefaults({closeButton:false,locale:"bl"});
                        <?php if ($eid) { ?>
                            $('#suspend').attr('disabled', true);
                            $('#print_order').attr('disabled', true);
                            $('#print_bill').attr('disabled', true);
                            <?php } ?>
                        });
                    </script>

                    <script type="text/javascript">
                        var socket = null;
                        <?php
                        if ($Settings->remote_printing == 2) {
                            ?>
                            try {
                                socket = new WebSocket('ws://127.0.0.1:6441');
                                socket.onopen = function () {
                                    console.log('Connected');
                                    return;
                                };
                                socket.onclose = function () {
                                    console.log('Connection closed');
                                    return;
                                };
                            } catch (e) {
                                console.log(e);
                            }
                            <?php
                        }
                        ?>
                        function printBill(bill) {
                            if (Settings.remote_printing == 1 || Settings.remote_printing == 0) {
                                Popup($('#bill_tbl').html());
                            } else if (Settings.remote_printing == 2) {
                                if (socket.readyState == 1) {
                                    var socket_data = {'printer': <?= $Settings->local_printers ? "''" : json_encode($printer); ?>, 'logo': '<?= !empty($store->logo) ? base_url('uploads/'.$store->logo) : ''; ?>', 'text': bill};
                                    socket.send(JSON.stringify({
                                        type: 'print-receipt',
                                        data: socket_data
                                    }));
                                    return false;
                                } else {
                                    bootbox.alert('<?= lang('pos_print_error'); ?>');
                                    return false;
                                }
                            }
                        }
                        var order_printers = <?= $Settings->local_printers ? "''" : json_encode($order_printers); ?>;
                        function printOrder(order) {
                            if (Settings.remote_printing == 1) {
  
                                Popup($('#order_tbl').html());
                            } else if (Settings.remote_printing == 2) {
                                if (socket.readyState == 1) {
                                    if (order_printers == '') {

                                        var socket_data = { 'printer': false, 'order': true,
                                        'logo': '<?= !empty($store->logo) ? base_url('uploads/'.$store->logo) : ''; ?>',
                                        'text': order };
                                        socket.send(JSON.stringify({type: 'print-receipt', data: socket_data}));

                                    } else {

                                        $.each(order_printers, function() {
                                            var socket_data = {'printer': this, 'logo': '<?= !empty($store->logo) ? base_url('uploads/'.$store->logo) : ''; ?>', 'text': order};
                                            socket.send(JSON.stringify({type: 'print-receipt', data: socket_data}));
                                        });

                                    }
                                    return false;
                                } else {
                                    bootbox.alert('<?= lang('pos_print_error'); ?>');
                                    return false;
                                }
                            }
                        }

                        function Popup(data) {
                            var mywindow = window.open('', 'spos_print', 'height=500,width=300');
                            mywindow.document.write('<html><head><title>Print</title>');
                            mywindow.document.write('<link rel="stylesheet" href="<?= $assets ?>bootstrap/css/bootstrap.min.css" type="text/css" />');
                            mywindow.document.write('</head><body >');
                            mywindow.document.write(data);
                            mywindow.document.write('</body></html>');
                            mywindow.print();
                            mywindow.close();
                            return true;
                        }
                    </script>


                    <script type="text/javascript">

                      function change()
                      {
                        $('#hidden_id').val($('#nPrice').val());
                        $('#nPrice').val($('#nWholeSale').val());
                      }

                      function rechange()
                      {
                        $('#nPrice').val($('#hidden_id').val());
                      }

                      function output(){
                            $('#hid').val($('#nPrice').val());
                            $('#nPrice').val($('#nWholeSale').val());
                        }
                      //$('#hid').val($('#nPrice').val());
                      function reset()
                        {
                            $('#nPrice').val($('#hid').val());
                        }
                      
                        $('#nWholeSale').on("click",function() {

                        //$('#hid').val($('#nPrice').val());
                        $('#nPrice').val($('#nWholeSale').val());

                       });

                       $('#nWholeSale1').on("click",function() {

                        //$('#hid').val($('#nPrice').val());
                        $('#nPrice').val($('#nWholeSale1').val());

                       });

                       $('#nWholeSale2').on("click",function() {

                        //$('#hid').val($('#nPrice').val());
                        $('#nPrice').val($('#nWholeSale2').val());

                       });

                       $('#nWholeSale3').on("click",function() {

                        //$('#hid').val($('#nPrice').val());
                        $('#nPrice').val($('#nWholeSale3').val());

                       });

                       $('#nWholeSale4').on("click",function() {

                        //$('#hid').val($('#nPrice').val());
                        $('#nPrice').val($('#nWholeSale4').val());

                       });

                       $('#nWholeSale5').on("click",function() {

                        //$('#hid').val($('#nPrice').val());
                        $('#nPrice').val($('#nWholeSale5').val());

                       });

                       $('#nWholeSale6').on("click",function() {

                        //$('#hid').val($('#nPrice').val());
                        $('#nPrice').val($('#nWholeSale6').val());

                       });


                       $('#take_away').on("click",function() {

                        $('#delModal').modal({backdrop:'static'});

                       });

                       $('#dine_in').on("click",function() {

                        alert('ok');
                      
                       });
                                            
              $count=0;
             $('#plus').click(function() {
               // $count+=1;
                $count=document.getElementById('capacity1').value;
              
                $count=+$count+1;
              
                $('#capacity1').val($count);
              $('#capacity') .val($count);
                  //  alert("ok");
                });
             $('#minus').click(function() {
               // $count-=1;
                if($('#capacity1').val()==1){
                    $('#capacity1').val(1);}
                    else{
                 var aa= $('#capacity1').val()-1;
                 $('#capacity1').val(aa);
                 $('#capacity').val(aa);
                }
                });
                        
                     /*$(ck).click(function() {
    if ($('#ck').is(':checked')) {
      $('#nPrice').val($('#nWholeSale').val());
    } else {
      $('#nPrice').val($('#nPrice').val());
    }
  });*/

                    </script>
		    
		    <!-- mod by mtk for qty and foc at 28 March 2019-->
                    <script type="text/javascript">

                       $('#plus_qty').click(function() {
                       
                       $count = document.getElementById("nQuantity").value;
                       $count = +$count +1;
                       $('#nQuantity').val($count);

                       });

                      $('#minus_qty').click(function() {
               
                      if($('#nQuantity').val()==0)
                      {
                      $('#nQuantity').val(0);
                      }
                      else
                      {
                       $count = document.getElementById("nQuantity").value;
                       $count = +$count -1;
                       $('#nQuantity').val($count);
                       
                      }
                     });

                    </script>


                    <script type="text/javascript">

                    $('#plus_foc').click(function() {

                       $counts = document.getElementById("nFoc").value;
                       $counts = +$counts +1;
                       $('#nFoc').val($counts);

                       });

                      $('#minus_foc').click(function() {
               
                      if($('#nFoc').val()==0)
                      {
                      $('#nFoc').val(0);
                      }
                      else
                      {
                       $counts = document.getElementById("nFoc").value;
                       $counts = +$counts -1;
                       $('#nFoc').val($counts);
                      }
                     });

                    

                    </script>
                    <!-- end mod by mtk -->



                    <?php
                    if (isset($print) && !empty($print)) {
                        /* include FCPATH.'themes'.DIRECTORY_SEPARATOR.$Settings->theme.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'pos'.DIRECTORY_SEPARATOR.'remote_printing.php'; */
                        include 'remote_printing.php';
                    }
                    ?>

                    
                    <script src="<?= $assets ?>dist/js/libraries.min.js" type="text/javascript"></script>
                    <script src="<?= $assets ?>dist/js/scripts.min.js" type="text/javascript"></script>
                    <script src="<?= $assets ?>dist/js/pos.min.js" type="text/javascript"></script>
                </body>
                </html>
