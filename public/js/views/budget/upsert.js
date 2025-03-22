const isRecurrence = document.getElementById('isRecurrence');
const isRecurrenceHiddenInput = document.querySelector('input[name=isRecurrence]');
const recurrenceContainer = document.getElementById('recurrenceContainer');

function toggleRecurrenceContainer(){
    isRecurrenceHiddenInput.value = isRecurrence.checked;
    if (isRecurrence.checked) {
        recurrenceContainer.style.display = 'flex';
    } else {
        recurrenceContainer.style.display = 'none';
    }
}

isRecurrence.addEventListener('change', () => toggleRecurrenceContainer());

toggleRecurrenceContainer();
