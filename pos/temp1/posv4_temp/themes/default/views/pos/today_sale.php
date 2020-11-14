<?php (defined('BASEPATH')) OR exit('No direct script access allowed'); ?>
<div class="modal-dialog">
    <div class="modal-content">
		<!-- mod by nyi nyi to display store logo / name on close register on 28th March 2018 -->
			<?php 
			echo '<div align="center"><br><img src="'.base_url('uploads/'.$store->logo).'" alt="'.$store->name.'"></div>';
                                        echo '<p style="text-align:center;">';
                                       //Mod Hide Store Name by Nyi Nyi 
					if (config_item('store_name_display_receipt')){ 
						echo '<strong>'.$store->name.'</strong><br>';
					}
					//End Mod
			?>		
			<!-- end mod -->
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
            <h4 class="modal-title" id="myModalLabel"><?= lang('today_sale').' ('.date($Settings->dateformat).')'; ?></h4>
        </div>
        <div class="modal-body">
            <table width="100%" class="stable">
                <tr>
                    <td style="border-bottom: 1px solid #008d4c;"><h4><?= lang('cash_sale'); ?>:</h4></td>
                    <td style="text-align:right; border-bottom: 1px solid #008d4c;"><h4>
							<!-- mod by nyi nyi to remove total cash sale on 8th Jan 2018 -->
                            <!-- <span><?= $this->tec->formatMoney($cashsales->paid ? $cashsales->paid : '0.00') . ' (' . $this->tec->formatMoney($cashsales->total ? $cashsales->total : '0.00') . ')'; ?></span> -->
							 <span><?= $this->tec->formatMoney($cashsales->paid ? $cashsales->paid : '0.00') ; ?></span>
							 <!-- end mod -->
                        </h4></td>
                </tr>
                <!-- <tr>
                   <td style="border-bottom: 1px solid #008d4c;"><h4><?= lang('ch_sale'); ?>:</h4></td>
                    <td style="text-align:right;border-bottom: 1px solid #008d4c;"><h4>
							
                            <span><?= $this->tec->formatMoney($chsales->paid ? $chsales->paid : '0.00') . ' (' . $this->tec->formatMoney($chsales->total ? $chsales->total : '0.00') . ')'; ?></span>
                        </h4></td>
                </tr> -->
                <tr>
                    <td style="border-bottom: 1px solid #008d4c;"><h4><?= lang('cc_sale'); ?>:</h4></td>
                    <td style="text-align:right;border-bottom: 1px solid #008d4c;"><h4>
							<!-- mod by nyi nyi to remove total credit card sale on 8th Jan 2018 -->
							<!--
                            <span><?= $this->tec->formatMoney($ccsales->paid ? $ccsales->paid : '0.00') . ' (' . $this->tec->formatMoney($ccsales->total ? $ccsales->total : '0.00') . ')'; ?></span> -->
							<span><?= $this->tec->formatMoney($ccsales->paid ? $ccsales->paid : '0.00') ;?></span>
							<!-- end mod -->
                        </h4></td>
                </tr> 
                <tr>
                    <td style="border-bottom: 1px solid #008d4c;"><h4><?= lang('gc_sale'); ?>:</h4></td>
                    <td style="text-align:right;border-bottom: 1px solid #008d4c;"><h4>
							<!-- mod by nyi nyi to remove total gift card sale on 8th Jan 2018 -->
							<!--
                            <span><?= $this->tec->formatMoney($gcsales->paid ? $gcsales->paid : '0.00') . ' (' . $this->tec->formatMoney($gcsales->total ? $gcsales->total : '0.00') . ')'; ?></span> -->
							<span><?= $this->tec->formatMoney($gcsales->paid ? $gcsales->paid : '0.00'); ?></span>
							<!-- end mod -->
                        </h4></td>
                </tr>
				<!--
                <?php if (isset($Settings->stripe)) { ?>
                    <tr>
                        <td style="border-bottom: 1px solid #008d4c;"><h4><?= lang('stripe'); ?>:</h4></td>
                        <td style="text-align:right;border-bottom: 1px solid #008d4c;"><h4>
                                <span><?= $this->tec->formatMoney($stripesales->paid ? $stripesales->paid : '0.00') . ' (' . $this->tec->formatMoney($stripesales->total ? $stripesales->total : '0.00') . ')'; ?></span>
                            </h4></td>
                    </tr>
                <?php } ?>
				-->
                <tr>
                    <td style="border-bottom: 1px solid #008d4c;"><h4><?= lang('other_sale'); ?>:</h4></td>
                    <td style="text-align:right;border-bottom: 1px solid #008d4c;"><h4>
							<!-- mod by nyi nyi to remove total other sale on 8th Jan 2018 -->
							<!--
                            <span><?= $this->tec->formatMoney($other_sales->paid ? $other_sales->paid : '0.00') . ' (' . $this->tec->formatMoney($other_sales->total ? $other_sales->total : '0.00') . ')'; ?></span> -->
							 <span><?= $this->tec->formatMoney($other_sales->paid ? $other_sales->paid : '0.00') ; ?></span>
							 <!-- end mod -->
                        </h4></td>
                </tr>

                <tr>
                    <td width="300px;" style="font-weight:bold;"><h4><?= lang('total_sales'); ?>:</h4></td>
                    <td width="200px;" style="font-weight:bold;text-align:right;"><h4>
							<!-- mod by nyi nyi to remove total sale on 8th Jan 2018 -->
							<!--
                            <span><?= $this->tec->formatMoney($totalsales->paid ? $totalsales->paid : '0.00') . ' (' . $this->tec->formatMoney($totalsales->total ? $totalsales->total : '0.00') . ')'; ?></span> -->
							 <span><?= $this->tec->formatMoney($totalsales->paid ? $totalsales->paid : '0.00'); ?></span>
							 <!-- end mod -->
                        </h4></td>
                </tr>

            </table>
			<?php 
                   //#mod #mod1 no print add by zay yar at 28/2/2017
					 echo "<button onclick='window.print();' class='btn btn-block btn-primary no-print'>".lang("print")."</button>";
                    //echo "<button onclick='window.print();' class='btn btn-block btn-primary'>".lang("print")."</button>";
				?>
        </div>
    </div>

</div>
