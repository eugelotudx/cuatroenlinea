<?php

namespace Tests\Feature;
namespace App;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TableroTest extends TestCase
{
	protected $url = "https://cuatroenlinea.ddev.site/jugar/11223344556677";
	protected $tablero;
	
	public function test_conexion()
    {
       	$response = $this->get($this->url);
	    $response->assertStatus(200);
    }
	
	public function test_casillas()
	{
		$res = $this->get($this->url);
		$fuente = $res->getContent();
		$this->assertTrue(substr_count($fuente, "bg-red-500") === 14);
		$this->assertTrue(substr_count($fuente, "bg-sky-500") === 7);
		$this->assertTrue(substr_count($fuente, "bg-gray-200") === 28);
	}
	
	public function test_casillasgiran()
	{
		$res = $this->get($this->url);
		$fuente = $res->getContent();
		$this->assertTrue(substr_count($fuente, "hover:animate-spin") === 7);
	}
	
	public function test_link()
	{
		$response = $this->get($this->url);
		$values = ["/jugar/112233445566771","/jugar/112233445566772","/jugar/112233445566773","/jugar/112233445566774","/jugar/112233445566775","/jugar/112233445566776","/jugar/112233445566777"];
		$response->assertSeeInOrder($values, $escaped = true);
	}
	
	/*
	public function test_verticaloverflow()
	{	//Esta prueba debería fallar por ahora
		$url = $this->url . '11111111111';
		$response = $this->get($url);
		$response->assertStatus(500);
	}
	*/
	public function test_horizontaloverflow()
	{
		$url = $this->url . '8';
		$response = $this->get($url);
		$response->assertStatus(500);
		
		$url = $this->url . '-1';
		$response = $this->get($url);
		$response->assertStatus(500);
	}
	
	public function test_generarTablero()
	{
		$tablero = new Tablero();
		$tablero->generar_tablero();
		$this->assertTrue($tablero->mostrar_tablero() === [array_fill(0, 6, NULL),array_fill(0, 6, NULL),array_fill(0, 6, NULL),array_fill(0, 6, NULL),array_fill(0, 6, NULL),array_fill(0, 6, NULL),array_fill(0, 6, NULL)]);
		$this->assertTrue($tablero->mostrar_nivelPorColumna() === [0,0,0,0,0,0,0]);
		$this->assertTrue($tablero->mostrar_secuencia() === []);
	}
	
	public function test_tirarficha()
	{
		$tablero = new Tablero();
		$tablero->generar_tablero();
		
		$ficha = new Ficha();
		
		$tablero->tirar_ficha($ficha, 4);
		$tablero->tirar_ficha($ficha, 4);
		$tablero->tirar_ficha($ficha, 4);

		$this->assertTrue($tablero->mostrar_nivelPorColumna() === [0,0,0,3,0,0,0]);
		$this->assertTrue($tablero->mostrar_secuencia() === [3,3,3]);
		$col4expectedvalue = [$ficha,$ficha,$ficha,NULL,NULL,NULL];
		$this->assertTrue($tablero->mostrar_tablero() === [array_fill(0, 6, NULL),array_fill(0, 6, NULL),array_fill(0, 6, NULL),$col4expectedvalue,array_fill(0, 6, NULL),array_fill(0, 6, NULL),array_fill(0, 6, NULL)]);
	}

	public function test_deshacer_ultimo_movimiento(){
		$tablero = new Tablero();
		$tablero->generar_tablero();
		
		$ficha = new Ficha();
		
		$tablero->tirar_ficha($ficha, 4);
		$tablero->tirar_ficha($ficha, 4);
		$tablero->tirar_ficha($ficha, 4);
		
		$tablero->deshacer_ultimo_movimiento();
		
		$this->assertTrue($tablero->mostrar_nivelPorColumna() === [0,0,0,2,0,0,0]);
		$this->assertTrue($tablero->mostrar_secuencia() === [3,3]);
		$col4expectedvalue = [$ficha,$ficha,NULL,NULL,NULL,NULL];
		$this->assertTrue($tablero->mostrar_tablero() === [array_fill(0, 6, NULL),array_fill(0, 6, NULL),array_fill(0, 6, NULL),$col4expectedvalue,array_fill(0, 6, NULL),array_fill(0, 6, NULL),array_fill(0, 6, NULL)]);
	}
}

?>
