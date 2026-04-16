function openConfirm(action) {
    const yesBtn = document.querySelector(".btn-continue");
    const noBtn = document.querySelectorAll(".btn-cancel");
    const buttonBox = document.querySelector(".last-confirmation-buttons");
    const pwdBox = document.querySelector(".hidden-pwd-box");

    yesBtn.addEventListener("click", function () {
        buttonBox.style.display = "none";
        pwdBox.style.display = "block";
    });

    const form = document.getElementById("confirmForm");
    const text = document.getElementById("confirmText");
    const actionInput = document.getElementById("confirmAction");

    actionInput.value = action;

    if (action === "delete_item") {
        text.textContent = "Are you sure you want to delete this item?";
        noBtn.forEach(button => {
            button.addEventListener("click", function () {
                window.location.href = "stock.php";
            });

        });
    }

    if (action === "delete_user") {
        text.textContent = "Are you sure you want to delete this user?";
        noBtn.forEach(button => {
            button.addEventListener("click", function () {
                window.location.href = "membersarea.php";
            });

        });
    }

    if (action === "update_item") {
        text.textContent = "Are you sure you want to update this item?";
    }

    form.style.display = "block";
}
function showItemFilters() {
    const hiddenFields = document.querySelectorAll(".hiddenfields");


    hiddenFields.forEach(element => {
        element.classList.toggle("hiddenfields")
        element.classList.toggle("enabled")
    })

}

function hideFilters() {
    const enabledFields = document.querySelectorAll(".enabled");


    enabledFields.forEach(element => {
        element.classList.toggle("hiddenfields")
        element.classList.toggle("enabled")
    })

}


