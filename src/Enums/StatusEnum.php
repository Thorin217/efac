<?php

namespace Exactum\Efac\Enums;

enum StatusEnum: string
{
    case NoSend = 'no-sent';
    case Processing  = 'processing';
    case Sent = 'sent';
    case Success = 'success';
    case SuccessAjust = 'success-ajust';
    case SuccessObservations = 'success-observations';
    case SuccesContingency = 'succes-contingency';
    case Rejected = 'rejected';
    case Invalid = 'invalid';
}
