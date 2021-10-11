<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perpustakaan</title>

    <link rel="icon" type="image/x-icon" href="<?= BASEURL ?>img/favicon.png">
    <link href="<?= BASEURL ?>css/custom.css" rel="stylesheet">
    <link href="<?= BASEURL ?>css/style.css" rel="stylesheet">
    <link href="<?= BASEURL ?>css/tables.css" rel="stylesheet" type="text/css">
    <script data-search-pseudo-elements="" defer="" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.28.0/feather.min.js" crossorigin="anonymous">
    </script>
</head>

<body class="nav-fixed">
    <!-- Navbar -->
    <?= $this->view('layout/navbar') ?>
    <!-- End of Navbar -->
    <div id="layoutSidenav">
        <!-- Sidebar -->
        <?= $this->view('layout/sidebar', $data) ?>
        <!-- End of Sidebar -->
        <div id="layoutSidenav_content">
            <main>
                <!-- Content -->
                <?= $this->view($data['content'], $data) ?>
                <!-- End of Content -->
            </main>

            <!-- Footer -->
            <?= $this->view('layout/footer') ?>
            <!-- End of Footer -->
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap4.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" type="text/javascript"></script>

    <script src="<?= BASEURL ?>js/datatables/datatables-simple-demo.js"></script>

    <script src="<?= BASEURL ?>js/scripts.js"></script>
    <script src="<?= BASEURL ?>js/function/auth.js"></script>
    <script>
        $(document).ready(function() {
            $("#btnLogout").on("click", function() {
                Swal.fire({
                    title: "Yakin untuk keluar?",
                    text: "Jika Anda keluar maka semua sesi akan berakhir!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, keluar!",
                    cancelButtonText: "Batal",
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "<?= BASEURL ?>LoginController/logout",
                            type: "GET",
                            dataType: "JSON",
                            success: function(response) {
                                Swal.fire({
                                    icon: response.alertIcon,
                                    title: response.alertTitle,
                                    text: response.alertText,
                                    showConfirmButton: false,
                                    timer: 3000,
                                    willClose: () => {
                                        window.location.href = "<?= BASEURL ?>";
                                    },
                                });
                            },
                        });
                    }
                });
                return false;
            });

            $("#btnSimpanBuku").on('click', function() {
                $.ajax({
                    type: "POST",
                    url: "<?= BASEURL ?>DataBukuController/simpanBuku",
                    dataType: "JSON",
                    data: {
                        book_code: $("#txtKodeBuku").val(),
                        title: $("#txtJudulBuku").val(),
                        author: $("#txtPenulisBuku").val(),
                        isbn_number: $("#txtNomorISBN").val(),
                        quantity: $("#txtStokBuku").val(),
                        date_in: '<?= date('Y-m-d') ?>'
                    },
                    success: function(response) {
                        $('#simpanBukuModal').modal('hide');
                        location.reload()
                    }
                });
                return false;
            });
        });
    </script>
</body>

</html>