<?= $this->extend('telat/layouts/template') ?>

<?= $this->section('title') ?>Listado<?= $this->endSection() ?>

<?= $this->section('styles') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <table id="list" class="table table-primary table-striped responsive">
        <thead>
            <th></th>
        </thead>
        <tbody></tbody>
    </table>
<?= $this->endSection() ?>