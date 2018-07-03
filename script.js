var toggle  = document.getElementById("showMore");
var content = document.getElementById("209_hidden");

toggle.addEventListener("click", function() {
  content.style.display = (content.dataset.toggled ^= 1) ? "block" : "none";
});