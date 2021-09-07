<?php
session_start();

$numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_STRING);
$romano = filter_input(INPUT_POST, 'romano', FILTER_SANITIZE_STRING);

$contI = 0;
$contV = 0;
$contX = 0;
$contL = 0;
$contC = 0;
$contD = 0;
$contM = 0;

//Converte Número para Romano
if(!empty($numero)){
	if(is_numeric($numero) && $numero <= 3999){
		while($numero >= 900){ 
			if($numero >= 1000){
				$valor = $valor . 'M';
				$numero = $numero - 1000;
				$contM++;
			}else{
				$valor = $valor . 'CM';
				$numero = $numero - 900;
				$contC++;
				$contM++;
			}
		}

		while($numero >= 400){
			if($numero >= 500){
				$valor = $valor . 'D';
				$numero = $numero - 500;
				$contD++;
			}else{
				$valor = $valor . 'CD';
				$numero = $numero - 400;
				$contD++;
				$contC++;
			}
		}

		while($numero >= 90){
			if($numero >= 100){
				$valor = $valor . 'C';
				$numero = $numero - 100;
				$contC++;
			}else{
				$valor = $valor . 'XC';
				$numero = $numero - 90;
				$contX++;
				$contC++;
			}
		}

		while($numero >= 40){
			if($numero < 50){
				$valor = $valor . 'XL';
				$numero = $numero - 40;
				$contX++;
				$contL++;
			}else{
				$valor = $valor . 'L';
				$numero = $numero - 50;
				$contL++;
			}
		}

		while($numero >= 9){
			if($numero == 9){
				$valor = $valor . 'IX';
				$numero = $numero - 9;
				$contX++;
				$contI++;
			}else{
				$valor = $valor . 'X';
				$numero = $numero - 10;
				$contX++;
			}
		}

		while($numero >= 5 && $numero < 9){
			$valor = $valor . 'V';
			$numero = $numero - 5;
			$contV++;
		}

		while($numero >= 1){
			if($numero == 4){
				$valor = $valor = $valor . 'IV';
				$numero = $numero - 4;
				$contI++;
				$contV++;
			}else{
				$valor = $valor . 'I';
				$numero = $numero - 1;
				$contI++;
			}
		}

		$_SESSION['valor'] = $valor;
		$_SESSION['contI'] = $contI;
		$_SESSION['contV'] = $contV;
		$_SESSION['contX'] = $contX;
		$_SESSION['contL'] = $contL;
		$_SESSION['contC'] = $contC;
		$_SESSION['contD'] = $contD;
		$_SESSION['contM'] = $contM;

		header("Location: index.php");
	}else{
		$_SESSION['msgErro'] = utf8_encode("<p>Digite um valor numérico inteiro até 3999</p>");
		header("Location: index.php");
	}

//Converte Numero Romano para Número
}else{
	$convert = strtoupper($romano);
	$contLetras = strlen($convert);
	$array = str_split($convert);

	for($i = 0; $i < $contLetras; $i++){
		$romanos = array(1 => "I", 4 => "IV", 5 => "V", 9 => "IX", 10 => "X", 40 => "XL", 50 => "L", 90 => "XC", 100 => "C", 400 => "CD", 500 => "D", 900 => "CM", 1000 => "M");
		$result1 = array_search($array[$i], $romanos);
		$result2 = array_search($array[($i + 1)], $romanos);
		$result3 = array_search($array[($i + 2)], $romanos);
		$result3 = array_search($array[($i + 2)], $romanos);

		$verifica = verificaRepetidos($array, $contLetras);

		if($verifica == 1){
			$_SESSION['Erro'] = "Valor não encontrado ";
			header("Location: index.php");
		}else{
			if($result1 < $result2){
				$subtrai = $result2 - $result1;
				$valor = $subtrai + $valor;
				$i++;
			}else{
				$valor = $valor + $result1;
			}
		}

	}

	if($valor == 0){
		$_SESSION['Erro'] = "Valor não encontrado ";
		header("Location: index.php");
	}else{
		$_SESSION['resultRomano'] = "$valor";
		header("Location: index.php");
	}
}

function verificaRepetidos($array, $contLetras){
	$contI = 0;
	$contX = 0;
	$contC = 0;
	$contM = 0;
	$contLetras = $contLetras - 1;

	for($i = 0; $i < $contLetras; $i++){
		switch ($array[$i]) {
			 case 'I':
				 while($array[$i] == "I"){
					  $contI++;
					  $i++;
				 }
				 if($contI > 3){
					 return 1;
				 }

			 case 'X':
				 while($array[$i] == "X"){
					  $contX++;
					  $i++;
				 }
				 if($contX > 3){
					 return 1;
				 }

			 case 'C':
				 while($array[$i] == "C"){
					  $contC++;
					  $i++;
				 }
				 if($contC > 3){
					 return 1;
				 }

			 case 'M':
				 while($array[$i] == "M"){
					  $contM++;
					  $i++;
				 }
				 if($contM > 3){
					 return 1;
				 }
			 
		}
	}
}