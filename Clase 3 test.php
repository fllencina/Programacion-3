<?php

echo "va por GET <br>";
var_dump($_GET);
echo " <br>va por POST <br>";
var_dump($_POST);

echo "<br>bienvenido /a " , $_POST["txtNombre"];


?>