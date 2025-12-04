<?php

require_once '../php/conection.php';
$id = $_POST['id'];
$stmt = $con->prepare("DELETE FROM products WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>alert('Producto eliminado'); window.location='productos.php';</script>";
    } else {
        echo "<script>alert('Error al eliminar');</script>";
    }

    $stmt->close();
?>