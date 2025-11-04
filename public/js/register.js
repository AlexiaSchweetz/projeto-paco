document.addEventListener("DOMContentLoaded", function () {
    const registerButton = document.getElementById("register-btn");
    const csrfToken = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");

    if (registerButton) {
        registerButton.addEventListener("click", async function () {
            const name = document.getElementById("name").value;
            const email = document.getElementById("email").value;
            const password = document.getElementById("password").value;

            const response = await fetch("/api/register", {
                method: "POST",
                headers: {
                    Accept: "application/json",
                    "X-CSRF-TOKEN": csrfToken,
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({
                    name: name,
                    email: email,
                    password: password,
                }),
            }); 

            if (response.status==200) { 
                window.location.href = "/login";
            } else {
                alert("Erro ao Registrar");
                console.log(data);
            }
        });
    }
});
