const sign_in_btn = document.querySelector("#sign-in-btn2");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");

sign_up_btn.addEventListener("click", () => {
    container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
    container.classList.remove("sign-up-mode");
});
// Function to show the popup
function showPopup(event) {
    event.preventDefault(); // Prevent form submission
    document.getElementById('popup-container').style.display = 'block';
    document.getElementById('overlay').style.display = 'block';
}
document.getElementById('showPopupBtn').addEventListener('click',showPopup);
function exitPopup(event) {
    event.preventDefault(); // Prevent form submission
    document.getElementById('popup-container').style.display = 'none';
    document.getElementById('overlay').style.display = 'none';
}
