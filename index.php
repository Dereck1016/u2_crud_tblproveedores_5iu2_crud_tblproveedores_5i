<?php include("./config.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Belajar Dasar CRUD dengan PHP dan MySQL">
    <title>perfumeria/dereck adrian sandoval</title>

    <!-- CDN de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- Iconos de Material -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link rel="stylesheet" href="css/style.css">
</head>

<body class="bg-light">
    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom" style="position: sticky !important; top: 0 !important; z-index: 99999 !important;">
        <div class="container-fluid container">
            <a class="navbar-brand" href="#">Go Data</a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active text-sm-start text-center" aria-current="page" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary ms-md-4 text-white" href="#">Iniciar sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <!-- Formulario para agregar proveedores -->
        <div class="card mb-5">
            <!-- Agregar datos -->
            <div class="card-body">
                <h2 class="card-title">Negocio de Perfumería</h2>
                <h3 class="card-title">Tabla de Proveedores</h3>
                <p class="card-text">Dereck Adrián Sandoval 5-I</p>

                <!-- Mostrar mensajes de éxito o error después de agregar datos -->
                <?php if (isset($_GET['status'])) : ?>
        <?php if ($_GET['status'] == 'sukses') : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Éxito</strong> ¡Los datos se han agregado correctamente!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
            </div>
        <?php else : ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Ups!</strong> Data gagal dihapus!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>
    <?php endif; ?>

                <form class="row g-3" action="tambah.php" method="POST">
                    <div class="col-md-4">
                        <label for="nombre_de_la_empresa" class="form-label">Nombre de la Empresa</label>
                        <input type="text" name="nombre_de_la_empresa" class="form-control" placeholder="" required>
                    </div>
                    <div class="col-md-4">
                        <label for="nombre_del_contacto" class="form-label">Nombre del Contacto</label>
                        <input type="text" name="nombre_del_contacto" class="form-control" placeholder="" required>
                    </div>
                    <div class="col-md-4">
                        <label for="direccion" class="form-label">direccion</label>
                        <input type="text" name="direccion" class="form-control" placeholder="" required>
                    </div>


                    <div class="col-md-6">
                        <label for="ciudad" class="form-label">ciudad</label>
                        <input type="text" name="ciudad" class="form-control" placeholder="" required>
                    </div>

                    <div class="col-md-6">
                        <label for="estado" class="form-label">estado</label>
                        <input type="text" step=0.01 name="estado" class="form-control" placeholder="" required>
                    </div>

                    <div class="col-md-6">
                        <label for="telefono" class="form-label">telefono</label>
                        <input type="text" name="telefono" class="form-control" placeholder="" required>
                    </div>

                    <div class="col-md-6">
                        <label for="correo" class="form-label">correo</label>
                        <input type="email" step=0.01 name="correo" class="form-control" placeholder="" required>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary" value="daftar" name="tambah"><i class="fa fa-plus"></i><span class="ms-2">Agregar Datos</span></button>
                    </div>
                    
                </form>
            </div>
        </div>

        <!-- Título de la tabla -->
        <h5 class="mb-3">Lista de Proveedores</h5>

        <div class="row my-3">
            <div class="col-md-2 mb-3">
                <select class="form-select" aria-label="Seleccione el número de registros a mostrar">
                    <option selected>Mostrar registros</option>
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
            <div class="col-md-3 ms-auto">
                <div class="input-group mb-3 ms-auto">
                    <input type="text" class="form-control" placeholder="Buscar algo..." aria-label="Buscar" aria-describedby="button-addon2">
                    <button class="btn btn-primary" type="button" id="button-addon2"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </div>

        <!-- mostrar mensaje de eliminación exitosa -->
        <?php if (isset($_GET['eliminar'])) : ?>
            <?php
            if ($_GET['eliminar'] == 'Exitoso')
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Exitoso!</strong> ¡Datos eliminados exitosamente!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Cerrar'></button>
                      </div>";
            else
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Ups!</strong> No se pudieron eliminar los datos!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Cerrar'></button>
                      </div>";
            ?>
        <?php endif; ?>

        <!-- Mostrar mensaje de éxito al editar -->
        <?php if (isset($_GET['update'])) : ?>
            <?php
            if ($_GET['update'] == 'sukses')
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Éxito</strong> ¡Los datos se han actualizado correctamente!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Cerrar'></button>
                      </div>";
            else
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>¡Ups!</strong> No se pudieron actualizar los datos.
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Cerrar'></button>
                      </div>";
            ?>
        <?php endif; ?>

        <!-- Tabla de proveedores -->
        <div class="table-responsive mb-5 card">
            <?php
            echo "<div class='card-body'>";
            echo "<table class='table table-hover align-middle bg-white'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th scope='col'>id_proveedores</th>";
            echo "<th scope='col'>nombre de la empresa</th>";
            echo "<th scope='col'>nombre del contacto</th>";
            echo "<th scope='col'>direccion</th>";
            echo "<th scope='col'>ciudad</th>";
            echo "<th scope='col'>estado</th>";
            echo "<th scope='col'>telefono</th>";
            echo "<th scope='col'>correo</th>";
            echo "<th scope='col' class='text-center'>Opciones</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";

            $limite = 10;
            $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
            $pagina_principal = ($pagina > 1) ? ($pagina * $limite) - $limite : 0;
            $previous = $pagina - 1;
            $next = $pagina + 1;

            $data = mysqli_query($db, "SELECT * FROM tabla_proveedores");
            $jumlah_data = mysqli_num_rows($data);
            $total_pagina = ceil($jumlah_data / $limite);

            $data_mhs = mysqli_query($db, "SELECT * FROM tabla_proveedores LIMIT $pagina_principal, $limite");
            $id_proveedor = $pagina_principal + 1;

            while ($proveedores = mysqli_fetch_array($data_mhs)) {
                echo "<tr>";
                echo "<td style='display:none'>" . $proveedores['id_proveedores'] . "</td>";
                echo "<td class='text-center'>" . $id_proveedor++ . "</td>";
                echo "<td>" . $proveedores['nombre_de_la_empresa'] . "</td>";
                echo "<td>" . $proveedores['nombre_del_contacto'] . "</td>";
                echo "<td>" . $proveedores['direccion'] . "</td>";
                echo "<td>" . $proveedores['ciudad'] . "</td>";
                echo "<td>" . $proveedores['estado'] . "</td>";
                echo "<td>" . $proveedores['telefono'] . "</td>";
                echo "<td>" . $proveedores['correo'] . "</td>";

                echo "<td class='text-center'>";

                echo "<button type='button' class='btn btn-primary btnEditar pad m-1'><span class='material-icons align-middle'>edit</span></button>";
                
                echo "
                            <button type='button' class='btn btn-danger btnEliminar pad m-1'><span class='material-icons align-middle'>delete</span></button>";
                echo "</td>";

                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
            if ($jumlah_data == 0) {
                echo "<p class='text-center'>No hay datos disponibles en esta tabla.</p>";
            } else {
                echo "<p>Total de $jumlah_data entradas</p>";
            }

            echo "</div>";
            ?>
        </div>

        <!-- Paginación -->
        <nav class="mt-5 mb-5">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" <?php echo ($pagina > 1) ? "href='?pagina=$previous'" : "" ?>><i class="fa fa-chevron-left"></i></a>
                </li>
                <?php
                for ($x = 1; $x <= $total_pagina; $x++) {
                ?>
                    <li class="page-item"><a class="page-link" href="?pagina=<?php echo $x ?>"><?php echo $x; ?></a></li>
                <?php
                }
                ?>
                <li class="page-item">
                    <a class="page-link" <?php echo ($pagina < $total_pagina) ? "href='?pagina=$next'" : "" ?>><i class="fa fa-chevron-right"></i></a>
                </li>
            </ul>
        </nav>
   <!--Modal Editar-->
   <div class='modal fade' style="top:58px !important;" id='editarModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog' style="margin-bottom:100px !important;">
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLabel'>Editar Datos de Proveedor</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Cerrar'></button>
                    </div>

                    <?php
                    $sql = "SELECT * FROM tabla_proveedores";
                    $query = mysqli_query($db, $sql);
                    $proveedor = mysqli_fetch_array($query);
                    ?>

                    <form action='editar.php' method='POST'>
                        <div class='modal-body text-start'>
                            <input type='hidden' name='edit_id_proveedores' id='edit_id_proveedores'>

                    <div class="col-md-6">
                        <label for="edit_nombre_de_la_empresa" class="form-label">nombre de la empresa </label>
                        <input type="number" name="edit_nombre_de_la_empresa" id="edit_nombre_de_la_empresa" class=" form-control" placeholder="00000" required>
                    </div>

                    <div class="col-12">
                        <label for="edit_nombre_del_contacto" class="form-label">Nombre de contacto</label>
                        <input type="text" name="edit_nombre_del_contacto" id="edit_nombre_del_contacto" class="form-control" placeholder="MisterWils" required>
                    </div>
                    <div class="col-md-4">
                        <label for="edit_direccion" class="form-label">Direccion</label>
                        <input type="text" name="edit_direccion" id="edit_direccion" class="form-control" placeholder="Calle #0000" required>
                    </div>

                    <div class="col-md-4">
                        <label for="edit_ciudad" class="form-label">Ciudad</label>
                        <input type="text" name="edit_ciudad" id="edit_ciudad" class="form-control" placeholder="Ciudad Juarez" required>
                    </div>

                    <div class="col-md-4">
                        <label for="edit_estado" class="form-label">Estado</label>
                        <input type="text" name="edit_estado" id="edit_estado" class="form-control" placeholder="Chihuahua" required>
                    </div>

                    <div class="col-md-6">
                        <label for="edit_telefono" class="form-label">Telefono</label>
                        <input type="text" name="edit_telefono" id="edit_telefono" class="form-control" placeholder="6565265147" required>
                    </div>

                    <div class="col-md-6">
                        <label for="edit_correo" class="form-label">Correo Electronico</label>
                        <input type="email" name="edit_correo" id="edit_correo" class="form-control" placeholder="hola@gmail.com" required>
                    </div>

                        </div>

                        <div class='modal-footer'>
                            <button type='submit' name='editar_datos' class='btn btn-primary'>Editar</button>
                        </div>

                    </form>


                </div>
            </div>
        </div>

    <!-- Modal Eliminar -->
    <div class="modal fade" style="top: 58px !important;" id="eliminarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmación</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Cerrar"></button>
                </div>

                <form action="eliminar.php" method="POST">
                    <div class="modal-body text-start">
                        <input type="hidden" name="eliminar_id" id="eliminar_id">
                        <p>¿Estás seguro de que deseas eliminar estos datos?</p>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" name="eliminardatos" class="btn btn-primary">Eliminar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- cerrar el contenedor -->
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

 
   <!-- Funcion Editar -->
   <script>
        $(document).ready(function() {
            $('.btnEditar').on('click', function() {
                $('#editarModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);
                $('#edit_id_proveedores').val(data[0]);
                // gak dipake, karena cuma increment number
                // $('#no').val(data[1]);
                $('#edit_nombre_de_la_empresa').val(data[2]);
                $('#edit_nombre_del_contacto').val(data[3]);
                $('#edit_direccion').val(data[4]);
                $('#edit_ciudad').val(data[5]);
                $('#edit_estado').val(data[6]);
                $('#edit_Telefono').val(data[7]);
                $('#edit_correo').val(data[8]);
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.btnEliminar').on('click', function() {
                $('#eliminarModal').modal('show');
                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();
                console.log(data);
                $('#eliminar_id').val(data[0]);
            });
        });
    </script>

    <script>
        function clicking() {
            window.location.href = './index.php';
        }
    </script>
</body>
</html>