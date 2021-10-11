(function ($) {
    $("#formLogin").on("submit", function () {
        if ($("#inputNIK").val() === "") {
            Swal.fire({
                icon: "warning",
                title: "Oops...",
                text: "NIK Wajib Diisi!",
            });
        } else if ($("#inputPassword").val() === "") {
            Swal.fire({
                icon: "warning",
                title: "Oops...",
                text: "Password Wajib Diisi!",
            });
        } else {
            $.ajax({
                url: "/login",
                type: "POST",
                dataType: "JSON",
                data: {
                    nik: $("#inputNIK").val(),
                    password: $("#inputPassword").val(),
                },
                success: function (response) {
                    Swal.fire({
                        icon: response.alertIcon,
                        title: response.alertTitle,
                        text: response.alertText,
                        showConfirmButton:
                            response.status == true ? false : true,
                        timer: response.status == true ? 1500 : 0,
                        willClose: () => {
                            if (response.status == true) {
                                window.location.href = "/home";
                            }
                        },
                    });
                },
            });
        }
        return false;
    });

    $("#btnLogout").on("click", function () {
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
                    url: "/logout",
                    type: "GET",
                    dataType: "JSON",
                    success: function (response) {
                        Swal.fire({
                            icon: "success",
                            title: "Sukses",
                            text: "Akun Anda berhasil keluar!",
                            showConfirmButton: false,
                            timer: 3000,
                            willClose: () => {
                                window.location.href = "/";
                            },
                        });
                    },
                });
            }
        });
        return false;
    });
})(jQuery);
