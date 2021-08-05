<?php

$errors = array();

// 1. Sanitisation
$name = filter_var($_POST['name'], FILTER_SANITIZE_EMAIL);
$lastname = filter_var($_POST['lastname'], FILTER_SANITIZE_EMAIL);
$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);


// 2. Validation
if (true == filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "This cleaned email address is considered valid.";
} else {
	echo "This cleaned email address is not valid. Sorry. xoxo.";
}
if (false === filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = "This address is invalid.";
 }

 //3. Execution
 if (count($errors)> 0){
	echo "There are mistakes!";
	print_r($errors);
	exit;
}

$form = [$name, $lastname, $email];

echo "<pre>";
print_r($form);