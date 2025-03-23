const showBudgets = document.querySelectorAll('.show-budget');
const showBudgetPopup = document.getElementById('showBudgetPopup');
const closeBudgetPopup = document.getElementById('closeBudgetPopup');

showBudgets.forEach(showBudget => {
    showBudget.addEventListener('click', async (event) => {
        event.preventDefault();
        const budgetId = showBudget.getAttribute('data-id');
        const budget = await fetchBudget(budgetId);
        mountBudgetPopup(budget);

        showBudgetPopup.style.display = 'flex';
    });
});

closeBudgetPopup.addEventListener('click', () => {
    showBudgetPopup.style.display = 'none';
});


async function fetchBudget(budgetId) {
    const url = `${window.location.protocol}//${window.location.host}/budget/show/${budgetId}`;
    try {
        const response = await fetch(url);
        const data = await response.json();
        
        return data;
    } catch (error) {
        return null;
    }
}


function mountBudgetPopup(budget){
    const showBudgetPopupContent = document.querySelector('.budget-popup__content');
    if(!budget){
        showBudgetPopupContent.innerHTML = `
            <h2>Erro ao buscar orçamento</h2>
        `;
        return;
    }

    const formattedDate = new Date(budget.billing_date).toLocaleDateString('pt-BR', {
        day: '2-digit',
        month: '2-digit',
        year: 'numeric'
    });

    showBudgetPopupContent.innerHTML = `
        <h2>${budget.name}</h2>
        <div>Tipo: ${budget.type}</div>
        <div>Status: ${budget.status}</div>
        <div>Total: ${budget.amount}</div>
        <div>Data de cobrança: ${formattedDate}</div>
    `;

    if(budget.description){
        showBudgetPopupContent.innerHTML += `
            <textarea disabled>${budget.description}</textarea>
        `;
    }
}