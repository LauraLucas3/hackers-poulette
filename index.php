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

        <form>
            <div class="columns is-centered is-2">
                <div class="column is-centered is-one-fifth">
                    <p class="inputLabel">Name</p>
                    <input class="input is-rounded" name="name" type="text" placeholder="John">
                </div>

                <div class="column is-centered is-one-fifth">
                    <p class="inputLabel">Lastname</p>
                    <input class="input is-rounded" name="lastname" type="text" placeholder="Doe">
                </div>
            </div>

            <div class="columns is-centered is-2">
                <div class="column is-two-fifths">
                    <p class="inputLabel">Email address</p>
                    <input class="input is-rounded" name="email" type="text" placeholder="e.g. johndoe@exemple.be">
                </div>
            </div>

            <div class="columns is-centered is-1">
                <div class="control column is-centered is-one-fifth">
                    <p>Gender</p>
                    <label class="radio">
                        <input type="radio" name="answer">
                        Man
                    </label><br>
                    <label class="radio">
                        <input type="radio" name="answer">
                        Woman
                    </label><br>
                    <label class="radio">
                        <input type="radio" name="answer">
                        Other
                    </label>
                </div>

                <div class="column is-centered is-one-fifth">
                    <p>Country</p>
                    <div class="select is-rounded">
                        <select name="country">
                            <option value="default" selected>Select a country</option>
                            <?php

                                require "countries.php";
                                    
                                foreach($countries as $key => $value) {
                                    echo "<option value='$key'>$value</option>";
                                }
                            ?>
                        </select>
                    </div>
                </div>
            </div>

            <div class="columns is-centered is-2">
                <div class="column is-centered is-two-fifths">
                    <p>Subject of the message</p>
                    <div class="select is-rounded is-fullwidth">
                        <select name="subject">
                            <option>Other</option>
                            <option>Infos</option> 
                            <option>Request</option> 
                            <option>Joining us</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="columns is-centered is-2">
                <div class="column is-centered is-two-fifths">
                    <p>Message</p>
                    <textarea class="textarea is-rounded" name="message" placeholder="Write your message here" rows="2"></textarea>
                </div>
            </div>
            <div class="columns is-centered is-2">
                <div class="column is-centered is-two-fifths">
                    <button class="button is-fullwidth">Send</button>
                </div>
            </div>
        </form>

        <footer>
            <p>© Hackers poulette - 2017</p>
        </footer>
    </body>
</html>