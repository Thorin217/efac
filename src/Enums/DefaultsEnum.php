<?php

namespace Exactum\Efac\Enums;

enum DefaultsEnum: string
{
    case CodeOutlet = '0000';
    case NameSubsidiary = 'Establecimiento por defecto de ';
    case NameSalePoint = 'Punto de venta por defecto de ';
    case DefaultItemDescription = 'Efectivo';
    case PerPage = '5';
    case MessageErrorJsonSchema =  'El documento no cumple con la estructura de validacion local';
    case MessageErrorSigner = 'Error al intentar firmar el documento';
    case MessageContigency = 'El documento fue validado en contingencia.';
    case SessionNameKey = 'entity_id';
    case StandarDateFormat = 'Y-m-d H:i:s';
    case StatsOrderDate = 'stats';
}
