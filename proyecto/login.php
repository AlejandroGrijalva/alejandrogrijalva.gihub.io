<?php
    session_destroy();
    session_start();
    if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/login.css">
    <title>Login</title>

</head>

<body>
    <form action="login.php" method="post">
        <div class="screen-1" id="login-screen">
            <div class="logo">
                <svg class="logo" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                    version="1.1" width="300" height="300" viewBox="0 0 640 480">
                    <g transform="matrix(3.31 0 0 3.31 320.4 240.4)">
                        <circle cx="0" cy="0" r="40" style="fill: rgb(61,71,133);" />
                    </g>
                    <g transform="matrix(0.98 0 0 0.98 268.7 213.7)">
                        <circle cx="0" cy="0" r="40" style="fill:#fff" />
                    </g>
                    <g transform="matrix(1.01 0 0 1.01 362.9 210.9)">
                        <circle cx="0" cy="0" r="40" style="fill:#fff" />
                    </g>
                    <g transform="matrix(0.92 0 0 0.92 318.5 286.5)">
                        <circle cx="0" cy="0" r="40" style="fill:#fff" />
                    </g>
                    <g transform="matrix(0.16 -0.12 0.49 0.66 290.57 243.57)">
                        <polygon points="-50,-50 -50,50 50,50 50,-50" style="fill:#fff" />
                    </g>
                    <g transform="matrix(0.16 0.1 -0.44 0.69 342.03 248.34)">
                        <polygon points="-50,-50 -50,50 50,50 50,-50" style="fill:#fff" />
                    </g>
                </svg>
            </div>

            <div class="email">
                <label>Email Address</label>
                <div class="sec-2">
                    <ion-icon name="mail-outline"></ion-icon>
                    <input name="email" type="email" placeholder="Username@gmail.com">
                </div>
            </div>

            <div class="password">
                <label>Password</label>
                <div class="sec-2">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    <input name="password" type="password" placeholder="············" style="width: 90%;">
                    <ion-icon class="show-hide" style="margin-left: -20px" name="eye-outline"></ion-icon>
                </div>
            </div>

            <input type="submit" name="login" value="Login" class="login"></input>

            <div class="footer">
                <span onclick="showSignup()">Sign up</span>
                <span>Forgot Password?</span>
            </div>
        </div>
    </form>

    <!-- ---------- SIGN UP FORM ---------- -->
    <form action="login.php" method="post">
        <div class="screen-1" id="signup-screen" style="display:none;">
            <div class="logo">
                <svg class="logo" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                    version="1.1" width="300" height="300" viewBox="0 0 640 480">
                    <g transform="matrix(3.31 0 0 3.31 320.4 240.4)">
                        <circle cx="0" cy="0" r="40" style="fill: rgb(61,71,133);" />
                    </g>
                    <g transform="matrix(0.98 0 0 0.98 268.7 213.7)">
                        <circle cx="0" cy="0" r="40" style="fill:#fff" />
                    </g>
                    <g transform="matrix(1.01 0 0 1.01 362.9 210.9)">
                        <circle cx="0" cy="0" r="40" style="fill:#fff" />
                    </g>
                    <g transform="matrix(0.92 0 0 0.92 318.5 286.5)">
                        <circle cx="0" cy="0" r="40" style="fill:#fff" />
                    </g>
                    <g transform="matrix(0.16 -0.12 0.49 0.66 290.57 243.57)">
                        <polygon points="-50,-50 -50,50 50,50 50,-50" style="fill:#fff" />
                    </g>
                    <g transform="matrix(0.16 0.1 -0.44 0.69 342.03 248.34)">
                        <polygon points="-50,-50 -50,50 50,50 50,-50" style="fill:#fff" />
                    </g>
                </svg>
            </div>

            <div class="email ">
                <label>Full Name</label>
                <div class="sec-2">
                    <ion-icon name="person-outline"></ion-icon>
                    <input type="text" name="name" placeholder="Joel Ramirez">
                </div>
            </div>

            <div class="email" style="margin-top: .2rem;">
                <label>Email Address</label>
                <div class="sec-2">
                    <ion-icon name="mail-outline"></ion-icon>
                    <input type="email" name="email" placeholder="example@gmail.com">
                </div>
            </div>

            <div class="password">
                <label>Password</label>
                <div class="sec-2">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    <input type="password" name="password" placeholder="············">
                </div>
            </div>

            <input type="submit" name="singin" value="Create Acount" class="login"></input>

            <div class="footer">
                <span onclick="showLogin()">Back to Login</span>
            </div>
        </div>
    </form>
    <script>
    function showSignup() {
        document.getElementById("login-screen").style.display = "none";
        document.getElementById("signup-screen").style.display = "flex";
    }

    function showLogin() {
        document.getElementById("signup-screen").style.display = "none";
        document.getElementById("login-screen").style.display = "flex";
    }
    </script>

    <ion-icon></ion-icon>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>


</body>

<?php 
   require_once 'php/conection.php';

if (isset($_POST['singin'])) {

    $nombre_usuario = trim($_POST['name']);
    $correo = trim($_POST['email']);
    $password = $_POST['password'];

    $errores = [];

    if (empty($nombre_usuario)) {
        $errores[] = "El nombre es obligatorio";
    }

    if (empty($correo)) {
        $errores[] = "El email es obligatorio";
    } elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "El email no es válido";
    }

    if (empty($password)) {
        $errores[] = "La contraseña es obligatoria";
    } elseif (strlen($password) < 6) {
        $errores[] = "La contraseña debe tener al menos 6 caracteres";
    }

    if (!empty($errores)) {
        $mensaje = implode(", ", $errores);
        header("Location: registro.php?error=" . urlencode($mensaje));
        exit();
    }

    $contrasena_hash = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $con->prepare("INSERT INTO users (name, email, password_hash) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nombre_usuario, $correo, $contrasena_hash);

    if ($stmt->execute()) {
        echo "<script>alert('Usuario registrado exitosamente'); window.location.href = 'login.php';</script>";
        exit();
    }

    $stmt->close();

} 

?>
<?php 
require_once 'php/conection.php';
if (isset($_POST["login"])) {
    
    $correo = trim($_POST['email']);
    $password = $_POST['password'];
    
    if (empty($correo) || empty($password)) {
        header("Location: login.php?error=" . urlencode("Por favor completa todos los campos"));
        exit();
    }
    
    $stmt = $con->prepare("SELECT id, name, email, password_hash FROM users WHERE email = ?");
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $resultado = $stmt->get_result();
    
    if ($resultado->num_rows === 1) {
        $usuario = $resultado->fetch_assoc();
        
        if (password_verify($password, $usuario['password_hash'])) {
            
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_nombre'] = $usuario['name'];
            $_SESSION['usuario_email'] = $usuario['email'];
            echo "<script>alert('Usuario registrado exitosamente'); window.location.href = 'index.php';</script>";
            
            
  
        } else {
            header("Location: login.php?error=" . urlencode("Email o contraseña incorrectos"));
            exit();
        }
    } else {
        header("Location: login.php?error=" . urlencode("Email o contraseña incorrectos"));
        exit();
    }
    
    $stmt->close();
} 

?>

</html>