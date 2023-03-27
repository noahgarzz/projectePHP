<?php
// Verificar si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// Obtener los valores de los campos del formulario
	$nombre = $_POST['nombre'];
	$apellidos = $_POST['apellidos'];
	$email = $_POST['email'];
	$password1 = $_POST['password1'];
	$password2 = $_POST['password2'];

	// Verificar si las contraseñas coinciden
	if ($password1 != $password2) {
		echo 'Las contraseñas no coinciden';
		exit();
	}

	// Conectar a la base de datos
	$dbhost = 'localhost';
	$dbuser = 'admin';
	$dbpass = 'admin';
	$dbname = 'reservas';
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	// Verificar si se ha establecido la conexión
	if (!$conn) {
		die('No se pudo conectar a la base de datos: ' . mysqli_error());
	}

	// Insertar los valores del formulario en la tabla de usuarios
	$sql = "INSERT INTO usuarios (nombre, apellidos, email, password) VALUES ('$nombre', '$apellidos', '$email', '$password1')";
	if (mysqli_query($conn, $sql)) {
		echo 'Registro exitoso';
        header("Location: indice.php");
	} else {
		echo 'Error al registrar el usuario: ' . mysqli_error($conn);
	}

	// Cerrar la conexión
	mysqli_close($conn);
}
?>
