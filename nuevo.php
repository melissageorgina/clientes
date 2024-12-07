<?php

use MongoDB\Operation\Explain;

require_once '../config/database.php';
require_once 'funciones.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $clienteController = new ClienteController();
    try {
        $clienteController->crearCliente($_POST);
        header('Location: index.php');
        exit;
    } catch (Exception $e) {
        throw new Exception("Error al obtener el cliente: " . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>Nuevo Cliente</title>
  
  <!-- Agregamos estilo personalizado -->
  <style>
    body {
        font-family: 'Poppins', sans-serif;
        background-color: #f4f4f9;
        color: #333;
    }

    .container {
        max-width: 800px;
        margin-top: 30px;
        background-color: #ffffff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    h1 {
        color: #9b4d96;
        text-align: center;
        margin-bottom: 20px;
    }

    .breadcrumb-item.active {
        color: #ff337f;
        font-weight: bold;
    }

    .form-label {
        font-weight: bold;
        color: #7e33ff;
    }

    .form-control {
        border-radius: 8px;
        border: 1px solid #ddd;
        padding: 0.8rem;
        font-size: 1rem;
    }

    .btn-primary {
        background-color: #ff337f;
        border: none;
        border-radius: 8px;
        padding: 0.8rem 2rem;
    }

    .btn-primary:hover {
        background-color: #ff66b2;
    }

    .btn-danger {
        background-color: #6c619c;
        border: none;
        border-radius: 8px;
        padding: 0.8rem 2rem;
    }

    .btn-danger:hover {
        background-color: #9b4d96;
    }

    .invalid-feedback {
        font-size: 0.9rem;
        color: #ff337f;
    }

    .breadcrumb {
        background-color: transparent;
        padding-left: 0;
    }
  </style>
</head>
<body>
    <div class="container mt-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="../index.php">Inicio</a></li>
                <li class="breadcrumb-item"><a href="index.php">Clientes</a></li>
                <li class="breadcrumb-item active" aria-current="page">Nuevo Cliente</li>
            </ol>
        </nav>

        <h1>Nuevo Cliente</h1>

        <form method="POST" class="needs-validation" novalidate>
            <div class="mb-3">
                <label class="form-label" for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" class="form-control" required>
                <div class="invalid-feedback">
                    Por favor ingrese el nombre del cliente.
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label" for="correo">Correo:</label>
                <input type="email" id="correo" name="correo" class="form-control" required>
                <div class="invalid-feedback">
                    Por favor ingrese el correo del cliente.
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label" for="telefono">Teléfono:</label>
                <input type="tel" id="telefono" name="telefono" class="form-control" required>
                <div class="invalid-feedback">
                    Por favor ingrese el teléfono del cliente.
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label" for="direccion">Dirección:</label>
                <textarea id="direccion" name="direccion" class="form-control" required></textarea>
                <div class="invalid-feedback">
                    Por favor ingrese la dirección del cliente.
                </div>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="index.php" class="btn btn-danger">Cancelar</a>
            </div>
        </form>
    </div>

    <script>
      // Validación de formulario para mostrar mensajes de error
      (function() {
        'use strict';
        window.addEventListener('load', function() {
          var forms = document.getElementsByClassName('needs-validation');
          Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>
</body>
</html>
