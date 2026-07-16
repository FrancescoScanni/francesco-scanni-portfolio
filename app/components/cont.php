<?php
    require "desktop/db/confDB.php";

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(isset($_POST['mail']) && isset($_POST['message'])) {
            $email = $_POST['mail'];
            $cellulare = $_POST['tel'] ?? '';
            $messaggio = $_POST['message'];
        }
        echo "Email: " . $email . "<br>";
        echo "Cellulare: " . $cellulare . "<br>";
        echo "Messaggio: " . $messaggio . "<br>";
        
    }

    $stmt = $conn->prepare("INSERT INTO contacts (email, cellulare, messaggio) VALUES (?, ?, ?)");
    $stmt->execute([$email, $cellulare, $messaggio]);

    header("Location: /?success=true");

?>