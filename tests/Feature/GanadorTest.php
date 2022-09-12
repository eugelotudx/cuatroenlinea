<?php

namespace Tests\Feature;
namespace App;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GanadorTest extends TestCase
{
	public function test_no_hay_ganador(){
		$tablero = new Tablero();
		$fichaRoja = new Ficha("rojo");
		$fichaAzul = new Ficha("azul");
		$hayganador = new HayGanador();

		$tablero->tirar_ficha($fichaRoja,2);
		$tablero->tirar_ficha($fichaRoja,2);
		$tablero->tirar_ficha($fichaRoja,2);
		
		$tablero->tirar_ficha($fichaAzul,2);
		
		$tablero->tirar_ficha($fichaRoja,3);
		$tablero->tirar_ficha($fichaRoja,3);
		
		$resultado = $hayganador->hay_ganador($tablero);
		$this->assertTrue($resultado === Null);
	}

	public function test_ganador_horizontal(){
		$tablero = new Tablero();
		$fichaAzul = new Ficha("azul");
		$hayganador = new HayGanador();

		$tablero->tirar_ficha($fichaAzul,2);
		$tablero->tirar_ficha($fichaAzul,3);
		$tablero->tirar_ficha($fichaAzul,4);
		$tablero->tirar_ficha($fichaAzul,5);
		
		$resultado = $hayganador->hay_ganador($tablero);
		$this->assertTrue($resultado === [[1,0],[2,0],[3,0],[4,0]]);	
	}
	
	public function test_ganador_vertical(){
		$tablero = new Tablero();
		$fichaRoja = new Ficha("rojo");
		$fichaAzul = new Ficha("azul");
		$hayganador = new HayGanador();
		
		$tablero->tirar_ficha($fichaRoja,5);
		$tablero->tirar_ficha($fichaAzul,5);
		$tablero->tirar_ficha($fichaAzul,5);
		$tablero->tirar_ficha($fichaAzul,5);
		$tablero->tirar_ficha($fichaAzul,5);
		$tablero->tirar_ficha($fichaRoja,5);

		$resultado = $hayganador->hay_ganador($tablero);
		$this->assertTrue($resultado === [[4,1],[4,2],[4,3],[4,4]]);
	}
	
	public function test_ganador_diagonal_arriba(){
		$tablero = new Tablero();
		$fichaRoja = new Ficha("rojo");
		$fichaAzul = new Ficha("azul");
		$hayganador = new HayGanador();
		
		$tablero->tirar_ficha($fichaRoja,2);
		$tablero->tirar_ficha($fichaRoja,2);

		$tablero->tirar_ficha($fichaAzul,3);
		$tablero->tirar_ficha($fichaAzul,3);
		$tablero->tirar_ficha($fichaRoja,3);

		$tablero->tirar_ficha($fichaAzul,4);
		$tablero->tirar_ficha($fichaAzul,4);
		$tablero->tirar_ficha($fichaAzul,4);
		$tablero->tirar_ficha($fichaRoja,4);

		$tablero->tirar_ficha($fichaAzul,5);
		$tablero->tirar_ficha($fichaAzul,5);
		$tablero->tirar_ficha($fichaAzul,5);
		$tablero->tirar_ficha($fichaRoja,5);
		$tablero->tirar_ficha($fichaRoja,5);

		$resultado = $hayganador->hay_ganador($tablero);
		$this->assertTrue($resultado === [[1,1],[2,2],[3,3],[4,4]]);
	}
	
	public function test_ganador_diagonal_abajo(){
		$tablero = new Tablero();
		$fichaRoja = new Ficha("rojo");
		$fichaAzul = new Ficha("azul");
		$hayganador = new HayGanador();
		
		$tablero->tirar_ficha($fichaRoja,2);
		$tablero->tirar_ficha($fichaRoja,2);
		$tablero->tirar_ficha($fichaRoja,2);
		$tablero->tirar_ficha($fichaAzul,2);

		$tablero->tirar_ficha($fichaRoja,3);
		$tablero->tirar_ficha($fichaRoja,3);
		$tablero->tirar_ficha($fichaAzul,3);

		$tablero->tirar_ficha($fichaRoja,4);
		$tablero->tirar_ficha($fichaAzul,4);

		$tablero->tirar_ficha($fichaAzul,5);

		$resultado = $hayganador->hay_ganador($tablero);
		$this->assertTrue($resultado === [[1,3],[2,2],[3,1],[4,0]]);
	}
	
}