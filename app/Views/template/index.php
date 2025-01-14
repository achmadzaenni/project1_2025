<?= $this->extend('template/template') ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="container">
        <div class="d-flex justify-content-center align-items-center min-vh-100">
            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title text-center mb-3"><?= $title ?></h5>
                        <form method="post" action="<?= base_url('auth/registrasi') ?>">
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
                                <input type="password" class="form-control" placeholder="Masukan Password" name="password" id="password">
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-danger w-100" onclick="RegisAuth()">Registrasi</button>
                            </div>
                            <hr>
                            <p class="text-center">Sudah mempunyai akun ? <a class="text-decoration-none text-danger" href="<?= base_url('auth/login') ?>">Login</a></p>
                    </div>
                    </form>
            </div>~
            </div>
        </div>
    </div>
</div>
</div>

<script>

        // Sweet Alert
        const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
    });
    
    function RegisAuth() {
        var nama = $('$nama').val();
        var email = $('$email').val();
        var telp = $('#telp').val();
        var alamat = $('#alamat').val();
        var password = $('#password').val();

        $.ajax({
            url: <?= base_url('auth/registrasi') ?>,
            type: 'POST',
            data: {
                nama: nama,
                email: email,
                telp: telp,
                alamat: alamat,
                password: password,
            },
            success: function(response) {
                    console.log('Response:', response);
                    var res = JSON.parse(response);
                    if (res.sukses === '1') {
                        Toast.fire({
                            text: res.pesan,
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            window.location.href = res.link;
                        });
                    } else {
                        Toast.fire({
                            text: res.pesan,
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.log('Error:', error);
                    alert('Terjadi kesalahan: ' + error);
                }
        });

    }
</script>
<?= $this->endSection() ?>