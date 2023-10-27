<?php
include("./config.php");

// comprueba si se ha hecho clic en el botón de registro o no
if (isset($_POST['tambah'])) {
    //obtener datos del formulario
    $id_proveedores = $_POST['id_proveedores'];
    $nomempresa = $_POST['nombre_de_la_empresa'];
    $nomcontacto = $_POST['nombre_del_contacto'];
    $direccion = $_POST['direccion'];
    $ciudad = $_POST['ciudad'];
    $estado = $_POST['estado'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];

    // query
    $sql = "INSERT INTO tabla_proveedores(id_proveedores, nombre_de_la_empresa, nombre_del_contacto, direccion, ciudad, estado, telefono, correo)
    VALUES('$id_proveedores', '$nomempresa', '$nomcontacto', '$direccion', '$ciudad', '$estado', '$telefono', '$correo')";
    $query = mysqli_query($db, $sql);

    // verifica si la consulta se ha guardado con éxito
    if ($query)
        header('Location: ./index.php?status=sukses');
    else
        header('Location: ./index.php?status=gagal');
} else {
    die("Acceso prohibido...");
}
;
?>
