<?php (defined('BASEPATH')) OR exit('No direct script access allowed'); ?>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title"><?= lang('update_info'); ?></h3>
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <?= form_open_multipart("purchases/edit_expense_category/".$expense_category->id); ?>
                            
                            <div class="form-group">
                                <?= lang("expense_category", "expense_category"); ?>
                                <?= form_input('expense_category', (isset($_POST['name']) ? $_POST['name'] : $expense_category->name), 'class="form-control tip" id="expense_category"'); ?>
                            </div>

  <!--mod by amw 28/2/1019 -->
                            <div class="form-group">
                                <?php echo form_submit('edit_expense_category', lang('edit_expense_category'), 'class="btn btn-primary"'); ?>
                            </div>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
</section>

<script src="<?= $assets ?>plugins/bootstrap-datetimepicker/js/moment.min.js" type="text/javascript"></script>
<script src="<?= $assets ?>plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(function () {
        $('.datetimepicker').datetimepicker({
            format: 'YYYY-MM-DD HH:mm'
        });
    });
</script>
