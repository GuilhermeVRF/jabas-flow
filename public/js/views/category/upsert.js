const colorInput = document.getElementById('color');

const pickr = Pickr.create({
    el: '.color-picker',
    theme: 'nano',
    default: colorInput.value,
    position: 'bottom',
    components: {
        preview: true,
        hue: true,
        interaction: {
            rgba: false,
            save: true
        }
    }
});

pickr.on('save', (color) => {
    const hex = color.toHEXA();

    colorInput.value = hex.toString();
    pickr.hide();
});
