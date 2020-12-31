<html>

    <head>
    
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Rerservations.</title>
        <link rel="stylesheet" href="css/footer.css">
        <link rel="stylesheet" href="css/bootstrap.min.Navbar.css">
        <link rel="stylesheet" href="css/reservations_style.css">
        
    </head>
    
    <body>
    
        <nav class="navbar navbar-expand-lg navbar-light bg-light text-capitalize main-font-family">
            <div class="container">
                <a class="navbar-brand" href="homepage.html"><img src="images/logo.png" width="250" height="100" alt="logo" /></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#show-menu" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="show-menu">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="homepage.html">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="aboutus.html">About us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contactus.html">Contact Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="room.html">Room</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="reservations.html">Hotel Reservation<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Multiple Hotel
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#gallerypage">Viwe photo Gallery</a>
                                <a class="dropdown-item" href="#facilitypage">Hotel Facilities</a>
                                <a class="dropdown-item" href="#mappage">Map</a>
                            </div>
                        </li>
                        <li class="nav-item align-items-center">
                            <a class="nav-link" href="#regpage">Registration</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <div class="reservation">
    
            <h2> Make A Reservation Online </h2>
        
            <div class="datepanel">

                <form name="reservationForm" method="POST" action="">

                    <label for="checkin"> Check-In </label> <br>

                    <input type="date" class="date-item" id="checkin" name="checkin"> <br>

                    <label for="checkout"> Check-Out </label> <br>

                    <input type="date" class="date-item" id="checkout" name="checkout"> <br>
                    
                    <label for="type"> Type of room </label>
                    
                    <select name="type" id="type">
                        <option value="Select Room Type"> Select Room Type </option>
                        <option value="premium"> Premium Room </option>
                        <option value="superior"> Superior Room </option>
                        <option value="twin"> Twin Room </option>
                        <option value="deluxe"> Deluxe Room </option>
                        <option value="oceanic balcony suite"> Oceanic Balcony Suite </option>
                    </select> <br>
                    
                    <label for="meal"> Meal Plan </label> <br>
                    
                    <select name="meal" id="meal">
                        <option value="Select Meal Plan"> Select Meal Plan </option>
                        <option value="allmeals"> All Meals </option>
                        <option value="onlybreakfast"> Only Breakfast </option>
                        <option value="onlyroom"> Only Room </option>
                        
                    </select>

                    <input type="submit" class="date-item submit-button" value="Check Availability" name="checkavailability" onClick="validateReservation();">

                </form>

            </div>
            
            <html>

    <head></head>
    
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
            height: 800px;
            background-color: #FFFFFF;
            opacity: 0.9;
            box-sizing: border-box;
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

            $result = mysqli_query($conn,$selecttype);

            while ($row = mysqli_fetch_object ($result)) {
                $amount = $row->amount;
                
            $getroomPrice = "Select price FROM room WHERE type='$type';";
                
            $price = mysqli_query($conn,$getroomPrice); 
                
                if($amount > 0) {
                    echo "<div>";
                    
                    echo "<center> 
                    <table>
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
            
                    </table>
                    
                    <form name='reservenoeForm' method='POST' action=''>
                    <input type='submit' name='booknow' value='Make Reservation Now'> 
                    </form>
                    </center>";
                    
                    echo "</div>";
                }

                else {
                    echo "<p style='color:#FFFFFF;'> Rooms are not available. <br> <a href='../room.html'> Click here </a> to look for another option. </p>";
                }
            }
        

            mysqli_close($conn);

        ?>

    
    </body>

</html>


            
        </div>
        
         <footer class="noto-font-family">
            <div class="overlay">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-12">
                            <h3>Useful links</h3>
                            <ul class="text-capitalize">
                                <li><a href="homepage.html">Home</a></li>
                                <li><a href="aboutus.html">About Us</a></li>
                                <li><a href="#roomspage">Rooms</a></li>
                                <li><a href="contactus.html">Contact Us</a></li>
                                <li><a href="#mappage">Map</a></li>
                                <li><a href="#gallerypage">Gallery</a></li>
                                <li><a href="signup.html">Register</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12">
                            <h3>Find us</h3>
                            <p>Sri Lanka<br>
                                Gall Rd,80500e<br>
                                +94110023456<br>
                                +94110123456<br>
                                seasidesouthpark@gmail.com
                            </p>
                        </div>
                        <div class="col-lg-4 col-md-6 col-12 form">
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        
        <div>
        </div>
        
    <script language="javascript" type="text/javascript" src="javascript/reservations_javascript.js"></script>
        
    </body>

</html>