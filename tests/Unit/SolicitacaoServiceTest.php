<?php

namespace Tests\Unit;

use Tests\TestCase;
use Phtfao\Feegow\Broker\Model\Solicitacao;
use Phtfao\Feegow\Support\Service\FeegowApiService;
use Phtfao\Feegow\Support\Repository\FeegowApiRepository;
use Phtfao\Feegow\Support\Repository\SolicitacaoRepository;


class SolicitacaoServiceTest extends TestCase
{
    private FeegowApiService $feegowApiService;
    
    public function __construct() {
        parent::__construct();
        $this->feegowApiService = new FeegowApiService(
            new FeegowApiRepository()
        );
    }

    public function testConstructor()
    {
        $feegowApiService = new FeegowApiService(
            new FeegowApiRepository()
        );
        $this->assertInstanceOf(FeegowApiService::class, $feegowApiService);
    }

    public function testGetEspecialidades()
    {
        $arrEspecialidades = $this->feegowApiService->getEspecialidades();
        $this->assertIsArray($arrEspecialidades);
        $this->assertNotEmpty($arrEspecialidades);
        $this->assertInstanceOf(\stdClass::class, $arrEspecialidades[0]);
        $this->assertObjectHasAttribute('especialidade_id', $arrEspecialidades[0]);
    }

    public function testGetEspecialistasPorEspecialidade()
    {
        $arrEspecialistas = $this->feegowApiService->getEspecialistas(89);
        $this->assertIsArray($arrEspecialistas);
        $this->assertNotEmpty($arrEspecialistas);
        $this->assertInstanceOf(\stdClass::class, $arrEspecialistas[0]);
        $this->assertObjectHasAttribute('profissional_id', $arrEspecialistas[0]);
    }

    public function testGetEspecialistasPorUnidade()
    {
        $arrEspecialistas = $this->feegowApiService->getEspecialistas(null, 2);
        $this->assertIsArray($arrEspecialistas);
        $this->assertNotEmpty($arrEspecialistas);
        $this->assertInstanceOf(\stdClass::class, $arrEspecialistas[0]);
        $this->assertObjectHasAttribute('profissional_id', $arrEspecialistas[0]);
    }

    public function testGetEspecialistasAtivos()
    {
        $arrEspecialistas = $this->feegowApiService->getEspecialistas(null, null, 1);
        $this->assertIsArray($arrEspecialistas);
        $this->assertNotEmpty($arrEspecialistas);
        $this->assertInstanceOf(\stdClass::class, $arrEspecialistas[0]);
        $this->assertObjectHasAttribute('profissional_id', $arrEspecialistas[0]);
    }

    public function testGetFonteConhecimento()
    {
        $arrFonteConhecimento = $this->feegowApiService->getFonteConhecimento();

        $this->assertIsArray($arrFonteConhecimento);
        $this->assertNotEmpty($arrFonteConhecimento);
        $this->assertInstanceOf(\stdClass::class, $arrFonteConhecimento[0]);
        $this->assertObjectHasAttribute('nome_origem', $arrFonteConhecimento[0]);
    }

    public function testGravarSolicitacao()
    {
        $arrSolicitacao['profissional_id'] = 1;
        $arrSolicitacao['specialty_id'] = 1;
        $arrSolicitacao['name'] = 'Teste';
        $arrSolicitacao['cpf'] = '12345678901';
        $arrSolicitacao['source_id'] = 1;
        $arrSolicitacao['birthdate'] = '2021-01-01';

        $solicitacaoRepository = new SolicitacaoRepository(
            new Solicitacao()
        );  
        $solicitacaoRepository->store($arrSolicitacao);

        $this->assertDatabaseHas('solicitacoes', [
            'profissional_id' => 1,
            'specialty_id' => 1,
            'name' => 'Teste',
            'cpf' => '12345678901',
            'source_id' => 1,
            'birthdate' => '2021-01-01'
        ]);
    }

}
