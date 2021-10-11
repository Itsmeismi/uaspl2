<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perpustakaan</title>

    <link href="<?= BASEURL ?>css/styles.css" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{ url('img/favicon.png') }}">
    <link href="<?= BASEURL ?>css/custom.css" rel="stylesheet">
    <script data-search-pseudo-elements="" defer="" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous">
    </script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container-xl px-4">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <!-- Basic login form-->
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header justify-content-center">
                                    <h3 class="fw-light my-4">Login Petugas</h3>
                                </div>
                                <div class="card-body">
                                    <form id="formLogin">
                                        <div class="mb-3">
                                            <label class="small mb-1" for="inputUsername">Username</label>
                                            <input class="form-control" id="inputUsername" type="text" placeholder="Masukkan Username">
                                        </div>
                                        <div class="mb-3">
                                            <label class="small mb-1" for="inputPassword">Password</label>
                                            <input class="form-control" id="inputPassword" type="password" placeholder="Masukkan password">
                                        </div>
                                        <div class="mb-3">
                                            <div class="form-check d-none">
                                                <input class="form-check-input" id="rememberPasswordCheck" type="checkbox" value="">
                                                <label class="form-check-label" for="rememberPasswordCheck">Remember
                                                    password</label>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <a class="small d-none" href="auth-password-basic.html">Forgot Password?</a>
                                            <button type="submit" class="btn btn-primary">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="footer-admin mt-auto footer-dark">
                <div class="container-xl px-4">
                    <div class="row">
                        <div class="col-md-6 small">Copyright © Website Punya Aing <?= date('Y') ?></div>
                        <div class="col-md-6 text-md-end small">
                            <a href="#!">Privacy Policy</a>
                            ·
                            <a href="#!">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="<?= BASEURL ?>js/scripts.js"></script>
    <script>
        $(document).ready(function() {
            $("#formLogin").on("submit", function() {
                if ($("#inputUsername").val() === "") {
                    Swal.fire({
                        icon: "warning",
                        title: "Oops...",
                        text: "Username Wajib Diisi!",
                    });
                } else if ($("#inputPassword").val() === "") {
                    Swal.fire({
                        icon: "warning",
                        title: "Oops...",
                        text: "Password Wajib Diisi!",
                    });
                } else {
                    $.ajax({
                        url: "<?= BASEURL ?>LoginController/login",
                        type: "POST",
                        dataType: "JSON",
                        data: {
                            Username: $("#inputUsername").val(),
                            password: $("#inputPassword").val(),
                        },
                        success: function(response) {
                            Swal.fire({
                                icon: response.alertIcon,
                                title: response.alertTitle,
                                text: response.alertText,
                                showConfirmButton: response.status == true ? false : true,
                                timer: response.status == true ? 1500 : 0,
                                willClose: () => {
                                    if (response.status == true) {
                                        window.location.href = "<?= BASEURL ?>Home";
                                    }
                                },
                            });
                        },
                    });
                }
                return false;
            });
        })
    </script>
</body>

</html>