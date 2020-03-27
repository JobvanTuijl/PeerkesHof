<?php
$conn = new mysqli("localhost", "root", "", "peerkeshof");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$email = $_POST['verwijderen'];
$sql = "DELETE FROM gebruikers WHERE emailadres='$email';";
            if ($conn->query($sql) === TRUE) {
                header("Location: ledenlijst.php");
            } else {
                echo "Verwijderen is mislukt";
            }
?>