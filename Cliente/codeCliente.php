<!-- Instrucciones de uso  https://sweetalert.js.org/guides/#installation -->
<script src="../js/sweetalert.js"></script>

<?php
//incluimos la conexion a la base de datos 
include("../Conexion/conexion.php");


//Recibimos las variables enviadas
$id_cliente = (isset($_POST['id_cliente'])) ? $_POST['id_cliente'] : "";
$nom_cliente = (isset($_POST['nom_cliente'])) ? $_POST['nom_cliente'] : "";
$apel_cliente = (isset($_POST['apel_cliente'])) ? $_POST['apel_cliente'] : "";
$tel_cliente = (isset($_POST['tel_cliente'])) ? $_POST['tel_cliente'] : "";
$direc_cliente = (isset($_POST['direc_cliente'])) ? $_POST['direc_cliente'] : "";


$accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";


switch ($accion) {
    case 'btnAgregar':



       

                /* la variable sentencia recolecta la informacion del formulario y 
                la envia a la base de datos.
                La variable conn nos brinda la conexion a la base de datos.
                ->prepare nos prepara la sentencia SQL para que inyecte los valores a la BD.
                */
                $insertarClientes = $conn->prepare(
                    "INSERT INTO clientes (id_cliente, nom_cliente, apel_cliente, 
                tel_cliente, direc_cliente) 
                VALUES ('$id_cliente', '$nom_cliente','$apel_cliente','$tel_cliente','$direc_cliente')"
                );



                $insertarClientes->execute();
                $conn->close();
               
               echo" <script>
                    swal('Mensaje Principal!', 'Mensaje segundario!', 'success');
                    </script>";
                

                header('location: index.php');
            




        break;

    case 'btnModificar':

        $modificarCliente = $conn->prepare(" UPDATE clientes SET nom_cliente = '$nom_cliente' , 
        apel_cliente = '$apel_cliente', tel_cliente = '$tel_cliente', direc_cliente = '$direc_cliente'
        WHERE id_cliente = '$id_cliente' ");

       

     
       
        $modificarCliente->execute();       
        $conn->close();

        header('location: index.php');

        break;

    case 'btnEliminar':
        

        $eliminarCliente = $conn->prepare(" DELETE FROM clientes
        WHERE id_cliente = '$id_cliente' ");

        
        $eliminarCliente->execute();
        $conn->close();

        header('location: index.php');

        break;

    case 'btnCancelar':
        header('location: index.php');
        break;

   
}



/* Consultamos todos los empleados  */
$consultaClientes = $conn->prepare("SELECT * FROM clientes");
$consultaClientes->execute();
$listaClientes = $consultaClientes->get_result();
$conn->close();
