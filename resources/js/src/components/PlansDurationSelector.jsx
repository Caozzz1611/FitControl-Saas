import React from "react";

// Buttons
function PlansDurationSelectorButton({
  duration,
  currentPlanDuration,
  handleCurrentPlanDurationUpdate,
  className,
  text,
}) {
  return (
    <button
      type="button"
      className={`text-black font-bold tracking-wide uppercase h-[44.5px] px-4 py-2 relative ${className} ${
        currentPlanDuration === duration ? "text-white bg-black" : ""
      } max-[410px]:text-sm max-[410px]:px-2 max-[410px]:py-1`}
      onClick={() => handleCurrentPlanDurationUpdate(duration)}
    >
      {duration.toUpperCase()}{" "}
      <span className="absolute top-[-28px] left-[20%] text-sm text-[#FF734F] text-nowrap max-[410px]:text-xs">
        {text}
      </span>
    </button>
  );
}

// Container for Buttons
function PlansDurationSelector({
  currentPlanDuration,
  handleCurrentPlanDurationUpdate,
}) {
  return (
    <div className="py-20 pb-10 w-full flex justify-center items-center">
      <div className="h-[46px] border border-[#FF734F] rounded-[9px] max-[410px]:text-nowrap">
        <PlansDurationSelectorButton
          duration="monthly"
          currentPlanDuration={currentPlanDuration}
          handleCurrentPlanDurationUpdate={handleCurrentPlanDurationUpdate}
          className="border border-[#FF734F] rounded-l-lg"
        />
        <PlansDurationSelectorButton
          duration="quarterly"
          currentPlanDuration={currentPlanDuration}
          handleCurrentPlanDurationUpdate={handleCurrentPlanDurationUpdate}
          className="border border-[#FF734F]"
          text="SAVE 10%"
        />
        <PlansDurationSelectorButton
          duration="yearly"
          currentPlanDuration={currentPlanDuration}
          handleCurrentPlanDurationUpdate={handleCurrentPlanDurationUpdate}
          className="border border-[#FF734F] rounded-r-lg"
          text="SAVE 15%"
        />
      </div>
    </div>
  );
}

export default PlansDurationSelector;
