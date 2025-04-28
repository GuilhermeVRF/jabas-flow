const preResgisteredCategories = document.querySelectorAll('input[name=preRegisteredCategory]');
const categoryNameInput = document.querySelector('input[name=name]');
const customCategoryContainer = document.querySelector('.customCategoryContainer');

preResgisteredCategories.forEach(preResgisteredCategory => {
    preResgisteredCategory.addEventListener('change', () => {
        categoryNameInput.value = preResgisteredCategory.value;

        const selectedColor = preResgisteredCategory.getAttribute('data-color');
        pickr.setColor(selectedColor);
        setColor(selectedColor);
    });
});
