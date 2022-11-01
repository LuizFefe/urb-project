function validaemaildb(operador_email_analisa) {
    const operador_email = operador_email_analisa;
    $.ajax({
        url: './src/operador_analisa.php',
        type: 'POST',
        data: {
            "operador_email": operador_email
        },
        success: function (data) {
            data = $.parseJSON(data);
            if (data.operador_email) {
                document.getElementById("operador_login_email_msg").innerHTML="Email já cadastrado <br> <i>¡Correo electrónico ya registrado! </b>"
                // document.getElementById("operador_email").select();
                // document.getElementById('operador_email').value = "";
                // document.getElementById('operador_email_rep').value = "";
                loginform.operador_login_email.focus();

            } else {
                $("#operador_login_email_msg").html('');
            }
        }
    })
}

function validarLogin() {

    //   somente aceita se tiver id unico mesmo que esteja algum invisivel .none

    const operador_login_email = loginform.operador_login_email.value;
    const operador_login_senha = loginform.operador_login_senha.value;
    
    if (operador_login_email == "" || operador_login_email.indexOf('@') == -1 || operador_login_email.indexOf('.') == -1) {
        document.getElementById("operador_login_email_msg").innerHTML="Email incorreto <br><i>¡Mensagem em espanhol!</i>"
        loginform.operador_login_email.focus();
        return false;
    }
    document.getElementById("operador_login_email").innerHTML="";
    
    if (operador_login_senha == "" || operador_login_senha.length <= 5) {
        document.getElementById("operador_login_senha_msg").innerHTML="A senha deve conter no mínimio 6 caracteres! <br><i>¡Mensagem em espanhol!</i>"
        loginform.operador_login_senha.focus();
        return false;
    }
    document.getElementById("operador_estado_msg").innerHTML="";
    
    validaemaildb(operador_login_email);
};

// function validarLogin() {

//     //   somente aceita se tiver id unico mesmo que esteja algum invisivel .none

//     const operador_login_email = loginform.operador_login_email.value;
//     const operador_login_senha = loginform.operador_login_senha.value;

//     if (operador_login_email == "" || operador_login_email.indexOf('@') == -1 || operador_login_email.indexOf('.') == -1) {
//         document.getElementById("operador_login_email_msg").innerHTML="Email incorreto <br><i>¡Mensagem em espanhol!</i>"
//         loginform.operador_login_email.focus();
//         return false;
//     }
//     document.getElementById("operador_login_email").innerHTML="";

//     if (operador_login_senha == "" || operador_login_senha.length <= 5) {
//         document.getElementById("operador_login_senha_msg").innerHTML="A senha deve conter no mínimio 6 caracteres! <br><i>¡Mensagem em espanhol!</i>"
//         loginform.operador_login_senha.focus();
//         return false;
//     }
//     document.getElementById("operador_estado_msg").innerHTML="";
// };