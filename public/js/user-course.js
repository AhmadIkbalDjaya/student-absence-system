const collapseButtons = document.querySelectorAll(".collapse-button");
const collapses = document.querySelectorAll(".collapse");
collapseButtons.forEach((button, index) => {
  button.addEventListener("click", function () {
    collapses.forEach((collapse, index) => {
      collapse.classList.remove("show");
    });
  });
});