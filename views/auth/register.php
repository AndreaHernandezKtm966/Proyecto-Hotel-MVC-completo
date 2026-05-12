<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Cuenta — <?= SITE_NAME ?></title>
    <link rel="stylesheet" href="CSS/style.css?v=2">
</head>
<body class="auth-body" style="background-image: url('https://images.unsplash.com/photo-1540555700478-4be289fbecef?w=1600&h=900&fit=crop&crop=center'); background-size: cover; background-position: center;">
    <div class="auth-overlay"></div>

    <a class="back-link" href="index.php">← Volver al Inicio</a>

    <div class="auth-card">

        <div class="auth-header">
            <div class="auth-icon">👤</div>
            <h2>Crear Cuenta</h2>
            <p>Únete a <?= SITE_NAME ?> y disfruta de nuestros servicios</p>
        </div>

        <?php if (!empty($_SESSION['errors']['general'])): ?>
            <div class="alert alert-error">
                ⚠️ <?= $_SESSION['errors']['general'] ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($_SESSION['success'])): ?>
            <div class="alert alert-success">
                ✅ <?= $_SESSION['success'] ?>
            </div>
        <?php endif; ?>

        <form action="<?= SITE_URL ?>index.php?action=registerUser" method="POST">

            <!-- Tipo y número de documento -->
            <div class="form-row">
                <div class="form-group">
                    <label>Tipo de Documento</label>
                    <select name="document_type_id"
                            class="<?= !empty($_SESSION['errors']['document_type_id']) ? 'input-error' : '' ?>">
                        <option value="">Seleccione...</option>
                        <?php foreach($documentTypes as $doc): ?>
                            <option value="<?= $doc['id'] ?>"
                                <?= (($_SESSION['old']['document_type_id'] ?? '') == $doc['id']) ? 'selected' : '' ?>>
                                <?= $doc['nombre'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <?php if (!empty($_SESSION['errors']['document_type_id'])): ?>
                        <span class="field-error"><?= $_SESSION['errors']['document_type_id'] ?></span>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label># Número de Documento</label>
                    <input type="text" name="document_number"
                           value="<?= $_SESSION['old']['document_number'] ?? '' ?>"
                           class="<?= !empty($_SESSION['errors']['document_number']) ? 'input-error' : '' ?>"
                           placeholder="Ej: 1115450150">
                    <?php if (!empty($_SESSION['errors']['document_number'])): ?>
                        <span class="field-error"><?= $_SESSION['errors']['document_number'] ?></span>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Nombre y Apellido -->
            <div class="form-row">
                <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" name="name"
                           value="<?= $_SESSION['old']['name'] ?? '' ?>"
                           class="<?= !empty($_SESSION['errors']['name']) ? 'input-error' : '' ?>"
                           placeholder="Ej: William">
                    <?php if (!empty($_SESSION['errors']['name'])): ?>
                        <span class="field-error"><?= $_SESSION['errors']['name'] ?></span>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <label>Apellido</label>
                    <input type="text" name="last_name"
                           value="<?= $_SESSION['old']['last_name'] ?? '' ?>"
                           class="<?= !empty($_SESSION['errors']['last_name']) ? 'input-error' : '' ?>"
                           placeholder="Ej: Duarte">
                    <?php if (!empty($_SESSION['errors']['last_name'])): ?>
                        <span class="field-error"><?= $_SESSION['errors']['last_name'] ?></span>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Teléfono y Email -->
            <div class="form-row">
                <div class="form-group">
                    <label>Teléfono</label>
                    <input type="text" name="phone"
                           value="<?= $_SESSION['old']['phone'] ?? '' ?>"
                           class="<?= !empty($_SESSION['errors']['phone']) ? 'input-error' : '' ?>"
                           placeholder="Ej: 3182006835">
                    <?php if (!empty($_SESSION['errors']['phone'])): ?>
                        <span class="field-error"><?= $_SESSION['errors']['phone'] ?></span>
                    <?php endif; ?>
                </div>

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
            </div>

            <!-- Contraseña -->
            <div class="form-group">
                <label>Contraseña</label>
                <input type="password" name="password" id="password"
                       class="<?= !empty($_SESSION['errors']['password']) ? 'input-error' : '' ?>"
                       placeholder="Entre 6 y 60 caracteres"
                       minlength="6" maxlength="60"
                       oninput="validarPassword()">
                <?php if (!empty($_SESSION['errors']['password'])): ?>
                    <span class="field-error"><?= $_SESSION['errors']['password'] ?></span>
                <?php endif; ?>

                <div class="pw-requisitos" id="pw-requisitos">
                    <div class="pw-req" id="req-min">✗ Mínimo 6 caracteres</div>
                    <div class="pw-req" id="req-max">✗ Máximo 60 caracteres</div>
                    <div class="pw-req" id="req-may">✗ Al menos 1 mayúscula</div>
                    <div class="pw-req" id="req-min2">✗ Al menos 1 minúscula</div>
                    <div class="pw-req" id="req-num">✗ Mínimo 6 números</div>
                    <div class="pw-req" id="req-esp">✗ Al menos 1 carácter especial</div>
                </div>
            </div>

            <!-- Confirmar Contraseña -->
            <div class="form-group">
                <label>Confirmar Contraseña</label>
                <input type="password" name="confirmar_password" id="password_confirm"
                       class="<?= !empty($_SESSION['errors']['confirmar_password']) ? 'input-error' : '' ?>"
                       placeholder="Confirma tu contraseña"
                       minlength="6" maxlength="60"
                       oninput="validarConfirm()">
                <?php if (!empty($_SESSION['errors']['confirmar_password'])): ?>
                    <span class="field-error"><?= $_SESSION['errors']['confirmar_password'] ?></span>
                <?php endif; ?>
                <div class="pw-req" id="req-confirm">✗ Las contraseñas coinciden</div>
            </div>

            <script>
            function validarPassword() {
                const pw = document.getElementById('password').value;
                const reglas = [
                    { id: 'req-min',  ok: pw.length >= 6 },
                    { id: 'req-max',  ok: pw.length <= 60 && pw.length > 0 },
                    { id: 'req-may',  ok: /[A-Z]/.test(pw) },
                    { id: 'req-min2', ok: /[a-z]/.test(pw) },
                    { id: 'req-num',  ok: (pw.match(/\d/g) || []).length >= 6 },
                    { id: 'req-esp',  ok: /[!@#$%^&*()\-_=+\[\]{};:'",.<>?\/\\|`~]/.test(pw) },
                ];
                reglas.forEach(r => {
                    const el = document.getElementById(r.id);
                    if (r.ok) {
                        el.classList.add('pw-ok');
                        el.textContent = '✓ ' + el.textContent.slice(2);
                    } else {
                        el.classList.remove('pw-ok');
                        el.textContent = '✗ ' + el.textContent.slice(2);
                    }
                });
                validarConfirm();
            }

            function validarConfirm() {
                const pw  = document.getElementById('password').value;
                const pw2 = document.getElementById('password_confirm').value;
                const el  = document.getElementById('req-confirm');
                if (pw2.length > 0 && pw === pw2) {
                    el.classList.add('pw-ok');
                    el.textContent = '✓ Las contraseñas coinciden';
                } else {
                    el.classList.remove('pw-ok');
                    el.textContent = '✗ Las contraseñas coinciden';
                }
            }
            </script>

            <button type="submit" class="btn btn-primary btn-block">👤 Crear Cuenta</button>

        </form>

        <p class="auth-footer">¿Ya tienes una cuenta?
            <a href="index.php?action=getFormLoginUser">Inicia sesión aquí</a>
        </p>

    </div>

    <?php
        unset($_SESSION['errors']);
        unset($_SESSION['old']);
        unset($_SESSION['success']);
    ?>

</body>
</html>