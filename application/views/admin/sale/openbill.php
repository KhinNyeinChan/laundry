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
                                    <th>Status</th>
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
                                    <th>Status</th>
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
                                    <td><?php echo $order['ref_note']; ?></td>
                                    <td><?php echo $order['total_item']; ?></td>
                                    <td><?php echo $order['subtotal']; ?></td> 
                                    <td><?php echo $order['payment_status']; ?></td> 
                                    
                                    <td class="text-nowrap">

                                        <?php if ($this->session->userdata('role') == 'admin'): ?>
                                            <span data-toggle="modal" data-target="#payment-modal">
                                                <a href="#"  data-toggle="tooltip" data-original-title="Add Payment" onclick="paymentFun(<?= $order['id'] ?>,'<?= $order['payment_status'] ?>')" id="<?= $order['payment_status'] ?>"> <i class="fa fa-th m-r-10"></i> </a>
                                            </span>
                                            <span data-toggle="modal" data-target="#confirm_delete_<?php echo $order['id'];?>">
                                                <a id="delete" href="#" data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-trash text-danger m-r-10"></i> </a>
                                            </span>

                                        <?php else: ?>

                                            <!-- check logged user role permissions -->

                                            <?php if(check_power(2)):?>
                                                <span data-toggle="modal" data-target="#payment-modal">
                                                    <a href="#" data-toggle="tooltip" data-original-title="Add Payment" onclick="paymentFun(<?= $order['id'] ?>,'<?= $order['payment_status'] ?>')" id="<?= $order['payment_status'] ?>"> <i class="fa fa-th m-r-10"></i> </a>
                                                </span>
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
        <h4 class="modal-title">Confirm Delete</h4>
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

<!-- payment modal -->
<div id="payment-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header modal-primary bg-info">
                <h3 class="modal-title text-white">Payment</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>    
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-sm-9">
                            <div class="row">
                                <div class="col-12 col-xs-12">
                                    <table class="table table-bordered table-condensed font-14" style="margin-bottom: 0;">
                                        <tbody>
                                            <tr>
                                                <td style="border-right-color: #FFF !important;">Total items</td>
                                                <td class="text-right"><span id="item_count">0.00</span></td>
                                                <td style="border-right-color: #FFF !important;">Total payable</td>
                                                <td class="text-right"><span id="totalPayable">0.00</span></td>
                                            </tr>
                                            <tr>
                                                <td style="border-right-color: #FFF !important;">Total paying</td>
                                                <td class="text-right"><span id="total_paying">0.00</span></td>
                                                <td style="border-right-color: #FFF !important;">Balance</td>
                                                <td class="text-right"><span id="balance">0.00</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-xs-12 col-12">
                                    <div class="form-group">
                                        <label for="note">Note</label>
                                        <textarea class="form-control" rows="3" id="note"></textarea>
                                    </div>
                                </div>   
                            </div>
                            <div class="row mt-2">
                                <div class="col-xs-6 col-6">
                                    <div class="form-group">
                                        <label for="amount">Amount</label>
                                        <input type="text" class="form-control" id="amount" name="amount">
                                    </div>
                                </div>
                                <div class="col-xs-6 col-6">
                                    <div class="form-group">
                                        <label for="payBy">Paying By</label>
                                        <select class="form-control" id="payBy">
                                            <option value="Cash">Cash</option>
                                            <option value="KBZ pay">KBZ pay</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>   
                            </div>
                            <div class="row mt-2">
                                <div class="col-xs-12 col-12">
                                    <div class="form-group">
                                        <label for="paynote">Payment Note</label>
                                        <input type="text" class="form-control" id="paynote" name="paynote">
                                    </div>
                                </div>   
                            </div>
                        </div>
                        <div class="col-12 col-sm-3">
                            <div class="btn btn-group btn-group-vertical w-100">
                                <button type="button" class="btn btn-info btn-block" id="quick-payable">0.00</button>
                                <button type="button" class="btn btn-block btn-warning money" value="50">50 <span class="badge badge-light count"></span></button>
                                <button type="button" class="btn btn-block btn-warning money" value="100">100 <span class="badge badge-light count"></span></button>
                                <button type="button" class="btn btn-block btn-warning money" value="200">200 <span class="badge badge-light count"></span></button>
                                <button type="button" class="btn btn-block btn-warning money" value="500">500 <span class="badge badge-light count"></span></button>
                                <button type="button" class="btn btn-block btn-warning money" value="1000">1000 <span class="badge badge-light count"></span></button>
                                <button type="button" class="btn btn-block btn-warning money" value="5000">5000 <span class="badge badge-light count"></span></button>
                                <button type="button" class="btn btn-block btn-warning money" value="10000">10000 <span class="badge badge-light count"></span></button>
                                <button type="button" class="btn btn-block btn-danger" id="clear-cash-notes">Clear</button>    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-info waves-effect waves-light" data-dismiss="modal" id="submitPayment" onclick="submitPayment(<?= $order['id'];?>,'<?= $order['payment_status'];?>')">Submit</button>
            </div>
        </div>
    </div>
</div>

<?php endforeach ?>
<?php endif; ?>

<script type="text/javascript">
    let totalPaying = 0;
    function paymentFun(orderId,status) {
        if(status == "partial"){
            <?php foreach ($payments as $payment): ?>
            <?php foreach ($sales as $sale): ?>
            if((orderId == <?= $sale['order_id'] ?>) && (<?= $sale['id'] ?> == <?= $payment['sale_id'] ?>)){
                console.log("equal sale id");
                document.getElementById("quick-payable").innerHTML = "<?= $sale['grand_total'] ?>";
                document.getElementById("item_count").innerHTML = "<?= $sale['total_quantity'] ?> ( <?= $sale['total_item'] ?> ) ";
                document.getElementById("totalPayable").innerHTML = "<?= $sale['grand_total'] ?>";
                document.getElementById("total_paying").innerHTML = "<?= $payment['pos_paid'] ?>";
                document.getElementById("balance").innerHTML = "<?= $payment['pos_balance'] ?>";
                document.getElementById("note").innerHTML = "<?= $sale['note']; ?>";
                document.getElementById("amount").value = "<?= $payment['pos_paid'] ?>";
                document.getElementById("payBy").value = "<?= $payment['paid_by']; ?>";
                document.getElementById("paynote").value = "<?= $payment['note']; ?>";

                totalPaying = parseInt(<?= $payment['pos_paid'] ?>);
                console.log("totalPaying is "+totalPaying);
            }
            <?php endforeach; ?>
            <?php endforeach; ?>
        }
        if(status == "unpaid"){
            <?php foreach($openbill as $bill) :?>
            if(orderId == <?= $bill['id']?>){
                document.getElementById("quick-payable").innerHTML = "<?= $bill['subtotal'] ?>";
                document.getElementById("item_count").innerHTML = "<?= $bill['total_qty']?> ( <?= $bill['total_item'] ?> ) ";
                document.getElementById("totalPayable").innerHTML = "<?= $bill['subtotal'] ?>";
            }
            <?php endforeach; ?>
        }
        console.log("ok for view");
    }

    const cashCount = document.getElementsByClassName("count");
    const cashBtn = document.getElementsByClassName("money");
    const cashArray = [
        {count : 0, value : 50},
        {count : 0, value : 100},
        {count : 0, value : 200},
        {count : 0, value : 500},
        {count : 0, value : 1000},
        {count : 0, value : 5000},
        {count : 0, value : 10000}
    ];

    let balance = 0;
    for(let i=0; i<cashBtn.length; i++){
        cashBtn[i].onclick = () =>{
            const cashValue = cashBtn[i].value;
            if(cashBtn[i].value == cashArray[i].value){
                cashArray[i].count += 1;
                cashCount[i].innerHTML = cashArray[i].count;
                totalPaying += parseInt(cashValue);
                addAmountOfTotalCash(totalPaying, totalPaying-parseInt(document.getElementById("totalPayable").innerHTML));
            }
        }
    }

    document.getElementById("clear-cash-notes").onclick = () => {
        totalPaying = 0;
        addAmountOfTotalCash(totalPaying, 0);
        for (let j = 0; j < cashArray.length; j++) {
            cashArray[j].count = 0;  
            cashCount[j].innerHTML = '';          
        }
    }

    document.getElementById("quick-payable").onclick = () => {
        addAmountOfTotalCash(document.getElementById("totalPayable").innerHTML, 0);
    }

    function addAmountOfTotalCash(totalPaying,balance){
        document.getElementById("total_paying").innerHTML = totalPaying;
        document.getElementById("balance").innerHTML = balance;
        document.getElementById("amount").value = totalPaying;
    }

    function submitPayment(orderId,status){
        event.preventDefault();
        console.log(orderId + " and " +status);
        var xhttpRequest = new XMLHttpRequest();
        const totalPaying = document.getElementById("total_paying").innerHTML;
        const balance = document.getElementById("balance").innerHTML;
        const payingBy = document.getElementById("payBy").value;
        const paymentNote = document.getElementById("paynote").value;
        const saleNote = document.getElementById("note").value;
        const orderItemsArray = <?php echo json_encode($orderItems); ?>;
        const filterOrderItem = orderItemsArray.filter(orderItem => orderItem.order_id == orderId);
        const ordersArray = <?php echo json_encode($openbill); ?>;
        const filterOrder = ordersArray.filter(order => order.id == orderId)[0];
        <?php foreach($openbill as $bill) :?> 
            if(orderId == <?= $bill['id'] ?>){
                var customerId = <?= $bill['customer_id'] ?>;            
            }
        <?php endforeach; ?>
        const customersArray = <?php echo json_encode($customers) ?>;
        const customer = customersArray.filter(cust => cust.id == customerId)[0];
        const paymentUnpaidBillObj = {
            totalPaying,
            balance,
            payingBy,
            saleNote,
            paymentNote,
            filterOrderItem,
            filterOrder,
            customer
        };
        if(status == "unpaid"){
            xhttpRequest.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    console.log(this.responseText);
                    window.location.href = "<?php echo base_url() ?>admin/invoice/printInvoice/"+this.responseText;
                }
            }
            xhttpRequest.open("POST","<?php echo base_url() ?>admin/sale/submitUnpaidBill",true);
            xhttpRequest.setRequestHeader('Content-type','application/x-www-form-urlencoded');
            xhttpRequest.send(`openedBillData=${JSON.stringify(paymentUnpaidBillObj)}`);
        }

        <?php foreach ($sales as $sale): ?>
            if(orderId == <?= $sale['order_id'] ?>){
                var saleId = <?= $sale['id'] ?>;
            }
        <?php endforeach; ?>
        console.log(saleId);
        const saleItemsArray = <?php echo json_encode($saleItems); ?>;
        const filterSaleItem = saleItemsArray.filter(saleItem => saleItem.sale_id == saleId);
        console.log(filterSaleItem);
        const paymentPartialBillObj ={
            totalPaying,
            balance,
            payingBy,
            saleNote,
            paymentNote,
            filterOrder,
            saleId,
            filterSaleItem
        };
        if(status == "partial"){
            xhttpRequest.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    console.log(this.responseText);
                    window.location.href = "<?php echo base_url() ?>admin/invoice/printInvoice/"+this.responseText;
                }
            }
            xhttpRequest.open("POST","<?php echo base_url() ?>admin/sale/submitPartialBill",true);
            xhttpRequest.setRequestHeader('Content-type','application/x-www-form-urlencoded');
            xhttpRequest.send(`openedPartialBillData=${JSON.stringify(paymentPartialBillObj)}`);
        }
    }

</script>