  GNU nano 6.2                                                                                      index.php                                                                                               
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos Personales</title>
</head>
<body>
    <h1>Datos Personales</h1>

    <?php
    $host = 'mysql';
    $user = 'root';
    $pass = 'rootpassword';
    $db = 'Usuarios';

    // Crear conexión
    $conn = new mysqli($host, $user, $pass, $db);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Consulta SQL para obtener los datos personales
    $sql = "SELECT nombre, apellido, dni FROM DatosPersonales";
    $result = $conn->query($sql);

    // Verificar si hay resultados y mostrarlos en una tabla
    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>Nombre</th><th>Apellido</th><th>DNI</th></tr>";
        // Recorrer cada fila de resultados
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["nombre"]."</td><td>".$row["apellido"]."</td><td>".$row["dni"]."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }

    // Cerrar la conexión
    $conn->close();
    ?>
