<html>

    <head>
    
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sign Up.</title>
        <link rel="icon" type="image/x.com" href="images/favicon.jpg">
        
        <style>
            
            body {
                padding: 0px 70px;
                margin-top: 0px;
                background-image: url(../images/contactUsBackDrop.jpg);
                background-size: cover;
                background-attachment: fixed;
                z-index: -1;
                height: 800px;
                width: 100%;
            }
            
            .container {
                border: none;
                background-color: rgba(218,165,32,.4);
                margin: auto;
                border-radius: 20px;
                width: 500px;
                height: 110px;
            }
        
            h5 {
                text-align: center;
                color: FFFFFF;
                font-size:30px;
                 font-family: Luicdia Handwriting;
            }
            
            h4 {
                text-align: center;
                color: FFFFFF;
                font-size:30px;
                 font-family: Luicdia Handwriting; 
            }
            
            h3 {
                text-align: center;
                color: FFFFFF;
                font-size:25px;
                font-family: Avantgarde, TeX Gyre Adventor, URW Gothic L, sans-serif;
            }
            
            p, a {
                text-align: center;
                color: FFFFFF;
                font-family:serif;
                text-decoration:none;
                font-size: 30px;
            }
        
        </style>
    
    </head>
    
    <body>
    
        <?php
        
            include_once 'connection.php';
        
            if(!$conn) {
                die("Error connecting to database.".mysqli_connect_error());
            }
        
            $name = $_POST['name'];
            $contact = $_POST['contactno'];
            $email = $_POST['email'];
            $uname = $_POST['uname'];
            $password = sha1($_POST['password']);
        
            $inserttocustomer = "INSERT INTO customer (cusName,contact,email,password) VALUES ('$name',$contact,'$email','$password');";
            
            if(mysqli_query($conn,$inserttocustomer)) {
                
                echo "<br><br><br>  <div class='container'> <h5> Hello, ".$name.",<br> You have successfully created an account! </h5> <h4>";
                
                echo "You are now eligible for exclusive loyalty benefits and discounts! </h4> <h3> Please check your email to confirm your account. </h3> <br>
                
                <p> <a href='../reservations.html'> Click here </a> to reserve a room now! </p> </div>";
                
            }
        
            else {
                echo "<h5> Error signing up. Please try again shortly. </h5>";
            }
        
            mysqli_close($conn);
        
        ?>
    
    </body>
    
</html>