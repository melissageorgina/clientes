<?php
    require_once '../config/database.php';
    require_once 'funciones.php';

    $clienteController = new ClienteController();
    $clientes = $clienteController->listarClientes();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Íconos de FontAwesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  
  <!-- Fuente personalizada -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  
  <!-- Estilos personalizados -->
  <style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #fff3f8; /* Fondo suave, color pastel rosado */
        color: #333;
    }

    h1 {
        color: #ff66b2; /* Rosado pastel suave */
        font-weight: bold;
        text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1);
    }

    .breadcrumb-item.active {
        color: #ff66b2; /* Rosado para el enlace activo */
        font-weight: bold;
    }

    table {
        border: 2px solid #ffe0f1; /* Borde suave y delicado en tono rosado claro */
        border-radius: 10px; /* Bordes redondeados para la tabla */
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Sombra sutil */
    }

    table th {
        background-color: #ff66b2; /* Encabezados en rosado pastel */
        color: black;
        text-transform: uppercase;
        font-size: 1.1rem;
        padding: 1rem;
    }

    table td {
        background-color: #fff1f5; /* Fondo suave y claro para las celdas */
        color: #9b4d96; /* Color morado suave para el texto */
        text-align: center;
        padding: 1rem;
    }

    table tr:nth-child(even) td {
        background-color: #f9e6f0; /* Alternar filas con un tono morado más suave */
    }

    .btn {
        margin: 0 5px;
        border-radius: 50px; /* Bordes de los botones más redondeados */
        padding: 0.8rem 1.5rem;
        font-weight: bold;
    }

    .btn-warning {
        background-color: #ff9cc7; /* Botón rosado suave */
        color: white;
    }

    .btn-warning:hover {
        background-color: #ff66b2; /* Botón rosado oscuro al pasar el mouse */
    }

    .btn-danger {
        background-color: #e066c1; /* Púrpura suave */
        color: white;
    }

    .btn-danger:hover {
        background-color: #d25b94; /* Púrpura oscuro al pasar el mouse */
    }

    .btn-primary {
        background-color: #d48cf0; /* Morado claro */
        border: none;
        color: white;
    }

    .btn-primary:hover {
        background-color: #c1a6f3; /* Morado más suave al pasar el mouse */
    }

    /* Estilo adicional para breadcrumb */
    .breadcrumb {
        background-color: #fff0f6;
        border-radius: 8px;
        padding: 0.5rem;
    }

    .breadcrumb-item a {
        color: #b36bde; /* Enlaces en morado suave */
        text-decoration: none;
    }

    .breadcrumb-item a:hover {
        color: #ff66b2; /* Hover rosado claro */
        text-decoration: underline;
    }

    /* Animación en los botones */
    .btn {
        transition: all 0.3s ease-in-out;
    }

    /* Tabla con bordes redondeados */
    table {
        border-radius: 10px;
        overflow: hidden;
    }

    /* Colores de los enlaces */
    a {
        color: #9b4d96; /* Color morado para los enlaces */
    }

    a:hover {
        color: #ff66b2; /* Hover rosado */
        text-decoration: underline;
    }
</style>


  
  <title>Gestión de Clientes</title>
</head>
<body>
    <div class="container mt-4">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../index.php">Inicio</a></li>
                <li class="breadcrumb-item active">Clientes</li>
            </ol>
        </nav>

        <!-- Encabezado -->
        <div class="row mb-3">
            <div class="col">
                <h1>Gestión Clientes</h1>
            </div>
            <div class="col text-end">
                <a href="nuevo.php" class="btn btn-primary"><i class="fas fa-user-plus"></i> Nuevo Cliente</a>
            </div>
        </div>

        <!-- Tabla -->
        <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($clientes as $cliente): ?>
                <tr>
                    <td><?php echo $cliente->_id; ?></td>
                    <td><?php echo $cliente->nombre; ?></td>
                    <td><?php echo $cliente->correo; ?></td>
                    <td><?php echo $cliente->telefono; ?></td>
                    <td><?php echo $cliente->direccion; ?></td>
                    <td>
                        <a href="editar.php?id=<?php echo $cliente->_id; ?>" class="btn btn-warning">
                            <i class="fas fa-edit"></i> Editar
                        </a>
                        <a href="funciones.php?action=eliminar&id=<?php echo $cliente->_id ?>" 
                            class="btn btn-danger"
                            onclick="return confirm('¿Está seguro de eliminar este cliente?')">
                            <i class="fas fa-trash-alt"></i> Eliminar
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
