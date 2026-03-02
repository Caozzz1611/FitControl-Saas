import React from "react";
import emailIcon from "../assets/email-icon.svg";
import linkedinIcon from "../assets/linkedin-icon.svg";
import instagramIcon from "../assets/instagram-icon.svg";

function Footer() {
  return (
    <div className="flex justify-center bg-[#1D1D1D] text-white">
      <div className="h-[400px] max-w-[1440px] px-6 w-full flex justify-around items-center max-[850px]:flex-col max-[850px]:items-start max-[850px]:justify-between max-[850px]:gap-12 max-[850px]:py-10 max-[850px]:h-auto">
        <div className="flex flex-col gap-12 max-[850px]:gap-6">
          <h3 className="font-lobster font-bold text-5xl">
            the design project
          </h3>

          <div className="flex gap-6 flex-wrap max-[850px]:gap-4">
            <div className="flex gap-4 items-center cursor-pointer text-nowrap">
              <img src={emailIcon} alt="Email Icon" />{" "}
              <span className="border-[#1D1D1D] hover:text-[#FF734F] border-b hover:border-[#FF734F] transition-all">
                <a href="https://github.com/Alkaison">hello@designproject</a>
              </span>
            </div>

            <div className="flex gap-4 items-center cursor-pointer text-nowrap">
              <img src={instagramIcon} alt="Instagram Icon" />{" "}
              <span className="border-[#1D1D1D] hover:text-[#FF734F] border-b hover:border-[#FF734F] transition-all">
                <a href="https://github.com/Alkaison">@designproject</a>
              </span>
            </div>

            <div className="flex gap-4 items-center cursor-pointer text-nowrap">
              <img src={linkedinIcon} alt="LinkedIn Icon" />{" "}
              <span className="border-[#1D1D1D] hover:text-[#FF734F] border-b hover:border-[#FF734F] transition-all">
                <a href="https://github.com/Alkaison">The Design Project</a>
              </span>
            </div>
          </div>
        </div>

        <div>
          <ul className="text-right flex gap-4 flex-col max-[850px]:text-left">
            <li className="hover:text-[#FF734F] cursor-pointer transition-all uppercase font-bold">
              <a href="#operations">HOW IT WORKS</a>
            </li>
            <li className="hover:text-[#FF734F] cursor-pointer transition-all uppercase font-bold">
              <a href="#about">ABOUT US</a>
            </li>
            <li className="hover:text-[#FF734F] cursor-pointer transition-all uppercase font-bold">
              <a href="#work">OUR WORK</a>
            </li>
            <li className="hover:text-[#FF734F] cursor-pointer transition-all uppercase font-bold">
              <a href="#pricing">PRICING</a>
            </li>
            <li className="hover:text-[#FF734F] cursor-pointer transition-all uppercase font-bold">
              <a href="#faq">FAQ&apos;s</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  );
}

export default Footer;
