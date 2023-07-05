const forms = document.querySelectorAll("form");
forms.forEach(form => {
    form.addEventListener("submit", function(e) {
        let activeForm = this.name;
        let payload = new FormData(document.querySelector(`form[name=${activeForm}]`));
        const xhr = new XMLHttpRequest();
        xhr.open("POST", `auth.php?page-login`, true);
        xhr.withCredentials = true;
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onload = function() {
            if (xhr.status === 200) {
                const data = JSON.parse(xhr.responseText);
            
                if (data.success) {
                    window.location.replace("index.php");
                }
            
                if (data.message) {
                    const para = document.createElement("p");
                    para.classList.add(data.reg_success ? "success" : "error");
                    para.innerText = data.message;
                    document.body.appendChild(para);
                }
            }

        };
        xhr.send(new URLSearchParams(payload).toString());
        e.preventDefault();
    });
});
let signUpForm = document.querySelector(".email-signup");
logInForm = document.querySelector(".email-login");
signUpLink = document.getElementById("signup-box-link");
logInLink = document.getElementById("login-box-link");
signUpForm.style.display = "none";
signUpLink.addEventListener('click', function() {
    logInForm.style.display = "none";
    signUpForm.style.display = "block";
    logInLink.classList.remove("active");
    signUpLink.classList.add("active");
});
logInLink.addEventListener('click', function() {
    signUpForm.style.display = "none";
    logInForm.style.display = "block";
    signUpLink.classList.remove("active");
    logInLink.classList.add("active");
});