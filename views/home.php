<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= SITE_NAME ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/proyecto_hotel/CSS/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>

        .nav-links a { text-decoration: none; }
        .modal { color: #333; }
    </style>
</head>
<body>

    <nav class="navbar-custom"> <div class="container nav-inner">
            <a class="brand" href="<?= SITE_URL ?>">
                <img src="https://images.unsplash.com/photo-1560347876-aeef00ee58a1?w=80&h=80&fit=crop&crop=center" alt="Logo" class="nav-logo">
                <?= SITE_NAME ?>
            </a>
            <div class="nav-links">
                <a href="#habitaciones">Habitaciones</a>
                <a href="#servicios">Servicios</a>
                <a href="#contacto">Contacto</a>

                <?php if(!empty($_SESSION['data'])): ?>
                    <span style="color: var(--rose-dark); font-weight: 700; margin-right: 10px;">
                        🌸 Hola, <?= $_SESSION['data']['name'] ?>
                    </span>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalReserva">
                        Reserva
                    </button>
                    <a href="index.php?action=closeSession" class="btn btn-outline">Cerrar Sesión</a>
                <?php else: ?>
                    <a href="index.php?action=getFormLoginUser" class="btn btn-outline">Ingresar</a>
                    <a href="index.php?action=getFormRegisterUser" class="btn btn-success">Registrarse</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <section class="hero" style="background-image: url('https://images.unsplash.com/photo-1582719508461-905c673771fd?w=1600&h=700&fit=crop&crop=center'); background-size: cover; background-position: center;">
        <div class="hero-overlay"></div>
        <div class="container hero-content">
            <?php if(!empty($_SESSION['data'])): ?>
                <h1>Bienvenido,<br><span><?= $_SESSION['data']['name'] ?> 🌸</span></h1>
                <p>Nos alegra tenerte de vuelta en <?= SITE_NAME ?>. Explora nuestras habitaciones y servicios.</p>
                <div class="hero-btns">
                    <a href="#habitaciones" class="btn btn-primary">✦ Ver Habitaciones</a>
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalReserva">Hacer una Reserva</button>
                </div>
            <?php else: ?>
                <h1>Bienvenida al<br><span><?= SITE_NAME ?></span></h1>
                <p>Un refugio de elegancia y confort en el corazón del campus SENA – Ibagué.
                   Vive una experiencia única donde la tranquilidad y el lujo se encuentran.</p>
                <div class="hero-btns">
                    <a href="index.php?action=getFormLoginUser" class="btn btn-primary">✦ Ingresar</a>
                    <a href="index.php?action=getFormRegisterUser" class="btn btn-outline-white">Registrarse</a>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <section class="section" id="habitaciones">
        <div class="container">
            <h2 class="section-title">Nuestras Habitaciones</h2>
            <p class="section-sub">Espacios diseñados para tu descanso y bienestar</p>
            <div class="cards">
                <div class="card-item">
                    <img src="https://images.unsplash.com/photo-1616594039964-ae9021a400a0?w=500&h=300&fit=crop&crop=center" alt="Habitación Sencilla" class="card-img">
                    <div class="card-body">
                        <h3>Habitación Sencilla</h3>
                        <p>Acogedora y elegante para viajeros individuales. Cama queen, baño privado con amenidades premium y WiFi de alta velocidad.</p>
                    </div>
                </div>
                <div class="card-item">
                    <img src="https://images.unsplash.com/photo-1595526114035-0d45ed16cfbf?w=500&h=300&fit=crop&crop=center" alt="Habitación Doble" class="card-img">
                    <div class="card-body">
                        <h3>Habitación Doble</h3>
                        <p>Perfecta para parejas o acompañantes. Dos camas individuales, decoración cálida, escritorio y vista al jardín interior.</p>
                    </div>
                </div>
                <div class="card-item">
                    <img src="https://images.unsplash.com/photo-1578683010236-d716f9a3f461?w=500&h=300&fit=crop&crop=center" alt="Suite Ejecutiva" class="card-img">
                    <div class="card-body">
                        <h3>Suite Ejecutiva</h3>
                        <p>El máximo lujo con sala de estar privada, bañera, minibar selecto y servicio personalizado las 24 horas.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section" id="servicios" style="background: #fff;">
        <div class="container">
            <h2 class="section-title">Nuestros Servicios</h2>
            <p class="section-sub">Todo lo que necesitas para una estadía perfecta</p>
            <div class="cards">
                <div class="card-item">
                    <img src="https://images.unsplash.com/photo-1544161515-4ab6ce6db874?w=500&h=300&fit=crop&crop=center" alt="Spa" class="card-img">
                    <div class="card-body">
                        <h3>Spa & Bienestar</h3>
                        <p>Déjate consentir con nuestros tratamientos de relajación, masajes terapéuticos y aromaterapia de lujo.</p>
                    </div>
                </div>
                <div class="card-item">
                    <img src="https://images.unsplash.com/photo-1414235077428-338989a2e8c0?w=500&h=300&fit=crop&crop=center" alt="Restaurante" class="card-img">
                    <div class="card-body">
                        <h3>Restaurante Gourmet</h3>
                        <p>Sabores únicos con ingredientes frescos y locales. Desayuno buffet, almuerzo y cena con menú de autor.</p>
                    </div>
                </div>
                <div class="card-item">
                    <img src="https://images.unsplash.com/photo-1571896349842-33c89424de2d?w=500&h=300&fit=crop&crop=center" alt="Piscina" class="card-img">
                    <div class="card-body">
                        <h3>Piscina & Jardines</h3>
                        <p>Relájate en nuestra piscina rodeada de jardines florales. Área de descanso con tumbonas y servicio de bebidas.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer" id="contacto">
        <p>🌸 &copy; <?= date('Y') ?> <?= SITE_NAME ?> — SENA Ibagué &nbsp;|&nbsp; Hecho con amor para nuestras huéspedes</p>
    </footer>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>