<?= $this->extend('telat/layouts/template') ?>

<?= $this->section('title') ?>Direcciones<?= $this->endSection() ?>

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
        <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title">Generar Dirección</h5>
                <form id="form-address">
                    <div class="row mb-2">
                        <div class="col-12">
                            <label for="zip_code" class="form-label">Código Postal</label>
                            <input type="text" id="zip_code" name="zip_code" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-12">
                            <label for="colony" class="form-label">Colonia</label>
                            <input type="text" id="colony" name="colony" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-12">
                            <label for="delegation" class="form-label">Delegación</label>
                            <input type="text" id="delegation" name="delegation" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-12">
                            <label for="state" class="form-label">Estado</label>
                            <input type="text" id="state" name="state" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12 d-flex flex-row-reverse">
                            <button type="submit" class="btn btn-primary">Guardar Dirección</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>