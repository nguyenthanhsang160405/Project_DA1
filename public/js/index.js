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
function slideshow(){
    i++;
    if(i == arr.length) i =0;
    document.getElementById('slideshow').src = arr[i];
}
setInterval(slideshow,3000);