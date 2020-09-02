<!DOCTYPE html>
<html>
<head>
    <title>Paginationjs example</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="../dist/pagination.css" rel="stylesheet" type="text/css">
    <style type="text/css">        
        /* #wrapper {
            width: 900px;
            margin: 20px auto;
        }        
        .data-container {
            margin-top: 20px;
            width:auto;
        } */
        .paginationjs{
            line-height:1.6;font-family:Marmelad,"Lucida Grande",Arial,"Hiragino Sans GB",Georgia,sans-serif;
            font-size:14px;box-sizing:initial;
        }
        .paginationjs:after{
            display:table;content:" ";clear:both
        }
        .paginationjs .paginationjs-pages{
            float:left;
        }
        .paginationjs .paginationjs-pages ul{
            float:left;margin:0;padding:0;
        }
        .paginationjs .paginationjs-go-button,.paginationjs .paginationjs-go-input,.paginationjs .paginationjs-nav{
            float:left;margin-left:10px;font-size:14px
        }
        .paginationjs .paginationjs-pages li{
            float:left;border:1px solid #aaa;border-right:none;list-style:none;
        }
        .paginationjs .paginationjs-pages li>a{
            min-width:30px;height:28px;line-height:28px;display:block;background:#fff;font-size:14px;color:#333;
            text-decoration:none;text-align:center
        }
        .paginationjs .paginationjs-pages li>a:hover{
            background:#eee
        }
        .paginationjs .paginationjs-pages li.active{
            border:none
        }
        .paginationjs .paginationjs-pages li.active>a{
            height:30px;line-height:30px;background:#aaa;color:#fff
        }
        .paginationjs .paginationjs-pages li.disabled>a{
            opacity:.3
        }
        .paginationjs .paginationjs-pages li.disabled>a:hover{
            background:0 0
        }
        .paginationjs .paginationjs-pages li:first-child,.paginationjs .paginationjs-pages li:first-child>a{
            border-radius:3px 0 0 3px
        }
        .paginationjs .paginationjs-pages li:last-child{
            border-right:1px solid #aaa;border-radius:0 3px 3px 0
        }
        .paginationjs .paginationjs-pages li:last-child>a{
            border-radius:0 3px 3px 0
        }
        .paginationjs .paginationjs-go-input>input[type=text]{
            width:30px;height:28px;background:#fff;border-radius:3px;border:1px solid #aaa;padding:0;font-size:14px;
            text-align:center;vertical-align:baseline;outline:0;box-shadow:none;box-sizing:initial
        }
        .paginationjs .paginationjs-go-button>input[type=button]{
            min-width:40px;height:30px;line-height:28px;background:#fff;border-radius:3px;border:1px solid #aaa;
            text-align:center;padding:0 8px;font-size:14px;vertical-align:baseline;outline:0;box-shadow:none;
            color:#333;cursor:pointer;vertical-align:middle\9
        }
        .paginationjs.paginationjs-theme-blue .paginationjs-go-input>input[type=text],.paginationjs.paginationjs-theme-blue .paginationjs-pages li{
            border-color:#289de9
        }
        .paginationjs .paginationjs-go-button>input[type=button]:hover{
            background-color:#f8f8f8
        }
        .paginationjs .paginationjs-nav{
            height:30px;line-height:30px
        }
        .paginationjs .paginationjs-go-button,.paginationjs .paginationjs-go-input{
            margin-left:5px\9
        }
        .paginationjs.paginationjs-small{
            font-size:12px
        }
        .paginationjs.paginationjs-small .paginationjs-pages li>a{
            min-width:26px;height:24px;line-height:24px;font-size:12px
        }
        .paginationjs.paginationjs-small .paginationjs-pages li.active>a{
            height:26px;line-height:26px
        }
        .paginationjs.paginationjs-small .paginationjs-go-input{
            font-size:12px
        }
        .paginationjs.paginationjs-small .paginationjs-go-input>input[type=text]{
            width:26px;height:24px;font-size:12px
        }
        .paginationjs.paginationjs-small .paginationjs-go-button{
            font-size:12px
        }
        .paginationjs.paginationjs-small .paginationjs-go-button>input[type=button]{
            min-width:30px;height:26px;line-height:24px;padding:0 6px;font-size:12px
        }
        .paginationjs.paginationjs-small .paginationjs-nav{
            height:26px;line-height:26px;font-size:12px
        }
        .paginationjs.paginationjs-big{
            font-size:16px
        }
        .paginationjs.paginationjs-big .paginationjs-pages li>a{
            min-width:36px;height:34px;line-height:34px;font-size:16px
        }
        .paginationjs.paginationjs-big .paginationjs-pages li.active>a{
            height:36px;line-height:36px
        }
        .paginationjs.paginationjs-big .paginationjs-go-input{
            font-size:16px
        }
        .paginationjs.paginationjs-big .paginationjs-go-input>input[type=text]{
            width:36px;height:34px;font-size:16px
        }
        .paginationjs.paginationjs-big .paginationjs-go-button{
            font-size:16px
        }
        .paginationjs.paginationjs-big .paginationjs-go-button>input[type=button]{
            min-width:50px;height:36px;line-height:34px;padding:0 12px;font-size:16px
        }
        .paginationjs.paginationjs-big .paginationjs-nav{height:36px;line-height:36px;font-size:16px}
        .paginationjs.paginationjs-theme-blue .paginationjs-pages li>a{color:#289de9}
        .paginationjs.paginationjs-theme-blue .paginationjs-pages li>a:hover{background:#e9f4fc}
        .paginationjs.paginationjs-theme-blue .paginationjs-pages li.active>a{background:#289de9;color:#fff}
        .paginationjs.paginationjs-theme-blue .paginationjs-pages li.disabled>a:hover{background:0 0}
        .paginationjs.paginationjs-theme-blue .paginationjs-go-button>input[type=button]{background:#289de9;border-color:#289de9;color:#fff}
        .paginationjs.paginationjs-theme-green .paginationjs-go-input>input[type=text],.paginationjs.paginationjs-theme-green .paginationjs-pages li{border-color:#449d44}
        .paginationjs.paginationjs-theme-blue .paginationjs-go-button>input[type=button]:hover{background-color:#3ca5ea}
        .paginationjs.paginationjs-theme-green .paginationjs-pages li>a{color:#449d44}
        .paginationjs.paginationjs-theme-green .paginationjs-pages li>a:hover{background:#ebf4eb}
        .paginationjs.paginationjs-theme-green .paginationjs-pages li.active>a{background:#449d44;color:#fff}
        .paginationjs.paginationjs-theme-green .paginationjs-pages li.disabled>a:hover{background:0 0}
        .paginationjs.paginationjs-theme-green .paginationjs-go-button>input[type=button]{background:#449d44;border-color:#449d44;color:#fff}
        .paginationjs.paginationjs-theme-yellow .paginationjs-go-input>input[type=text],.paginationjs.paginationjs-theme-yellow .paginationjs-pages li{border-color:#ec971f}
        .paginationjs.paginationjs-theme-green .paginationjs-go-button>input[type=button]:hover{background-color:#55a555}
        .paginationjs.paginationjs-theme-yellow .paginationjs-pages li>a{color:#ec971f}
        .paginationjs.paginationjs-theme-yellow .paginationjs-pages li>a:hover{background:#fdf5e9}
        .paginationjs.paginationjs-theme-yellow .paginationjs-pages li.active>a{background:#ec971f;color:#fff}
        .paginationjs.paginationjs-theme-yellow .paginationjs-pages li.disabled>a:hover{background:0 0}
        .paginationjs.paginationjs-theme-yellow .paginationjs-go-button>input[type=button]{background:#ec971f;border-color:#ec971f;color:#fff}
        .paginationjs.paginationjs-theme-red .paginationjs-go-input>input[type=text],.paginationjs.paginationjs-theme-red .paginationjs-pages li{border-color:#c9302c}
        .paginationjs.paginationjs-theme-yellow .paginationjs-go-button>input[type=button]:hover{background-color:#eea135}
        .paginationjs.paginationjs-theme-red .paginationjs-pages li>a{color:#c9302c}
        .paginationjs.paginationjs-theme-red .paginationjs-pages li>a:hover{background:#faeaea}
        .paginationjs.paginationjs-theme-red .paginationjs-pages li.active>a{background:#c9302c;color:#fff}
        .paginationjs.paginationjs-theme-red .paginationjs-pages li.disabled>a:hover{background:0 0}
        .paginationjs.paginationjs-theme-red .paginationjs-go-button>input[type=button]{background:#c9302c;border-color:#c9302c;color:#fff}
        .paginationjs.paginationjs-theme-red .paginationjs-go-button>input[type=button]:hover{
            background-color:#ce4541
        }
        .paginationjs .paginationjs-pages li.paginationjs-next{
            border-right:1px solid #aaa\9
        }
        .paginationjs .paginationjs-go-input>input[type=text]{
            line-height:28px\9;vertical-align:middle\9
        }
        .paginationjs.paginationjs-big .paginationjs-pages li>a{
            line-height:36px\9
        }
        .paginationjs.paginationjs-big .paginationjs-go-input>input[type=text]{height:36px\9;line-height:36px\9}
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="wrapper">
            <div class="row">
                <!--left column-->
                <div class="col-7 py-1 px-2 bg-white shadow-lg p-4 mb-4 bg-white">
                    <div class="row">
                        <div class="col-9  pl-3">
                            <h1 class="font-weight-bold pt-2"><i class="fa fa-list-alt text-inverse" aria-hidden="true"></i> Categories</h1>
                        </div>
                        <div class="col-3 pt-2 text-right">
                            <!-- <button id="demo" type="button" class="btn btn-circle btn-md border border-info" ><i class="fa fa-chevron-left text-inverse"></i> </button>
                            <button type="button" class="btn btn-circle btn-md border border-info" ><i class="fa fa-chevron-right text-inverse"></i> </button> -->
                        </div>
                    </div>
                    <!-- all categories.... -->
                    <!-- <div class="row pt-2 my-auto">
                        <p><?php echo json_encode($categories) ?></p>
                        <?php foreach($categories as $category) : ?>
                        <div class="col-2">
                            <a href="<?php echo base_url('admin/pos/get_category/'.$category['id']) ?>">
                                <button type="button" id="myCategory" class="btn waves-effect waves-light btn-xl btn-primary" style="width:100%;">
                                    <p class="text-center font-20">
                                    <?php if($category['id'] == 1){ ?>
                                        <img src="<?php echo base_url() ?>assets/images/laundry/washicon.svg" alt="washicon" class="img-thumbnail " style="width:100%;height:50%;"><br>

                                    <?php }elseif($category['id'] == 2){   ?>
                                        <img src="<?php echo base_url() ?>assets/images/laundry/dry.svg" alt="dryicon" class="img-thumbnail" style="width:100%;height:50%;"><br>

                                    <?php } elseif($category['id'] == 3){   ?>
                                        <img src="<?php echo base_url() ?>assets/images/laundry/iron.svg" alt="ironicon" class="img-thumbnail" style="width:100%;height:50%;"><br>

                                    <?php } elseif($category['id'] == 4){   ?>
                                        <img src="<?php echo base_url() ?>assets/images/laundry/softener.svg" alt="softener" class="img-thumbnail" style="width:100%;height:50%;"><br>

                                    <?php } else{   ?>
                                        <img src="<?php echo base_url() ?>assets/images/laundry/other.svg" alt="other" class="img-thumbnail" style="width:100%;height:50%;"><br>

                                    <?php } ?>
                                    <?= $category['name'] ?>
                                    </p>
                                </button>
                            </a>
                        </div>
                        <?php endforeach; ?>
                    </div> -->
                    <div class="data-container"></div>
                    <div id="pagination-demo1"></div>

                    <div class="row mt-4">
                        <div class="col-12 mb-4">
                            <div class="card example-1 scrollbar-deep-purple bordered-deep-purple thin">
                                <div class="card-body">
                                    <?php foreach($category_products as $product) : ?>
                                    <a href="<?php echo base_url('admin/pos/get_product/'.$product['id']) ?>">
                                        <button type="button" id="productItem" class="btn waves-effect waves-light btn-lg  btn-outline-primary mb-3 mr-3"><?= $product['name'] ?></button>
                                    </a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>                    
                </div>
                <!--left column end-->

                <!-- add customer modal -->
                <div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header modal-primary">
                                <h3 class="modal-title">Add Customer</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            </div>
                            
                            <?= form_open('admin/pos/add_customer', 'id="customer-form"'); ?>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" class="form-control" required data-validation-required-message="This field is required"> 
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Address</label> 
                                        <input type="text" name="address" class="form-control" required data-validation-required-message="This field is required"> 
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" name="phone" class="form-control" required data-validation-required-message="This field is required"> 
                                    </div>
                                    <div class="form-group">
                                        <label for="custom">Custom Field</label>
                                        <input type="text" name="customfield" class="form-control" > 
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success waves-effect waves-light">Add customer</button>
                                </div>
                            <?= form_close(); ?>
                        </div>
                    </div>
                </div>
                <!-- /.modal -->

                <!--right column-->
                <div class="col-5 py-1 px-2 " > 
                    <form action="<?php echo site_url('');?>" method="post">
                        <div class="input-group mb-1" >
                            <select class="form-control custom-select bg-white" tabindex="1">
                                <option value="" disabled selected>Choose a customer</option>
                                <?php foreach($customers as $customer) : ?>
                                    <option value="<?= $customer['id'] ?>"><?= $customer['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="input-group-addon bg-info " id="addcustomer"  >
                                <i class="fa fa-plus text-white" aria-hidden="true" data-toggle="modal" data-target="#responsive-modal"></i> 
                            </div>          
                        </div><!--add customer end-->                    

                        <!-- received order date -->
                        <!-- <div class="row">
                            <div class="col-2 py-2">Receive</div>
                            <div class="col-5">
                                <div class="input-group mb-1">  
                                    <input type="date" class="form-control" name="start-date" id="start-date" >
                                </div>     
                            </div>   
                            <div class="col-5">
                                <div class="input-group mb-1">  
                                    <input type="time" class="form-control" name="start-time" id="start-time" >
                                </div>     
                            </div>      
                        </div>  -->

                        <!-- pick up date -->
                        <div class="row">
                            <div class="col-2 py-2"><h5 class=" text-inverse font-weight-bold px-2">Pick up</h5></div>
                            <div class="col-5">
                                <div class="input-group mb-1">  
                                    <input type="date" name="end-date" id="end-date" class="form-control">
                                </div>     
                            </div>  
                            <div class="col-5">
                                <div class="input-group mb-1">  
                                    <input type="time" class="form-control" name="end-time" id="end-time" >
        
                                </div>   
                            </div>      
                        </div> 

                        <div class="input-group mb-1">
                            <input type="text" class="form-control" placeholder="Reference note" name="note">
                        </div>

                        <div class="input-group mb-1">
                            <input type="text" class="form-control" placeholder="Search product by name or code">
                            <span class="input-group-btn"><button class="btn btn-info btn-block" type="button">Search</button></span> 
                        </div>

                        <div class="fixed-table-container">
                            <div class="fixed-table-header">
                                <table class="table table-striped table-condensed table-hover list-table" style="margin:0;">
                                    <thead>
                                        <tr class="text-white font-20 font-weight-bold" style="background-color:#8080ff;">
                                            <th>Product</th>
                                            <th style="width: 15%;text-align:center;">Price</th>
                                            <th style="width: 15%;text-align:center;">Qty</th>
                                            <th style="width: 20%;text-align:center;">Subtotal</th>
                                            <th style="width: 20px;" class="satu"><i class="fa fa-trash-o"></i></th>
                                        </tr>
                                    </thead>
                                    <?php if($product_item ==null){?>
                                    <tbody>
                                        <tr>
                                            <th style="border:1px" colspan="5">Add item</th>
                                        </tr>
                                    </tbody>
                                    <?php } ?>
                                    <?php if($product_item){ ?>
                                    <tbody>
                                        <?php foreach(($product_item) as $item) : ?>
                                        <tr>
                                        <td><?php echo $item['name'] ?></td>
                                        <td class="text-right"><?php echo number_format($item['price']) ?></td>
                                        <td><input type="text" value="<?php echo $item['quantity'] ?>" class="form-control text-center" id="totalqty"></td>
                                        <td class="text-right"><?php echo number_format($item['total'])?></td>
                                        <td>
                                        <a href="<?php echo base_url('admin/pos/delete_items/'.$item['id']) ?>">
                                        <i class="fa fa-trash-o text-danger"></i>
                                        </a>
                                        </td>
                                        </tr>
                                        <?php endforeach; ?> 
                                    </tbody>
                                    <?php } ?>
                                        
                                </table>
                            </div>
                            <div>
                                <table class="table table-condensed totals bg-light-info" style="margin-bottom:5px;font-weight:bold;font-size:18px;">
                                    <tbody>
                                        <tr class="info">
                                            <td width="25%" class="text-inverse">Total items</td>
                                            <td class="text-right text-inverse" style="padding-right:10px;">
                                                <span id="count"><?= count($product_item) ?>
                                                (
                                                    <?php if($product_item){
                                                        $countQty = 0;
                                                        $counttotalamount = 0;
                                                        foreach(($product_item) as $itemcount) {
                                                            $countQty += $itemcount['quantity'];
                                                            $counttotalamount += $itemcount['total'];
                                                        }
                                                        echo $countQty;
                                                    }else{
                                                        echo 0;
                                                    }?>
                                                )
                                                </span></td>
                                            <td width="25%" class="text-inverse">Total</td>
                                            <td class="text-right text-inverse" colspan="2">
                                                <span id="total">
                                                    <?php if($product_item){
                                                        $counttotalamount = 0;
                                                        foreach(($product_item) as $itemcount) {
                                                            $counttotalamount += $itemcount['total'];
                                                        }
                                                        echo $counttotalamount;
                                                    }else{
                                                        echo 0;
                                                    }?>
                                                </span>
                                            </td>
                                        </tr>
                                        <tr class="info">
                                            <td width="25%"><a href="#" id="add_discount" data-toggle="modal" data-target="#responsive-modal-discount">Discount</a></td>
                                            <td class="text-right text-inverse" style="padding-right:10px;"><span id="ds_con">( 0 ) 0</span></td>
                                            <td width="25%"></td>
                                            <td class="text-right"></td>
                                        </tr>
                                        <tr class="info">
                                            <td width="40%"><a href="#" id="add_sc" data-toggle="modal" data-target="#responsive-modal-service">Service charges</a></td><!-- mod by mtk at 26 Feb 2019 for service charges -->
                                            <td class="text-right text-inverse" style="padding-right:10px;"><span id="sc_con">0</span></td>
                                            <td width="10%" class="text-inverse"></td>
                                            <td class="text-right" style="padding-right:10px;"><span id="nothing"></span></td> 
                                        </tr>
                                        <!-- end mod -->
                                        <tr class="success">
                                            <td colspan="2" style="font-weight:bold;font-size:18px;" class="text-inverse">
                                            Total payable
                                            <a role="button" data-toggle="modal" data-target="#noteModal">
                                            <i class="fa fa-comment"></i>
                                            </a>
                                            </td>
                                            <td class="text-right text-inverse" colspan="2" style="font-weight:bold;font-size:18px;">
                                                <span id="total-payable">
                                                    <?php if($product_item){
                                                        $counttotalamount = 0;
                                                        foreach(($product_item) as $itemcount) {
                                                            $counttotalamount += $itemcount['total'];
                                                        }
                                                        echo $counttotalamount;
                                                    }else{
                                                        echo 0;
                                                    }?>
                                                </span>
                                            </td>
                                            
                                        </tr>
                                    </tbody>
                                </table>
                            </div>                            
                        </div>
                        <div class="col-12 text-center">
                            <div class="row">
                                <div class="col-6 btn-group-vertical btn-block btn-flat px-0">
                                    <button type="button" class="btn btn-warning btn-block btn-flat text-white" style="height:48px;font-size:18px;">Hold</button>
                                    <button type="button" class="btn btn-danger btn-block btn-flat" style="height:48px;font-size:18px;">Cancel</button>
                                </div>
                                <div class="col-6 btn-group px-0 ">
                                    <button type="button" class="btn btn-block btn-flat btn-success" style="height:96px;font-size:18px;color:white">Payment</button>
                                </div>
                            </div>
                        </div>
                    </form>                    
                </div>
                <!--right col end-->
            </div>
        </div>
        <!--wrapper end-->  
    </div>
    <!-- discount modal -->
    <div id="responsive-modal-discount" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-primary">
                    <h3 class="modal-title">Discount ( 5 or 5% )</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                
                <?= form_open(''); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" required data-validation-required-message="This field is required"> 
                    </div>
                    <div class="form-group">
                        <fieldset class="controls">
                            <label class="custom-control custom-radio">
                            <input type="radio" value="1" name="styled_radio" required id="styled_radio1" class="custom-control-input"> <span class="custom-control-indicator"></span> <span class="custom-control-description">Apply to order total</span> </label>
                        </fieldset>
                        <fieldset>
                            <label class="custom-control custom-radio">
                            <input type="radio" value="2" name="styled_radio" id="styled_radio2" class="custom-control-input"> <span class="custom-control-indicator"></span> <span class="custom-control-description">Apply to all order items</span> </label>
                        </fieldset>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success waves-effect waves-light">Update</button>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>

    <!-- service charges modal -->
    <div id="responsive-modal-service" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-primary">
                    <h3 class="modal-title">Service Charges ( 5 or 5% )</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                
                <?= form_open(''); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" required data-validation-required-message="This field is required"> 
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success waves-effect waves-light">Update</button>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</body>
</html>
<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
<!-- <script src="../src/pagination.js"></script> -->
<script>
    $(function() {
        (function(name) {
            var container = $('#pagination-' + name);
            var sources = function() {
                var result = [];
                var catogeries = [];                
                // var catogeries = ["Wash", "D1", "D2", "D3", "D4", "Dry", "Iron", "Softender", "Other", "DDD", "WWW"];
                // var catogeries = [["1","Wash","wa"],["2","Dry","dr"],["3","Iron","ir"]];
                var catogeries = <?php echo json_encode( $categories ) ?>;
                console.log("All categories",catogeries);
                return catogeries;
                
                // result.push(catogeries[0]['name']);
                // result.push(catogeries[1]['name']);                    
                // console.log("Result_Arr",result);
                // console.log("Length",catogeries.length);
                // for (var i = 0; i < catogeries.length; i++) {
                //     // result[i].push(catogeries[i]['id']);
                //     result.push(catogeries[i]['name']);
                // }
                // console.log("Result arr",result);
                // return result;
            }();
            // url: base_url + 'admin/pos/get_category/',
            
            var options = {
                dataSource: sources,
                callback: function(response, pagination) {
                    window.console && console.log(response, pagination);
                    console.log("Resp Data>>",response);                        

                    var dataHtml = '<div class="row">';
                    $.each(response, function(index, item) {
                        
                        var res_name = response[index]['name'];
                        var res_id = response[index]['id'];
                        // console.log("Resp id>>",res_id);
                        // console.log("Resp name>>",res_name);
                        
                        // dataHtml += '<div class="col-2">';
                        // dataHtml += item;                                               
                        // dataHtml += '</div>';
                        dataHtml += '<div class="col-2 btn">';
                        dataHtml += '<input id="cat_id'+ index +'" type="hidden" value="'+res_id+'">';                            
                        dataHtml += '<a href="<?php echo base_url('admin/pos/get_category/')?>'+res_id+'">';
                        dataHtml += '<button id="myCategory" class="category waves-effect waves-light btn-xl btn-primary" style="width:100%;" data-cid="'+res_id+'">';
                        dataHtml += '<p class="text-center font-20" style="">';
                        if(res_id==1){                           
                            dataHtml +='<img src="<?php echo base_url() ?>assets/images/laundry/washicon.svg" alt="washicon" class="img-thumbnail" style="width:100%;height:50%;"><br>';
                        }else if(res_id==2){
                            dataHtml +='<img src="<?php echo base_url() ?>assets/images/laundry/dry.svg" alt="washicon" class="img-thumbnail" style="width:100%;height:50%;"><br>';
                        }else if(res_id == 3){
                            dataHtml +='<img src="<?php echo base_url() ?>assets/images/laundry/iron.svg" alt="washicon" class="img-thumbnail" style="width:100%;height:50%;"><br>';
                        }else if(res_id == 4){
                            dataHtml +='<img src="<?php echo base_url() ?>assets/images/laundry/softener.svg" alt="washicon" class="img-thumbnail" style="width:100%;height:50%;"><br>';
                        }else if(res_id == 5){
                            dataHtml +='<img src="<?php echo base_url() ?>assets/images/laundry/other.svg" alt="washicon" class="img-thumbnail" style="width:100%;height:50%;"><br>';
                        }else{
                            dataHtml +='<img src="<?php echo base_url() ?>assets/images/laundry/dry.svg" alt="washicon" class="img-thumbnail" style="width:100%;height:50%;"><br>';
                        }
                        // dataHtml += item;
                        dataHtml += '<span style="width:150%;">'+res_name+'</span>';
                        dataHtml += '</p>';
                        dataHtml += '</button>';
                        dataHtml += '</a>';                                              
                        dataHtml += '</div>';                        
                        
                    });
                    
                    dataHtml += '</div>';
                    
                    //no need current
                    // $(document).on("click", ".category", function (e) {
                    //     var code= $(this).data("cid");
                    //     var base_url = "<?php echo base_url()?>";// http://localhost:90/laundry/
                    //     console.log("Base Url>>",base_url);
                    //     alert("OK"+code);
                    //     console.log(code);
                    //     $.ajax({
                    //         type: "get",
                    //         url: base_url+'admin/pos/get_categories/'+code,
                    //         dataType: "json",
                    //         success: function(data) {
                    //             console.log("Resp categories>>",data);
                    //         }
                    //     });
                    // });

                    container.prev().html(dataHtml);
                }
            };

            //$.pagination(container, options);

            container.addHook('beforeInit', function() {
                window.console && console.log('beforeInit...');
            });
            container.pagination(options);

            container.addHook('beforePageOnClick', function() {
                window.console && console.log('beforePageOnClick...');
                //return false
            });
        })('demo1');
    });
    
</script>