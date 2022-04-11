import * as React from "react";
import { useState, useEffect } from "react";
import "../../css/shoppingcart.css";
import axios from "axios";
import {
  GoogleMap,
  LoadScript,
  DirectionsRenderer,
  DirectionsService,
} from "@react-google-maps/api";
import PropTypes from "prop-types";

const ExampleDirectionsPropTypes = {
  styles: PropTypes.shape({
    container: PropTypes.object.isRequired,
  }).isRequired,
};

const ShoppingCart = () => {
  const [product, setProduct] = useState([]);
  const [cart, setCart] = useState([]);
  const [isLoading, setLoading] = useState(true);

  const [branch, setBranch] = useState("");
  //const [address, setAddress] = useState("");
  let address = "";
  const [car, setCar] = useState("");

  const LOCAL_STORAGE_KEY = "cart";
  var cartCount = 0;
  var total = 0;
  //console.log(cart);
  //console.log(address);
  const [response, setResponse] = React.useState(null);
  const [origin, setOrigin] = React.useState(null);
  const [destination, setDestination] = React.useState(null);

  const containerStyle = {
    width: "100%",
    height: "500px",
  };

  const center = {
    lat: 43.65,
    lng: -79.38,
  };

  const directionsCallback = React.useCallback((res) => {
    console.log(res);
    if (res !== null) {
      if (res.status === "OK") {
        setResponse(res);
      } else {
        console.log("response: ", res);
      }
    }
  }, []);

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
      url: "http://localhost/test.php",
      headers: { "content-type": "application/json" },
    })
      .then((res) => {
        console.log(res.data);
        setProduct(res.data.product);
        setOrigin(res.data.address);
        setBranch(res.data.branch);
        setCar(res.data.car);
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
            <button className="btn btn-primary" type="button">
              Build Route
            </button>
            <div id="mapdiv" class="col s12 m12 l9">
              <div id="map">
                <LoadScript googleMapsApiKey="AIzaSyDf5iT2KI8tPal0EAflGoI2WNfnXXp3nHc">
                  <GoogleMap
                    id="direction-example"
                    mapContainerStyle={containerStyle}
                    zoom={9}
                    center={center}
                  >
                    {destination !== "" && origin !== "" && (
                      <DirectionsService
                        options={{
                          destination,
                          origin,
                          travelMode: "DRIVING",
                        }}
                        callback={directionsCallback}
                      />
                    )}

                    {response !== null && (
                      <DirectionsRenderer options={{ directions: response }} />
                    )}
                  </GoogleMap>
                </LoadScript>
              </div>
            </div>

            <form id="order" action="process_order.php" method="post">
              <div
                class="input-field col s12"
                onChange={(e) => {
                  const selectedTable = e.target.value;
                  setDestination(selectedTable);

                  console.log(address);

                  //console.log("THE HIT")
                  //console.log(selectedTable)
                  //console.log(destination)
                }}
              >
                <select
                  className="browser-default choice"
                  id="end"
                  name="end"
                  required
                >
                  <option disabled selected>
                    Choose a Branch
                  </option>

                  {branch.map((item) => {
                    return (
                      <option value={item["branch_addy"]}>
                        {item["branch_addy"]}
                      </option>
                    );
                  })}
                </select>
              </div>

              <div class="input-field col s12">
                <select
                  className="browser-default choice"
                  name="car"
                  id="car"
                  required
                >
                  <option value="" disabled selected>
                    Choose a Car
                  </option>

                  {car.map((item) => {
                    return (
                      <option value={item["model"]}>
                        {item["model"] + " - Available"}
                      </option>
                    );
                  })}
                </select>
              </div>
              <div class="input-field col s12">
                <select
                  className="browser-default choice"
                  name="date"
                  id="date"
                  required
                >
                  <option value="" disabled selected>
                    Choose a Delivery Option
                  </option>
                  <option value="7">FREE - No-Rush Shipping</option>
                  <option value="1">$6.99 - One-Day Shipping</option>
                  <option value="2">$5.99 - Two-Day Shipping</option>
                </select>
              </div>
              <input
                type="hidden"
                id="FinalValue"
                name="FinalValue"
                value="128.98"
              ></input>
              <button
                class="btn waves-effect waves-light save-button"
                type="submit"
                name="trip_submit"
                //style="margin-top:30px;background:#149BBB"
                style={{ marginTop: "30px", background: "#149BBB" }}
              >
                Place Order
              </button>
            </form>
          </div>

          <div class="col s12 m12 l3" id="full">
            <div id="div1">
              <h1>Cart</h1>
              <div
                class="card-panel horizontal medium"
                id="card' . $counter . '"
              >
                <div class="card-stacked">
                  <div class="card-content">
                    <span
                      //style="color:black; font-weight:bold; font-size: 175%"
                      style={{ color: "black", fontWeight: "bold" }}
                      class="card-title"
                    >
                      Summary
                    </span>
                    {cart.map((item) => {
                      //const counter = product[item - 1]["prod_id"];
                      const price = product[item - 1]["prod_price"];
                      total += parseFloat(price);
                    })}

                    <p id="subtotal">
                      {"Subtotal: $" + Math.round(total * 100) / 100}
                    </p>
                    {/*               <p id="shipping">Shipping & Handling: $0</p>
                  <p>Taxes: $' . number_format((float)$total * .13, 2, '.', '') . '</p>
                  <p id="total">TOTAL: $' . number_format((float)$total * 1.13, 2, '.', '') . '</p>
 */}
                  </div>
                </div>
              </div>
              {cart.map((item) => {
                //const counter = product[item - 1]["prod_id"];
                cartCount++;
                const name = product[item - 1]["prod_name"];
                const price = product[item - 1]["prod_price"];
                const imgurl = product[item - 1]["img_url"];

                //I'VE GOT NO CLUE HOW TO MAKE THE LINE BELOW NOT HARDCODED
                const img = "http://localhost/CPS630/scs/src/" + imgurl;

                return (
                  <div class="card horizontal small" id={"card" + cartCount}>
                    <div class="card-image cart-img">
                      <img src={img} />
                    </div>
                    <div class="card-stacked">
                      <div class="card-content">
                        <span
                          class="cardspan card-title"
                          style={{ color: "black", fontWeight: "bold" }}
                        >
                          {name}
                        </span>{" "}
                        <p>${price}</p>
                      </div>
                    </div>
                  </div>
                );
              })}
            </div>
          </div>
        </div>
      </div>
    </div>
    //</div>
  );
};

ShoppingCart.propTypes = ExampleDirectionsPropTypes;

export default React.memo(ShoppingCart);
