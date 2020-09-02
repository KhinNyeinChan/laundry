
<div class="container-fluid">
    <div class="row ">
        <!--left column-->
        <div class="col-12 col-sm-7 py-1 bg-white shadow-lg mb-4 bg-white"> 

            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <h1 class="font-weight-bold pt-2"><i class="fa fa-list-alt text-inverse" aria-hidden="true"></i> Categories</h1>
                </div>
            </div><!--category title row end-->

            <div class="data-container"></div>
            <div id="pagination-demo1"></div>
             <!--category list row end-->

            <div class="row mt-4">
                <div class="col-12 mb-4">
                    <div id="add_product_item" class="container">
                        <!-- product item button here -->
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
                            <select class="form-control custom-select bg-white" tabindex="1" id="selectedCustomer">
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
                            <input type="date" class="form-control" id="pickupDate"  />
                        </div>     
                    </div>  
                    <div class="col-lg-5 col-md-5 col-sm-5">
                        <div class="input-group mb-1">  
                            <input type="time" class="form-control" name="end-time"  id="pickupTime">
                        </div>   
                    </div>      
                </div> 

                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="input-group mb-1">
                            <input type="text" class="form-control" placeholder="Reference note" name="note" id="note">
                        </div>
                    </div>
                </div>
               
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="input-group mb-1">
                            <form> 
                                <input list="productname" class="form-control" placeholder="Search product by code" id="productSearch">
                                <datalist id="productname">
                                    <?php foreach($products as $product) : ?>
                                        <option value=<?= $product['code'] ?>>
                                    <?php endforeach ?>
                                </datalist>
                                <span class="input-group-btn"><input class="btn btn-info btn-block" type="button" value="Add" onclick="searchProduct()"></span> 
                            </form>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
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
                                <tbody id="order-table">    
                                    <!-- order items here -->
                                </tbody>    
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
                                            0(0) <!-- Total item ( Total quantity) here-->
                                        </span>
                                    </td>
                                    <td width="25%" class="text-inverse">Total</td>
                                    <td class="text-right text-inverse" colspan="2">
                                        <span id="total">
                                           0 <!-- Total amount here -->
                                        </span>
                                    </td>
                                </tr>
                                <tr class="info">
                                    <td width="25%"><a href="#" data-toggle="modal" data-target="#responsive-modal-discount">Discount</a></td>
                                    <td class="text-right text-inverse" style="padding-right:10px;"><span id="ds_con"></span></td>
                                    <td width="25%"></td>
                                    <td class="text-right"></td>
                                </tr>
                                
                                <tr class="success">
                                    <td colspan="2" style="font-weight:bold;font-size:18px;" class="text-inverse">
                                    Total payable
                                    <a role="button" data-toggle="modal" data-target="#noteModal">
                                    <i class="fa fa-comment"></i>
                                    </a>
                                    </td>
                                    <td class="text-right text-inverse" colspan="2" style="font-weight:bold;font-size:18px;">
                                        <span id="total-payable">
                                            0 <!-- Total payable amount here -->
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
                                <button type="button" class="btn btn-warning btn-block btn-flat text-white" style="height:48px;font-size:18px;" id="btn_hold">Hold</button>
                                <button type="button" class="btn btn-danger btn-block btn-flat" style="height:48px;font-size:18px;" aria-hidden="true" data-toggle="modal" data-target="#cancel-order-modal">Cancel</button>
                            </div>
                            <div class="col-6 btn-group p-l-0">
                                <button type="button" id="btn_payment" class="btn btn-block btn-flat btn-success" style="height:96px;font-size:18px;color:white">Payment</button>
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
                        <h3 class="modal-title">Discount </h3>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                     </div>
                    
                     <form>
                        <div class="modal-body">
                            <div class="form-group ">
                                <input type="text" id='input-discount' name="discount" class="form-control mb-2" required data-validation-required-message="This field is required" placeholder="eg. 10%"> 
                                <input type="checkbox" id="check" name="discount">
                                <label for="check">Discount with amount</label><br>
                                
                                <button type="button" id="submit-discount" data-dismiss="modal" class="mx-1 float-right btn btn-success waves-effect waves-light">Update</button>
                                <button type="button" class="btn btn-default waves-effect float-right" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

<!-- Order cancel modal -->
        <div id="cancel-order-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header modal-primary">
                        <h3 class="modal-title text-danger">Cancel order</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>    
                    <div class="modal-body">
                        <p class="font-weight-bold text-danger">Are you sure?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">No</button>
                        <button type="button" class="btn btn-danger waves-effect waves-light" data-dismiss="modal" onClick="cancelOrder()">Yes</button>
                    </div>
                </div>
            </div>
        </div>



<script type="text/javascript">

    let discount = 0;

    const productsArray = <?php echo json_encode($products); ?>; 
    var productBox = document.getElementById("add_product_item");  
    const categoriesItemClick = (category_id) => {
        while(productBox.firstChild){
            productBox.removeChild(productBox.firstChild);
        }

        const filterProductItem = productsArray.filter(productItem => productItem.category_id == category_id);
        for (let i = 0; i < filterProductItem.length; i++) {
            var productButton = document.createElement("button");
            productButton.setAttribute("class","btn btn-primary col-5 col-sm-3 btn-lg mx-1 my-1 text-center");
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
            subTotal : parseInt(filteredOrderItem[0].price)
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
        //console.log('Change QTY',quantity);
    }

    function createTableRowForOrderItem(itemArray){

        let tBody = document.getElementById('order-table');
        let totalItem = itemArray.length;
        let totalQty = 0;
        let totalPrice = 0;
        while(tBody.firstChild){
            tBody.removeChild(tBody.firstChild);
        }

        for (let index = 0; index < itemArray.length; index++) {

            totalQty = totalQty + itemArray[index].quantity;
            totalPrice += itemArray[index].subTotal;

            const trForOrderItem = document.createElement("tr");
            const tdForOrderItemName = document.createElement("td");
            tdForOrderItemName.innerHTML = itemArray[index].product.name;
            trForOrderItem.appendChild(tdForOrderItemName);

            const tdForOrderItemPrice = document.createElement("td");
            tdForOrderItemPrice.setAttribute("class","text-right");
            tdForOrderItemPrice.innerHTML = itemArray[index].product.price;
            trForOrderItem.appendChild(tdForOrderItemPrice);

            const tdForOrderItemQty = document.createElement("td");
            tdForOrderItemQty.setAttribute("class","text-center");
            const qtyInput = document.createElement("input");
            qtyInput.setAttribute("type","text");
            qtyInput.setAttribute("class","w-75 pt-1 text-center");
            qtyInput.setAttribute('value',itemArray[index].quantity);
            qtyInput.setAttribute('onchange',`changeQty(${itemArray[index].product.id})`);
            tdForOrderItemQty.appendChild(qtyInput);
            trForOrderItem.appendChild(tdForOrderItemQty);

            const tdForOrderItemSubtotal = document.createElement("td");
            tdForOrderItemSubtotal.setAttribute("class","text-right");
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
        if(document.getElementById("check").checked){
            document.getElementById("total-payable").innerHTML = totalPrice-discount;
        }else{
            document.getElementById("total-payable").innerHTML = totalPrice-(totalPrice*(discount/100));
        }
    }

    function cancelOrder(){
        orderItemArray = [];
        createTableRowForOrderItem(orderItemArray);
    }

    function searchProduct(){
        const searchedProductCode = document.getElementById("productSearch").value;
        const serchedProductItem = productsArray.filter(serchedItem => serchedItem.code == searchedProductCode);
        console.log(serchedProductItem);
        const searchedItemObj = {
            product : serchedProductItem[0],
            quantity : 1,
            subTotal : parseInt(serchedProductItem[0].price)
        };
        console.log(searchedItemObj);
        orderItemArray.push(searchedItemObj);
        createTableRowForOrderItem(orderItemArray)
    }

    document.getElementById('submit-discount').onclick = () => {
        event.preventDefault();
        var httpRequest = new XMLHttpRequest();
        const requestDiscountData = document.getElementById("input-discount").value;
        httpRequest.onreadystatechange = function(){
            if(this.readyState === 4 && this.status == 200){
                const responseObj = JSON.parse(this.responseText);
                discount = responseObj.discount;
                document.getElementById("ds_con").innerHTML = responseObj.discount;
                createTableRowForOrderItem(orderItemArray);
            }
        };
        httpRequest.open("POST","<?php echo base_url() ?>admin/pos/updateDiscount",true);
        httpRequest.setRequestHeader('Content-type','application/x-www-form-urlencoded');
        httpRequest.send(`requestDiscountData=${requestDiscountData}`); 

    }

    document.getElementById('btn_hold').onclick = () => {
        var xhttpRequest = new XMLHttpRequest();
        const customerId = document.getElementById("selectedCustomer").value;
        const customersArray = <?php echo json_encode($customers) ?>;
        const customer = customersArray.filter(cust => cust.id == customerId)[0];
        const pickupDate = document.getElementById("pickupDate").value;
        const pickupTime = document.getElementById("pickupTime").value;
        const refNote = document.getElementById("note").value;
        let totalQty = 0;
        let totalItem = orderItemArray.length;
        for(let i = 0; i<orderItemArray.length; i++){
            totalQty += orderItemArray[i].quantity;
        }
        const holdOrderObj = {
            customer,
            pickupDate,
            pickupTime,
            refNote,
            orderItemArray,
            totalQty,
            totalItem
        };
        xhttpRequest.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                console.log(JSON.parse(this.responseText));
            }
        };
        xhttpRequest.open("POST","<?php echo base_url() ?>admin/pos/holdOrder",true);
        xhttpRequest.setRequestHeader('Content-type','application/x-www-form-urlencoded');
        xhttpRequest.send(`holdOrderData=${JSON.stringify(holdOrderObj)}`); 
    }
</script>

<script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>

<script>
    $(function() {
        (function(name) {
            var container = $('#pagination-' + name);
            var sources = function() {
                var result = [];
                var catogeries = [];                
                var catogeries = <?php echo json_encode( $categories ) ?>;
                console.log("All categories",catogeries);
                return catogeries;
            }();
            
            var options = {
                dataSource: sources,
                callback: function(response, pagination) {
                    window.console && console.log(response, pagination);
                    console.log("Resp Data>>",response);                        

                    var dataHtml = '<div class="row">';
                    $.each(response, function(index, item) {
                        
                        var res_name = response[index]['name'];
                        var res_id = response[index]['id'];
                        dataHtml += '<div class="col-4 col-sm-2 btn">';
                        dataHtml += '<input id="cat_id'+ index +'" type="hidden" value="'+res_id+'">';                            
                        dataHtml += '<button id="myCategory" onclick="categoriesItemClick('+res_id+')" class="category waves-effect waves-light btn-xl btn-primary" style="width:100%;" data-cid="'+res_id+'">';
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

                        dataHtml += '<span style="width:150%;">'+res_name+'</span>';
                        dataHtml += '</p>';
                        dataHtml += '</button>';                                          
                        dataHtml += '</div>';                        
                        
                    });
                    
                    dataHtml += '</div>';
                    container.prev().html(dataHtml);
                }
            };

            container.addHook('beforeInit', function() {
                window.console && console.log('beforeInit...');
            });
            container.pagination(options);

            container.addHook('beforePageOnClick', function() {
                window.console && console.log('beforePageOnClick...');
            });
        })('demo1');
    });
    
</script>
