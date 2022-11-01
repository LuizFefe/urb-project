
function validarViagem() {
   
    /** Validação fieldset de "Informações Sobre a Origem da Viagem"*/
    const data_atual= cadastrar_viagem.data_atual.value;
    const data_chegada = cadastrar_viagem.data_chegada.value;
    const data_saida = cadastrar_viagem.data_saida.value;
    const cidade_origem = cadastrar_viagem.cidade_origem.value;
    const cidade_estado_origem = cadastrar_viagem.estado_origem.value;
    const pais_origem = cadastrar_viagem.pais_origem.value;

    const date1_atual = new Date(data_atual);
    const date2_chegada = new Date(data_chegada + " 00:00:00");
    const date3_saida = new Date(data_saida + " 00:00:00");


    if (pais_origem === "") {
        document.getElementById("pais_origem_msg").innerHTML = "<b>É obrigatório selecionar o pais!  <br> <i >¡Es obligatorio completar el nombre del operador turístico!</i>  </b>";
        cadastrar_viagem.pais_origem.focus();
        return false;
    };
    document.getElementById("pais_origem_msg").innerHTML = "";

    if (cidade_estado_origem === "") {
        document.getElementById("estado_origem_msg").innerHTML = "Informar o <strong>estado</strong> de origem"
        cadastrar_viagem.estado_origem.focus();
        return false;
    };
    document.getElementById("estado_origem_msg").innerHTML = "";


    if (cidade_origem === "") {
        document.getElementById("cidade_origem_msg").innerHTML = "Informar o <strong>cidade</strong> de origem"
        cadastrar_viagem.cidade_origem.focus();
        return false;
    }else if ( cidade_origem.toUpperCase() === "FLORIANÓPOLIS" || 
               cidade_origem.toUpperCase() === "FLORIANOPOLIS" || 
               cidade_origem.toUpperCase() === "FPOLIS" || 
               cidade_origem.toUpperCase() === "FLORIPA" ) {
        document.getElementById("cidade_origem_msg").innerHTML = "A cidade de origem na pode ser <strong>Florianópolis</strong>"
        cadastrar_viagem.cidade_origem.focus();
        return false;
    };
    document.getElementById("cidade_origem_msg").innerHTML = "";


    if (data_chegada === "") {
        document.getElementById("data_chegada_msg").innerHTML = "Informar a <strong>data de chegada</strong> em Florianópolis"
        cadastrar_viagem.data_chegada.focus();
        return false;
    };
    document.getElementById("data_chegada_msg").innerHTML = "";

    if (date1_atual.getTime() > date2_chegada.getTime()) {
        document.getElementById("data_chegada_msg").innerHTML = "Data invalida. Não é possível data anterior a hoje"
        cadastrar_viagem.data_chegada.focus();
        return false;
    };
    document.getElementById("data_chegada_msg").innerHTML = "";


    if (data_saida === "") {
        document.getElementById("data_saida_msg").innerHTML = "Informar a <strong>data de saída</strong> de Florianópolis"
        //show('informacoes_viagem_show', 'button_Mudarestado_informacoes_viagem');
        cadastrar_viagem.data_saida.focus();
        return false;
    };
    document.getElementById("data_saida_msg").innerHTML = "";


    if (date3_saida.getTime() < date2_chegada.getTime()) {
        document.getElementById("data_saida_msg").innerHTML = "Data invalida. A data de retorno não pode ser anterior a chegada"
        cadastrar_viagem.data_saida.focus();
        return false;
    };
    document.getElementById("data_saida_msg").innerHTML = "";

    /** Validação fieldset de "Cadastro do Veículo"*/

    const placa_veiculo = cadastrar_viagem.placa_veiculo.value;
    const tipo_veiculo = cadastrar_viagem.tipo_veiculo.value;

    if (tipo_veiculo === "") {
        document.getElementById("tipo_veiculo_msg").innerHTML = "Informe o <strong>tipo</strong> do veículo"
        cadastrar_viagem.tipo_veiculo.focus();
        return false;
    };
    document.getElementById("tipo_veiculo_msg").innerHTML = "";

    if (placa_veiculo === "") {
        document.getElementById("placa_veiculo_msg").innerHTML = "Informe a <strong>placa</strong> do veículo"
        cadastrar_viagem.placa_veiculo.focus();
        return false;
    }
    document.getElementById("placa_veiculo_msg").innerHTML = "";

    const nomePassageiro = cadastrar_viagem.passageiros_nome.value;
    const openModalPassageiros = document.querySelector(".btn-open");
    if (nomePassageiro === ""){
        openModalPassageiros.click();
    }

    /** Validação fieldset de "Cadastro do Motoristas"*/

    // const motoristas_nome = cadastrar_viagem.motoristas_nome.value;
    // const motoristas_telefone_ddd = cadastrar_viagem.motoristas_telefone_ddd.value;
    // const motoristas_documento_habilitacao = cadastrar_viagem.motoristas_documento_habilitacao.value;

    // if (motoristas_nome === "") {
    //     document.getElementById("motoristas_nome_msg").innerHTML = "Informe o nome do motorista"
    //     cadastrar_viagem.motoristas_nome.focus();
    //     return false;
    // }
    // document.getElementById("motoristas_nome_msg").innerHTML = "";
    
    // if (motoristas_telefone_ddd === "") {
    //     document.getElementById("motoristas_telefone_ddd_msg").innerHTML = "Informe o telefone"
    //     cadastrar_viagem.motoristas_telefone_ddd.focus();
    //     return false;
    // }
    // document.getElementById("motoristas_telefone_ddd_msg").innerHTML = "";

    // if (motoristas_documento_habilitacao === "") {
    //     document.getElementById("motoristas_documento_habilitacao_msg").innerHTML = "Informe o doc. de habilitação"
    //     cadastrar_viagem.motoristas_documento_habilitacao.focus();
    //     return false;
    // }
    // document.getElementById("motoristas_documento_habilitacao_msg").innerHTML = "";

    /** Validação fieldset de "Cadastro do Rotas"*/

    // const data_rota_1 = cadastrar_viagem.data_rota_1.value;
    // const rota_endereco_partida = cadastrar_viagem.rota_endereco_partida.value;
    // const rota_endereco_chegada = cadastrar_viagem.rota_endereco_chegada.value;

    // if (data_rota_1 === "") {
    //     document.getElementById("data_rota_1_msg").innerHTML = "Informe a data"
    //     cadastrar_viagem.motoristas_nome.focus();
    //     return false;
    // }
    // document.getElementById("data_rota_1_msg").innerHTML = "";

    // if (data_rota_1 < date2_chegada.getTime())) {
    //     document.getElementById("data_rota_1_msg").innerHTML = "A data deve ser maior que a data de chagada em Florianópolis"
    //     cadastrar_viagem.motoristas_nome.focus();
    //     return false;
    // }
    // document.getElementById("data_rota_1_msg").innerHTML = "";
    
    // if (rota_endereco_partida === "") {
    //     document.getElementById("rota_endereco_partida_msg").innerHTML = "Informe o bairro de partida"
    //     cadastrar_viagem.motoristas_telefone_ddd.focus();
    //     return false;
    // }
    // document.getElementById("rota_endereco_partida_msg").innerHTML = "";

    // if (rota_endereco_chegada === "") {
    //     document.getElementById("rota_endereco_chegada_msg").innerHTML = "Informe o bairro de chegada"
    //     cadastrar_viagem.motoristas_documento_habilitacao.focus();
    //     return false;
    // }
    // document.getElementById("rota_endereco_chegada_msg").innerHTML = "";



};

    



///*

 function validarRotas(rv) {
    let rv2 = true; // <==== Default return value

    $('.verificar_rotas').each(function (rv2) {
        if (this.value === '') {
            $(this).css('border', '1px solid red');
            $("#msg-error-COMPENSACAO").html('<div class="alert alert-danger" role="alert">Informe a <b>descrição</b> da compensação!</div>');
            $('#id_compensacao_descricao_01').focus();

        //   $("#msg-error-cadastro_rotas").html('<div class="alert alert-danger" role="alert">Preencher todos os campos</div>');
    //     show('cadastro_rotas_show', 'button_Mudarestado_cadastro_rotas');
            this.focus();
            return rv2 = false; // <
        };
        if (this.value != '') {
            $(this).css('border', '1px solid');
    //      $("#msg-error-cadastro_rotas").html('<div class="alert alert-danger" role="alert">Ok!</div>');
            return rv2 = true; // <
        };

        if (!rv2) {
            return false
        }
    })
}

//*/
