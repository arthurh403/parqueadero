<?php include 'codeCliente.php'; ?>

<?php include("../paginas/head.php") ?>

<div class="container">
    <div class="row">



        <!-- enctype="multipart/form-data" se utiliza para tratar la fotografia -->
        <form action="" method="post" enctype="multipart/form-data">



            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- cabecera del modal -->
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Datos Del Cliente</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <!-- Cuerpo del modal -->
                        <div class="modal-body">

                            <div class="form-row">

                            <div class="form-group col-md-12">
                                    <label for="id_cliente">Cedula Cliente</label>
                                    <input type="text" class="form-control" require name="id_cliente" id="id_cliente" placeholder="" value="<?php echo $id_cliente ?>">
                                    <br>
                                </div>  

                                <div class="form-group col-md-12">
                                    <label for="nom_cliente">Nombre(s)</label>
                                    <input type="text" class="form-control" require name="nom_cliente" id="nom_cliente" placeholder="" value="<?php echo $nom_cliente ?>">
                                    <br>
                                </div>                               


                                <div class="form-group col-md-12">
                                    <label for="apel_cliente">Apellido (S)</label>
                                    <input type="text" class="form-control" require name="apel_cliente" id="apel_cliente" placeholder="" value="<?php echo $apel_cliente ?>">

                                </div>

                                <div class="form-group col-md-12">
                                    <label for="tel_cliente">telefono </label>
                                    <input type="text" class="form-control" require name="tel_cliente" id="tel_cliente" placeholder="" value="<?php echo $tel_cliente ?>">

                                </div>

                                <div class="form-group col-md-12">
                                    <label for="direc_cliente">direccion </label>
                                    <input type="text" class="form-control" require name="direc_cliente" id="direc_cliente" placeholder="" value="<?php echo $direc_cliente ?>">
                                    <br>
                                </div>

                           


                            </div>
                        </div>

                        <!-- Pie/Footer del modal -->
                        <div class="modal-footer">

                            <button value="btnAgregar" class="btn btn-success" type="submit" name="accion">Agregar</button>
                            <button value="btnModificar" class="btn btn-warning" type="submit" name="accion">Modificar</button>
                            <button value="btnEliminar" class="btn btn-danger" type="submit" name="accion">Eliminar</button>
                            <button value="btnCancelar" class="btn btn-primary" type="submit" name="accion">Cancelar</button>

                        </div>

                    </div>
                </div>
            </div>

            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Agregar Clientes
            </button>





        </form>
        <!-- Final del Formulario -->


        <div class="row">


            <table class="table table-hover table-bordered">

                <thead class="thead-dark">

                    <tr>
                       
                        <th scope="col">Identificacion</th>
                        <th scope="col">Nombres</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">telefono</th>
                        <th scope="col">direccion</th>

                        <th scope="col">Seleccionar</th>
                        <th scope="col">Eliminar</th>
                    </tr>

                </thead>
                <tbody>

                    <?php
                    /* Prefunto que si la variable listaClientes tiene algun contenido */
                    if ($listaClientes->num_rows > 0) {

                        foreach ($listaClientes as $cliente) {

                    ?>

                            <tr>

                               

                                <td> <?php echo $cliente['id_cliente']            ?> </td>
                                <td> <?php echo $cliente['nom_cliente']           ?> </td>
                                <td> <?php echo $cliente['apel_cliente']          ?> </td>
                                <td> <?php echo $cliente['tel_cliente']           ?> </td>
                                <td> <?php echo $cliente['direc_cliente']         ?> </td>



                                <form action="" method="post">

                                    <input type="hidden" name="id_cliente" value="<?php echo $cliente['id_cliente'];  ?>">
                                    <input type="hidden" name="nom_cliente" value="<?php echo $cliente['nom_cliente'];  ?>">
                                    <input type="hidden" name="apel_cliente" value="<?php echo $cliente['apel_cliente'];  ?>">
                                    <input type="hidden" name="tel_cliente" value="<?php echo $cliente['tel_cliente'];  ?>">
                                    <input type="hidden" name="direc_cliente" value="<?php echo $cliente['direc_cliente'];  ?>">
                            

                                    <td><input type="submit" class="btn btn-info" value="Seleccionar"></td>
                                    <td><button value="btnEliminar" class="btn btn-danger" type="submit" name="accion">Eliminar</button></td>

                                </form>


                            </tr>


                    <?php

                        }
                    } else {

                        echo "<h2> No tenemos resultados </h2>";
                    }

                    ?>


                </tbody>
            </table>

        </div>


    </div>
</div>

<?php include("../paginas/footer.php") ?>