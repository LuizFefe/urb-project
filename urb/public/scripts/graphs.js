$(document).ready(function () {
  $("#demandahorario").click(function () {
    $("#tipeselect").val("demandahorario").change();
    var tipos = $("#tipeselect").val();
    if (tipos == "demandatotal" || tipos == "usosportipo") {
      $(".monthselect").show();
      $(".dateselect").hide();
    } else if (tipos == "demandahorario") {
      var meses = $("#dateselect").val();
      $(".monthselect").hide();
      $(".dateselect").show();
    }

    $(".graphselection").change(function () {
      var tipos = $("#tipeselect").val();
      var meses = $("#monthselect").val();
      if (tipos == "demandatotal" || tipos == "usosportipo") {
        $(".monthselect").show();
        $(".dateselect").hide();
      } else if (tipos == "demandahorario") {
        var meses = $("#dateselect").val();
        $(".monthselect").hide();
        $(".dateselect").show();
      }
      console.log(tipos, meses);
      $.ajax({
        url: "../../src/request.php",
        data: {
          tipo: tipos,
          mes: meses,
        },
        type: "get",
        success: function (result) {
          var obj = jQuery.parseJSON(result);
          if (obj.tipo == "usosportipo") {
            if (result != "") {
              colors = [];
              $("#char").remove();
              $("#canvaschart").append('<canvas id="char"></canvas>');
              console.log(obj.valores, obj.total);
              for (let i = 0; i < obj.total.length; i++) {
                colors.push(
                  "#" + Math.floor(Math.random() * 6777215).toString(16)
                );
              }
              const ctx = document.getElementById("char").getContext("2d");
              const myChart = new Chart(ctx, {
                type: "bar",
                data: {
                  labels: obj.valores,
                  datasets: [
                    {
                      label: "Numero de Giros por Tipo",
                      data: obj.total,
                      backgroundColor: [
                        "#001b33",
                        "#001b33",
                        "#001b33",
                        "#001b33",
                        "#001b33",
                        "#001b33",
                        "#001b33",
                        "#001b33",
                        "#001b33",
                        "#001b33",
                      ],
                    },
                  ],
                },
                options: {
                  plugins: {
                    legend: {
                      display: false,
                    },
                  },
                },
              });
            }
          } else if (obj.tipo == "demandatotal") {
            if (result != "") {
              colors = [];
              $("#char").remove();
              $("#canvaschart").append('<canvas id="char"></canvas>');
              console.log(obj.valores, obj.total);
              for (let i = 0; i < obj.total.length; i++) {
                colors.push(
                  "#" + Math.floor(Math.random() * 16777215).toString(16)
                );
              }
              const ctx = document.getElementById("char").getContext("2d");
              const myChart = new Chart(ctx, {
                type: "line",
                data: {
                  labels: obj.valores,
                  datasets: [
                    {
                      label: "Demanda do Dia",
                      data: obj.total,
                      fill: false,
                      borderColor: "rgb(75, 192, 192)",
                      tension: 0.1,
                    },
                  ],
                },
                options: {
                  plugins: {
                    legend: {
                      display: false,
                    },
                  },
                },
              });
            }
          } else if (obj.tipo == "demandahorario") {
            if (result != "") {
              colors = [];
              $("#char").remove();
              $("#canvaschart").append('<canvas id="char"></canvas>');
              console.log(obj.valores, obj.total);
              for (let i = 0; i < obj.total.length; i++) {
                colors.push(
                  "#" + Math.floor(Math.random() * 16777215).toString(16)
                );
              }
              const ctx = document.getElementById("char").getContext("2d");
              const myChart = new Chart(ctx, {
                type: "line",
                data: {
                  labels: obj.valores,
                  datasets: [
                    {
                      label: "Demanda do Dia",
                      data: obj.total,
                      fill: false,
                      borderColor: "rgb(75, 192, 192)",
                      tension: 0.1,
                    },
                  ],
                },
                options: {
                  plugins: {
                    legend: {
                      display: false,
                    },
                  },
                },
              });
            }
          }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
          alert("Data Inválida");
        },
      });

      //check empty password field
    });
  });
  $("#demandatotal").click(function () {
    $("#tipeselect").val("demandatotal").change();
    var tipos = $("#tipeselect").val();
    if (tipos == "demandatotal" || tipos == "usosportipo") {
      $(".monthselect").show();
      $(".dateselect").hide();
    } else if (tipos == "demandahorario") {
      var meses = $("#dateselect").val();
      $(".monthselect").hide();
      $(".dateselect").show();
    }

    $(".graphselection").change(function () {
      var tipos = $("#tipeselect").val();
      var meses = $("#monthselect").val();
      if (tipos == "demandatotal" || tipos == "usosportipo") {
        $(".monthselect").show();
        $(".dateselect").hide();
      } else if (tipos == "demandahorario") {
        var meses = $("#dateselect").val();
        $(".monthselect").hide();
        $(".dateselect").show();
      }
      console.log(tipos, meses);
      $.ajax({
        url: "../../src/request.php",
        data: {
          tipo: tipos,
          mes: meses,
        },
        type: "get",
        success: function (result) {
          var obj = jQuery.parseJSON(result);
          if (obj.tipo == "usosportipo") {
            if (result != "") {
              colors = [];
              $("#char").remove();
              $("#canvaschart").append('<canvas id="char"></canvas>');
              console.log(obj.valores, obj.total);
              for (let i = 0; i < obj.total.length; i++) {
                colors.push(
                  "#" + Math.floor(Math.random() * 6777215).toString(16)
                );
              }
              const ctx = document.getElementById("char").getContext("2d");
              const myChart = new Chart(ctx, {
                type: "bar",
                data: {
                  labels: obj.valores,
                  datasets: [
                    {
                      label: "Numero de Giros por Tipo",
                      data: obj.total,
                      backgroundColor: [
                        "#001b33",
                        "#001b33",
                        "#001b33",
                        "#001b33",
                        "#001b33",
                        "#001b33",
                        "#001b33",
                        "#001b33",
                        "#001b33",
                        "#001b33",
                      ],
                    },
                  ],
                },
                options: {
                  plugins: {
                    legend: {
                      display: false,
                    },
                  },
                },
              });
            }
          } else if (obj.tipo == "demandatotal") {
            if (result != "") {
              colors = [];
              $("#char").remove();
              $("#canvaschart").append('<canvas id="char"></canvas>');
              console.log(obj.valores, obj.total);
              for (let i = 0; i < obj.total.length; i++) {
                colors.push(
                  "#" + Math.floor(Math.random() * 16777215).toString(16)
                );
              }
              const ctx = document.getElementById("char").getContext("2d");
              const myChart = new Chart(ctx, {
                type: "line",
                data: {
                  labels: obj.valores,
                  datasets: [
                    {
                      label: "Demanda do Dia",
                      data: obj.total,
                      fill: false,
                      borderColor: "rgb(75, 192, 192)",
                      tension: 0.1,
                    },
                  ],
                },
                options: {
                  plugins: {
                    legend: {
                      display: false,
                    },
                  },
                },
              });
            }
          } else if (obj.tipo == "demandahorario") {
            if (result != "") {
              colors = [];
              $("#char").remove();
              $("#canvaschart").append('<canvas id="char"></canvas>');
              console.log(obj.valores, obj.total);
              for (let i = 0; i < obj.total.length; i++) {
                colors.push(
                  "#" + Math.floor(Math.random() * 16777215).toString(16)
                );
              }
              const ctx = document.getElementById("char").getContext("2d");
              const myChart = new Chart(ctx, {
                type: "line",
                data: {
                  labels: obj.valores,
                  datasets: [
                    {
                      label: "Demanda do Dia",
                      data: obj.total,
                      fill: false,
                      borderColor: "rgb(75, 192, 192)",
                      tension: 0.1,
                    },
                  ],
                },
                options: {
                  plugins: {
                    legend: {
                      display: false,
                    },
                  },
                },
              });
            }
          }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
          alert("Data Inválida");
        },
      });

      //check empty password field
    });
  });
  $("#usosportipo").click(function () {
    $("#tipeselect").val("usosportipo").change();
    var tipos = $("#tipeselect").val();
    if (tipos == "demandatotal" || tipos == "usosportipo") {
      $(".monthselect").show();
      $(".dateselect").hide();
    } else if (tipos == "demandahorario") {
      var meses = $("#dateselect").val();
      $(".monthselect").hide();
      $(".dateselect").show();
    }
    $(".graphselection").change(function () {
      var tipos = $("#tipeselect").val();
      var meses = $("#monthselect").val();
      if (tipos == "demandatotal" || tipos == "usosportipo") {
        $(".monthselect").show();
        $(".dateselect").hide();
      } else if (tipos == "demandahorario") {
        var meses = $("#dateselect").val();
        $(".monthselect").hide();
        $(".dateselect").show();
      }
      console.log(tipos, meses);
      $.ajax({
        url: "../../src/request.php",
        data: {
          tipo: tipos,
          mes: meses,
        },
        type: "get",
        success: function (result) {
          var obj = jQuery.parseJSON(result);
          if (obj.tipo == "usosportipo") {
            if (result != "") {
              colors = [];
              $("#char").remove();
              $("#canvaschart").append('<canvas id="char"></canvas>');
              console.log(obj.valores, obj.total);
              for (let i = 0; i < obj.total.length; i++) {
                colors.push(
                  "#" + Math.floor(Math.random() * 6777215).toString(16)
                );
              }
              const ctx = document.getElementById("char").getContext("2d");
              const myChart = new Chart(ctx, {
                type: "bar",
                data: {
                  labels: obj.valores,
                  datasets: [
                    {
                      label: "Numero de Giros por Tipo",
                      data: obj.total,
                      backgroundColor: [
                        "#001b33",
                        "#001b33",
                        "#001b33",
                        "#001b33",
                        "#001b33",
                        "#001b33",
                        "#001b33",
                        "#001b33",
                        "#001b33",
                        "#001b33",
                      ],
                    },
                  ],
                },
                options: {
                  plugins: {
                    legend: {
                      display: false,
                    },
                  },
                },
              });
            }
          } else if (obj.tipo == "demandatotal") {
            if (result != "") {
              colors = [];
              $("#char").remove();
              $("#canvaschart").append('<canvas id="char"></canvas>');
              console.log(obj.valores, obj.total);
              for (let i = 0; i < obj.total.length; i++) {
                colors.push(
                  "#" + Math.floor(Math.random() * 16777215).toString(16)
                );
              }
              const ctx = document.getElementById("char").getContext("2d");
              const myChart = new Chart(ctx, {
                type: "line",
                data: {
                  labels: obj.valores,
                  datasets: [
                    {
                      label: "Demanda do Dia",
                      data: obj.total,
                      fill: false,
                      borderColor: "rgb(75, 192, 192)",
                      tension: 0.1,
                    },
                  ],
                },
                options: {
                  plugins: {
                    legend: {
                      display: false,
                    },
                  },
                },
              });
            }
          } else if (obj.tipo == "demandahorario") {
            if (result != "") {
              colors = [];
              $("#char").remove();
              $("#canvaschart").append('<canvas id="char"></canvas>');
              console.log(obj.valores, obj.total);
              for (let i = 0; i < obj.total.length; i++) {
                colors.push(
                  "#" + Math.floor(Math.random() * 16777215).toString(16)
                );
              }
              const ctx = document.getElementById("char").getContext("2d");
              const myChart = new Chart(ctx, {
                type: "line",
                data: {
                  labels: obj.valores,
                  datasets: [
                    {
                      label: "Demanda do Dia",
                      data: obj.total,
                      fill: false,
                      borderColor: "rgb(75, 192, 192)",
                      tension: 0.1,
                    },
                  ],
                },
                options: {
                  plugins: {
                    legend: {
                      display: false,
                    },
                  },
                },
              });
            }
          }
        },
        error: function (XMLHttpRequest, textStatus, errorThrown) {
          alert("Data Inválida");
        },
      });

      //check empty password field
    });
  });
}); /*/*  */
