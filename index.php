<html>
    <head>
        <title>Hackers Poulette</title>
    </head>

    <body>
        <h1>Contact support</h1>

        <form>
            <div>
                <div>
                    <p>Name</p>
                    <input name="name" type="text" placeholder="John">
                </div>
                <div>
                    <p>Lastname</p>
                    <input name="lastname" type="text" placeholder="Doe">
                </div>
            </div>
            <div>
                <p>Email address</p>
                <input name="email" type="text" placeholder="e.g. johndoe@exemple.be">
            </div>
            <div>
                <div>
                    <p>Gender</p>
                    <input type="radio" name="man">
                    <p>Man</p>
                    <input type="radio" name="woman">
                    <p>Woman</p>
                    <input type="radio" name="otherg">
                    <p>Other</p>
                </div>
                <div>
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
            <div>
                <p>Subject</p>
                <select name="subject">
                   <option>Other</option>
                   <option>Infos</option> 
                   <option>Request</option> 
                   <option>Joining us</option>
                </select>
            </div>
            <div>
                <p>Message</p>
                <textarea name="message" placeholder="Write your message here"></textarea>
            </div>
        </form>

        <footer>
            <p>© Hackers poulette - 2017</p>
        </footer>
    </body>
</html>