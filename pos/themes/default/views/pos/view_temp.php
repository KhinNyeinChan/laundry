<?php (defined('BASEPATH')) OR exit('No direct script access allowed'); ?>

<?php
if ($modal) {
    ?>
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php
            } else {
                ?><!doctype html>
                <html>
                <head>
                    <meta charset="utf-8">
                    <title><?= $page_title . " " . lang("invoice_no") . " " . $inv->id; ?></title>
         
                   <base href="<?= base_url() ?>"/>
                    <meta http-equiv="cache-control" content="max-age=0"/>
                    <meta http-equiv="cache-control" content="no-cache"/>
                    <meta http-equiv="expires" content="0"/>
                    <meta http-equiv="pragma" content="no-cache"/>
                    <link rel="shortcut icon" href="<?= $assets ?>images/icon.png"/>
                    <link href="<?= $assets ?>dist/css/styles.css" rel="stylesheet" type="text/css" />
                    <style type="text/css" media="all">
                        body { color: #000; }
                        #wrapper { max-width: 520px; margin: 0 auto; padding-top: 20px; }
                        .btn { margin-bottom: 5px; }
                        .table { border-radius: 3px; }
                        .table th { background: #f5f5f5; }
                        .table th, .table td { vertical-align: middle !important; }
                        h3 { margin: 5px 0; }

                        @media print {
                            .no-print { display: none; }
                            #wrapper { max-width: 480px; width: 100%; min-width: 250px; margin: 0 auto; }
                        }
                    </style>
                </head>
                             <!-- #Mod #mod1 show print dialogue created by Zay Yar at 27/2/2017 -->
                <body onload="window.print();">
                    <?php
                }
                ?>
                <div id="wrapper">
                <!--print sale margin and font size fixed by zay yar at 1/2/2017
                <div id="receiptData" style="width: auto; max-width: 580px; min-width: 250px; margin: 0 auto;">-->
                    <div id="receiptData" style="max-width: 480px; width: 100%; min-width: 230px; margin: 0 auto; font-size:12px;  ">
                        <div class="no-print">
                            <?php if ($message) { ?>
                            <div class="alert alert-success">
                                <button data-dismiss="alert" class="close" type="button">×</button>
                                <?= is_array($message) ? print_r($message, true) : $message; ?>
                            </div>
                            <?php } ?>
                        </div>
                        <div id="receipt-data">
                            <div>
                                <div style="text-align:center;">
                                    <?php
                                    if ($store) {
                                        echo '<img src="'.base_url('uploads/'.$store->logo).'" alt="'.$store->name.'">';
                                        echo '<p style="text-align:center;">';
                                       //Mod Hide Store Name by Nyi Nyi 
					if (config_item('store_name_display_receipt')){ 
						echo '<strong>'.$store->name.'</strong><br>';
					}
					//End Mod 
                                        echo $store->address1.'<br>'.$store->address2;
                                        echo $store->city.'<br>'.$store->phone;
                                        echo '</p>';
                                        echo '<p>'.nl2br($store->receipt_header).'</p><br>';
                                    }
         
                                   ?>
                                </div>
                                <p> 
                                    <?php $inc= $this->pos_model->getCustomerByID($inv->customer_id); ?>
<?php 
                                    $ono=$inv->order_id;
                                    if(config_item('show_start_time') && config_item('order_tracking')){
                                    $whole_order=$this->pos_model->getStartTime($ono); 
                                    $start_time=$whole_order->start_date;
                                    ?>
                                    
                                    <?= 'From:'.'  '.$this->tec->hrld($start_time).'<br>'.'To:'.'  '.$this->tec->hrld($inv->date); ?> <br>
                              <?php  }
                                else{ ?>
                                <?= lang("date").': '.$this->tec->hrld($inv->date); ?> <br>
                                <?php } ?>
                                    <?= lang('sale_no_ref').': '.$inv->id; ?><br>
                                    <?= lang("customer").': '. $inv->customer_name; ?> <br>
                                    <?php 
                                    if(config_item('show_order_receipt')){
                                    $ono=$inv->order_id;
                                    if( $ono >0){
                                    ?>                              
									<?= lang("order_no").': '. $ono; ?> 
                                    <br><?php } 
                                }?>
									<?php if (config_item('show_cust_details')) { ?>
									<!-- mod by nyi nyi on 6th March 2018 -->
									<?php  

                                    $customer_details = $this->pos_model->getCustomerByID($inv->customer_id); ?>
										
									<?php if ($customer_details->cf1 != "" ) { ?>
									<?= lang("ccf1").': '. $customer_details->cf1; ?> <br>
									<?php } ?>
									<?php if ($customer_details->phone != "" ) { ?>
									<?= lang("phone").': '. $customer_details->phone; ?> <br>
									<?php }} ?>
                                    <?php $b=$inv->capacity;
                                    if($b>0){ ?>
                                    <?= lang("capacity").': '. $inv->capacity; ?><br>
          
									<!-- end mod -->
									<?php } ?>
                                    <!-- <?php $order_no=$inv->order_id;
                                    $inc=$this->pos_model->getTime($order_no); ?>
                                     <?= lang("date").': '.$this->tec->hrld($inc->start_date); ?> <br> -->
                                    <?= lang("sales_person").': '. $created_by->first_name." ".$created_by->last_name; ?> <br>
                                </p>
                                <div style="clear:both;"></div>
                                <table class="table table-striped table-condensed">
                                    <thead>
                                        <tr>
                                        	<?php if ((!config_item('show_product_image_receipt')) && config_item('show_product_no_receipt')) { ?>
                                        	<th style="text-align:center; width: 10%; border-bottom: 2px solid #ddd;"><?=lang('no');?></th>
                                        <?php } ?>
                                        <?php if ((config_item('show_product_image_receipt')) && 
                                            (!config_item('show_product_no_receipt'))) { ?>
                                            <th style="text-align:center; width: 10%; border-bottom: 2px solid #ddd;"><?=lang('image');?></th>
                                        <?php } ?>
                                        <?php if (config_item('show_product_image_receipt') && 
                                            config_item('show_product_no_receipt')) { ?>
                                            <th style="text-align:center; width: 10%; border-bottom: 2px solid #ddd;"><?=lang('No');?></th>
                                            <th style="text-align:center; width: 10%; border-bottom: 2px solid #ddd;"><?=lang('image');?></th>
                                        <?php } ?>
                                        
                                        
                                            <th style="text-align:center; width: 50%; border-bottom: 2px solid #ddd;"><?=lang('description');?></th>
                                            <th style="text-align:center; width: 5%; border-bottom: 2px solid #ddd;"><?=lang('qty');?></th>
                                            <th style="text-align:center; width: 18%; border-bottom: 2px solid #ddd;"><?=lang('price');?></th>
                                            <th style="text-align:center; width: 26%; border-bottom: 2px solid #ddd;"><?=lang('subtotal');?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $tax_summary = array();
					
					// mod nyi nyi for receipt number 
                                        
					$count = 0;
                    foreach ($rows as $row) {
					    
                       //echo '<tr><td style="text-align:left;">' . $row->product_name .'</td>';
					   // echo '<tr><td style="text-align:left;">' .  $count . '. ' . $row->product_name .'</td>';
                    if (config_item('show_product_image_receipt') && config_item('show_product_no_receipt')) { 
                       $count++;  
					   echo '<tr><td style="text-align:center;">' . $count  . '.' .' </td>';
					   
					  					   //end mod 
					   
					   //echo '<td style="text-align:left;">' . $row->product_name .'</td>';
					   //mod to include product code by nyi nyi on 24th Apr 2018
					   
						   
					   //mod 26th Sept 2018
					   //echo '<td style="text-align:center;">' . $row->image . '</td>';
					  // echo '<td><img src=\""'.base_url().'"uploads/thumbs/"' .$product->image. ' style=\"width: 110px; height: 110px;\"></td>';
						$product = $this->site->getProductByID($row->product_id);
					
						echo '<td><img src="'.base_url('uploads/'.$product->image).'" class="img-responsive img-thumbnail" alt="'. $row->product_code . '" ></td>';
					}


                if (config_item('show_product_image_receipt') && (!config_item('show_product_no_receipt'))) { 
                       $count++;  
                      
                        $product = $this->site->getProductByID($row->product_id);
                        echo '<td><img src="'.base_url('uploads/'.$product->image).'" class="img-responsive img-thumbnail" alt="'. $row->product_code . '" ></td>';
                    
        
                    }
                if ((!config_item('show_product_image_receipt')) && config_item('show_product_no_receipt')) { 
                       $count++;  
                       echo '<tr><td style="text-align:center;">' . $count  . '.' .' </td>';
                        $product = $this->site->getProductByID($row->product_id);
                     
                    
        
                    }


		    
		    $pid=$row->product_id;
               		   //end mod 

            $brand = $this->pos_model->getBrand($pid);


                if(config_item('show_unit')){
                 $unit=$this->pos_model->getunit($pid);
                }


                 if($row->quantity > 0)
                 {
                   if(config_item('show_unit'))
                   {
					echo '<td style="text-align:left;">' .' ('.$brand->name .')'. $row->product_name .' ('. $row->product_code .')</td>';
					   
                    echo '<td style="text-align:center;">' . $this->tec->formatQuantity($row->quantity) .'('.
                                           $unit->name .')'.'</td>';

                    echo '<td style="text-align:right;">';

                    echo $this->tec->formatMoney($row->net_unit_price + ($row->item_tax / $row->quantity)) . '</td><td style="text-align:right;">' . $this->tec->formatMoney($row->subtotal) . '</td></tr>';
                   }
                   else
                   {
                    echo '<td style="text-align:left;">' .' ('.$brand->name .')'. $row->product_name .' ('. $row->product_code .')</td>';
                       
                    echo '<td style="text-align:center;">' . $this->tec->formatQuantity($row->quantity) .'</td>';

                    echo '<td style="text-align:right;">';

                    echo $this->tec->formatMoney($row->net_unit_price + ($row->item_tax / $row->quantity)) . '</td><td style="text-align:right;">' . $this->tec->formatMoney($row->subtotal) . '</td></tr>';
                   }
                }
                // mod by mtk for showing foc at 21 March 2019
                    if($row->foc > 0)
                    {

                       if (config_item('show_product_image_receipt') && config_item('show_product_no_receipt')) { 
                       echo '<tr><td></td>';
                       
                    //end mod 
                    //mod to include product code by nyi nyi on 24th Apr 2018   
                    //mod 26th Sept 2018
                    
                        echo '<td></td>';
                            }


                    if (config_item('show_product_image_receipt') && (!config_item('show_product_no_receipt'))) { 
                         
                        echo '<td></td>';
                    }
                    if ((!config_item('show_product_image_receipt')) && config_item('show_product_no_receipt')) { 
                         
                       echo '<tr><td></td>';    
                    }
                       echo '<td style="text-align:left;"> ***' .' ('.$brand->name .')'. $row->product_name .' ('. $row->product_code .')(FOC)</td>'; // mod by mtk for showing foc at 21 March 2019
                       
                                            echo '<td style="text-align:center;">' . $this->tec->formatQuantity($row->foc) . '</td>'; // mod by mtk for showing foc at 21 March 2019
                                            echo '<td style="text-align:right;">';
                                            echo $this->tec->formatMoney(0) . '</td><td style="text-align:right;">' . $this->tec->formatMoney(0) . '</td></tr>'; 
                                }
                            }
                                        ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="3" style="text-align:left;"><?= lang("total"); ?></th>
                                            <th colspan="3" style="text-align:right;"><?= $this->tec->formatMoney($inv->total + $inv->product_tax); ?></th>
                                        </tr>
                                        <?php
                                        if ($inv->order_tax != 0) {
							//Mod Nyi Nyi 7th March 2017 
							
										
										//$tax_value = ($inv->order_tax /$inv->total)*100;
										//Mod Nyi Nyi 27th May 2017 & 5th Aug 2017 
										//$tax_value = ($inv->order_tax / ($inv->total - $inv->total_discount))*100;
										$tax_value = round(($inv->order_tax / ($inv->total - $inv->total_discount))*100);
										//end Mod 
                                        // mod by mtk at 26 Feb 2019 for service charges 

										
                                            echo '<tr><th colspan="2" style="text-align:left;">' . lang("order_tax") .'('. $tax_value. '%)</th><th colspan="2" style="text-align:right;">' . $this->tec->formatMoney($inv->order_tax) . '</th></tr>';
						//end Mod 
                                        }
 
                                        // mod by mtk at 26 Feb 2019 for service charges 
                                        if($inv->service_charges!=0){
                                        $sc_value = round(($inv->service_charges / ($inv->total - $inv->total_discount))*100);

                                        
                                        
                                        if($inv->service_charges > 0 && (config_item('is_restaurant'))){

                                            echo '<tr><th colspan="3" style="text-align:left;">' . lang("service_charges") .'('. $sc_value. '%)</th><th colspan="3" style="text-align:right;">' . $this->tec->formatMoney($inv->service_charges) . '</th></tr>';
}
                                        }
                                        //end mod by mtk
					
					//mod by nyi nyi on 28th Feb 2018 on discount 
                                        //if ($inv->total_discount != 0) {
						
                                          //  echo '<tr><th colspan="2" style="text-align:left;">' . lang("order_discount") . '</th><th colspan="2" style="text-align:right;">' . $this->tec->formatMoney($inv->total_discount) . '</th></tr>';
					 if ($inv->total_discount > 0)  {
					
						$perc = intval(( $inv->total_discount/$inv->total ) * 100);
						//echo" p is $perc";
						if (100 % $perc == 0 )
						{
                            echo"n is $perc";
							echo '<tr><th colspan="3" style="text-align:left;">' . lang("order_discount") .'('. $perc. '%)</th><th colspan="3" style="text-align:right;">' . $this->tec->formatMoney($inv->total_discount) . '</th></tr>';
						 }
						 else
						 {
							echo '<tr><th colspan="3" style="text-align:left;">' . lang("order_discount") . '</th><th colspan="3" style="text-align:right;">' . $this->tec->formatMoney($inv->total_discount) . '</th></tr>';
						 }
					/*
						if ( strpos( $inv->order_discount, '.' ) === false )
						{
							
							
							 echo '<tr><th colspan="2" style="text-align:left;">' . lang("order_discount") .'('. $inv->order_discount. '%)</th><th colspan="2" style="text-align:right;">' . $this->tec->formatMoney($inv->total_discount) . '</th></tr>';
						} else {
							echo '<tr><th colspan="2" style="text-align:left;">' . lang("order_discount") . '</th><th colspan="2" style="text-align:right;">' . $this->tec->formatMoney($inv->total_discount) . '</th></tr>';
						}
						*/
						
                                        } 
                                        $div="";
                          //echo"rounding is $Settings->rounding";
                                        if ($Settings->rounding) {
                                            //mod by AMW 2/11/2019
                                   
               
                                            //$round_total = $this->tec->roundNumber($inv->grand_total, $Settings->rounding);
                                            /*$a = $inv->grand_total;
                                            $b =  50;
                                            $round_total = (($a/$b)+1)*$b;
                                            $rounding = $this->tec->formatDecimal($round_total - $inv->grand_total);
                                            //$rounding = 100;
                                            ?>
                                            <tr>
                                                <th colspan="3" style="text-align:left;"><?= lang("rounding"); ?></th>
                                                <th colspan="3" style="text-align:right;"><?= $this->tec->formatMoney($rounding); ?></th>
                                            </tr>
                                            <tr>
                                                <th colspan="3" style="text-align:left;"><?= lang("grand_total"); ?></th>
                                                <th colspan="3" style="text-align:right;"><?= $this->tec->formatMoney($inv->grand_total + $rounding); ?></th>
                                            </tr>
                                            $round_total = $this->tec->roundNumber($inv->grand_total, $Settings->rounding);*/
                                            //mod by AMW 2/11/2019
                                            $n=$inv->grand_total;
                                            $p=$inv->rounding;
                                           // echo $p;
                            $round_total = $this->tec->roundNumber($n, $this->Settings->rounding);
                            $rounding = $this->tec->formatDecimal($round_total - $inv->grand_total);
                                            // echo $n;
                                          if($p!=0) {

                                            ?>

                                            <tr>
                                                <th colspan="3" style="text-align:left;"><?= lang("rounding"); ?></th>
                                                <th colspan="3" style="text-align:right;"><?= $this->tec->formatMoney($p); ?></th>
                                            </tr>
                                        <?php } ?>
                                            <tr>
                                                <th colspan="3" style="text-align:left;"><?= lang("grand_total"); ?></th>
                                                <th colspan="3" style="text-align:right;"><?= $this->tec->formatMoney($inv->grand_total + $rounding); ?></th>
                                            </tr>
                                            <?php
                                        } else {
                                            $round_total = $inv->grand_total;
                                            ?>
                                            <tr>
                                                <th colspan="3" style="text-align:left;"><?= lang("grand_total"); ?></th>
                                                <th colspan="3" style="text-align:right;"><?= $this->tec->formatMoney($inv->grand_total); ?></th>
                                            </tr>
                                            <?php
                                        }
                                        if ($inv->paid < $round_total) { ?>
                                        <tr>
                                            <th colspan="2" style="text-align:left;"><?= lang("paid_amount"); ?></th>
                                            <th colspan="2" style="text-align:right;"><?= $this->tec->formatMoney($inv->paid); ?></th>
                                        </tr>
                                        <tr>
                                            <th colspan="2" style="text-align:left;"><?= lang("due_amount"); ?></th>
                                            <th colspan="2" style="text-align:right;"><?= $this->tec->formatMoney($inv->grand_total - $inv->paid); ?></th>
                                        </tr>
                                        <?php } ?>
                                    </tfoot>
                                </table>
                                <?php
                                if ($payments) {
                                    echo '<table class="table table-striped table-condensed" style="margin-top:10px;"><tbody>';
                                    foreach ($payments as $payment) {
                                        echo '<tr>';
                                        if ($payment->paid_by == 'cash' && $payment->pos_paid) {
                                            echo '<td style="padding-left:15px;">' . lang("paid_by") . ': ' . lang($payment->paid_by) . '</td>';
                                            echo '<td style="padding-left:15px;">' . lang("amount") . ': ' . $this->tec->formatMoney($payment->pos_paid == 0 ? $payment->amount : $payment->pos_paid) . '</td>';
                                            echo '<td style="padding-left:15px;">' . lang("change") . ': ' . ($payment->pos_balance > 0 ? $this->tec->formatMoney($payment->pos_balance) : 0) . '</td>';
                                        }
                                        if (($payment->paid_by == 'CC' || $payment->paid_by == 'ppp' || $payment->paid_by == 'stripe') && $payment->cc_no) {
                                            echo '<td style="padding-left:15px;">' . lang("paid_by") . ': ' . lang($payment->paid_by) . '</td>';
                                            echo '<td style="padding-left:15px;">' . lang("amount") . ': ' . $this->tec->formatMoney($payment->pos_paid) . '</td>';
                                            echo '<td style="padding-left:15px;">' . lang("no") . ': ' . 'xxxx xxxx xxxx ' . substr($payment->cc_no, -4) . '</td>';
                                            echo '<td style="padding-left:15px;">' . lang("name") . ': ' . $payment->cc_holder . '</td>';
                                        }
                                        if ($payment->paid_by == 'Cheque' || $payment->paid_by == 'cheque' && $payment->cheque_no) {
                                            echo '<td style="padding-left:15px;">' . lang("paid_by") . ': ' . lang($payment->paid_by) . '</td>';
                                            echo '<td style="padding-left:15px;">' . lang("amount") . ': ' . $this->tec->formatMoney($payment->pos_paid) . '</td>';
                                            echo '<td style="padding-left:15px;">' . lang("cheque_no") . ': ' . $payment->cheque_no . '</td>';
                                        }
                                        if ($payment->paid_by == 'gift_card' && $payment->pos_paid) {
                                            echo '<td style="padding-left:15px;">' . lang("paid_by") . ': ' . lang($payment->paid_by) . '</td>';
                                            echo '<td style="padding-left:15px;">' . lang("no") . ': ' . $payment->gc_no . '</td>';
                                            echo '<td style="padding-left:15px;">' . lang("amount") . ': ' . $this->tec->formatMoney($payment->pos_paid) . '</td>';
                                            echo '<td style="padding-left:15px;">' . lang("balance") . ': ' . ($payment->pos_balance > 0 ? $this->tec->formatMoney($payment->pos_balance) : 0) . '</td>';
                                        }
                                        if ($payment->paid_by == 'other' && $payment->amount) {
                                            echo '<td style="padding-left:15px;">' . lang("paid_by") . ': ' . lang($payment->paid_by) . '</td>';
                                            echo '<td style="padding-left:15px;">' . lang("amount") . ': ' . $this->tec->formatMoney($payment->pos_paid == 0 ? $payment->amount : $payment->pos_paid) . '</td>';
                                            echo $payment->note ? '</tr><td colspan="2">' . lang("payment_note") . ': ' . $payment->note . '</td>' : '';
                                        }
                                        echo '</tr>';
                                    }
                                    echo '</tbody></table>';
                                }

                                ?>

                                <?= $inv->note ? '<p style="margin-top:10px; text-align: center;">' . $this->tec->decode_html($inv->note) . '</p>' : ''; ?>
                                <?php if (!empty($store->receipt_footer)) { ?>
                                <div class="well well-sm"  style="margin-top:10px;">
									<!-- Mod Nyi Nyi 7th March 2017 for restaurant & tax inclusive show receipt -->
                                    <!-- <div style="text-align: center;"><?= nl2br($store->receipt_footer); ?></div> -->
									<div style="text-align: center;"><?= nl2br($store->receipt_footer); ?>
										<?php
										/*
										$tax_value = ($inv->order_tax / $inv->total)*100;
										
										if ($tax_value == 0) {
											//display none 
										}
										else 
										if ($tax_value  == 15){
											echo '<BR>Tax incl. of 5% commercial tax('.  $inv->total *0.05 .') &amp;  10% service charges ('.  $inv->total *0.1 .')';
										} */
										/*
										if (($tax_value > 0) && ($tax_value != 15)) {
											if ( is_numeric( $tax_value ) && strpos( $tax_value, '.' ) === false )
											{
												echo '<BR>Tax incl. of '.  $tax_value .  '% commercial tax';
											} else {
												echo '<BR>Tax incl. of '.  number_format((float)$tax_value, 1, '.', '') .  '% commercial tax';
											}
										} */
										?>
									</div>
									<!-- end Mod -->
									
                                </div>
				 <?php } ?>
                            </div>
                            <div style="clear:both;"></div>
                        </div>

                        <!-- start -->
                        <div id="buttons" style="padding-top:10px; text-transform:uppercase;" class="no-print">
                            <hr>
                            <?php if ($modal) { ?>
                            <div class="btn-group btn-group-justified" role="group" aria-label="...">
                           
                                <div class="btn-group" role="group">
                                    <?php
                                    if (!$Settings->remote_printing) {
                                        echo '<a href="'.site_url('pos/print_receipt/'.$inv->id.'/0').'" id="print" class="btn btn-block btn-primary">'.lang("print").'</a>';
                                    } elseif ($Settings->remote_printing == 1) {
                                        echo '<button onclick="window.print();" class="btn btn-block btn-primary">'.lang("print").'</button>';
                                    } else {
                                        echo '<button onclick="return printReceipt()" class="btn btn-block btn-primary">'.lang("print").'</button>';
                                    }
                                    ?>
                                  
                                </div>
								<!-- mod nyi nyi 26th July -->
                               <!-- <div class="btn-group" role="group">
                                    <a class="btn btn-block btn-success" href="#" id="email"><?= lang("email"); ?></a>
                                </div> -->
								<!--end mod -->
                                <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-default" data-dismiss="modal"><?= lang('close'); ?></button>
                                </div>
                            </div>
                            <?php } else { ?>
                            <span class="pull-right col-xs-12">
                                <?php
                                if ( ! $Settings->remote_printing) {
                                   echo '<a href="'.site_url('pos/print_receipt/'.$inv->id.'/1').'" id="print" class="btn btn-block btn-primary">'.lang("print").'</a>';
                                    //echo '<a href="'.site_url('pos/open_drawer/').'" class="btn btn-block btn-default">'.lang("open_cash_drawer").'</a>';  
                                } elseif ($Settings->remote_printing == 1) {
                                    echo '<button onclick="window.print();" class="btn btn-block btn-primary">'.lang("print").'</button>';
                                } else {
                                    echo '<button onclick="return printReceipt()" class="btn btn-block btn-primary">'.lang("print").'</button>';
                                    //echo '<button onclick="return openCashDrawer()" class="btn btn-block btn-default">'.lang("open_cash_drawer").'</button>';
                                    
                                }
                                ?>
                            </span>
                            <!-- email button in pos sale hided by zay yar at 1/2/2017
                            <span class="pull-left col-xs-12"><a class="btn btn-block btn-success" href="#" id="email"><?= lang("email"); ?></a></span> -->
                            <span class="col-xs-12">
                                <a class="btn btn-block btn-warning"  id="reset"  href="<?= site_url('pos'); ?>"><?= lang("back_to_pos"); ?></a>
                            </span>
                            <?php } ?>
                            <div style="clear:both;"></div>
                        </div>
                        <!-- end -->
                    </div>
                </div>
                <!-- start -->
                <?php
                if (!$modal) {
                    ?>
                    <script type="text/javascript">
                        var base_url = '<?=base_url();?>';
                        var site_url = '<?=site_url();?>';
                        var dateformat = '<?=$Settings->dateformat;?>', timeformat = '<?= $Settings->timeformat ?>';
                        <?php unset($Settings->protocol, $Settings->smtp_host, $Settings->smtp_user, $Settings->smtp_pass, $Settings->smtp_port, $Settings->smtp_crypto, $Settings->mailpath, $Settings->timezone, $Settings->setting_id, $Settings->default_email, $Settings->version, $Settings->stripe, $Settings->stripe_secret_key, $Settings->stripe_publishable_key); ?>
                        var Settings = <?= json_encode($Settings); ?>;
                    </script>
                    <script src="<?= $assets ?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
                    <script src="<?= $assets ?>dist/js/libraries.min.js" type="text/javascript"></script>
                    <script src="<?= $assets ?>dist/js/scripts.min.js" type="text/javascript"></script>
                    <?php
                }
                ?>
                <script type="text/javascript">
                    $(document).ready(function () {
                        $('#print').click(function (e) {
                            e.preventDefault();
                            var link = $(this).attr('href');
                            $.get(link);
                            return false;
                        });
                        $('#email').click(function () {
                            bootbox.prompt({
                                title: "<?= lang("email_address"); ?>",
                                inputType: 'email',
                                value: "<?= $customer->email; ?>",
                                callback: function (email) {
                                    if (email != null) {
                                        $.ajax({
                                            type: "post",
                                            url: "<?= site_url('pos/email_receipt') ?>",
                                            data: {<?= $this->security->get_csrf_token_name(); ?>: "<?= $this->security->get_csrf_hash(); ?>", email: email, id: <?= $inv->id; ?>},
                                            dataType: "json",
                                            success: function (data) {
                                                bootbox.alert({message: data.msg, size: 'small'});
                                            },
                                            error: function () {
                                                bootbox.alert({message: '<?= lang('ajax_request_failed'); ?>', size: 'small'});
                                                return false;
                                            }
                                        });
                                    }
                                }
                            });
                            return false;
                        });
                    });
                </script>

                <script type="text/javascript">
                    function calculate_round(a, b){
                        if((a%b)==0){
                          answer=a/b;
                          } else 
                          {
                           answer=a/b;
                           answer=intval(a/b);
                           answer+=1;
                           }

                           totalfinal=answer*b;
                           return totalfinal;
                          }  

                       

                </script>



                <?php /* include FCPATH.'themes'.DIRECTORY_SEPARATOR.$Settings->theme.DIRECTORY_SEPARATOR.'views'.DIRECTORY_SEPARATOR.'pos'.DIRECTORY_SEPARATOR.'remote_printing.php'; */ ?>
                <?php include 'remote_printing.php'; ?>
                <?php
                if ($modal) {
                    ?>
                </div>
            </div>
        </div>
        <?php
    } else {
        ?>
    <!-- end -->
    </body>
    </html>
    <?php
}
?>
