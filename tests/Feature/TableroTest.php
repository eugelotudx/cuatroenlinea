<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TableroTest extends TestCase
{
	protected $url = "https://cuatroenlinea.ddev.site/jugar/11223344556677";
	private $arrContextOptions = array(
		    "ssl" => array(
		             "verify_peer"=>false,
		             "verify_peer_name"=>false,
		             ),
	);  
		
	public function test_conexion()
    {
       	$response = $this->get($this->url);
	    $response->assertStatus(200);
    }
	
	public function test_casillas()
	{
		$fuente = file_get_contents($this->url, false, stream_context_create($this->arrContextOptions));
		$this->assertTrue(substr_count($fuente, "bg-red-500") === 14);
		$this->assertTrue(substr_count($fuente, "bg-sky-500") === 7);
		$this->assertTrue(substr_count($fuente, "bg-gray-200") === 28);
	}
	
	public function test_casillasgiran()
	{
		$fuente = file_get_contents($this->url, false, stream_context_create($this->arrContextOptions));
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
}


?>
