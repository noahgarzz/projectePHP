<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Reservas</title>
  <link rel="stylesheet" type="text/css" href="estilos.css">
</head>
<body>
  <header>
    <h1>Barber</h1>
    <nav>
      <ul>
        <li><a href="indice.php">Reservas</a></li>
        <li><a href="contacto.html">Contacto</a></li>
        <li><a href="index.html">Tancar la sessió</a></li>
      </ul>
    </nav>
  </header>
  <main>
    <h2>Formulario de Reservas</h2>
    <form action="reservar.php" method="post">
      <label for="nombre">Nombre:</label>
      <input type="text" id="nombre" name="nombre" required>

      <label for="apellidos">Apellidos:</label>
      <input type="text" id="apellidos" name="apellidos" required>

      <label for="telefono">Teléfono:</label>
      <input type="tel" id="telefono" name="telefono" required>

      <label for="email">Correo electrónico:</label>
      <input type="email" id="email" name="email" required>

      <label for="hora">Hora:</label>
      <select id="hora" name="hora">
        <option value="" disabled selected>Seleccione una hora</option>
        <option value="08:00">08:00</option>
        <option value="09:00">09:00</option>
        <option value="10:00">10:00</option>
        <option value="11:00">11:00</option>
        <option value="12:00">12:00</option>
        <option value="13:00">13:00</option>
        <option value="14:00">14:00</option>
      </select>

      <label for="fecha">Día:</label>
      <input type="date" id="fecha" name="fecha" min="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d', strtotime('+20 days')); ?>" required>

      <input type="submit" value="Reservar">
    </form>
  </main>
  <footer>
    <p>© 2023 Noah García</p>
  </footer>
</body>
</html>
