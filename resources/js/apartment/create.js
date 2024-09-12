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
    document.getElementById('page-8'),
]

// ELEMENTI DOM PER GESTIRE L'INDIRIZZO
const address_input_field = document.getElementById("address");
const address_output_field = document.getElementById("result_address")
const address_output_label = document.getElementById("result_address_label")
const latitude_output_field = document.getElementById('latitude')
const longitude_output_field = document.getElementById('longitude')

pages.forEach((element, index) => {
    if (index != 0){
        element.hidden = true;
    }
})

function validateTextField(id, min = 0, max = null){
    const element = document.getElementById(id);
    if (element.value == false){
        return false
    } else {
        return true
    }
}

// CAMBIO PAGINA DA PAGINA 1 A PAGINA 2
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
        // quando passo da inserisci indirizzo a mostra indirizzo
        if (current_page === 3){

            if (validateTextField('address') === false){
                alert("L'indirizzo è obbligatorio")
                return
            }

            const apiUrl = '/api/tomtom/geolocalize/';

            const user_input = encodeURIComponent(address_input_field.value);
            console.log(user_input)
            // Make a GET request
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




