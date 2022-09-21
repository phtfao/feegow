<?php

namespace Phtfao\Feegow\Support\Contracts;

use Phtfao\Feegow\Broker\Model\Solicitacao;

interface SolicitacaoRepositoryInterface
{
    public function __construct(Solicitacao $model);
    public function store(array $data);
    public function get(int $idSolicitacao);
    public function transfer(int $payer, int $payee, float $value);

}