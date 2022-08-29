<?php

namespace App;

class Tablero{
	protected $secuencia, $tablero, $nivelPorColumna;
	
	public function generar_tablero(Int $dimension = 7){
		$this->secuencia = [];
		# $this->tablero[0][1] refiere a la casilla en la columna 0 y fila 1
		$this->tablero = array_fill(0, $dimension, array_fill(0, 6, NULL));
		$this->nivelPorColumna = array_fill(0,$dimension,0);
	}
	
	public function tirar_ficha(Ficha $ficha, Int $columna){
		$columna = $columna - 1;
		$this->tablero[$columna][$this->nivelPorColumna[$columna]] = $ficha;
		$this->nivelPorColumna[$columna] ++;
		$this->secuencia[] = $columna;
	}
	
	public function deshacer_ultimo_movimiento(){
		$columna = array_pop($this->secuencia);
    $this->nivelPorColumna[$columna] --;
    $this->tablero[$columna][$this->nivelPorColumna[$columna]] = NULL;
	}
	
	public function mostrar_tablero(){
		return $this->tablero;
	}
	
	public function mostrar_nivelPorColumna(){
		return $this->nivelPorColumna;
	}

	public function mostrar_secuencia(){
		return $this->secuencia;
	}	
}