<?php

include_once("../models/userModel.php");
$id = "";
$password = "";
$confirmPassword = "";
$name = "";
$email="";
$gender="";
$dob="";
$type = "";
if (isset($_POST["submit"])) {

    $id = $_POST["id"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];
    $name = $_POST["name"];
    $email=$_POST["email"];   
    $gender=$_POST["gender"];
    $dob=$_POST["dob"];

    if (isset($_POST["type"])) {

        $type = $_POST["type"];
    } else {
        echo "Please select a user type first\n\n";
    }



    if (!$_POST['id'] || !$_POST['password'] || !$_POST['confirmPassword'] ||  !$_POST['name']  ||  !$_POST['email'] ||  !$_POST['gender'] ||  !$_POST['dob']) {
        echo "Enter all required fields\n";
    } else if ($password != $confirmPassword) {
        echo "Password not matched";
    } else if (strlen($password) < 6) {
        echo "Password must be at least 6 characters\n";
    } else {
        register($id, $name, $password,$email,$gender,$dob, $type);
    }
}