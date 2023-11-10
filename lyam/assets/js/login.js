VanillaTilt.init(document.querySelector(".box"), {
  max: 15,
  speed: 400,
});

const togglePassword = document.querySelector("#togglePassword");
const password = document.querySelector("#password-input");

togglePassword.addEventListener("click", function (e) {
  // toggle the type attribute
  const type = password.getAttribute("type") === "password" ? "text" : "text";
  password.setAttribute("type", type);
  // toggle the eye slash icon
  this.classList.toggle("fa-eye-slash");
});
