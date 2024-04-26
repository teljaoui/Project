(function () {
    [...document.querySelectorAll(".control")].forEach(button => {
        button.addEventListener("click", function() {
            document.querySelector(".active-btn").classList.remove("active-btn");
            this.classList.add("active-btn");
            document.querySelector(".active").classList.remove("active");
            document.getElementById(button.dataset.id).classList.add("active");
        })
    });
    document.querySelector(".theme-btn").addEventListener("click", () => {
        document.body.classList.toggle("light-mode");
    })
})();
function sendEmail() {
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var message = document.getElementById("message").value;
    var num = document.getElementById('num')

    var subject = "Nouveau message de " + name;
    var body = "Nom: " + name + "\nEmail: " + email +'\nNumero de telephon'+ num +"\nMessage: " + message;

    window.open("mailto:destinataire@example.com?subject=" + encodeURIComponent(subject) + "&body=" + encodeURIComponent(body));
  }
