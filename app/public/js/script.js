function showEditForm(event, userId) {
    // Empêcher le comportement par défaut du lien
    event.preventDefault();

    // Afficher la modale
    var modal = document.getElementById('editModal');
    modal.style.display = 'block';

    // Vous pouvez ajouter d'autres logiques ici pour charger les données de l'utilisateur dans la modale
}

function closeModal() {
    // Masquer la modale
    var modal = document.getElementById('editModal');
    modal.style.display = 'none';
}