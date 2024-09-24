let current_page = 0;


const button_page_forward = document.getElementById('button-forward')
const button_page_backward = document.getElementById('button-backward')

const pages = [
    document.getElementById('page-1'), 
    document.getElementById('page-2'),
    document.getElementById('page-3'),
    document.getElementById('page-4'),
    document.getElementById('page-5'),
    document.getElementById('page-6'),
    document.getElementById('page-7'),
    document.getElementById('page-8'),
]

// ELEMENTI DOM PER GESTIRE L'INDIRIZZO
const address_input_field = document.getElementById("address");
const address_output_field = document.getElementById("result_address")
const address_output_label = document.getElementById("result_address_label")
const latitude_output_field = document.getElementById('latitude')
const longitude_output_field = document.getElementById('longitude')
const autocomplete_list = document.getElementById('autocomplete_list')

//NASCONDO TUTTE LE PAGINE TRANNE LA PRIMA
pages.forEach((element, index) => {
    if (index != 0){
        element.hidden = true;
    }
})

// FUNZIONE CHE CONTROLLA IL REQUIRED DEI CAMPI DI TESTO
function validateTextField(id, min = 0, max = null){
    const element = document.getElementById(id);
    if (element.value == false){
        return false
    } else {
        return true
    }
}

// AVANZO  DI PAGINA IN PAGINA
button_page_forward.addEventListener("click", function(event){
    if (current_page < 7){
        event.preventDefault()
        
        if (current_page === 1){
            //quando provo a inviare il titolo
            if (validateTextField('title') === false){
                alert("Il titolo è obbligatorio")
                return
            }
        }

        if (current_page === 2){
            if (validateTextField('square_meters') === false){
                alert("I metri quadrati sono obbligatori")
                return
            }
        }


        // quando passo da inserisci indirizzo a mostra indirizzo
        if (current_page === 3){

            if (validateTextField('address') === false){
                alert("L'indirizzo è obbligatorio")
                return
            }


            // facciamo la chiamata all' api
            const apiUrl = '/api/tomtom/geolocalize/';

            const user_input = encodeURIComponent(address_input_field.value);
            console.log(user_input)
            
            fetch(apiUrl+user_input)
            .then(response => {
                if (!response.ok) {
                    address_output_field.value = null;
                    address_output_label.innerHTML = "Via non trovata, riprovare!"
                }
                return response.json();
            })
            .then(data => {
                console.log(data.data.position);
                address_output_field.value = data.data.address.freeformAddress;
                address_output_label.innerHTML = data.data.address.freeformAddress;
                latitude_output_field.value = data.data.position.lat;
                longitude_output_field.value = data.data.position.lon;
            })
            .catch(error => {
                console.error('Error:', error);
            });


        }

        if (current_page === 5){
            if (validateTextField('image') === false){
                alert("L'immagine è obbligatoria")
                return
            }
        }

        // nascondo la pagina corrente
        pages[current_page].hidden = true;
        
        // porto avanti il contatore
        current_page += 1;

        // mostro la pagina successiva
        pages[current_page].hidden = false;
    }

});


// TORNO ALLA PAGINA PRECEDENTE
button_page_backward.addEventListener("click", function(event){
    event.preventDefault()
    if(current_page > 0){
        // nascondo la pagina corrente
        pages[current_page].hidden = true;

        // torno indietro di una pagina
        current_page -= 1;

        // mostro la pagina
        pages[current_page].hidden = false;
    }
})

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



// AUTOCOMPLETE
let last_autocompleted_value = ""

$autocomplete_interval = setInterval( function(){
    if (address_input_field == null || address_input_field.value == null || address_input_field.value === last_autocompleted_value){
        return;
    }
    // facciamo la chiamata all' api
    const apiUrl = '/api/tomtom/autocomplete/';
    const user_input = encodeURIComponent(address_input_field.value);
    last_autocompleted_value = address_input_field.value;
    fetch(apiUrl+user_input)
    .then(response => {
        if (!response.ok) {
            address_output_field.value = null;
            console.log('something went wrong!');
        }
        return response.json();
    })
    .then(data => {
        autocomplete_list.innerHTML = ""
        if(data.data.results.length > 0){
            data.data.results.forEach(function (element){
                console.log(element.address.freeformAddress)
                const autocomplete_field = document.createElement('li')
                autocomplete_field.innerText = element.address.freeformAddress
                autocomplete_list.appendChild(autocomplete_field)
            })
            should_autocomplete = false;
        }   
    })
    .catch(error => {
        console.error('Error:', error);
    });
}, 700)

  
    // quando premo su un suggerimento aggiorno l'input
autocomplete_list.addEventListener("click", function(event){
    address_input_field.value = event.target.innerText
})


// GESTISCO LA SELEZIONE DEI SERVIZI
window.toggleService = function (target, service_id){
    const checkBox = document.getElementById(`service-check-${service_id}`)
    // inverto il valore
    checkBox.checked = !checkBox.checked

    // modifico la visualizzazione
    if (checkBox.checked){
        target.classList.add('selected')
    } else {
        target.classList.remove('selected')

    }

}






