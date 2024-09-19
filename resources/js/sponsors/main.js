document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.modal').forEach(modal => {
        modal.addEventListener('shown.bs.modal', function () {
            const dropinContainer = modal.querySelector('#dropin-container');
            const button = modal.querySelector('#submit-button');
            const apartmentSelect = modal.querySelector('#apartmentSelect');

            if (!button || !dropinContainer || !apartmentSelect) {
                console.error("Elemento mancante nel modal.");
                return;
            }

            if (!dropinContainer.childElementCount) {
                braintree.dropin.create({
                    authorization: 'sandbox_g42y39zw_348pk9cgf3bgyw2b',
                    selector: dropinContainer
                }, function (err, instance) {
                    if (err) {
                        console.error("Errore durante la creazione del drop-in:", err);
                        return;
                    }
                    console.log("Drop-in creato correttamente nel modal:", instance);

                    button.addEventListener('click', function () {
                        if (apartmentSelect.value === "") {
                            alert('Per favore seleziona un appartamento da sponsorizzare.');
                            return;
                        }

                        instance.requestPaymentMethod(function (err, payload) {
                            if (err) {
                                console.error("Errore durante la richiesta del metodo di pagamento:", err);
                                return;
                            }
                            // Invia payload.nonce al server
                            console.log("Payment nonce:", payload.nonce);
                            // Qui puoi inviare il nonce al server o gestire il pagamento
                        });
                    });
                });
            }
        });
    });
});
