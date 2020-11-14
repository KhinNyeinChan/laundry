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
				//mod nyi nyi 20th July 2017 
			} else if (x == 'raw_materials') {
                return '<?= lang('raw_materials'); ?>';
				//end mod 
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
        
		/*
		$('#fileData').dataTable({
            "aLengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, '<?= lang('all'); ?>']],
            "aaSorting": [[ 1, "asc" ]], "iDisplayLength": <?= $Settings->rows_per_page ?>,
            'bProcessing': true, 'bServerSide': true,
            'sAjaxSource': '<?= site_url('reports/get_alerts/') ?>',
            'fnServerData': function (sSource, aoData, fnCallback) {
                aoData.push({
                    "name": "<?= $this->security->get_csrf_token_name() ?>",
                    "value": "<?= $this->security->get_csrf_hash() ?>"
                });
                $.ajax({'dataType': 'json', 'type': 'POST', 'url': sSource, 'data': aoData, 'success': fnCallback});
            },
            "aoColumns": [{"mRender":image}, null, null, {"mRender":ptype}, null, {"mRender":quantityFormat, "bSearchable": false}, {"mRender":quantityFormat}, null, {"mRender":method}, {"mRender":currencyFormat, "bSearchable": false}, {"mRender":currencyFormat, "bSearchable": false}, null]
        }).fnSetFilteringDelay();
		*/
		
		//mod nyi nyi 24th july 2017
		
		var table = $('#fileData').DataTable({

            'ajax' : { url: '<?=site_url('reports/get_alerts');?>', type: 'POST', "data": function ( d ) {
                d.<?=$this->security->get_csrf_token_name();?> = "<?=$this->security->get_csrf_hash()?>";
            }},
            "buttons": [
            { extend: 'copyHtml5', 'footer': true, exportOptions: { columns: [ 0, 1, 2, 3, 4, 5 ] } },
            { extend: 'excelHtml5', 'footer': true, exportOptions: { columns: [ 0, 1, 2, 3, 4, 5 ] } },
            { extend: 'csvHtml5', 'footer': true, exportOptions: { columns: [ 0, 1, 2, 3, 4, 5 ] } },
            { extend: 'pdfHtml5', orientation: 'landscape', pageSize: 'A4', 'footer': true,
            exportOptions: { columns: [ 0, 1, 2, 3, 4, 5 ] } },
            { extend: 'colvis', text: 'Columns'},
            ],
            "columns": [
            { "data": "pid", "visible": false },
            { "data": "image","visible": true, "searchable": false, "orderable": false, "render": image },
            { "data": "code" },
            { "data": "pname" },
            { "data": "type", "render": ptype },
            { "data": "cname" },
            { "data": "quantity" },
			{ "data": "alert_quantity" },
            { "data": "tax" },
            { "data": "tax_method", "render": method },
            { "data": "cost", "searchable": false },
            { "data": "price", "searchable": false },
            { "data": "Actions", "searchable": false, "orderable": false }
            ] /*,
            "footerCallback": function (  tfoot, data, start, end, display ) {
                var api = this.api(), data;
                $(api.column(5).footer()).html( cf(api.column(5).data().reduce( function (a, b) { return pf(a) + pf(b); }, 0)) );
            }
			*/
        });
		//end mod 
		
        $('#fileData').on('click', '.open-image', function() {
            var a_href = $(this).attr('href');
            $('#product_image').attr('src',a_href);
            $('#picModal').modal();
            return false;
        });

        $('#fileData').on('click', '.ap', function() {
            var id = $(this).attr('data-id');
            $.get( "<?= site_url('purchases/suggestions'); ?>/"+id )
            .done(function( data ) {
                var item = JSON.parse(data);
                if (get('spoitems')) {
                    var spoitems = JSON.parse(get('spoitems'));
                } else {
                    var spoitems = {};
                }
                var item_id = Settings.item_addition == 1 ? item.item_id : item.id;
                if (spoitems[item_id]) {
                    spoitems[item_id].row.qty = parseFloat(spoitems[item_id].row.qty) + 1;
                } else {
                    spoitems[item_id] = item;
                }
                store('spoitems', JSON.stringify(spoitems));
                $('#custom-alerts').find('.alert').addClass('alert-success');
                $('#custom-alerts').find('.custom-msg').text('<?= lang('po_item_added'); ?> '+spoitems[item_id].label+' = '+spoitems[item_id].row.qty);
                $('#custom-alerts').show();
            });
            return false;
        });

    });

</script>
<style type="text/css">
    .table td:first-child { padding: 1px; }
    .table td:nth-child(6), .table td:nth-child(7), .table td:nth-child(8), .table td:nth-child(9) { text-align: center; }
    .table td:nth-child(10), .table td:nth-child(11) { text-align: right; }
</style>
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title"><?= lang('list_results'); ?></h3>
                </div>
                <div class="box-body">
                        <div class="table-responsive">
                        <table id="fileData" class="table table-striped table-bordered table-hover" style="margin-bottom:5px;">
                            <thead>
                            <tr class="active">
                               <th style="max-width:30px;"><?= lang("id"); ?></th>
                               <th style="max-width:30px;"><?= lang("image"); ?></th>
                                <th class="col-xs-1"><?= lang("code"); ?></th>
                                <th><?= lang("name"); ?></th>

                                <th class="col-xs-1"><?= lang("type"); ?></th>
                                <th class="col-xs-1"><?= lang("category"); ?></th>
                                <th class="col-xs-1"><?= lang("quantity"); ?></th>
                                <th class="col-xs-1"><?= lang("alert_quanity"); ?></th>
                                <th class="col-xs-1"><?= lang("tax"); ?></th>
                                <th class="col-xs-1"><?= lang("method"); ?></th>
                                <th class="col-xs-1"><?= lang("cost"); ?></th>
                                <th class="col-xs-1"><?= lang("price"); ?></th>
                                <th style="width:35px;"><?= lang("actions"); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td colspan="13" class="dataTables_empty"><?= lang('loading_data_from_server'); ?></td>
                            </tr>
                            </tbody>
                        </table>
                        </div>

                        <div class="modal fade" id="picModal" tabindex="-1" role="dialog" aria-labelledby="picModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
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
