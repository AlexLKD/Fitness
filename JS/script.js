const userItems = document.querySelectorAll(".user-name");

userItems.forEach((userItem) => {
    userItem.addEventListener("click", function () {
        const userId = this.getAttribute("data-user-id");
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                const programListContainer =
                    document.querySelector(".program-list");
                programListContainer.innerHTML = xhr.responseText;
            }
        };

        xhr.open("GET", `getPrograms.php?userId=${userId}`, true);
        xhr.send();
    });
});
