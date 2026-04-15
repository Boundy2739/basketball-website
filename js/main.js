const yesBtn = document.querySelector(".btn-continue");
const noBtn = document.querySelectorAll(".btn-cancel");
const buttonBox = document.querySelector(".last-confirmation-buttons");
const pwdBox = document.querySelector(".hidden-pwd-box");

yesBtn.addEventListener("click", function () {
    buttonBox.style.display = "none";
    pwdBox.style.display = "block";
});
noBtn.forEach(button => {
    button.addEventListener("click", function () {
        window.location.href = "stock.php";
    });
    
});

