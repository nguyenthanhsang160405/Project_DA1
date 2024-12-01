// ẩn hiện menu trên mobile
var check = false;
function AnHienMobile(){
    check = !check;
    const menu = document.getElementById("menu-mobile-visi-hid");
    if(check == true){
        menu.style.display="block";
    }else{
        menu.style.display="none";
    }
}
var check1 = false;
function AnHienConMenu(){
    check1 = !check1;
    const element = document.getElementById('menu_con-icon-mobile');
    if(check1 == true){
        element.style.display='block';
    }else{
        element.style.display='none';
    }
}