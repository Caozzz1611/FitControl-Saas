import React from "react";
import brandA16z from "../assets/brand-a16z.svg";
import brandAccel from "../assets/brand-accel.svg";
import brandSequioia from "../assets/brand-sequioia.svg";
import brandYCombinator from "../assets/brand-y_combinator.svg";

function Customers() {
  return (
    <div className="flex justify-center bg-[#292526]">
      <div className="min-h-[350px] max-w-[1440px] w-full px-6 flex items-center justify-center flex-col gap-[50px] max-[1024px]:h-auto max-[1024px]:py-10 max-[768px]:gap-8">
        <h2 className="text-white text-[36px] font-bold text-center max-[768px]:text-2xl tracking-wide">
          We helped our customers raise{" "}
          <span className="text-[#FF734F]">$1B+</span>
        </h2>

        <div className="flex items-center justify-center gap-3 flex-wrap">
          <img
            src={brandYCombinator}
            alt="Brand A16z Logo"
            className="w-[250px] h-[100px] max-[768px]:h-[75px]"
          />

          <div className="min-w-[1px] h-[60px] bg-[#FF734F] max-[798px]:hidden"></div>

          <img
            src={brandSequioia}
            alt="Brand A16z Logo"
            className="w-[250px] h-[100px] max-[768px]:h-[75px]"
          />

          <div className="min-w-[1px] h-[60px] bg-[#FF734F] max-[798px]:hidden"></div>

          <img
            src={brandAccel}
            alt="Brand A16z Logo"
            className="w-[200px] h-[100px] max-[768px]:h-[75px]"
          />

          <div className="min-w-[1px] h-[60px] bg-[#FF734F] max-[1023px]:invisible max-[798px]:hidden"></div>

          <img
            src={brandA16z}
            alt="Brand A16z Logo"
            className="w-[200px] h-[100px] max-[768px]:h-[75px]"
          />
        </div>
      </div>
    </div>
  );
}

export default Customers;
