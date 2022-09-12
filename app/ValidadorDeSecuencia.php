<?php

namespace App;
namespace App\Exceptions;
use Exception;

class ColumnaInvalida extends Exception {}

class ValidadorDeSecuencia{
	public function validarColumna($columna){
		if($columna > 7 || $columna < 1){
			throw new ColumnaInvalida("El número de columna no está admitido. Ingrese uno entre el 1 y el 7.");
		}
    return $columna;
	}
}

