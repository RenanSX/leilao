<?php

namespace Alura\Leilao\Tests\Service;

require 'vendor/autoload.php';

use Alura\Leilao\Model\Lance as Lance;
use Alura\Leilao\Model\Leilao as Leilao;
use Alura\Leilao\Model\Usuario as Usuario;
use Alura\Leilao\Service\Avaliador as Avaliador;

use PHPUnit\Framework\TestCase;

/**
 *
 */
class AvaliadorTest extends TestCase
{
	public function testeUm() {
		$leilao = new Leilao('Fiat 170kM');
		$maria = new Usuario('Maria');
		$joao = new Usuario('Joao');


		$leilao->recebeLance(new Lance($joao, 2000));
		$leilao->recebeLance(new Lance($maria, 2500));

		$leiloeiro = new Avaliador();
		$leiloeiro->avalia($leilao);

		$maioValor = $leiloeiro->getMaiorValor();

		self::assertEquals(2500, $maioValor);
	}

}