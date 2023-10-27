<?php
include("./config.php");

if (isset($_POST['deletedata'])) {
   //obtiene la identificación de la cadena de consulta
    $id = $_POST['delete_id'];

 
// consulta eliminar
    $sql = "DELETE FROM tabla_proveedores WHERE id_proveedores = '$id_proveedores'";
    $query = mysqli_query($db, $sql);
// ¿Se eliminó correctamente la consulta?
    if ($query) {
        header('Location: ./index.php?hapus=sukses');
    } else
        die('Location: ./index.php?hapus=gagal');
} else
    die("akses dilarang...");
