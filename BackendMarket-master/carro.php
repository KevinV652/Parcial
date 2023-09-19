<?php
session_start();//
?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="estilos.css" type="text/css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carro</title>
</head>

<body>
    <!-- Esto es el contenedor de todo -->
    <?php
    echo "<div class='compra-contenedor'>
        <div class='Heading'>
            <h3 class='encabezado'>Carrito de Compras</h3>
            

            <form action='gestor_carro.php' method='POST'>
                <div>
                <button name='QuitarTodo'>
                <h3 class='accion'>Quitar Todo</h3>
                </button>
                </div>
                </form>
        </div>";
        
        $total=0;
        $numItems=0;
        if (isset($_SESSION['carro'])){
        foreach($_SESSION['carro'] as $key => $value)
        {
            
            $totalProd=$value['Precio']*$value['Cantidad'];
            $total=$total+$totalProd;
            $numItems=$numItems+$value['Cantidad'];

            
            //Se agrega la imagen con un condicional para el de Colgate por su ancho
            if ($value['Imagen']=='Imagenes/colgate.png')
            {
                echo "
            <div class='items_carro'>
            <div class='contenedor_imagen'>
                <img src='$value[Imagen]'  width='120px'  />
            </div>";
            } else {
                echo "
            <div class='items_carro'>
            <div class='contenedor_imagen'>
                <img src='$value[Imagen]' height='100px' />
            </div>";
            }
            echo "
            <div class='descripcion'>
                <h1 class='titulo'>$value[Nombre]</h1>
                <img src='Imagenes/select.png' height='30px' style='cursor: pointer;' />
            </div>
            <div class='contador'>

            

                <form action='gestor_carro.php' method='POST'>
                <div>
                <button class='boton_agr' name='UnoMenos'>-</button>
                </div>
                <input type='hidden' name='id' value='$value[id]'>
                </form>

                <div class='conteo'>$value[Cantidad]</div>

                <form action='gestor_carro.php' method='POST'>
                <div>
                <button class='boton_agr' name='UnoMas'>+</button>
                </div>
                <input type='hidden' name='id' value='$value[id]'>
                </form>

                
            </div>
            <div class='precio'>
                <div class='cantidad'>$totalProd</div>

                <form action='gestor_carro.php' method='POST'>
                <div>
                <button class='quitar' name='Remover_Producto'>Remover</button>
                </div>
                <input type='hidden' name='id' value='$value[id]'>
                </form>
            </div>
        </div>
            ";
        }
    }
        
        
        echo "<hr>
        <div class='terminar_compra'>
            <div class='total'>
                <div>
                    <div class='subtotal'>Sub Total</div>
                    <div class='items_total'>$numItems items</div>
                </div>
                <div class='precio_final'>$total</div>
            </div>


            <form action='gestor_carro.php' method='POST'>
                <button class='checkout' name='Comprar'>Terminar Compra</button>
                <input type='hidden' value='$total>
                </form>
            
            <form action='gestor_carro.php' method='POST'>
                <button type='submit' class='checkout' name='Regresar'>
                Regresar
                </button>
                <input type='hidden' value='regresa'/>
                </form>
        </div>
    </div>";
        $_SESSION['total'] = $total;
    ?>
</body>

</html>
