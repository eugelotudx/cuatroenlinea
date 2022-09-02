<?php

class HayGanador{
	
	public function hay_ganador(Tablero $tablero){
		$resultado = Null;
		$tablero = $tablero->mostrar_tablero();
		for($columna = 0; $columna < 7 && $resultado == Null; $columna = $columna + 1){
			for($fila = 0; $fila < 6 && $resultado == Null; $fila = $fila + 1){
				$resultado = $this->checkVertical($tablero, $fila, $columna);
				if ($resultado == Null){
					$resultado = $this->check_horizontal($tablero, $fila, $columna);
				}
				if($resultado == Null){
					$resultado = $this->check_diagonal_hacia_abajo($tablero, $fila, $columna);
				}
				if ($resultado == Null){
					$resultado = $this->check_diagonal_hacia_arriba($tablero, $fila, $columna);
				}
			}
		}
		return $resultado;
	}

	public function check_vertical($tablero, $fila, $columna){
		if($fila+3 < 6)
			if($tablero[$columna][$fila] && $tablero[$columna][$fila+1] && $tablero[$columna][$fila+2] && $tablero[$columna][$fila+3]){
				$color = $tablero[$columna][$fila]->get_color();
				if($tablero[$columna][$fila + 1]->get_color() === $color)
					if($tablero[$columna][$fila + 2]->get_color() === $color)
						if($tablero[$columna][$fila + 3]->get_color() === $color)
							return [[$columna, $fila],[$columna, $fila+1],[$columna, $fila+2],[$columna, $fila+3]];
			}
		return Null;
	}
	
	public function check_horizontal($tablero, $fila, $columna){
		if($columna+3 < 7)
			if($tablero[$columna][$fila] && $tablero[$columna+1][$fila] && $tablero[$columna+2][$fila] && $tablero[$columna+3][$fila]){
				$color = $tablero[$columna][$fila]->get_color();
				if($tablero[$columna+1][$fila]->get_color() === $color)
					if($tablero[$columna+2][$fila]->get_color() === $color)
						if($tablero[$columna+3][$fila]->get_color() === $color)
							return [[$columna, $fila],[$columna+1, $fila],[$columna+2, $fila],[$columna+3, $fila]];
			}
		return Null;
	}
	
	public function check_diagonal_hacia_arriba($tablero, $fila, $columna){
		if($fila+3 < 6 && $columna+3 < 7)
			if($tablero[$columna][$fila] && $tablero[$columna+1][$fila+1] && $tablero[$columna+2][$fila+2] && $tablero[$columna+3][$fila+3]){
				$color = $tablero[$columna][$fila]->get_color();
				if($tablero[$columna+1][$fila+1]->get_color() === $color)
					if($tablero[$columna+2][$fila+2]->get_color() === $color)
						if($tablero[$columna+3][$fila+3]->get_color() === $color)
							return [[$columna, $fila],[$columna+1, $fila+1],[$columna+2, $fila+2],[$columna+3, $fila+3]];
			}
		return Null;
	}
	
	public function check_diagonal_hacia_abajo($tablero, $fila, $columna){
		if($fila > 2 && $columna+3 < 7){
			if($tablero[$columna][$fila] && $tablero[$columna+1][$fila-1] && $tablero[$columna+2][$fila-2] && $tablero[$columna+3][$fila-3]){
				$color = $tablero[$columna][$fila]->get_color();
				if($tablero[$columna+1][$fila-1]->get_color() === $color)
					if($tablero[$columna+2][$fila-2]->get_color() === $color)
						if($tablero[$columna+3][$fila-3]->get_color() === $color){
							return [[$columna, $fila],[$columna+1, $fila-1],[$columna+2, $fila-2],[$columna+3, $fila-3]];
						}
			}
		}
		return Null;
	}
}
