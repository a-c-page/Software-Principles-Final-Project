function regTab() {
  var element = document.getElementById("login-c");
  element.classList.add("hidden");
  var element = document.getElementById("register-c");
  element.classList.remove("hidden");
  var element = document.getElementById("left-tab");
  element.classList.remove("active");
  var element = document.getElementById("right-tab");
  element.classList.add("active");
}

function loginTab() {
  var element = document.getElementById("register-c");
  element.classList.add("hidden");
  var element = document.getElementById("login-c");
  element.classList.remove("hidden");
  var element = document.getElementById("right-tab");
  element.classList.remove("active");
  var element = document.getElementById("left-tab");
  element.classList.add("active");
}
