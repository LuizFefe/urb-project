/* const toggleButton = document.getElementsByClassName("navbar-toggler");
const navBarLinks = document.getElementsByClassName("navbar-links");
toggleButton.addEventListener("click", () => {
  navBarLinks.classList.toggle("active");
}); */
$(".navbar-collapse").hide(0);
$(".navbar-toggler").click(function () {
  if ($(".top-bar-container-2").hasClass("positionmobile")) {
    $(".navbar-collapse").hide(0);
    $(".top-bar-container-2").removeClass("positionmobile");
    $(".navbar-collapse").removeClass("heightmobile");
  } else {
    $(".navbar-collapse").show(500);
    $(".top-bar-container-2").addClass("positionmobile");
    $(".navbar-collapse").addClass("heightmobile");
  }
});
