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
    <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title">Generar un tipo de usuario</h5>
                <form id="form-usertype">
                    <div class="row mb-2">
                        <div class="col-12">
                            <label for="user_type" class="form-label">Tipo de usuario</label>
                            <input type="text" id="user_type" name="user_type" class="form-control" required>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12 d-flex flex-row-reverse">
                            <button type="submit" class="btn btn-primary">Guardar tipo de usuario</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>