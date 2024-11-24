// <!-- Điều chỉnh số lượng -->
    let quantity = document.getElementById('quantity-cout-cart').textContent;

   document.getElementById('increase-cout-cart').addEventListener('click', function() {
       quantity++;
       document.getElementById('quantity-cout-cart').textContent = quantity;
   });

   document.getElementById('decrease-cout-cart').addEventListener('click', function() {
       if (quantity > 0) {
           quantity--;
           document.getElementById('quantity-cout-cart').textContent = quantity;
       }
   });


   
//    <!-- ẩn hiện ghi chú -->
       document.getElementById('form-note').style.display = 'block';
           shownote();
           function shownote() {
               var x = document.getElementById('form-note');
               if(x.style.display == 'none'){
                   x.style.display = 'block'
               }else{
                   x.style.display = 'none'
               }
           }

