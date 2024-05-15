<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel del Doctor</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4 text-center">Citas Médicas Asignadas</h2>
    <div class="table-responsive">
        <table class="table table-striped table-hover mt-3 text-center table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Nombre del Paciente</th>
                    <th>Teléfono del Paciente</th>
                    <th>Email del Paciente</th>
                    <th>Fecha de la Cita</th>
                    <th>Descripción</th>
                    <th>Estado de la Cita</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $conexion = new mysqli("localhost", "root", "", "db_mcitas");
            if ($conexion->connect_error) {
                die("Conexión fallida: " . $conexion->connect_error);
            }

            $sql = "SELECT id, nombre, email, telefono, fecha, mensaje, estado FROM solicitud ";
            $result = $conexion->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row["nombre"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["telefono"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["email"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["fecha"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["mensaje"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["estado"]) . "</td>";
                    echo "<td>";
                   
                    //Botones de acciones.
                    if ($row["estado"] == "pendiente") {
                        echo "<form action='aprobar_cita.php' method='post'>";
                        echo "<input type='hidden' name='cita_id' value='" . $row["id"] . "'>";
                        echo "<button type='submit' class='btn btn-success' name='aprobar'>Aprobar</button>";
                        echo "</form>";
                        echo "<form action='rechazar_cita.php' method='post'>";
                        echo "<input type='hidden' name='cita_id' value='" . $row["id"] . "'>";
                        echo "<button type='submit' class='btn btn-danger' name='rechazar'>Rechazar</button>";
                        echo "</form>";
                    } else {
                        echo "Acción no disponible";
                    }
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No hay citas para mostrar</td></tr>";
            }

            $conexion->close();
            ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

