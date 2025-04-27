const colorInput = document.querySelector('input[name="color"]');
const colorPickerBtn = document.querySelector('.color-picker-btn');
const colorOptions = document.querySelector('.color-options');
const colors = document.querySelectorAll('.color-option');
const customColorOption = document.getElementById('customColorOption');

function setColor(color){
    colorInput.value = color;
}

// Alternar visibilidade das opções de cor
colorPickerBtn.addEventListener('click', function(event) {
    // Evitar que o clique no botão feche o colorOptions
    event.stopPropagation();
    colorOptions.style.display = colorOptions.style.display === 'none' || !colorOptions.style.display ? 'flex' : 'none'; 
});

// Adicionando ouvinte de clique ao documento para fechar o colorOptions
document.addEventListener('click', function(event) {
    // Verifica se o clique foi fora da área do colorOptions e do colorPickerBtn
    if (!colorOptions.contains(event.target) && !colorPickerBtn.contains(event.target)) {
        colorOptions.style.display = 'none';  // Oculta o colorOptions
    }
});

// Configuração do Pickr
const pickr = Pickr.create({
    el: '.color-picker',
    theme: 'nano',
    default: colorInput.value,
    position: 'bottom',
    components: {
        preview: true,
        hue: true,
        interaction: {
            input: true,
            rgba: false,
            save: true
        }
    }
});

// Mudando o nome do botão salvar
document.querySelector('.pcr-save').value = "Salvar";

// Salvar cor personalizada
pickr.on('save', (color) => {
    const selectedColor = color.toHEXA().toString(); 
    const existingOption = Array.from(colors).find(colorOption => colorOption.getAttribute('data-color') === selectedColor);

    if(!existingOption){
        const newOption = document.createElement('div');
        newOption.className = 'color-option';
        newOption.setAttribute('data-color', selectedColor);
        newOption.style.backgroundColor = selectedColor;
        customColorOption.parentNode.insertBefore(newOption, customColorOption);   
    }
    
    setColor(selectedColor);
    pickr.hide();
});

// Fechar o seletor de cor ao clicar no botão do Pickr
document.querySelector('.pcr-button').addEventListener('click', function(){
    colorOptions.style.display = "none";    
});

// Selecionar uma cor
colors.forEach(option => {
    option.addEventListener('click', function(){
        if(this === customColorOption){
            pickr.show();
        }else{
            const selectedColor = this.getAttribute('data-color');
            pickr.setColor(selectedColor);
            setColor(selectedColor);
            colorInput.value = selectedColor;
        }
        
        colorOptions.style.display = "none";
    })
})