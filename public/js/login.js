document.addEventListener("DOMContentLoaded", function () {
    const loginButton = document.getElementById("login-btn");
    const csrfToken = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");

    if (loginButton) {
        loginButton.addEventListener("click", async function () {
            const email = document.getElementById("email").value;
            const password = document.getElementById("password").value;

            const response = await fetch("/login", {
                method: "POST",
                headers: {
                    Accept: "application/json",
                    "X-CSRF-TOKEN": csrfToken,
                    "Content-Type": "application/json",
                },
                body: JSON.stringify({
                    email: email,
                    password: password,
                }),
            });

            const data = await response.json();

            if (data.access_token) {
                localStorage.setItem("access_token", data.access_token);
                window.location.href = "/home";
            } else {
                alert("Erro ao logar");
                console.log(data);
            }
        });
    }
});
