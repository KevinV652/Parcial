<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="estilos_productos.css" type="text/css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
</head>

<body>
<?php
    require_once 'Producto.php';
    $producto1= new Producto(1, 'Lays Classic' ,3000, "Imagenes/lays.png"  );
    $producto2= new Producto(2, 'Colgate Triple Accion' ,6000, "Imagenes/colgate.png"  );
    $producto3= new Producto(3, 'Arroz Diana 1000g' ,5000, "Imagenes/arroz.png"  );
    $producto4= new Producto(4, 'Camisa Negra' ,12000, "Imagenes/camisa.png"  );
    $producto5= new Producto(5, 'Mantequilla Rama' ,16000, "Imagenes/mantequilla.png"  );


    $productos = array ( 
        $producto1,$producto2,$producto3,$producto4,$producto5

       

    );



    ?>

    <div class="titulo-container">
        <h1>Productos Disponibles</h1>
    </div>


    <div class="horizontal">
    
    <?php
        
        foreach ($productos as $value){
            $imagen=strval ($value->getImagen());
            $nombre= strval ($value->getNombre());
            $precio=  ($value->getPrecio());
            $id= $value->getId();

                echo"<div class='producto'>
            <form action='gestor_carro.php' method='POST'>
                <img src='$imagen' alt='' height='150px' width='150px'>
                <h2>$nombre</h2>
                <p>Precio: $precio Pesos</p>
                <button type='submit' name='Agregar_al_carro'><img src='Imagenes/carrito_compra.png' alt='' height='50px' width='50px'></button>
                <input type='hidden' name='Nombre' value='$nombre'>
                <input type='hidden' name='Precio' value='$precio'>
                <input type='hidden' name='Imagen' value='$imagen'>
                <input type='hidden' name='id' value= '$id'>
            </form>
        </div>";


        };

        ?>

    <form action="carro.php">
        <button type="submit">
        <h2>Ir al Carrito</h2>
    </button>
    <input type="hidden" value="Ir al carro" />
</form>
    
</body>

</html>
