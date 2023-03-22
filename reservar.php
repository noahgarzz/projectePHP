<?php
// Conectar a la base de datos
$servername = "localhost";
$username = "admin";
$password = "admin";
$dbname = "reservas";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Procesar el formulario si se ha enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $nombre = $_POST["nombre"];
    $apellidos = $_POST["apellidos"];
    $telefono = $_POST["telefono"];
    $email = $_POST["email"];
    $fecha = $_POST["fecha"];
    $hora = $_POST["hora"];

    // Comprobar que la fecha y la hora seleccionadas están disponibles
    $disponible = true;
    $sql = "SELECT * FROM reservas WHERE fecha = '$fecha' AND hora = '$hora'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $disponible = false;
    }

    // Si está disponible, guardar la reserva en la base de datos
    if ($disponible) {
        // Insertar datos del cliente en la tabla clientes
        $sql_cliente = "INSERT INTO clientes (nombre, apellidos, telefono, email) VALUES ('$nombre', '$apellidos', '$telefono', '$email')";
        if ($conn->query($sql_cliente) === TRUE) {
            $cliente_id = $conn->insert_id; // Obtener el ID del cliente recién insertado
        } else {
            echo "Error al guardar los datos del cliente: " . $conn->error;
            exit;
        }
    
        // Insertar datos de la reserva en la tabla reservas
        $sql_reserva = "INSERT INTO reservas (cliente_id, fecha, hora) VALUES ('$cliente_id', '$fecha', '$hora')";
        if ($conn->query($sql_reserva) === TRUE) {
            echo "<p class='exito'>Reserva realizada con éxito</p>";
        } else {
            echo "Error al guardar la reserva: " . $conn->error;
        }
    } else {
        echo "<p class='error'>Lo siento, la fecha y hora seleccionadas no están disponibles.</p>";
    }
}    
// Cerrar la conexión a la base de datos
$conn->close();
?>

<html>
<head>
    <style>
        .exito {
            color: green;
            font-weight: bold;
            font-family: Arial, sans-serif;

        }

        .error {
            color: red;
            font-weight: bold;
            font-family: Arial, sans-serif;

        }

    </style>
</head>
