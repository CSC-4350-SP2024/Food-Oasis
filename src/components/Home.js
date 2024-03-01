// src/components/Home.js
import React from 'react';
import GoogleMapComponent from './GoogleMap';


const Home = () => {
  return (
    <section className="home">
      <h2>Welcome to Food Oasis!</h2>
      <GoogleMapComponent />
    </section>
  );
};

export default Home;
