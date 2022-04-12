var arr = document.querySelectorAll('input[name="typeP"]');
var field = document.getElementById("mili");

arr.forEach((radio) => {
  radio.addEventListener("change", () => {
    if (radio.value == "Material Pharmaceutique") {
      field.disabled = true;
      field.style.backgroundColor = "#ccc";
    } else {
      field.disabled = false;
      field.style.background = "transparent";
      field.placeholder = "Tapez les milligramme";
    }
  });
});
