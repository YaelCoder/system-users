<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;700&display=swap');

        body, html {
            height: 100%;
            margin: 0;
            font-family: "Instrument Sans", sans-serif;
        }

        .content-body {
            display: flex;
            height: 100%;
        }

        .form-login {
            background-color: #fff;
            width: 40%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .title {
            color: #202124;
            font-weight: 700;
            line-height: 1.25;
        }

        .subtitle {
            color: #606261;
        }

        .form {
            width: 70%;
        }

        label {
            color: #595c5f;
        }

        #show_password {
            background-color: #2e42c3;
            border-color: #2e42c3;
            height: 58px;
            border-bottom-left-radius: 0;
            border-top-left-radius: 0;
        }

        .btn-submit {
            margin-top: 20px;
            width: 100%;
        }

        a {
            text-decoration: none;
            color: #606261;
        }

        a:hover {
            color: blue;
            transition: all 0.3s ease-in-out;
        }

        #carousel-content {
            width: 60%;
        }

        .wallpaper {
            height: 100vh;
            width: 100%;
            object-fit: cover;
        }

        @media (max-width: 768px) {
            #carousel-content {
                display: none;
            }

            .form-login {
                width: 100%;
            }

            .form {
                width: 50%;
            }
        }

        @media (max-width: 425px) {
            .form {
                width: 100%;
                padding-inline: 10%;
            }
        }
    </style>
</head>

<body>
    <div class="content-body">
        <div class="form-login">
            <div class="form">
                <h1 class="title mb-0">Iniciar sesión</h1>
                <p class="subtitle">Ingrese las credenciales asociadas con una cuenta.</p>
                <form id="form" novalidate class="needs-validation">
                    <div class="form-floating mb-2">
                        <input type="text" class="form-control" id="Username" name="Username" placeholder="Usuario..." required>
                        <label for="Username">Usuario...</label>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" id="txtPassword" name="password" placeholder="Contraseña" required>
                        <button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()">
                            <i class="bi bi-eye-slash" id="icono"></i>
                        </button>
                    </div>
                    <button type="button" onclick="login(event)" class="btn btn-dark btn-submit rounded">Acceder</button>
                </form>
                <div class="text-center my-4 alert alert-danger d-none" id="div-error">
                    <span id="span-error">Credenciales invalidas</span>
                </div>
            </div>
            <div class="text-center text-muted mt-4">
                Copyrights All Rights Reserved <br>Telat&copy; <?= date('Y') ?>
            </div>
        </div>
        <div id="carousel-content" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carousel-content" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carousel-content" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carousel-content" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="<?= base_url('assets/images/callcenter1.jpg'); ?>" class="wallpaper" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="<?= base_url('assets/images/callcenter2.jpg'); ?>" class="wallpaper" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="<?= base_url('assets/images/callcenter3.jpg'); ?>" class="wallpaper" alt="...">
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url(); ?>/resources/js/auth.js"></script>
    <script>
        function mostrarPassword() {
            var passwordField = document.getElementById('txtPassword');
            var passwordFieldType = passwordField.type;
            var icon = document.getElementById('icono');

            if (passwordFieldType === 'password') {
                passwordField.type = 'text';
                icon.classList.remove('bi-eye-slash');
                icon.classList.add('bi-eye');
            } else {
                passwordField.type = 'password';
                icon.classList.remove('bi-eye');
                icon.classList.add('bi-eye-slash');
            }
        }
    </script>
</body>

</html>
