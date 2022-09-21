<?php

namespace Phtfao\Feegow\Broker\Model\Concerns;

use Phtfao\Feegow\Support\Exceptions\NotFoundException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

trait FindModel 
{
    public function create(array $data)
    {
        return parent::create($data);
    }

    public function find(int $idModel)
    {
        return parent::find($idModel);
    }

    public function findOrFail(int $idModel)
    {
        try {
            return parent::findOrFail($idModel);
        } catch (ModelNotFoundException $e) {
            throw new NotFoundException();
        }
    }
}