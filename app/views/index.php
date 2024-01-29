<?php

require_once(__DIR__ . '/../../database/connection.php');
$databaseConnection = Database::getConnection();

if ($databaseConnection) {
    echo "Connected to the database successfully.";

} else {
    echo "Failed to connect to the database.";
}
