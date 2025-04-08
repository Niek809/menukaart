window.onload = function () {
    let loginBtn = document.querySelector(".login"); 
    let modal = document.getElementById("loginModal"); 
    let closeBtn = document.querySelector(".close"); 
    let submitBtn = document.querySelector(".modal-content button"); 
    let usernameInput = document.getElementById("username"); 
    let passwordInput = document.getElementById("password"); 

    // Controleer of alle elementen correct worden gevonden
    if (!loginBtn || !modal || !closeBtn || !submitBtn || !usernameInput || !passwordInput) {
        console.error("FOUT: Een of meerdere elementen niet gevonden!");
        return;
    }

    // Login knop - modal openen
    loginBtn.addEventListener("click", function () {
        modal.style.display = "flex";
    });

    // Sluitknop - modal sluiten
    closeBtn.addEventListener("click", function () {
        modal.style.display = "none";
    });

    // Klik buiten de modal om te sluiten
    window.addEventListener("click", function (event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    });

    document.getElementById("loginForm").addEventListener("submit", function (event) {
        event.preventDefault();
    
        let username = document.getElementById("username").value.trim();
        let password = document.getElementById("password").value.trim();
    
        let formData = new FormData();
        formData.append("username", username);
        formData.append("password", password);
    
        fetch("admin.php", {
            method: "POST",
            body: formData,
        })
        .then(response => response.text())
        .then(data => {
            if (data === "success") {
                window.location.href = "admin.php";
            } else {
                alert(data);
            }
        })
        .catch(error => console.error("Fout:", error));
    });
};