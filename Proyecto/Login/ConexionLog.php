<?php
    $conexion = mysqli_connect("localhost", "root", "", "capacitador") or die("Problemas en la conexión");

    // Verificar si se ha enviado el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usuario = mysqli_real_escape_string($conexion, $_POST['usuario']);
        $contraseña = mysqli_real_escape_string($conexion, $_POST['contraseña']);

        // Consulta para verificar los datos del usuario en la base de datos
        $query = "SELECT * FROM datosgenerales WHERE Usuario = '$usuario' AND Contraseña = '$contraseña'";
        $resultado = mysqli_query($conexion, $query);

        if (mysqli_num_rows($resultado) == 1) {
            // Usuario y contraseña son correctos, redirigir a la página de inicio
            header("Location: index.html");
            exit();
        } else {
            // Usuario o contraseña incorrectos, mostrar mensaje de error
            echo "Usuario o contraseña incorrectos. Por favor, inténtelo de nuevo.";
        }
    } else {
        echo "Error: No se recibieron datos del formulario.";
    }

    mysqli_close($conexion);
?>
