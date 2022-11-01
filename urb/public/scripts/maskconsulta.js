function is_cpf(c) {
  if ((c = c.replace(/[^\d]/g, "")).length != 11) return false;

  if (c == "00000000000") return false;

  var r;
  var s = 0;

  for (i = 1; i <= 9; i++) s = s + parseInt(c[i - 1]) * (11 - i);

  r = (s * 10) % 11;

  if (r == 10 || r == 11) r = 0;

  if (r != parseInt(c[9])) return false;

  s = 0;

  for (i = 1; i <= 10; i++) s = s + parseInt(c[i - 1]) * (12 - i);

  r = (s * 10) % 11;

  if (r == 10 || r == 11) r = 0;

  if (r != parseInt(c[10])) return false;

  return true;
}

function fMasc(objeto, mascara) {
  obj = objeto;
  masc = mascara;
  setTimeout("fMascEx()", 1);
}

function fMascEx() {
  obj.value = masc(obj.value);
}

function mCPF(cpf) {
  cpf = cpf.replace(/\D/g, "");
  cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2");
  cpf = cpf.replace(/(\d{3})(\d)/, "$1.$2");
  cpf = cpf.replace(/(\d{3})(\d{1,2})$/, "$1-$2");
  return cpf;
}

cpfCheck = function (el) {
  document.getElementById("cpfResponse").innerHTML = is_cpf(el.value)
    ? '<i class="fas fa-check" style="color:green;font-size:17px"></i>'
    : '<i class="fas fa-times" style="color:red;font-size:17px"></i>';
  if (el.value == "") document.getElementById("cpfResponse").innerHTML = "";
};
$(document).ready(function () {
  $("#sendformconulta").click(function () {
    var nome = $("#nome").val();
    var cpfs = $("#cpf").val();
    var nperms = $("#nperm").val();
    var radiotest = $("#radiotest").val();
    $.ajax({
      url: "../Remob/src/consultamask.php",
      data: {
        cpf: cpfs,
        nperm: nperms,
      },
      type: "get",
      success: function (result) {
        for (var i = 0; i < result.length; i++) {
          console.log(result[i]);
        }

        if (nome == "") {
          Swal.fire({
            icon: "warning",
            text: "Preencha com seu Nome!",
          });
          return;
        }
        if (cpfs == "") {
          Swal.fire({
            icon: "warning",
            text: "Preencha com seu CPF!",
          });
          return;
        }
        if (nperms == "") {
          Swal.fire({
            icon: "warning",
            text: "Preencha com o seu número de permissionário!",
          });
          return;
        }
        if (
          $("#radiotest").is(":checked") == false &&
          $("#radiotestn").is(":checked") == false
        ) {
          Swal.fire({
            icon: "warning",
            text: "Faça a sua votação!",
          });
          return;
        }
        if (result == "cpf") {
          Swal.fire({
            icon: "error",
            text: "Cpf já fez a votação!",
          });
          return;
        } else if (result == "nperm") {
          Swal.fire({
            icon: "error",
            text: "Número de permissionário já votou!",
          });
          return;
        } else {
          $("#consultataxiform").submit();
        }
      },
      error: function (XMLHttpRequest, textStatus, errorThrown) {
        alert(textStatus, XMLHttpRequest, errorThrown);
      },
    });

    //check empty password field
  });
}); /*/*  */
