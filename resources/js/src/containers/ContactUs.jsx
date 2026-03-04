import React from "react";

function ContactUs() {
  return (
    <div className="flex justify-center">
      <div className="p-10 px-6 w-full max-w-[1440px] flex flex-col justify-center items-center gap-4">
        <h3 className="text-2xl font-bold inline-block text-center border-t-black border-transparent border-2 pt-10">
         Hey! Necesita un plan personalizado?{" "}
          <span className="text-[#F86642]">Contactanos!</span>
        </h3>

        <p className="text-black tracking-wide text-center">
            Prueba FitControl gratis durante 7 días. Si no te convence, puedes cancelar sin compromiso.
          </p>

        <button
          type="button"
          className="h-12 px-8 mt-7 text-white uppercase text-sm font-bold tracking-wider bg-[#F86642] rounded-lg flex items-center hover:bg-[#F6F6F6] hover:text-[#F86642] duration-150 border-2 border-[#F86642] hover:border-[#F86642] active:scale-95 transition-all"
        >
          COMIENZA
        </button>
      </div>
    </div>
  );
}

export default ContactUs;
