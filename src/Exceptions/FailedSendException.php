<?php

namespace Exactum\Efac\Exceptions;

use Exception;

class FailedSendException extends Exception
{
    private object $token;

    public function __construct($token, $message = "")
    {
        $this->token = $token;
        parent::__construct($message);
    }

    public function report()
    {
        $this->token->error_message = $this->getMessage();
        $this->token->save();
    }
}
