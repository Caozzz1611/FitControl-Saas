import React, { useState } from "react";
import logo from "../assets/logo.svg";
import "../assets/hamburgers.css";

function Navbar() {
  const [isNavActive, setIsNavActive] = useState(false);

  const handleNavButtonClick = () => {
    document.body.style.overflow = isNavActive ? "auto" : "hidden";
    setIsNavActive(!isNavActive);
  };

  return (
    <div
      className="h-[80px] flex justify-between items-center gap-6"
      role="navigation"
    >
      <div className="h-16 cursor-pointer">
        <a href="/" className="flex items-center gap-0 font-lobster">
          <img src={logo} alt="UXpert" className="h-16 w-16" />{" "}
          <span className="text-2xl font-bold text-[#F24E1E] tracking-wider">
            LOGO<span className="text-[#1D1D1D] font-montserrat"></span>
          </span>
        </a>
      </div>

      <ul className="flex items-center gap-[36px] text-black font-bold tracking-wide max-[950px]:hidden">
        <li className="hover:text-[#FF734F] hover:cursor-pointer transition-colors duration-300 text-nowrap">
          <a href="/admin/login">INICIAR SESION </a>
        </li>
        <li className="hover:text-[#FF734F] hover:cursor-pointer transition-colors duration-300 text-nowrap">
          <a href="/solicitar-acceso">SOLICITAR ACCESO</a>
        </li>
        <li className="hover:text-[#FF734F] hover:cursor-pointer transition-colors duration-300 text-nowrap">
          <a href="#work">APLICATIVO</a>
        </li>
        <li className="hover:text-[#FF734F] hover:cursor-pointer transition-colors duration-300 text-nowrap">
          <a href="#pricing">PRECIOS</a>
        </li>
        <li className="hover:text-[#FF734F] hover:cursor-pointer transition-colors duration-300 text-nowrap">
          <a href="#faq">PQR&apos;s</a>
        </li>
      </ul>

      <a
  href="/solicitar-acceso"
  className="h-11 px-6 text-white text-nowrap font-bold tracking-wider bg-[#F86642] rounded-lg flex items-center hover:bg-[#F6F6F6] hover:text-[#F86642] duration-150 border-2 border-[#E0EAF3] hover:border-[#F86642] active:scale-95 transition-all max-[950px]:hidden"
>
  COMIENZA YA!
</a>

      {/* Mobile Nav Humburger Icon */}
      <button
        type="button"
        className={`hamburger hamburger--emphatic ${isNavActive ? "is-active" : ""
          } min-[950px]:hidden`}
        onClick={handleNavButtonClick}
      >
        <span className="hamburger-box">
          <span className="hamburger-inner"></span>
        </span>
      </button>

      {/* Mobile Nav */}
      {isNavActive && (
        <div className="min-h-[100%] w-full bg-[#E0EAF3] absolute top-[80px] left-0 min-[950px]:hidden">
          <ul className="flex flex-col items-center gap-8 text-2xl font-bold text-[#1D1D1D] tracking-wider mt-16 pb-20">
            <li className="hover:text-[#FF734F]" onClick={handleNavButtonClick}>
              <a href="#operations">HOW IT WORKS</a>
            </li>
            <li className="hover:text-[#FF734F]" onClick={handleNavButtonClick}>
              <a href="#about">ABOUT</a>
            </li>
            <li className="hover:text-[#FF734F]" onClick={handleNavButtonClick}>
              <a href="#work">WORK</a>
            </li>
            <li className="hover:text-[#FF734F]" onClick={handleNavButtonClick}>
              <a href="#pricing">PRICING</a>
            </li>
            <li className="hover:text-[#FF734F]" onClick={handleNavButtonClick}>
              <a href="#faq">FAQ&apos;s</a>
            </li>
          </ul>
        </div>
      )}
    </div>
  );
}

export default Navbar;
