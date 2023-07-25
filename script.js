const selectedColor = document.getElementsById('colorSelect');

selectedColor.addEventListener('change', function() {
    const selectedValue = selectedColor.value;
    console.log("Selected Color: ", selectedValue);

});

