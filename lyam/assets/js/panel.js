const header = document.querySelector("header");
const UserLogo = document.querySelector(".user_infos h1");
const UserContent = document.querySelector(".UserInfosMenu");
const ManageAccountButton = document.querySelector(".manageAccount");
const deco = document.querySelector(".deco");
const mainHTML = document.querySelector("main");

document.addEventListener("scroll", (e) => {
  if (window.scrollY > 10) {
    header.style.top = "-1000px";
  } else {
    header.style.top = "0";
  }
});

let toggle = false;
UserLogo.addEventListener("click", () => {
  if (toggle) {
    UserContent.style.top = "-100%";
    toggle = false;
  } else {
    UserContent.style.top = "11%";
    toggle = true;
  }
});
deco.addEventListener("click", () => {
  window.location = "./deco.php";
});
ManageAccountButton.addEventListener("click", () => {
  window.location = "https://shop.loines.ch/Settings/";
});
document.querySelectorAll("section").forEach((element) => {
  const h1 = element.querySelector("h1");
  const logo = element.querySelector(".close");
  const content = element.querySelector("article");
  h1.addEventListener("click", () => {
    if (logo.innerHTML == "⬆️") {
      logo.innerHTML = "⬇️";
      content.style.display = "none";
    } else {
      logo.innerHTML = "⬆️";
      content.style.display = "flex";
    }
  });
});
let toggle2 = false;
document
  .querySelector(".bi-chevron-compact-left")
  .addEventListener("click", () => {
    if (toggle2 === false) {
      toggle2 = true;
      header.style.left = "-1000px";
      document.querySelector(".bi-chevron-compact-left").style.transform =
        "translateX(1000px) rotate(180deg)";
      mainHTML.style.width = "100%";
      mainHTML.style.left = "0%";
    } else {
      toggle2 = false;
      header.style.left = "0";
      document.querySelector(".bi-chevron-compact-left").style.transform =
        "translateX(0) rotate(0)";
      mainHTML.style.width = "60%";
      mainHTML.style.left = "40%";
    }
  });
