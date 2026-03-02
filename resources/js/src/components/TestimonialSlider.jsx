import React from "react";
import personIcon from "../assets/testimonial-person-icon.png";
import startQuote from "../assets/quote-start.svg";
import endQuote from "../assets/quote-end.svg";

function TestimonialSlider() {
  return (
    <div className="max-w-[1000px] flex flex-col items-center justify-center">
      <div className="mb-8 flex items-center justify-center gap-4 relative">
        <img
          src={startQuote}
          alt="Start Quote Mark"
          className="absolute w-[50px] h-[50px] top-[-16px] left-[-60px]  max-[900px]:w-[32px]  max-[900px]:h-[32px]  max-[900px]:left-[-28px]"
        />

        <img
          src={endQuote}
          alt="End Quote Mark"
          className="absolute w-[50px] h-[50px] bottom-[-24px] right-5  max-[900px]:w-[32px]  max-[900px]:h-[32px]  max-[900px]:bottom-[-8px]"
        />

        <p className="max-w-[700px] text-white text-center font-bold text-3xl max-[900px]:text-2xl max-[900px]:max-w-[500px]  max-[768px]:text-xl  max-[450px]:text-lg">
          UXpert helped identify the main pain points and designed a new UX that
          is accessible and easy to understand. The redesign pushed us forward
          on our mission to be able to verify 100% of IDs in real-time, and we
          raised over $100M in funding.
        </p>
      </div>

      <div className="mb-6 flex items-center text-white gap-4">
        <img src={personIcon} alt="Person Icon" className="w-[50px] h-[50px]" />

        <div>
          <p className="text-[#FF734F] font-bold uppercase text-lg">
            Erick Desoto
          </p>
          <p className="text-sm">VP of Product at Socure</p>
        </div>
      </div>

      <button
        type="button"
        className="h-12 px-8 mt-2 text-white uppercase text-sm font-bold tracking-wider bg-[#F86642] rounded-lg flex items-center hover:bg-[#F6F6F6] hover:text-[#F86642] duration-150 border-2 border-[#F86642] hover:border-[#F86642] hover:bg-transparent active:scale-95 transition-all"
      >
        see our case studies
      </button>
    </div>
  );
}

export default TestimonialSlider;
