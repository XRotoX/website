<?php
    
    
    $conn = mysqli_connect("localhost", "id10572046_sportusers", "testtest0000", "id10572046_sportusers");
    $sql = "SELECT * FROM events;";
    $result = mysqli_query($conn, $sql);
    $sql = "INSERT INTO events (datetime) VALUES ('".$_GET['datetime']."')";
    $result0 = mysqli_query($conn, $sql);
    if($result -> num_rows>0){
        $string = '
        
<div class="ccontainer" style="text-align: center;">
    <div class="reservationcard" style="text-align: center;display: inline-block; height: 200px; width: 600px; border-radius: 20px; background: white;margin: 20px; box-shadow: 1px 0px 20px -8px rgba(0,0,0,0.75); position: relative;">
        <div class="container">
            <div class="row">
                <div class="col-sm-3" style="background-color: #2ECC71; color: white; height: 200px; width: 600px; border-radius: 20px 0px 0px 20px;text-align: center;position:relative;">
                    <div class="day" style="font-size: 60px;margin:auto;font-weight: 700;position:relative;">{{date}}</div>
                    <div class="dayname" style="font-size: 20px;margin:auto;font-weight: 100;">{{dayname}}</div>
                    <div class="time" style="margin: 10px auto;font-size: 30px;font-weight: 700;position: relative;">{{time}}</div>
                </div>
                <div class="col-md-9" style="position:relative;" >
                    
                        <div class="dayname" style="font-size: 30px;font-weight:900;left: 20px;top: 20px;"><i class="fas fa-futbol"></i> {{title}}</div>
                        <div class="dayname" style="font-size: 15px;margin:auto;font-weight: 100;position:relative;"> <i class="far fa-clock"></i> {{name}}<br>  Reseved {{since}} ago</div>
                        <div class="dayname" style="font-size: 20px;margin:auto;font-weight: 100;"><i class="fas fa-hourglass-start"></i> {{duration}}</div>
                        <div class="dayname" style="font-size: 20px;margin:auto;font-weight: 100;"><i class="fas fa-male"></i> {{players}}</div>
                        <div class="dayname" style="font-size: 20px;margin:auto;font-weight: 100;position:absolute;right: 20px;bottom: 20px;"><button type="button" class="btn btn-info">Participate</button></div>
                </div>
            </div>
        </div>
    </div>
</div>
    ';
    $now= date("Y-m-d h:i:00");
    while($row = mysqli_fetch_assoc($result)){
        $date = $row['datetime'];
        $new_date = date("d", strtotime($date));
        $new_day_name = date("l", strtotime($date));
        $new_time  = date("H:i", strtotime($date));
        $string_edited = str_replace('{{date}}', $new_date, $string);
        $string_edited = str_replace('{{dayname}}', $new_day_name, $string_edited);
        $string_edited = str_replace('{{time}}', $new_time, $string_edited);
        echo $string_edited . "<br>";
    }
    echo '<div class="btn" style="position:sticky; bottom: 0;">
                    <button class="btn" type="submit" style="background-color: #2ECC71;font-size: 25px;font-weight: 700; color: white; bottom: 20px;left: 50%; transform: translate(0%, -50%);height: 60px; width: 700px; border-radius: 6px;box-shadow: 0px 0px 31px 9px rgba(0,0,0,0.54);">Book the football field at 15:35</button>
                </div>';
    }

    

