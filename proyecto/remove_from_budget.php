<?php
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Si existe el presupuesto en sesión, y el id está dentro del array
    if (isset($_SESSION['budget'])) {
        foreach ($_SESSION['budget'] as $index => $item) {

            if ($item['id'] == $id) {
                unset($_SESSION['budget'][$index]); // Lo elimina
                $_SESSION['budget'] = array_values($_SESSION['budget']); // Reindexar
                break;
            }
        }
    }
}

// Regresar al presupuesto
header("Location: budget.php");
exit();