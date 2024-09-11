let current_page = 0;


const button_page_forward = document.getElementById('button-forward')

const pages = [
    document.getElementById('page-1'), 
    document.getElementById('page-2'),
    document.getElementById('page-3'),
    document.getElementById('page-4'),
    document.getElementById('page-5'),
    document.getElementById('page-6'),
    document.getElementById('page-7'),
]

pages.forEach((element, index) => {
    if (index != 0){
        element.hidden = true;
    }
})

// CAMBIO PAGINA DA PAGINA 1 A PAGINA 2
button_page_forward.addEventListener("click", function(event){
    if (current_page < 6){
        event.preventDefault()
    
        // nascondo la pagina corrente
        pages[current_page].hidden = true;
        
        // porto avanti il contatore
        current_page += 1;

        // mostro la pagina successiva
        pages[current_page].hidden = false;
    }

});


// GESTISCO IL NUMERO DELLO SLIDER
window.changeSliderValue = function (element, label_id){
    let value = element.value
    const max_value = element.max.toString()
    console.log(max_value)
    if (value === max_value){
        value = max_value + '+'
    }
    document.getElementById(label_id).innerHTML = value;
}