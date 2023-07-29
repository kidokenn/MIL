<?php

$pw = password_hash("test3", PASSWORD_DEFAULT);
echo $pw;
echo "<br>";
var_dump(password_verify("test3", $pw));

?>