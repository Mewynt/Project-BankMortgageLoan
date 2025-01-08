<?php
function buscarErrores($datos, $money){

    $errores = [];

    $valorBien = intval($datos['valorBien'] ?? null);
    $cuotaInicial = intval($datos['cuotaInicial'] ?? null);
    $tiempoMeses = intval($datos['tiempoMeses'] ?? null);
    $tasaPorcentual = intval($datos['tasaPorcentual'] ?? null);


    if (empty($valorBien)) {
      $errores['valorBien'] = "El valor del bien no puede estar vacío.";
  } elseif (!is_numeric($valorBien)) {
      $errores['valorBien'] = "Debe ingresar un número válido para el valor del bien.";
  } else {
      if ($money === 'Soles') {
          if ($valorBien < 300000 || $valorBien > 110000000) {
              $errores['valorBien'] = "El valor del bien en soles debe estar entre S/ 300,000 y S/ 110,000,000.";
          }
      } elseif ($money === 'Dolares') {
          if ($valorBien < 90000 || $valorBien > 900000) {
              $errores['valorBien'] = "El valor del bien en dólares debe estar entre $90,000 y $900,000.";
          }
      } else {
          $errores['moneda'] = "Compruebe los valores que introdujo";
      }
  }


    if (empty($cuotaInicial)) {
        $errores['cuotaInicial'] = "La cuota inicial no puede estar vacía.";
      } elseif (!is_numeric($cuotaInicial)) {
        $errores['cuotaInicial'] = "Debe ingresar un número válido para la cuota inicial.";
      } elseif ($cuotaInicial < ($valorBien * 0.1) || $cuotaInicial > ($valorBien * 0.7)) {
        $errores['cuotaInicial'] = "La cuota inicial debe estar entre el 10% y el 70% del valor del bien.";
      }
    
      if (empty($tiempoMeses)) {
        $errores['tiempoMeses'] = "La duración del préstamo no puede estar vacía.";
      } elseif (!is_numeric($tiempoMeses) || $tiempoMeses < 6 || $tiempoMeses > 48) {
        $errores['tiempoMeses'] = "La duración debe estar entre 6 y 48 meses.";
      }
    
      if (empty($tasaPorcentual)) {
        $errores['tasaPorcentual'] = "La tasa de interés no puede estar vacía.";
      } elseif (!is_numeric($tasaPorcentual) || $tasaPorcentual < 4 || $tasaPorcentual > 19) {
        $errores['tasaPorcentual'] = "La tasa de interés debe estar entre 4% y 19%.";
      }
      // var_dump($valorBien, $cuotaInicial, $tiempoMeses, $tasaInteres);
      return $errores;
    
    }



function calcularCuota($montoPrestamo, $tasaInteresAnual, $plazoMeses)
{
  $tasaInteresMensual = $tasaInteresAnual / 12 / 100;
  $numCuotas = $plazoMeses;
  $numerador = $montoPrestamo * $tasaInteresMensual * pow((1 +
    $tasaInteresMensual), $numCuotas);
  $denominador = pow((1 + $tasaInteresMensual), $numCuotas) - 1;
  $cuota = $numerador / $denominador;
  return $cuota;
}

?>