<?php
    session_start();
    require "desktop/db/confDB.php";

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(!empty($_POST['mail']) && !empty($_POST['message'])) {
            $email = $_POST['mail'];
            $cellulare = $_POST['tel'] ?? '';
            $messaggio = $_POST['message'];
            $_SESSION['success'] = true;
            
            //uploading data inside DB
            $stmt = $conn->prepare("INSERT INTO contacts (email, cellulare, messaggio) VALUES (?, ?, ?)");
            $stmt->execute([$email, $cellulare, $messaggio]);
        }else{
            $_SESSION['success'] = false;
        } 
    }
    //redirect to the index page with the success or error message
    header("Location: ../index.php");
?>