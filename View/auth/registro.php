<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <style>
        body { font-family: sans-serif; }
        .container { width: 300px; margin: 50px auto; border: 1px solid #ccc; padding: 20px; }
        input[type=text], input[type=email], input[type=password], button { width: 100%; padding: 10px; margin-bottom: 10px; box-sizing: border-box; }
        .error { color: red; margin-bottom: 10px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Registrarse</h2>

        <?php if (isset($error)): ?>
            <p class="error"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>

        <form method="post" action="index.php?accion=registrar_usuario">
            <div>
                <label for="nombreUsuario">Nombre de Usuario:</label>
                <input type="text" id="nombreUsuario" name="nombreUsuario" required>
            </div>
            <div>
                <label for="nombre">Nombre Completo:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div>
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Registrarse</button>
        </form>

        <p><a href="index.php?accion=mostrar_login">¿Ya tienes cuenta? Inicia sesión aquí</a></p>
    </div>
</body>
</html>