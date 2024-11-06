// ẩn hiện menu trên mobile
function AnHienMobile(){
    const menu = document.getElementById("menu-mobile-visi-hid");
    if(menu.style.display=="none"){
        menu.style.display="block";
    }else{
        menu.style.display="none";
    }
}
function AnHienConMenu(){
    const element = document.getElementById('menu_con-icon-mobile');
    console.log(element);
    if(element.style.display=='none'){
        element.style.display='block';
    }else{
        element.style.display='none';
    }
}