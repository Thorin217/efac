<?php

namespace Exactum\Efac\Http\Resources\Token;

use Exactum\Efac\Enums\DefaultsEnum;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class DteTokenResource extends JsonResource
{
    private function getSerealizedData(): array
    {
        $data = array();

        if ($this->token == DefaultsEnum::MessageErrorJsonSchema->value) {
            $errorArray = collect(json_decode($this->error_message));
            $result = [];

            foreach ($errorArray as $item) {
                $property = explode('.', $item->property);
                $mainKey = $property[0];
                $subKey = isset($property[1]) ? $property[1] : '';

                if (preg_match('/\[(\d+)\]/', $mainKey, $matches)) {
                    $mainKey = str_replace($matches[0], '', $mainKey);
                    $index = $matches[1];

                    if (!isset($result[$mainKey])) {
                        $result[$mainKey] = [];
                    }

                    if (!isset($result[$mainKey][$index])) {
                        $result[$mainKey][$index] = [];
                    }

                    $result[$mainKey][$index][$subKey] = $item->message;
                } else {
                    if (!isset($result[$mainKey])) {
                        $result[$mainKey] = [];
                    }

                    $result[$mainKey][$subKey] = $item->message;
                }
            }

            $data['atribute_error'] = $result;
            return $data;
        }

        if ($this->token == DefaultsEnum::MessageErrorSigner->value) {
            $decoded = json_decode($this->error_message);
            $data['signer_error'] = is_object($decoded) ? ($decoded->mensaje ?? $this->error_message) : $this->error_message;
            return $data;
        }

        if ($this->seal_reception) {
            $infoSealReception = json_decode($this->seal_reception);

            $data['status_response'] = $infoSealReception->descripcionMsg ?? null;
            $data['seal_reception'] = $infoSealReception->selloRecibido ?? $this->seal_reception;

            $data['observations'] = !empty($infoSealReception->observaciones) && count($infoSealReception->observaciones) > 0
                ? $infoSealReception->observaciones
                : null;

            $data['date'] = isset($infoSealReception->fhProcesamiento)
                ? Carbon::createFromFormat('d/m/Y H:i:s', $infoSealReception->fhProcesamiento)->format(DefaultsEnum::StandarDateFormat->value)
                : null;

            return $data;
        }

        if ($this->token == DefaultsEnum::MessageContigency->value) {
            $data['status_response'] = 'RECHAZADO';
            $data['error_description'] = $this->token;
            $data['observations'] = [];
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
            'send_date' => (new Carbon($this->created_at))->format(DefaultsEnum::StandarDateFormat->value),
        ], $this->getSerealizedData());
    }
}
