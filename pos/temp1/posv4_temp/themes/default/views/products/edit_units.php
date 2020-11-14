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
                        <?= form_open_multipart("products/edit_units/".$unit->id); ?>

<div class="form-group">
                                <?= lang("code", "code"); ?>
                                <?= form_input('code', (isset($_POST['code']) ? $_POST['code'] : $unit->code), 'class="form-control tip" id="code"'); ?>
                            </div>
                            <div class="form-group">
                                <?= lang("name", "name"); ?>
                                <?= form_input('name', (isset($_POST['name']) ? $_POST['name'] : $unit->name), 'class="form-control tip" id="name"'); ?>
                            </div>


                            <div class="form-group">
                                <?php echo form_submit('edit_units', lang('edit_units'), 'class="btn btn-primary"'); ?>
                            </div>  <!--mod by amw 28/2/1019 -->
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
