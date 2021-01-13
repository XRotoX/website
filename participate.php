<?php
    
    
    $conn = mysqli_connect("localhost", "id10572046_sportusers", "testtest0000", "id10572046_sportusers");


    $radioVal = mysqli_real_escape_string($conn, $_POST["optradio"]);
    $booker_phone_number = mysqli_real_escape_string($conn, $_POST["phone"]);
    $booker = mysqli_real_escape_string($conn, $_POST["name"]);
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $players_count = mysqli_real_escape_string($conn, $_POST["players_count"]);
    $players_total = mysqli_real_escape_string($conn, $_POST["players_total"]);
    $booker = mysqli_real_escape_string($conn, $_POST["name"]);
    
    if($radioVal == "1H")
    {
        $radioVal = new DateTime("0000-00-00 01:00:00");
    }
    else if ($radioVal == "1H30Min")
    {
        $radioVal = new DateTime("0000-00-00 01:30:00");
    }
    else{
        $radioVal = new DateTime("0000-00-00 02:00:00");
    }


    $match_start  = new DateTime($_GET['datetime']);
    $match_finish =  $match_start + $radioVal;
        
    $sql = "INSERT INTO `book`( `terrain_id`, `match_start`, `match_finish`, `bookedat`, `booker`, `booker_phone_number`, `title`, `players_count`, `players_total`) VALUES
    (1,'".$match_start."','".$match_finish."','".$booker."','".$booker_phone_number."','".$title."','".$players_count."','".$players_total."');"
    $result = mysqli_query($conn, $sql);