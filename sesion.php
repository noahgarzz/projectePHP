<?php
// Verificar si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// Obtener los valores de los campos del formulario
	$email = $_POST['email'];
	$password = $_POST['password'];

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

	// Verificar si el email y la contraseña coinciden con los registros de la base de datos
	$sql = "SELECT * FROM usuarios WHERE email = '$email' AND password = '$password'";
	$resultado = mysqli_query($conn, $sql);

	if (mysqli_num_rows($resultado) > 0) {
		echo 'Inicio de sesión exitoso';
        header("Location: indice.php");
	} else {
		echo 'Email o contraseña incorrectos';
	}

	// Cerrar la conexión
	mysqli_close($conn);
}
?>