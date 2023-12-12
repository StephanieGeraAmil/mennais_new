<?php

namespace App\Enums;

enum InscriptionTypeEnum: string
{

    case PRESENCIAL = "presencial";
    case REMOTO = "virtual";
    case HIBRIDO = "hibrido";

    public function text(){
        return match($this){
            Self::PRESENCIAL => "presencial",
            Self::REMOTO => "Parcial",
            Self::HIBRIDO => "Completo",
        };
    }


}