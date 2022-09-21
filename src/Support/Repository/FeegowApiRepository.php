<?php

namespace Phtfao\Feegow\Support\Repository;

use GuzzleHttp\Client as HttpClient;
use \stdClass;

class FeegowApiRepository
{
    const ENDPOINT_ESPECIALIDADES = 'specialties/list';
    const ENDPOINT_PROFISSIONAIS = 'professional/list';
    const ENDPOINT_FONTE_CONHECIMENTO = 'patient/list-sources';
    private HttpClient $httpClient;

    public function __construct()
    {
        $arrParams = [
            'base_uri' => env('FEEGOW_API_URL', ''),
            'headers' => [
                'x-access-token' => env('FEEGOW_AUTHORIZATION_TOKEN', ''),
                'Content-Type' => 'application/json',
            ],
        ];

        $this->httpClient = new HttpClient($arrParams);
    }

    private function get(string $endpoint, array $query = []): ?stdClass
    {
        $response = $this->httpClient->get($endpoint, [
            'query' => $query,
        ]);

        if ($response->getStatusCode() !== 200) {
            throw new \Exception('Erro ao consultar API Feegow.');
        }

        $body = $response->getBody() ?? throw new \Exception('Erro ao consultar API Feegow.');

        return json_decode($body->getContents());
    }

    public function getEspecialidades(): array
    {
        $body = $this->get(self::ENDPOINT_ESPECIALIDADES);
        return $body->content ?? [];
    }

    public function getEspecialistas(
        int $idEspecialidade = null,
        int $idUnidade = null,
        int $inAtivo = null
    ): array
    {
        $arrParams = [];
        if ($idEspecialidade) {
            $arrParams['especialidade_id'] = $idEspecialidade;
        }

        if ($idUnidade) {
            $arrParams['unidade_id'] = $idUnidade;
        }

        if ($inAtivo) {
            $arrParams['ativo'] = $inAtivo;
        }

        $body = $this->get(self::ENDPOINT_PROFISSIONAIS, $arrParams);
        return $body->content ?? [];
    }

    public function getFonteConhecimento(): array
    {
        $body = $this->get(self::ENDPOINT_FONTE_CONHECIMENTO);
        return $body->content ?? [];
    }   
}

