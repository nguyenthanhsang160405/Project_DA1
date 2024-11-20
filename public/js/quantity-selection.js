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
