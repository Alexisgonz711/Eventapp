<?php


session_start();
$page_title = "Les événements";
require_once(__DIR__ . '/../models/EventModel.php');
require_once(__DIR__ . '/../models/UserModel.php');
require_once(__DIR__ . '/../controllers/UserController.php');
require_once '../../database/connection.php';

include_once 'components/header.php';

if(!isset($_SESSION) || !$_SESSION['id']){
  header('Location: login.php');
  exit;
}
?>

<div class="content-wrapper">
  <div class="content">
    <div class="l-box-lrg pure-u-2 pure-u-md-5-5">
        <div class="pure-g">
          <div class="l-box-lg-3-4 pure-u-3-3">
            <h1 class="content-head is-center">Liste des événements</h1>
            <div id="notification" class="notification">
                <span id="notification-message"></span>
                <span class="close-button" onclick="closeNotification()">&times;</span>
            </div>
            <button onclick="showEventModal(event)" class="pure-button button-secondary" style="margin: auto;display: block;">Créer un événement</button>
            <section class="event-list">
              <?php
              $eventModel = new EventModel();
              $events = $eventModel->getAllEvents();
              

              if (!empty($events)) {
                foreach ($events as $event) {
                  $isParticipant = UserController::checkIfUserParticipated($event['event_id'], $_SESSION['id_user']);
                ?>
                <div class="event-card">
                  <div class="card-top">
                    <p>Début: <?=$event['start']?> </p>
                    <p>Fin: <?=$event['end']?></p>
                  </div>
                  <p>Créateur: <?=$event['creator_username']?></p>
                  <p>Type d'activité : <?=$event['activity_type']?></p>
                  <p>Description: <?=$event['description']?></p>

                  <div class="card-buttons">

                  <?php if ($isParticipant): ?>
                    <button class="withdraw-button" data-event-id="<?= $event['event_id'] ?>">Me désinscrire</button>
                  <?php else: ?>
                      <button class="participate-button" data-event-id="<?= $event['event_id'] ?>">Participer</button>
                  <?php endif; ?>
          
                    <?php  if($_SESSION['role_id'] == 1 || $event['creator_id'] == $_SESSION['id_user']){ ?>
                    <button class="modify-button"><a href="edit_event.php?event_id=<?=$event['event_id']?>">Éditer</a></button>
                    <form action="delete_event.php" method="POST" style="display: inline;">
                      <input type="hidden" name="event_id" value="<?= $event['event_id']?>">
                        <button type="submit" class="delete-button" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet événement ?')">Supprimer</button>
                    </form>

                    <?php } ?>
                  </div>

                  </div>
              <?php
                }
              } else {
                echo "Aucun événement trouvé.";
              }
              ?>
            </section>
          </div>
        </div>
    </div>
  </div>
  <div id="editModal" class="modal">
      <div class="modal-content">
          <span class="close" onclick="closeModal()">&times;</span>
          <h2>Créer un évenement</h2>
          <div class="l-box-lg-4-4 pure-u-3-3">
              <form action="create_event.php" method="POST">
                  <input type="hidden" name="creator_id" value="<?= $_SESSION['id_user']; ?>">
                  <label for="activity_type">Type d'activité</label>
                  <input type="text" id="activity_type" name="activity_type" required>
                  <label for="email">Description</label>
                  <textarea id="description" name="description" required></textarea>
                  <label for="start">Début</label>
                  <input type="datetime-local" id="start" name="start" required>
                  <label for="end">Fin</label>
                  <input type="datetime-local" id="end" name="end" required>
                  <input type="submit" value="Créer l'événement" class="pure-button"/>
              </form>
          </div>
      </div>
  </div>
<script>

document.addEventListener('DOMContentLoaded', function () {
    var successMessage = "<?php echo isset($_SESSION['success_message']) ? $_SESSION['success_message'] : ''; ?>";

    if (successMessage) {
        showNotification(successMessage);
        <?php unset($_SESSION['success_message']); ?>
    } 
</script>
<?php
include_once 'components/footer.php';
