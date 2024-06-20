<?php

namespace Exactum\Efac\Enums;

enum ExternalEnum: string
{
    case HeaderJson = 'application/json';
    case HeaderFormEncoded = 'application/x-www-form-urlencoded';
}
