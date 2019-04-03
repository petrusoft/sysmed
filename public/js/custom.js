$(document).ready(function () {
    $(".delete").on("submit", function (e) {
        e.preventDefault();
        swal({
            title: "Confirmacion",
            text: "Esta seguro de eliminar el registro?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((isConfirmed) => {
            if (isConfirmed) {
                e.currentTarget.submit();
            }
        });
    });

    $("div.alert-success").delay(3000).slideUp(300);
});
