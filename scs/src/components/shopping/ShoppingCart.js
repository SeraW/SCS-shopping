import React, { useState, useEffect } from "react";
import "../../css/shoppingcart.css";
import axios from "axios";

const ShoppingCart = () => {
  const [tableData, setTableData] = useState([]);
  const [cart, setCart] = useState([]);
  const [isLoading, setLoading] = useState(true);
  const LOCAL_STORAGE_KEY = "cart";

  

  
  


  

  var cartCount = 0;

  console.log(cart);

  useEffect(() => {
    generateProducts();
    const storedCart = JSON.parse(localStorage.getItem(LOCAL_STORAGE_KEY));
    if (storedCart) setCart(storedCart);
  }, []);

  useEffect(() => {
    localStorage.setItem(LOCAL_STORAGE_KEY, JSON.stringify(cart));
  }, [cart]);

  if (isLoading) {
    return <div className="App">Loading...</div>;
  }

  function generateProducts() {
    axios({
      method: "post",
      url: "http://localhost/select.php",
      headers: { "content-type": "application/json" },
      data: "product",
    })
      .then((res) => {
        setTableData(res.data);
        setLoading(false);
      })
      .catch((err) => {
        console.log(err);
      });
  }

  return (
    <div>
      <div class="row">
        <div class="container">
          <div class="col s12 m12 l9">
            <h1>Checkout</h1>
            


            
          </div>
        </div>
      </div>
    </div>
  );
};

export default ShoppingCart;
