// src/components/Login.js
import React from 'react';


const Login = () => {
  return (
    <form className="form">
      <h2>Login</h2>
      <div className="input-box">
        <input type="email" required />
        <label>Email</label>
      </div>
      <div className="input-box">
        <input type="password" required />
        <label>Password</label>
      </div>
      <input type="submit" value="Login" className="btn" />
      <div className="login-register">
        <p>Don't have an account? <a href="/register" className="login-link">Register Now</a></p>
      </div>
    </form>
  );
};

export default Login;
