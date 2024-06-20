<?php

namespace Exactum\Efac\Actions;

use Exception;
use Illuminate\Support\Facades\File;
use Lcobucci\JWT\Configuration;
use Lcobucci\JWT\Signer\Rsa\Sha512;
use Lcobucci\JWT\Signer\Key\InMemory;
use SimpleXMLElement;

class SignDocumentAction
{
    public function handler(string $nit, string $passwordPri, $dteJson)
    {
        $xml = $this->getCertificateInXml($nit);

        $passwordDocument = (string) $xml->privateKey->clave;

        $key = (string) $xml->privateKey->encodied;

        $this->validateData($passwordDocument, $nit, $passwordPri);

        $pem = $this->createPem($key);

        $config = Configuration::forSymmetricSigner(
            new Sha512(),
            InMemory::plainText($pem)
        );

        $token = $config->builder();

        foreach ($dteJson as $key => $value) {
            $token = $token->withClaim($key, $value);
        }

        return $token->getToken($config->signer(), $config->signingKey())
            ->toString();
    }

    public function createPem(string $key)
    {
        return "-----BEGIN PRIVATE KEY-----\n" . chunk_split(base64_encode(base64_decode($key)), 64, "\n") . "-----END PRIVATE KEY-----\n";
    }

    public function getCertificateInXml(string $nit): SimpleXMLElement | false
    {
        $certificatePath = $this->getCerticatePath($nit);

        $certificate = File::get($certificatePath);

        $xml = simplexml_load_string($certificate);

        return $xml;
    }

    public function getCerticatePath(string $nit)
    {
        return base_path('mh/' . $nit . '.crt');
    }

    public function validateNit(string $nit)
    {
        return  preg_match('/^\d{14}$/', $nit);
    }

    public function validateData(string $passwordDocument, string $nit, string $passwordPri)
    {
        $this->validateNit($nit);

        $this->validatePasswords($passwordDocument, $passwordPri);
    }

    public function validatePasswords(string $passwordDocument, string $passwordPri)
    {
        if ($this->encryptPassword($passwordPri) !== $passwordDocument) {
            throw new Exception("Las contraseñas no coinciden.");
        }
    }

    public function encryptPassword(string $passwordPri)
    {
        return hash('sha512', $passwordPri);
    }
}
