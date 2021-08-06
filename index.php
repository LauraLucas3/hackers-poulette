<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';


?>

<?php
$subject = isset($_POST['subject']) ? (int) $_POST['subject'] : 0;
$country = isset($_POST['country']) ? (int) $_POST['country'] : 0;
$errors = 0;
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <title>Hackers Poulette</title>
    </head>

    <body>
        <div class="titleAndLogo">
            <img class="logoHackers" src="assets/img/hackers-poulette-logo.png" alt="logo des Hackers poulette">
            <h1 class="title is-1">Contact support</h1>
        </div>

        <form method="post">
            <div class="columns is-centered is-2">
                <div class="column is-centered is-one-fifth">
                    <p class="inputLabel">Name</p>
                    <input class="input is-rounded" name="name" type="text" placeholder="John">
                    <?php
                        if(isset($_POST["submit"])) {
                            $name = $_POST["name"];
                            if ($name != "") {
                                function clean($string) {
                                    $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
                                 
                                    return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
                                 }
                                
                                $name = filter_var($name, FILTER_SANITIZE_STRING);
                                $name = clean($name);
                                
                                if ($name == "") {
                                    echo '<p class="help is-white">Please enter a valid name</p>';
                                    $errors ++;
                                }
                            } else {
                                echo '<p class="help is-white">Please enter your name</p>';
                                $errors ++;
                            }
                        }
                    ?>
                </div>

                <div class="column is-centered is-one-fifth">
                    <p class="inputLabel">Lastname</p>
                    <input class="input is-rounded" name="lastname" type="text" placeholder="Doe">
                    <?php
                        if(isset($_POST["submit"])) {
                            $lastname = $_POST["lastname"];
                            if ($lastname != "") {

                                $lastname = filter_var($lastname, FILTER_SANITIZE_STRING);
                                $lastname = clean($lastname);
                                if ($lastname == "") {
                                    echo '<p class="help is-white">Please enter a valid lastname</p>';
                                    $errors ++;
                                }
                            } else {
                                echo '<p class="help is-white">Please enter your lastname</p>';
                                $errors ++;
                            }
                        }
                    ?>
                </div>
            </div>

            <div class="columns is-centered is-2">
                <div class="column is-two-fifths">
                    <p class="inputLabel">Email address</p>
                    <input class="input is-rounded" name="email" type="text" placeholder="e.g. johndoe@exemple.be">
                    <?php
                    if(isset($_POST["submit"])) {
                        $email = $_POST["email"];
                        if ($email != "") {
                            $email = filter_var($email, FILTER_SANITIZE_EMAIL);
                            if ($email == "") {
                                echo '<p class"help is-white">Please enter a valid email address</p>';
                                $errors ++;
                            }
                            if (filter_var($email, FILTER_VALIDATE_EMAIL) == false) {
                                echo '<p class"help is-white">Please enter a valid email address</p>';
                                $errors ++;
                            }
                        } else {
                            echo '<p class="help is-white">Please enter your email address</p>';
                            $errors ++;
                        }
                    } 
                    ?>
                </div>
            </div>

            <div class="columns is-centered is-1">
                <div class="control column is-centered is-one-fifth">
                    <p>Gender</p>
                    <label class="radio">
                        <input type="radio" name="gender">
                        Man
                    </label><br>
                    <label class="radio">
                        <input type="radio" name="gender">
                        Woman
                    </label><br>
                    <label class="radio">
                        <input type="radio" name="gender">
                        Other
                    </label>
                    <?php
                    if(isset($_POST["submit"])) {
                        if (isset($_POST["gender"]) == false) {
                            echo '<p class="help is-white">Please choose your gender</p>';
                            $errors ++;
                        }
                    }
                    ?>
                </div>

                <div class="column is-centered is-one-fifth">
                    <p>Country</p>
                    <div class="select is-rounded">
                        <select name="country">
                            <option value="0" <?php if ($country === 0) { echo ' selected="selected"'; } ?>>Select a country</option>
                            <?php

                                require "countries.php";
                                $i = 1;
                                    
                                foreach($countries as $key => $value) {
                                    $countries[$i] = $countries[$key];
                                    unset($countries[$key]);
                                    echo "<option value='$i'";
                                    if ($country === $i) { echo ' selected="selected"'; } 
                                    echo ">$value</option>";
                                    $i++;
                                }

                            ?>
                        </select>
                    </div>
                    <?php
                        if(isset($_POST["submit"])) {
                            $country = isset($_POST['country']) ? (int) $_POST['country'] : 0;
                            if ($country == 0) {
                                echo '<p class="help is-white">Please choose a country</p>';
                                $errors ++;
                            } else {
                                $selectedCountry = $countries[$country];
                            }

                        }
                    ?>
                </div>
            </div>

            <div class="columns is-centered is-2">
                <div class="column is-centered is-two-fifths">
                    <p>Subject of the message</p>
                    <div class="select is-rounded is-fullwidth">
                        <select name="subject">
                            <option value="0" <?php if ($subject === 0) { echo ' selected="selected"'; } ?>>Other</option>
                            <option value="1" <?php if ($subject === 1) { echo ' selected="selected"'; } ?>>Infos</option> 
                            <option value="2" <?php if ($subject === 2) { echo ' selected="selected"'; } ?>>Request</option> 
                            <option value="3" <?php if ($subject === 3) { echo ' selected="selected"'; } ?>>Joining us</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="columns is-centered is-2">
                <div class="column is-centered is-two-fifths">
                    <p>Message</p>
                    <?php 
                        if (isset($_POST["submit"])) { 
                            $message = $_POST["message"]; 
                            if ($message == "") {
                                echo '<p class="help is-white">Please describe the subject of your message</p>';
                                $errors ++;
                            }
                        } 
                    ?>
                    <textarea class="textarea is-rounded" name="message" placeholder="Write your message here" rows="2"></textarea>
                </div>
            </div>
            <div class="columns is-centered is-2">
                <div class="column is-centered is-two-fifths">
                    <input id="website" class="website" name="website" type="text" value="">
                    <script>
                        $('form').submit(function(){    
                                if ($('input#website').val().length != 0) {
                                    return false;
                                } 
                        });
                    </script>
                </div>
            </div>
            <div class="columns is-centered is-2">
                <div class="column is-centered is-two-fifths">
                    <input type="submit" class="input is-fullwidth" name="submit" value="Send">
                </div>
            </div>
            
        </form>

        <?php
        if(isset($_POST["submit"])) {
            if ($errors == 0) {
                //Create an instance; passing `true` enables exceptions
                $mail = new PHPMailer(true);

                try {
                    //Server settings
                    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Host = 'smtp.mailtrap.io';
                    $mail->SMTPAuth = true;
                    $mail->Port = 587;
                    $mail->Username = '9c6c89cd98e1ac';
                    $mail->Password = '1db0ac6a605c6a';              
                    $mail->SMTPSecure = "tls";            //Enable implicit TLS encryption
                    

                    //Recipients
                    $mail->setFrom('from@example.com', 'Mailer');
                    $mail->addAddress($email, $name." ".$lastname);     //Add a recipient

                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = 'Here is the subject';
                    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
                    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                    $mail->send();
                    echo 'Message has been sent';
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            }
        }
        ?>

        <footer>
            <p>© Hackers poulette - 2017</p>
        </footer>
    </body>
</html>