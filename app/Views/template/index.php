<?= $this->extend('template/template') ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="container">
        <div class="d-flex justify-content-center align-items-center min-vh-100">
            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title text-center mb-3"><?= $title ?></h5>
                        <form id="regisForm">
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
                                <input type="text" class="form-control" placeholder="Masukan Telepon" name="phone" id="phone">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-geo-alt-fill"></i></span>
                                <input type="text" class="form-control" placeholder="Masukan Alamat" name="alamat" id="alamat">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-key-fill"></i></span>
                                <input type="password" class="form-control" placeholder="Masukan Password" name="password" id="password">
                                <i class="bi bi-eye-slash" id="togglePassword" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;"></i>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-danger w-100"><?= $title ?></button>
                            </div>
                        </form>
                        <hr>
                        <p class="text-center">Sudah mempunyai akun ? <a class="text-decoration-none text-danger" href="<?= base_url('auth/login') ?>">Login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    $(document).ready(function() {
        $('#regisForm').on('submit', RegisAuth);
    });

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

    function RegisAuth(event) {
        event.preventDefault();

        var nama = $('#nama').val();
        var email = $('#email').val();
        var phone = $('#phone').val();
        var alamat = $('#alamat').val();
        var password = $('#password').val();

        $.ajax({
            url: '<?= base_url('auth/registrasi') ?>',
            type: 'POST',
            data: {
                nama: nama,
                email: email,
                phone: phone,
                alamat: alamat,
                password: password,
            },
            success: function(response) {
                if (response.status === 'success') {
                    Toast.fire({
                        icon: "success",
                        title: response.message
                    }).then((result) => {
                        window.location.href = response.redirect;
                    });
                } else {
                    Toast.fire({
                        icon: "error",
                        title: response.message
                    });
                }
            },
            error: function(xhr, status, error) {
                console.log('Error:', error);
                alert('Terjadi kesalahan: ' + error);
            }
        });
    }

    document.getElementById('togglePassword').addEventListener('click', function() {
        const passwordField = document.getElementById('password');
        const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordField.setAttribute('type', type);
        this.classList.toggle('bi-eye');
        this.classList.toggle('bi-eye-slash');
    });
</script>
<?= $this->endSection() ?>