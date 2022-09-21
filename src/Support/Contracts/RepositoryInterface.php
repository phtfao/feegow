<?php

namespace Phtfao\Feegow\Support\Contracts;

interface RepositoryInterface
{
    public function __construct(ModelInterface $model);
    public function beginSolicitacao(): void;
    public function commit(): void;
    public function rollback(): void;
    public function get(int $idModel);
    public function getOrFail(int $idModel);

}