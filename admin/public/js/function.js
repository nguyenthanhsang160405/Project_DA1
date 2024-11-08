function checkAll(){
    var cha = document.getElementById('box-checkall-delete-pro');
    var con = document.getElementsByClassName('get-id-product-delete');
    if(cha.checked == true){
        for(i = 0 ; i < con.length ; i++ ){
            console.log(con[i]);
            con[i].checked = true;
        }
    }else{
        for(i = 0 ; i < con.length ; i++ ){
            con[i].checked = false;
        }
    }
}