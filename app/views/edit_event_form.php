<?php

include_once 'components/header.php';
?>
<div class="content-wrapper">
    <div class="content">
        <div class="l-box-lrg pure-u-2 pure-u-md-5-5">
            <div>
                <div class="l-box-lg-3-4 pure-u-3-3">
                    <form action="edit_event.php" method="POST">
                        <h2>Éditer l'événement</h2>
                        <input type="hidden" name="event_id" value="<?php echo $eventDetails['event_id']; ?>">

                        <label for="new_activity_type">Nouveau type d'activité</label>
                        <input type="text" id="new_activity_type" name="new_activity_type" value="<?php echo $eventDetails['activity_type']; ?>" required>
                        <br/>

                        <label for="new_description">Nouvelle description</label>
                        <textarea id="new_description" name="new_description" required><?php echo $eventDetails['description']; ?></textarea>
                        <br/>

                        <label for="new_start">Nouveau début</label>
                        <input type="datetime-local" id="new_start" name="new_start" value="<?php echo date('Y-m-d\TH:i', strtotime($eventDetails['start'])); ?>" required>
                        <br/>

                        <label for="new_end">Nouvelle fin</label>
                        <input type="datetime-local" id="new_end" name="new_end" value="<?php echo date('Y-m-d\TH:i', strtotime($eventDetails['end'])); ?>" required>
                        <br/>

                        <input type="submit" value="Mettre à jour l'événement" class="pure-button button-secondary">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
include_once 'components/footer.php';
?>

