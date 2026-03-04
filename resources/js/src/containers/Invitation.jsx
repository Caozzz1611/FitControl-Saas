import React from "react";
import foundersTeam from "../assets/founders-team.png";

function Invitation() {
  return (
    <div className="bg-[#F6F6F6] flex justify-center ">
      <div className="w-full max-w-[1440px] px-6 flex flex-col justify-center items-center gap-8">
        
        <h3 className="mt-16 capitalize font-bold text-5xl max-w-[600px] text-center max-[768px]:text-3xl">
          Llevemos tu <span className="text-[#FF734F]">club</span> al siguiente{" "}
          <span className="text-[#FF734F]">nivel</span>
        </h3>

        <p className="text-sm max-[768px]:text-center">
          Prueba FitControl gratis durante 7 días. Sin riesgos y con cancelación en cualquier momento.
        </p>

        <a
          href="/solicitar-acceso"
          className="h-12 px-14 mt-2 text-white text-sm font-bold tracking-wider bg-[#F86642] rounded-lg flex items-center justify-center hover:bg-[#F6F6F6] hover:text-[#F86642] duration-150 border-2 border-[#E0EAF3] hover:border-[#F86642] active:scale-95 transition-all"
        >
          SOLICITA TU DEMO
        </a>

        <img
          src={foundersTeam}
          alt="Equipo deportivo utilizando FitControl"
          className="w-[600px]"
        />
      </div>
    </div>
  );
}

export default Invitation;