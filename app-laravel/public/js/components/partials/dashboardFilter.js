const filterButton = document.getElementById('filter');
const showDashboardFilterPopup = document.getElementById('showDashboardFilterPopup');
const closeDashboardFilterPopup = document.getElementById('closeDashboardFilterPopup');

filterButton.addEventListener('click', ()=>{
    showDashboardFilterPopup.style.display = 'flex';
})

closeDashboardFilterPopup.addEventListener('click', () => {
    showDashboardFilterPopup.style.display = 'none';
});