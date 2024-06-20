<?= $this->extend('telat/layouts/template') ?>

<?= $this->section('title') ?>Dashboard<?= $this->endSection() ?>

<?= $this->section('styles') ?>
<style>
    i {
        font-size: 50px;
        color: gray;
    }
</style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-sm-6 mb-3">
        <div class="card text-center">
            <h5 class="card-header">Listado de usuarios</h5>
            <div class="card-body">
                <i class="bi bi-person-lines-fill"></i>
                <p class="card-text">Visualiza toda la lista de usuarios</p>
                <a href="/users-list" class="btn btn-primary">Ver listado</a>
            </div>
        </div>
    </div>
    <div class="col-sm-6 mb-3">
        <div class="card text-center">
            <h5 class="card-header">Agregar usuarios</h5>
            <div class="card-body">
                <i class="bi bi-person-fill-add"></i>
                <p class="card-text">Agrega un nuevo usuario</p>
                <a href="/add-users" class="btn btn-primary">Agregar</a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>