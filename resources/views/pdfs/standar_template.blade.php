<!DOCTYPE html>
<html>
@php
    use Exactum\Efac\Services\External\ExternalService;
    use SimpleSoftwareIO\QrCode\Facades\QrCode;
    use Exactum\Efac\Efac;

    $linkData =
        'https://admin.factura.gob.sv/consultaPublica?ambiente=' .
        config('efac.external_env') .
        "&codGen={$dte->identificacion->codigoGeneracion}&fechaEmi=" .
        $dte->identificacion->fecEmi;
    $qrCodeBase64 = base64_encode(QrCode::errorCorrection('L')->format('png')->generate($linkData));
    $urlLogo = $photoEntity ? public_path($photoEntity) : public_path('img/email/app-logo.png');
@endphp

<head>
    <style>
        body {
            font-family: Verdana, Arial, sans-serif;
        }

        .page {
            /* border: 1px #000 solid; */
            background: white;
        }

        .general-info {
            text-align: center;
        }

        .title-document {
            font-weight: bold;
            margin-bottom: 2%;
        }

        .table-100 {
            width: 100%;
        }

        .td-50-left {
            width: 50%;
        }

        .td-50-right {
            width: 50%;
            text-align: right;
        }

        .indentification-info {
            font-size: 10px;
        }

        .table-info {
            font-size: 8px;
        }

        .bold-type {
            font-weight: bold;
        }

        .back-celest {
            background-color: #BCCCDC;
        }

        .back-blue {
            background-color: #829AB1;
        }

        .border-table {
            border-spacing: 0px;
        }

        .text-number-right {
            text-align: right;
        }

        .border-bottom-black {
            border-bottom: 1px #BCCCDC solid;
        }

        .border-top-black {
            border-top: 1px #BCCCDC solid;
        }

        .footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            text-align: right;
            font-size: 10px;
        }

        .table-45 {
            width: 45%;
            vertical-align: top;
        }
    </style>
</head>

<body>
    <div class="page">
        <div class="general-info">
            <div class="title-document">DOCUMENTO TRIBUTARIO ELECTRÓNICO</div>
            {{ ExternalService::getNameByGoesId('dte_types', $dte->identificacion->tipoDte) }}
        </div>
        <table class="table-100">
            <tr>
                <td class="td-50-left">
                    <img src="{{ $urlLogo }}" alt="enterprise Logo" style="max-width: 200px">
                </td>
                <td class="td-50-right">
                    <img src="data:image/png;base64,{{ $qrCodeBase64 }}" alt="QR Code">
                </td>
            </tr>
        </table>
        <hr style="width: 90%">
        <table class="table-100 indentification-info">
            <tr>
                <td class="td-50-left">
                    <table class="table-100 ">
                        <tr>
                            <td class="bold-type">Codigo de generacion:</td>
                            <td>{{ $dte->identificacion->codigoGeneracion }}</td>
                        </tr>
                        <tr>
                            <td class="bold-type">Número de Control:</td>
                            <td>{{ $dte->identificacion->numeroControl }}</td>
                        </tr>
                        <tr>
                            <td class="bold-type">Sello de recepción:</td>
                            <td>{{ $sealReception ?? '' }}</td>
                        </tr>
                    </table>
                </td>
                <td class="td-50-right">
                    <table class="table-100">
                        <tr>
                            <td class="bold-type">Módelo de Facturación:</td>
                            <td>{{ ExternalService::getNameByGoesId('model_types', $dte->identificacion->tipoModelo) }}
                            </td>
                        </tr>
                        <tr>
                            <td class="bold-type">Tipo de Transmisión:</td>
                            <td>{{ ExternalService::getNameByGoesId('operation_types', $dte->identificacion->tipoOperacion) }}
                            </td>
                        </tr>
                        <tr>
                            <td class="bold-type">Fecha y Hora de Generación:</td>
                            <td>{{ "{$dte->identificacion->fecEmi} {$dte->identificacion->horEmi}" }}</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <br>
        <table class="table-100">
            <tr>
                <td class="table-45">
                    <table class="indentification-info">
                        <thead>
                            <tr>
                                <td colspan="2" class="back-celest general-info">
                                    Emisor</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="bold-type">Nombre o razón social:</td>
                                <td>{{ $dte->emisor->nombre }}</td>
                            </tr>
                            <tr>
                                <td class="bold-type">NIT:</td>
                                <td>{{ $dte->emisor->nit }}</td>
                            </tr>
                            <tr>
                                <td class="bold-type">NRC:</td>
                                <td>{{ $dte->emisor->nrc }}</td>
                            </tr>
                            <tr>
                                <td class="bold-type">Actividad Económica:</td>
                                <td>{{ "{$dte->emisor->codActividad} - {$dte->emisor->descActividad}" }}</td>
                            </tr>
                            <tr>
                                <td class="bold-type">Dirección:</td>
                                <td>{{ $dte->emisor->direccion->complemento .
                                    ', ' .
                                    ExternalService::getCityNameByGoesId($dte->emisor->direccion->departamento, $dte->emisor->direccion->municipio) .
                                    ', ' .
                                    ExternalService::getNameByGoesId('departments', $dte->emisor->direccion->departamento) }}
                                </td>
                            </tr>
                            <tr>
                                <td class="bold-type">Numero de teléfono:</td>
                                <td>{{ $dte->emisor->telefono }}</td>
                            </tr>
                            <tr>
                                <td class="bold-type">Correo electrónico:</td>
                                <td>{{ $dte->emisor->correo }}</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td class="table-45">
                    <table class="indentification-info">
                        <thead>
                            <tr>
                                <td colspan="2" class="back-celest general-info">
                                    Receptor</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="bold-type">Nombre o razón social:</td>
                                <td>{{ $dte->receptor->nombre }}</td>
                            </tr>
                            <tr>
                                <td class="bold-type">
                                    {{ ExternalService::getNameByGoesId('doc_client_types', $dte->receptor->tipoDocumento ?? null) ?? 'NIT' }}:
                                </td>
                                <td>{{ $dte->receptor->numDocumento ?? ($dte->receptor->nit ?? '') }}</td>
                            </tr>
                            <tr>
                                <td class="bold-type">NRC:</td>
                                <td>{{ $dte->receptor->nrc }}</td>
                            </tr>
                            <tr>
                                <td class="bold-type">Actividad Económica:</td>
                                <td>{{ "{$dte->receptor->codActividad} - {$dte->receptor->descActividad}" }}</td>
                            </tr>
                            @if (isset($dte->receptor->direccion))
                                <tr>
                                    <td class="bold-type">Dirección:</td>
                                    @if (ExternalService::getAddressDte($dte->identificacion->codigoGeneracion))
                                    <td>
                                        {{ $dte->receptor->direccion->complemento }}
                                    </td>
                                    @else 
                                    <td>{{ $dte->receptor->direccion->complemento .
                                        ', ' .
                                        ExternalService::getCityNameByGoesId(
                                            $dte->receptor->direccion->departamento,
                                            $dte->receptor->direccion->municipio,
                                        ) .
                                        ', ' .
                                        ExternalService::getNameByGoesId('departments', $dte->receptor->direccion->departamento) }}
                                    </td>
                                    @endif
                                </tr>
                            @endif
                            <tr>
                                <td class="bold-type">Numero de teléfono:</td>
                                <td>{{ $dte->receptor->telefono }}</td>
                            </tr>
                            <tr>
                                <td class="bold-type">Correo electrónico:</td>
                                <td>{{ $dte->receptor->correo }}</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </table>
        @if ($dte->otrosDocumentos ?? false)
            <br>
            <table class="table-100 border-table indentification-info">
                <tr>
                    <td colspan="2" class="bold-type">Otros documentos asociados</td>
                </tr>
                <thead class="back-blue">
                    <tr>
                        <td>Identificación del documento</td>
                        <td>Descripción</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dte->otrosDocumentos as $otherDocument)
                        <tr>
                            <td>{{ $otherDocument->descDocumento }}</td>
                            <td>{{ $otherDocument->detalleDocumento }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
        @if ($dte->ventaTercero)
            <br>
            <table class="table-100 border-table indentification-info">
                <tr>
                    <td colspan="2" class="bold-type">Venta a cuenta de terceros</td>
                </tr>
                <thead class="back-blue">
                    <tr>
                        <td>NIT</td>
                        <td>Nombre/denominacion/Razón Social</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $dte->ventaTercero->nit }}</td>
                        <td>{{ $dte->ventaTercero->nombre }}</td>
                    </tr>
                </tbody>
            </table>
        @endif
        @if ($dte->documentoRelacionado)
            <br>
            <table class="table-100 border-table indentification-info">
                <tr>
                    <td colspan="3" class="bold-type">Documentos relacionados</td>
                </tr>
                <thead class="back-blue">
                    <tr>
                        <td>Tipo de documento</td>
                        <td>Nº de documento</td>
                        <td>Fecha de documento</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dte->documentoRelacionado as $relatedDocument)
                        <tr>
                            <td>{{ ExternalService::getNameByGoesId('dte_types', $relatedDocument->tipoDocumento) }}
                            </td>
                            <td>{{ $relatedDocument->numeroDocumento }}</td>
                            <td>{{ $relatedDocument->fechaEmision }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
        <br>
        <table class="table-100 border-table table-info">
            <thead class="back-blue general-info">
                <tr>
                    <td style="width: 2%">Nº</td>
                    <td style="width: 6%">Codigo</td>
                    <td style="width: 4%">Cant.</td>
                    <td style="width: 5%">Unidad</td>
                    <td style="width: 25%">Descripción</td>
                    <td style="width: 6%;" class="text-number-right">Precio unitario</td>
                    <td style="width: 6%;" class="text-number-right">Descuento <br> por Item</td>
                    <td style="width: 7%;" class="text-number-right">Ventas <br> no sujetas</td>
                    <td style="width: 7%;" class="text-number-right">Ventas <br> exentas</td>
                    <td style="width: 7%;" class="text-number-right">Ventas <br> gravadas</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($dte->cuerpoDocumento as $bodyItem)
                    <tr>
                        <td>{{ $bodyItem->numItem }}</td>
                        <td>{{ $bodyItem->codigo }}</td>
                        <td class="general-info">{{ formatTwoDecimals($bodyItem->cantidad) }}</td>
                        <td class="general-info">
                            {{ ExternalService::getNameByGoesId(Efac::measurementUnitTable(), $bodyItem->uniMedida) }}
                        </td>
                        <td>{{ $bodyItem->descripcion }}</td>
                        <td class="text-number-right">${{ formatTwoDecimals($bodyItem->precioUni) }}</td>
                        <td class="text-number-right">${{ formatTwoDecimals($bodyItem->montoDescu) }}</td>
                        <td class="text-number-right">${{ formatTwoDecimals($bodyItem->ventaNoSuj) }}</td>
                        <td class="text-number-right">${{ formatTwoDecimals($bodyItem->ventaExenta) }}</td>
                        <td class="text-number-right">${{ formatTwoDecimals($bodyItem->ventaGravada) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        <table class="table-100 border-table indentification-info">
            <tr>
                <td style="width: 45%"></td>
                <td style="width: 10%"></td>
                <td style="width: 45%"></td>
            </tr>
            <tr>
                <td>
                    <table class="table-100">
                        <tr>
                            <td>Total en letras:</td>
                            <td>{{ $dte->resumen->totalLetras }}</td>
                        </tr>
                        <tr>
                            <td>Observaciones:</td>
                            <td>{{ $dte->extension->observaciones ?? '' }}</td>
                        </tr>
                        @if ($dte->resumen->condicionOperacion ?? false)
                            <tr>
                                <td>Condición de la operacion:</td>
                                <td>{{ ExternalService::getNameByGoesId('operation_conditions', $dte->resumen->condicionOperacion) }}
                                </td>
                            </tr>
                        @endif
                        @if ($dte->receptor->bienTitulo ?? false)
                            <tr>
                                <td>Título al que se remiten los bienes:</td>
                                <td>{{ ExternalService::getNameByGoesId('property_objects', $dte->receptor->bienTitulo) }}
                                </td>
                            </tr>
                        @endif
                    </table>
                    <br>
                    <table class="table-100 border-table">
                        <thead class="back-celest general-info">
                            <tr>
                                <td colspan="2">Extension</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Nombre entrega:</td>
                                <td>{{ $dte->extension->nombEntrega ?? '' }}</td>
                            </tr>
                            <tr>
                                <td>Nº documento:</td>
                                <td>{{ $dte->extension->docuEntrega ?? '' }}</td>
                            </tr>
                            <tr>
                                <td>Nombre recibe:</td>
                                <td>{{ $dte->extension->nombRecibe ?? '' }}</td>
                            </tr>
                            <tr>
                                <td>Nº documento:</td>
                                <td>{{ $dte->extension->docuRecibe ?? '' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </td>
                <td></td>
                <td>
                    <table class="table-100 border-table">
                        <thead class="back-celest general-info">
                            <tr>
                                <td colspan="2">Resumen total de operaciones</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Total no sujeto</td>
                                <td class="text-number-right">${{ formatTwoDecimals($dte->resumen->totalNoSuj) }}</td>
                            </tr>
                            <tr>
                                <td>Total exento</td>
                                <td class="text-number-right">${{ formatTwoDecimals($dte->resumen->totalExenta) }}</td>
                            </tr>
                            <tr>
                                <td>Total gravado</td>
                                <td class="text-number-right">${{ formatTwoDecimals($dte->resumen->totalGravada) }}
                                </td>
                            </tr>
                            <tr>
                                <td class="border-bottom-black">Sub-total ventas</td>
                                <td class="text-number-right border-bottom-black">
                                    ${{ formatTwoDecimals($dte->resumen->subTotalVentas) }}
                                </td>
                            </tr>
                            <tr>
                                <td>Descuento global no sujeto</td>
                                <td class="text-number-right">${{ formatTwoDecimals($dte->resumen->descuNoSuj) }}</td>
                            </tr>
                            <tr>
                                <td>Descuento global exento</td>
                                <td class="text-number-right">${{ formatTwoDecimals($dte->resumen->descuExenta) }}</td>
                            </tr>
                            <tr>
                                <td>Descuento global gravado</td>
                                <td class="text-number-right">${{ formatTwoDecimals($dte->resumen->descuGravada) }}
                                </td>
                            </tr>
                            <tr>
                                <td class="border-bottom-black">Total descuentos</td>
                                <td class="text-number-right border-bottom-black">
                                    ${{ formatTwoDecimals($dte->resumen->totalDescu) }}
                                </td>
                            </tr>
                            <tr class="bold-type">
                                <td class="border-bottom-black">Sub-total</td>
                                <td class="text-number-right border-bottom-black">
                                    ${{ formatTwoDecimals($dte->resumen->subTotal) }}
                                </td>
                            </tr>
                            @foreach ($dte->resumen->tributos ?? collect() as $tribute)
                                <tr>
                                    <td>{{ "$tribute->codigo - $tribute->descripcion" }}</td>
                                    <td class="text-number-right">${{ formatTwoDecimals($tribute->valor) }}</td>
                                </tr>
                            @endforeach
                            @if ($dte->resumen->ivaRete1 ?? false)
                                <tr>
                                    <td class="border-top-black">IVA retenido</td>
                                    <td class="text-number-right border-top-black">
                                        ${{ formatTwoDecimals($dte->resumen->ivaRete1) }}
                                    </td>
                                </tr>
                            @endif
                            @if ($dte->resumen->reteRenta ?? false)
                                <tr>
                                    <td>Renta retenida</td>
                                    <td class="text-number-right">${{ formatTwoDecimals($dte->resumen->reteRenta) }}
                                    </td>
                                </tr>
                            @endif
                            <tr>
                                <td class="border-bottom-black">Monto total de la operación</td>
                                <td class="text-number-right border-bottom-black">
                                    ${{ formatTwoDecimals($dte->resumen->montoTotalOperacion) }}
                                </td>
                            </tr>
                            @if ($dte->resumen->totalPagar ?? false)
                                <tr class="bold-type">
                                    <td>Total a pagar</td>
                                    <td class="text-number-right">${{ formatTwoDecimals($dte->resumen->totalPagar) }}
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </td>
            </tr>
        </table>
        @if ($dte->apendice)
            <br>
            <table class="table-100 border-table indentification-info">
                <thead class="back-celest general-info">
                    <tr>
                        <td colspan="2">Apéndice</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dte->apendice as $appendix)
                        <tr>
                            <td>{{ $appendix->etiqueta }}</td>
                            <td>{{ $appendix->valor }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
        <div class="footer">
            Pagina 1 de 1
        </div>
    </div>
</body>

</html>
