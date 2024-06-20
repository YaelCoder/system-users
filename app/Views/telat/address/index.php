<?= $this->extend('telat/layouts/template') ?>

<?= $this->section('title') ?>Direcciones<?= $this->endSection() ?>

<?= $this->section('styles') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<?= $this->extend('telat/layouts/template') ?>

<?= $this->section('title') ?>Tipo usuarios<?= $this->endSection() ?>

<?= $this->section('styles') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="row">
    <div class="col-8">
        <table id="TableAddress" class="table table-primary table-striped responsive">
            <thead>
                <th></th>
            </thead>
            <tbody></tbody>
        </table>
    </div>
    <div class="col-4">
        <div class="card">
            <h5 class="card-title">Genera una direccion</h5>
            <form id="form-address">

            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->endSection() ?>