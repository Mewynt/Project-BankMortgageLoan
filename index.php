<?php
include_once './controladores/funciones.php';
$errores = [];

if ($_POST) {
  $currencySelected = $_POST['currency'];
  $errores = buscarErrores($_POST, $currencySelected);

  if (count($errores) == 0) {
    session_start();
    $_SESSION['formulario'] = $_POST;

    header('location:tabla.php');
  }
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Banco Aliaga</title>
  <link rel="stylesheet" href="http://localhost/project-bank-mortgage-loan-simulator/styles.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <main class="bg-success">
    <?php require_once('./partials/navBar.php'); ?>
    <div class="fondo d-flex justify-content-center align-items-center">
      <h1 class="text-while efect-blur text-white fs-1 fw-bold text-center">EL MEJOR BANCO DEL PERU</h1>
    </div>
    <h1 class="text-center p-3 text-white">Bienvenido a Banco Aliaga</h1>
    <div class="text-center mx-auto p-3 text-white pb-4" style="max-width: 900px;">
      <h4>En Banco Aliaga, sabemos que tener un hogar propio no es solo un sueño, es un paso esencial hacia la
        estabilidad y el bienestar de su familia. Por eso, ofrecemos soluciones de crédito hipotecario diseñadas para
        que pueda alcanzar su meta de ser propietario, de manera segura, sencilla y adaptada a sus necesidades.</h4>
    </div>
    <h1 class="text-center p-2 text-white">Prueba nuestro simulador de credito hipotecario</h1>
    <section class="pb-5">
      <div class="container d-flex justify-content-center align-items-center">
        <form class="formulario row p-2" action="" method="POST" enctype="multipart/form-data">
          <div class="mb-4">
            <div class="col-8 m-auto text-center">
              <?php if (count($errores) > 0): ?>
                <ul class="alert alert-danger">
                  <?php foreach ($errores as $key => $error): ?>
                    <li><?= $error ?></li>
                  <?php endforeach; ?>
                </ul>
              <?php endif; ?>
            </div>
            <label class="form-label pt-2">Elige la moneda:</label>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="currency" id="currencySoles" value="Soles" checked>
              <label class="form-check-label" for="currencySoles">Soles</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="currency" id="currencyDollars" value="Dolares">
              <label class="form-check-label" for="currencyDollars">Dólares</label>
            </div>
          </div>
          <div class="mb-4">
            <label id="label-valor" class="form-label">Valor del bien</label>
            <input type="number" class="form-control" id="valorBien" placeholder="Valor" name="valorBien">
            <div id="label-valor1" class="form-text">MAYOR a S/. 300.000 y MENOR a S/. 110.000.000 </div>
          </div>
          <div class="mb-4">
            <label id="label-cuota" class="form-label">Cuota inicial</label>
            <input type="number" class="form-control" id="cuotaInicial" placeholder="Cuota" name="cuotaInicial">
            <div id="" class="form-text">MAYOR a 10% y Menor a 70%</div>
          </div>
          <div class="mb-4">
            <label id="label-plazo" class="form-label">Plazo de meses</label>
            <input type="number" class="form-control" id="tiempoMeses" placeholder="Plazo" name="tiempoMeses">
            <div id="" class="form-text">MAYOR a 6 meses y MENOR a meses</div>
          </div>
          <div class="mb-4">
            <label class="form-label">Tasa de interes</label>
            <input type="number" class="form-control" id="tasaPorcentual" placeholder="tasa" name="tasaPorcentual">
            <div id="" class="form-text">MAYOR a 4% y MENOR a 19%</div>
          </div>
          <div class="mb-4">
            <label class="form-label">Fecha de solicitud</label>
            <input type="date" class="form-control" id="exampleFormControlInput1" placeholder="fecha"
              name="FechaSolicitud">
          </div>
          <div class="mb-4">
            <label class="form-label">Dia del mes para el pago de cuotas</label>
            <input type="date" class="form-control" id="exampleFormControlInput1" placeholder="diaMes" name="DiaMes">
          </div>
          <button type="submit" class="btn btn-primary p-2">Enviar</button>
        </form>
      </div>
    </section>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>
<?php require_once('./partials/footer.php'); ?>

</html>