import React from "react";
import testimonialImg1 from "../assets/testimonial-img-1.png";
import testimonialImg2 from "../assets/testimonial-img-2.png";
import testimonialImg3 from "../assets/testimonial-img-3.png";
import TestimonialSlider from "../components/TestimonialSlider";

function Testimonials() {
  return (
    <div className="bg-[#292526] flex justify-center" id="work">
      <div className="pt-20 pb-12 px-6 w-full max-w-[1440px] flex flex-col items-center gap-14  max-[900px]:gap-10">
        <h3 className="max-w-[1000px] capitalize font-bold text-4xl text-white text-center  max-[768px]:text-3xl">
          How <span className="text-[#FF734F]">accessible</span> UX design is
          changing the <span className="text-[#FF734F]">businesses</span> for
          the better
        </h3>

        <div className="max-w-[1100px] px-16 flex flex-col gap-10  max-[900px]:px-0">
          <img
            src={testimonialImg1}
            alt="Product Design UI Sample 1"
            className="w-full"
          />
          <img
            src={testimonialImg2}
            alt="Product Design UI Sample 2"
            className="w-full"
          />
          <img
            src={testimonialImg3}
            alt="Product Design UI Sample 3"
            className="w-full"
          />
        </div>

        <TestimonialSlider />
      </div>
    </div>
  );
}

export default Testimonials;
