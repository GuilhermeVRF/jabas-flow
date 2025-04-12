const recurrenceEmailHiddenInput = document.querySelector('input[name=email_notifications]');
const recurrenceEmailInput = document.getElementById("email_notifications");

recurrenceEmailInput.addEventListener("change", (event) => {
    recurrenceEmailHiddenInput.value = event.target.checked ? 1 : 0;
    console.log(event.target.checked)
});