<?php

namespace Exactum\Efac\Enums;

enum JsonSchemaFileNameEnum: string
{
    // Legacy — se mantienen para compatibilidad con documentos y PDFs existentes
    case FCE        = 'fe-fc-v1.json';
    case CCF        = 'fe-ccf-v3.json';
    case FSEE       = 'fe-fse-v1.json';
    case CDE        = 'fe-cd-v1.json';
    case CRE        = 'fe-cr-v1.json';
    case NCE        = 'fe-nc-v3.json';
    case NDE        = 'fe-nd-v3.json';
    case FEXE       = 'fe-fex-v1.json';
    case NRE        = 'fe-nr-v3.json';
    case CANCELLATION  = 'anulacion-schema-v2.json';
    case CONTINGENCY   = 'contingencia-schema-v3.json';

    // Versiones actuales
    case FCE_V2        = 'fe-f-v2.json';
    case CCF_V4        = 'fe-ccf-v4.json';
    case FSEE_V2       = 'fe-fse-v2.json';
    case CDE_V2        = 'fe-cd-v2.json';
    case CRE_V2        = 'fe-cr-v2.json';
    case CLE_V2        = 'fe-cl-v2.json';
    case DCLE_V2       = 'fe-dcl-v2.json';
    case NCE_V4        = 'fe-nc-v4.json';
    case NDE_V4        = 'fe-nd-v4.json';
    case NRE_V4        = 'fe-nr-v4.json';
    case FEXE_V3       = 'fe-fex-v3.json';
    case CANCELLATION_V3 = 'invalidacion-schema-v3.json';
    case CONTINGENCY_V4  = 'contingencia-schema-v4.json';

    // Nuevos eventos (solo en versión actual)
    case EGES_V1       = 'fe-eges-v1.json';
    case EOP_V1        = 'fe-eop-v1.json';
    case ERET_V1       = 'fe-eret-v1.json';

    /**
     * Resuelve el schema correcto según el goes_id del DteType y su last_version.
     * Si no hay versión nueva disponible, devuelve el schema legacy correspondiente.
     */
    public static function resolve(string $goesId, int $version): self
    {
        return match ($goesId) {
            '01' => $version >= 2 ? self::FCE_V2        : self::FCE,
            '03' => $version >= 4 ? self::CCF_V4        : self::CCF,
            '04' => $version >= 4 ? self::NRE_V4        : self::NRE,
            '05' => $version >= 4 ? self::NCE_V4        : self::NCE,
            '06' => $version >= 4 ? self::NDE_V4        : self::NDE,
            '07' => $version >= 2 ? self::CRE_V2        : self::CRE,
            '08' => $version >= 2 ? self::CLE_V2        : self::CLE_V2,
            '09' => $version >= 2 ? self::DCLE_V2       : self::DCLE_V2,
            '11' => $version >= 3 ? self::FEXE_V3       : self::FEXE,
            '14' => $version >= 2 ? self::FSEE_V2       : self::FSEE,
            '15' => $version >= 2 ? self::CDE_V2        : self::CDE,
            default => self::FCE,
        };
    }
}
