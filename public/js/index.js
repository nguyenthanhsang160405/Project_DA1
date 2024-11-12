// var a = 0;
// function truot(){
//     hinh = document.getElementsByName('hinh');
//     anh = document.getElementById('anh');
//     var rong = hinh[0].offsetWidth;
//     a++;
//     if (a == hinh.length){
//         a = 0;
//     }
//     anh.style.transform = `translateX(${-rong * a}px)`;
//     anh.style.transition = `0.5s ease-in-out`;
// }
//     truot();
//     setInterval(truot,2000);
var arr = [`public/img/banner1.jpg`,`public/img/BANNER 2.jpg`,`public/img/banner3.jpg`];
var i = 0;
var get = document.getElementsByClassName('nuttron');
function slideshow(){
    
    i++;
    if(i == arr.length) {
        i = 0;
        // get.style.backgroundColor = 'gray';
    }
    document.getElementById('slideshow').src = arr[i];
}
setInterval(slideshow,3000);

function next(x){
    if (x == 1) {
        document.getElementById('slideshow').src = `public/img/banner1.jpg`;
        
    }else if (x == 2) {
        document.getElementById('slideshow').src = `public/img/BANNER 2.jpg`;
        
    }else{
        document.getElementById('slideshow').src = `public/img/banner3.jpg`;
        
    }
}