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
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-fill"></i></span>
                                <input type="text" class="form-control" placeholder="Masukan Nama" name="nama" id="nama">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-envelope-fill"></i></span>
                                <input type="text" class="form-control" placeholder="Masukan Email" name="email" id="email">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-telephone-fill"></i></span>
                                <input type="text" class="form-control" placeholder="Masukan Telepon" name="telp" id="telp">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-geo-alt-fill"></i></span>
                                <input type="text" class="form-control" placeholder="Masukan Alamat" name="alamat" id="alamat">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-eye-fill"></i></span>
                                <input type="text" class="form-control" placeholder="Masukan Password" name="password" id="password">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-danger w-100" onclick="Re">Registrasi</button>
                            </div>
                            <hr>
                            <p class="text-center">Sudah mempunyai akun ? <a class="text-decoration-none text-danger" href="<?= base_url('login') ?>">Login</a></p>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function RegisAuth() {
            var nama = $('$nama').val();
            var email = $('$email').val();
            var telp = $('#telp').val();
            var alamat = $('#alamat').val();
            var password = $('#password').val();
            $.ajax({
                type: "POST",
                url: <?= base_url('regis/auth') ?>,
                data: {
                    nama: nama,
                    email: email,
                    telp: telp,
                    alamat: alamat,
                    password: password
                },
                success: function(response){
                    console.log(response);
                    if(response == "sukses"){
                        alert("Registrasi Berhasil");
                        window.location.href = <?= base_url('login') ?>;
                    }else{
                        alert("Registrasi Gagal");
                    }
                }
            })
        }
    </script>
<?= $this->endSection() ?>