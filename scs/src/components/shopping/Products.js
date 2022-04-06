import React from "react";
import "../../css/products.css";
import blender from "../../img/products/coffee.png";
const Products = () => {
  return (
    <div>
      <div class="row">
        <div class="col s12 m12 l8">
        <h1>Products</h1>
            <div id="productlist">
        <div class="card" id=' . $counter . ' draggable="true" ondragstart="drag(this.id)">
        <div class="card-image valign-wrapper" id="productsonly">
          <img class="img-products" id="img' . $counter . '" src={blender}/>
          <a class="btn-floating halfway-fab" onClick="cartBtn(' .$counter. ')" style={{background: '#149BBB'}}><i class="material-icons left">add</i></a>   
        </div>
        <div class="card-content">
          <span class="cardspan card-title" style={{color:'black', fontWeight:'bold'}} id="name' . $counter . '">Blender</span>
          <p id="price' . $counter . '">$4.99</p>
        </div>
      </div>





      <div class="card" id=' . $counter . ' draggable="true" ondragstart="drag(this.id)">
        <div class="card-image valign-wrapper" id="productsonly">
          <img class="img-products" id="img' . $counter . '" src={blender}/>
          <a class="btn-floating halfway-fab" onClick="cartBtn(' .$counter. ')" style={{background: '#149BBB'}}><i class="material-icons left">add</i></a>   
        </div>
        <div class="card-content">
          <span class="cardspan card-title" style={{color:'black', fontWeight:'bold'}} id="name' . $counter . '">Blender</span>
          <p id="price' . $counter . '">$4.99</p>
        </div>
      </div>        <div class="card" id=' . $counter . ' draggable="true" ondragstart="drag(this.id)">
        <div class="card-image valign-wrapper" id="productsonly">
          <img class="img-products" id="img' . $counter . '" src={blender}/>
          <a class="btn-floating halfway-fab" onClick="cartBtn(' .$counter. ')" style={{background: '#149BBB'}}><i class="material-icons left">add</i></a>   
        </div>
        <div class="card-content">
          <span class="cardspan card-title" style={{color:'black', fontWeight:'bold'}} id="name' . $counter . '">Blender</span>
          <p id="price' . $counter . '">$4.99</p>
        </div>
      </div>        <div class="card" id=' . $counter . ' draggable="true" ondragstart="drag(this.id)">
        <div class="card-image valign-wrapper" id="productsonly">
          <img class="img-products" id="img' . $counter . '" src={blender}/>
          <a class="btn-floating halfway-fab" onClick="cartBtn(' .$counter. ')" style={{background: '#149BBB'}}><i class="material-icons left">add</i></a>   
        </div>
        <div class="card-content">
          <span class="cardspan card-title" style={{color:'black', fontWeight:'bold'}} id="name' . $counter . '">Blender</span>
          <p id="price' . $counter . '">$4.99</p>
        </div>
      </div>







      </div>
      </div>      

























      


      <div class="col s12 m12 l4" id="full" ondrop="drop(event)" ondragover="allowDrop(event)">
            <div id="div1">
                <h1>Cart</h1>
                <form name="myform">
                    <input type="hidden" name="customer" />
                </form>

                <div class="card horizontal" id="card' . $counter . '">
                                <div class="card-image cart-img">
                                    <img class="cartimg" src={blender}/>
                                </div>
                                <div class="card-stacked">
                                    <div class="card-content">
                                        <span class="cardspan card-title" style={{color:'black', fontWeight:'bold'}} >Blender</span>
                                        <p>$4.99</p>
                                    </div>
                                    <div class="card-action" >
                                        <a href="javascript:void(0);" id="remove' . $counter . '" onclick="removeCart(' . $counter . ');"><i class="material-icons">delete</i></a>
                                        
                                    </div>
                                </div>
                            </div>




            </div>
        </div>



        </div>




      
    </div>

  );
};

export default Products;
