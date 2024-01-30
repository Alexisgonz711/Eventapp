<?php

require_once('../models/EventModel.php');

class EventController {
  public function getEvents() {
    $eventModel = new EventModel();
    $events = $eventModel->getAllEvents();
 }
}
