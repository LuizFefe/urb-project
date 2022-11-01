

    function loadmasks(){
    $("input.cpf").mask("999.999.999-99", {
        reverse: true
    });

    $("input.telefone").mask("(99) 99999-9999", {
        reverse: true
    });


    $("input.insc_imob").mask("46.01.028.0600", {
        reverse: true
    });

    $("input.id_requerimento").mask("0028.0600", {
        reverse: true
    });

    $(".area").mask("000000,00", {
        reverse: true
    });

    $("input.rg").mask("999999999000", {
        reverse: true
    });

    $("input.cnpj").mask("22.222.222/2222-22", {
        reverse: true
    });
    $("input.cep").mask("99999-999", {
        reverse: true
    });

    $("input.telefoneddi").mask("+99", {
        reverse: true
    });

    $("input.telefoneddd").mask("999", {
        reverse: true
    });
}
