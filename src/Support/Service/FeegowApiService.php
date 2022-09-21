<?php

namespace Phtfao\Feegow\Support\Service;

use Phtfao\Feegow\Support\Repository\FeegowApiRepository;

class FeegowApiService
{
    public function __construct(
        private FeegowApiRepository $repository
    ) {}

    public function getEspecialidades()
    {
        return $this->repository->getEspecialidades();
    }

    public function getEspecialistas(
        int $idEspecialidade = null,
        int $idUnidade = null,
        int $inAtivo = null
    ) {
        return $this->repository->getEspecialistas($idEspecialidade, $idUnidade, $inAtivo);
    }

    public function getFonteConhecimento()
    {
        return $this->repository->getFonteConhecimento();
    }    
}