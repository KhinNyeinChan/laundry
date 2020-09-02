
<div class="container-fluid">
    <div class="row ">
        <!--left column-->
        <div class="col-12 col-sm-7 py-1 bg-white shadow-lg mb-4 bg-white"> 

            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <h1 class="font-weight-bold pt-2"><i class="fa fa-list-alt text-inverse" aria-hidden="true"></i> Categories</h1>
                </div>
            </div><!--category title row end-->

            <div class="row">
                <div class="container-fluid">
                    <section class="carousel slide" data-ride="carousel" id="postsCarousel">
                        <div class="container-fluid">
                            <div class="row float-right mb-3">
                                <div class="col-lg-12 col-sm-12 col-md-12 text-md-right lead">
                                    <a class="btn btn-outline-secondary prev" href="" title="go back"><i class="fa fa-lg fa-chevron-left"></i></a>
                                    <a class="btn btn-outline-secondary next" href="" title="more"><i class="fa fa-lg fa-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="container p-t-0 m-t-2">
                            <div class="row m-t-0 col-12">
                            <?php foreach($categories as $category) : ?>
                                <div class="col-6 col-sm-3">
                                    <div onclick="categoriesItemClick(<?= $category['id'] ?>)" class="card bg-purple" >
                                        <?php if($category['id'] == 1){ ?>
                                            <img src="<?php echo base_url() ?>assets/images/laundry/washicon.svg" alt="washicon" class="rounded card-img-top w-100">

                                        <?php }elseif($category['id'] == 2){   ?>
                                            <img src="<?php echo base_url() ?>assets/images/laundry/dry.svg" alt="dryicon" class="rounded card-img-top w-100">

                                        <?php } elseif($category['id'] == 3){   ?>
                                            <img src="<?php echo base_url() ?>assets/images/laundry/iron.svg" alt="ironicon" class="rounded card-img-top w-100">

                                        <?php } elseif($category['id'] == 4){   ?>
                                             <img src="<?php echo base_url() ?>assets/images/laundry/softener.svg" alt="softener" class="rounded card-img-top w-100">

                                        <?php } else{   ?>
                                            <img src="<?php echo base_url() ?>assets/images/laundry/other.svg" alt="other" class="rounded card-img-top w-100">

                                         <?php } ?>
                                        <div class="card-text">
                                            <p class="text-center text-dark font-bold"><?=$category['name'] ?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            </div>
                        </div>
                        
                    </section>
                </div>
                
            	
            </div> <!--category list row end-->

            <div class="row mt-4">
                <div class="col-12 mb-4">
                    <div class="card example-1 scrollbar-deep-purple bordered-deep-purple thin">
                        <div class="card-body" id="add_product_item">
                            <!-- product item button here -->
                        </div>
                    </div> 
                </div>
            </div><!--product list end-->
            
        </div> <!--left column end-->

        <!-- add customer modal -->
        <div id="responsive-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-primary">
                        <h3 class="modal-title">Add Customer</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                     </div>
                    
                    <?= form_open('admin/pos/add_customer', 'id="addcustomer"'); ?>
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
        <div class="col-12 col-sm-5 py-1 px-2 " > 
            <form action="<?php echo site_url('');?>" method="post">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
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
                    </div>
                </div>

                <!-- pick up date -->
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-2 py-2"><h5 class=" text-inverse font-weight-bold px-2">Pick up</h5></div>
                    <div class="col-lg-5 col-md-5 col-sm-5">
                        <div class="input-group mb-1">  
                            <input type="date" id="dt" onchange="mydate1();" class="form-control" placeholder="dd-mm-yyyy" />
                            <input type="text" id="ndt"  onclick="mydate();" class="form-control" hidden />
                        </div>     
                    </div>  
                    <div class="col-lg-5 col-md-5 col-sm-5">
                        <div class="input-group mb-1">  
                            <input type="time" class="form-control" name="end-time" id="end-time" >
  
                        </div>   
                    </div>      
                </div> 

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="input-group mb-1">
                            <input type="text" class="form-control" placeholder="Reference note" name="note">
                        </div>
                    </div>
                </div>
               
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="input-group mb-1">
                            <form action="<?php echo site_url('');?>" method="post"> 
                                <input type="text" class="form-control" placeholder="Search product by name">
                                <span class="input-group-btn"><input class="btn btn-info btn-block" type="submit" value="Search"></span> 
                                <div id="livesearch"></div>
                            </form>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <!-- <div class="fixed-table-container">-->
                        <div class="table-responsive">
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
                                <?php// if($product_item ==null){?>
                                    <tbody id="order-table"></tbody>
                                <?php// } ?>

                                <?php //if($product_item){ ?>    
                                <!-- <tbody>
                                <?php// foreach(($product_item) as $item) : ?>
                                    <tr>
                                    <td><?php// echo $item['name'] ?></td>
                                    <td class="text-right"><?php //echo number_format($item['price']) ?></td>
                                    <td class="py-1"><input type="text" value="<?php// echo $item['quantity'] ?>" class="form-control text-center" id="totalqty"></td>
                                    <td class="text-right"><?php// echo number_format($item['total'])?></td>
                                    <td>
                                    <a href="<?php// echo base_url('admin/pos/delete_items/'.$item['id']) ?>">
                                    <i class="fa fa-trash-o text-danger"></i>
                                    </a>
                                    </td>
                                    </tr>

                                    <?php//endforeach; ?> 
                                </tbody> -->
                                <?php// } ?>
                                
                            </table>
                            </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="table-responsive">
                        <table class="table table-condensed totals bg-light-info" style="margin-bottom:5px;font-weight:bold;font-size:18px;">
                            <tbody>
                                <tr class="info">
                                    <td width="25%" class="text-inverse">Total items</td>
                                    <td class="text-right text-inverse" style="padding-right:10px;">
                                        <span id="count">

                                        </span>
                                    </td>
                                    <td width="25%" class="text-inverse">Total</td>
                                    <td class="text-right text-inverse" colspan="2">
                                        <span id="total">
                                           
                                        </span>
                                    </td>
                                </tr>
                                <tr class="info">
                                    <td width="25%"><a href="#" id="add_discount" data-toggle="modal" data-target="#responsive-modal-discount">Discount</a></td>
                                    <td class="text-right text-inverse" style="padding-right:10px;"><span id="ds_con"></span></td>
                                    <td width="25%"></td>
                                    <td class="text-right"></td>
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
                                                $payable = 0;
                                                foreach(($product_item) as $itemcount) {
                                                    $counttotalamount += $itemcount['total'];
                                                }
                                                if($discountpercent['discount'] != 0){
                                                    $payable = ($counttotalamount-($counttotalamount*$discountpercent['discount']/100));
                                                    echo $payable;
                                                }else{
                                                    echo $counttotalamount;
                                                }
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
                </div>

                <div class="row">
                    <div class="col-12 text-center">
                        <div class="row">
                            <div class="col-6 btn-group-vertical btn-block btn-flat p-r-0">
                                <button type="button" class="btn btn-warning btn-block btn-flat text-white" style="height:48px;font-size:18px;">Hold</button>
                                <button type="button" class="btn btn-danger btn-block btn-flat" style="height:48px;font-size:18px;">Cancel</button>
                            </div>
                            <div class="col-6 btn-group p-l-0">
                                <button type="button" class="btn btn-block btn-flat btn-success" style="height:96px;font-size:18px;color:white">Payment</button>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
            
        </div><!--right col end--> 
        
    </div>
</div>

<!-- discount modal -->
        <div id="responsive-modal-discount" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-primary">
                        <h3 class="modal-title">Discount ( Enter 5 for 5%)</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                     </div>
                    
                     <?= form_open('admin/pos/update_discount', 'id="add_discount"'); ?>
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="text" name="discount" class="form-control" required data-validation-required-message="This field is required"> 
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success waves-effect waves-light" onClick="changeDiscount()">Update</button>
                        </div>
                    <?= form_close(); ?>
                </div>
            </div>
        </div>


<script type="text/javascript">
    const productsArray = <?php echo json_encode($products); ?>; 
    var productBox = document.getElementById("add_product_item");  
    const categoriesItemClick = (category_id) => {
        while(productBox.firstChild){
            productBox.removeChild(productBox.firstChild);
        }

        const filterProductItem = productsArray.filter(productItem => productItem.category_id == category_id);
        for (let i = 0; i < filterProductItem.length; i++) {
            var productButton = document.createElement("button");
            productButton.setAttribute("class","btn btn-primary btn-lg mx-1");
            productButton.setAttribute("onclick","productItemClick("+filterProductItem[i].id+")");
            var productName = document.createTextNode(filterProductItem[i].name);
            productButton.appendChild(productName); 
            
            productBox.appendChild(productButton);  
            
        }
    }

    let orderItemArray = [];

    const productItemClick = (product_id) =>{        
        const filteredOrderItem = productsArray.filter(orderItem => orderItem.id == product_id);
        const orderItemObj = {
            product : filteredOrderItem[0],
            quantity : 1,
            subTotal : parseFloat(filteredOrderItem[0].price)
        };
        if(checkOrderItemExist(orderItemObj)){
            const orderItemIndex = orderItemArray.findIndex(orderItem => orderItem.product.id == product_id);
            let {product, quantity, subTotal} = orderItemArray[orderItemIndex];
            quantity += 1;
            subTotal = product.price * quantity;
            orderItemArray[orderItemIndex] = {product: product, quantity: quantity, subTotal: subTotal};
        }else{
            orderItemArray.push(orderItemObj);
        }
        createTableRowForOrderItem(orderItemArray);
        
    }

    const checkOrderItemExist = (obj) => {
        return orderItemArray.some((item)=>{
            return item.product.id == obj.product.id;
        });
    }

    function deleteOrderItem(productId){
        const deletedOrderItemArray = orderItemArray.filter(orderItem => orderItem.product.id != productId);
        orderItemArray = deletedOrderItemArray;
        createTableRowForOrderItem(orderItemArray);
    }

    function changeQty(productId){
        const orderItemIndex = orderItemArray.findIndex(orderItem => orderItem.product.id == productId);
        let {product,quantity,subTotal} = orderItemArray[orderItemIndex];
        quantity = parseInt(event.target.value);
        subTotal = product.price * quantity;
        orderItemArray[orderItemIndex] = {product: product, quantity: quantity, subTotal: subTotal};
        createTableRowForOrderItem(orderItemArray);
        console.log('Change QTY',quantity);
    }

    function createTableRowForOrderItem(itemArray){

        //console.log(itemArray);

        let tBody = document.getElementById('order-table');
        let totalItem = itemArray.length;
        let totalQty = 0;
        let totalPrice = 0;
        while(tBody.firstChild){
            tBody.removeChild(tBody.firstChild);
        }

        //console.log(itemArray);
        for (let index = 0; index < itemArray.length; index++) {

            totalQty = totalQty + itemArray[index].quantity;
            totalPrice += itemArray[index].subTotal;

            const trForOrderItem = document.createElement("tr");
            const tdForOrderItemName = document.createElement("td");
            tdForOrderItemName.innerHTML = itemArray[index].product.name;
            trForOrderItem.appendChild(tdForOrderItemName);

            const tdForOrderItemPrice = document.createElement("td");
            tdForOrderItemPrice.innerHTML = itemArray[index].product.price;
            trForOrderItem.appendChild(tdForOrderItemPrice);

            const tdForOrderItemQty = document.createElement("td");
            const qtyInput = document.createElement("input");
            qtyInput.setAttribute("type","number");
            qtyInput.setAttribute('value',itemArray[index].quantity);
            qtyInput.setAttribute('onchange',`changeQty(${itemArray[index].product.id})`);
            tdForOrderItemQty.appendChild(qtyInput);
            trForOrderItem.appendChild(tdForOrderItemQty);

            const tdForOrderItemSubtotal = document.createElement("td");
            tdForOrderItemSubtotal.innerHTML = itemArray[index].subTotal;
            trForOrderItem.appendChild(tdForOrderItemSubtotal);

            const tdForOrderItemAction = document.createElement("td");
            const trashIcon = document.createElement("i");
            trashIcon.setAttribute("class","fa fa-trash-o");
            trashIcon.setAttribute('onclick',`deleteOrderItem(${itemArray[index].product.id})`);
            tdForOrderItemAction.appendChild(trashIcon);
            trForOrderItem.appendChild(tdForOrderItemAction);

            
            tBody.appendChild(trForOrderItem);

        }
        document.getElementById("count").innerHTML = totalItem + "(" +totalQty+ ")";
        document.getElementById("total").innerHTML = totalPrice;
    }
</script>
<script src="<?= $assets ?>js/pagination.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>