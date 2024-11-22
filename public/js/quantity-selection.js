let amountElement = document.getElementById('amount')
// console.log(amountElement);
let amount = amountElement.value;
// console.log(amount);
let render = (amount) =>{
    amountElement.value = amount
}

// // xử lý handleplus
let  handleplus = () => {
    console.log(amount);
    amount++
    render(amount);
}

// xử lý handleminus
let handleminus = () => {
    if(amount > 1)
        amount--;
    console.log(amount);
    render(amount);
    
}


amountElement.addEventListener('input', () =>{
    amount = amountElement.value;
    amount = parseInt(amount);
    amount = (isNaN(amount) || amount==0) ? 1: amount;
    render(amount);
    console.log(amount);
});

function getIFMandCheckSize(vt,size){
    var inputt = document.getElementById('select_size_product');
    var arr_size = document.getElementsByClassName('size');
    for(i = 0 ; i < arr_size.length ; i++){
      arr_size[i].style.backgroundColor = 'white';
      arr_size[i].style.color = 'black';
    }
    arr_size[vt].style.color = 'white';
    arr_size[vt].style.backgroundColor = 'black';
    inputt.value = size;
    console.log(inputt.value);
  }



// function handleminus() {
//     const amountInput = document.getElementById("amount");
//     let amount = parseInt(amountInput.value);
//     if (amount > 1) {
//       amount--;
//       amountInput.value = amount;
//     }
//   }
  
//   function handleplus() {
//     const amountInput = document.getElementById("amount");
//     let amount = parseInt(amountInput.value);
//     amount++;
//     amountInput.value = amount;
//   }
