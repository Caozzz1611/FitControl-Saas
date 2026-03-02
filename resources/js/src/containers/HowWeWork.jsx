import React from "react";
import { signingUpSteps } from "../scripts/signingUpSteps";
import SignUpStepsCard from "../components/SignUpStepsCard";

function HowWeWork() {
  return (
    <div className="flex justify-center" id="operations">
      <div className="py-10 px-6 pb-20 max-w-[1440px] flex flex-col justify-center items-center gap-10 max-[768px]:gap-8">
        <h2 className="text-black font-bold text-4xl capitalize text-center max-w-[1000px] max-[768px]:text-3xl">
          How <span className="text-[#FF734F] capitalize">Signing Up</span> with
          The Design Project{" "}
          <span className="text-[#FF734F] capitalize">Works</span> !?
        </h2>

        <p className="text-black text-center max-w-[1000px]">
          Take a minute to imagine how you&apos;d feel watching your user count
          grow, and retention rates stay consistently high. When you prioritize
          effective UX, better retention and growth are natural consequences.
          Backed by countless hours of research and testing, UXpert blends UX,
          UI, and Product design into a deliciously smooth process that fuels
          productivity and success.
        </p>

        <div className="mt-10 w-full flex items-start justify-center gap-8 flex-wrap max-[768px]:mt-6">
          {signingUpSteps.map((data, index) => (
            <SignUpStepsCard key={data.title} index={index + 1} {...data} />
          ))}
        </div>
      </div>
    </div>
  );
}

export default HowWeWork;
