<?php
// --- CONEXIÓN ---
require_once '../php/conection.php';

// --- OBTENER PRODUCTO ---
if (!isset($_GET['id'])) {
    die("ID no válido");
}

$id = intval($_GET['id']);

$stmt = $con->prepare("SELECT name, price, barcode, id_category, brand, image_url FROM products WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Producto no encontrado");
}

$product = $result->fetch_assoc();
$stmt->close();

// --- ACTUALIZAR PRODUCTO ---
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name = $_POST["name"];
    $price = $_POST["price"];
    $barcode = $_POST["barcode"];
    $id_category = $_POST["id_category"];
    $brand = $_POST["brand"];
    $image_url = $_POST["image_url"];

    $update = $con->prepare("UPDATE products SET name=?, price=?, barcode=?, id_category=?, brand=?, image_url=? WHERE id=?");
    $update->bind_param("sdsissi", $name, $price, $barcode, $id_category, $brand, $image_url, $id);

    if ($update->execute()) {
        echo "<script>alert('Producto actualizado'); window.location='productos.php';</script>";
    } else {
        echo "<script>alert('Error al actualizar');</script>";
    }

    $update->close();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar producto</title>

    <style>
    body {
        background: #f2f4f7;
        font-family: 'Segoe UI', Arial;
        margin: 0;
        padding: 0;
    }

    h2 {
        text-align: center;
        margin-top: 30px;
        color: #333;
        font-weight: 600;
    }

    .container {
        width: 420px;
        margin: 40px auto;
        background: white;
        padding: 25px 30px;
        border-radius: 14px;
        box-shadow: 0 5px 18px rgba(0, 0, 0, 0.15);
    }

    label {
        font-size: 14px;
        font-weight: 600;
        color: #333;
        margin-bottom: 4px;
        display: block;
    }

    input {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 8px;
        font-size: 14px;
        transition: 0.2s;
    }

    input:focus {
        border-color: #4A8BFF;
        outline: none;
        box-shadow: 0 0 4px rgba(74, 139, 255, 0.4);
    }

    button {
        width: 100%;
        padding: 11px;
        font-size: 15px;
        background: #4A8BFF;
        border: none;
        border-radius: 10px;
        color: white;
        cursor: pointer;
        font-weight: 600;
        transition: 0.2s;
    }

    button:hover {
        background: #2e6ce3;
    }

    .back {
        text-align: center;
        margin-top: 12px;
    }

    .back a {
        color: #4A8BFF;
        font-size: 14px;
        text-decoration: none;
    }

    .back a:hover {
        text-decoration: underline;
    }
    </style>

</head>

<body>

    <h2>Editar Producto</h2>

    <div class="container">

        <form method="POST">

            <label>Nombre:</label>
            <input type="text" name="name" value="<?= $product['name'] ?>" required>

            <label>Precio:</label>
            <input type="number" step="0.01" name="price" value="<?= $product['price'] ?>" required>

            <label>Barcode:</label>
            <input type="text" name="barcode" value="<?= $product['barcode'] ?>" required>

            <label>ID Categoría:</label>
            <input type="number" name="id_category" value="<?= $product['id_category'] ?>" required>

            <label>Marca:</label>
            <input type="text" name="brand" value="<?= $product['brand'] ?>" required>

            <label>Imagen (URL):</label>
            <input type="text" name="image_url" value="<?= $product['image_url'] ?>" required>

            <button type="submit">Guardar cambios</button>

        </form>

        <div class="back">
            <a href="productos.php">← Volver</a>
        </div>

    </div>

</body>

</html>