<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión — <?= SITE_NAME ?></title>
    <link rel="stylesheet" href="CSS/style.css?v=2">
</head>
<body class="auth-body" style="background-image: url('https://images.unsplash.com/photo-1540555700478-4be289fbecef?w=1600&h=900&fit=crop&crop=center'); background-size: cover; background-position: center;">
    <div class="auth-overlay"></div>

    <a class="back-link" href="index.php">← Volver al Inicio</a>

    <div class="auth-card">

        <!-- Cabecera -->
        <div class="auth-header">
            <div class="auth-icon">🌸</div>
            <h2>Iniciar Sesión</h2>
            <p>Bienvenida de nuevo a <?= SITE_NAME ?></p>
        </div>

        <!-- Error general -->
        <?php if (!empty($_SESSION['errors']['general'])): ?>
            <div class="alert alert-error">
                ⚠️ <?= $_SESSION['errors']['general'] ?>
            </div>
        <?php endif; ?>

        <!-- Éxito (viene del registro) -->
        <?php if (!empty($_SESSION['success'])): ?>
            <div class="alert alert-success">
                ✅ <?= $_SESSION['success'] ?>
            </div>
        <?php endif; ?>

        <!-- Formulario -->
        <form action="<?= SITE_URL ?>index.php?action=loginUser" method="POST">

            <!-- Email -->
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email"
                       value="<?= $_SESSION['old']['email'] ?? '' ?>"
                       class="<?= !empty($_SESSION['errors']['email']) ? 'input-error' : '' ?>"
                       placeholder="Ej: correo@sena.com">
                <?php if (!empty($_SESSION['errors']['email'])): ?>
                    <span class="field-error"><?= $_SESSION['errors']['email'] ?></span>
                <?php endif; ?>
            </div>

            <!-- Contraseña -->
            <div class="form-group">
                <label>Contraseña</label>
                <input type="password" name="password"
                       class="<?= !empty($_SESSION['errors']['password']) ? 'input-error' : '' ?>"
                       placeholder="Tu contraseña"
                       maxlength="60">
                <?php if (!empty($_SESSION['errors']['password'])): ?>
                    <span class="field-error"><?= $_SESSION['errors']['password'] ?></span>
                <?php endif; ?>
            </div>

            <button type="submit" class="btn btn-primary btn-block">🌸 Ingresar</button>

        </form>

        <p class="auth-footer">¿No tienes cuenta?
            <a href="index.php?action=getFormRegisterUser">Regístrate aquí</a>
        </p>

    </div>

    <?php
        unset($_SESSION['errors']);
        unset($_SESSION['old']);
        unset($_SESSION['success']);
    ?>

</body>
</html>
