function add_invoice_item(item) {
    if (count == 1) {
        spositems = {};
    }
    if (item == null) {
        return;
    }
    ////////////////////////////////////////
    spositems = JSON.parse(get('spositems'));
    // console.log("Spositems>>", spositems);
    if (spositems == null) {
        spositems = {};
    }
    //////////////////////////////////////////////////////
    // var item_id = Settings.item_addition == 1 ? item.item_id : item.id;
    var item_id = 0;
    var ddd = true;
    var index = 0;
    var oo = {};

    for (var i = 0; i < Object.keys(spositems).length; i++) {
        oo = spositems[i];
        oo.row.id = i;
        if (typeof oo.item_id === 'undefined' || oo.item_id == null) {
            ddd = false;
            break;
        }

        if (JSON.stringify(oo.item_id) == JSON.stringify(item.item_id)) {
            ddd = true;
            index = i;
            break;
        } else {
            ddd = false;
        }
    }
    // alert(ddd);
    if (ddd) {
        item_id = index;
    } else {
        // alert(Object.keys(spositems).length);
        item_id = Object.keys(spositems).length;
    }

    if (spositems[item_id]) {
        spositems[item_id].row.qty = parseFloat(spositems[item_id].row.qty) + 1;
    } else {
        spositems[item_id] = item;
    }

    spositems[item_id].row.id = item_id;
    store('spositems', JSON.stringify(spositems));
    loadItems();
    return true;
}

function loadItems() {

    //mod by nyi nyi on 15th March 2018

    var additional_order = false;
    //end mod 

    if (count == 1) {
        spositems = {};
    }
    if (get('spositems')) {
        total = 0;
        count = 1;
        an = 1;
        product_tax = 0;
        invoice_tax = 0;
        product_discount = 0;
        order_discount = 0;
        total_discount = 0;


        $("#posTable tbody").empty();
        var time = ((new Date).getTime()) / 1000;

        //////////////////////////////////////////////////////////////////////////
        var sppp = JSON.parse(get('spositems'));
        var j = 0
        var obj = {};

        $.each(sppp, function() {
            obj[j] = this;
            obj[j].id = j;
            // alert('load>>' + JSON.stringify(obj[j]));
            j++;
        });

        store('spositems', JSON.stringify(obj));
        spositems = JSON.parse(get('spositems'));
        //////////////////////////////////////////////////////////////////////////////////
        /***** mod by YLP 10/31/2019  *****/
        var position = 0;
        $.each(spositems, function() {
            var item = this;

            var item_id = position; //this.row.id;

            var ii = this.item_id; //this.row.id;

            position++;

            spositems[item_id] = item;
            /*  end mod */
            var product_id = item.item_id /*item.row.id*/ ,
                item_type = item.row.type,
                item_tax_method = parseFloat(item.row.tax_method),
                combo_items = item.combo_items,
                item_qty = item.row.qty,
                item_aqty = parseFloat(item.row.quantity),
                item_foc = item.row.foc,
                item_type = item.row.type,
                item_ds = item.row.discount,
                item_code = item.row.code,
                item_name = item.row.name.replace(/"/g, "&#034;").replace(/'/g, "&#039;"); // mod by mtk for showing foc at 21 March 2019
            var unit_price = parseFloat(item.row.real_unit_price);
            $('#wh_nPrice').val(unit_price);

            var ww_sale = $('#whsale').val();
            if (ww_sale == 'true') {
                var whole_sale = parseFloat(item.row.details);
            } else {
                var whole_sales = (item.row.details).valueOf();
            }
            //var whole_sale = parseFloat(item.row.real_whole_sale);//mod by mtk
            //var whole_sale = (item.row.details).valueOf();
            //var whole_sale = (item.row.details).valueOf();//mod by mtk
            //alert(whole_sale);
            var net_price = unit_price;
            var item_comment = item.row.comment;
            var item_was_ordered = item.row.ordered ? item.row.ordered : 0;
            var item_foc_ordered = item.row.ordered_foc ? item.row.ordered_foc : 0;

            var ds = item_ds ? item_ds : '0';
            var item_discount = formatDecimal(ds);

            additional_orderr = 0;

            product_discount += formatDecimal(item_discount * item_qty);
            net_price = formatDecimal(net_price - item_discount);

            var pr_tax = parseInt(item.row.tax),
                pr_tax_val = 0;

            product_tax += formatDecimal(pr_tax_val * item_qty);
            var row_no = (new Date).getTime();

            /*****  mod by YLP 10/31/2019   ..............................................................................    V-------Here------V    *****/

            var newTr = $('<tr id="' + row_no + '" class="' + item_id + '" data-item-id="' + item_id + '" p_id="' + ii + '" deleting_id="' + ii + '"></tr>');

            tr_html = '<td> <input name="product_id[]" type="hidden" class="rid" value="' + product_id + '"><input name="item_comment[]" type="hidden" class="ritem_comment" value="' + item_comment + '"><input name="product_code[]" type="hidden" value="' + item.row.code + '"><input name="product_name[]" type="hidden" value="' + item.row.name + '"><button type="button" class="btn bg-purple btn-block btn-xs edit" id="' + row_no + '" data-item="' + item_id + '"><span class="sname" id="name_' + row_no + '">' + item_name + ' (' + item_code + ')</span></button></td>';
            // <input class="rprice" name="net_price[]" type="hidden" id="price_' + row_no + '" value="' + formatDecimal(item_price) + '">
            tr_html += '<td class="text-right"><input class="realuprice" name="real_unit_price[]" type="hidden" value="' + item.row.real_unit_price + '"><input class="rdiscount" name="product_discount[]" type="hidden" id="discount_' + row_no + '" value="' + ds + '"><span class="text-right sprice" id="sprice_' + row_no + '">' + formatMoney(parseFloat(net_price) + parseFloat(pr_tax_val)) + '</span></td>';

            tr_html += '<td><input name="additional_order[]" type="hidden" class="riwo1" value="' + additional_orderr + '"> <input name="item_was_ordered[]" type="hidden" class="riwo" value="' + item_was_ordered + '"><input name="item_foc_ordered[]" type="hidden" class="riwo" value="' + item_foc_ordered + '"><input class="form-control input-qty kb-pad text-center rquantity" name="quantity[]" type="text" value="' + formatDecimal(item_qty) + '" data-id="' + row_no + '" data-item="' + item_id + '" id="quantity_' + row_no + '" onClick="this.select();"></td><input name="item_foc[]" type="hidden" class="riwo" value="' + item_foc + '">'; // mod by mtk for showing foc at 21 March 2019

            tr_html += '<td class="text-right"><span class="text-right ssubtotal" id="subtotal_' + row_no + '">' + formatMoney(((parseFloat(net_price) + parseFloat(pr_tax_val)) * parseFloat(item_qty))) + '</span></td>';

            tr_html += '<td class="text-center"><i class="fa fa-trash-o tip pointer posdel" id="' + row_no + '" title="Remove"></i></td>';

            /***** end mod *****/

            //  alert(item.row.order_no);
            tr_html += '<input name="onoo[]" type="hidden" value="' + item.row.order_no + '">';
            newTr.html(tr_html);
            //mod by Nyi Nyi on 3rd July 2018
            //newTr.prependTo("#posTable");

            newTr.appendTo("#posTable");

            //end mod 
            total += formatDecimal((parseFloat(net_price) + parseFloat(pr_tax_val)) * parseFloat(item_qty));
            count += parseFloat(item_qty);
            count += parseFloat(item_foc);
            an++;
            // $('#list-table-div').scrollTop(0);
            var oitb = $('#list-table-div')[0].scrollHeight;
            $('#list-table-div').slimScroll({ scrollTo: oitb });
            if (item_type == 'standard' && item_qty > item_aqty) {
                $('#' + row_no).addClass('danger');
                $('#' + row_no).find('.edit').removeClass('bg-purple').addClass('btn-warning');
            } else if (item_type == 'combo') {
                if (combo_items === false) {
                    $('#' + row_no).addClass('danger');
                } else {
                    $.each(combo_items, function() {
                        if (parseFloat(this.quantity) < (parseFloat(this.qty) * item_qty)) {
                            $('#' + row_no).addClass('danger');
                            $('#' + row_no).find('.edit').removeClass('bg-purple').addClass('btn-warning');
                        }
                    });
                }
            }

            var comments = item_comment ? item_comment.split(/\r?\n/g) : [];
        });

        // mod by mtk at 26 Feb 2019 for service charges 
        var sc = get('spos_sc');
        service_charges = parseFloat(sc);
        // end mod by mtk

        var g_total = Math.ceil(total) - Math.ceil(order_discount) + Math.ceil(order_tax) + Math.ceil(service_charges); // mod by mtk at 26 Feb 2019 for service charges 

        grand_total = formatMoney(g_total);
        $("#ds_con").text('(' + formatMoney(product_discount) + ') ' + formatMoney(order_discount));
        $("#ts_con").text(formatMoney(order_tax));
        $("#sc_con").text(formatMoney(service_charges)); // mod by mtk at 26 Feb 2019 for service charges 
        $("#total-payable").text(grand_total);
        $("#total").text(formatMoney(total));
        $("#count").text((an - 1) + ' (' + formatMoney(count - 1) + ')');

        $('#add_item').focus();
    }
}

$(document).on('click', '.product', function(e) {
    code = $(this).val();
    $.ajax({
        type: "get",
        url: base_url + 'pos/get_product/' + code,
        dataType: "json",
        success: function(data) {
            console.log("Resp data>>", data);
            if (data !== null) {
                add_invoice_item(data);
            } else {
                bootbox.alert(lang.no_match_found);
            }
        }
    });
});
$(document).on('click', '.home', function(e) {
    alert("OK");
    console.log("OK");
});