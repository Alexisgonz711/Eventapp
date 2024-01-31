function showEventModal(event) {
    // Empêcher le comportement par défaut du bouton
    event.preventDefault();

    // Afficher la modale
    var modal = document.getElementById('editModal');
    modal.style.display = 'block';
}

function closeModal() {
    // Masquer la modale
    var modal = document.getElementById('editModal');

    modal.style.display = 'none';
}
