$(document).ready(function () {
  $(".pt").show();
  $(".ingles").hide();
  $("#pt").on("click", function () {
    $("#pt").addClass("activelanguage");
    $("#en").removeClass("activelanguage");
    $(".ingles").hide();
    $(".pt").show();
  });
  $("#en").on("click", function () {
    $("#en").addClass("activelanguage");
    $("#pt").removeClass("activelanguage");
    $(".pt").hide();
    $(".ingles").show();
  });
});
