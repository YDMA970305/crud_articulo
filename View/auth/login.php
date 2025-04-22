<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <style>
        body { font-family: sans-serif; }
        .container { width: 300px; margin: 50px auto; border: 1px solid #ccc; padding: 20px; }
        input[type=text], input[type=password], button { width: 100%; padding: 10px; margin-bottom: 10px; box-sizing: border-box; }
        .error { color: red; margin-bottom: 10px; }
        .success { color: green; margin-bottom: 10px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Iniciar Sesión</h2>

        <?php if (isset($error)): ?>
            <p class="error"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>

        <?php if (isset($mensaje)): ?>
            <p class="success"><?php echo htmlspecialchars($mensaje); ?></p>
        <?php endif; ?>

        <form method="post" action="index.php?accion=login">
            <div>
                <label for="username_or_email">Nombre de Usuario o Email:</label>
                <input type="text" id="username_or_email" name="username_or_email" required>
            </div>
            <div>
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Iniciar Sesión</button>
        </form>

        <?php if (isset($_GET['registro']) && $_GET['registro'] === 'exitoso'): ?>
            <p class="success">Registro exitoso. ¡Puedes iniciar sesión!</p>
        <?php endif; ?>

        <?php if (isset($_GET['registro']) && $_GET['registro'] === 'fallido'): ?>
            <p class="error">Error durante el registro. Inténtalo de nuevo.</p>
        <?php endif; ?>

        <?php if (isset($_GET['accion']) && $_GET['accion'] === 'mostrar_registro'): ?>
            <p><a href="index.php?accion=mostrar_registro">¿No tienes cuenta? Regístrate aquí</a></p>
        <?php endif; ?>
    </div>
</body>
</html>