<?php session_start(); ?>


<?php
include('includes/connection.php');

    function getReviews(){
        global $mysqli;
        try{
            $sql = "SELECT * FROM feedback";
            if(!$result = mysqli_query($mysqli, $sql)){
                echo 'ERROR, could not select reviews: ' . mysqli_error($mysqli);
            } else {
                return $result;
            }
        
        } catch(Exception $e){
            exit('Error retrieving from database: ' . $mysqli->$e);
        }





        

    }

    
    
?>  