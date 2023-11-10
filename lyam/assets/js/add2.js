function jsonXML(file, functions) {
  const xml = new XMLHttpRequest();
  xml.open("GET", file);
  xml.responseType = "json";
  xml.onload = function () {
    functions(xml.response);
  };
  xml.send();
}

let count = 0;
let infos = {};
let current_app = "";
function add(current_appP) {
  if (count == 1) {
    document.querySelector(".IAgree").addEventListener("click", () => {
      if (current_app != "") {
        function get(content) {
          document.querySelector(".login-box form h6").innerHTML = `
                    <h3>Nom : ${content.Name}</h3>
                    <h4>Description : ${content.Desc}</h4>
                      `;
          document.querySelector(".login-box form h2").textContent = `
                      Bref aperçu de l'application
                      `;
          infos = content.steps;
          document.querySelector(".buttonADD progress").max =
            Object.keys(infos).length;
        }
        jsonXML("./lib/ch.loines.cloudUtils/" + current_app + ".json", get);
        document.querySelector(".IAgree").style.display = "none";
        document.querySelector(".buttonADD").style.display = "block";
        document
          .querySelector(".buttonADD_inner")
          .addEventListener("click", () => {
            jsonXML(
              "./lib/ch.loines.cloudUtils/client/addApp.php?t=" + current_app,
              function () {
                jsonXML(
                  "./CLOUD/apps/" + current_app + "/index.php",
                  function () {
                    console.log("Cloud OK");
                  }
                );
              }
            );
            let total = 0;
            for (const name in infos) {
              if (Object.hasOwnProperty.call(infos, name)) {
                const element = infos[name];
                setTimeout(() => {
                  document.querySelector(".buttonADD .infos").innerHTML = `
                  Statut : ${name}
                  `;
                  document.querySelector(".buttonADD progress").value += 0.5;
                }, total * 1000);
                total += element;
              }
            }
            setTimeout(() => {
              document.querySelector(".buttonADD .infos").innerHTML = `
              Statut : terminé!
              `;
              window.location = "./CLOUD/apps/" + current_app + "/index.php";
            }, 13000);
          });
      }
    });
  } else {
    current_app = current_appP;
    count++;
  }
}
function getAPP(content) {
  if (content["apps"]["calendar"] === true) {
    document.querySelector(
      ".calendarBUTTON"
    ).parentElement.innerHTML += `(Deja installée)`;
    document.querySelector(".calendarBUTTON").remove();
  }
  if (content["apps"]["todo"] === true) {
    document.querySelector(
      ".todoBUTTON"
    ).parentElement.innerHTML += `(Deja installée)`;
    document.querySelector(".todoBUTTON").remove();
  }
  if (content["apps"]["lwps"] === true) {
    document.querySelector(
      ".lwpsBUTTON"
    ).parentElement.innerHTML += `(Deja installée)`;
    document.querySelector(".lwpsBUTTON").remove();
  }
}
jsonXML("./user_infos.json", getAPP);
