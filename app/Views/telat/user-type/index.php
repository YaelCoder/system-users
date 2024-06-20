<?= $this->extend('telat/layouts/template') ?>

<?= $this->section('title') ?>Tipo usuarios<?= $this->endSection() ?>

<?= $this->section('styles') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="row">
    <div class="col-8">
        <table id="TableUserType" class="table table-primary table-striped responsive">
            <thead>
                <th></th>
            </thead>
            <tbody></tbody>
        </table>
    </div>
    <div class="col-4">
        <div class="card">
            <h5 class="card-title">Genera un tipo de usuario</h5>
            <form id="form-type-user">

            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>