<?php

function mostrarFormulario() {
    require 'views/new-user.php';
}

function guardarUsuario() {
    require 'connection.php';

    $name = $_POST['name'] ?? '';
    $lastname = $_POST['lastname'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $email = $_POST['email'] ?? '';
    $comments = $_POST['comments'] ?? '';

    if ($name && $email) {
        try {
            $stmt = $pdo->prepare("INSERT INTO client (name, lastname, phone, email, comments) VALUES (:name, :lastname, :phone, :email, :comments)");
            $stmt->execute([
                ':name' => $name,
                ':lastname' => $lastname,
                ':phone' => $phone,
                ':email' => $email,
                ':comments' => $comments
            ]);
            $message = "Usuario guardado correctamente.";
        } catch (PDOException $e) {
            $mesage = "Error al guardar: " .$e->getMessage();
        }
        // Aquí podrías guardar en base de datos
        // Redireccionar o mostrar vista con mensaje
        $mensaje = "Usuario $name creado con éxito.";
    } else {
        $message = "Faltan datos.";
    }

    require 'views/message.php';
}
