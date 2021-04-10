//GLOBAL CART
var products = JSON.parse(localStorage.getItem("cart"));
var cartItems = [] ;
var  cart_n = document.getElementById("cart_n");
var table = document.getElementById("table");
var table = 0 ;

//HTML Products Table
function tableHTML (i){
    return `
    
     <tr>
     <th scope="row">${i+1}</th>
      <td><img style ="width:90px;" src="${products[i].image}"  ></td>
       <td>${products[i].name}</td>
        <td>1</td>
          <td>${products[i].price}</td>
          </tr>
      
    `
}

//CLEAN 
function clean(){
     localStorage.clear();
     for(let index=0 ; index<products.length ; index: ++) {
         table.innerHTML += tableHTML( index)
         total = total+ parseInt(products[index].price)
        //   const element = aray[index] ;
     }
     total = 0
     table.innerHTML = `
        <tr>
        <th></th>
         <th></th>
          <th></th>
           <th></th>
            <th></th>
                d
        
        </tr>
     `;
     cart_n.innerHTML= "" ;
     document.getElementById("btnBuy").style.diplay ="none"
     document.getElementById("btnClear").style.diplay ="none"
}

//RENDER

function render(){
    for(let index=0 , = index < products.length ; index ++) {
         table.innerHTML + = tableHTML(index)
         total=total+parseInt(products[index].price)
    }
    table.innerHTML+=`
    <tr>
    <th scope="col"></th>
    <th scope="col"></th>
    <th scope="col"></th>
    <th scope="col"></th>
    <th scope="col"></th>
    <th scope="col">Total: $${total}.00</th>
    </tr>
    <tr>
    <th scope="col"></th>
    <th scope="col"></th>
    <th scope="col"></th>
      <th scope="col">
        <button class="btn btn-danger" id="btnClear" onClick="clear()">
        Clear Shopping Cart
        </button>
      </th>
      <th scope="col">
      <form id="formAdd">
          <button type="submit" id="btnBuy" class="btn btn-success" >Buy</button>
      </form>
      </th>
    </tr>
    `;
    products = JSON.parse(localStorage.get("cart"));
    cart_n.innerHTML = `[${products.length}]`;
}

$(document).ready(function(){
    $("$formAdd").submit (function(e){
        e.preventDefault ();
        var option = 1;
        post = $.trim(option)
        $.ajax({
            url:"./"
        })
    })
})