<html>
    <head>
        <title>Hackers Poulette</title>
    </head>

    <body>
        <h1>Contact support</h1>

        <form>
            <div>
                <div>
                    <label for="name">Name</label>
                    <input name="name" type="text" placeholder="John">
                </div>
                <div>
                    <label for="lastname">Lastname</label>
                    <input name="lastname" type="text" placeholder="Doe">
                </div>
            </div>
            <div>
                <label for="email">Email address</label>
                <input name="email" type="text" placeholder="e.g. johndoe@exemple.be">
            </div>
            <div>
                <div>
                    <p>Gender</p>
                    <input type="radio" name="man">
                    <label for="man">Man</label>
                    <input type="radio" name="woman">
                    <label for="woman">Woman</label>
                    <input type="radio" name="otherg">
                    <label for="otherg">Other></label>
                </div>
                <div>
                    <label for="country">Country</label>
                    <select name="country" placeholder="Select a country">
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
                <label for="subject">Subject</label>
                <select name="subject">
                   <option>Other</option>
                   <option>Infos</option> 
                   <option>Request</option> 
                   <option>Joining us</option>
                </select>
            </div>
            <div>
                <label for="message">Message</label>
                <textarea name="message" placeholder="Write your message here"></textarea>
            </div>
        </form>
    </body>
</html>