import React from 'react';
import {Link} from 'react-router-dom';
import '../../css/invoicecomplete.css';

const InvoiceComplete = () => {
  return (
    <div>
      <div id="invoice-container">
        <div id="invoice-box">
            <span><i className="large material-icons">thumb_up</i></span>
            <h1>Thank you! Your order has been recieved.</h1>
            <p>You will be recieving a confirmation email with order details.</p>
            <Link to={'/products'}><button className="waves-effect waves-light btn" href="products.php" style={{background: "#149BBB"}}><i className="material-icons left">shopping_basket</i>More Products</button></Link>
        </div>
      </div>
    </div>
  )
}

export default InvoiceComplete