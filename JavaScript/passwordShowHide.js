function showOrHide() {
    let passwordType = document.getElementById("password");
    if (passwordType.type === "password") {
        passwordType.type = "text";
    } else {
        passwordType.type = "password";
    }
}