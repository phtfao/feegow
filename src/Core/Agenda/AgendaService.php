<?php

namespace Phtfao\Feegow\Core\Agenda;

use Phtfao\Feegow\Support\Contracts\SolicitacaoRepositoryInterface;

class AgendaService
{
    public function __construct(
        private SolicitacaoRepositoryInterface $repository
    ) {}

    public function store(array $data)
    {
        return $this->repository->store($data);
    }
}