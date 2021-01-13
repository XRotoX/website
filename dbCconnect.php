<?php
// Connect and select the database
    $conn = mysqli_connect("localhost", "id10572046_sportusers", "testtest0000", "id10572046_sportusers");
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>