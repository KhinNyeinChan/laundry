<?php (defined('BASEPATH')) OR exit('No direct script access allowed'); ?>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title"><?= lang('enter_info'); ?></h3>
                </div>
                <div class="box-body">
                    <div class="col-lg-12">
                        <?php echo form_open_multipart("purchases/add", 'class="validation"'); ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?= lang('date', 'date'); ?>
                                    <?= form_input('date', set_value('date', date('Y-m-d H:i')), 'class="form-control tip" id="date"  required="required"'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?= lang('reference', 'reference'); ?>
                                    <?= form_input('reference', set_value('reference'), 'class="form-control tip" id="reference"'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="<?= lang('search_product_by_name_code'); ?>" id="add_item" class="form-control">
                        </div>
     
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table id="poTable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr class="active">
                                                <th><?= lang('product'); ?></th>
                                                <th class="col-xs-2"><?= lang('quantity'); ?></th>
                                                <th class="col-xs-2"><?= lang('unit_cost'); ?></th>
                                                <th class="col-xs-2"><?= lang('subtotal'); ?></th>
                                                <th style="width:25px;"><i class="fa fa-trash-o"></i></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="5"><?= lang('add_product_by_searching_above_field'); ?></td>
                                            </tr>
                                        </tbody>
                                        <tfoot>
                                            <tr class="active">
                                                <th><?= lang('total'); ?></th>
                                                <th class="col-xs-2"></th>
                                                <th class="col-xs-2"></th>
                                                <th class="col-xs-2 text-right"><span id="gtotal">0.00</span></th>
                                                <th style="width:25px;"></th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>


                        
                        <!--<div class="form-group">
                        <input type="button" class="btn btn-link" style="background-color: #00bfff" name="is_serial" id="is_serial" value="Is Serialized">
                        </div>-->

                  
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?= lang('supplier', 'supplier'); ?>
                                    <?php
                                    $sp[''] = lang("select")." ".lang("supplier");
                                    foreach($suppliers as $supplier) {
                                        $sp[$supplier->id] = $supplier->name;
                                    }
                                    ?>
                                    <?= form_dropdown('supplier', $sp, set_value('supplier'), 'class="form-control select2 tip" id="supplier"  required="required" style="width:100%;"'); ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?= lang('received', 'received'); ?>
                                    <?php //$sts = array(1 => lang('received'), 0 => lang('not_received_yet')); ?>
									<!-- mod nyi nyi -->
									<?php $sts = array(1 => lang('received')); ?>
                                    <?= form_dropdown('received', $sts, set_value('received'), 'class="form-control select2 tip" id="received"  required="required" style="width:100%;"'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <?= lang('attachment', 'attachment'); ?>
                            <input type="file" name="userfile" class="form-control tip" id="attachment">
                        </div>
                        <div class="form-group">
                            <?= lang("note", 'note'); ?>
                            <?= form_textarea('note', set_value('note'), 'class="form-control redactor" id="note"'); ?>
                        </div>
                        <div class="form-group">
                            <?= form_submit('add_purchase', lang('add_purchase'), 'class="btn btn-primary"'); ?>
                            <button type="button" id="reset" class="btn btn-danger"><?= lang('reset'); ?></button>
                        </div>

                        <?php echo form_close();?>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="<?= $assets ?>dist/js/pages/purchases.js" type="text/javascript"></script>
<script type="text/javascript">
    var spoitems = {};
    var lang = new Array();
    lang['code_error'] = '<?= lang('code_error'); ?>';
    lang['r_u_sure'] = '<?= lang('r_u_sure'); ?>';
    lang['no_match_found'] = '<?= lang('no_match_found'); ?>';
</script>


<div class="modal" data-easein="flipYIn" id="serialModal" tabindex="-1" role="dialog" aria-labelledby="serialModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                <h4 class="modal-title" id="serialModalLabel"><?= lang('serial'); ?></h4>
            </div>
            <div class="modal-body"  id="serialModalAdd">
              <div class="input-group">
                                                <?= form_input('serial', set_value('serial', $sale->date), 'id="serial" required="required" class="form-control"'); ?>
                                                <div class="input-group-addon no-print" style="padding: 2px 5px;">
                                                    <a href="#" id="add-serial"><i class="fa fa-2x fa-plus-circle" id="addIcon"></i></a>
                                                </div>
                                            </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal"> <?=lang('close')?> </button>
                <!--<button  type="button" id="add_serialinfo" class="btn btn-primary" onclick="addInput()"><?= lang('add_serial') ?></button>-->
                <button  type="button" id="addserial" class="btn btn-primary"><?= lang('submit') ?></button>
            </div>
        </div>
    </div>
</div>


<div class="modal" data-easein="flipYIn" id="serial_detailsModal" tabindex="-1" role="dialog" aria-labelledby="delModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                <h4 class="modal-title" id="delModalLabel"><?= lang('delete_items'); ?></h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <?= lang("color", "color"); ?>
                    <?php echo form_input('color', $color, 'class="form-control kb-text" id="color" required="required"'); 
                    ?>
                </div>

                <div class="form-group">
                    <?= lang("weight", "weight"); ?>
                    <?php echo form_input('weight', $weight, 'class="form-control kb-text" id="weight" required="required"'); 
                    ?>
                </div>

                <div class="form-group">
                    <?= lang("remark", "remark"); ?>
                    <?php echo form_input('remark', $remark, 'class="form-control kb-text" id="remark" required="required"'); 
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

<script type="text/javascript">
    
     $('#is_serial').on("click",function() {

                        $('#serialModal').modal({backdrop:'static'});

                       });

     $('#add-serial').on("click",function() {

                        $('#serial_detailsModal').modal({backdrop:'static'});

                       });

     $('#addserial').on("click",function() {

                        $('#serial_detailsModal').modal({backdrop:'static'});

                       });
     
     
        
        var countBox =1;
        var boxName = 0;
        function addInput()
        {

            var boxName="textBox"+countBox; 
            document.getElementById('serialModalAdd').innerHTML+='<br/><input type="text" id="'+boxName+'" value="'+boxName+'" "  /><br/>';
            countBox += 1;
        }

    
</script>
</script>