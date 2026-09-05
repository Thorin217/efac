<?php

return [
    'currency' => (string) env('CURRENCY', 'USD'),

    'iva_percentage' => (float) env('IVA_PERCENTAGE', 0.13),

    'iva_withheld_percentage' => (float) env('IVA_WITHHELD_PERCENTAGE', 0.01),

    'iva_factor' => (float) env('IVA_FACTOR', 1.13),

    'url_api' => env('API_URL', 'https://api.dtes.mh.gob.sv/'),

    'url_api_test' => env('API_URL_TEST', 'https://apitest.dtes.mh.gob.sv/'),

    'cancellation_version' => (int) env('CANCELLATION_VERSION', 2),

    'contingency_version' => (int) env('CONTINGENCY_VERSION', 3),

    'external_env' => (string) env('DESTINATION_ENV', '01'),
];