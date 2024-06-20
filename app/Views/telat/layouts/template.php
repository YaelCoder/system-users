<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Project users from Telat" />
    <meta name="author" content="YaelCoder (https://github.com/YaelCoder)" />
    <title> Telat - <?= $this->renderSection('title') ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/v/bs5/jq-3.7.0/jszip-3.10.1/dt-2.0.8/b-3.0.2/b-html5-3.0.2/r-3.0.2/datatables.min.css" rel="stylesheet">
</head>
<?= $this->renderSection('styles') ?>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary mb-5">
        <div class="container-fluid">
            <a class="navbar-brand" href="/dashboard">
                <img src="<?= base_url('assets/images/logo.png'); ?>" alt="Logo" width="100" class="d-inline-block align-text-top">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Catalogos
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/users-list">Listado de usuarios</a></li>
                            <li><a class="dropdown-item" href="/add-users">Agregar usuarios</a></li>
                            <li><a class="dropdown-item" href="/address">Agregar domicilios</a></li>
                            <li><a class="dropdown-item" href="/user-type">Agregar tipos de usuario</a></li>
                        </ul>
                    </li>
                </ul>
                <button class="btn btn-outline-primary" type="button" onclick="logout()">
                    Cerrar sesión
                </button>
            </div>
        </div>
    </nav>
    <div class="container">
        <!-- Render section content -->
        <?= $this->renderSection('content') ?>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/v/bs5/jq-3.7.0/jszip-3.10.1/dt-2.0.8/b-3.0.2/b-html5-3.0.2/r-3.0.2/datatables.min.js"></script>
    <script src="<?= base_url(); ?>/resources/js/requests.js"></script>
</body>

</html>