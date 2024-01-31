function showEventModal(event) {
    event.preventDefault();

    var modal = document.getElementById('editModal');
    modal.style.display = 'block';
}

function closeModal() {
    var modal = document.getElementById('editModal');

    modal.style.display = 'none';
}

function confirmDelete(userId) {
    if (confirm("Êtes-vous sûr de vouloir supprimer cet utilisateur ? Cette action est irréversible.")) {
        window.location.href = "delete_user.php?uid=" + userId;
    }
}

function showNotification(message) {
    var notification = document.getElementById('notification');
    var messageSpan = document.getElementById('notification-message');
    messageSpan.innerHTML = message;

    notification.style.display = 'block';
}

function closeNotification() {
    var notification = document.getElementById('notification');

    notification.style.display = 'none';
}

document.addEventListener('DOMContentLoaded', function () {
    var participateButtons = document.querySelectorAll('.participate-button');
    var withdrawButtons = document.querySelectorAll('.withdraw-button');

    participateButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            var eventId = button.getAttribute('data-event-id');
            participateInEvent(eventId);
        });
    });

    withdrawButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            var eventId = button.getAttribute('data-event-id');
            withdrawFromEvent(eventId);
        });
    });

    function participateInEvent(eventId) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'participate_event.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                location.reload();
            }
        };
        xhr.send('event_id=' + eventId);
    }

    function withdrawFromEvent(eventId) {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'withdraw_event.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                location.reload();
            }
        };

        xhr.send('event_id=' + eventId);
    }
});
