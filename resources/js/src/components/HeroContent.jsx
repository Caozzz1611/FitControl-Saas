import React from "react";
import ShortCheckPointer from "./ShortCheckPointer";
import devsTeam from "../assets/devs-team.png";

function HeroContent() {
  return (
    <div
      className="flex justify-center items-center flex-col w-full max-[768px]:gap-2"
      role="main"
    >
      <h1 className="max-w-[985px] mt-[50px] text-center text-[#1D1D1B] font-bold text-5xl capitalize max-[768px]:text-4xl max-[450px]:text-2xl">
        A UI/UX design subscription so{" "}
        <span className="text-[#FF734F]">good</span> it should come with a{" "}
        <span className="text-[#FF734F]">warning</span> label
      </h1>

      <div className="mt-[40px] flex justify-center items-center gap-10 max-[768px]:flex-wrap max-[768px]:gap-2">
        <ShortCheckPointer text={"No hiring headaches"} />
        <ShortCheckPointer text={"Weekly turnaround times"} />
        <ShortCheckPointer text={"One flat monthly rate"} />
      </div>

      <button
        type="button"
        className="mt-6 uppercase text-white font-bold px-4 py-2 bg-gradient-to-r from-[#F86642BF] to-[#F86642E5] rounded-lg hover:bg-transparent duration-150 active:scale-95 transition-all"
      >
        start your risk free trial
      </button>

      <img
        src={devsTeam}
        alt="Our Developers Team Sticker"
        className="w-[770px] mt-4"
      />
    </div>
  );
}

export default HeroContent;
