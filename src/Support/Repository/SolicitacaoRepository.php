<?php

namespace Phtfao\Feegow\Support\Repository;

use Phtfao\Feegow\Broker\Model\Solicitacao;
use Phtfao\Feegow\Support\Contracts\ModelInterface;
use Phtfao\Feegow\Support\Exceptions\NotFoundException;
use Phtfao\Feegow\Support\Repository\AbstractRepository;
use Phtfao\Feegow\Support\Contracts\SolicitacaoRepositoryInterface;

class SolicitacaoRepository extends AbstractRepository implements SolicitacaoRepositoryInterface
{
    public function __construct(
        private ModelInterface $model
    ) {}

    public function store(array $data): Solicitacao
    {
        return $this->model->create($data);
    }
    public function get(int $idSolicitacao): Solicitacao
    {
        return $this->model->find($idSolicitacao);
    }

    public function getOrFail(int $idSolicitacao): Solicitacao
    {
        return $this->model->findOrFail($idSolicitacao);
    }

    public function transfer(int $payer, int $payee, float $value)
    {
        $arrData = [
            'payer_id' => $payer,
            'payee_id' => $payee,
            'value' => $value
        ];

        return $this->store($arrData);
    }
}
