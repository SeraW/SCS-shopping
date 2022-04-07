import React, {useState,useEffect} from 'react';
import M from 'materialize-css/dist/js/materialize.min.js';
import '../../css/reviews.css';

const Review = () => {

  useEffect(() =>{

      var elems = document.querySelectorAll('.carousel');
      M.Carousel.init(elems, {
        dist:0,
        shift:0,
        padding:20,
  });

  },[])
  return (
    <div>
      <div id="review-container">
        <div className="container">
          <div className="row" id="title">
              <h1>What people are <span className="highlight">saying</span></h1>
              <h2 id="description">We've had the pleasure of delivering to over 500 customers worldwide. Here's what they've had to say.</h2>
        </div>
      </div>

      <div className="carousel">

        <div className="carousel-item">
            <div className="card horizontal sticky-action">
              <div className="card-stacked">
                  <div className="card-content">
                    <span className="material-icons star">star_rate star_rate star_rate star_rate star_rate</span>
                    <br></br>I am happy with the service I received. I ordered a smartphone and received it in good time at a reasonable price.
                  </div>
                <div className="card-action">
                  <a href="#" style={{color:"#149BBB"}}>hi</a>
                </div>
            </div>
          </div>
        </div>

        <div className="carousel-item">
            <div className="card horizontal sticky-action">
              <div className="card-stacked">
                  <div className="card-content">
                    <span className="material-icons star">star_rate star_rate star_rate star_rate star_rate</span>
                    hello
                  </div>
                <div className="card-action">
                  <a href="#" style={{color:"#149BBB"}}>hi</a>
                </div>
            </div>
          </div>
        </div>

        <div className="carousel-item">
            <div className="card horizontal sticky-action">
              <div className="card-stacked">
                  <div className="card-content">
                    <span className="material-icons star">star_rate star_rate star_rate star_rate star_rate</span>
                    hello
                  </div>
                <div className="card-action">
                  <a href="#" style={{color:"#149BBB"}}>hi</a>
                </div>
            </div>
          </div>
        </div>

        <div className="carousel-item">
            <div className="card horizontal sticky-action">
              <div className="card-stacked">
                  <div className="card-content">
                    <span className="material-icons star">star_rate star_rate star_rate star_rate star_rate</span>
                    hello
                  </div>
                <div className="card-action">
                  <a href="#" style={{color:"#149BBB"}}>hi</a>
                </div>
            </div>
          </div>
        </div>

    </div>
  </div>
</div>
  )
}

export default Review