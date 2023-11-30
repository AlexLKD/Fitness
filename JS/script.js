// Récupérer tous les éléments de la liste des utilisateurs
const userItems = document.querySelectorAll(".user-name");

// Ajouter un gestionnaire d'événements clic à chaque élément
userItems.forEach((userItem) => {
    userItem.addEventListener("click", function () {
        // Récupérer l'ID de l'utilisateur associé à cet élément
        const userId = this.getAttribute("data-user-id");

        // Faire une requête AJAX pour récupérer les programmes associés à cet utilisateur
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Mettre à jour la liste des programmes avec la réponse de la requête
                const programListContainer =
                    document.querySelector(".program-list");
                programListContainer.innerHTML = xhr.responseText;
            }
        };

        xhr.open("GET", `getPrograms.php?userId=${userId}`, true);
        xhr.send();
    });
});
