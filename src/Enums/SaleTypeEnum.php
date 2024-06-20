<?php

namespace Exactum\Efac\Enums;

enum SaleTypeEnum: string
{
    case Taxed = 'Gravada';
    case NoSubject = 'No sujeta';
    case Exempt = 'Exenta';
    case Untaxed = 'No gravada';
}
