<?php (defined('BASEPATH')) OR exit('No direct script access allowed'); ?>

<script type="text/javascript">
    $(document).ready(function() {

        function ptype(x) {
            if (x == 'standard') {
                return '<?= lang('standard'); ?>';
            } else if (x == 'combo') {
                return '<?= lang('combo'); ?>';
            } else if (x == 'service') {
                return '<?= lang('service'); ?>';
            } else {
                return x;
            }
        }

        function image(n) {
            if (n !== null) {
                return '<div style="width:32px; margin: 0 auto;"><a href="<?=base_url();?>uploads/'+n+'" class="open-image"><img src="<?=base_url();?>uploads/thumbs/'+n+'" alt="" class="img-responsive"></a></div>';
            }
            return '';
        }

        function method(n) {
            return (n == 0) ? '<span class="label label-primary"><?= lang('inclusive'); ?></span>' : '<span class="label label-warning"><?= lang('exclusive'); ?></span>';
        }

        var table = $('#prTables').DataTable({

            'ajax' : { url: '<?=site_url('orders/get_orders');?>', type: 'POST', "data": function ( d ) {
                d.<?=$this->security->get_csrf_token_name();?> = "<?=$this->security->get_csrf_hash()?>";
            }},
            
            "buttons": [
            { extend: 'copyHtml5', 'footer': false, exportOptions: { columns: [ 0, 1, 2, 3, 4, 5, 6, 7 ] } },
            { extend: 'excelHtml5', 'footer': false, exportOptions: { columns: [ 0, 1, 2, 3, 4, 5, 6, 7  ] } },
            { extend: 'csvHtml5', 'footer': false, exportOptions: { columns: [ 0, 1, 2, 3, 4, 5, 6, 7  ] } },
            { extend: 'pdfHtml5', orientation: 'landscape', pageSize: 'A4', 'footer': false,
            exportOptions: { columns: [ 0, 1, 2, 3, 4, 5, 6, 7  ] } },
            { extend: 'colvis', text: 'Columns'},
            ],
            "columns": [
            { "data": "id","visible":false},
            { "data": "date", "render": hrld },
            {"data" :  "customer_name","searchable":true},
            { "data": "product_code" },
            { "data": "product_name" },
            { "data": "status","render": status },
            { "data": "responsible_person" },
            { "data": "reason" },
            //{ "data": "Actions", "searchable": false, "orderable": false }   
            ]   
        });


        $('#search_table').on( 'keyup change', function (e) {
            var code = (e.keyCode ? e.keyCode : e.which);
            if (((code == 13 && table.search() !== this.value) || (table.search() !== '' && this.value === ''))) {
                table.search( this.value ).draw();
            }
        });

        table.columns().every(function () {
            var self = this;
            $( 'input', this.footer() ).on( 'keyup change', function (e) {
                var code = (e.keyCode ? e.keyCode : e.which);
                if (((code == 13 && self.search() !== this.value) || (self.search() !== '' && this.value === ''))) {
                    self.search( this.value ).draw();
                }
            });
            $( 'select', this.footer() ).on( 'change', function (e) {
                self.search( this.value ).draw();
            });
        });

        table.columns().every(function () {
            var self = this;
            $( 'input.datepicker', this.footer() ).on('dp.change', function (e) {
                self.search( this.value ).draw();
            });
            $( 'input:not(.datepicker)', this.footer() ).on('keyup change', function (e) {
                var code = (e.keyCode ? e.keyCode : e.which);
                if (((code == 13 && self.search() !== this.value) || (self.search() !== '' && this.value === ''))) {
                    self.search( this.value ).draw();
                }
            });
            $( 'select', this.footer() ).on( 'change', function (e) {
                self.search( this.value ).draw();
            });
        });

    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#prTables').on('click', '.image', function() {
            var a_href = $(this).attr('href');
            var code = $(this).attr('id');
            $('#myModalLabel').text(code);
            $('#product_image').attr('src',a_href);
            $('#picModal').modal();
            return false;
        });
        $('#prTables').on('click', '.barcode', function() {
            var a_href = $(this).attr('href');
            var code = $(this).attr('id');
            $('#myModalLabel').text(code);
            $('#product_image').attr('src',a_href);
            $('#picModal').modal();
            return false;
        });
        $('#prTables').on('click', '.open-image', function() {
            var a_href = $(this).attr('href');
            var code = $(this).closest('tr').find('.image').attr('id');
            $('#myModalLabel').text(code);
            $('#product_image').attr('src',a_href);
            $('#picModal').modal();
            return false;
        });
    });
</script>
<style type="text/css">
    .table td:first-child { padding: 1px; }
    .table td:nth-child(6), .table td:nth-child(7), .table td:nth-child(8) { text-align: center; }
    .table td:nth-child(9)<?= $Admin ? ', .table td:nth-child(10)' : ''; ?> { text-align: right; }
</style>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <?php if (!$this->session->userdata('has_store_id')) { ?>
                    <div class="dropdown pull-right">
                      <button class="btn btn-primary" id="dLabel" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?= $store->name.' ('.$store->code.')'; ?>
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dLabel">
                        <?php
                        foreach ($stores as $st) {
                            if ($store->id != $st->id) {
                                echo "<li><a href='".site_url('products/?store_id='.$st->id)."'>{$st->name} ({$st->code})</a></li>";
                            }
                        }
                        ?>
                    </ul>
                </div>
                <?php } ?>
                <h3 class="box-title"><?= lang('list_results'); ?></h3>
            </div>
            <div class="box-body">
                <div class="table-responsive">
                    <table id="prTables" class="table table-striped table-bordered table-hover" style="margin-bottom:5px;">
                        <thead>
            <tr>
                                <td colspan="12" class="p0"><input type="text" class="form-control b0" name="search_table" id="search_table" placeholder="<?= lang('type_hit_enter'); ?>" style="width:100%;"></td>
                            </tr>
                            <tr class="active">
                                <th style="max-width:30px;"><?= lang("id"); ?></th>
                                <th><?= lang("date"); ?></th>
                                <th><?= lang("customer"); ?></th>
                                <th style="max-width:30px;"><?= lang("product_code"); ?></th>
                                <th><?= lang("product_name"); ?></th>
                                <th><?= lang("status"); ?></th>
                                
                                <th><?= lang("res_person"); ?></th>
                                <th><?= lang("reason"); ?></th>
                            </tr>
                        </thead>
            
                        <tbody>
                            <tr>
                                <td colspan="12" class="dataTables_empty"><?= lang('loading_data_from_server'); ?></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th style="max-width:30px;"><input type="text" class="text_filter" placeholder="[<?= lang('id'); ?>]"></th>
                                <th class="col-sm-2"><span class="datepickercon"><input type="text" class="text_filter datepicker" placeholder="[<?= lang('date'); ?>]"></span></th>
                                <th><input type="text" class="text_filter" placeholder="[<?= lang('customer'); ?>]"></th>
                                <th><input type="text" class="text_filter" placeholder="[<?= lang('product_code'); ?>]"></th>
                                <th><input type="text" class="text_filter" placeholder="[<?= lang('product_name'); ?>]"></th>
                                <th class="col-sm-2">
                                    <select class="select2 select_filter"><option value=""><?= lang("All"); ?></option>
                                    <option value="Complete"><?= lang("completed"); ?>
                                        </option>
                                        <option value="Ordered" style="text-align: left;"><?= lang("ordered"); ?></option>
                                        <option value="Cancel"><?= lang("canceled"); ?></option></select>
                                </th>
                                 
                                 <th><input type="text" class="text_filter" placeholder="[<?= lang('res_person'); ?>]"></th><th><input type="text" class="text_filter" placeholder="[<?= lang('reason'); ?>]"></th>
                                
                              <!--<th style="width:165px;"><?= lang("actions"); ?></th> -->
                            </tr>
                           
                       
                        </tfoot>
                    </table>
                </div>

                <div class="modal fade" id="picModal" tabindex="-1" role="dialog" aria-labelledby="picModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times"></i></button>
                                <h4 class="modal-title" id="myModalLabel">title</h4>
                            </div>
                            <div class="modal-body text-center">
                                <img id="product_image" src="" alt="" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
</section>
<div class="modal fade" id="stModal" tabindex="-1" role="dialog" aria-labelledby="stModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><i class="fa fa-times"></i></span></button>
                <h4 class="modal-title" id="stModalLabel"><?= lang('update_status'); ?> <span id="status-id"></span></h4>
            </div>
            <?= form_open('orders/status'); ?>
            <div class="modal-body">
                <input type="hidden" value="" id="sale_id" name="sale_id" />
                <div class="form-group">
                    <?= lang('status', 'status'); ?>
                    <?php $opts = array('Complete' => lang('completed'),'Ordered' => lang('ordered'), 'Cancel' => lang('cancel'));  ?>
                    <?= form_dropdown('status', $opts, set_value('status'), 'class="form-control select2 tip" id="status" required="required" style="width:100%;"'); ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><?= lang('close'); ?></button>
                <button type="submit" class="btn btn-primary"><?= lang('update'); ?></button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('click', '.sale_status', function() {
            var sale_id = $(this).closest('tr').attr('id');
            var curr_status = $(this).text();
            var status = curr_status.toLowerCase();
            $('#status-id').text('( <?= lang('sale_id'); ?> '+sale_id+' )');
            $('#sale_id').val(sale_id);
            $('#status').val(status);
            $('#status').select2('val', status);
            $('#stModal').modal()
        });
    });
</script>
<script src="<?= $assets ?>plugins/bootstrap-datetimepicker/js/moment.min.js" type="text/javascript"></script>
<script src="<?= $assets ?>plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.datepicker').datetimepicker({format: 'YYYY-MM-DD', showClear: true, showClose: true, useCurrent: false, widgetPositioning: {horizontal: 'auto', vertical: 'bottom'}, widgetParent: $('.dataTable tfoot')});
    });
</script>
