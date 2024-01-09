<?php

include_once("../models/userModel.php");
$id = "";
$password = "";

if (isset($_POST["submit"])) {

    $id = $_POST["id"];
    $password = $_POST["password"];


    if (!$_POST['id'] || !$_POST['password']) {
        echo "Please enter all data first\n";
    } else {
        login($id, $password);
    }
}