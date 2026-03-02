import React from "react";
import pointingArrowWhite from "../assets/pointing-arrow-white.svg";
import pointingArrowBlack from "../assets/pointing-arrow-black.svg";

function PlanCard({
  planName,
  planDescription,
  planPrice,
  feature,
  designFeatures,
  isFeatured,
  discountRate,
}) {
  const plansDiscountedPrice = planPrice - planPrice * (discountRate / 100);

  return (
    <div
      className={`w-[380px] h-[800px] border-2 border-[#FF734F] rounded-2xl ${
        isFeatured ? "border-[#000000] border-3 bg-[#FF734F]" : ""
      } max-[450px]:w-full max-[450px]:px-4 max-[450px]:min-h-[800px] max-[450px]:h-auto`}
    >
      <div
        className={`text-center w-full py-12 h-[160px] ${
          isFeatured ? "text-white" : ""
        } `}
      >
        <h3 className="text-3xl font-bold">{planName}</h3>
        <p className="mt-2 font-medium text-sm tracking-wider">
          {planDescription}
        </p>
      </div>

      <div
        className={`text-center w-[150px] mx-auto pt-4 pb-8 border-2 border-transparent border-b-[#FF734F] mb-10 ${
          isFeatured ? "border-b-[#ffffff] text-[#000000]" : ""
        }`}
      >
        <h4
          className={`text-4xl font-bold text-nowrap tracking-wide ${
            isFeatured ? "text-[#000000]" : "text-[#FF734F]"
          }`}
        >
          ${plansDiscountedPrice}
          {/* Render Original Amount - If Discount is given */}
          {planPrice !== plansDiscountedPrice && (
            <span className="text-base font-semibold ml-1">
              <strike>{planPrice}</strike>
            </span>
          )}
        </h4>

        <p
          className={`mt-1 font-bold text-sm ${
            isFeatured ? "text-[#000000]" : "text-[#FF734F]"
          }`}
        >
          PER MONTH
        </p>
      </div>

      <div
        className={`h-[240px] ${
          isFeatured ? "text-white" : ""
        } max-[450px]:min-h-[240px] max-[450px]:h-auto max-[450px]:my-4`}
      >
        <h4 className="text-base font-bold uppercase px-6 mb-1">
          WHAT&apos;S INCLUDED:
        </h4>
        {feature.map((data) => (
          <p key={data} className="text-base font-medium px-10 py-1">
            {data}.
          </p>
        ))}
      </div>

      <div
        className={`mt-5 ${
          isFeatured ? "text-white" : ""
        } max-[450px]:h-auto max-[450px]:my-4`}
      >
        <h4 className="text-base font-bold uppercase px-6 mb-1">Design Team</h4>
        {designFeatures.map((data) => (
          <p key={data} className="text-base font-medium px-10 py-1">
            {data}.
          </p>
        ))}
      </div>

      <button
        type="button"
        className={`border-2 border-black w-[280px] mx-auto mt-3 p-4 flex items-center justify-center gap-2 rounded-2xl active:scale-90 duration-300 transition-[transform] ${
          isFeatured ? "border-white text-white" : ""
        } max-[450px]:w-full max-[450px]:my-4`}
      >
        TRY FREE{" "}
        <img
          src={isFeatured ? pointingArrowWhite : pointingArrowBlack}
          alt="Right Side Arrow"
        />
      </button>
    </div>
  );
}

export default PlanCard;
