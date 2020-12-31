<html>

    <head>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contact Us.</title>
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
        
            h5 {
                text-align: center;
                color: FFFFFF;
                font-size:40px;
                font-family:Lucida Handwriting;
            }
            
            p, a {
                text-align: center;
                color: FFFFFF;
                font-family:serif;
                text-decoration:none;
                font-size: 20px;
            }
        
        </style>
    
    </head>
    
    <body>
        
        <?php
        
            include_once 'connection.php';
        
            if(!$conn) {
                die("Error connecting to database.".mysqli_connect_error());
            }
        
            $uName = $_POST['name'];
            $uEmail = $_POST['email'];
            $uContact = $_POST['phone'];
            $message = $_POST['message'];
        
            $insert = "INSERT INTO message (uName,uEmail,uContact,message) VALUES ('$uName','$uEmail',$uContact,'$message');";
        
            if(mysqli_query($conn,$insert)) {
                echo "<br><br><br><h5> Thank you for your feedback. <br> We will get in touch with you soon. </h5> <br>";
                
                echo "<p> <a href='../homepage.html'> Click here </a> to return home </p>";
                
            }
        
            else {
                echo "<h5> Error submitting your message. Please try again shortly. </h5>";
            }
        
            mysqli_close($conn);
        
        ?>
        
       
    
    </body>

</html>