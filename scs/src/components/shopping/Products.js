import React, { useState, useEffect } from "react";
import "../../css/products.css";
import blender from "../../img/products/blender.png";

import axios from "axios";

const Products = () => {
  const [tableData, setTableData] = useState([]);
  const [cart, setCart] = useState([]);
  const LOCAL_STORAGE_KEY = "cart";

  console.log(cart);

  useEffect(() => {
    generateProducts();
    const storedCart = JSON.parse(localStorage.getItem(LOCAL_STORAGE_KEY));
    if (storedCart) setCart(storedCart);
  }, []);

  useEffect(() => {
    localStorage.setItem(LOCAL_STORAGE_KEY, JSON.stringify(cart));
  }, [cart]);

  function generateProducts() {
    axios({
      method: "post",
      url: "http://localhost/select.php",
      headers: { "content-type": "application/json" },
      data: "product", //tables
    })
      .then((res) => {
        setTableData(res.data);
      })
      .catch((err) => {
        console.log(err);
      });
  }

  function cartBtn(id) {
    setCart((oldCart) => [...oldCart, id]);
    console.log(id);
  }

  return (
    <div>
      <div class="row">
        <div class="col s12 m12 l8">
          <h1>Products</h1>
          <div id="productlist">

            {console.log(tableData)}

            {tableData.map((item, tableindex) => {
              const tableCol = Object.keys(tableData[0]);
              const counter = tableData[tableindex][tableCol[0]];
              const name = tableData[tableindex][tableCol[1]];
              const price = tableData[tableindex][tableCol[2]];
              const imgurl = tableData[tableindex][tableCol[3]];

              //I'VE GOT NO CLUE HOW TO MAKE THE LINE BELOW NOT HARDCODED
              const img = "http://localhost/CPS630/scs/src/" + imgurl;
              return (
                <div class="card" id={counter}>
                  <div class="card-image valign-wrapper" id="productsonly">
                    <img class="img-products" id={"img" + counter} src={img} />
                    <a
                      class="btn-floating halfway-fab"
                      onClick={() => cartBtn(counter)}
                      style={{ background: "#149BBB" }}
                    >
                      <i class="material-icons left">add</i>
                    </a>
                  </div>
                  <div class="card-content">
                    <span
                      class="cardspan card-title"
                      style={{ color: "black", fontWeight: "bold" }}
                      id={"name" + counter}
                    >
                      {name}
                    </span>
                    <p id={"price" + counter}>{"$" + price}</p>
                  </div>
                </div>
              );
            })}
          </div>
        </div>

        <div class="col s12 m12 l4" id="full">
          <div id="div1">
            <h1>Cart</h1>
            <form name="myform">
              <input type="hidden" name="customer" />
            </form>
            {
             // cart.map((item, productindex) => {
                cart.map((item) => {

              const counter = tableData[item-1]["prod_id"];
              //const name = tableData[item-1]["prod_name"];
              //const price = tableData[item-1]["prod_price"];
              //const imgurl = tableData[item-1]["img_url"];

              const name = "name";
              const price = "price";
              const imgurl = "img";


              //I'VE GOT NO CLUE HOW TO MAKE THE LINE BELOW NOT HARDCODED
              const img = "http://localhost/CPS630/scs/src/" + imgurl;
              return (



            <div class="card horizontal" id="card' . $counter . '">
              <div class="card-image cart-img">
                <img class="cartimg" src={img} />
              </div>
              <div class="card-stacked">
                <div class="card-content">
                  <span
                    class="cardspan card-title"
                    style={{ color: "black", fontWeight: "bold" }}
                  >
                    {name}
                  </span>
                  <p>${price}</p>
                </div>
                <div class="card-action">
                  <a
                    href="javascript:void(0);"
                    id="remove' . $counter . '"
                    onclick="removeCart(' . $counter . ');"
                  >
                    <i class="material-icons">delete</i>
                  </a>
                </div>
              </div>
            </div>

          );
          })}


          </div>
        </div>
      </div>
    </div>
  );
};

export default Products;
