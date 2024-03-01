// src/components/Register.js
import React from 'react';


const Register = () => {
  return (
    <form className="form">
      <h2>Register</h2>
      <div className="input-box">
        <input type="text" required />
        <label>First and Last Name</label>
      </div>
      <div className="input-box">
        <input type="text" required />
        <label>Company Name</label>
      </div>
      <div className="input-box">
        <input type="text" required />
        <label>Address</label>
      </div>
      <div className="input-box">
        <input type="tel" required />
        <label>Phone Number</label>
      </div>
      <div className="input-box">
        <input type="text" required />
        <label>Hours of Operation</label>
      </div>
      <div className="input-box">
        <input type="text" required />
        <label>Social Media</label>
      </div>
      <input type="submit" value="Register Now" className="btn" />
      <div className="login-register">
        <p>Already have an account? <a href="/login" className="login-link">Login</a></p>
      </div>
    </form>
  );
};

export default Register;
