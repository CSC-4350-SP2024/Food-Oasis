// src/components/Vendor.js
import React from 'react';


const Vendor = () => {
  return (
    <section className="home">
      <div className="content">
        <h2>Company Name</h2>
        <div className="map">
          <iframe
            src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d13266.44646200743!2d-84.3874304!3d33.7707008!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sus!4v1706747903651!5m2!1sen!2sus"
            width="600"
            height="450"
            style={{ border: '0' }}
            allowFullScreen
            loading="lazy"
            referrerPolicy="no-referrer-when-downgrade"
          />
        </div>
        <div className="details">
          <div className="rating-hours">
            <p>Rating:   4.5</p>
            <p>Hours:   9am -   5pm</p>
          </div>
          <div className="product-types">
            <h3>Product Types:</h3>
            <ul>
              <li>Fruits</li>
              <li>Vegetables</li>
              <li>Meat</li>
              <li>Turkey</li>
            </ul>
          </div>
        </div>
      </div>
    </section>
  );
};

export default Vendor;
