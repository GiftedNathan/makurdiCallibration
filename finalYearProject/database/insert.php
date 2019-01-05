<?php session_start(); ?>


<?php
include('../includes/connection.php');


    if(isset($_POST['submit'])){
        
        try{
            $message = '';
            if(
                $_POST['header'] == null ||
                $_POST['slider'] == null ||
                $_POST['body'] == null ||
                $_POST['footer'] == null ||
                $_POST['buttons'] == null ||
                $_POST['pages'] == null ||
                $_POST['compatibility'] == null ||
                $_POST['name'] == null ||
                $_POST['email'] == null ||
                $_POST['phone']  == null
            ){
                $_SESSION['message'] = 'Please Kindly fill all fields available';
                header('location: ../index.php#modal');
            } else{  
                $stmt = $mysqli->prepare(
                    "INSERT INTO feedback (
                        header, slider, body, footer, buttons, pages, compatibility, name, email, phone
                    ) VALUES  (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
                );
                $stmt->bind_param(
                    "sssssssssi", 
                    $_POST['header'],
                    $_POST['slider'],
                    $_POST['body'],
                    $_POST['footer'],
                    $_POST['buttons'],
                    $_POST['pages'],
                    $_POST['compatibility'],
                    $_POST['name'],
                    $_POST['email'],
                    $_POST['phone']
                );
                if($stmt->execute()){
                    $_SESSION['message'] = 'Thanks For You inputs have been recieved ...';
                    $stmt->close();
                    header('location: ../index.php#modal');
                }
                session_destroy();
            }
        } catch(Exception $e){
            exit('Error sending to database: ' . $mysqli->$e);
        }


    }

    
?>  