<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Formulario de pago">
  <meta property="og:type" content="website" />

  <link rel="shortcut icon" href="./Imagenes/logo.png" type="image/x-icon">
  <link rel="stylesheet" href="./css/index.css">
  <title>Formulario de Pago</title>
</head>
<body>
  <div class="formContainer">
    <section class="formBody" aria-label="Formulario de pago">
      <div class="form-details">
        <div class="form-image">
          <img src="./Imagenes/logo.png" alt="Logo del formulario de pago" width="48" height="48">
        </div>
        <h2 class="form-title">Información de pago</h2>
        <?php
        if (isset($_SESSION['total'])) {
        $total = $_SESSION['total'];
    
        echo "El valor a pagar es " . $total;
        }
        ?>
       
      </div>
      <form class="form">
        <label class="form-label" for="name" >Nombre</label>
        <input required class="form-input" id="name" type="text" placeholder="nombre" aria-label="Input de nombre completo">
        <label class="form-label" for="credit-card" id="label-cta">Número de Tarjeta de Crédito</label>
        <div class="form-inputIcon">
          <input required class="form-input is-disabled" id="credit-card" type="number" placeholder="1234 1234 1234 1234" aria-label="Input de Número de tarjeta de crédito" disabled>
          <i class="form-icon icon-creditCard"></i>
        </div>
        <div class="form-creditData">
          <div class="creditData-date">
            <label class="form-label" for="fecha">Fecha vencimiento</label>
            <div class="form-inputIcon">
              <input required class="form-input is-disabled" id="fecha" type="number" placeholder="MM/YY" aria-label="Input de Fecha de vencimiento" disabled>
            </div>
          </div>
          <div class="creditData-code">
            <label class="form-label" for="cvv">CVV</label>
            <div class="form-inputIcon">
              <input required class="form-input is-disabled" id="cvv" type="number" placeholder="..." aria-label="Input de Código CVV" disabled>
              <i class="form-icon icon-info"></i>
            </div>
          </div>
        </div>
        <label class="form-label" for="address">Dirección</label>
        <input required class="form-input is-disabled" id="address" type="text" placeholder="Av. 2" aria-label="Input de Dirección" disabled>
        
      </form>
    <?php
    echo "<hr>
        <div class='terminar_compra'>       
            <form action='gestor_carro.php' method='POST'>
                <button class='form-cta is-disabled' name='Pago'id='form-cta' disabled>Confirmar pago</button>
                <input type='hidden' value='Ir a producto'>
                </form>
            
        </div>
    </div>";
    ?>

      <p class="form-verify">Verifica que esta información es correcta</p>
    </section>
  </div>
  <script src="./js/prueba.js" type="application/javascript"></script>
</body>
</html>