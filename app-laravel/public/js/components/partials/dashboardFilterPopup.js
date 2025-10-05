const monthSelect = document.getElementById('month');

document.addEventListener('DOMContentLoaded', () => {

    const selectedMonth = monthSelect.selectedOptions[0]?.value;
    if(selectedMonth){
        const url = new URL(window.location);
        url.searchParams.set('month', selectedMonth);
        window.history.pushState({}, '', url);
    }
});
