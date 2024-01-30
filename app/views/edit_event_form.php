<DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Éditer l'événement</title>
</head>
<body>

    <h2>Éditer l'événement</h2>
    <form action="edit_event.php" method="POST">
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

        <input type="submit" value="Mettre à jour l'événement">
    </form>

</body>
</html>
