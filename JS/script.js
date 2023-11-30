// document.addEventListener("DOMContentLoaded", function () {
//     // Récupérer le bouton et la liste des utilisateurs
//     let filterButton = document.getElementById("filter-button");
//     let userList = document.querySelector(".user-list");

//     // Attacher un gestionnaire d'événements au bouton
//     filterButton.addEventListener("click", function () {
//         // Récupérer tous les éléments de la liste
//         let userItems = userList.querySelectorAll(".user-name");

//         // Filtrer les utilisateurs sans programme associé
//         userItems.forEach(function (userItem) {
//             let userId = userItem.getAttribute("data-user-id");

//             // Effectuer une requête AJAX pour vérifier si l'utilisateur a des programmes
//             let xhr = new XMLHttpRequest();
//             xhr.open("GET", "votre_script.php?userId=" + userId, true);

//             xhr.onload = function () {
//                 if (xhr.status >= 200 && xhr.status < 400) {
//                     let response = xhr.responseText;

//                     // Cacher ou afficher l'utilisateur en fonction de la réponse
//                     if (response === "0") {
//                         userItem.style.display = "none";
//                     } else {
//                         userItem.style.display = "list-item";
//                     }
//                 } else {
//                     console.error(
//                         "Erreur lors de la requête AJAX:",
//                         xhr.statusText
//                     );
//                 }
//             };

//             xhr.onerror = function () {
//                 console.error("Erreur lors de la requête AJAX.");
//             };

//             xhr.send();
//         });
//     });
// });
