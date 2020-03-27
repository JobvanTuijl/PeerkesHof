<?php
    session_start();
    $_SESSION["login"] = 0;
    $conn = new mysqli("localhost", "root", "", "peerkeshof");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $email = strtolower($_POST['emailadres']);
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $name = $_POST['name'];
    $gender= $_POST['gender'];
    $adres = $_POST['adres'];
    $postcode = $_POST['postcode'];
    $woonplaats = $_POST['woonplaats'];
    $geboortedatum = $_POST['geboortedatum'];
        if ($_POST['password'] == $_POST['password2']) {
            $sql = "INSERT INTO gebruikers (emailadres, naam, geslacht, wachtwoord, adres, postcode, plaats, geboortedatum)
            VALUES ('$email', '$name', '$gender','$password', '$adres', '$postcode', '$woonplaats', '$geboortedatum')";
            if ($conn->query($sql) === TRUE) {
                header("Location: ledenlijst.php");
                $_SESSION["login"] = 1;
            } else {
                echo "E-mailadres al in gebruik!";
            }
        }
        else {
            echo "Wachtwoorden komen niet overeen!";
        }
        $conn->close();
?>