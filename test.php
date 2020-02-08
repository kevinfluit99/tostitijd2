<?php
 $password = 'admin';
$hash = password_hash($password, PASSWORD_DEFAULT);

if (password_verify($password, $hash)) {
    echo 'Password is valid!';
} else {
     echo 'Invalid password.';
}
