<?php
    $conexion = mysqli_connect("localhost", "root", "", "capacitador") or die("Problemas en la conexión");

    // Verificar si se ha enviado el formulario
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $usuario = mysqli_real_escape_string($conexion, $_POST['usuario']);
        $nombre = mysqli_real_escape_string($conexion, $_POST['nombre']);
        $apPaterno = mysqli_real_escape_string($conexion, $_POST['Ap']);
        $apMaterno = mysqli_real_escape_string($conexion, $_POST['Am']);
        $email = mysqli_real_escape_string($conexion, $_POST['email']);
        $password = mysqli_real_escape_string($conexion, $_POST['pass']);

        // Verificar si el usuario ya existe en la base de datos
        $verificar_usuario = mysqli_query($conexion, "SELECT * FROM datosgenerales WHERE Usuario = '$usuario'");

        if (mysqli_num_rows($verificar_usuario) > 0) {
            // El usuario ya existe, mostrar mensaje de error
            echo "El usuario '$usuario' ya está ocupado. Por favor, elija otro nombre de usuario.";
        } else {
            // Verificar si el email ya existe en la base de datos
            $verificar_email = mysqli_query($conexion, "SELECT * FROM datosgenerales WHERE Email = '$email'");

            if (mysqli_num_rows($verificar_email) > 0) {
                // El email ya existe, mostrar mensaje de error
                echo "El correo electrónico '$email' ya está registrado. Por favor, ingrese otro correo electrónico.";
            } else {
                // El usuario y el email son válidos, proceder con la inserción en la base de datos
                $query = "INSERT INTO datosgenerales (Usuario, Nombre, ApellidoPaterno, ApellidoMaterno, Email, Contraseña) VALUES ('$usuario', '$nombre', '$apPaterno', '$apMaterno', '$email', '$password')";

                if (mysqli_query($conexion, $query)) {
                    echo "¡Cliente registrado correctamente!";
                } else {
                    echo "Error en la inserción: " . mysqli_error($conexion);
                }
            }
        }
    } else {
        echo "Error: No se recibieron datos del formulario.";
    }

    mysqli_close($conexion);
?>
