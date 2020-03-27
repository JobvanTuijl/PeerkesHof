<?php
    session_start();
    if ($_SESSION["login"] == 1) {
        $conn = new mysqli("localhost", "root", "", "peerkeshof");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
            $sql = "SELECT emailadres,naam FROM gebruikers";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo "<form action='Verwijder.php' method='POST'><table>";
                echo "<tr><td></td><td><h3>Naam:</h3></td></tr>";
            while($row = $result->fetch_assoc()) 
            {
                echo "<tr><td><button type='submit' name='verwijderen' value='" . $row['emailadres'] .  "' id='Verwijderen'>Verwijderen</button></td><td>" . $row['naam'] . "</td></tr>";
            }
            echo "</table></form>";
            }
            else 
            {
                echo "Er zijn momenteel geen leden!";
            }
            echo "<form action='Uitloggen.php' method='POST'><input type='submit' id='uitloggen' name='uitloggen' value='Uitloggen'>";
            $conn->close();
    }
    else {
        header("Location: PeerkesHof.html");
    }

?>