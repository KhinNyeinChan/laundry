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

                        <?php echo form_open_multipart("products/unit_add", 'class="validation"'); ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?= lang('code', 'code'); ?>
                                    <?= form_input('code', set_value('code'), 'class="form-control tip" id="code"  required="required"'); ?>
                                </div>
                                 <div class="form-group">
                                    <?= lang('unit', 'unit'); ?>
                                    <?= form_input('unit', set_value('unit'), 'class="form-control tip" id="unit"  required="required"'); ?>
                                </div>
                               <!--mod by amw 28/2/1019 -->
                                
                            </div>
                        </div>

                        <div class="form-group">
                            <?= form_submit('add_unit', lang('add_unit'), 'class="btn btn-primary"'); ?>
                        </div>

                        <?php echo form_close();?>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</section>
