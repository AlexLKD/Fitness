const userItems = document.querySelectorAll(".user-name");

userItems.forEach((userItem) => {
    userItem.addEventListener("click", async function () {
        const userId = this.getAttribute("data-user-id");

        try {
            const response = await fetch(`getPrograms.php?userId=${userId}`);
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }

            const programListContainer =
                document.querySelector(".program-list");
            programListContainer.innerHTML = await response.text();

            // Réinitialise la liste des workouts
            const workoutListContainer =
                document.querySelector(".workout-list");
            workoutListContainer.innerHTML = "";
        } catch (error) {
            console.error("Fetch error:", error);
        }
    });
});

const programListContainer = document.querySelector(".program-list");
programListContainer.addEventListener("click", function (event) {
    if (event.target.classList.contains("program-name")) {
        // Récupérez l'ID du programme
        const programId = event.target.getAttribute("data-program-id");

        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                const workoutListContainer =
                    document.querySelector(".workout-list");
                workoutListContainer.innerHTML = xhr.responseText;
            }
        };

        xhr.open("GET", `getWorkouts.php?programId=${programId}`, true);
        xhr.send();
    }
});
