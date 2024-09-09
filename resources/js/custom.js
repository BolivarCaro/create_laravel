

document.addEventListener('DOMContentLoaded', () => {
    const nextButton = document.getElementById('nextButton');
    const senderForm = document.getElementById('senderForm');
    const recipientForm = document.getElementById('recipientForm');

    nextButton.addEventListener('click', () => {
        // Oculta el formulario del remitente
        senderForm.style.display = 'none';
        // Muestra el formulario del destinatario
        recipientForm.style.display = 'block';
    });
});
