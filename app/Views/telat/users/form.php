<?= $this->extend('telat/layouts/template') ?>

<?= $this->section('title') ?>Formulario usuarios<?= $this->endSection() ?>

<?= $this->section('styles') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-header">
        Agregar usuarios
    </div>
    <div class="card-body">
        <p class="card-text">Introduce los datos personales del usuario</p>
        <form id="addUser">
            <div class="row mb-2">
                <div class="col-6">
                    <label for="firstname" class="form-label">Nombre</label>
                    <input type="text" name="firstname" id="firstname" class="form-control" required>
                </div>
                <div class="col-6">
                    <label for="lastname" class="form-label">Apellido</label>
                    <input type="text" name="lastname" id="lastname" class="form-control" required>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-6">
                    <label for="gender" class="form-label">Género</label>
                    <select name="gender" id="gender" class="form-select" required>
                        <option value="" selected disabled>Seleccione un genero</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Femenido">Femenino</option>
                        <option value="Indefinido">Indefinido</option>
                    </select>
                </div>
                <div class="col-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-6">
                    <label for="phone" class="form-label">Telefono</label>
                    <input type="text" name="phone" id="phone" class="form-control" placeholder="(55) 1655 8229" required>
                </div>
                <div class="col-6">
                    <label for="status" class="form-label">Estatus</label>
                    <select name="status" id="status" class="form-select" required>
                        <option value="" selected disabled>Seleccione un estatus</option>
                        <option value="activo">Activo</option>
                        <option value="inactivo">Inactivo</option>
                    </select>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-6">
                    <label for="id_address" class="form-label">Dirección</label>
                    <select name="id_address" id="id_address" class="form-select" required>
                        <option value="" selected disabled>Seleccione una dirección</option>
                    </select>
                </div>
                <div class="col-6">
                    <label for="id_user_type" class="form-label">Tipo de usuario</label>
                    <select name="id_user_type" id="id_user_type" class="form-select" required>
                        <option value="" selected disabled>Seleccione un tipo de usuario</option>
                    </select>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col-6">
                    <label for="username" class="form-label">Nombre de usuario</label>
                    <input type="text" name="username" id="username" class="form-control" required>
                </div>
                <div class="col-6">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12 d-flex flex-row-reverse">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>