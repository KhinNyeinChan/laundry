?php (defined('BASEPATH')) OR exit('No direct script access allowed'); ?>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title"><?= lang('enter_info'); ?></h3>
                </div>
                <div class="box-body">
                    <div class="col-lg-12">

                        <?php echo form_open_multipart("products/add_expense_category", 'class="validation"'); ?>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?= lang('expense_category', 'expense_category'); ?>
                                    <?= form_input('expense_category', set_value('expense_category'), 'class="form-control tip" id="expense_category"  required="required"'); ?>
                                </div>
                                
                               <!--mod by amw 28/2/1019 -->
                                
                            </div>
                        </div>

                        <div class="form-group">
                            <?= form_submit('add_brand', lang('add_brand'), 'class="btn btn-primary"'); ?>
                        </div>

                        <?php echo form_close();?>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
</section>
