<!-- mod by mtk for sale details report at 8 Feb 2019-->
<?php (defined('BASEPATH')) OR exit('No direct script access allowed'); ?>

<?php
$v = "?v=1";

    /*if($this->input->post('product')){
        $v .= "&product=".$this->input->post('product');
    }
   if($this->input->post('category')){
        $v .= "&category=".$this->input->post('category');
    }*/
    if($this->input->post('start_date')){
        $v .= "&start_date=".$this->input->post('start_date');
    }
    if($this->input->post('end_date')) {
        $v .= "&end_date=".$this->input->post('end_date');
    }
//echo " v is $v"; 
?>

<script type="text/javascript">
    $(document).ready(function() {

        function status(x) {
            var paid = '<?= lang('paid'); ?>';
            var partial = '<?= lang('partial'); ?>';
            var due = '<?= lang('due'); ?>';
            if (x == 'paid') {
                return '<div class="text-center"><span class="sale_status label label-success">'+paid+'</span></div>';
            } else if (x == 'partial') {
                return '<div class="text-center"><span class="sale_status label label-primary">'+partial+'</span></div>';
            } else if (x == 'due') {
                return '<div class="text-center"><span class="sale_status label label-danger">'+due+'</span></div>';
            } else {
                return '<div class="text-center"><span class="sale_status label label-default">'+x+'</span></div>';
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

        var table = $('#PrRData').DataTable({

            'ajax' : { url: '<?=site_url('reports/get_sale_details/'. $v);?>', type: 'POST', "data": function ( d ) {
                d.<?=$this->security->get_csrf_token_name();?> = "<?=$this->security->get_csrf_hash()?>";
            }},
            "buttons": [
            <?php
            if(config_item('real_unit_price'))
            { ?>
            { extend: 'copyHtml5', 'footer': true, exportOptions: { columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10 ] } },
            { extend: 'excelHtml5', 'footer': true, exportOptions: { columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10 ] } },
            { extend: 'csvHtml5', 'footer': true, exportOptions: { columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10 ] } },
            { extend: 'pdfHtml5', orientation: 'landscape', pageSize: 'A4', 'footer': true,
            exportOptions: { columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10 ] } },
            { extend: 'colvis', text: 'Columns'},
            <?php
            } else {
            ?>
            { extend: 'copyHtml5', 'footer': true, exportOptions: { columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9 ] } },
            { extend: 'excelHtml5', 'footer': true, exportOptions: { columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9 ] } },
            { extend: 'csvHtml5', 'footer': true, exportOptions: { columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9 ] } },
            { extend: 'pdfHtml5', orientation: 'landscape', pageSize: 'A4', 'footer': true,
            exportOptions: { columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9 ] } },
            { extend: 'colvis', text: 'Columns'},
            <?php
            }
            ?>
            ],
            "columns": [
            { "data": "id", "visible": false },
            { "data": "sale_id" },
            { "data": "product_code" },
            { "data": "product_name"},
            { "data": "quantity", "searchable": false, "render": currencyFormat },
            <?php
            if(config_item('real_unit_price'))
            { ?>
              { "data": "real_unit_price", "searchable": false, "render": currencyFormat },
            <?php
            }
            ?>
            { "data": "unit_price", "searchable": false, "render": currencyFormat },
            { "data": "subtotal", "searchable": false, "render": currencyFormat },
            // mod by mtk for showing foc at 21 March 2019
            <?php
            if(config_item('show_foc'))
            { ?>
            { "data": "foc"},
            <?php
            }
            ?>
            // end mod by mtk
            { "data": "status", "render": status },
            { "data": "customer_name"},
            { "data": "date"}
            ],
            "footerCallback": function (  tfoot, data, start, end, display ) {
                var api = this.api(), data;
                //$(api.column(3).footer()).html( (api.column(3).data().reduce( function (a, b) { return pf(a) + pf(b); }, 0)) );
                $(api.column(4).footer()).html( cf(api.column(4).data().reduce( function (a, b) { return pf(a) + pf(b); }, 0)) );
                $(api.column(5).footer()).html( cf(api.column(5).data().reduce( function (a, b) { return pf(a) + pf(b); }, 0)) );
                $(api.column(6).footer()).html( cf(api.column(6).data().reduce( function (a, b) { return pf(a) + pf(b); }, 0)) );
                // mod by mtk for showing foc at 21 March 2019
                <?php
                if(config_item('real_unit_price') && config_item('show_foc'))
                { ?>
                $(api.column(7).footer()).html( cf(api.column(7).data().reduce( function (a, b) { return pf(a) + pf(b); }, 0)) );
                $(api.column(8).footer()).html( cf(api.column(8).data().reduce( function (a, b) { return pf(a) + pf(b); }, 0)) );
                <?php
                }
                ?>
                
                <?php 
                if(config_item('real_unit_price'))
                { ?>
                $(api.column(7).footer()).html( cf(api.column(7).data().reduce( function (a, b) { return pf(a) + pf(b); }, 0)) );
                <?php
                }
                ?>

                <?php 
                if(config_item('show_foc'))
                { ?>
                $(api.column(7).footer()).html( cf(api.column(7).data().reduce( function (a, b) { return pf(a) + pf(b); }, 0)) );
                <?php
                }
                ?>
                // end mod by mtk
                //$(api.column(8).footer()).html( cf(api.column(8).data().reduce( function (a, b) { return pf(a) + pf(b); }, 0)) );
                //$(api.column(9).footer()).html( cf(api.column(9).data().reduce( function (a, b) { return pf(a) + pf(b); }, 0)) );
            }

        });

        $('#search_table').on( 'keyup change', function (e) {
            var code = (e.keyCode ? e.keyCode : e.which);
            if (((code == 13 && table.search() !== this.value) || (table.search() !== '' && this.value === ''))) {
                table.search( this.value ).draw();
            }
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
            $( 'select', this.footer() ).on('change', function (e) {
                self.search( this.value ).draw();
            });
        });

    });
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $('#form').hide();
        $('.toggle_form').click(function(){
            $("#form").slideToggle();
            return false;
        });
    });
</script>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <a href="#" class="btn btn-default btn-sm toggle_form pull-right"><?= lang("show_hide"); ?></a>
                    <h3 class="box-title"><?= lang('customize_report'); ?></h3>
                </div>
                <div class="box-body">
                    <div id="form" class="panel panel-warning">
                        <div class="panel-body">
                            <?= form_open("reports/sale_details");?>

                            <div class="row">
                               <!-- <div class="col-xs-4">
                                    <div class="form-group">
                                        <label class="control-label" for="product"><?= lang("product"); ?></label>
                                        <?php
                                        $pr[0] = lang("select")." ".lang("product");
                                        foreach($products as $product){
                                            $pr[$product->id] = $product->name;
                                        }
                                        echo form_dropdown('product', $pr, set_value('product'), 'class="form-control select2" style="width:100%" id="product"');
                        $cat[0] = lang("select")." ".lang("category");
                    //echo form_dropdown('product', $pr, set_value('product'), 'class="form-control select2" style="width:100%" id="product2"');
                                        ?>
                                    </div>
                                </div>-->
             <!--Start Date and ENd Date DropDown bug fix by Zay yar at 20/4/2017 -->
    <!-- Mod Nyi Nyi 2nd May 2017 -->
                             <!--<div class="col-sm-4">
                            <div class="form-group">
                                <?= lang("category", "category") ?>
                                <?php
                                $cat[0] = lang('select').' '.lang('category');
                                foreach ($categories as $category) {
                                    $cat[$category->id] = $category->name;
                                }
                                echo form_dropdown('category', $cat, (isset($_POST['category']) ? $_POST['category'] : ''), 'class="form-control select" id="category" placeholder="' . lang("select") . " " . lang("category") . '" style="width:100%"')
                                ?>
                            </div>
                        </div>-->
                            <!-- end mod -->
                            
                            <div class="col-xs-4">
                                <div class="form-group">
                                     <label class="control-label" for="start_date"><?= lang("start_date"); ?></label>
                                    <?= form_input('start_date', set_value('start_date'), 'class="form-control datetimepicker" id="start_date"');?>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="form-group">
                                    <label class="control-label" for="end_date"><?= lang("end_date"); ?></label>
                                    <?= form_input('end_date', set_value('end_date'), 'class="form-control datetimepicker" id="end_date"');?>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <button type="submit" class="btn btn-primary"><?= lang("submit"); ?></button>
                            </div>
                        </div>
                        <?= form_close();?>
                    </div>
                    </div>
                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="table-responsive">
                                <table id="PrRData" class="table table-striped table-bordered table-hover" style="margin-bottom:5px;">
                                    <thead>
                      <tr>
                                            <td colspan="8" class="p0"><input type="text" class="form-control b0" name="search_table" id="search_table" placeholder="<?= lang('type_hit_enter'); ?>" style="width:100%;"></td>
                                        </tr>
                                        <tr class="active">
                                            <th style="max-width:30px;"><?= lang("id"); ?></th>
                                            <th><?= lang("sale_no"); ?></th>
                                            <th class="col-xs-2"><?= lang("code"); ?></th>
                                            <th class="col-xs-1"><?= lang("name"); ?></th>
                                            <th class="col-xs-1"><?= lang("qty"); ?></th>
                                            <?php 
                                            if(config_item('real_unit_price'))
                                            { ?>
                                              <th class="col-xs-1"><?= lang("real_price"); ?></th>
                                            <?php
                                            }
                                             ?>
                                            <th class="col-xs-1"><?= lang("prices"); ?></th>
                                            <th class="col-xs-1"><?= lang("amount"); ?></th>
                                            <!-- mod by mtk for showing foc at 21 March 2019 -->
                                            <?php 
                                            if(config_item('show_foc'))
                                            { ?>
                                            <th class="col-xs-1"><?= lang("foc"); ?></th>
                                            <?php
                                            }
                                             ?>
                                             <!-- end mod by mtk -->
                                            <th class="col-xs-1"><?= lang("cash"); ?></th>
                                            <th class="col-xs-1"><?= lang("name"); ?></th>
                                            <th class="col-xs-1"><?= lang("time"); ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="8" class="dataTables_empty"><?= lang('loading_data_from_server'); ?></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr class="active">
                                            <th style="max-width:30px;"><input type="text" class="text_filter" placeholder="[<?= lang('id'); ?>]"></th>
                                            <th><input type="text" class="text_filter" placeholder="[<?= lang('sale_no'); ?>]"></th>
                                            <th class="col-sm-2"><input type="text" class="text_filter" placeholder="[<?= lang('code'); ?>]"></th>
                                            <th class="col-sm-2"><input type="text" class="text_filter" placeholder="[<?= lang('name'); ?>]"></th>
                                            <th class="col-xs-1"><?= lang("qty"); ?></th>
                                            <?php 
                                            if(config_item('real_unit_price'))
                                            { ?>
                                                <th class="col-sm-2"><input type="text" class="text_filter" placeholder="[<?= lang('real_price'); ?>]"></th>
                                            <?php
                                            }
                                             ?>
                                            <th class="col-xs-1"><?= lang("prices"); ?></th>
                                            <th class="col-xs-1"><?= lang("amount"); ?></th>
                                            <!-- mod by mtk for showing foc at 21 March 2019 -->
                                            <?php 
                                            if(config_item('show_foc'))
                                            { ?>
                                            <th class="col-xs-1"><?= lang("foc"); ?></th>
                                            <?php
                                            }
                                             ?>
                                             <!-- end mod by mtk -->
                                            <th class="col-sm-1">
                                                <select class="select2 select_filter"><option value=""><?= lang("all"); ?></option><option value="paid"><?= lang("paid"); ?></option><option value="partial"><?= lang("partial"); ?></option><option value="due"><?= lang("due"); ?></option></select>
                                            </th>
                                            <th class="col-sm-2"><input type="text" class="text_filter" placeholder="[<?= lang('name'); ?>]"></th>
                                            <th class="col-sm-2"><span class="datepickercon"><input type="text" class="text_filter datepicker" placeholder="[<?= lang('time'); ?>]"></span></th>
                                        </tr>
                                      <!--  <tr>
                                            <td colspan="8" class="p0"><input type="text" class="form-control b0" name="search_table" id="search_table" placeholder="<?= lang('type_hit_enter'); ?>" style="width:100%;"></td>
                                        </tr> -->
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
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
        $('.datepicker').datetimepicker({format: 'YYYY-MM-DD', showClear: true, showClose: true, useCurrent: false, widgetPositioning: {horizontal: 'auto', vertical: 'bottom'}, widgetParent: $('.dataTable tfoot')});
    });
</script>

