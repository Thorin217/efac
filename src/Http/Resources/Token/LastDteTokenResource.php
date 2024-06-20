<?php

namespace Exactum\Efac\Http\Resources\Token;

use Exactum\Efac\Enums\DefaultsEnum;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class LastDteTokenResource extends JsonResource
{
    private function getSerealizedData(): array
    {
        $data = array();

        if ($this->token == DefaultsEnum::MessageErrorJsonSchema->value) {
            $data['atribute_error'] = collect(json_decode($this->error_message))->pluck('property')->unique()->values();
            return $data;
        }

        if ($this->token == DefaultsEnum::MessageErrorSigner->value) {
            $data['signer_error'] = json_decode($this->error_message)->mensaje;
            return $data;
        }

        if ($this->seal_reception) {
            $infoSealReception = json_decode($this->seal_reception);

            $data['observations'] = $infoSealReception->observaciones ?? null;
            $data['status_response'] = $infoSealReception->descripcionMsg ?? null;
            $data['seal_reception'] = $infoSealReception->selloRecibido ?? $this->seal_reception;

            $data['date'] = isset($infoSealReception->fhProcesamiento)
                ? Carbon::createFromFormat('d/m/Y H:i:s', $infoSealReception->fhProcesamiento)->format(DefaultsEnum::StandarDateFormat->value)
                : null;

            return $data;
        }

        if ($this->token == DefaultsEnum::MessageContigency->value) {
            $data['status_response'] = 'RECHAZADO';
            $data['error_description'] = $this->token;
            return $data;
        }

        $errorReponse = json_decode($this->error_message);
        $data['status_response'] = $errorReponse->estado;
        $data['error_description'] = $errorReponse->descripcionMsg;
        $data['observations'] = $errorReponse->observaciones ?? null;

        return $data;
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return array_merge([
            'id' => $this->id,
        ], $this->getSerealizedData());
    }
}
