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

function confirmDelete(userId) {
    if (confirm("Êtes-vous sûr de vouloir supprimer cet utilisateur ? Cette action est irréversible.")) {
        window.location.href = "delete_user.php?uid=" + userId;
    }
}