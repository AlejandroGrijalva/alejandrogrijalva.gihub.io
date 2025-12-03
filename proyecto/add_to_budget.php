<?php
session_start();

require_once 'php/conection.php';

$id = $_GET["id"];

// Obtener el producto desde la base
$stmt = $con->prepare("
    SELECT 
        p.id,
        p.name,
        p.price,
        p.image_url,
        c.name AS category_name
    FROM products p
    INNER JOIN categories c ON p.id_category = c.id
    WHERE p.id = ?
");

$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $product = $result->fetch_assoc();

    // Crear el carrito si no existe
    if (!isset($_SESSION["budget"])) {
        $_SESSION["budget"] = [];
    }

    // Agregarlo
    $_SESSION["budget"][] = $product;
}

$stmt->close();
header("Location: shoppinglist.php");
exit();