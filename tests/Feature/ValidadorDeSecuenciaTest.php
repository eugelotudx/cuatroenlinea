<?php

namespace Tests\Feature;
namespace App\Exceptions;
namespace App;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Exception;

class ValidadorDeSecuenciaTest extends TestCase{
	
	public function test_validar_columna(){
		$validador = new ValidadorDeSecuencia();
		$this->expectException(ColumnaInvalida::class);
		$validador->validarColumna(9);
	}
}