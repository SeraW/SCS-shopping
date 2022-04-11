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
  const [tableData, setTableData] = useState([]);
  const [cart, setCart] = useState([]);
  const [isLoading, setLoading] = useState(true);
  const [branch, setBranch] = useState([]);
  const LOCAL_STORAGE_KEY = "cart";
  var cartCount = 0;
  var total = 0;
  console.log(cart);

  const [response, setResponse] = React.useState(null);
  const [origin, setOrigin] = React.useState("129 Firgrove Cres.");
  const [destination, setDestination] = React.useState("Jane Finch Mall");

  const containerStyle = {
    width: "500px",
    height: "500px",
  };

  const center = {
    lat: 43.65,
    lng: -79.38,
  };

  const onClick = React.useCallback(() => {
    setOrigin("1194 Weston Rd");
    setDestination("350 Victoria St");
  }, []);

  const onMapClick = React.useCallback((...args) => {
    console.log("onClick args: ", args);
    console.log(destination);
    console.log(origin);
    console.log(response);
  }, []);

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

  const directionsServiceOptions = React.useMemo(() => {
    return {
      destination: "1194 Weston Rd",
      origin: "350 Victoria St",
    };
  }, []);

  const directionsRendererOptions = React.useMemo(() => {
    return {
      directions: response,
    };
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

    axios({
      method: "post",
      url: "http://localhost/select.php",
      headers: { "content-type": "application/json" },
      data: "branch",
    })
      .then((res) => {
        setBranch(res.data);
        console.log("branch")
        
        console.log(branch)
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
            <button className="btn btn-primary" type="button" onClick={onClick}>
              Build Route
            </button>

            <LoadScript googleMapsApiKey="AIzaSyDf5iT2KI8tPal0EAflGoI2WNfnXXp3nHc">
              <GoogleMap
                id="direction-example"
                mapContainerStyle={containerStyle}
                zoom={2}
                center={center}
                onClick={onMapClick}
              >
                {destination !== "" && origin !== "" && (
                  <DirectionsService
                    options={{
                      destination: destination,
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

            <form id="order" action="process_order.php" method="post">
              <div class="input-field col s12">
                <select name="end" id="end" required>
                  <option value="" disabled selected="">
                    Choose a Branch
                  </option>
                  {/*                     <?php
                    $commandText = "SELECT branch_addy FROM branch";
                    $result = mysqli_query($db, $commandText);

                    //$counter = 0;
                    while ($row = mysqli_fetch_assoc($result)) {
                        //$counter += 1;
                        $branch_addy = $row["branch_addy"];
                        echo '<option value="' . $branch_addy . '">' . $branch_addy . '</option>';
                    };
                    ?> */}
                </select>
              </div>
              <div class="input-field col s12">
                <select name="car" id="car" required>
                  <option value="" disabled selected="">
                    Choose a Car
                  </option>
                  {/*                     <?php
                    $commandText = "SELECT model, availibility, car_id FROM car";
                    $result = mysqli_query($db, $commandText);

                    //$counter = 0;
                    while ($row = mysqli_fetch_assoc($result)) {
                        //$counter += 1;
                        $model = $row["model"];
                        $available = $row["availibility"];
                        $car_id = $row["car_id"];
                        if ($available == "Available") {
                            echo '<option value="' . $car_id . '">' . $model . ' - (' . $available . ')</option>';
                        }
                    };
                    ?>
 */}
                </select>
              </div>
              <div class="input-field col s12">
                <select name="date" id="date" required>
                  <option value="" disabled selected="">
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
                      //const counter = tableData[item - 1]["prod_id"];
                      const price = tableData[item - 1]["prod_price"];
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
                //const counter = tableData[item - 1]["prod_id"];
                cartCount++;
                const name = tableData[item - 1]["prod_name"];
                const price = tableData[item - 1]["prod_price"];
                const imgurl = tableData[item - 1]["img_url"];

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
