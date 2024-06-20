<?php

namespace Exactum\Efac\Enums;

enum JsonSchemaFileNameEnum: string
{
    case FCE = 'fe-fc-v1.json';
    case CCF = 'fe-ccf-v3.json';
    case FSEE = 'fe-fse-v1.json';
    case CDE = 'fe-cd-v1.json';
    case CRE = 'fe-cr-v1.json';
    case NCE = 'fe-nc-v3.json';
    case NDE = 'fe-nd-v3.json';
    case FEXE = 'fe-fex-v1.json';
    case NRE = 'fe-nr-v3.json';
    case CANCELLATION = 'anulacion-schema-v2.json';
    case CONTINGENCY = 'contingencia-schema-v3.json';
}
