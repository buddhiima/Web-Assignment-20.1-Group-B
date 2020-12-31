<html>

    <head>
    
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Rerservations.</title>
        <link rel="icon" type="image/x.com" href="images/favicon.jpg">
    
    </head>
    
    <style>
    
        body {
            width: 100%;
            height: 1000px;
            background-image: url('../images/reservation_bg.jpg');
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-size: cover;
            }
        
        p {
            font-size: 30px;
            text-align: center;
            font-family: serif;
            margin: 50px;
        }
        
        a , input[type="submit"] {
            color: FFFFFF;
            background-color: orange;
            text-decoration: none;
            padding: 5px;
            border: 1px hidden orange;
            border-radius: 5px;
            font-size: 25px;
            cursor: pointer;
        }
        
        div {
            border: none;
            margin: auto;
            padding: 50px;
            width: 600px;
            height: 690px;
            background-color: #FFFFFF;
            opacity: 0.9;
            box-sizing: border-box;
            font-family: Avantgarde, TeX Gyre Adventor, URW Gothic L, sans-serif;
            font-size: 20px;
            line-height: 50px;
        }
        
        th, td {
            padding: 15px;
            border-bottom: 1px solid #ddd;
        }
        
        .container {
            background-image: url('images/tick.png');
            background-size: 50px 50px;
            background-repeat: no-repeat;
            background-position: top;
            display: block;
        }
    
    </style>
    
    <body>
    
        <?php
        
            include_once 'connection.php';

            if(!$conn) {
                die("Error connecting to database.".mysqli_connect_error());
            }

            $checkin1 = $_POST['checkin'];
            $checkin = strtotime($checkin1);
            $checkout1 = $_POST['checkout'];
            $checkout = strtotime($checkout1); 
            $type = $_POST['type'];
            $meal = $_POST['meal'];

            $datediff = round($checkout - $checkin);
            $noofnights = $datediff/86400;
            $noofnights = intval($noofnights);

            $selecttype = "SELECT amount FROM room WHERE type='$type';";

            $result1 = mysqli_query($conn,$selecttype);

            while ($row = mysqli_fetch_object ($result1)) {
                $amount = $row->amount;
            }
                
                if($amount > 0) {
                    
                    $selectroomId = "SELECT roomId FROM room WHERE type='$type';";
                
                    $result2 = mysqli_query($conn,$selectroomId);

                    while ($row = mysqli_fetch_object ($result2)) {
                        $roomId = $row->roomId;
                    }

                    $inserttoreservation = "INSERT INTO reservation (roomId,checkIn,CheckOut) VALUES ($roomId,'$checkin1','$checkout1');";
                    
                    $reservestatus = mysqli_query($conn,$inserttoreservation);
                    
                    $selectresId = "SELECT resId FROM reservation WHERE roomId='$roomId' AND checkIn='$checkin1' AND checkOut='$checkout1';";
                
                    $result3 = mysqli_query($conn,$selectresId);

                    while ($row = mysqli_fetch_object ($result3)) {
                        $resId = $row->resId;
                    }
                    
                    if($reservestatus) {
                        
                        echo "<div>";
                    
                        echo "<center>";
                        
                        echo "<span class='container'>
                        <br> Your reservation has been placed.
                        </span>";
                        
                        echo "
                        
                        <table>
                            </tr>
                            <tr>
                                <td> Reservation ID </td>
                                <td>".$resId."</td>
                            </tr>
                            <tr>
                                <td> Room Type </td>
                                <td>".$type."</td>
                            </tr>
                            <tr>
                                <td> CheckIn </td>
                                <td>".$checkin1."</td>
                            </tr>
                            <tr>
                                <td> CheckOut </td>
                                <td>".$checkout1."</td>
                            </tr>
                            <tr>
                                <td> No. of nights </td>
                                <td>".$noofnights."</td>
                            </tr>
                            <tr>
                                <td> Meal plan </td>
                                <td>".$meal."</td>
                            </tr>

                        </table> . <br> . <br>
                        
                        Thank you for booking with us! <br>
                        
                        <a href='../homepage.html'> Click here </a> to return home
                        
                        </center>";

                        echo "</div>";
                    }
                    
                    else {
                        echo "<p style='color:#FFFFFF;'> Sorry, your reservation couldn't be placed. Please try again shortly or <a href='../contactus.html'> Click here </a> to contact us. </p>";
                    }
                    
                }

                else {
                    echo "<p style='color:#FFFFFF;'> Rooms are not available. <br> <a href='../room.html'> Click here </a> to look for another option. </p>";
                }

            mysqli_close($conn);

        ?>

    </body>

</html>

