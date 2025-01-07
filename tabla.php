<?php
    include_once './controladores/funciones.php';
    
    session_start();
    $datos = $_SESSION['formulario'];

    $valorBien = $datos['valorBien'];
    $cuotaInicial = $datos['cuotaInicial'];
    $tiempoMeses = $datos['tiempoMeses'];
    $tasaPorcentual = $datos['tasaPorcentual'];

    $valorCuota = calcularCuota(($valorBien - $cuotaInicial), ($tasaPorcentual / 12), $tiempoMeses);

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Banco Aliaga</title>
  <link rel="stylesheet" href="http://localhost/final-guillermoaliaga-sebastianmartinez-miguelalonsosl/styles.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <main class="bg-success">
    <?php require_once('./partials/navBar.php'); ?>
  </main>
  <h2 class="card-title card-title text-white bg-success text-center display-4 p-4">Tabla de Amortizacion</h2>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <div class="container mt-5">
    <h1 class="text-center mb-4">Tabla de amortizacion</h1>
  </div>

  <table class="table">
    <thead>
      <tr>
        <th scope="col">Mes</th>
        <th scope="col">Cuota</th>
        <th scope="col">Saldo Pendiente</th>
      </tr>
    </thead>
    <tbody>
      <?php
      for ($i = 0; $i < $tiempoMeses; $i++): ?>
        <tr>
          <th scope="row"><?= $i + 1 ?></th>
          <td>S/. <?= number_format($valorCuota, 2) ?></td>
          <td><?= number_format(max(($valorBien - $cuotaInicial) - $valorCuota * ($i + 1), 0), 2) ?></td>
        </tr>
      <?php endfor;
      ?>
    </tbody>
  </table>
</body>
<?php require_once('./partials/footer.php'); ?>

</html>