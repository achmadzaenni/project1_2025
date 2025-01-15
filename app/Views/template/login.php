<?= $this->extend('template/template') ?>
<?= $this->section('content') ?>
    <div class="container-fluid">
        <div class="container">
            <div class="d-flex justify-content-center align-items-center min-vh-100">
                <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title text-center mb-3"><?= $title ?></h5>
                        <form id="loginForm" action="<?= base_url('auth/authenticate') ?>" method="post">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-envelope-fill"></i></span>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Masukan Email" required>
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="bi bi-key-fill"></i></span>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Masukan password" required>
                                <i class="bi bi-eye-slash" id="togglePassword" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;"></i>
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-danger w-100" onclick="loginAuth()"><?= $title ?></button>
                            </div>
                            <hr>
                            <p class="text-center">Sudah mempunyai akun ? <a class="text-decoration-none text-danger" href="<?= base_url('/') ?>">Registrasi</a></p>
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    document.getElementById('loginForm').addEventListener('submit', function(event) {
        event.preventDefault();

        var formData = new FormData(this);

        $.ajax({
            url: '<?= base_url('auth/authenticate') ?>',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Login Berhasil',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(() => {
                        window.location.href = '<?= base_url('auth/page') ?>';
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: response.message,
                    });
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                console.error('Error:', thrownError);
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                });
            }
        });
    });

    document.getElementById('togglePassword').addEventListener('click', function () {
        const passwordField = document.getElementById('password');
        const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordField.setAttribute('type', type);
        this.classList.toggle('bi-eye');
        this.classList.toggle('bi-eye-slash');
    });
    </script>
<?= $this->endSection() ?>