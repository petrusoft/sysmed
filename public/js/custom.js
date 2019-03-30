$(document).ready(function () {
    //$("div.alert-success").delay(3000).slideUp(300);

    $("#delete").on("submit", function (e) {
        e.preventDefault();
        swal({
            title: "Confirmacion",
            text: "Esta seguro de eliminar el registro?",
            icon: "warning",
            buttons: {
                cancel: "Cancelar",
                confirm: "Ok"
            },
            dangerMode: true,
        })
            .then((isConfirmed) => {
                if (isConfirmed) {
                    e.currentTarget.submit();
                }
            });
    });
});
