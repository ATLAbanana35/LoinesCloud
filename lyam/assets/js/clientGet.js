let TodayTimeStamp = 0;
// (Crée par ChatGPT et Bard) :
//ChatGPT part
function estDansLaJourneeActuelle(timestamp) {
  // Convertir le timestamp en date
  const dateDuTimestamp = new Date(timestamp * 1000);
  const Dates = new Date(Date.now());
  // Obtenir l'année, le mois et le jour de la date actuelle
  const anneeActuelle = Dates.getFullYear();
  const moisActuel = Dates.getMonth() + 1; // Notez que les mois vont de 0 à 11, d'où le "+ 1"
  const jourActuel = Dates.getDate();

  // Obtenir l'année, le mois et le jour de la date du timestamp
  const anneeDuTimestamp = dateDuTimestamp.getFullYear();
  const moisDuTimestamp = dateDuTimestamp.getMonth() + 1;
  const jourDuTimestamp = dateDuTimestamp.getDate();
  // Vérifier si le timestamp est contenu dans la journée actuelle
  return (
    anneeActuelle === anneeDuTimestamp &&
    moisActuel === moisDuTimestamp &&
    jourActuel === jourDuTimestamp
  );
}
// Pris à partir d'openclassrooms/StackOverFlow
function nbre_caracteres(lettre, mot) {
  const regex = new RegExp(lettre, "g");
  const nbre_de_fois_trouve = (mot.match(regex) || []).length;
  return nbre_de_fois_trouve;
}
function jsonXML(file, functions) {
  const xml = new XMLHttpRequest();
  xml.open("GET", file);
  xml.responseType = "json";
  xml.onload = function () {
    functions(xml.response);
  };
  xml.send();
}

function IsAppActive(appName, functions) {
  function get(content) {
    if (
      content["apps"][appName] !== undefined &&
      content["apps"][appName] === true
    ) {
      functions();
    }
  }
  jsonXML("user_infos.json", get);
}

function main() {
  IsAppActive("calendar", function () {
    getCalendar();
    document.querySelector(".CALENDAR").classList.remove("gray");
    document.querySelector(".CALENDAR").onclick = function () {
      window.location = "CLOUD/apps/calendar";
    };
  });
  IsAppActive("todo", function () {
    getToDo();
    document.querySelector(".TODO").classList.remove("gray");
    document.querySelector(".TODO").onclick = function () {
      window.location = "CLOUD/apps/todo";
    };
  });
  IsAppActive("lwps", function () {
    document.querySelector(".LWPS").classList.remove("gray");
    document.querySelector(".navigation").style.display = "block";
    document.querySelector(".LWPS").onclick = function () {
      window.location = "CLOUD/apps/lwps";
    };
  });
  IsAppActive("lquiz", function () {
    document.querySelector(".LQUIZ").classList.remove("gray");
    document.querySelector(".LQUIZ").onclick = function () {
      window.location = "CLOUD/apps/quiz";
    };
  });
}

function getCalendar() {
  const HTMLelement = document.createElement("iframe");
  HTMLelement.src = "CLOUD/apps/calendar/index.php";
  document
    .querySelector(".YourDay article .calendar .iframe")
    .appendChild(HTMLelement);
  HTMLelement.style.display = "none";
  setTimeout(() => {
    HTMLelement.contentWindow.document.body
      .querySelectorAll("main ul")
      .forEach((element) => {
        if (element.classList[0] !== undefined) {
          let time = element.classList[0].substring(1);
          if (estDansLaJourneeActuelle(Number(time))) {
            document.querySelector(
              ".YourDay article .calendar .sandBox"
            ).innerHTML += HTMLelement.contentWindow.document.querySelector(
              "." + element.classList[0]
            ).innerHTML;
            document.querySelector(".YourDay article .calendar").innerHTML +=
              "<span style='color: " +
              document.querySelector(".YourDay article .calendar .sandBox h3")
                .style.color +
              "'>" +
              document
                .querySelector(".YourDay article .calendar .sandBox h3")
                .textContent.replace("Évènement : ", "")
                .replace("Heure : ", ", ")
                .substring(
                  0,
                  document
                    .querySelector(".YourDay article .calendar .sandBox h3")
                    .textContent.indexOf("Cela concerne : ") - 18
                ) +
              "</span>";
            TodayTimeStamp = time;
          }
        }
      });
    HTMLelement.contentWindow.document.body
      .querySelectorAll("main a")
      .forEach((element) => {
        if (element.href.indexOf("add.php?day=" + TodayTimeStamp) !== -1) {
          document.querySelector(".day").innerHTML = `
            Aujourd'hui : ${element.textContent}
            `;
        }
      });
  }, 1000);
  document.querySelector(".day").innerHTML = `
  Rien aujourd'hui!
  `;
}
let totalUpdateToMake = 0;
function getToDo() {
  document.querySelector(".YourDay .todoList").innerHTML = "";
  const HTMLelement = document.createElement("iframe");
  HTMLelement.src = "CLOUD/apps/todo/index.php";
  document
    .querySelector(".YourDay article .todo .iframe")
    .appendChild(HTMLelement);
  HTMLelement.style.display = "none";
  setTimeout(() => {
    HTMLelement.contentWindow.document
      .querySelectorAll("table tbody tr")
      .forEach((element) => {
        const name = element.innerHTML
          .split(">Name : ")[1]
          .split("<img")[0]
          .substring(
            0,
            element.innerHTML.split(">Name : ")[1].split("<img")[1].length
          );
        document.querySelector(".YourDay article .todo .sandBox").innerHTML =
          element.innerHTML;
        const ImageSRC = document.querySelector(
          ".YourDay article .todo .sandBox img"
        ).src;
        console.log();
        let statut =
          "❗ERROR VOTRE BASE DE DONNÉE EST CORROMPUE (vous pourrez normalement toujours l’utiliser";
        if (nbre_caracteres("✅", element.innerHTML) > 1) {
          statut = 2;
        }
        if (nbre_caracteres("❌", element.innerHTML) > 1) {
          statut = 0;
        }
        if (nbre_caracteres("🔄️", element.innerHTML) > 1) {
          statut = 1;
        }
        if (statut === 0) {
          document.querySelector(".todoList").innerHTML += `
            <li>(à faire) <img src="${ImageSRC}" width="50"></img> ${name}</li>
            `;
        } else if (statut === 1) {
          document.querySelector(".todoList").innerHTML += `
            <li>(en cours) <img src="${ImageSRC}" width="50"></img> ${name}</li>
            `;
        } else if (statut === 2) {
          totalUpdateToMake += 1;
        } else {
          document.querySelector(".YourDay .todoList").innerHTML += `
            <li>${statut}</li>
            `;
        }
      });
    document.querySelector(".YourDay .todoList").innerHTML += `
    <li>Finit : ${totalUpdateToMake}</li>
    `;
  }, 1000);
}
main();
