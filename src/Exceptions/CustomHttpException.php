<?php

namespace Exactum\Efac\Exceptions;

use Exception;

class CustomHttpException extends Exception
{
    protected $meta;

    public function __construct($message = null, $code = 400, $meta = null)
    {
        parent::__construct($message, $code);

        $this->meta = $meta;
    }

    public function getMeta()
    {
        return $this->meta;
    }

    public function render($request)
    {
        return apiResponseError($this->getMessage(), $this->getCode(), $this->getMeta());
    }
}
