<?php

namespace Phtfao\Feegow\Support\Contracts;

interface ModelInterface
{
    public function find(int $idModel);
    public function findOrFail(int $idModel);
    public function create(array $data);
}