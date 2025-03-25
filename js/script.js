window.onload = function () {
    let loginBtn = document.querySelector(".login"); // Zoek de login-knop
    let modal = document.getElementById("loginModal"); // Zoek de modal
    let closeBtn = document.querySelector(".close"); // Zoek de sluitknop

    // Controleer of de knoppen correct worden gevonden
    if (!loginBtn || !modal || !closeBtn) {
        console.error("FOUT: Login-knop of modal niet gevonden!");
        return;
    }

    console.log("Login-knop gevonden:", loginBtn);
    console.log("Modal gevonden:", modal);

    // Login knop - modal openen
    loginBtn.addEventListener("click", function () {
        console.log("Login knop geklikt! Modal openen...");
        modal.style.display = "flex";
    });

    // Sluitknop - modal sluiten
    closeBtn.addEventListener("click", function () {
        console.log("Sluitknop geklikt! Modal sluiten...");
        modal.style.display = "none";
    });

    // Klik buiten de modal om te sluiten
    window.addEventListener("click", function (event) {
        if (event.target === modal) {
            console.log("Buiten de modal geklikt! Modal sluiten...");
            modal.style.display = "none";
        }
    });
};