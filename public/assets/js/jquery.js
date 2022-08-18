
$(function () {
    $('#filtro').on('keyup', function () {
        var valor = $(this).val().toLowerCase();

        $('#bodyTable tr').filter(function(){
            $(this).toggle($(this).text().toLowerCase().indexOf(valor) > -1);
        });
    });
});