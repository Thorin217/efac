<?php

namespace Exactum\Efac\Exceptions;

use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class CustomQueryException extends ExceptionHandler
{
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof QueryException) {
            $message = "Error de la base de datos: " . $exception->getMessage();

            switch ($exception->getCode()) {
                case '23000':
                    $message = "Un dato que intento ingresar debe ser unico en la base de datos";
                    break;

                case '22003':
                    $message = "Ha ingresado un valor con demasiados caracteres, intente disminuir los caracteres";
                    break;

                case 'HY104':
                case 'HY000':
                    $message = "Por favor comuniquese con el administrador, si usted es el administrador: Scary Movie 16 minutos y 51 segundos";
                    break;
            }

            return apiResponseError($message, 400);
        }

        return parent::render($request, $exception);
    }
}
