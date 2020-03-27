<?php
session_start();
$_SESSION["login"] = 0;
    $conn = new mysqli("localhost", "root", "", "peerkeshof");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
        $email = strtolower($_POST['email']);
        $sql = "SELECT wachtwoord FROM gebruikers WHERE emailadres = '$email'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) 
        {
            if ($row["wachtwoord"] == $_POST['password']) {
                $_SESSION["login"] = 1;
                header("Location: PeerkesHof.html");
            }
            else {
                echo "Wachtwoord is onjuist";
            }
        }
        }
        else 
        {
            echo "E-mailadres niet in gebruik";
        }
        $conn->close();
        ?>