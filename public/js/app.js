
function change_bk(){
    if(document.getElementById('breakfasts').value=="off")
    document.getElementById('breakfasts').value="on";
    else
    document.getElementById('breakfasts').value="off";
    cal_amount();
}
function change_sv(){
    if(document.getElementById('service_vip').value=="off")
    document.getElementById('service_vip').value="on";
    else
    document.getElementById('service_vip').value="off";
    cal_amount();
}
function cal_amount() {
    if(document.getElementById('single')!=null){
    var sr_nb=parseInt( document.getElementById('single').value);
    var sr_price=parseInt(document.getElementById('single_price').innerText.replace('DH',''));
    }else {
        var sr_nb=0;
    }

    if(document.getElementById('double')!=null){
    var dr_nb=parseInt(document.getElementById('double').value);
    var dr_price=parseInt(document.getElementById('double_price').innerText.replace('DH',''));
    }else {
        var dr_nb=0;
    }
    if(document.getElementById('double')!=null){
    var str_nb=parseInt(document.getElementById('suite').value);
    var str_price=parseInt(document.getElementById('suite_price').innerText.replace('DH',''));
    }else {
        var str_nb=0;
    }

    var prs_nb=parseInt(document.getElementById('persons_nb').value);

    var breakfast_price=parseInt(document.getElementById('breakfast_price').innerText.replace('DH',''));
    var service_vip_price=parseInt(document.getElementById('service_vip_price').innerText.replace('DH',''));

    var breakfasts=document.getElementById('breakfasts').value;
    var service_vip=document.getElementById('service_vip').value;

    if(breakfasts=="on" && service_vip=="on")
    var resultat=(((sr_nb*sr_price)+(dr_nb*dr_price)+(str_nb*str_price))*(prs_nb)) + prs_nb*(service_vip_price + breakfast_price) ;

    else if(breakfasts=="on" && service_vip=="off")
    var resultat=(((sr_nb*sr_price)+(dr_nb*dr_price)+(str_nb*str_price))*(prs_nb)) + prs_nb*(breakfast_price) ;

    else if(breakfasts=="off" && service_vip=="on")
    var resultat=(((sr_nb*sr_price)+(dr_nb*dr_price)+(str_nb*str_price))*(prs_nb)) + prs_nb*(service_vip_price) ;

    else
    var resultat=(((sr_nb*sr_price)+(dr_nb*dr_price)+(str_nb*str_price))*(prs_nb));

    document.getElementById('aff_amount').innerText=resultat+"DH";
    document.getElementById('amount').value = resultat;
}
