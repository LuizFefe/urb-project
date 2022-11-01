$(document).ready(function () {
  first = 0;
  $("#checkgraph").click(function () {
    if ($("#canvaschart").is(":visible")) {
      $("#canvaschart").hide();
      $(".totalvotes").hide();
    } else {
      $("#canvaschart").show();
      $(".totalvotes").show();
    }
    var sim = "sim";
    var nao = "nao";
    $.ajax({
      url: "../Remob/src/requesttaxigraph.php",
      data: {
        sim: sim,
        nao: nao,
      },
      type: "get",
      success: function (result) {
        var obj = jQuery.parseJSON(result);
        colors = [];
        $("#char").remove();
        $("#canvaschart").append('<canvas id="char"></canvas>');
        const ctx = document.getElementById("char").getContext("2d");
        const myChart = new Chart(ctx, {
          type: "doughnut",
          data: {
            labels: ["Sim", "Não"],
            datasets: [
              {
                label: "Total de Votos" + obj.totalvotos,
                data: [obj.totalvotossim, obj.totalvotosnao],
                backgroundColor: ["rgb(0,128,0)", "rgb(255,0,0)"],
                hoverOffset: 4,
              },
            ],
          },
          options: {
            /* plugins: {
              legend: {
                display: false,
              },
            }, */
          },
        });
      },
      error: function (XMLHttpRequest, textStatus, errorThrown) {
        alert(textStatus, XMLHttpRequest, errorThrown);
      },
    });

    //check empty password field
  });
}); /*/*  */
