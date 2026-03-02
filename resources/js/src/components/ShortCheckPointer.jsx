import React from "react";
import orangeTick from "../assets/orange-tick.png";

function ShortCheckPointer({ text }) {
  return (
    <div className="flex items-center gap-2">
      <img src={orangeTick} alt="Orange Tick Mark" />
      <span className="font-bold text-black">{text}</span>
    </div>
  );
}

export default ShortCheckPointer;
