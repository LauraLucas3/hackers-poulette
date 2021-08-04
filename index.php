<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <title>Hackers Poulette</title>
    </head>

    <body>
        <h1 class="title is-1 is-centered">Contact support</h1>

        <form>
            <div class="columns is-centered">
                <div class="column is-centered">
                    <p>Name</p>
                    <input name="name" type="text" placeholder="John">
                </div>

                <div class="column is-centered">
                    <p>Lastname</p>
                    <input name="lastname" type="text" placeholder="Doe">
                </div>
            </div>

            <div class="columns is-centered">
                <div class="column is-two-fifths">
                    <p>Email address</p>
                    <input name="email" type="text" placeholder="e.g. johndoe@exemple.be">
                </div>
            </div>

            <div class="columns is-centered">
                <div class="column is-centered">
                    <p>Gender</p>
                    <input type="radio" name="man">
                    <p>Man</p>
                    <input type="radio" name="woman">
                    <p>Woman</p>
                    <input type="radio" name="otherg">
                    <p>Other</p>
                </div>

                <div class="column is-centered">
                    <p>Country</p>
                    <select name="country">
                        <option value="default">Select a country</option>
                        <?php

                            require "countries.php";
                            
                            foreach($countries as $key => $value) {
                                echo "<option value='$key'>$value</option>";
                            }
                        ?>
                    </select>
                </div>
            </div>

            <div class="columns is-centered">
                <div class="column is-centered">
                    <p>Subject</p>
                    <select name="subject">
                        <option>Other</option>
                        <option>Infos</option> 
                        <option>Request</option> 
                        <option>Joining us</option>
                    </select>
                </div>
            </div>

            <div class="columns is-centered">
                <div class="column is-centered">
                    <p>Message</p>
                    <textarea name="message" placeholder="Write your message here"></textarea>
                </div>
            </div>
        </form>

        <footer>
            <p>© Hackers poulette - 2017</p>
        </footer>
    </body>
</html>