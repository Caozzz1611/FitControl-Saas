import React from "react";
import Tip from "../components/Tip";
import { faqTips } from "../scripts/tips";

function Tips() {
  return (
    <div className="bg-[#F6F6F6] flex justify-center">
      <div className="my-20 px-6 w-full max-w-[1440px] flex flex-col items-center justify-center gap-16 max-[768px]:gap-12">
        <h3 className="text-4xl font-bold capitalize max-[1024px]:text-center max-[768px]:text-3xl">
          How to know if <span className="text-[#FF734F]">UXpert</span> is right
          for your <span className="text-[#FF734F]">startup</span>
        </h3>

        <div className="w-full justify-center items-center flex flex-wrap gap-6 max-[1024px]:gap-5">
          {faqTips.map((data, index) => (
            <Tip
              key={index}
              position={index + 1}
              tip={data.tip}
              active={data.active}
            />
          ))}
        </div>
      </div>
    </div>
  );
}

export default Tips;
