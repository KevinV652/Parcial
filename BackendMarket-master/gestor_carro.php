<<<<<<< HEAD
<?php
session_start();
//verificar metodo post
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    //verificar que sea un boton de agregar un producto
    if (isset($_POST['Agregar_al_carro']))
    {
        //verificar que el carro este creado en la sesion
        if(isset($_SESSION['carro']))
        {
            $misProductos=array_column($_SESSION['carro'],'id');
            if(in_array($_POST['id'],$misProductos))
            {
                echo"<script>
                alert('Producto ya agregado');
                window.location.href='productos.php';
                </script>";
            }
            else
            {
                $count=count($_SESSION['carro']);
                $_SESSION['carro'][$count]=array('id'=>$_POST['id'],'Nombre'=>$_POST['Nombre'],'Precio'=>$_POST['Precio'],'Imagen'=>$_POST['Imagen'],'Cantidad'=>1);
                echo"<script>
                alert('Producto agregado');
                window.location.href='productos.php';
                </script>";
            }

            
        }
        else
        {
            //crear el carro
            $_SESSION['carro'][0]=array('id'=>$_POST['id'],'Nombre'=>$_POST['Nombre'],'Precio'=>$_POST['Precio'],'Imagen'=>$_POST['Imagen'],'Cantidad'=>1);
            echo"<script>
                alert('Producto agregado');
                window.location.href='productos.php';
                </script>";
        }
    }
    //Para retirar un producto del carrito
    if(isset($_POST['Remover_Producto']))
    {
        foreach($_SESSION['carro'] as $key => $value)
        {
            if($value['id']==$_POST['id'])
            {
                unset($_SESSION['carro'][$key]);
                $_SESSION['carro']=array_values($_SESSION['carro']);
                echo "<script>
                alert('Producto Removido');
                window.location.href='carro.php';
                </script>";
            }
            
        }
    }
    //Agregar uno más del mismo item en el carrito
    if(isset($_POST['UnoMas']))
    {
        foreach($_SESSION['carro'] as $key => $value)
        {
            if($value['id']==$_POST['id'])
            {
                $_SESSION['carro'][$key]['Cantidad']= $_SESSION['carro'][$key]['Cantidad']+1;
                $_SESSION['carro']=array_values($_SESSION['carro']);
                echo "<script>
                window.location.href='carro.php';
                </script>";
            }
        }
    }
    //Agregar uno menos del mismo item en el carrito
    if(isset($_POST['UnoMenos']))
    {
        foreach($_SESSION['carro'] as $key => $value)
        {
            if($value['id']==$_POST['id'])
            {
                //Verificar que haya mínimo uno de cada item en el carrito
                if($_SESSION['carro'][$key]['Cantidad']>1)
                {
                    $_SESSION['carro'][$key]['Cantidad']= $_SESSION['carro'][$key]['Cantidad']-1;
                    $_SESSION['carro']=array_values($_SESSION['carro']);
                }
                echo "<script>
                    window.location.href='carro.php';
                    </script>";
                
            }
        }
    }
    //Quitar todos los productos del carro
    if(isset($_POST['QuitarTodo']))
    {
        session_destroy();
        echo "<script>
                    window.location.href='carro.php';
                    </script>";
    }
    //Comprar
    if(isset($_POST['Comprar']))
    {
        $total = $_SESSION['total'];
        if ($total == 0){
        echo "<script>
        alert('Su compra es inválida');
        window.location.href='carro.php';
            </script>";
        }
        else{
            echo "<script>
            window.location.href='pago.php';
            </script>";
        }
    }
    if(isset($_POST['Pago']))
    {
        
        echo "<script>
        alert('Compra exitosa');
        
        window.location.href='productos.php';
            </script>";
        session_destroy();
    }
    //Regresar
    if(isset($_POST['Regresar']))
    {
        
        echo "<script>
        
        window.location.href='productos.php';
            </script>";
    }

    
}

