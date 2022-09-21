<?php

namespace Phtfao\Feegow\Broker\Model;

use App\Models\Solicitacao as SolicitacaoModel;
use Phtfao\Feegow\Broker\Model\Concerns\FindModel;
use Phtfao\Feegow\Support\Contracts\ModelInterface;


class Solicitacao extends SolicitacaoModel implements ModelInterface
{
    use FindModel;
    
    public function __construct()
    {
        parent::__construct();
    }
}