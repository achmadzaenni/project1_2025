<?= $this->extend('template/template') ?>
<?= $this->section('content') ?>
    <div class="container-fluid">
        <div class="container">
            <div class="d-flex justify-content-center align-items-center min-vh-100">
                <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title text-center mb-3"><?= $title ?></h5>
                        <form action="">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-envelope-fill"></i></span>
                                <input type="text" class="form-control" placeholder="Masukan Email">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-key-fill"></i></span>
                                <input type="password" class="form-control" placeholder="Masukan password">
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-danger w-100"><?= $title ?></button>
                            </div>
                            <hr>
                            <p class="text-center">Sudah mempunyai akun ? <a class="text-decoration-none text-danger" href="<?= base_url('auth/regis') ?>">registrasi</a></p>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>