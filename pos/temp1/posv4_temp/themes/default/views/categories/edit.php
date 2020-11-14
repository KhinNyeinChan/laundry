<?php (defined('BASEPATH')) OR exit('No direct script access allowed'); ?>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title"><?= lang('update_info'); ?></h3>
                </div>
                <div class="box-body">
                    <div class="col-lg-12">

                        <?php echo form_open_multipart("categories/edit/".$category->id);?>
                        <div class="row">
                            <div class="col-md-6">

                                <div class="form-group">
                                    <?= lang('code', 'code'); ?>
                                    <?= form_input('code', $category->code, 'class="form-control tip" id="code"  required="required"'); ?>
                                </div>

                                <div class="form-group">
                                    <?= lang('name', 'name'); ?>
                                    <?= form_input('name', $category->name, 'class="form-control tip" id="name"  required="required"'); ?>
                                </div>

                                <!--mod by amw and mtk at 20 Feb 2019 for multiple order printer-->
                                <?php if(config_item('is_restaurant') && config_item('multiple_order_printer')) { ?>
                                <div class="form-group">
                                    <?= lang('title', 'title'); ?>
                                    <?php
                                    $order_printers = json_decode($this->Settings->order_printers);
                                    
                                    $cat[''] = lang("select")." ".lang("title");
                                    foreach ($printers as $printer) {

                                       foreach($order_printers as $order_printer) {
                                        //$printer = $this->Site->getPrinterByID($order_printer);
                                        if($printer->id == $order_printer){
                                           $cat[$printer->id] = $printer->title; 
                                        }
                                        
                                    }
                                    }
                                    
                                    //$printer = $this->Site->getPrinterByID(1);
                                    //echo $printer->title;
                                    ?>
                                    <?= form_dropdown('printer_id', $cat, $category->printer_id, 'class="form-control select2 tip" id="printer_id"  required="required" style="width:100%;"'); ?>
                                </div>
                                <?php } ?>
                                <!-- end mod by amw and mtk -->
                                <div class="form-group">
                                    <?= lang('image', 'image'); ?>
                                    <input type="file" name="userfile" id="image">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <?= form_submit('edit_category', lang('edit_category'), 'class="btn btn-primary"'); ?>
                        </div>

                        <?php echo form_close();?>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</section>
