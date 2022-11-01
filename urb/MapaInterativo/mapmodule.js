var pt = {
  language: "sp",
  i18n: {
    sp: {
      Survey: "Pesquisa",
      Excellent: "Excelente",
      Great: "Estupendo",
      Good: "Bueno",
      Average: "Mediano",
      Poor: "Ruim",
      Submit: "Enviar",
      complete: "Completo",
    },
  },
};
Formio.createForm(document.getElementById("forminsert"), {
  settings: {
    language: pt,
  },
  components: [
    {
      type: "textarea",
      label: "Conteúdo",
      tooltip: "Contéudo que sera exibido no Popup da Geometria",
      wysiwyg: true,
      validate: {
        required: true,
      },
      key: "content",
      input: true,
      inputType: "text",
    },
  ],
});
$(document).ready(function () {
  $("#hideonstart").hide();
  /* console.log($("#buttonlayered"));
  $("#buttonlayered").append('<i class="fa-solid fa-layer-group"></i>'); */
});
/* function testAjax(handleData) {
  $.ajax({
    url: "https://urbanlogics.com.br/urb/MapaInterativo/getlayers.php",
    success: function (data) {
      handleData(data);
    },
  });
} */

/* function Generatefeaturegroup(output) {
  featuregroups = [];
  output.forEach(function (layer) {
    featuregroups.push((layer.layer = L.featureGroup().addTo(map)));
  });
  return featuregroups;
} */
var osmUrl = "http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png",
  osmAttrib =
    '&copy; <a href="http://openstreetmap.org/copyright">OpenStreetMap</a> contributors',
  osm = L.tileLayer(osmUrl, {
    maxZoom: 18,
    attribution: osmAttrib,
  });
map = new L.Map("map", {
  center: new L.LatLng(-27.593372, -48.461188),
  zoom: 11,
});
new L.cascadeButtons(
  [
    {
      icon: "",
      ignoreActiveState: true,
      command: () => {
        Formio.createForm(document.getElementById("modaladdlayerforminsert"), {
          settings: {
            language: pt,
          },
          components: [
            {
              label: "Qual é o nome da camda que você quer adicionar ?",
              tooltip: "Nome da camada a ser adicionada",
              autofocus: true,
              tableView: true,
              key: "camadaadicionada",
              type: "textfield",
              input: true,
            },
            {
              type: "button",
              label: "Salvar",
              key: "submit",
              disableOnInvalid: true,
              input: true,
              tableView: false,
            },
          ],
        }).then(function (form) {
          form.on("submit", function (submission) {
            console.log(submission);
            Swal.fire({
              title: "Adicionar Camada?",
              showDenyButton: true,
              confirmButtonText: "Salvar",
              denyButtonText: `Cancelar`,
            }).then((result) => {
              if (result.isConfirmed) {
                $.ajax({
                  type: "post",
                  async: false,
                  url: "https://urbanlogics.com.br/urb/MapaInterativo/salvarcamada.php",
                  data: {
                    content: JSON.stringify(submission),
                  },
                  success: function (response) {
                    console.log(response);
                    Swal.fire({
                      title: "Camada Adicionada",
                      icon: "success",
                      confirmButtonText: "OK",
                    }).then((result) => {
                      if (result.isConfirmed) {
                        window.location.reload();
                      }
                    });
                  },
                  error: function (jqXHR, exception) {
                    var msg = "";
                    if (jqXHR.status === 0) {
                      msg = "Not connect.\n Verify Network.";
                    } else if (jqXHR.status == 404) {
                      msg = "Requested page not found. [404]";
                    } else if (jqXHR.status == 500) {
                      msg = "Internal Server Error [500].";
                    } else if (exception === "parsererror") {
                      msg = "Requested JSON parse failed.";
                    } else if (exception === "timeout") {
                      msg = "Time out error.";
                    } else if (exception === "abort") {
                      msg = "Ajax request aborted.";
                    } else {
                      msg = "Uncaught Error.\n" + jqXHR.responseText;
                    }
                    console.log(msg);
                  },
                });
              } else if (result.isDenied) {
                Swal.fire("Camada não foi salva", "", "info");
              }
            });
          });
        });
        $("#modaladdlayer").modal("show");
      },
    },
  ],
  { position: "bottomleft", direction: "horizontal" }
).addTo(map);
function testAjax() {
  var result = "";
  $.ajax({
    url: "https://urbanlogics.com.br/urb/MapaInterativo/getlayers.php",
    async: false,
    success: function (data) {
      result = data;
    },
  });
  return JSON.parse(result);
}
layernames = testAjax();
function getfeaturegroup() {
  var result = "";
  $.ajax({
    url: "https://urbanlogics.com.br/urb/MapaInterativo/getlayers.php",
    async: false,
    success: function (data) {
      result = data;
    },
  });
  output = JSON.parse(result);
  var obj = {};
  output.forEach(function (layer) {
    obj[layer.layer] = layer.layer = L.featureGroup().addTo(map);
    /* featuregroups.push((layer.layer = L.featureGroup().addTo(map))); */
  });
  return obj;
}
layers = getfeaturegroup();
formatedlayers = [];
for (var key in layers) {
  var obj = {};
  obj.label = key
  obj.layer = layers[key]
  formatedlayers.push(obj);
}
console.log(formatedlayers);
/* var layerControl = L.control
  .layers(
    {
      osm: osm.addTo(map),
      google: L.tileLayer(
        "http://www.google.cn/maps/vt?lyrs=s@189&gl=cn&x={x}&y={y}&z={z}",
        {
          attribution: "google",
        }
      ),
    },
    layers,
    {
      position: "topright",
      collapsed: true,
    }
  )
  .addTo(map); */
osm.addTo(map);
var camadasbase = {
  label: "Camadas Bases",
  children: [
    {
      label: "osm",
      layer: osm,
    },
    {
      label: "google",
      layer: L.tileLayer(
        "http://www.google.cn/maps/vt?lyrs=s@189&gl=cn&x={x}&y={y}&z={z}"
      ),
    },
  ],
};
var camadascriadas = {
  label: "Camadas Criadas",
  children: formatedlayers,
};
ctl = L.control.layers.tree(camadasbase, camadascriadas, {
  /*  namedToggle: true,
  collapseAll: "Collapse all",
  expandAll: "Expand all",
  collapsed: false, */
});
ctl.addTo(map)
map.addControl(
  new L.Control.Fullscreen({
    title: {
      false: "Ver em Tela Cheia",
      true: "Sair da Tela Cheia",
    },
  })
);
map.addControl(
  new L.Control.LinearMeasurement({
    unitSystem: "metric",
    color: "#4b5320",
    type: "line",
  })
);
$.getJSON("addcamada.php", function (data) {
  /* array = data[0] */

  if (data != "") {
    data.forEach(myFunction);
  }
});
var popupOptions = {
  minWidth: "200",
  maxWidth: "800",
  minHeight: "700",
  /* className: "wrapper", */ // classname for another popup
  autoPanPadding: (40, 40),
};

function myFunction(value, index, array) {
  const obj = JSON.parse(value);
  /*   var point = obj.geometry.coordinates;
  var radius = 5;
  var options = { steps: 10, units: "kilometers", properties: { foo: "bar" } };
  var circle = turf.circle(point, radius, options);
  L.geoJson(circle).addTo(map); */
  var geojson = L.geoJson(obj, {
    onEachFeature: function (feature, layer) {
      content =
        "<div class='product-info'><div class='product-text'><h1>" +
        feature.properties.titulo +
        "</h1><h2><strong>LAT/LNG:</strong><br>" +
        feature.geometry.coordinates +
        "</h2>" +
        feature.properties.descricao;
      /*  +
                         feature.properties.titulo +
                         "</h1><p>Descrição: " +
                         feature.properties.descricao +
                         "</p><br><img class='card-img-top' src='imageslayer/" +
                         feature.properties.imagem +
                         "' alt='Card image' style='width:100%'>" */
      var popup = L.popup().setContent(content);
      layer.bindPopup(popup, popupOptions);
      layer.on("pm:update", (e) => {
        $.ajax({
          type: "post",
          url: "editcamada.php",
          data: {
            feature: JSON.stringify(e.layer.toGeoJSON()),
          },
          success: function (response) {
            console.log(response);
            Swal.fire({
              icon: "success",
              title: "Camada Editada!",
            });
          },
          error: function (jqXHR, exception) {
            var msg = "";
            if (jqXHR.status === 0) {
              msg = "Not connect.\n Verify Network.";
            } else if (jqXHR.status == 404) {
              msg = "Requested page not found. [404]";
            } else if (jqXHR.status == 500) {
              msg = "Internal Server Error [500].";
            } else if (exception === "parsererror") {
              msg = "Requested JSON parse failed.";
            } else if (exception === "timeout") {
              msg = "Time out error.";
            } else if (exception === "abort") {
              msg = "Ajax request aborted.";
            } else {
              msg = "Uncaught Error.\n" + jqXHR.responseText;
            }
            console.log(msg);
          },
        });
      });
      layer.on("pm:dragstart", (e) => {
        e.layer.unbindPopup();
      });
      layer.on("pm:dragend", (e) => {
        e.layer.bindPopup(popup);
      });
    },
  });

  obj.properties.layer.forEach(function (layer) {
    geojson.addTo(layers[layer]);
  });
  geojson.on("click", function (evt) {
    /*  evt.layer.update(); */
    console.log(evt.layer);
  });
}
map.pm.addControls({
  position: "topleft",
});
const customTranslation = {
  tooltips: {
    placeMarker: "Clique para posicionar o marcador",
    firstVertex: "Clique para posicionar o primeiro vértice",
    continueLine: "Clique para continuar desenhando",
    finishLine: "Clique em qualquer marcador existente para finalizar",
    finishPoly: "Clique no primeiro ponto para fechar o polígono",
    finishRect: "Clique para finalizar",
    startCircle: "Clique para posicionar o centro do círculo",
    finishCircle: "Clique para fechar o círculo",
    placeCircleMarker: "Clique para posicionar o marcador circular",
  },
  actions: {
    finish: "Finalizar",
    cancel: "Cancelar",
    removeLastVertex: "Remover último vértice",
  },
  buttonTitles: {
    drawMarkerButton: "Desenhar um marcador",
    drawPolyButton: "Desenhar um polígono",
    drawLineButton: "Desenhar uma polilinha",
    drawCircleButton: "Desenhar um círculo",
    drawRectButton: "Desenhar um retângulo",
    editButton: "Editar camada(s)",
    dragButton: "Mover camada(s)",
    cutButton: "Recortar camada(s)",
    deleteButton: "Remover camada(s)",
    drawCircleMarkerButton: "Marcador de círculos de desenho",
    snappingButton: "Marcador arrastado para outras camadas e vértices",
    pinningButton: "Vértices compartilhados de pinos juntos",
  },
};
map.pm.setLang("customName", customTranslation, "en");

function makePopupContent() {
  return "<div id='formio'></div>";
}

function setPupup(layer) {
  var feature = JSON.stringify(layer.toGeoJSON());
  var coords = makePopupContent();
  /* L.control
    .window(map, {
      title: "Adicionar Geometria",
      modal: true,
    })
    .content(coords)

    .show(); */
  Formio.createForm(document.getElementById("forminsert"), {
    settings: {
      language: pt,
    },
    components: [
      {
        type: "textfield",
        label: "Título",
        tooltip: "Título da Geometria",
        placeholder: "Insira o Título.",
        validate: {
          required: true,
        },
        key: "title",
        input: true,
        inputType: "text",
      },
      {
        type: "select",
        label: "Camada",
        key: "layers",
        placeholder: "Selecione em qual camada que você deseja adicionar",
        dataSrc: "url",
        lazyLoad: false,
        data: {
          url: "https://urbanlogics.com.br/urb/MapaInterativo/getlayers.php",
        },
        validateOn: "blur",
        validate: {
          required: true,
          customMessage: "Selecione ao menos uma camada.",
        },
        valueProperty: "layer",
        template: "<span>{{ item.layer }}</span>",
        multiple: true,
      },
      {
        type: "textarea",
        label: "Conteúdo",
        tooltip: "Contéudo que sera exibido no Popup da Geometria",
        wysiwyg: true,
        validate: {
          required: true,
        },
        key: "content",
        input: true,
        inputType: "text",
      },
      {
        label: "Text Field",
        hidden: true,
        disabled: true,
        tableView: true,
        clearOnHide: false,
        key: "fname",
        type: "textfield",
        input: true,
        defaultValue: feature,
      },
      {
        label: "Salvar",
        showValidations: false,
        theme: "success",
        disableOnInvalid: true,
        tableView: false,
        key: "submit",
        type: "button",
        input: true,
        saveOnEnter: false,
        size: "lg",
      },
    ],
  }).then(function (form) {
    form.on("submit", function (submission) {
      console.log(submission);
      Swal.fire({
        title: "Salvar Geometria?",
        showDenyButton: true,
        confirmButtonText: "Salvar",
        denyButtonText: `Cancelar`,
      }).then((result) => {
        if (result.isConfirmed) {
          $.ajax({
            type: "post",
            async: false,
            url: "https://urbanlogics.com.br/urb/MapaInterativo/salvageometria.php",
            data: {
              content: JSON.stringify(submission),
            },
            success: function (response) {
              console.log(response);
              Swal.fire({
                title: "Geometria Adicionada",
                icon: "success",
                confirmButtonText: "OK",
              }).then((result) => {
                if (result.isConfirmed) {
                  window.location.reload();
                }
              });
            },
            error: function (jqXHR, exception) {
              var msg = "";
              if (jqXHR.status === 0) {
                msg = "Not connect.\n Verify Network.";
              } else if (jqXHR.status == 404) {
                msg = "Requested page not found. [404]";
              } else if (jqXHR.status == 500) {
                msg = "Internal Server Error [500].";
              } else if (exception === "parsererror") {
                msg = "Requested JSON parse failed.";
              } else if (exception === "timeout") {
                msg = "Time out error.";
              } else if (exception === "abort") {
                msg = "Ajax request aborted.";
              } else {
                msg = "Uncaught Error.\n" + jqXHR.responseText;
              }
              console.log(msg);
            },
          });
        } else if (result.isDenied) {
          Swal.fire("Geometria não foi salva", "", "info");
        }
      });
    });
  });
  $("#myModal").modal("show");
  $("#hideonstart").show();
  /* const target = document.querySelector('textarea.rich');
        target.addEventListener('paste', (event) => {
          const clipboard_data = (event.clipboardData || window.clipboardData);
          const text_paste_content = clipboard_data.getData('text/plain');
          const html_paste_content = clipboard_data.getData('text/html');
          console.log(text_paste_content)
          console.log(html_paste_content)
        }); */
  /* layer.bindPopup(coords); */
}
map.on("pm:create", function (e) {
  var layer = e.layer;
  setPupup(layer);
  layer.on("pm:update", function (e) {
    setPupup(e.layer);
  });
});
map.on("popupopen", function (e) {
  var px = map.project(e.target._popup._latlng); // find the pixel location on the map where the popup anchor is
  px.y -= e.target._popup._container.clientHeight / 2; // find the height of the popup container, divide by 2, subtract from the Y axis of marker location
  map.panTo(map.unproject(px), {
    animate: true,
  });
});
