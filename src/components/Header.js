// src/components/Header.js
import React, { useState } from 'react';
 

const Header = () => {
  const [dropdownOpen, setDropdownOpen] = useState(false);

  const toggleDropdown = () => {
    setDropdownOpen(!dropdownOpen);
  };

  const closeDropdown = () => {
    setDropdownOpen(false);
  };

  return (
    <header className="header">
      <h1 className="title">Food Oasis</h1>
      <div className="dropdown-menu" onClick={toggleDropdown}>
        <button className="menu">
          <span className="hamburger-icon">&#9776;</span>
        </button>
        <div className={`dropdown-content ${dropdownOpen ? 'show' : ''}`} onClick={closeDropdown}>
          <a href="/">Home</a>
          <a href="/about">About Us</a>
          <a href="/find-food">Find Food</a>
          <a href="/register">Register</a>
          <a href="/login">Login</a>
        </div>
      </div>
    </header>
  );
};

export default Header;
