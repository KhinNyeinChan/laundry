function roundNumberr(gtotal,div){
    var round_total=" ";
     if(gtotal%div==0){
                    round_total=gtotal;
                }
                else{

                    var n="";
                    n=parseInt(gtotal/div);
                    n+=1;
                    round_total=n*div;
                            }
                            return round_total;


}
function roundNumberr1(gtotal,div){
    var round_total=" ";
     if(gtotal%div==0){
                    round_total=gtotal;
                }
                else{
                    var n="";
                    n=parseInt(gtotal/div);
                   // n+=1;
                    round_total=n*div;
                            }
                            return round_total;

}
function roundNumberr2(gtotal,div){
    var round_total=" ";
     if(gtotal%div==0){
                    round_total=gtotal;
                }
                else{
                    var n="";
                    n=parseInt(gtotal/div);
                     if(gtotal%div>=26){
                        n+=1;
                     }
                 
                    round_total=n*div;
  }
                         
                            return round_total;

}

function add_invoice_item(item) {

    if (count == 1) {
        spositems = {};
    }
    if (item == null) {
        return;
    }

    var item_id = Settings.item_addition == 1 ? item.item_id : item.id;
    if (spositems[item_id]) {
        spositems[item_id].row.qty = parseFloat(spositems[item_id].row.qty) + 1;
    } else {
        spositems[item_id] = item;
    }

    store('spositems', JSON.stringify(spositems));
    loadItems();
    return true;
}

function loadItems() {

    //mod by nyi nyi on 15th March 2018

    var additional_order=false;
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
        var time = ((new Date).getTime())/1000;
        if (Settings.remote_printing == 2) {

            var pos_customer = 'Customer: '+$('#select2-spos_customer-container').text()+ "\n";
            var hr = 'Ref: '+$("#hold_ref").val()+ "\n";
            var user = 'Sales Person: '+username+ "\n";
            var pos_curr_time = 'Date: '+date(Settings.dateformat+' '+Settings.timeformat, time)+ "\n";
            var ob_info = pos_customer+hr+user+pos_curr_time+ "\n";
            order_data.info = ob_info;
            bill_data.info = ob_info;
            var o_items = '';
            var b_items = '';

        } else if(Settings.remote_printing == 1 || Settings.remote_printing == 0) {
            $("#order_span").empty(); $("#bill_span").empty();
            var style = '<style>.bb td, .bb th { border-bottom: 1px solid #DDD; }</style>';
            var pos_head = '<span style="text-align:center;"><h3>'+Settings.site_name+'</h3>'
            // var pos_customer = ''; // remove this line and uncomment below to display customer
          
           //var capacity=0;
            var pos_customer='<h5>Customer: '+$('#select2-spos_customer-container').text()+'</h5>';

          if($('#sus_order_id').val()==""){
            var order_count='<h5> Order No: '+ (+$('#order_id').val()+1)+'</h5>';  
         }
         else{  
            suspend = $('<span></span>');
            suspend.html('<input type="hidden" name="delete_id" value="'+($('#sus_order_id').val())+'" />');
            suspend.appendTo("#hidesuspend");
            var order_count='<h5> Order Number:'+ ($('#sus_order_id').val())+'</h5>';
       
        }   var hr = '<h5>Ref: '+$("#hold_ref").val()+'</h5>';
            var user = '<h5>Sales Person: '+username+'</h5>';
            //$('user_name').val(user);
            var pos_curr_time = '<h5>Date: '+date(Settings.dateformat+' '+Settings.timeformat, time)+'</h5>';
            if(($("#tracking").val()=='true')){
            $("#order_span").prepend(style+pos_head+'<h4>'+lang.order+'</h4></span>'+pos_customer+order_count+hr+user+pos_curr_time);
           }
           else{
             $("#order_span").prepend(style+pos_head+'<h4>'+lang.order+'</h4></span>'+pos_customer+hr+user+pos_curr_time);
         
           }
         //  }
           //else{
           // $("#order_span").prepend(style+pos_head+'<h4>'+lang.order+'</h4></span>'+pos_customer+hr+user+pos_curr_time);
           //} 
           $("#bill_span").prepend(style+pos_head+'<h4>'+lang.bill+'</h4></span>'+pos_customer+hr+user+pos_curr_time);
            $("#order-table").empty();$('#bill-table').empty();
            //$('#bill-table').append("<tr style=font-size:12px;><th style=text-align:left;> Description </th><th> Qty </th> <th> Price </th> <th> Subtotal </th></tr>");//mod by mtk for print bill as receipt at 18 Feb 2019
            // add style=font-size:12px for bill (line-187,330,... contain this changes)
        }
        spositems = JSON.parse(get('spositems'));

        $.each(spositems, function () {

            var item = this;
            var item_id = Settings.item_addition == 1 ? item.item_id : item.id;
            //alert(item_id);
            spositems[item_id] = item;

            var product_id = item.row.id, item_type = item.row.type, item_tax_method = parseFloat(item.row.tax_method), combo_items = item.combo_items, item_qty = item.row.qty, item_aqty = parseFloat(item.row.quantity), item_foc = item.row.foc, item_type = item.row.type, item_ds = item.row.discount, item_code = item.row.code, item_name = item.row.name.replace(/"/g, "&#034;").replace(/'/g, "&#039;"); // mod by mtk for showing foc at 21 March 2019
            var unit_price = parseFloat(item.row.real_unit_price);
            $('#wh_nPrice').val(unit_price);
           // var order_id=item.row.
           var ww_sale = $('#whsale').val();
           if(ww_sale == 'true')
           {
            var whole_sale = parseFloat(item.row.details);
           }
           else
           {
            var whole_sales = (item.row.details).valueOf();
           }
            //var whole_sale = parseFloat(item.row.real_whole_sale);//mod by mtk
            //var whole_sale = (item.row.details).valueOf();
            //var whole_sale = (item.row.details).valueOf();//mod by mtk
            //alert(whole_sale);
            var net_price = unit_price;
            var item_comment = item.row.comment;
            var item_was_ordered = item.row.ordered ? item.row.ordered : 0;
            var item_foc_ordered = item.row.ordered_foc ? item.row.ordered_foc :0;
               
            var ds = item_ds ? item_ds : '0';
            var item_discount = formatDecimal(ds);
            if (ds.indexOf("%") !== -1) {
                var pds = ds.split("%");
                if (!isNaN(pds[0])) {
                    item_discount = formatDecimal(parseFloat(((net_price) * parseFloat(pds[0])) / 100));
                }
            }
            if (item_was_ordered) {
           //  alert(item_was_ordered);
                additional_order=true;
                } 
            if(additional_order){
                    additional_orderr=1;
            }
            else{
                    additional_orderr=0;
            }

            product_discount += formatDecimal(item_discount * item_qty);
            net_price = formatDecimal(net_price-item_discount);

            var pr_tax = parseInt(item.row.tax), pr_tax_val = 0;
            if (pr_tax !== null && pr_tax != 0) {
                if(item_tax_method == 0) {
                    pr_tax_val = formatDecimal((net_price * parseFloat(pr_tax)) / (100+parseFloat(pr_tax)));
                    net_price -= pr_tax_val;
                    tax = lang.inclusive;
                } else {
                    pr_tax_val = formatDecimal((net_price * parseFloat(pr_tax)) / 100);
                    tax = lang.exclusive;
                }
            }

            product_tax += formatDecimal(pr_tax_val * item_qty);
         
            var row_no = (new Date).getTime();
            var newTr = $('<tr id="' + row_no + '" class="' + item_id + '" data-item-id="' + item_id + '"></tr>');
            tr_html = '<td> <input name="product_id[]" type="hidden" class="rid" value="' + product_id + '"><input name="item_comment[]" type="hidden" class="ritem_comment" value="' + item_comment + '"><input name="product_code[]" type="hidden" value="' + item.row.code + '"><input name="product_name[]" type="hidden" value="' + item.row.name + '"><button type="button" class="btn bg-purple btn-block btn-xs edit" id="' + row_no + '" data-item="' + item_id + '"><span class="sname" id="name_' + row_no + '">' + item_name + ' (' + item_code + ')</span></button></td>';
            // <input class="rprice" name="net_price[]" type="hidden" id="price_' + row_no + '" value="' + formatDecimal(item_price) + '">
            tr_html += '<td class="text-right"><input class="realuprice" name="real_unit_price[]" type="hidden" value="' + item.row.real_unit_price + '"><input class="rdiscount" name="product_discount[]" type="hidden" id="discount_' + row_no + '" value="' + ds + '"><span class="text-right sprice" id="sprice_' + row_no + '">' + formatMoney(parseFloat(net_price) + parseFloat(pr_tax_val)) + '</span></td>';
           
            tr_html += '<td><input name="additional_order[]" type="hidden" class="riwo1" value="' + additional_orderr + '"> <input name="item_was_ordered[]" type="hidden" class="riwo" value="' + item_was_ordered + '"><input name="item_foc_ordered[]" type="hidden" class="riwo" value="' + item_foc_ordered + '"><input class="form-control input-qty kb-pad text-center rquantity" name="quantity[]" type="text" value="' + formatDecimal(item_qty) + '" data-id="' + row_no + '" data-item="' + item_id + '" id="quantity_' + row_no + '" onClick="this.select();"></td><input name="item_foc[]" type="hidden" class="riwo" value="' + item_foc + '">';// mod by mtk for showing foc at 21 March 2019
            
            tr_html += '<td class="text-right"><span class="text-right ssubtotal" id="subtotal_' + row_no + '">' + formatMoney(((parseFloat(net_price) + parseFloat(pr_tax_val)) * parseFloat(item_qty))) + '</span></td>';
          
            tr_html += '<td class="text-center"><i class="fa fa-trash-o tip pointer posdel" id="' + row_no + '" title="Remove"></i></td>';
            //  alert(item.row.order_no);
            tr_html += '<input name="onoo[]" type="hidden" value="' + item.row.order_no + '">';
            newTr.html(tr_html);
            //mod by Nyi Nyi on 3rd July 2018
            //newTr.prependTo("#posTable");
            //   alert("hello");
            newTr.appendTo("#posTable");
            //alert(row_no);
            //end mod 
            total += formatDecimal((parseFloat(net_price) + parseFloat(pr_tax_val)) * parseFloat(item_qty));
            count += parseFloat(item_qty);
            count += parseFloat(item_foc);
            an++;
            // $('#list-table-div').scrollTop(0);
            var oitb = $('#list-table-div')[0].scrollHeight;
            $('#list-table-div').slimScroll({scrollTo: oitb});
            if(item_type == 'standard' && item_qty > item_aqty) {
                $('#' + row_no).addClass('danger');
                $('#' + row_no).find('.edit').removeClass('bg-purple').addClass('btn-warning');
            }
            else if (item_type == 'combo') {
                if(combo_items === false) {
                    $('#' + row_no).addClass('danger');
                } else {
                    $.each(combo_items, function(){
                        if(parseFloat(this.quantity) < (parseFloat(this.qty)*item_qty)) {
                            $('#' + row_no).addClass('danger');
                            $('#' + row_no).find('.edit').removeClass('bg-purple').addClass('btn-warning');
                        }
                    });
                }
            }

            var comments = item_comment ? item_comment.split(/\r?\n/g) : [];
            if (Settings.remote_printing == 2) {

                //b_items += "#"+(an-1)+" "+ item_name + " (" + item_code + ")" + "\n";
                //mod nyi nyi 11th Nov 2017
                b_items += item_name;
                //end mod 
                
                for (var i = 0, len = comments.length; i < len; i++) {
                    b_items += (comments[i].length > 0 ? "   * "+comments[i]+"\n" : "");
                }
                //mod nyi nyi 11th Nov 2017
                //b_items += printLine(parseFloat(item_qty) + " x " + formatMoney(parseFloat(net_price) + parseFloat(pr_tax_val))+": "+ formatMoney(((parseFloat(net_price) + parseFloat(pr_tax_val)) * parseFloat(item_qty)))) + "\n";
                b_items += printLine(parseInt(item_qty) + " x " + formatMoney(parseFloat(net_price) + parseFloat(pr_tax_val))+": "+ formatMoney(((parseFloat(net_price) + parseFloat(pr_tax_val)) * parseFloat(item_qty)))) + "\n";
                
                //o_items += printLine("#"+(an-1)+" "+ item_name + " (" + item_code + "): [ "+ (item_was_ordered != 0 ? 'xxxx' : item_qty)) + " ]\n";
                //mod nyi nyi 11th Nov 2017
                //o_items += printLine(item_name + " : [ "+ (item_was_ordered != 0 ? 'xxxx' : item_qty)) + " ]\n";
                //mod by nyi nyi on 5th Apr 2018
                item_qty = item_qty - (item.row.ordered ? item.row.ordered : 0);
                

                //o_items += printLine(item_name + " : [ "+ (item_was_ordered != 0 ? '####' : item_qty)) + " ]\n";
                if (item_qty > 0) {
                    item_qty =  parseInt(item_qty)+parseInt(item_foc); //mod by mtk for showing foc at 21 March 2019
                    o_items += printLine(item_name + " : [ "+ item_qty) + " ]\n";
                }
                //end mod 
                for (var i = 0, len = comments.length; i < len; i++) {
                    o_items += (comments[i].length > 0 ? "   * "+comments[i]+"\n" : "");
                }
                o_items += "\n";

            } else if (Settings.remote_printing == 1 || Settings.remote_printing== 0) {  //web browser printing
                
                //mod by mtk for print bill as receipt at 18 Feb 2019
                /*
                var bprTr = '<tr><tr style=font-size:12px class="row_' + item_id + '" data-item-id="' + item_id + '"><td style="text-align:left;">'+(item_id == 0 ? item.row.name :item_name);
                for (var i = 1, len = comments.length; i < len; i++) {
                    bprTr += (comments[i] ? '<br> <b>*</b> <small>'+comments[i]+'</small>' : '');
                }
                bprTr += '</td> <td style="text-align:center;">' + item_qty +'</td> <td style="text-align:right;">'+ formatMoney(parseFloat(net_price) + parseFloat(pr_tax_val))+ '</td> <td style="text-align:right;">'+ formatMoney(((parseFloat(net_price) + parseFloat(pr_tax_val)) * parseFloat(item_qty))) +'</td></tr>';
                */
                // end mod by mtk


                //mod nyi nyi 11th Nov 2017
                //var bprTr = '<tr class="row_' + item_id + '" data-item-id="' + item_id + '"><td colspan="2">#'+(an-1)+' '+ (item_id == 0 ? item.row.name :item_name + ' (' + item_code + ')');
                var bprTr = '<tr class="row_' + item_id + '" data-item-id="' + item_id + '"><td colspan="2">'+(item_id == 0 ? item.row.name :item_name);
                //end mod 
                for (var i = 0, len = comments.length; i < len; i++) {
                    bprTr += (comments[i] ? '<br> <b>*</b> <small>'+comments[i]+'</small>' : '');
                }
                bprTr += '</td></tr>';
                if(item_foc > 0){
                bprTr += '<tr class="bb row_' + item_id + '" data-item-id="' + item_id + '"><td>(' + item_qty + ' x ' + formatMoney(parseFloat(net_price) + parseFloat(pr_tax_val))+ ')</td><td style="text-align:right;">'+ formatMoney(((parseFloat(net_price) + parseFloat(pr_tax_val)) * parseFloat(item_qty))) +'</td></tr>';
                bprTr += '<tr class="bb row_' + item_id + '" data-item-id="' + item_id + '"><td>(' + item_foc + ' x ' + formatMoney(parseFloat(net_price) + parseFloat(pr_tax_val))+ ')(FOC)***</td><td style="text-align:right;">'+ formatMoney(((parseFloat(net_price) + parseFloat(pr_tax_val)) * parseFloat(0))) +'</td></tr>';
                }
                else{
                bprTr += '<tr class="bb row_' + item_id + '" data-item-id="' + item_id + '"><td>(' + item_qty + ' x ' + formatMoney(parseFloat(net_price) + parseFloat(pr_tax_val))+ ')</td><td style="text-align:right;">'+ formatMoney(((parseFloat(net_price) + parseFloat(pr_tax_val)) * parseFloat(item_qty))) +'</td></tr>';   
                }
                
                //mod nyi nyi 11th Nov 2017
                
                //bprTr += '<tr class="bb row_' + item_id + '" data-item-id="' + item_id + '"><td>(' + item_qty + ' x ' + formatMoney(parseFloat(net_price) + parseFloat(pr_tax_val))+ ')</td><td style="text-align:right;">'+ formatMoney(((parseFloat(net_price) + parseFloat(pr_tax_val)) * parseFloat(item_qty))) +'</td></tr>';
                //bprTr += '<tr class="bb row_' + item_id + '" data-item-id="' + item_id + '"><td>(' + item_qty + ' x ' + formatMoney(parseFloat(net_price) + parseFloat(pr_tax_val))+ ')</td><td style="text-align:right;">'+ formatMoney(((parseFloat(net_price) + parseFloat(pr_tax_val)) * parseFloat(item_qty))) +'</td></tr>';
                //mod nyi nyi 11th Nov 2017
                //var oprTr = '<tr class="bb row_' + item_id + '" data-item-id="' + item_id + '"><td>#'+(an-1)+' ' + item_name + ' (' + item_code + ')';
                
                /*
                var oprTr = '<tr class="bb row_' + item_id + '" data-item-id="' + item_id + '"><td>'+ item_name + ' (' + item_code + ')';
                
                //end mod 
                for (var i = 0, len = comments.length; i < len; i++) {
                    oprTr += (comments[i] ? '<br> <b>*</b> <small>'+comments[i]+'</small>' : '');
                }
                */
                //mod by nyi nyi on 14th March 2018
                
                //mod by nyi nyi on 5th Apr 2018
             //   alert(item_qty);
                item_qty = item_qty - (item.row.ordered ? item.row.ordered : 0);
                item_foc = item_foc - (item.row.ordered_foc ? item.row.ordered_foc : 0);
               // alert(item.row.ordered);
                
                //oprTr += '</td><td>[ '+(item_was_ordered != 0 ? 'xxxx' : item_qty)+' ]</td></tr>';
                ////oprTr += '</td><td>[ '+(item_was_ordered != 0 ? 'Hello' : item_qty)+' ]</td></tr>';
                /*if(item_qty==0){
                    alert("cancel orders");
                    var oprTr = '<tr class="bb row_' + item_id + '" data-item-id="' + item_id + '"><td>'+ item_name + ' (' + item_code + ')';
                  oprTr += '</td><td>Cancel</td></tr>';
                }*/
                if (item_qty > 0 || item_foc > 0) {  // mod by mtk for item_qty=0 with itme)_foc = 1
                    var oprTr = '<tr class="bb row_' + item_id + '" data-item-id="' + item_id+'"><td>'+ item_name + ' (' + item_code + ')';
                 
                    for (var i = 0, len = comments.length; i < len; i++) {
                        oprTr += (comments[i] ? '<br> <b>*</b> <small>'+comments[i]+'</small>' : '');
                    }
                      
                        item_qty =  parseInt(item_qty)+parseInt(item_foc);
                        //mod by mtk for showing foc at 21 March 2019
                        
                        oprTr += '</td><td>[ '+ item_qty +' ]</td></tr>';
                           
                }
                //end mod 
                
                //mod by nyi nyi on 5th Apr 2018
                if (item_was_ordered) {
                    //alert(item_was_ordered);
                additional_order = true;
                } 
                
                $("#order-table").append(oprTr);
                
                //end mod 
                
                //mod nyi nyi 14th march 2018
                /*
                if (item_was_ordered) {
                    additional_order = true;
                } else {
                $("#order-table").append(oprTr);
                }
                */
                //end mod 14th March 2018
                
                $("#bill-table").append(bprTr);
                
            }
        });
        
        //mod by nyi nyi on 15th March 2018
        if (additional_order) {
        $("#order-table").append('<tr align="center"><td>***Additional Order***</td></tr>');
        }
        //end mod 

        var ds = get('spos_discount') ? get('spos_discount') :
        ($('#discount_val').val() ? $('#discount_val').val() : '0');
        order_discount = parseFloat(ds);
        if(ds.indexOf("%") !== -1) {
            var pds = ds.split("%");
            order_discount = parseFloat((total*parseFloat(pds[0]))/100);
        }

        var ts = get('spos_tax') ? get('spos_tax') :
        ($('#tax_val').val() ? $('#tax_val').val() : '0');
        order_tax = parseFloat(ts);
        if(ts.indexOf("%") !== -1) {
            var pts = ts.split("%");
            order_tax = ((total-order_discount)*parseFloat(pts[0]))/100;
        }
        
        // mod by mtk at 26 Feb 2019 for service charges 
        var sc = get('spos_sc') ? get('spos_sc') :
        ($('#sc_val').val() ? $('#sc_val').val() : '0');
        service_charges = parseFloat(sc);
        if(sc.indexOf("%") !== -1) {
            var scs = sc.split("%");
            service_charges = ((total-order_discount)*parseFloat(scs[0]))/100;
        }
        // end mod by mtk
       
        

        var g_total = Math.ceil(total) - Math.ceil(order_discount) + Math.ceil(order_tax) + Math.ceil(service_charges);// mod by mtk at 26 Feb 2019 for service charges 
      
        grand_total = formatMoney(g_total);
        $("#ds_con").text('('+formatMoney(product_discount)+') '+formatMoney(order_discount));
        $("#ts_con").text(formatMoney(order_tax));
        $("#sc_con").text(formatMoney(service_charges));// mod by mtk at 26 Feb 2019 for service charges 
        $("#total-payable").text(grand_total);
        $("#total").text(formatMoney(total));
        $("#count").text((an-1)+' ('+formatMoney(count-1)+')');

        if (Settings.remote_printing == 2) {

            order_data.items = o_items;
            bill_data.items = b_items;
            var b_totals = '';
            b_totals += printLine(lang.total+': '+ formatMoney(total)) +"\n";
            if(order_discount > 0 || product_discount > 0) {
                b_totals += printLine(lang.discount+': '+ formatMoney(order_discount+product_discount)) +"\n";
            }
            if (order_tax != 0) {
                b_totals += printLine(lang.order_tax+': '+ formatMoney(order_tax)) +"\n";
            }
            b_totals += printLine(lang.grand_total+': '+ formatMoney(g_total)) +"\n";
            if(Settings.rounding != 0) {
                div=50;
               if(Settings.rounding==1){ 
            round_total=roundNumberr(g_total,div);
               }
               if(Settings.rounding==2){ 
            round_total=roundNumberr1(g_total,div);
               }
               if(Settings.rounding==3){ 
            round_total=roundNumberr2(g_total,div);
               }
            }
            else
               {
                round_total=g_total;
               } //round_total = roundNumber(g_total, parseInt(Settings.rounding));
                var rounding = formatDecimal(round_total - g_total);
                if(rounding!=0){
                b_totals += printLine(lang.rounding+': '+ formatMoney(rounding)) +"\n";
            }
                b_totals += printLine(lang.total_payable+': '+ formatMoney(round_total)) +"\n";
            
            
            //mod nyi nyi 11th Nov 2017
            //b_totals += "\n"+ lang.total_items+': '+ (an - 1) + ' (' + (parseFloat(count) - 1) + ')' +"\n";
            //end mod 
            
            bill_data.totals = b_totals;

        } else if (Settings.remote_printing == 1 || Settings.remote_printing==0) {
            var bill_totals = '';
            //mod nyi nyi 11th Nov 2017
            //bill_totals += '<tr class="bb"><td>'+lang.total_items+'</td><td style="text-align:right;">'+(an - 1) + ' (' + (parseFloat(count) - 1) + ')</td></tr>';
            //end mod 
            //alert("hello");
            bill_totals += '<tr class="bb"><td>'+lang.total+'</td><td style="text-align:right;">'+formatMoney(total)+'</td></tr>';
            if(order_discount > 0 || product_discount > 0) {
                bill_totals += '<tr class="bb"><td>'+lang.discount+'</td><td style="text-align:right;">'+formatMoney(order_discount+product_discount)+'</td></tr>';
            }
        
            if (order_tax != 0) {
                bill_totals += '<tr class="bb"><td>'+lang.order_tax+'</td><td style="text-align:right;">'+formatMoney(order_tax)+'</td></tr>';
            }
            // mod by mtk at 26 Feb 2019 for service charges
            if (service_charges != 0) {
              //  alert("sc");
                bill_totals += '<tr class="bb"><td> Service Charges </td><td style="text-align:right;">'+formatMoney(service_charges)+'</td></tr>';
            }
            // end mod
            //bill_totals += '<tr style=font-size:12px class="bb"><td>'+lang.grand_total+'</td><td style="text-align:right;">'+formatMoney(g_total)+'</td></tr>';
            if(Settings.rounding != 0) {
               // alert("user");
               div=50;
               if(Settings.rounding==1){ 
            round_total=roundNumberr(g_total,div);
               }
                 if(Settings.rounding==2){ 
            round_total=roundNumberr1(g_total,div);
               }
               if(Settings.rounding==3){ 
            round_total=roundNumberr2(g_total,div);
               }
           } else{
                round_total=g_total;
               
               }

              

             
            // round_total = roundNumber(g_total, parseInt(Settings.rounding));
                var rounding = formatDecimal(round_total - g_total);
                 bill_totals += '<tr class="bb"><td>'+lang.grand_total+'</td><td style="text-align:right;">'+formatMoney(round_total)+'</td></tr>';
           
                if(rounding!=0){
                bill_totals += '<tr class="bb"><td>'+lang.rounding+'</td><td style="text-align:right;">'+formatMoney(rounding)+'</td></tr>';
}                bill_totals += '<tr class="bb"><td>'+lang.total_payable+'</td><td style="text-align:right;">'+formatMoney(round_total)+'</td></tr>';
            
            bill_totals += '<tr style=font-size:12px class="bb"><td colspan="2" style="text-align:center;">'+lang.merchant_copy+'</td></tr>';
            $('#bill-total-table').empty();
            $('#bill-total-table').append(bill_totals);
        }

        if (Settings.display_kb == 1) { display_keyboards(); }
        $('#add_item').focus();
    }
}

function chr(i) {
    return String.fromCharCode(i);
}

$(document).ready(function () {

    $(document).on('click', '.no-results, #filter-suspended-sales', function (e) {
        e.preventDefault();
        e.stopPropagation();
    });

    $('#susModal').on('shown.bs.modal', function (e) {
        //$('#reference_note').focus();
        var spos = $('#select2-spos_customer-container').text();
          $('#reference_note').val(spos);
    if(spos!="Walk-in Client"){
    //var person = prompt("Please enter number of people", "0");
    //if  (person == null) {
           // person = prompt("Please enter number of people", "0"); 
 
      //}
     }
        $('#reference_note').val(spos);
    
    });
    

    $('#filter-categories').hideseek({
        nodata: lang.no_match_found
    });

    $(document).on('click', '.suspended_sales .dropdown-menu .header', function (e) {
        e.stopPropagation();
    });

    $('#filter-suspended-sales').hideseek({
        nodata: lang.no_match_found
    });

    $('#suspended_sales').on('shown.bs.dropdown', function () {
        $('#filter-suspended-sales').focus();
    });

    $(document).on('click', '#update-note', function(){
        var n = $('#snote').val();
        store('spos_note', n);
        $('#note').val(n);
        $('#noteModal').modal('hide');
    });
    /* =============================
    Edit Item Modal
    ============================= */

    $("#posTable").on("click", '.edit', function() {
      //  alert("dkj");
        var row = $(this).closest('tr');
        var id = row.attr('id');
        var item_id = row.attr('data-item-id');
        var item = spositems[item_id];
        //var unit_price = parseFloat(item.row.real_unit_price);
        //document.getElementById('ck').value = "true";
        var unit_price = formatDecimal(row.find('.realuprice').val());
        var net_price = unit_price;
        
        //mod by mtk for whole sale
        var w_sale = $('#whsale').val();
        if(w_sale == 'true')
        {
          var whole_sale = parseFloat(item.row.details);
          if((whole_sale == 0) || isNaN(whole_sale))
        {
            whole_sale = "N.A";
            
            $('#change_wh').toggle(false);
            $('#rechange').toggle(false);

        }
        else{
            
            $('#change_wh').toggle(true);
            $('#rechange').toggle(true);
        }  
        }
        else
        {
          var whole_sales = (item.row.details).valueOf();
          if(whole_sales == 0)
        {
            whole_sales = "N.A";
            
            $('#change_wh').toggle(false);
            $('#rechange').toggle(false);

        }
        else{
            
            $('#change_wh').toggle(true);
            $('#rechange').toggle(true);
        }
        }
        
        //var whole_sale = parseFloat(item.row.real_whole_sale);//mod by mtk
        var item_foc = parseFloat(item.row.foc); // mod by mtk for showing foc at 21 March 2019
        
         
        //end mod
        
        var ds = item.row.discount ? item.row.discount : '0';
        item_discount = formatDecimal(parseFloat(ds));
        if (ds.indexOf("%") !== -1) {
            var pds = ds.split("%");
            if (!isNaN(pds[0])) {
                item_discount = formatDecimal((net_price * parseFloat(pds[0])) / 100);
            }
        }
        net_price -= item_discount;
        var pr_tax = parseFloat(item.row.tax), pr_tax_val = 0, tax = '';
        if (pr_tax !== null && pr_tax != 0) {
            if(parseFloat(item.row.tax_method) == 0) {
                pr_tax_val = formatDecimal((net_price * parseFloat(pr_tax)) / (100+parseFloat(pr_tax)));
                net_price -= pr_tax_val;
                tax = lang.inclusive;
            } else {
                pr_tax_val = formatDecimal((net_price * parseFloat(pr_tax)) / 100);
                tax = lang.exclusive;
            }
        }
        $('#proModalLabel').html('<a href="'+base_url+'/products/view/'+item_id+'" data-toggle="ajax">'+item.label+'</a>');
        $('#net_price').text(formatMoney(net_price));
        $('#pro_tax').text(formatMoney(pr_tax_val));
        $('#pro_tax_method').text('('+tax+')');
        $('#row_id').val(row_id);
        $('#item_id').val(item_id);
        $('#nPrice').val(unit_price);
        $('#hid').val(unit_price);
        if(w_sale == 'true')
        {
           $('#nWholeSale').val(whole_sale);
        }
        else
        {
           var wh_sale = whole_sales.split(',');
           $('#nWholeSale').val(wh_sale[0]);// mod by mtk
           $('#nWholeSale1').val(wh_sale[1]);
           $('#nWholeSale2').val(wh_sale[2]);
           $('#nWholeSale3').val(wh_sale[3]);
           $('#nWholeSale4').val(wh_sale[4]);
           $('#nWholeSale5').val(wh_sale[5]);
           $('#nWholeSale6').val(wh_sale[6]);
        }
        $('#nQuantity').val(item.row.qty);
        $('#nDiscount').val(ds);
        $('#nComment').val(item.row.comment);
        $('#nFoc').val(item_foc);//mod by mtk for showing foc at 21 March 2019
        $('#proModal').modal({backdrop:'static'}); 
        
    });


    

    $(document).on('change', '#nPrice, #nDiscount, #nWholeSale', function () {
        var item_id = $('#item_id').val();
        var unit_price = parseFloat($('#nPrice').val());
        var www_sale = $('#whsale').val();
        var whole_sale = parseFloat($('#nWholeSale').val());//mod by mtk include line 408
        var net_price = unit_price;
        var item = spositems[item_id];
        var ds = $('#nDiscount').val() ? $('#nDiscount').val() : '0';
        item_discount = formatDecimal(parseFloat(ds));
        if (ds.indexOf("%") !== -1) {
            var pds = ds.split("%");
            if (!isNaN(pds[0])) {
                if(config_item('show_wholesale_price')){
                    item_discount = formatDecimal((whole_sale * parseFloat(pds[0])) / 100); // mod by mtk
                } else {
                    item_discount = formatDecimal((unit_price * parseFloat(pds[0])) / 100);
                }
            }
        }
        net_price -= item_discount;
        var pr_tax = parseFloat(item.row.tax), pr_tax_val = 0;
        if (pr_tax !== null && pr_tax != 0) {
            if(parseFloat(item.row.tax_method) == 0) {
                pr_tax_val = formatDecimal((net_price * parseFloat(pr_tax)) / (100+parseFloat(pr_tax)));
                net_price -= pr_tax_val;
                tax = lang.inclusive;
            } else {
                pr_tax_val = formatDecimal((net_price * parseFloat(pr_tax)) / 100);
                tax = lang.exclusive;
            }
        }

        $('#net_price').text(formatMoney(net_price));
        $('#pro_tax').text(formatMoney(pr_tax_val));
    });



    /* =============================
    Edit Item Method
    ============================= */
     $(document).on('click', '#editItem', function () {
        
        var item_id = $('#item_id').val();
        //var price = parseFloat($('#nPrice').val());
        var price = parseFloat($('#nPrice').val());
        //var whsale = parseFloat($('#nWholeSale').val());//mod by mtk
        if(!is_valid_discount($('#nDiscount').val())) {
            bootbox.alert(lang.unexpected_value);
            return false;
        }
        spositems[item_id].row.qty = parseFloat($('#nQuantity').val()),
        spositems[item_id].row.real_unit_price = price,        
        spositems[item_id].row.comment = $('#nComment').val(),
        spositems[item_id].row.foc = parseFloat($('#nFoc').val()), // mod by mtk for showing foc at 21 March 2019
        spositems[item_id].row.discount = $('#nDiscount').val() ? $('#nDiscount').val() : '0',
        localStorage.setItem('spositems', JSON.stringify(spositems));       
        $('#proModal').modal('hide');
        
        loadItems();
        return;
    });

    /* =============================
    Row quantity change
    ============================= */
    $(document).on("change", '.rquantity', function () {
        var row = $(this).closest('tr');
        if (!is_numeric($(this).val()) || $(this).val() == 0) {
            loadItems();
            bootbox.alert(lang.unexpected_value);
            return false;
        }
        var new_qty = parseFloat($(this).val()),
        item_id = row.attr('data-item-id');
        spositems[item_id].row.qty = new_qty;
        localStorage.setItem('spositems', JSON.stringify(spositems));
        loadItems();
    });

    $('#reset').click(function (e) {
        if (count <= 1) {
            return false;
        }
        bootbox.confirm(lang.r_u_sure, function (result) {
            if (result) {
                if (get('spositems')) {
                    remove('spositems');
                }
                if (get('spos_tax')) {
                    remove('spos_tax');
                }
                if (get('spos_sc')) {
                    remove('spos_sc');                   
                }
                if (get('spos_discount')) {
                    remove('spos_discount');
                }
                if (get('spos_customer')) {
                    remove('spos_customer');
                }

                window.location.href = base_url+"pos";
            }
        });
    });
      
 
    $('#print_order').click(function (e) {

            $('#total_items').val(an - 1);
            $('#total_quantity').val(count - 1);
            
           
             suspend = $('<span></span>');
              if (sid !== 0) {
               suspend.html('<input type="hidden" name="print_order" value="3" />');
            } else {
               suspend.html('<input type="hidden" name="print_order" value="3" />');
            } 
           suspend.appendTo("#hidesuspend");
        e.preventDefault();
        if (count <= 1) 
        {
            bootbox.alert(lang.please_add_product);
        } else 
        {  
          if (Settings.remote_printing == 0) 
            {
                $('#order-data').show();
                if (Settings.print_img == 1) 
                {
                 
                    $('#preo').html('<pre style="background:#FFF;font-size:20px;margin:0;border:0;">' + order_data.info + order_data.items + '</pre>');
                    html2canvas($('#order-data'), {
                        onrendered: function(canvas) {
                            
                            var img = canvas.toDataURL().split(',')[1];
                            $.post(base_url+'pos/receipt_img', {img: img, spos_token: csrf_hash});
                        }
                    });
                }
                else
                {
                    alert("ok");
                    if($('#sus_order_id').val()=="")
                    {
                    var order_count='<h5> Order Number:'+ (+$('#order_id').val()+1)+'</h5>';
                    var oo= (+$('#order_id').val()+1);
                    $('#sus_order_id').val(oo);
                    }
                    else
                    { 
                    //alert($('#sus_order_id').val());
                    var order_count='<h5> Order Number:'+ ($('#sus_order_id').val())+'</h5>';
                    } 
                    suspend = $('<span></span>');
                    suspend.html('<input type="hidden" name="delete_o_id" value="'+($('#sus_order_id').val())+'" />');
                    suspend.appendTo("#hidesuspend");
                    var form = $('#pos-sale-form').serialize();
                    $.post(base_url+'pos/p/order', form);
                }
            }               
          else 
           {  
            var form = $('#pos-sale-form').serialize();
            $.post(base_url+'pos/p/order',form);
            order_id = $('#order_id').val();
            printOrder(order_data);        
           }      
        }
      
     setTimeout(function() { $('#order-data').hide(); }, 500);
        return false;
    });

    $('#print_bill').click(function (e) {
        e.preventDefault();
        if (count <= 1) {
            bootbox.alert(lang.please_add_product);
        } else {
            if (Settings.remote_printing == 0) {
                $('#bill-data').show();
                if (Settings.print_img == 1) {
                    $('#preb').html('<pre style="background:#FFF;font-size:20px;margin:0;border:0;">' + bill_data.info + bill_data.items + "\n" + bill_data.totals + '</pre>');
                    html2canvas($('#bill-data'), {
                        onrendered: function(canvas) {
                            var img = canvas.toDataURL().split(',')[1];
                            $.post(base_url+'pos/receipt_img', {img: img, spos_token: csrf_hash});
                        }
                    });
                } else {
                    var form = $('#pos-sale-form').serialize();
                    printBill(bill_data);
                    //$.post(base_url+'pos/p/bill', form);
                }
            } else {
                printBill(bill_data);
            }
        }
        setTimeout(function() { $('#bill-data').hide(); }, 500);
        return false;
    });

    $("#updateDiscount").click(function() {
        var ds = $('#get_ds').val() ? $('#get_ds').val() : '0';
        var apply_to = $('input[name=apply_to]:checked').val();
        if (ds.length != 0) {
        if (apply_to == 'order') {
            $('#discount_val').val(ds);
            store('spos_discount', ds);
            if(ds.indexOf("%") !== -1) {
                var pds = ds.split("%");

                    order_discount = (total*parseFloat(pds[0]))/100;
                    order_tax = calTax();
                    service_charges = calSc();
                    var g_total = Math.ceil(total)+ Math.ceil(order_tax) -Math.ceil(order_discount) + Math.ceil(service_charges);
                    grand_total = formatMoney(g_total);
                    $("#ds_con").text('('+formatMoney(product_discount)+') '+formatMoney(order_discount));
                    $("#total-payable").text(formatMoney(grand_total));


            } else {

                    order_discount = ds;
                    order_tax = calTax();
                    service_charges = calSc();
                     var g_total = Math.ceil(total)+ Math.ceil(order_tax) -Math.ceil(order_discount) + Math.ceil(service_charges);
                  
                    grand_total = formatMoney(g_total);
                    $("#ds_con").text('('+formatMoney(product_discount)+') '+formatMoney(order_discount));
                    $("#total-payable").text(formatMoney(grand_total));
            }
        } else if (apply_to == 'products') {
            var items = {};
          //  alert("j");
            spositems = JSON.parse(get('spositems'));
            $.each(spositems, function () {
                this.row.discount = ds;
            });
            store('spositems', JSON.stringify(spositems));
        }
        loadItems();
        $('#dsModal').modal('hide');
    }
    });

    $("#add_discount").click(function() {
        var dval = $('#discount_val').val();
        $('#get_ds').val(dval);
        $('#dsModal').modal({backdrop:'static'});
        return false;
    });

    $('#dsModal').on('shown.bs.modal', function () {
        $('#get_ds').focusToEnd();
    });

    $("#updateTax").click(function() {
        var ts = $('#get_ts').val();
        if (ts.length != 0) {
            $('#tax_val').val(ts);
            store('spos_tax', ts);
            if(ts.indexOf("%") !== -1) {
                var pts = ts.split("%");
                if(! isNaN(pts[0])){
                    order_tax = ((total-order_discount)*parseFloat(pts[0]))/100;
                      var g_total = Math.ceil(total)+ Math.ceil(order_tax) -Math.ceil(order_discount) + Math.ceil(service_charges);
                  
                    grand_total = formatMoney(g_total);
                    $("#ts_con").text(formatMoney(order_tax));
                    $("#total-payable").text(formatMoney(grand_total));
                } else {
                    $('#get_ts').val('0'); $('#tax_val').val('0');
                    var g_total = Math.ceil(total)+ Math.ceil(service_charges) - Math.ceil(order_discount);
                    grand_total = formatMoney(g_total);
                    $("#ts_con").text('0');
                    $("#total-payable").text(formatMoney(grand_total));
                }
            } else {
                if(! isNaN(ts) && ts != 0){
                    order_tax = ts;
                    var g_total = Math.ceil(total)+ Math.ceil(order_tax) -Math.ceil(order_discount) + Math.ceil(service_charges);
                  
                    grand_total = formatMoney(g_total);
                    $("#ts_con").text(formatMoney(order_tax));
                    $("#total-payable").text(formatMoney(grand_total));
                } else {
                    $('#get_ts').val('0'); $('#tax_val').val('0');
                    var g_total = (Math.ceil(total) + Math.ceil(service_charges) - Math.ceil(order_discount));
                    grand_total = formatMoney(g_total);
                    $("#ts_con").text('0');
                    $("#total-payable").text(formatMoney(grand_total));
                }
            }
            $('#tsModal').modal('hide');
        }
    });

// mod by mtk at 26 Feb 2019 for service charges 
$("#updateSc").click(function() {
        var sc = $('#get_sc').val();
        if (sc.length != 0) {
            $('#sc_val').val(sc);
            store('spos_sc', sc);
            if(sc.indexOf("%") !== -1) {
                var scs = sc.split("%");
                if(! isNaN(scs[0])){
                    service_charges = ((total-order_discount)*parseFloat(scs[0]))/100;
                     var g_total = Math.ceil(total)+ Math.ceil(order_tax) -Math.ceil(order_discount) + Math.ceil(service_charges);
                  
                    grand_total = formatMoney(g_total);

                    $("#sc_con").text(formatMoney(service_charges));
                    $("#total-payable").text(formatMoney(grand_total));
                } else {
                    $('#get_sc').val('0'); $('#sc_val').val('0');
                    var g_total = (Math.ceil(total) + Math.ceil(order_tax) - Math.ceil(order_discount));
                    grand_total = formatMoney(g_total);
                    $("#sc_con").text('0');
                    $("#total-payable").text(formatMoney(grand_total));
                }
            } else {
                if(! isNaN(sc) && sc != 0){
                    service_charges = sc;
                    var g_total = (Math.ceil(total)+ Math.ceil(sc) + Math.ceil(order_tax) - Math.ceil(order_discount));
                    grand_total = formatMoney(g_total);
                    $("#sc_con").text(formatMoney(service_charges));
                    $("#total-payable").text(formatMoney(grand_total));
                } else {
                    $('#get_sc').val('0'); $('#sc_val').val('0');
                    var g_total = (Math.ceil(total) + Math.ceil(order_tax) - Math.ceil(order_discount));
                    grand_total = formatMoney(g_total);
                    $("#sc_con").text('0');
                    $("#total-payable").text(formatMoney(grand_total));
                }
            }
            $('#scModal').modal('hide');
        }
    });
// end mod by mtk

    $("#add_tax").click(function() {
        var tval = $('#tax_val').val();
        $('#get_ts').val(tval);
        $('#tsModal').modal({backdrop:'static'});
        return false;
    });
    // mod by mtk at 26 Feb 2019 for service charges
    $("#add_sc").click(function() {
        var scval = $('#sc_val').val();
        $('#get_sc').val(scval);
        $('#scModal').modal({backdrop:'static'});
        return false;
    });
    // end mod by mtk
    $('#tsModal').on('shown.bs.modal', function () {
        $('#get_ts').focusToEnd();
    });

    // mod by mtk at 26 Feb 2019 for service charges
    $('#scModal').on('shown.bs.modal', function () {
        $('#get_sc').focusToEnd();
    });
    // end mod by mtk

    $('#noteModal').on('shown.bs.modal', function () {
        $('#snote').focusToEnd();
    });

    $(document).on('click', '.product', function (e) {
        code = $(this).val();
        $.ajax({
            type: "get",
            url: base_url+'pos/get_product/'+code,
            dataType: "json",
            success: function (data) {
                if (data !== null) {
                    add_invoice_item(data);
                } else {
                    bootbox.alert(lang.no_match_found);
                }
            }
        });
    });

    $(document).on('click', '.category', function () {
        var cid = $(this).attr('id');
        if (cat_id != cid) {
            cat_id = cid;
            $.ajax({
                type: "get",
                url: base_url+'pos/ajaxproducts',
                data: {category_id: cat_id, tcp: 1},
                dataType: "json",
                success: function (data) {
                    p_page = 'n';
                    // $('#categories-list').addClass('control-sidebar-open');
                    //ocat_id = cat_id;
                    tcp = data.tcp;
                    $('.items').html(data.products);
                    $('.category').removeClass('active');
                    $('#' + cat_id).addClass('active');
                    nav_pointer();
                }
            });
        }
        return false;
    });
    $('#category-' + cat_id).addClass('active');

    $('#next').click(function () {
        if (p_page == 'n') { p_page = 0; }
        p_page += pro_limit;
        if (tcp >= pro_limit && p_page < tcp) {
            $.ajax({
                type: "get",
                url: base_url+'pos/ajaxproducts',
                data: {category_id: cat_id, per_page: p_page},
                dataType: "html",
                success: function (data) {
                    $('.items').html(data);
                    nav_pointer();
                }
            });
        } else {
            p_page -= pro_limit;
        }
    });

    $('#previous').click(function () {
        if (p_page == 'n') { p_page = 0; }
        if (p_page != 0) {
            p_page -= pro_limit;
            if (p_page == 0) { p_page = 'n'; }
            $.ajax({
                type: "get",
                url: base_url+'pos/ajaxproducts',
                data: {category_id: cat_id, per_page: p_page},
                dataType: "html",
                success: function (data) {
                    $('.items').html(data);
                    nav_pointer();
                }
            });
        }
    });

    $("#add_item").autocomplete({
        source: base_url+'pos/suggestions',
        minLength: 1,
        autoFocus: false,
        delay: 200,
        response: function (event, ui) {
            if ($(this).val().length >= 16 && ui.content[0].id == 0) {
                bootbox.alert(lang.no_match_found, function () {
                    $('#add_item').focus();
                });
                $(this).val('');
            }
            else if (ui.content.length == 1 && ui.content[0].id != 0) {
                ui.item = ui.content[0];
                $(this).data('ui-autocomplete')._trigger('select', 'autocompleteselect', ui);
                $(this).autocomplete('close');
            }
            else if (ui.content.length == 1 && ui.content[0].id == 0) {
                bootbox.alert(lang.no_match_found, function () {
                    $('#add_item').focus();
                });
                $(this).val('');
            }
        },
        select: function (event, ui) {
            event.preventDefault();
            if (ui.item.id !== 0) {
                var row = add_invoice_item(ui.item);
                if (row)
                    $(this).val('');
            } else {
                bootbox.alert(lang.no_match_found);
            }
        }
    });

    $('#add_item').bind('keypress', function (e) {
        if (e.keyCode == 13) {
            e.preventDefault();
            $(this).autocomplete("search");
        }
    });

    $('#add_item').focus();
    $('#gccard_no').inputmask("9999 9999 9999 9999");
    $('#gift_card_no').inputmask("9999 9999 9999 9999");
    $("#gcexpiry").inputmask("yyyy-mm-dd", {"placeholder": "yyyy-mm-dd"});
    $('#genNo').click(function () {
        var no = generateCardNo();
        $(this).parent().parent('.input-group').children('input').val(no);
        return false;
    });

    $(document).on('click', '#sellGiftCard', function (e) {
        if (count == 1) {
            spositems = {};
        }
        $('#gcModal').modal({backdrop:'static'});
     });

    $(document).on('click', '#addGiftCard', function (e) {
        var mid = 0,
        gccode = $('#gccard_no').val(),
        gcname = $('#gcname').val(),
        gcvalue = $('#gcvalue').val(),
        gcprice = parseFloat($('#gcprice').val());
        gcexpiry = $('#gcexpiry').val();
        if(gccode == '' || gcvalue == '' || gcprice == '' || gcvalue == 0 || gcprice == 0) {
            $('#gcerror').text(lang.file_required_fields);
            $('.gcerror-con').show();
            return false;
        }
        var gc_data = new Array();
        gc_data[0] = gccode;
        gc_data[1] = gcvalue;
        gc_data[2] = gcexpiry;

        $.ajax({
            type: 'get',
            url: base_url+'gift_cards/sell_gift_card',
            dataType: "json",
            data: { gcdata: gc_data },
            success: function (data) {
                if(data.result === 'success') {
                  //  alert("klk");
                    spositems[mid] = {"id": mid, "item_id": mid, "label": gcname + ' (' + gccode + ')', "row": {"id": mid, "code": gccode, "name": gcname, "quantity": 1, "price": gcprice, "real_unit_price": gcprice, "tax": 0, "qty": 1, "type": "manual", "discount": "0", "comment": ""}};
                    store('spositems', JSON.stringify(spositems));
                    loadItems();
                    $('#gcModal').modal('hide');
                    $('#gccard_no').val('');
                    $('#gcvalue').val('');
                    $('#gcprice').val('');
                } else {
                    $('#gcerror').text(data.message);
                    $('.gcerror-con').show();
                }
            }
        });
    });

    // $('#opModal').bind().on('click', 'a', function(){
    //     var pg = $.url($(this).attr("href")).param("per_page");
    //     $.get( base_url+'pos/ob_page&per_page='+pg, function( data ) {
    //         $( ".html_con" ).html( data.pd );
    //         $( ".page_con" ).html( data.page );
    //     }, "json");

    //     return false;
    // });
        var pwacc = false;
        
        $(document).on('click', '.posdel', function () {
            var row = $(this).closest('tr');
            var item_id = row.attr('data-item-id');

            var today = new Date();
            var date = today.getDate()+" "+(today.getMonth()+1)+" "+today.getFullYear();
            var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();

            var dateTime = date+' '+time;
            var item_name=spositems[item_id].row.name;
            var item_code=spositems[item_id].row.code;
            var cancel_order_no=spositems[item_id].row.order_no;
            var order=spositems[item_id].row.ordered;
            var item_foc = spositems[item_id].row.foc;
            var pop=$('#popup').val();
            var tracking = $('#tracking').val();
       
            suspend = $('<span></span>');
            suspend.html('<input type="hidden" name="cancel_order_no" value="'+cancel_order_no+'" /><input type="hidden" name="item_id" value="'+item_id+'" />');
            suspend.appendTo("#hidesuspend");
            if(protect_delete == 1) {
              if(pop=="true" && tracking=="true"){
                if(order > 0 || item_foc > 0)
                {
                    var boxd = bootbox.dialog({
                    title: lang.enter_pin_code,
                    closeButton: true,
                    message: '<input id="pos_pin" name="pos_pin" type="password" placeholder="Pin Code" class="form-control kb-pad"><br><input id="pinreason" name="pinreason" type="text" placeholder="Enter Reason" class="form-control kb-pad"><br><input id="pinres_person" name="pinres_person" type="text" value="'+username+'" class="form-control kb-pad"> ',
                    buttons: {
                        danger: {
                          label: lang.close,
                          className: "btn-default pull-left",
                          callback: function() { }
                        },
                        success: {
                            label: "<i class='fa fa-tick'></i> "+lang.delete,
                            className: "btn-warning verify_pin",
                            callback: function () {
                                var pos_pin = md5($('#pos_pin').val());
                                var reason = $('#pinreason').val();
                                var res_person = $('#pinres_person').val();
                                if(pos_pin == Settings.pin_code) {
                                    
                                    delete spositems[item_id];
                                    row.remove();
                                    if(spositems.hasOwnProperty(item_id)) { } else {
                                        localStorage.setItem('spositems', JSON.stringify(spositems));
                                        loadItems();

                                    var del_id = item_id;
                                    var del_code = item_code;
                                    var del_name = item_name;
                                    var c_no = cancel_order_no;
                                    var today = new Date();
                                    var date = today.getDate()+" "+(today.getMonth()+1)+" "+today.getFullYear();
                                    var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
                                    var dateTime = date+' '+time;
                                    if (!reason || reason == '') {
                                    bootbox.alert(lang.please_enter_reason);
                                    return false;
                                    } else {
                                    //$('#delModal').modal('hide');
                                    suspend = $('<span></span>');
                                    suspend.html('<input type="hidden" name="cancel_order_no" value="'+c_no+'" /><input type="hidden" name="item_id" value="'+del_id+'" /><input type="hidden" name="res_person" value="' + res_person + '" /><input type="hidden" name="reason" value="' + reason + '" /><input type="hidden" name="del_id" value="' + del_id + '" /><input type="hidden" name="del_code" value="' + del_code + '" /><input type="hidden" name="del_name" value="' + del_name + '" />');
                                    suspend.appendTo("#hidesuspend");
 
                                    $("#order_spann").empty();
                                    $("#order-table1").empty();
                                    var name = $('#select2-spos_customer-container').text();
                                    var user = username;

        
                                    var oprTrr = '<tr><th style="text-align:center;">'+Settings.site_name+'</th></tr>';
                                    oprTrr += '<tr><th style="text-align:center;">Order</th></tr>';
                                    oprTrr += '<tr><td>Customer:'+name+'</td></tr>';
                                    oprTrr += '<tr><td>Order Number:'+cancel_order_no+'</td></tr>';
                                    oprTrr += '<tr><td>Sale Person:'+user+'</td></tr>';
                                    //oprTrr += user;
                                    oprTrr += '<tr><td>Date:'+dateTime+'</td></tr>';
                                    oprTrr += '<tr class="bb row_' + del_id + '" data-item-id="' + del_id+'"><td>'+ del_name + ' (' + del_code + ')';
                                    oprTrr += '<td></td><td>Cancelled</td></tr>';
       
                                    $("#order-table1").append(oprTrr);
                                    if (Settings.remote_printing == 0) {
                                            $('#total_items').val(an - 1);
                                            $('#total_quantity').val(count - 1);
                                            var form = $('#pos-sale-form').serialize();
                                            $.post(base_url+'pos/p/order', form);
                                            //alert('php');
                                        }
                                    else{

                                        Popup($('#order_tbl1').html());
                                        }
          
                                if (!reason || reason == '') {
                                bootbox.alert(lang.type_reference_note);
                                return false;
                                } else {
                                suspend = $('<span></span>');
                                if (sid !== 0) {
                                suspend.html('<input type="hidden" name="delete_id" value="'+sid+'" /><input type="hidden" name="del_id" value="' + del_id + '" />');
                                } else {
                                suspend.html('<input type="hidden" name="del_id" value="' + del_id + '" />');
                                //suspend.html('<input type="hidden" name="suspend" value="yes" /><input type="hidden" name="suspend_note" value="' + ref + '" />');
                                }
                                    suspend.appendTo("#hidesuspend");
           
                                 }  

                                    if(spositems.hasOwnProperty(del_id)) { 
               
                                    } else {
                                        localStorage.setItem('spositems', JSON.stringify(spositems));
                                        loadItems(); 
            
                                        }  
           
                                }
                                    return true;

                                    }
                                } else {
                                    bootbox.alert(lang.wrong_pin);
                                }
                            }
                        }
                    }
                });

            boxd.on("shown.bs.modal", function() {
                if (Settings.display_kb == 1) { display_keyboards(); }
                $( "#pos_pin" ).focus().keypress(function(e) {
                    if (e.keyCode == 13) {
                        e.preventDefault();
                        $('.verify_pin').trigger('click');
                        return false;
                    }
                });
            });
           }
           else
           {
            var boxd = bootbox.dialog({
                    title: lang.enter_pin_code,
                    closeButton: true,
                    message: '<input id="pos_pin" name="pos_pin" type="password" placeholder="Pin Code" class="form-control kb-pad">',
                    buttons: {
                        danger: {
                          label: lang.close,
                          className: "btn-default pull-left",
                          callback: function() { }
                        },
                        success: {
                            label: "<i class='fa fa-tick'></i> "+lang.delete,
                            className: "btn-warning verify_pin",
                            callback: function () {
                                var pos_pin = md5($('#pos_pin').val());
                                if(pos_pin == Settings.pin_code) {
                                    delete spositems[item_id];
                                    row.remove();
                                    if(spositems.hasOwnProperty(item_id)) { } else {
                                        localStorage.setItem('spositems', JSON.stringify(spositems));
                                        loadItems();
                                    }
                                } else {
                                    bootbox.alert(lang.wrong_pin);
                                }
                            }
                        }
                    }
                });

            boxd.on("shown.bs.modal", function() {
                if (Settings.display_kb == 1) { display_keyboards(); }
                $( "#pos_pin" ).focus().keypress(function(e) {
                    if (e.keyCode == 13) {
                        e.preventDefault();
                        $('.verify_pin').trigger('click');
                        return false;
                    }
                });
            });
           }
        }
        else
        {
            var boxd = bootbox.dialog({
                    title: lang.enter_pin_code,
                    closeButton: true,
                    message: '<input id="pos_pin" name="pos_pin" type="password" placeholder="Pin Code" class="form-control kb-pad">',
                    buttons: {
                        danger: {
                          label: lang.close,
                          className: "btn-default pull-left",
                          callback: function() { }
                        },
                        success: {
                            label: "<i class='fa fa-tick'></i> "+lang.delete,
                            className: "btn-warning verify_pin",
                            callback: function () {
                                var pos_pin = md5($('#pos_pin').val());
                                if(pos_pin == Settings.pin_code) {
                                    delete spositems[item_id];
                                    row.remove();
                                    if(spositems.hasOwnProperty(item_id)) { } else {
                                        localStorage.setItem('spositems', JSON.stringify(spositems));
                                        loadItems();
                                    }
                                } else {
                                    bootbox.alert(lang.wrong_pin);
                                }
                            }
                        }
                    }
                });

            boxd.on("shown.bs.modal", function() {
                if (Settings.display_kb == 1) { display_keyboards(); }
                $( "#pos_pin" ).focus().keypress(function(e) {
                    if (e.keyCode == 13) {
                        e.preventDefault();
                        $('.verify_pin').trigger('click');
                        return false;
                    }
                });
            });
        }

        } else {

           var pop=$('#popup').val();
           var tracking = $('#tracking').val();
           

           if(pop=="true" && tracking=="true")
           {
            if(order > 0 || item_foc > 0)
            {

            }
            else
            {
              delete spositems[item_id];
              row.remove();
            }

           }
           else
           {
            delete spositems[item_id];
            row.remove();
           }
           

            if(pop=="true" && tracking=="true"){
            if(order > 0 || item_foc > 0)
            {
                $('#delModal').modal({backdrop:'static'});
                $('#del_id').val(item_id);
                $('#del_code').val(item_code);
                $('#del_name').val(item_name);
                $('#cancel_order_no').val(cancel_order_no);
             }
            }
           
            if(spositems.hasOwnProperty(item_id)) { 
               
            } else {
                localStorage.setItem('spositems', JSON.stringify(spositems));
                loadItems();            
            }
        }
        return false;
    });


 $(document).on('click', '#del_items', function () {

      var del_id = $('#del_id').val();
      delete spositems[del_id];

      var reason = $('#reason').val();
      var res_person = $('#res_person').val();

      var del_code = $('#del_code').val();
      var del_name = $('#del_name').val();
      var cancel_order_no = $('#cancel_order_no').val();
      var today = new Date();
      var date = today.getDate()+" "+(today.getMonth()+1)+" "+today.getFullYear();
      var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
      var dateTime = date+' '+time;
      if (!reason || reason == '') {
         bootbox.alert(lang.please_enter_reason);
            return false;
        } else {
            $('#delModal').modal('hide');
            suspend = $('<span></span>');
            suspend.html('<input type="hidden" name="cancel_order_no" value="'+cancel_order_no+'" /><input type="hidden" name="item_id" value="'+del_id+'" /><input type="hidden" name="res_person" value="' + res_person + '" /><input type="hidden" name="reason" value="' + reason + '" /><input type="hidden" name="del_id" value="' + del_id + '" /><input type="hidden" name="del_code" value="' + del_code + '" /><input type="hidden" name="del_name" value="' + del_name + '" />');
            suspend.appendTo("#hidesuspend");
 
            $("#order_spann").empty();
            $("#order-table1").empty();
            var name = $('#select2-spos_customer-container').text();
            var user = username;

        
        var oprTrr = '<tr><th style="text-align:center;">'+Settings.site_name+'</th></tr>';
        oprTrr += '<tr><th style="text-align:center;">Order</th></tr>';
        oprTrr += '<tr><td>Customer:'+name+'</td></tr>';

        oprTrr += '<tr><td>Order Number:'+cancel_order_no+'</td></tr>';
        oprTrr += '<tr><td>Sale Person:'+user+'</td></tr>';
        oprTrr += '<tr><td>Date:'+dateTime+'</td></tr>';
        oprTrr += '<tr class="bb row_' + del_id + '" data-item-id="' + del_id+'"><td>'+ del_name + ' (' + del_code + ')';
        oprTrr += '<td></td><td>Cancelled</td></tr>';
       
        $("#order-table1").append(oprTrr);
        if (Settings.remote_printing == 0) {
            $('#total_items').val(an - 1);
            $('#total_quantity').val(count - 1);
            var form = $('#pos-sale-form').serialize();
            $.post(base_url+'pos/p/order', form);
            //alert('php');
        }
        else{

            Popup($('#order_tbl1').html());
        }
          
        if (!reason || reason == '') {
            bootbox.alert(lang.type_reference_note);
            return false;
        } else {
            suspend = $('<span></span>');
            if (sid !== 0) {
                suspend.html('<input type="hidden" name="delete_id" value="'+sid+'" /><input type="hidden" name="res_person" value="' + res_person + '" /><input type="hidden" name="reason" value="' + reason + '" /><input type="hidden" name="del_id" value="' + del_id + '" />');
            } else {
                suspend.html('<input type="hidden" name="res_person" value="' + res_person + '" /><input type="hidden" name="reason" value="' + reason + '" /><input type="hidden" name="del_id" value="' + del_id + '" />');
                //suspend.html('<input type="hidden" name="suspend" value="yes" /><input type="hidden" name="suspend_note" value="' + ref + '" />');
            }
            suspend.appendTo("#hidesuspend");
           
          }  

          if(spositems.hasOwnProperty(del_id)) { 
               
            } else {
                localStorage.setItem('spositems', JSON.stringify(spositems));
                loadItems(); 
            
            }  
           
        }
        return true;

    });



    $('#suspend').click(function () {
        if (count <= 1) {
            bootbox.alert(lang.please_add_product);
            return false;
        } else {
            $('#susModal').modal({backdrop:'static'});
        }
    });

    $('#del_close').click(function(){
         $('#delModal').modal({backdrop:'static'});
    });
    
   var capacity=0;
    $('#suspend_sale').click(function () {
        ref = $('#reference_note').val();
    
        if (!ref || ref == '') {
            bootbox.alert(lang.type_reference_note);
            return false;
        } else {
            suspend = $('<span></span>');
            
            if (sid !== 0) {
               suspend.html('<input type="hidden" name="capacity" value="'+capacity+'" /><input type="hidden" name="delete_id" value="'+sid+'" /><input type="hidden" name="suspend" value="yes" /><input type="hidden" name="suspend_note" value="' + ref + '" />');
            } else {
               suspend.html('<input type="hidden" name="suspend" value="yes" /><input type="hidden" name="suspend_note" value="' + ref + '" />');
            }
          
            suspend.appendTo("#hidesuspend");
            $('#pos-sale-form').submit();
        }
    });
  
    $('#payment').click(function () {
        //alert(capacity);
        if (count <= 1) {
            bootbox.alert(lang.please_add_product);
            return false;
        } else {
            if (sid) {
               //  capacity.html('<input type="hidden" name="capacity" value="2" />');
            suspend = $('<span></span>');
            suspend.html('<input type="hidden" name="delete_id" value="'+sid+'" />');
            suspend.appendTo("#hidesuspend");
            }
gtotal = formatDecimal(Math.ceil(total) - Math.ceil(order_discount) + Math.ceil(order_tax) + Math.ceil(service_charges));
          
            //gtotal = formatDecimal(total - order_discount + order_tax + service_charges);
            if(Settings.rounding != 0) {
if(Settings.rounding==1){
                     div=50;
                     // alert("div is");
                     // alert(div);
            round_total=roundNumberr(gtotal,div);
                          
                }
                if(Settings.rounding==2)
                {
                    div=50;
              //      alert("LLL");
                round_total=roundNumberr1(gtotal,div);
               // alert(round_total);
                }
                if(Settings.rounding==3){
                    div=50;
                    round_total=roundNumberr2(gtotal,div);
                }

               // alert(round_total);
              //  round_total = roundNumber(gtotal, parseInt(Settings.rounding));
                var rounding = formatDecimal(round_total - gtotal);
                $('#twt').text(formatMoney(round_total) + ' (' + formatMoney(rounding) + ')');
                $('#quick-payable').text(round_total);
            } else {
                $('#twt').text(formatMoney(gtotal));
                $('#quick-payable').text(gtotal);
            }
            $('#item_count').text((an-1)+' ('+(count-1)+')');
            $("#order_quantity").val(count-1);
            $("#order_items").val(an-1);
            $('#balance').text('0.00');
            $('#payModal').modal({backdrop:'static'});

        }
    });
    $('#payModal').on('shown.bs.modal', function (e) {
        $('#amount').focus().val(0);
        $('#quick-payable').click();
    });
    $('#payModal').on('hidden.bs.modal', function (e) {
        $('#amount').val('').change();
    });

    $('#amount').change(function(e) {
        var total_paying = $(".amount").val();
        $('#total_paying').text(formatMoney(total_paying));
        if(Settings.rounding != 0) {
            $('#balance').text(formatMoney(total_paying - round_total));
            $('#balance_val').val(formatDecimal(total_paying - round_total));
            total_paid = total_paying;
            grand_total = round_total;
        } else {
            $('#balance').text(formatMoney(total_paying - gtotal));
            $('#balance_val').val(formatDecimal(total_paying - gtotal));
            total_paid = total_paying;
            grand_total = gtotal;
        }
    });

    $('#add-customer').click(function () {
        $('#customerModal').modal({backdrop:'static'});
    });

     $('#add-serial').click(function () {
        $('#delModal').modal({backdrop:'static'});
    });

    $('#payModal').on('change', '#paid_by', function () {
        $('#clear-cash-notes').click();
        $('#amount').val(grand_total);
        var p_val = $(this).val();
        $('#paid_by_val').val(p_val);
        var gtotal = formatDecimal(total - order_discount + order_tax);
        if(Settings.rounding != 0) {
            var rounded_total = formatDecimal(roundNumber(gtotal, parseInt(Settings.rounding)));
        } else {
            var rounded_total = formatDecimal(gtotal);
        }

        $('#rpaidby').val(p_val);
        if (p_val == 'gift_card') {
            $('.gc').slideDown();
            $('.ngc').slideUp('fast');
            setTimeout(function(){ $('#gift_card_no').focus(); }, 10);
            $('#amount').attr('readonly', true);
        } else {
            $('.ngc').slideDown();
            $('.gc').slideUp('fast');
            $('#gc_details').html('');
            $('#amount').attr('readonly', false);
        }
        if (p_val == 'cash' || p_val == 'other') {
            $('.pcash').slideDown();
            $('.pcheque').slideUp('fast');
            $('.pcc').slideUp('fast');
            setTimeout(function(){ $('#amount').focus(); }, 10);
        } else if (p_val == 'CC' || p_val == 'stripe') {
            $('.pcc').slideDown();
            $('.pcheque').slideUp('fast');
            $('.pcash').slideUp('fast');
            $('#amount').val(rounded_total);
            setTimeout(function(){ $('#swipe').val('').focus(); }, 10);
        } else if (p_val == 'cheque') {
            $('.pcheque').slideDown();
            $('.pcc').slideUp('fast');
            $('.pcash').slideUp('fast');
            $('#amount').val(rounded_total);
            setTimeout(function(){ $('#cheque_no').focus(); }, 10);
        } else {
            $('.pcheque').hide();
            $('.pcc').hide();
            $('.pcash').hide();
        }
    });

    $(document).on('change', '.gift_card_no', function () {
        var cn = $(this).val() ? $(this).val() : '';
        if (cn != '') {
            $.ajax({
                type: "get", async: false,
                url: base_url + "pos/validate_gift_card/" + cn,
                dataType: "json",
                success: function (data) {
                    if (data === false || data.balance < 0) {
                        $('#gift_card_no').parent('.form-group').addClass('has-error');
                        bootbox.alert(lang.incorrect_gift_card);
                    } else {
                        $('#gc_details').html(lang.card_no+': ' + data.card_no + '<br>'+lang.value+': ' + data.value + ' - '+lang.balance+': ' + data.balance);
                        $('#gift_card_no').parent('.form-group').removeClass('has-error');
                        var paying = (gtotal > data.balance) ? data.balance : gtotal;
                        $('#amount_val').val(paying);
                        $('#amount').val(paying);
                    }
                }
            });
        }
        return false;
    });

    $(document).on('click', '#quick-payable', function () {
        $('#clear-cash-notes').click();
        $(this).append('<span class="badge">1</span>');
        $('#amount').val(grand_total);
    });

    $(document).on('click', '.quick-cash', function () {
        if ($('#quick-payable').find('span.badge').length) {
            $('#clear-cash-notes').click();
        }
        var $quick_cash = $(this);
        var amt = $quick_cash.contents().filter(function () {
            return this.nodeType == 3;
        }).text();
        var th = Settings.thousands_sep == 0 ? '' : Settings.thousands_sep;
        var $pi = $('#amount');
        amt = formatDecimal(amt.split(th).join("")) * 1 + $pi.val() * 1;
        $pi.val(formatDecimal(amt)).change().focus();
        var note_count = $quick_cash.find('span');
        if (note_count.length == 0) {
            $quick_cash.append('<span class="badge">1</span>');
        } else {
            note_count.text(parseInt(note_count.text()) + 1);
        }
    });

    $(document).on('click', '#clear-cash-notes', function () {
        $('.quick-cash').find('.badge').remove();
        $('#amount').val('').change().focus();
    });

    $('#payModal').on('change', '#amount, #paid_by', function (e) {
        $('#amount_val').val($('#amount').val());
    });
    $('#payModal').on('blur', '#amount', function (e) {
        $('#amount_val').val($('#amount').val());
    });
    $('#payModal').on('select2-close', '#paid_by', function (e) {
        $('#paid_by_val').val($(this).val());
    });
    $('#payModal').on('change', '#pcc_no', function (e) {
        $('#cc_no_val').val($(this).val());
    });
    $('#payModal').on('change', '#pcc_holder', function (e) {
        $('#cc_holder_val').val($(this).val());
    });
    $('#payModal').on('change', '#gift_card_no', function (e) {
        $('#paying_gift_card_no_val').val($(this).val());
    });
    $('#payModal').on('change', '#pcc_month', function (e) {
        $('#cc_month_val').val($(this).val());
    });
    $('#payModal').on('change', '#pcc_year', function (e) {
        $('#cc_year_val').val($(this).val());
    });
    $('#payModal').on('change', '#pcc_type', function (e) {
        $('#cc_type_val').val($(this).val());
    });
    $('#payModal').on('change', '#pcc_cvv2', function (e) {
        $('#cc_cvv2_val').val($(this).val());
    });
    $('#payModal').on('change', '#cheque_no', function (e) {
        $('#cheque_no_val').val($(this).val());
    });
    $('#payModal').on('change', '#payment_note', function (e) {
        $('#payment_note_val').val($(this).val());
    });
    $('#payModal').on('change', '#note', function (e) {
        var n = $(this).val();
        store('spos_note', n);
        $('#spos_note').val(n);
    });
    if(spos_note = get('spos_note')) {
        $('#note').val(spos_note);
        $('#snote').val(spos_note);
    }
    $('#spos_customer').change( function (e) {
        store('spos_customer', $(this).val());
    });
    if(spos_customer = get('spos_customer')) {
        $('#spos_customer').select2('val', spos_customer);
    }

    $('.treeview').hover(function(e) {
        var wh = $(document).height();
        var top = $(this).offset().top;
        var menu = $(this).find('.treeview-menu');
        var menuh = menu.height() + 44;
        if ((wh-top) < menuh) {
            $(this).find('a').children('span').addClass('popup')
            menu.addClass('popup');
        } else {
            $(this).find('a').children('span').removeClass('popup')
            menu.removeClass('popup');
        }
    });

    $('body').click(function(e) {
        if (!$(e.target).hasClass('sidebar-icon') && !$(e.target).hasClass('sb') && $('#categories-list').hasClass('control-sidebar-open')) {
            $('#categories-list').removeClass('control-sidebar-open');
        }
    });

    $('#submit-sale').click(function() {
        
          capacity=$('#capacity1').val();
         
        $('#total_items').val(an - 1);
        $('#total_quantity').val(count - 1);
        $('#capacity').val(capacity);
        $('#submit').click();
    });

    var hold_ref = $('#hold_ref').val();
    $('#hold_ref').change(function () {
        
        hold_ref = $(this).val();
        $('#reference_note').val(hold_ref);

    });
    $('#reference_note').change(function () {
        hold_ref = $(this).val();
        $('#hold_ref').val(hold_ref);
    });

    $('#suspend_sale').click(function() {
      
         capacity=$('#capacity1').val();
      

     /* if(config_item('capacity')){
         if(capacity==0){
         alert("Please enter positive integer");
         return false;
         
       } 
    }
    else{
        alert("OK COM");
    }
    //} //alert(capacity);*/
        if($('#reference_note').val()) {
           $('#hold_ref').val($('#reference_note').val());
            $('#capacity').val(capacity);
            $('#total_items').val(an - 1);
        
            $('#total_quantity').val(count - 1);
            $('#submit').click();
        }
        return false;
    });

    $("#customer-form").on("submit", function(e) {
        e.preventDefault();
        $.ajax({
            type: "post",
            url: base_url+'customers/add',
            data: $( this ).serialize(),
            dataType: "json",
            success: function(res) {
                if(res.status == 'success') {
                    $('#spos_customer').append($("<option></option>").attr("value",res.id).text(res.val));
                    $('#spos_customer').select2('val', res.id);
                    $('#customerModal').modal('hide');
                } else {
                    $('#c-alert').html(res.msg);
                    $('#c-alert').show();
                }
            },
            error: function(){
                bootbox.alert(lang.customer_request_failed);
                return false;
            }
        });
        return false;
    });

    $('#customerModal').on('hidden.bs.modal', function (e) {
        $('#c-alert').hide();
        $('#cname').val('');
        $('#cemail').val('');
        $('#cphone').val('');
        $('#cf1').val('');
        $('#cf2').val('');
    });

});

function display_keyboards() {
    if( ! jQuery.browser.mobile) {
        $('.kb-text').keyboard({
            autoAccept: true,
            alwaysOpen: false,
            openOn: 'focus',
            usePreview: false,
            // layout: 'qwerty',
            layout: 'custom',
            display: {
                'bksp': "\u2190",
                'accept': 'return',
                'default': 'ABC',
                'meta1': '123',
                'meta2': '#+='
            },
            customLayout: {
                'default': [
                    'q w e r t y u i o p {bksp}',
                    'a s d f g h j k l {enter}',
                    '{s} z x c v b n m , . {s}',
                    '{meta1} {space} {cancel} {accept}'
                ],
                'shift': [
                    'Q W E R T Y U I O P {bksp}',
                    'A S D F G H J K L {enter}',
                    '{s} Z X C V B N M / ? {s}',
                    '{meta1} {space} {meta1} {accept}'
                ],
                'meta1': [
                    '1 2 3 4 5 6 7 8 9 0 {bksp}',
                    '- / : ; ( ) \u20ac & @ {enter}',
                    '{meta2} . , ? ! \' " {meta2}',
                    '{default} {space} {default} {accept}'
                ],
                'meta2': [
                    '[ ] { } # % ^ * + = {bksp}',
                    '_ \\ | &lt; &gt; $ \u00a3 \u00a5 {enter}',
                    '{meta1} ~ . , ? ! \' " {meta1}',
                    '{default} {space} {default} {accept}'
                ]}
        });

        $('.kb-pad').keyboard({
            restrictInput: true,
            preventPaste: true,
            autoAccept: true,
            alwaysOpen: false,
            openOn: 'click',
            usePreview: false,
            layout: 'costom',
            display: {
                'b': '\u2190:Backspace'
            },
            customLayout: {
                'default': [
                    '1 2 3 {b}',
                    '4 5 6 . {clear}',
                    '7 8 9 0 %',
                    '{accept} {cancel}'
                ]
            }
        });
    }
}

function calTax() {
    var ts = get('spos_tax') ? get('spos_tax') : $('#tax_val').val();
    if(ts.indexOf("%") !== -1) {
        var pts = ts.split("%");
        order_tax = ((total-order_discount)*parseFloat(pts[0]))/100;
        $("#ts_con").text(formatMoney(order_tax));
    } else {
        order_tax = parseFloat(ts);
        $("#ts_con").text(formatMoney(order_tax));
    }
    return order_tax;
}

function calSc() {
    var sc = get('spos_sc') ? get('spos_sc') : $('#sc_val').val();
    if(sc.indexOf("%") !== -1) {
        var scs = sc.split("%");
        service_charges = ((total-order_discount)*parseFloat(scs[0]))/100;
        $("#sc_con").text(formatMoney(service_charges));
    } else {
        service_charges = parseFloat(sc);
        $("#sc_con").text(formatMoney(service_charges));
    }
    return service_charges;
}

function nav_pointer() {
    var pp = p_page == 'n' ? 0 : p_page;
    (pp == 0) ? $('#previous').attr('disabled', true) : $('#previous').attr('disabled', false);
    ((pp+pro_limit) > tcp) ? $('#next').attr('disabled', true) : $('#next').attr('disabled', false);
}

function Popup(data) {
    var mywindow = window.open('', 'spos_print', 'height=500,width=300');
    mywindow.document.write('<!DOCTYPE html><html><head><title>Print</title>');
    mywindow.document.write('<link rel="stylesheet" href="'+assets+'bootstrap/css/bootstrap.min.css" type="text/css" />');
    mywindow.document.write('<style>a {color: #333;} #totaltbl td, #totaltbl th { vertical-align: middle; }</style>');
    mywindow.document.write('</head><body >');
    mywindow.document.write(data);
    mywindow.document.write('</body></html>');
    mywindow.print();
    mywindow.close();
    return true;
}

$(document).ready(function($) {
    window.setTimeout(function() {
        $('.alerts').slideUp();
    }, 15000);
    $('.alerts').on('click',function(e) {
        $(this).slideUp();
    });
    $('#list-table-div').slimScroll({start: 'bottom'});
    $('#category-sidebar-menu').slimScroll({width: '100%'});
    $('.items').slimScroll({});
});

function posScreen() {
    var wh = $(window).height(),
    total_dh = $('#totaldiv').height(),
    buttons_dh = $('.botbuttons').height(),
    left_top_dh = $('#lefttop').outerHeight();
    var items_dh = wh-120, list_table_dh = wh-185-left_top_dh-total_dh-buttons_dh;
    $('#right-col').height(wh-100);
    $('.items').height((items_dh > 400 ? items_dh : 400));
    $('#list-table-div').height(list_table_dh);
}

function printLine(str) {
    var size = parseInt(Settings.char_per_line)-4;
    var len = str.length;
    var res = str.split(":");
    var newd = res[0];
    for(i=1; i<(size-len); i++) {
        newd += " ";
    }
    newd += res[1];
    return newd;
}

$(window).bind("resize", posScreen);

function read_card() {

}

$.extend($.keyboard.keyaction, {
    enter : function(base) {
        if (base.$el.is("textarea")){
            base.insertText('\r\n');
        } else {
            base.accept();
        }
    }
});

$(document).ready(function() {
    posScreen();
    if (Settings.display_kb == 1) { display_keyboards(); }
    nav_pointer();
    loadItems();
    read_card();

    $('.swipe').keypress( function (e) {
        var TrackData = $(this).val() ? $(this).val() : '';
        if(TrackData != '') {
            if (e.keyCode == 13) {
                e.preventDefault();
                var p = new SwipeParserObj(TrackData);

                if(p.hasTrack1)
                {

                    var CardType = null;
                    var ccn1 = p.account.charAt(0);
                    if(ccn1 == 4)
                        CardType = 'Visa';
                    else if(ccn1 == 5)
                        CardType = 'MasterCard';
                    else if(ccn1 == 3)
                        CardType = 'Amex';
                    else if(ccn1 == 6)
                        CardType = 'Discover';
                    else
                        CardType = 'Visa';

                    $('#pcc_no').val(p.account).change();
                    $('#pcc_holder').val(p.account_name).change();
                    $('#pcc_month').val(p.exp_month).change();
                    $('#pcc_year').val(p.exp_year).change();
                    $('#pcc_cvv2').val('');
                    $('#pcc_type').select2('val', CardType);

                } else {
                    $('#pcc_no').val('').change();
                    $('#pcc_holder').val('').change();
                    $('#pcc_month').val('').change();
                    $('#pcc_year').val('').change();
                    $('#pcc_cvv2').val('').change();
                    $('#pcc_type').val('').change();
                }

                $('#pcc_cvv2').focus();
            }
        }

    }).blur(function (e) {
        $(this).val('');
    }).focus( function (e) {
        $(this).val('');
    });

    $(document).on('blur', '#pcc_no', function () {
        var cn = $(this).val();
        var ccn1 = cn.charAt(0);
        if(ccn1 == 4)
            CardType = 'Visa';
        else if(ccn1 == 5)
            CardType = 'MasterCard';
        else if(ccn1 == 3)
            CardType = 'Amex';
        else if(ccn1 == 6)
            CardType = 'Discover';
        else
            CardType = 'Visa';

        $('#pcc_type').select2('val', CardType);
    });

    $('.modal').on('hidden.bs.modal', function() {
        $(this).removeData('bs.modal');
    });
    $('#clearLS').click(function(event) {
        bootbox.confirm(lang.r_u_sure, function(result) {
            if(result == true) {
                localStorage.clear();
                location.reload();
            }
        });
        return false;

    });

    if(Settings.focus_add_item != '') {
        shortcut.add(Settings.focus_add_item, function() { $("#add_item").focus(); }, { 'type':'keydown', 'propagate':false, 'target':document} );
    }
    if(Settings.add_customer != '') {
        shortcut.add(Settings.add_customer, function() { $("#add-customer").trigger('click'); }, { 'type':'keydown', 'propagate':false, 'target':document} );
    }
    if(Settings.toggle_category_slider != '') {
        shortcut.add(Settings.toggle_category_slider, function() { $('[data-toggle="control-sidebar"]').trigger('click'); }, { 'type':'keydown', 'propagate':false, 'target':document} );
    }
    if(Settings.cancel_sale != '') {
        shortcut.add(Settings.cancel_sale, function() { $("#reset").click(); }, { 'type':'keydown', 'propagate':false, 'target':document} );
    }
    if(Settings.suspend_sale != '') {
       shortcut.add(Settings.suspend_sale, function() { $("#suspend").trigger('click'); }, { 'type':'keydown', 'propagate':false, 'target':document} );
   }
   if(Settings.print_order != '') {
       shortcut.add(Settings.print_order, function() { $("#print_order").click(); }, { 'type':'keydown', 'propagate':false, 'target':document} );
   }
   if(Settings.print_bill != '') {
       shortcut.add(Settings.print_bill, function() { $("#print_bill").click(); }, { 'type':'keydown', 'propagate':false, 'target':document} );
   }
   if(Settings.finalize_sale != '') {
       shortcut.add(Settings.finalize_sale, function() { $("#payment").trigger('click'); }, { 'type':'keydown', 'propagate':false, 'target':document} );
   }
   if(Settings.today_sale != '') {
       shortcut.add(Settings.today_sale, function() { $("#today_sale").click(); }, { 'type':'keydown', 'propagate':false, 'target':document} );
   }
   if(Settings.open_hold_bills != '') {
       shortcut.add(Settings.open_hold_bills, function() { $("#opened_bills").trigger('click'); }, { 'type':'keydown', 'propagate':false, 'target':document} );
   }
   if(Settings.close_register != '') {
       shortcut.add(Settings.close_register, function() { $("#close_register").click(); }, { 'type':'keydown', 'propagate':false, 'target':document} );
   }

});
$.fn.focusToEnd = function() { return this.each(function() { var v = $(this).val(); $(this).focus().val("").val(v); }); };
$.ajaxSetup ({ cache: false, headers: { "cache-control": "no-cache" } });

//mod by MTK on 7 Dec 2018 to show Food Modifier
var tother = '';
var tok = '';

    $("#cancel_id").change(function() {

       var tcom = $('#nComment').val()+"  ";
       var sel = document.getElementById('cancel_id');
       tother= sel.options[sel.selectedIndex].value;

       if(tcom != null)
       {
          tcom += tother+"  ";
          $('#nComment').val(tcom);
          
       }
       else
       {
          tok += tother +"  ";
          $('#nComment').val(tok);
       }

       $('#cancel_id  option[value="can"]').prop("selected", true);

    });

    $("#reduce_id").change(function() {

       var tcom = $('#nComment').val()+"  ";
       var sel = document.getElementById('reduce_id');
       tother= sel.options[sel.selectedIndex].value;

       if(tcom != null)
       {
          tcom += tother+"  ";
          $('#nComment').val(tcom);
          
       }
       else
       {
          tok += tother +"  ";
          $('#nComment').val(tok);
       }

       $('#reduce_id  option[value="red"]').prop("selected", true);

    });

    $("#add_id").change(function() {

       var tcom = $('#nComment').val()+"  ";
       var sel = document.getElementById('add_id');
       tother= sel.options[sel.selectedIndex].value;

       if(tcom != null)
       {
          tcom += tother+"  ";
          $('#nComment').val(tcom);
          
       }
       else
       {
          tok += tother +"  ";
          $('#nComment').val(tok);
       }

       $('#add_id  option[value="add"]').prop("selected", true);

    });
    //end mod


