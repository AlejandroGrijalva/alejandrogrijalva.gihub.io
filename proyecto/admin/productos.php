<?php 
require_once("../php/conection.php");
  $query = "SELECT * FROM products ";
$resultado = $con->query($query);
$products = [];
if ($resultado && $resultado->num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
        $products[] = $row;
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Demo</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <!-- FontAwesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
</head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
    font-family: sans-serif;
}

thead th {
    background: #f5f5f5;
    padding: 10px;
    border-bottom: 2px solid #ccc;
}

tbody td {
    padding: 10px;
    border-bottom: 1px solid #ddd;
}

tr:hover {
    background: #fafafa;
}

button {
    padding: 6px 12px;
    border: none;
    background: #007bff;
    color: white;
    cursor: pointer;
    border-radius: 4px;
}

button:hover {
    background: #0056b3;
}

button[type="submit"] {
    background: #dc3545;
}

button[type="submit"]:hover {
    background: #b52a36;
}

td img {
    border-radius: 4px;
}
</style>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary px-12 sticki">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Shopping</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="d-flex me-auto mb-2 mb-lg-0" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                <ul class="navbar-nav ">
                    <li class="nav-item">
                        <img src="./img/image.png" alt="" class="rounded-circle border border-success" width="40px"
                            height="40px">
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Alejandro Grijalva
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Perfil</a></li>
                            <li><a class="dropdown-item" href="#">Configuracion</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Cerrar Sesión</a></li>
                        </ul>
                    </li>

                </ul>

            </div>
        </div>
    </nav><!-- END NAVBAR-->
    <div class="row">
        <aside class="col-2">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">
                        <i class="fa fa-home"></i> Inicio
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fa fa-list"></i> Productos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fa fa-shopping-cart"></i> Pedidos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="fa fa-users"></i> Usuarios
                    </a>
                </li>
            </ul>
        </aside><!-- END ASIDE -->
        <main class="col-10">
            <div class="row p-3">
                <table border="1" cellpadding="8" cellspacing="0">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Barcode</th>
                            <th>Categoría</th>
                            <th>Marca</th>
                            <th>Imagen</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($products as $p): ?>
                        <tr>
                            <td><?= $p['id'] ?></td>
                            <td><?= $p['name'] ?></td>
                            <td>$<?= $p['price'] ?></td>
                            <td><?= $p['barcode'] ?></td>
                            <td><?= $p['id_category'] ?></td>
                            <td><?= $p['brand'] ?></td>
                            <td>
                                <img src=".<?= $p['image_url'] ?>" alt="img" width="60">
                            </td>
                            <td>
                                <a href="edit.php?id=<?= $p['id'] ?>">
                                    <button>Editar</button>
                                </a>

                                <form action="delete.php" method="POST" style="display:inline;">
                                    <input type="hidden" name="id" value="<?= $p['id'] ?>">
                                    <button type="submit" onclick="return confirm('¿Eliminar producto?');">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </main><!-- END MAIN -->
    </div>








    <!-- Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
</body>

</html>