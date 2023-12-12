<?php

namespace App\Enums;

enum InscriptionTypeEnum: string
{

    case PRESENCIAL = "presencial";
    case REMOTO = "virtual";
    case HIBRIDO = "hibrido";

}