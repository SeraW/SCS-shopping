import React from 'react';
import '../../css/admin.css';
import { Link } from 'react-router-dom';
const admin = () => {
  return (
    <div id="admin">
        <h1>Database <span>Maintain</span></h1>
        <Link to={'/'}><button className="waves-effect waves-light btn" href="/products" style={{background: "#149BBB"}}>Insert</button></Link>
        <Link to={'/select'}><button className="waves-effect waves-light btn" href="/products" style={{background: "#149BBB"}}>Select</button></Link>
        <Link to={'/'}><button className="waves-effect waves-light btn" href="/products" style={{background: "#149BBB"}}>Delete</button></Link>
        <Link to={'/'}><button className="waves-effect waves-light btn" href="/products" style={{background: "#149BBB"}}>Update</button></Link>
    </div>
  )
}

export default admin