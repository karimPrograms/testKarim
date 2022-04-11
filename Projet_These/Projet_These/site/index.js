var arr = document.querySelectorAll('input[name="typeP"]');
var field = document.getElementById("mili");

arr.forEach((radio) => {
  radio.addEventListener("change", () => {
    if (radio.value == "Matérial Pharmaceutiques") {
      field.disabled = true;
      field.style.backgroundColor = "#a7b1c2";
      field.placeholder = "Disabled!";
    } else {
      field.disabled = false;
      field.style.background = "transparent";
      field.placeholder = "Tapez les milligramme";
    }
  });
});
