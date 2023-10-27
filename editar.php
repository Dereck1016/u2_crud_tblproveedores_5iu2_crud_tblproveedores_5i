<?php
include("./config.php");

// Comprueba si se ha hecho clic en el botón de registro o no
if (isset($_POST['editar_datos'])) {    // Obtener datos del formulario
    $id_proveedores = $_POST['edit_id_proveedores'];
    $nomempresa = $_POST['edit_nombre_de_la_empresa'];
    $nomcontacto = $_POST['edit_nombre_del_contacto'];
    $direccion = $_POST['edit_direccion'];
    $ciudad = $_POST['edit_ciudad'];
    $estado = $_POST['edit_estado'];
    $telefono = $_POST['edit_telefono'];
    $correo = $_POST['edit_correo'];

    // Consulta
    $sql = "UPDATE tabla_proveedores SET id_proveedores='$id_proveedores', nombre_de_la_empresa='$nomempresa', nombre_del_contacto='$nomcontacto', direccion='$direccion', ciudad='$ciudad', estado='$estado', telefono='$telefono', correo='$correo' WHERE id_proveedores = '$id_proveedores'";
    $query = mysqli_query($db, $sql);

    // Comprobar si la consulta se guardó correctamente.
    if ($query) {
        header('Location: ./index.php?update=sukses');
    } else {
        header('Location: ./index.php?update=gagal');
    }
} else {
    die("Acceso prohibido...");
}
?>
