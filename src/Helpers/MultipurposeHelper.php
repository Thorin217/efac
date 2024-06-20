<?php

use Exactum\Efac\Enums\DefaultsEnum;
use Exactum\Efac\Exceptions\FailedSendException;
use JsonSchema\Constraints\Constraint;
use JsonSchema\Validator;
use NumberToWords\NumberToWords;

if (!function_exists('validateWithJsonSchema')) {
    function validateWithJsonSchema($jsonResource, $nameJsonSchema, $tokenObject)
    {
        $jsonSchemaContent = file_get_contents(resource_path("schemas/{$nameJsonSchema}"));
        $validator = new Validator();

        $decodedResource = json_decode($jsonResource);

        $decodedSchema = json_decode($jsonSchemaContent);

        $validator->validate($decodedResource, $decodedSchema, Constraint::CHECK_MODE_COERCE_TYPES);

        $isValid = $validator->isValid();

        if (!$isValid) {
            $errors = collect();
            $translate = [
                'NULL value found, but a string is required' => 'No hay registros para el valor',
                'NULL value found, but an object is required' => 'No existen registros',
                'Does not have a value in the enumeration ["03","07"]' => 'EL tipo de documento debe ser CCF o CR',
            ];

            foreach ($validator->getErrors() as $error) {
                $errors->push([
                    'property' => $error['property'],
                    'message' => $translate[$error['message']]  ?? $error['message'],
                ]);
            }

            $tokenObject->token = DefaultsEnum::MessageErrorJsonSchema->value;

            throw new FailedSendException(
                $tokenObject,
                json_encode($errors)
            );
        }
    }
}

if (!function_exists('createLetters')) {
    function createLetters(float $total)
    {
        $roundedTotal = round($total, 2);
        $partsTotal = explode('.', (string)$roundedTotal);

        // Formatear la parte entera del número
        $fmt = new NumberFormatter('es_ES', NumberFormatter::SPELLOUT);
        $integerPart = $fmt->format($partsTotal[0]);

        // Obtener y formatear la parte decimal
        $decimalPart = isset($partsTotal[1]) ? str_pad($partsTotal[1], 2, '0', STR_PAD_RIGHT) : '00';

        return ucfirst($integerPart) . " " . $decimalPart . "/100 USD";
    }
}

if (!function_exists('calculateIvaByPriceWithIva')) {
    function calculateIvaByPriceWithIva(float $total, int $round)
    {
        return round(($total / config('efac.iva_factor') * config('efac.iva_percentage')), $round);
    }
}

if (!function_exists('calculateIvaWithheld')) {
    function calculateIvaWithheld(float $total, int $round)
    {
        return round(($total * config('efac.iva_withheld_percentage')), $round);
    }
}

if (!function_exists('formatTwoDecimals')) {
    function formatTwoDecimals($number)
    {
        return sprintf("%.2f", $number);
    }
}
